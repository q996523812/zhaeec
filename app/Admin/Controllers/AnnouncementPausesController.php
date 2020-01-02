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
 *中止公告
 *
 */
class AnnouncementPausesController extends AnnouncementsController
{
    public function __construct(AnnouncementService $announcementService)
    {
        $processes = [151,152,153,154,155,159];
        parent::__construct($announcementService);
        $this->module_type = 'zzgg';
    }

    public function print($id, Content $content)
    {
    	$model = Announcement::find($id);
    	$project = $model->project;
        $datas = [
            'project' => $project,
            'id' => $model->id,
            'zzgg' => $model,
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