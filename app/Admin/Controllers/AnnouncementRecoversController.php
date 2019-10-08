<?php

namespace App\Admin\Controllers;

use App\Models\Announcement;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;
use App\Services\AnnouncementService;

/**
 *恢复公告
 *
 */
class AnnouncementRecoversController extends AnnouncementsController
{
    public function __construct(AnnouncementService $announcementService)
    {
        $processes = [161,162,163,164,165,169];
        parent::__construct($announcementService,'hfgg',$processes);
    }


    public function approval($project_id, Content $content)
    {
    	$project = Project::find($project_id);

    	$model = $project->announcements()->where('type','hfgg')->where('process',$project->process)->first();
    	if(empty($model)){
    		throw new \Exception("找不到审批中的公告，请联系管理员");
    	}
        $datas = [
            'project' => $project,
            'id' => $model->id,
            'hfgg' => $model,
            'projecttype' => $this->module_type,
        ];
        return $content
            ->header('中止公告录入')
            // ->description('录入正式发布的成交公告')
            ->body(view('admin.gg.'.$this->module_type.'.approval', $datas)); 
    }

    public function print($id, Content $content)
    {
    	$model = Announcement::find($id);
    	$project = $model->project;
        $datas = [
            'project' => $project,
            'id' => $model->id,
            'hfgg' => $model,
            'projecttype' => $this->module_type,
        ];
        return view('admin.gg.'.$this->module_type.'.print', $datas);
    }

    public function choice($project_id,Request $request){
        $process = $this->processes[0];
        $operation = $request->operation;
        $project = Project::find($project_id);
        $this->service->choice($project->detail->id,$process,'中止');
        return redirect()->route($project->type.'.index');
    }
}