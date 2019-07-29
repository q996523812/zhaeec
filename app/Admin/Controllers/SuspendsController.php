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
use App\Services\SuspendService;

class SuspendsController extends Controller
{
    use HasResourceActions;
    protected $suspendService;

    // 利用 Laravel 的自动解析功能注入 Service 类
    public function __construct(SuspendService $suspendService)
    {
        $this->suspendService = $suspendService;
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

    private function suspend($project_id,$projecttype,$suspend_name,$process, Content $content){
        $project = Project::find($project_id);
        $suspend = Suspend::where('project_id',$project_id)->Where('type',$suspend_name)->first();
        if($suspend->doesntExist()){
            $suspend = new Suspend();
            $suspend->type = $suspend_name;
        }
        $datas = [
            'project' => $project,
            'projecttype' => $projecttype,
            'suspend' => $suspend,
            'process' => $process,
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
            'projecttype' => $project->type,
            'suspend' => $suspend,
            'process' => 31
        ]; 

        $url = 'admin.suspend.edit';   
        return $content
            ->header('中止公告')
            ->body(view($url, $datas));             
    }  
    //恢复挂牌
    public function recover($id, Content $content){
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
            'projecttype' => $project->type,
            'suspend' => $suspend,
        ]; 

        $url = 'admin.suspend.recover';   
        return $content
            ->header('中止公告')
            ->body(view($url, $datas));             
    }      
    //终结公告显示编辑页面
    public function end($id, Content $content){
        $project = Project::find($id);
        $suspend = Suspend::where('project_id',$id)->Where('type','终结公告')->first();
        if($suspend == null || $suspend->doesntExist()){
            $suspend = new Suspend();
            $suspend->type = '终结公告';
        }
        $datas = [
            'project' => $project,
            'projecttype' => $project->type,
            'suspend' => $suspend,
            'process' => 41
        ]; 
        $url = 'admin.suspend.edit';   
        return $content
            ->header('终结公告')
            ->body(view($url, $datas));
    } 

    private function fields(){
        $fields = [
            'suspend' => ['id','xmbh','title','type','content','date_matter','date_inscription','project_id'],
        ];
        return $fields;
    }
    public function add(Request $request){
        $data_suspend = $request->only($this->fields()['suspend']);
        //$project_id = $request->project_id;
        $process = $request->process;

        // $service = new SuspendService();
        // $suspend = $service->add($data_suspend,$process);
        
        $suspend = $this->suspendService->add($data_suspend,$process);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'id' => $suspend->id,
            'status_code' => '200'
        ];
        return response()->json($result);
        // return admin_success('title1', '保存成功');
    }

    public function update(Request $request){
        $id = $request->id;
        $data_suspend = $request->only($this->fields()['suspend']);
        $detail_id = $request->detail_id;
        $project_id = $request->project_id;
        $process = $request->process;

        // $service = new SuspendService();
        // $service->update($id,$data_suspend);
        $this->suspendService->update($id,$data_suspend);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];

        return response()->json($result);
    }

    public function submit($project_id,Request $request){
        // $detail_id = $request->id;
        // $project_id = $request->project_id;
        // $bulletin = $request->only(['xmbh','title','type','content','date_matter','date_inscription','project_id']);
        $id = $request->id;
        // 修改项目主表、明细表节点
        $this->suspendService->submit($project_id,$id);
        return redirect()->route('projectleases.index');
    }  


}
