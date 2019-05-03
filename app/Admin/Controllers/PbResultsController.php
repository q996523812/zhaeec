<?php

namespace App\Admin\Controllers;

use App\Models\PbResult;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Handlers\FileUploadHandler;
use App\Services\PbResultService;

class PbResultsController extends Controller
{
    use HasResourceActions;

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
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
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
        $grid = new Grid(new PbResult);
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('xmbh', '项目编号');
            $filter->like('title', '项目名称');
        });
        // $grid->id('Id');
        // $grid->project_id('Project id');
        $grid->xmbh('项目编号');
        $grid->title('项目名称');
        $grid->tbr('投标人');
        $grid->jjf('经济分');
        $grid->jsf('技术分');
        $grid->zf('总分');
        $grid->tbbj('投标报价');
        $grid->pm('排名');
        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
            // $actions->disableEdit();
        });
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
        $show = new Show(PbResult::findOrFail($id));

        // $show->id('Id');
        // $show->project_id('Project id');
        $show->xmbh('项目编号');
        $show->title('项目名称');

        $show->tbr('投标人');
        $show->jjf('经济分');
        $show->jsf('技术分');
        $show->zf('总分');
        $show->tbbj('投标报价');
        $show->pm('排名');

        $show->panel()->tools(function ($tools) {
            $tools->disableEdit();
            // $tools->disableList();
            $tools->disableDelete();
        });
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PbResult);

        $form->hidden('project_id', 'Project id');
        $form->text('xmbh', '项目编号');
        $form->text('title', '项目名称');
        $form->text('tbr', '投标人');
        $form->text('jjf', '经济分');
        $form->text('jsf', '技术分');
        $form->text('zf', '总分');
        $form->decimal('tbbj', '投标报价');
        $form->text('pm', '排名');
        $form->file('filepath','附件');

        return $form;
    }

    public function add(Request $request,FileUploadHandler $uploader){
        $data = $request->all();
        $tbbj = $request->only(['xmbh','title','tbr','jjf','jsf','zf','tbbj','pm']);
        $project = Project::where('xmbh',$request->xmbh)->first();
        $tbbj['project_id']=$project->id;
        $tbbj['title']=$project->title;
        
        DB::transaction(function () use($tbbj) {
            PbResult::create($tbbj);
        });
        return redirect()->route('projectpurchase.index');
    }

    public function update(Request $request,FileUploadHandler $uploader,ProcessService $processService){
        $data = $request->all();
        $tbbj_id = $request->id;
        $tbbj = $request->only(['tbr','jjf','jsf','zf','tbbj','pm']);

        DB::transaction(function () use($tbbj_id,$tbbj) {
            PbResult::find($tbbj_id)->update($tbbj);
        });
        return redirect()->route('projectpurchase.index');
        // return [];
    }


    public function submit(Request $request,FileUploadHandler $uploader,ProcessService $processService){
        $data = $request->all();
        $tbbj_id = $request->id;
        $tbbj = $request->only(['tbr','jjf','jsf','zf','tbbj','pm']);
        $project = Project::where('xmbh',$request->xmbh);

        DB::transaction(function () {
            

        });
        
        return redirect()->route('projectpurchase.index');
    }


    public function insert(Request $request,FileUploadHandler $uploader){
        $result = [
            'success' => 'true',
            'message' => '',
            'pb_id' => '',
            'pb' => '',
        ];
        $tbbj = $request->only(['project_id','xmbh','title','tbr','jjf','jsf','zf','tbbj','pm']);
        $project = Project::where('xmbh',$request->xmbh)->get();
        if($project->isEmpty()){
            $result['success'] = 'false';
            $result['message'] = '项目不存在';
            
            return $this->response->array($result);
        }
        $result["pb_id"] = $tbbj;
        $result["pb"] = DB::transaction(function () use($tbbj,$result) {
            $pb = PbResult::create($tbbj);
            return $pb->toArray();            
        });
        // return [];
        // return $this->response->array($result);
        return json_encode($result);
    }
 

}
