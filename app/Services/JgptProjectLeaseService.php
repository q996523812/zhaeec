<?php

namespace App\Services;

use App\Models\JgptProjectLease;
use App\Models\ProjectLease;
use App\Models\Project;
use App\Models\PbResult;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;
use App\Handlers\CurlHandler;
use App\Handlers\JgptCurlHandler;

class JgptProjectLeaseService
{

	public function get(){
		return [];
	}

	//自动保存接口数据
	public function save($data){
		$data['id'] = (string)Str::uuid();
		$jgptPurchase = JgptProjectLease::create($data);

	}

	public function cancle($data){

	}

    private $fields_detail = ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','xmbh','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','gpjg_dj','zlqx','jymd','zclb','fbfs','zcsfsx','pgjz','jyfs','bjms','jjfd','jysj_bz','yxf_zgtj','yxdj_zlqd','bzj_jn_time_end','bzj','jypt_lxfs','notes','fc_province','fc_city','fc_area','fc_street','fc_gn','fc_mj','fc_zjh','fc_zjjg','fc_ysynx','fc_ghyt','fc_sfyyzh','fc_jcsj','fc_dqyt','fc_yzh_yxq'];
    private $fields_projectt = ['xmbh','title','price','gp_date_start','gp_date_end'];
    private function getData($jgptDeatil,$fields){
        $data = [];
        foreach ($fields as $field) {
            if($field === 'price'){
                $data[$field] = $jgptDeatil->toArray()['gpjg_zj'];
            }
            else{
                $data[$field] = $jgptDeatil->toArray()[$field];
            }
        }
        // foreach ($jgptDeatil->toArray() as $key => $value) {
        //     $data[$key] = $value;
        // };
        return $data;
    }
    //业务员接收申请
    public function receive($data_datail,$data_project,$id){
        $user = Admin::user();
        $jgptDeatil = JgptProjectLease::find($id);

        $data_datail = $this->getData($jgptDeatil,$this->fields_detail);
        $data_datail['sjly'] = '监管平台';
        $data_project = $this->getData($jgptDeatil,$this->fields_projectt);
        $data_project['type'] = 'zczl';

        DB::transaction(function () use($jgptDeatil,$data_datail,$data_project) {
	        
            $zczlService = new ProjectLeaseService();
            $detail = $zczlService->add($data_datail,$data_project,11);

            $jgptDeatil->update([
                'status'=>7,
                'detail_id'=>$detail->id,
            ]);

            if(count($jgptDeatil->files)){
                $jgptfiles = $jgptDeatil->files();
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

        return $jgptDeatil;
    }

    public function back($id){
    	$jgptDeatil = JgptProjectLease::find($id);
    	if(in_array($jgptDeatil->status, [6,7] ) ){
    		return ['message' => '失败，不能重复操作'];
    	}
    	DB::transaction(function () use($jgptDeatil) {
	    	$jgptDeatil->update([
	            'status'=>admin_config()->status[6],
	        ]);
        });
        return [];
    }

    public function sendGpData($purchase){
        $url = '';
        $data = [
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

    public function jjResult($project_id){
        $url = '';

        $project = Project::find($project_id)->first();
        $pbjg = PbResult::where('project_id',$project_id)->get();        
        $datas = [
            'xmbh' => $purchase->xmbh,
            'title' => $purchase->title,
            'records' => $pbjg,       
        ];
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$datas);

        $json_result = json_decode($result,true);
        return $json_result;
    }   

    public function zbNotice($project_id){
        $url = 'http://zhaeec.test/api/purchases/rebackdatas';
        $project = Project::find($project_id)->first();
        $zbtz = WinNotice::where('project_id',$project_id)->first();
        $datas = $zbtz;

        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$datas);

        $json_result = json_decode($result,true);
        return $json_result;
    } 

}