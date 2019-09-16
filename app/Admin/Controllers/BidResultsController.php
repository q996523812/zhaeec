<?php

namespace App\Admin\Controllers;

use App\Models\BidResult;
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
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $detail = $project->detail;
        $model = $project->bidResult;
        if(empty($model)){
            $data = ['project_id'=>$project_id];
            $model = $this->service->save($project_id,$data);
        }

        $datas = [
            'detail' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('上传合同')
            // ->description('录入正式发布的成交公告')
            ->body(view('admin.'.$this->module_type.'.edit', $datas)); 
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
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
        $model = $project->contract;
        $datas = [
            'detail' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('合同信息审批')
            ->body(view('admin.'.$this->module_type.'.approval', $datas)); 
    }
}
