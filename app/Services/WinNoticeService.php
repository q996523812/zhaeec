<?php

namespace App\Services;

use App\Models\WinNotice;
use App\Models\Project;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class WinNoticeService
{
    public function __construct()
    {

    }

    public function save($project_id,$data){
        $project = Project::find($project_id);
        $winNotice = $project->winNotice;
        $model = null;
        if(empty($winNotice)){
            $model = $this->insert($project,$data);
        }
        else{
            $model = $this->modify($winNotice,$data);
        }
        return $model;
    }

    public function insert($project,$data){
        $data['id'] = (string)Str::uuid();
        $model = DB::transaction(function () use($project,$data) {
            $model = $project->winNotice()->create($data);
            return $model;
        });
        return $model;
    }

    public function modify($winNotice,$data){
        $model = DB::transaction(function () use($winNotice,$data) {
            $model = $winNotice->update($data);
            return $model;
        });
        return $model;
    }

    public function submit($project){
        $projectService = new ProjectService();
        $projectService->submit($project,'中标通知录入');
    }
}