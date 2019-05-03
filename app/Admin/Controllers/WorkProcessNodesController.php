<?php

namespace App\Admin\Controllers;

use App\Models\WorkProcessNode;
use App\Models\WorkProcess;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class WorkProcessNodesController extends Controller
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
        $grid = new Grid(new WorkProcessNode);

        $grid->id('Id');
        $grid->work_process_id('Work process id');
        $grid->code('节点编号');
        $grid->name('节点名称');
        $grid->seq('序号');
        $grid->role_id('角色');
        // $grid->jurisdiction('Jurisdiction');
        $grid->back_node_code('上一节点');
        $grid->next_node_code('下一节点');
        // $grid->created_at('Created at');
        // $grid->updated_at('Updated at');

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
        $show = new Show(WorkProcessNode::findOrFail($id));

        $show->id('Id');
        $show->work_process_id('Work process id');
        $show->code('节点编号');
        $show->name('节点名称');
        $show->seq('序号');
        $show->role_id('角色');
        // $show->jurisdiction('Jurisdiction');
        $show->back_node_code('上一节点');
        $show->next_node_code('下一节点');
        // $show->created_at('Created at');
        // $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WorkProcessNode);

        $roleModel = config('admin.database.roles_model');

        $form->select('work_process_id', '流程')->options(WorkProcess::all()->pluck('name','id'));
        $form->text('code', '节点编号');
        $form->text('name', '节点名称');
        $form->number('seq', '序号');
        $form->select('role_id', '角色')->options($roleModel::all()->pluck('name', 'id'))->rules('required');
        $form->hidden('jurisdiction', 'Jurisdiction');
        $form->text('back_node_code', '上一节点');
        $form->text('next_node_code', '下一节点');

        return $form;
    }

    public function add(Request $request){
        $data = $request->only(['work_process_id','code','name','seq','role_id','jurisdiction','back_node_code','next_node_code']);
        $process = new WorkProcessNode($data);
        $process->id = (string)Str::uuid();
        $process->save();
        return redirect()->route('workprocessnodes.index');
    }

    public function update(Request $request){
        $id = $request->id;
        $data = $request->only(['code','name','seq','role_id','jurisdiction','back_node_code','next_node_code']);
        WorkProcessNode::find($id)->update($data);
        return redirect()->route('workprocessnodes.index');
    }    
}
