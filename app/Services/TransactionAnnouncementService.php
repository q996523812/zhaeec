<?php

namespace App\Services;

use App\Models\TransactionAnnouncement;
use App\Models\Project;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class TransactionAnnouncementService
{
	public function __construct()
    {

    }

    public function save($project_id,$data){
        $project = Project::find($project_id);
        $transaction = $project->transactionAnnouncement;
        $model = null;
        if(empty($transaction)){
            $model = $this->insert($project,$data);
        }
        else{
            $model = $this->modify($transaction,$data);
        }
        return $model;
    }

    public function insert($project,$data){
        $data['id'] = (string)Str::uuid();
        $model = DB::transaction(function () use($project,$data) {
        	$model = $project->transactionAnnouncement()->create($data);
		    return $model;
		});
        return $model;
	}

    public function modify($transaction,$data){
        $model = DB::transaction(function () use($transaction,$data) {
        	$model = $transaction->update($data);
		    return $model;
		});
        return $model;
	}

	public function submit($project){
		$projectService = new ProjectService();
		$projectService->submit($project,'成交公告录入');
	}
}