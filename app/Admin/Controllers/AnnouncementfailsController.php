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
class AnnouncementfailsController extends AnnouncementsController
{
    public function __construct(AnnouncementService $announcementService)
    {
        $processes = [231,232,233,234,235,239];
        parent::__construct($announcementService);
        $this->module_type = 'lbgg';
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