<?php

namespace App\Admin\Controllers;

use App\Models\BidResult;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\BidResultRequest;
use App\Services\BidResultService;
use App\Services\IntentionalPartyService;

class BidResultsController extends Controller
{
    use HasResourceActions;
    private $service;
    private $module_type;
    
    public function __construct(BidResultService $bidResultService)
    {
        $this->service = $bidResultService;
        $this->module_type = 'pbjg.list';
    }

    /**
     * 显示列表，不能进行新增、修改、删除等操作
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $datas = [
            'pbjg' => $project->bidResult,
        ]; 
        $url = 'admin.pbjg.list.edit';
        return $content
            ->header('评标结果')
            ->body(view($url, $datas));
    }

    /**
     * 显示列表，可以进行新增、修改、删除等操作
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $model = $project->bidResult;
        if(empty($model)){
            $model = $this->service->insert($project);
        }
        $datas = [
            'project' => $project,
            'id'=>$model->id,
            'pbjg' => $model,
            'files' => $model->files,
            'images' => $model->images,
            'projecttype' => 'pbjg',
        ]; 
        $url = 'admin.pbjg.list.edit';
        return $content
            ->header('评标结果')
            ->body(view($url, $datas));
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BidResult);

        $grid->id('Id');
        $grid->project_id('Project id');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(BidResult::findOrFail($id));

        $show->id('Id');
        $show->project_id('Project id');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BidResult);

        $form->text('project_id', 'Project id');

        return $form;
    }


    public function submit(Request $request){
        $id = $request->id;
        $bidResult = BidResult::find($id);
        $project = $bidResult->project;
        $this->service->submit($project);
        return redirect()->route($project->type.'.index');
    }

    public function approval($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $detail = $project->detail;
        $model = $project->bidResult;
        $datas = [
            'project' => $project,
            'pbjg' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('评标结果审批')
            ->body(view('admin.'.$this->module_type.'.approval', $datas)); 
    }
}
