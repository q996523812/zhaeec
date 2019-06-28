<?php

namespace App\Admin\Controllers;

use App\Models\Suspend;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SuspendsController extends Controller
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
        $grid = new Grid(new Suspend);

        $grid->id('Id');
        $grid->xmbh('Xmbh');
        $grid->title('Title');
        $grid->type('Type');
        $grid->content('Content');
        $grid->date_matter('Date matter');
        $grid->date_start('Date start');
        $grid->date_end('Date end');
        $grid->date_inscription('Date inscription');
        $grid->project_id('Project id');
        $grid->status('Status');
        $grid->process('Process');
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
        $show = new Show(Suspend::findOrFail($id));

        $show->id('Id');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->type('Type');
        $show->content('Content');
        $show->date_matter('Date matter');
        $show->date_start('Date start');
        $show->date_end('Date end');
        $show->date_inscription('Date inscription');
        $show->project_id('Project id');
        $show->status('Status');
        $show->process('Process');
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
        $form = new Form(new Suspend);

        $form->text('xmbh', 'Xmbh');
        $form->text('title', 'Title');
        $form->text('type', 'Type');
        $form->textarea('content', 'Content');
        $form->datetime('date_matter', 'Date matter')->default(date('Y-m-d H:i:s'));
        $form->datetime('date_start', 'Date start')->default(date('Y-m-d H:i:s'));
        $form->datetime('date_end', 'Date end')->default(date('Y-m-d H:i:s'));
        $form->datetime('date_inscription', 'Date inscription')->default(date('Y-m-d H:i:s'));
        $form->text('project_id', 'Project id');
        $form->number('status', 'Status')->default(1);
        $form->number('process', 'Process')->default(1);

        return $form;
    }

    public function suspendShow($id,Request $request){
        $detail = ProjectLease::find($id);
        $datas = [
            'detail' => $detail,
            'projecttype' => 'projectleases',
        ]; 
        $url = 'admin.project.lease.suspend';   
        return $content
            ->header('中止挂牌')
            ->body(view($url, $datas));             
    }   
    public function suspend(Request $request){
        $detail_id = $request->id;
        $project_id = $request->project_id;
        $bulletin = $request->only([]);
        // 1、保存中止公告
        // 2、修改项目主表、明细表节点
        $this->projectLeaseService->suspend($detail_id);
        return redirect()->route('projectleases.index');
    }    
}
