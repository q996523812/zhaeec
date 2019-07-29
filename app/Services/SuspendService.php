<?php

namespace App\Services;

use Encore\Admin\Facades\Admin;
use App\Models\ProjectLease;
use App\Models\Project;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Models\WorkProcessInstance;
use App\Models\WorkProcessRecord;
use App\Models\Suspend;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SuspendService
{

	public function add($data_suspend,$process){
		$user = Admin::user();
		
        //$data_suspend['project_id'] = $project_id;
        $data_suspend['status'] = 1;
        
        $suspend = DB::transaction(function () use($data_suspend,$process) {
        	$project_id = $data_suspend['project_id'];
			$project = Project::find($project_id);
			$detail = $this->getDetail($project);
			$name = $this->getSuspendName($process);

			$suspend = new Suspend();
			foreach ($data_suspend as $column => $value) {
                $suspend->setAttribute($column, $value);
            }
            $suspend->save();
			// $suspend = Suspend::create($data_suspend);
			$detail->update(['process'=>$process]);
			$project->update(['process'=>$process]);
			
			$processService = new ProcessService();
			$processService->next($project->id,null,$name.'录入',$process);
		    return $suspend;
		});
        return $suspend;
	}

	public function update($id,$data_suspend){
		//$data_suspend['id'] = $id;

		// $data_project['process'] = $process;
		DB::transaction(function () use($id,$data_suspend) {
			$suspend = Suspend::find($id);
			$suspend->update($data_suspend);
			//$detail->project()->update($data_project);
		});
	}

	public function submit($project_id,$id){
		$project = Project::find($project_id);
		$detail = $this->getDetail($project);
		$suspend = Suspend::find($id);

		DB::transaction(function () use($detail,$project,$suspend) {
			//$detail->save();
			//$project->save();
			$name = $suspend->type;
			
			$processService = new ProcessService();
			$processService->next($project->id,null,$name.'提交',$nodecode=null);
		});
	}

	public function getSuspendName($process){
		$name = "";
		switch($process){
			case 31:
				$name = "中止公告";
				break;
			case 41:
				$name = "终结公告";
				break;
			
		}
		return $name;
	}

	private function getDetail($project){
		$detail = "";
		switch($project->type){
			case 'zczl':
				$detail = $project->projectLease;
				break;
			case 'qycg':
				$detail = $project->projectPurchase;
				break;			
		}
		return $detail;
	}
}