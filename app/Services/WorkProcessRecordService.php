<?php

namespace App\Services;

use Encore\Admin\Facades\Admin;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Models\WorkProcessInstance;
use App\Models\WorkProcessRecord;
use App\Models\Project;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;

class WorkProcessRecordService
{
	// public function create($table_id,$operation,$reason){
	// 	$instance = Project::find($project_id)->instance()->first();

	// 	$record = create($table_id,$instance,$operation,$reason);
	// 	return $record;
	// }

	/**
		$table_id	业务表ID
		$instance	当前流程实列
		$node_name  操作时节点名称，一般取业务表更新前的process_name
		$operation 	操作名称：提交，审批通过、审批退回等
		$reason 	退回原因/备注
	 */	
	public function create($table_id,$instance,$node_name,$operation,$reason){
		// $instance = WorkProcessInstance::find($instance_id);

		$record = new WorkProcessRecord();
		$record->id =  (string)Str::uuid();
		$record->table_id = $table_id;
		$record->work_process_instance_id =  $instance->id;		
		$record->work_process_node_name =  $node_name;		
		$record->user_id = Admin::user()->id;
		$record->operation =  $operation;
		$record->save();
		return $record;
	}

	public function find($type,$node_code){
		$process = (new WorkProcess)->where('type',$type)->first();
		$node = $process->nodes()->where('code',$node_code)->first();
		return $node;
	}
}