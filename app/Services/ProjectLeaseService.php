<?php

namespace App\Services;

use App\Models\ProjectLease;
use App\Models\Project;
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
		// $purchases = new ProjectLease($data);
		// $purchases->id = (string)Str::uuid();
		// $purchases->user_id = $user->id;
		// $purchases->status=1;
		// $purchases->process=1;
		// $purchases->save();
        $uuid_project =  (string)Str::uuid();
        $uuid_purchase =  (string)Str::uuid();
        
        $data_project['id'] = $uuid_project;
        $data_project['user_id'] = $user->id;
        $data_project['status'] = 1;
        $data_project['type'] = 'zczl';
        $data_project['detail_id'] = $uuid_purchase;
        $data_project['process'] = $process;
        
        $data_detail['id'] = $uuid_purchase;
        $data_detail['project_id'] = $uuid_project;
        $data_detail['user_id'] = $user->id;
        $data_detail['status'] = 1;
        $data_detail['process'] = $process;
        DB::transaction(function () use($data_detail,$data_project,$files) {
			$detail = ProjectLease::create($data_detail);
		    $project = $detail->project()->create($data_project);
		    if($files != null){
			    foreach($files as $file){
			    	$file['project_id'] = $project->id;
			    }
			    $project->files()->insert($files);
			}
		    
		});

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

	public function submit($id=null,$data_purchase,$data_project,$process,$files=null){
		$data_purchase['process'] = $process;
		
		if($data->id != null){
			$this->update($id,$data_purchase,$data_project,$files);
		}
		else{
			$this->add($data_purchase,$data_project,$files);
		}
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