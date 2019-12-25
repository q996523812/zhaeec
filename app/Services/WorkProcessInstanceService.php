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
		$next_user_id 复核人ID
	 */	
	public function create($table_id,$instance_type,$init_node_code,$next_user_id){
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
		$instance->user_id = $next_user_id;
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
		$process = $instance->process;
		$nodes = $instance->process()->first()->nodes;//所有流程节点
		$node = $instance->node()->first();//当前节点

		//下一个操作节点
		$nextnode = null;
		if($isNext == 2){//审批通过
			if($node->code == '120'){
				$nextnode = $nodes->where('code',$nodecode)->first();
			}
			else{
				$nextnode = $nodes->where('code',$node->next_node_code)->first();
			}
			switch($node->code){
				case 120:
					$nextnode = $nodes->where('code',$nodecode)->first();
					break;
				case 117:
					$processService = new ProcessService();
					$model_class = $processService->getModelClass($process->type);
					$model = $model_class::find($table_id);
					//大于一亿时，需要董事长审批
					if($model->gpjg >= 10000){//单位：万元
						$nextnode = $nodes->where('code',118)->first();
					}
					else{
						$nextnode = $nodes->where('code',121)->first();
					}
					break;
				case 156:
					$processService = new ProcessService();
					$model_class = $processService->getModelClass($process->type);
					$model = $model_class::find($table_id);
				
					//企业采购项目，根据交易方式确定下一步流程
					//交易方式为招标类（公开招标、邀请招标，竞争性谈判等）时，下一流程为评标结果公示
					//交易方式为其他（网络竞价等）时，下一流程为成交信息录入
					if($process->type == 'qycg'){
						//dd(111);
						if($model->transactionMode->pubDealWay == 1){//网络竞价
							$nextnode = $nodes->where('code',171)->first();
						}
						else{
							$nextnode = $nodes->where('code',161)->first();
						}
					}
					break;
				default:
					$nextnode = $nodes->where('code',$node->next_node_code)->first();
					break;
			}
		}
		else{//退回
			$nextnode = $nodes->where('code',$node->back_node_code)->first();
		}

		$instance->work_process_node_id =  $nextnode->id;
		$instance->role_id = $nextnode->role_id;
		$instance->user_id = null;
		if($nextnode->next_node_code){
			$instance->next_work_process_node_id = $nodes->where('code',$nextnode->next_node_code)->first()->id;
		}

		$instance->save();
		return $instance;
	}
}