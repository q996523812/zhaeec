<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectLease;
use App\Models\ProjectPurchase;
use App\Models\JgptProjectLease;
use App\Models\IntentionalParty;
use App\Handlers\JgptCurlHandler;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class WbjkProjectBaseService
{
	public $project_type_code;
	public $model_class;
	public $detail_service_class;

    public $fields_detail = [];
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

	//自动保存接口数据
	public function save($data){
		$data['id'] = (string)Str::uuid();
        $datas['status'] = 5;
		$model = $this->model_class::create($data);
        return $model;
	}

    //业务员接收申请
    public function receive($id){
        $jgptDeatil = $this->model_class::find($id);

        $data_datail = $this->getData($jgptDeatil,$this->fields_detail);
        $data_datail['sjly'] = '监管平台';
        $data_project = $this->getData($jgptDeatil,$this->fields_projectt);
        $data_project['type'] = $this->project_type_code;

        DB::transaction(function () use($jgptDeatil,$data_datail,$data_project) {
	        
            $detailService = new $this->detail_service_class;
            $detail = $detailService->add($data_datail,$data_project,11);

            $jgptDeatil->update([
                'status'=>7,
                'detail_id'=>$detail->id,
            ]);

            if(count($jgptDeatil->files)){
                $jgptfiles = $jgptDeatil->files;
                $fileService = new FileService();
                $fileService->batchStore($detail,$jgptfiles->toArray());
            }
            // if(count($jgptDeatil->images)){
            //     $jgptimages = $jgptDeatil->images;
            //     $imageService = new ImageService();
            //     $imageService->batchStore($detail,$jgptfiles->toArray());
            // }
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


    public function send($url,$data,$detail_id){
        $jgpt_detail = $this->model_class::where('detail_id',$detail_id)->get();
        $data['uuid'] = $jgpt_detail->jgpt_key;
        $curlHandler = new JgptCurlHandler;
        $result = $curlHandler->curl($url,$datas);

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
        $url = 'http://47.112.15.51:8090/api/assets/backfill/winningbid';

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