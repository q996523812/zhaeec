<?php

namespace App\Services;

use Encore\Admin\Facades\Admin;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Models\WorkProcessInstance;
use App\Models\WorkProcessRecord;
use App\Models\Project;
use Illuminate\Support\Str;

class ProcessService
{

	public function __construct(){

	}

	public function createRecord($project_id,$operation,$reason){
		$instance = Project::find($project_id)->instance()->first();

		$record = new WorkProcessRecord();
		$record->id =  (string)Str::uuid();
		$record->project_id = $project_id;
		$record->work_process_instance_id =  $instance->id;		
		$record->work_process_node_name =  $instance->node()->first()->name;		
		$record->user_id = Admin::user()->id;
		$record->operation =  $operation;
		return $record;
	}
	/*启动流程
	 *$porjecttype 项目类型：xxypl，qycq,....
	 *$project_id 项目主表ID
	 *$operation 操作：1，提交，2 审批通过，3 审批拒绝
	 */
	public function create($porjecttype,$project_id,$operation){
		$userModel = config('admin.database.users_model');
		$process = (new WorkProcess)->where('projecttype',$porjecttype)->first();

		$node = $process->nodes()->where('code','13')->first();
		$nodeNext = $process->nodes()->where('code','14')->first();

		//流程实例
		$instance = new WorkProcessInstance();
		$instance->id =  (string)Str::uuid();
		$instance->code = $process->code.str_random(4);
		$instance->work_process_id = $process->id;
		$instance->project_id = $project_id;
		$instance->work_process_node_id = $node->id;
		$instance->next_work_process_node_id = $nodeNext->id;
		// $instance->next_role_id = $nodeNext->role()->id;
		// $instance->next_user_id = (new $userModel())->roles()->find($nodeNext->id);

		//流程记录
		$record = new WorkProcessRecord();
		$record->id =  (string)Str::uuid();
		$record->work_process_instance_id =  $instance->id;
		$record->project_id = $project_id;
		$record->work_process_node_name =  $process->nodes()->where('code','11')->first()->name;		
		$record->user_id = Admin::user()->id;
		$record->operation =  $operation;

		$instance->save();
		$record->save();		
	}

	/*
		审批退回
	*/
	public function back($project_id,$reason){
		$operation = '审批退回';
		$isNext = 1;
		$this->refreshInstance($project_id,$isNext,$reason,$operation,null);
	}

	/*
		$operation 	提交，审批通过、公告录入等
	*/
	public function next($project_id,$reason=null,$operation,$nodecode=null){
		$isNext = 2;
		$this->refreshInstance($project_id,$isNext,$reason,$operation,$nodecode);
	}

	/**
		$project_id
		$isNext 	1、退回，2、进入下一个流程
		$operation	操作名称：提交，审批通过、审批退回等
		$reason		通过/退回理由		
		$nodecode	动作结束后所处节点，即本操作将流程发送到那个节点，此时发送节点已经明确，
	 */	
	public function refreshInstance($project_id,$isNext=2 ,$reason=null,$operation,$nodecode=null){
		
		$instance = (Project::find($project_id))->instance()->first();//当前流程实例
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

		//新增一条操作记录
		$record = $this->createRecord($project_id,$operation,$reason);
		//更新当前流程实例
		$instance->work_process_node_id =  $nextnode->id;
		if($nextnode->next_node_code){
			$instance->next_work_process_node_id = $nodes->where('code',$nextnode->next_node_code)->first()->id;
		}
		//更新项目主表状态
		$project = Project::find($project_id);
		$project->process = $nextnode->code;

		//更新项目明细状态
		$detail = $this->getProjectDetail($project);
		$detail->process = $nextnode->code;

		$instance->save();
		$record->save();
		$project->save();
		$detail->save();
	}

	public function getProjectDetail($project){
		$detail = null;
		switch($project->type){
			case 'qycg':
				$detail = $project->projectPurchase()->first();
				break;
			case 'zczl':
				$detail = $project->projectLease()->first();
				break;
		}
		return $detail;
	}

	//1,show,2，修改，3,审批，4，成交录入，
	public function getListButton($user_id,$project_id,$projecttype,$row_id){
		$url1 = "/admin/projectpurchases/showapproval/$row_id";
		$url2 = "/admin/projectleases/showapproval/$row_id";
		
	}

// 		11：【挂牌】录入/提交
// 		12：【挂牌】退回
// 		13：【挂牌】审批1
// 		14：【挂牌】审批2
// 		15：【挂牌】审批3
// 		19：【挂牌】确认挂牌
// 		20：【挂牌】挂牌中，自动延期，不接受手动延期。挂牌结束,业务员手动进行流程选择，摘牌、流标
// 		21：【流标】录入流标信息
// 		22：【流标】退回
// 		22：【流标】审批1
// 		29：【流标】公告发布
// 		31：【评标】录入评标结果
// 		32：【评标】退回
// 		33：【评标】审批1
// 		34：【评标】审批2
// 		35：【评标】审批3
// 		39：【评标】发布评标结果公告
//		41：【成交】录入成交信息
//		42：【成交】退回
//		43：【成交】审批1
//		44：【成交】审批2
//		45：【成交】审批3
//		49：【成交】发布成交公告
//		51：【合同】上传采购合同
//		99：【结束】
	public function postGZW($project_id,$node){
		$endNode = array('19','29','39','49');
		$project = Project::find($project_id);
		$JgptService = $this->getService($project->type);
		if($project->type == 'qycg'){
			$detail = $project->projectPurchase()->first();
			if($detail->sjly == '监管平台'){
				switch($node){
					case 19:
						$json_result = $JgptService->sendGpData($project->detail_id);
						break;
					case 29:
						// $json_result = $JgptService->lbNotice($project->detail_id);
						break;
					case 39:
						$json_result = $JgptService->pbResult($project_id);
						break;
					case 49:
						$json_result = $JgptService->zbNotice($project_id);
						break;
						
				}
			}
		}
		else if($project->type == 'zczl'){
			$detail = $project->projectLease()->first();
			if($detail->sjly == '监管平台'){
				switch($node->code){
					case 19:
						$json_result = $JgptService->sendGpData($project->detail_id);
						break;
					case 29:
						// $json_result = $JgptService->lbNotice($project->detail_id);
						break;
					case 39:
						$json_result = $JgptService->jjResult($project_id);
						break;
					case 49:
						$json_result = $JgptService->zbNotice($project_id);
						break;						
				}
			}
		}
	}

	public function getService($project_type){
		$JgptService = null;
		switch($project_type){
			case 'qycg':
				$JgptService = new JgptProjectPurchaseService;
				break;
			case 'zczl':
				$JgptService = new JgptProjectLeaseService;
				break;
		}
		return $JgptService;
	}

}