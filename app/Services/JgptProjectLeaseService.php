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

    //业务员接收申请
    public function receive($data_datail,$data_project,$id){
        $user = Admin::user();
        $uuid_project =  (string)Str::uuid();
        $uuid_purchase =  (string)Str::uuid();
        
        $data_project['id'] = $uuid_project;
        $data_project['user_id'] = $user->id;
        $data_project['status'] = 1;
        $data_project['type'] = 'qycq';
        $data_project['detail_id'] = $uuid_purchase;
        $data_project['process'] = 11;

        $data_datail['id'] = $uuid_purchase;
        $data_datail['user_id'] = $user->id;
        $data_datail['project_id'] = $uuid_project;
        $data_datail['process'] = 11;
        $data_datail['status'] = 1;
        $data_datail['sjly'] = '监管平台';

        $jgptPurchase = JgptProjectLease::find($data->id);

        DB::transaction(function () use($jgptPurchase,$data_purchase,$data_project) {
	        $jgptPurchase->update([
	            'status'=>7,
	        ]);

	        $purchase = ProjectLease::create($data_purchase);
	        $project = $purchase->project()->create($data_project);

            if(count($jgptPurchase->files)){
                $files = $jgptPurchase->files();
                foreach($files as $jgptfile){
                    $file = File::create([
                        'id'=>(string)Str::uuid(),
                        'project_id' => $purchase->project_id,
                        'type' => '1',
                        'path' => $jgptfile->path,
                        'name' => $jgptfile->name,
                    ]);
                }
            }
	    });

        return $jgptPurchase;
    }

    public function back($id){
    	$jgptPurchase = JgptProjectLease::find($id);
    	if(in_array($jgptPurchase->status, [6,7] ) ){
    		return ['message' => '失败，不能重复操作'];
    	}
    	DB::transaction(function () use($jgptPurchase) {
	    	$jgptPurchase->update([
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