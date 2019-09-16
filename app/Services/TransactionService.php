<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\Project;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class TransactionService
{
	public function __construct()
    {

    }

    public function insert($project_id,$data){
    	$project = Project::find($project_id);
        $model = DB::transaction(function () use($project,$data) {
        	$model = $project->transaction()->create($data);
		    return $model;
		});
        return $model;
	}

    public function modify($id,$data){
    	$transaction = Transaction::find($id);
        $model = DB::transaction(function () use($transaction,$data) {
        	$model = $transaction->update($data);
		    return $model;
		});
        return $model;
	}

	public function submit($project){
		$projectService = new ProjectService();
		$projectService->submit($project,'成交信息录入');
	}
}