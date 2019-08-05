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

        $data_datail['sjly'] = '监管平台';

        $jgptPurchase = JgptProjectLease::find($data->id);

        DB::transaction(function () use($jgptPurchase,$data_purchase,$data_project) {
	        
            $zczlService = new ProjectLeaseService();
            $detail = $zczlService->add($data_purchase,$data_project,11);

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