<?php

namespace App\Services;

use App\Models\Contract;
use App\Models\Project;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class ContractService
{
	public function __construct()
    {

    }

    public function save($project_id,$data){
        $project = Project::find($project_id);
        $contract = $project->contract;
        $model = null;
        if(empty($contract)){
            $model = $this->insert($project,$data);
        }
        else{
            $model = $this->modify($contract,$data);
        }
        return $model;
    }

    public function insert($project,$data){
        $data['id'] = (string)Str::uuid();
        $model = DB::transaction(function () use($project,$data) {
        	$model = $project->contract()->create($data);
		    return $model;
		});
        return $model;
	}

    public function modify($contract,$data){
        $model = DB::transaction(function () use($contract,$data) {
        	$model = $contract->update($data);
		    return $model;
		});
        return $model;
	}

	public function submit($project){
		$projectService = new ProjectService();
		$projectService->submit($project,'成交确认书录入');
	}
}