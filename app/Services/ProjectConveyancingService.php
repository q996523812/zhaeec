<?php

namespace App\Services;

use App\Models\ProjectConveyancing;
use App\Models\Project;
use App\Models\IntentionalParty;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ProjectConveyancingService extends ProjectBaseService
{
	public function __construct()
    {
    	$this->project_type_code = 'cqzr';
        $this->model_class = ProjectConveyancing::class;
    }

	public function add($data_detail,$data_project,$process){
		$user = Admin::user();
        $uuid_project =  (string)Str::uuid();
        $uuid_purchase =  (string)Str::uuid();
        $projectCodeService = new ProjectCodeService();
        $projectcode = $projectCodeService->create($this->project_type_code);
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
        $data_project['title'] = $data_detail['title'];
        $data_project['price'] = $data_detail['gpjg'];
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

}