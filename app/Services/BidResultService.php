<?php

namespace App\Services;

use App\Models\BidResult;
use App\Models\Project;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class BidResultService
{
	public function __construct()
    {

    }

    public function save($project_id,$data){
        $project = Project::find($project_id);
        $bidResult = $project->bidResult;
        $model = null;
        if(empty($bidResult)){
            $model = $this->insert($project,$data);
        }
        else{
            $model = $this->modify($bidResult,$data);
        }
        return $model;
    }

    public function insert($project,$data){
        $data['id'] = (string)Str::uuid();
        $model = DB::transaction(function () use($project,$data) {
        	$model = $project->bidResult()->create($data);
		    return $model;
		});
        return $model;
	}

    public function modify($bidResult,$data){
        $model = DB::transaction(function () use($bidResult,$data) {
        	$model = $bidResult->update($data);
		    return $model;
		});
        return $model;
	}

	public function submit($project){
		$projectService = new ProjectService();
		$projectService->submit($project,'成交确认书录入');
	}
}