<?php

namespace App\Admin\Controllers;

use App\Models\Suspend;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
// use app\Services\SuspendService;

class SuspendsController extends Controller
{
    use HasResourceActions;
    // protected $suspendService;

    // // 利用 Laravel 的自动解析功能注入 Service 类
    // public function __construct(SuspendService $suspendService)
    // {
    //     $this->suspendService = $suspendService;
    // }
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
        $detail = ProjectLease::find($id);
        $datas = [
            'detail' => $detail,
            'projecttype' => 'projectleases',
        ]; 
        $url = 'admin.suspend.edit';   
        return $content
            ->header('公告')
            ->body(view($url, $datas));
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

    private function suspend($project_id,$suspend_name){
        $project = Project::find($project_id);
        $suspend = Suspend::where('project_id',$project_id)->Where('type',$suspend_name)->first();
        $datas = [
            'project' => $project,
            'projecttype' => 'projectleases',
            'suspend' => $suspend,
        ]; 
        $url = 'admin.suspend.edit';   
        return $content
            ->header($suspend_name)
            ->body(view($url, $datas)); 
    }
    //中止公告显示编辑页面
    public function pause($id, Content $content){
        $project = Project::find($id);
        $suspend = Suspend::where('project_id',$id)->Where('type','中止公告');
        if($suspend->doesntExist()){
            $suspend = new Suspend();
            $suspend->type = '中止公告';
        }
        else{
            $suspend = $suspend->first();
        }
        $datas = [
            'project' => $project,
            'projecttype' => 'projectleases',
            'suspend' => $suspend,
        ]; 

        $url = 'admin.suspend.edit';   
        return $content
            ->header('中止公告')
            ->body(view($url, $datas));             
    }  
    //终结公告显示编辑页面
    public function end($id, Content $content){
        $project = Project::find($id);
        $suspend = Suspend::where('project_id',$id)->andWhere('type','终结公告')->first();
        if($suspend->doesntExist()){
            $suspend = new Suspend();
        }
        $datas = [
            'project' => $project,
            'projecttype' => 'projectleases',
            'suspend' => $suspend,
        ]; 
        $url = 'admin.suspend.edit';   
        return $content
            ->header('终结公告')
            ->body(view($url, $datas));
    } 

    public function submit(Request $request){
        $detail_id = $request->id;
        $project_id = $request->project_id;
        $bulletin = $request->only(['xmbh','title','type','content','date_matter','date_inscription','project_id']);
        // 1、保存中止公告
        // 2、修改项目主表、明细表节点
        // $this->suspendService->suspend($detail_id);
        return redirect()->route('projectleases.index');
    }  

}
