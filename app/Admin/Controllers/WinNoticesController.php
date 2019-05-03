<?php

namespace App\Admin\Controllers;

use App\Models\WinNotice;
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
use App\Services\ProcessService;

class WinNoticesController extends Controller
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
        $grid = new Grid(new WinNotice);

        $grid->type('项目类型');
        $grid->tzsbh('通知书编号');
        $grid->xmbh('项目编号');
        $grid->title('标的名称');
        // $grid->zbnr('中标内容');
        $grid->zbr('中标方名称');
        $grid->zbf_phone('中标方手机号');
        // $grid->zbf_lx_1('中标方类型1');
        // $grid->zbf_lx_2('中标方类型2');
        $grid->jysj('交易时间');
        $grid->cjj_zj('成交总价');
        $grid->cjj_dj('成交单价');
        // $grid->cjj_bz('成交价格备注');
        // $grid->jyfs('交易方式');
        // $grid->jycd('交易场地');
        // $grid->zbf_qy('中标方所属区域');
        // $grid->zbhyq('Zbhyq');
        // $grid->tzs_fs('Tzs fs');
        // $grid->tzs_fs_1('Tzs fs 1');
        // $grid->tzs_fs_2('Tzs fs 2');
        // $grid->tzs_fs_3('Tzs fs 3');
        // $grid->tzs_fs_4('Tzs fs 4');
        // $grid->notes('Notes');
        // $grid->issue_time('Issue time');
        // $grid->file_path('File path');
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
        $show = new Show(WinNotice::findOrFail($id));

        $show->id('Id');
        $show->project_id('Project id');
        $show->type('Type');
        $show->tzsbh('Tzsbh');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->zbnr('Zbnr');
        $show->zbr('Zbr');
        $show->zbf_phone('Zbf phone');
        $show->zbf_lx_1('Zbf lx 1');
        $show->zbf_lx_2('Zbf lx 2');
        $show->jysj('Jysj');
        $show->cjj_zj('Cjj zj');
        $show->cjj_dj('Cjj dj');
        $show->cjj_bz('Cjj bz');
        $show->jyfs('Jyfs');
        $show->jycd('Jycd');
        $show->zbf_qy('Zbf qy');
        $show->zbhyq('Zbhyq');
        $show->tzs_fs('Tzs fs');
        $show->tzs_fs_1('Tzs fs 1');
        $show->tzs_fs_2('Tzs fs 2');
        $show->tzs_fs_3('Tzs fs 3');
        $show->tzs_fs_4('Tzs fs 4');
        $show->notes('Notes');
        $show->issue_time('Issue time');
        $show->file_path('File path');
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
        $form = new Form(new WinNotice);

        $form->text('project_id', 'Project id');
        $form->text('type', '项目类型');
        $form->text('tzsbh', '通知书编号');
        $form->text('xmbh', '项目编号');
        $form->text('title', '标的名称');
        $form->text('zbnr', '中标内容');
        $form->text('zbr', '中标方名称');
        $form->text('zbf_phone', '中标方手机号码');
        $form->text('zbf_lx_1', '中标方类型1');
        $form->text('zbf_lx_2', '中标方类型2');
        $form->datetime('jysj', '交易时间')->default(date('Y-m-d'));
        $form->decimal('cjj_zj', '成交总价(万元)');
        $form->decimal('cjj_dj', '成交单价（万元）');
        $form->text('cjj_bz', '成交价格备注');
        $form->text('jyfs', '交易方式');
        $form->text('jycd', '交易场地');
        $form->text('zbf_qy', '中标方所属区域');
        $form->number('zbhyq', 'Zbhyq');
        $form->number('tzs_fs', 'Tzs fs');
        $form->number('tzs_fs_1', 'Tzs fs 1');
        $form->number('tzs_fs_2', 'Tzs fs 2');
        $form->number('tzs_fs_3', 'Tzs fs 3');
        $form->number('tzs_fs_4', 'Tzs fs 4');
        $form->textarea('notes', '备注');
        $form->datetime('issue_time', '盖章时间')->default(date('Y-m-d'));
        $form->file('file_path', 'File path');

        return $form;
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function insert($project_id, Content $content)
    {
        
        $project = Project::find($project_id);
        $datas = [
            'project' => $project,
        ]; 
        // dump($project);
        // return [];
        return $content
            ->header('中标通知书')
            ->body(view('admin.project.zbnotice.insert', $datas));  
    }


    public function add(Request $request,ProcessService $processService){
        $data = $request->all();
        $data['id'] = (string)Str::uuid();
        DB::transaction(function () use($data,$processService) {
            $winNotice = WinNotice::create($data);
            $processService->next($winNotice->project_id,null,'录入中标通知书',$nodecode=null);
        });
        return redirect()->route('winnotices.index');
    }
}
