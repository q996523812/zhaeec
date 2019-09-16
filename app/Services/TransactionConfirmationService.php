<?php

namespace App\Services;

use App\Models\TransactionConfirmation;
use App\Models\Project;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class TransactionConfirmationService
{
	public function __construct()
    {

    }

    public function save($project_id,$data){
        $project = Project::find($project_id);
        $transactionConfirmation = $project->transactionConfirmation;
        $model = null;
        if(empty($transactionConfirmation)){
            $model = $this->insert($project,$data);
        }
        else{
            $model = $this->modify($transactionConfirmation,$data);
        }
        return $model;
    }

    public function insert($project,$data){
        $data['id'] = (string)Str::uuid();
        $model = DB::transaction(function () use($project,$data) {
        	$model = $project->transactionConfirmation()->create($data);
		    return $model;
		});
        return $model;
	}

    public function modify($transactionConfirmation,$data){
        $model = DB::transaction(function () use($transactionConfirmation,$data) {
        	$model = $transactionConfirmation->update($data);
		    return $model;
		});
        return $model;
	}

	public function submit($project){
		$projectService = new ProjectService();
		$projectService->submit($project,'成交确认书录入');
	}
}