<?php

namespace App\Services;

use App\Models\ProjectPurchase;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ProjectPurchaseService
{
	public function getList(){
		$user = Admin::user();
		$purchases = ProjectPurchase::where('user_id',$user_id->id);
		return $purchases;
	}

	public function add($data_purchase,$data_project,$process,$files=null){
		$user = Admin::user();
        $uuid_project =  (string)Str::uuid();
        $uuid_purchase =  (string)Str::uuid();
        $projectCodeService = new ProjectCodeService();
        $projectcode = $projectCodeService->create(2);

        $data_detail['id'] = $uuid_purchase;
        $data_detail['project_id'] = $uuid_project;
        $data_detail['xmbh'] = $projectcode;
        $data_detail['user_id'] = $user->id;
        $data_detail['status'] = 1;
        $data_detail['process'] = $process;

        $data_project['id'] = $data_detail['project_id'];
        $data_project['detail_id'] = $data_detail['id'];
        $data_project['xmbh'] = $projectcode;
        $data_project['price'] = $data_detail['gpjg_zj'];
        $data_project['user_id'] = $user->id;
        $data_project['status'] = 1;
        $data_project['type'] = 'qycg';
        $data_project['process'] = $process;
        
        
        DB::transaction(function () use($data_purchase,$data_project,$files) {
			$purchase = ProjectPurchase::create($data_purchase);
		    $project = $purchase->project()->create($data_project);
		    if($files != null){
			    foreach($files as $file){
			    	$file['project_id'] = $project->id;
			    }
			    $project->files()->insert($files);
			}
		    
		});

	}

	public function update($id,$data_purchase,$data_project,$process,$files=null){
		$purchase = ProjectPurchase::find($id);
		//更新时不做状态变更，状态放入流程中同一维护
		$data_purchase['process'] = $process;
		$data_project['process'] = $process;
		DB::transaction(function () use($id,$data_purchase,$data_project,$files) {
			$purchases = ProjectPurchase::find($id);
			$purchases->update($data_purchase);
			$purchases->project()->update($data_project);
			if($files != null){
			    foreach($files as $file){
			    	$file['project_id'] = $project->id;
			    }
			    $project->files()->delete();
				$project->files()->insert($files);
			}
			
		});
	}

	public function submit($id=null,$data_purchase,$data_project,$process,$files=null){
		$data_purchase['process'] = $process;
		
		if($data->id != null){
			$this->update($id,$data_purchase,$data_project,$files);
		}
		else{
			$this->add($data_purchase,$data_project,$files);
		}
	}	
}