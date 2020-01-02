<?php

namespace App\Services;

use App\Models\Announcement;
use App\Models\Project;
use Illuminate\Support\Str;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;

class AnnouncementService
{
	public function __construct()
    {

    }

    public function save($project_id,$data){
        $project = Project::find($project_id);
        $announcements = $project->announcements;
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
        $data['project_id'] = $project->id;
        $data['process'] = 1;
        $model = DB::transaction(function () use($project,$data) {
            $model = Announcement::create($data);
        	// $model = $project->announcements()->create($data);
		    return $model;
		});
        return $model;
	}

    public function modify($id,$data){
        $announcement = Announcement::find($id);
        $model = DB::transaction(function () use($announcement,$data) {
        	$model = $announcement->update($data);
		    return $model;
		});
        return $model;
	}

	public function submit($project,$model){
		
        $model = DB::transaction(function () use($project,$model) {
            $operation = $this->getAnnouncementTypeName($model->type).'录入';
            $projectService = new ProjectService();
            $projectService->submit($project,$operation);

            // $model->update(['process'=>$model->project->process]);
            return $model;
        });
	}

    public function choice($id,$process,$operation){
        DB::transaction(function () use($id,$process,$operation) {
            //流程
            $processService = new ProcessService();
            $processService->next($id,null,$operation,$process);
        });
    }

    public function getGGbyType($project,$type){
        $announcement = $project->announcements()->where('type',$type)->whereIn('process',[1,2])->first();
        return $announcement;
    }
    public function getAnnouncementTypeName($type){
        $name = '';
        switch ($type) {
            case 1:
                $name = '中止公告';
                break;
            case 2:
                $name = '恢复公告';
                break;
            case 3:
                $name = '终结公告';
                break;
            case 4:
                $name = '延期公告';
                break;
            case 5:
                $name = '变更公告';
                break;
        }
        return $name;
    }
}