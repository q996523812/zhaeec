<?php

namespace App\Services;

use App\Models\PaymentNotice;
use App\Models\Project;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class PaymentNoticeService
{
	public function __construct()
    {

    }

    public function save($project_id,$data){
        $project = Project::find($project_id);
        $paymentNotice = $project->paymentNotice;
        $model = null;
        if(empty($paymentNotice)){
            $model = $this->insert($project,$data);
        }
        else{
            $model = $this->modify($paymentNotice,$data);
        }
        return $model;
    }

    public function insert($project,$data){
        $data['id'] = (string)Str::uuid();
        $model = DB::transaction(function () use($project,$data) {
        	$model = $project->paymentNotice()->create($data);
		    return $model;
		});
        return $model;
	}

    public function modify($paymentNotice,$data){
        $model = DB::transaction(function () use($paymentNotice,$data) {
        	$model = $paymentNotice->update($data);
		    return $model;
		});
        return $model;
	}

	public function submit($project){
		$projectService = new ProjectService();
		$projectService->submit($project,'成交公告录入');
	}
}