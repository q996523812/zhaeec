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

class WorkProcessInstanceService
{
	/**
		$table_id	业务表ID
		$instance_type	流程类型
		$init_node_code 初始节点
	 */	
	public function create($table_id,$instance_type,$init_node_code){
		$process = (new WorkProcess)->where('type',$instance_type)->first();
		$node = $process->nodes()->where('code',$init_node_code)->first();
		$nodeNext = $process->nodes()->where('code',$node->next_node_code)->first();

		$instance = new WorkProcessInstance();
		$instance->id =  (string)Str::uuid();
		$instance->code = $process->code.str_random(4);
		$instance->work_process_id = $process->id;
		$instance->table_id = $table_id;
		$instance->work_process_node_id = $node->id;
		$instance->role_id = $node->role_id;
		$instance->next_work_process_node_id = $nodeNext->id;
		$instance->save();
		return $instance;
	}

	/**
		$instance	需要更新的流程实列
		$isNext 	1、退回，2、进入下一个流程
	 */	
	public function update($table_id,$isNext,$nodecode){
		// $instance = (Project::find($project_id))->instance()->first();//当前流程实例
		$instance = WorkProcessInstance::where('table_id',$table_id)->first();//当前流程实例
		$nodes = $instance->process()->first()->nodes;//所有流程节点
		$node = $instance->node()->first();//当前节点

		//下一个操作节点
		$nextnode = null;
		if($isNext == 2){//审批通过
			if($node->code == '20'){
				$nextnode = $nodes->where('code',$nodecode)->first();
			}
			else{
				$nextnode = $nodes->where('code',$node->next_node_code)->first();
			}
		}
		else{//退回
			$nextnode = $nodes->where('code',$node->back_node_code)->first();
		}

		$instance->work_process_node_id =  $nextnode->id;
		$instance->role_id = $nextnode->role_id;
		if($nextnode->next_node_code){
			$instance->next_work_process_node_id = $nodes->where('code',$nextnode->next_node_code)->first()->id;
		}

		$instance->save();
		return $instance;
	}
}