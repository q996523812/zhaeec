<?php

namespace App\Services;

use App\Models\Project;
use App\Models\ProjectLease;
use App\Models\ProjectPurchase;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ProjectBaseService
{
	public $project_type_code;
	public $model_class;

	public function getList(){
		$user = Admin::user();
		$purchases = $this->model_class::where('user_id',$user_id->id);
		return $purchases;
	}

	public function add($data_detail,$data_project,$process){
		$user = Admin::user();
        $uuid_project =  (string)Str::uuid();
        $uuid_purchase =  (string)Str::uuid();
        $projectCodeService = new ProjectCodeService();
        $projectcode = $projectCodeService->create(9);
        $workProcessNodeService = new WorkProcessNodeService();
        $node = $workProcessNodeService->find($this->project_type_code,$process);

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
        $data_project['type'] = $this->project_type_code;
        $data_project['process'] = $process;
        $data_project['process_name'] = $node->name;

        
        $detail = DB::transaction(function () use($data_detail,$data_project) {
			$detail = $this->model_class::create($data_detail);
		    $project = $detail->project()->create($data_project);
		    return $detail;
		});
        return $detail;
	}

	public function update($id,$data_detail,$data_project){
		DB::transaction(function () use($id,$data_detail,$data_project) {
			$detail = $this->model_class::find($id);
			$detail->update($data_detail);
			$detail->project()->update($data_project);		
		});
	}

	public function submit($id){
		$process = 13;
		$detail = $this->model_class::find($id);
		$project = $detail->project;
		$detail->process = $process;
		$project->process = $process;
		
		DB::transaction(function () use($detail) {
			$process = new ProcessService();
			$process->create($this->project_type_code,$detail->id,'提交',13);
		});
	}	

	/** 确认摘牌/流标
     *@param $id 项目主表ID
     */
	public function zp($id,$process,$operation){
		DB::transaction(function () use($id,$process,$operation) {
            //流程
            $process = new ProcessService();
            $process->next($id,null,$operation,$process);
        });
	}

	/**保存竞价结果
	 *$yxf_id 中标方ID
	 */
	public function jj($yxf_id){
		DB::transaction(function () use($yxf_id) {
			$yxf = IntentionalParty::find($yxf_id);
			$yxf->is_win = 1;
			$yxf->save();
		});
	}

	
}