<?php

namespace App\Admin\Controllers;

use App\Models\WorkProcess;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class WorkProcessesController extends Controller
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
        $grid = new Grid(new WorkProcess);

        $grid->id('id');
        $grid->code('流程编号');
        $grid->name('流程名称');
        $grid->projecttype('项目类型');

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
        $show = new Show(WorkProcess::findOrFail($id));

        $show->id('Id');
        $show->code('Code');
        $show->name('Name');
        $show->projecttyp('projecttype');
        $show->status('Status');
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
        $form = new Form(new WorkProcess);

        $form->text('code', '流程编号');
        $form->text('name', '流程名称');
        $form->select('projecttype', '项目类型')->options(['qycq' => '企业产权', 'qycg'=> '企业采购', 'zczl'=> '资产租赁']);
        $form->hidden('status', 'Status')->default(1);
        return $form;
    }

    public function add(Request $request){
        $data = $request->only(['id','code','name','projecttype']);
        $process = new WorkProcess($data);
        $process->id = (string)Str::uuid();
        $process->save();
        return redirect()->route('workprocess.index');
    }

    public function update(Request $request){
        $id = $request->id;
        $data = $request->only(['code','name','projecttype']);
        WorkProcess::find($id)->update($data);
        return redirect()->route('workprocess.index');
    }
}
