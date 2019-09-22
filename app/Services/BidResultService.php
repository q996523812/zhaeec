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

    public function insert($project){
        $data['id'] = (string)Str::uuid();
        $model = DB::transaction(function () use($project,$data) {
        	$model = $project->bidResult()->create($data);
		    return $model;
		});
        return $model;
	}

	public function submit($project){
		$projectService = new ProjectService();
		$projectService->submit($project,'成交确认书录入');
	}
}