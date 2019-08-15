<?php

namespace App\Services;

use App\Models\JgptProjectPurchase;
use App\Models\Project;
use App\Models\ProjectPurchase;
use App\Models\PbResult;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;
use App\Handlers\CurlHandler;
use App\Handlers\JgptCurlHandler;

class JgptProjectPurchaseService extends WbjkProjectBaseService
{
    public function __construct()
    {
        $this->project_type_code = 'qycg';
        $this->model_class = JgptProjectPurchase::class;
        $this->detail_service_class = ProjectPurchaseService::class;
        $this->fields_detail = ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','xmbh','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','bdyx','xmpz','gq','jyfs','bjms','jjfd','jy_date','zbdl_lxfs','yxf_zgtj','yxdj_zlqd','yxdj_sj','yxdj_fs','bzj_jn_time_end','bzj','zbwj_dj','jypt_lxfs','notes'];
    }


    public function back($id){
        $url = "http://127.0.0.1:8080/gzb/procurement/findprocurement";
    	$jgptPurchase = JgptProjectPurchase::find($id);
    	if(in_array($jgptPurchase->status, [6,7] ) ){
    		return ['message' => '失败，不能重复操作'];
    	}
    	DB::transaction(function () use($jgptPurchase) {
	    	$jgptPurchase->update([
	            'status'=>admin_config()->status[6],
	        ]);
        });

        $data = [
            'jgpt_key' => $id
        ];
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$data);

        $json_result = json_decode($result,true);
        return [];
    }

    public function sendGpData($purchase_id){
        $url = 'http://zhaeec.test/api/purchases/rebackdatas';
        $purchase = ProjectPurchase::find($purchase_id)->first();
        $data = [
            'xmbh' => $purchase->xmbh,
            'title' => $purchase->title,
            'ptime' => $purchase->jy_date,//交易时间
            'ggtime1' => $purchase->gp_date_start,
            'ggtime2' => $purchase->gp_date_end,
            'djtime' => $purchase->yxdj_sj,
            'price' => $purchase->yxdj_fs,
            'jntime' => $purchase->bzj_jn_time_end,
            'djtime' => $purchase->zbwj_dj,
            'jyphone' => $purchase->jypt_lxfs,
            'remarks' => $purchase->notes,         
        ];
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$data);

        $json_result = json_decode($result,true);
        return $json_result;
    }

/*
    public function lbNotice($project_id){
        $url = '';
        $project = Project::find($project_id)->first();
        $zbtz = LbNotice::where('project_id',$project_id)->first();
        $datas = $zbtz;
        $result = JgptCurlHandler::curl($url,$datas);

        $json_result = json_decode($result,true);
        return $json_result;
    }     
    */

    public function pbResult($project_id){
        $url = 'http://192.168.1.100:8080/gzb/procurement/findpjresult';
        $project = Project::find($project_id);
        $pbjg = PbResult::where('project_id',$project_id)->get();        
        $datas = [
            'title' => $project->title,
            'records' => $pbjg,       
        ];
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$datas);

        $json_result = json_decode($result,true);
        return $json_result;
    }   

    public function zbNotice($project_id){
        $url = 'http://zhaeec.test/api/purchases/rebackdatas';
        $project = Project::find($project_id);
        $zbtz = WinNotice::where('project_id',$project_id)->first();
        $datas = $zbtz;
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$datas);

        $json_result = json_decode($result,true);
        return $json_result;
    } 


}