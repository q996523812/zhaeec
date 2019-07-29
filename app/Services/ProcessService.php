<?php

namespace App\Services;

use Encore\Admin\Facades\Admin;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Models\WorkProcessInstance;
use App\Models\WorkProcessRecord;
use App\Models\Project;
use App\Models\ProjectLease;
use App\Models\ProjectPurchase;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;

class ProcessService
{

	public function __construct(){

	}

	/*启动流程
	 *$instance_type 流程类型：xxypl，qycq,....，yxdj
	 *$table_id 业务表ID
	 *$operation 操作：1，提交，2 审批通过，3 审批拒绝
	 *$init_node_code 创建流程时的节点编号
	 */
	public function create($instance_type,$table_id,$operation,$init_node_code){
		$model_class = $this->getModelClass($instance_type);
		$model = $model_class::find($table_id);
		//流程实例
		$instanceService = new WorkProcessInstanceService();
		$instance = $instanceService->create($table_id,$instance_type,$init_node_code);

		//流程记录
		$recordService = new WorkProcessRecordService();
		$record = $recordService->create($table_id,$instance, $model->process_name,$operation,null);

		$process = $instance->process;
		$nextnode = $instance->node;
		//更新业务表流程状态	
		$model->process = $nextnode->code;
		$model->process_name = $nextnode->name;
		$model->save();

		if($process->type != 'yxdj'){
			//业务表为项目明细表时，更新项目主表（project）的流程状态
			$project = $model->project;
			$project->process = $nextnode->code;
			$project->process_name = $nextnode->name;
			$project->save();
		}
		
	}

	/*
		审批退回
	*/
	public function back($table_id,$reason){
		$operation = '审批退回';
		$isNext = 1;
		$this->refreshInstance($table_id,$isNext,$reason,$operation,null);
	}

	/*
		$operation 	提交，审批通过、公告录入等
	*/
	public function next($table_id,$reason=null,$operation,$nodecode=null){
		$isNext = 2;
		$this->refreshInstance($table_id,$isNext,$reason,$operation,$nodecode);
	}

	/**
		$table_id
		$isNext 	1、退回，2、进入下一个流程
		$operation	操作名称：提交，审批通过、审批退回等
		$reason		通过/退回理由		
		$nodecode	动作结束后所处节点，即本操作将流程发送到那个节点，此时发送节点已经明确，
	 */	
	public function refreshInstance($table_id,$isNext=2 ,$reason=null,$operation,$nodecode=null){
		//流程实例
		$instanceService = new WorkProcessInstanceService();
		$instance = $instanceService->update($table_id,$isNext,$nodecode);

		$nextnode = $instance->node;
		$process = $instance->process;
		$model_class = $this->getModelClass($process->type);
		$model = $model_class::find($table_id);

		//流程记录
		$recordService = new WorkProcessRecordService();
		$record = $recordService->create($table_id,$instance,$model->process_name,$operation,$reason);
	

		//更新业务表流程状态	
		$model->process = $nextnode->code;
		$model->process_name = $nextnode->name;
		$model->save();

		if($process->type != 'yxdj'){
			//业务表为项目明细表时，更新项目主表（project）的流程状态
			$project = $model->project;
			$project->process = $nextnode->code;
			$project->process_name = $nextnode->name;
			$project->save();
		}

		
	}
	public function getModelClass($type){
		$model = null;
		switch($type){
			case 'zczl':
				$model = ProjectLease::class;
				break;
			case 'qycg':
				$model = ProjectPurchase::class;
				break;
			case 'yxdj':
				$model = IntentionalParty::class;
				break;
		}
		return $model;
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
					case 19://挂牌
						$json_result = $JgptService->sendGpData($project->detail_id);
						break;
					case 29://流标
						// $json_result = $JgptService->lbNotice($project->detail_id);
						break;
					case 39://中止公告
						// $json_result = $JgptService->pause($project_id);
						break;
					case 49://终结公告
						// $json_result = $JgptService->end($project_id);
						break;
					case 59://竞价结果
						$json_result = $JgptService->jjResult($project_id);
						break;
					case 69://评标结果
						$json_result = $JgptService->pbResult($project_id);
						break;
					case 89://中标通知
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