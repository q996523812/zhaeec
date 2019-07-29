<?php

namespace App\Services;

use App\Models\ProjectLease;
use App\Models\Project;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ProjectLeaseService
{
	public function getList(){
		$user = Admin::user();
		$purchases = ProjectLease::where('user_id',$user_id->id);
		return $purchases;
	}

	public function add($data_detail,$data_project,$process,$files=null){
		$user = Admin::user();
		// dd($user);
		// $purchases = new ProjectLease($data);
		// $purchases->id = (string)Str::uuid();
		// $purchases->user_id = $user->id;
		// $purchases->status=1;
		// $purchases->process=1;
		// $purchases->save();
		
        $uuid_project =  (string)Str::uuid();
        $uuid_purchase =  (string)Str::uuid();
        $projectCodeService = new ProjectCodeService();
        $projectcode = $projectCodeService->create(9);
        $workProcessNodeService = new WorkProcessNodeService();
        $node = $workProcessNodeService->find('zczl',$process);

        $data_detail['id'] = $uuid_purchase;
        $data_detail['project_id'] = $uuid_project;
        $data_detail['xmbh'] = $projectcode;
        $data_detail['user_id'] = $user->id;
        $data_detail['status'] = 1;
        $data_detail['process'] = $node->code;
		$data_detail['process_name'] = $node->name;

        $data_project['id'] = $data_detail['project_id'];
        $data_project['detail_id'] = $data_detail['id'];
        $data_project['xmbh'] = $projectcode;
        $data_project['price'] = $data_detail['gpjg_zj'];
        $data_project['user_id'] = $user->id;
        $data_project['status'] = 1;
        $data_project['type'] = 'zczl';
        $data_project['process'] = $process;
        $data_project['process_name'] = $node->name;

        
        $detail = DB::transaction(function () use($data_detail,$data_project,$files) {
			$detail = ProjectLease::create($data_detail);
		    $project = $detail->project()->create($data_project);
		    if($files != null){
			    foreach($files as $file){
			    	$file['project_id'] = $project->id;
			    }
			    $project->files()->insert($files);
			}
		    return $detail;
		});
        return $detail;
	}

	public function update($id,$data_detail,$data_project,$process,$files=null){
		$data_detail['process'] = $process;
		$data_project['process'] = $process;
		DB::transaction(function () use($id,$data_detail,$data_project,$files) {
			$detail = ProjectLease::find($id);
			$detail->update($data_detail);
			$detail->project()->update($data_project);
			if($files != null){
			    foreach($files as $file){
			    	$file['project_id'] = $project->id;
			    }
			    // $project->files()->delete();
				$project->files()->insert($files);
			}
			
		});
	}

	public function submit($id){
		$process = 13;
		$detail = ProjectLease::find($id);
		$project = $detail->project;
		$detail->process = $process;
		$project->process = $process;
		
		DB::transaction(function () use($detail,$project) {
			// $detail->save();
			// $project->save();
			$process = new ProcessService();
			$process->create('zczl',$detail->id,'提交',13);
		});
	}	

	/**
	 *$yxf_id 中标方ID
	 */
	public function jj($yxf_id){
		DB::transaction(function () use($yxf_id) {
			$yxf = IntentionalParty::find($yxf_id);
			$yxf->is_win = 1;
			$yxf->save();
		});
	}

	public function upload($project_id,$file,$file_type){
		DB::transaction(function () use($project_id,$file,$file_type) {
			$project = Project::find($project_id);
			if($file != null){
				$file['project_id'] = $project->id;
				$file['type'] = $file_type;
				$project->files()->insert($file);
			}
		});
	}
}