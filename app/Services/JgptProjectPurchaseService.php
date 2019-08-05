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

class JgptProjectPurchaseService
{

	public function get(){
		return [];
	}

	//自动保存接口数据
	public function save($data){
		$data['id'] = (string)Str::uuid();
		$jgptPurchase = JgptProjectPurchase::create($data);

	}

	public function cancle($data){

	}

    //业务员接收申请
    public function receive($data_datail,$data_project,$id){
        $user = Admin::user();

        $data_datail['sjly'] = '监管平台';

        $jgptPurchase = JgptProjectPurchase::find($id);

        DB::transaction(function () use($jgptPurchase,$data_datail,$data_project) {
	        
            $qycgService = new ProjectPurchaseService();
            $detail = $qycgService->add($data_purchase,$data_project,11);

            $jgptPurchase->update([
                'status'=>7,
                'detail_id'=>$detail->id,
            ]);

            if(count($jgptPurchase->files)){
                $jgptfiles = $jgptPurchase->files();
                $files = null;
                foreach($jgptfiles as $jgptfile){
                    // $file = File::create([
                    //     'id'=>(string)Str::uuid(),
                    //     'project_id' => $detail->project_id,
                    //     'type' => '1',
                    //     'path' => $jgptfile->path,
                    //     'name' => $jgptfile->name,
                    // ]);
                    $file = [
                        'id'=>(string)Str::uuid(),
                        'path' => $jgptfile->path,
                        'name' => $jgptfile->name,
                    ];
                    $files[] = $file;
                }
                $detail->files()->save($files);
            }
	    });

        return $jgptPurchase;
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