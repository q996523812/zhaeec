<?php

namespace App\Admin\Controllers;

use App\Models\Project;
use App\Models\ProjectPurchase;
use App\Models\ProjectLease;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\ProcessService;

class ProjectsController extends Controller
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
        $grid = new Grid(new Project);

        // $grid->id('Id');
        $grid->xmbh('项目编号');
        $grid->title('项目名称');
        $grid->type('项目类型');
        $grid->price('挂牌金额');
        $grid->gp_date_start('挂牌开始时间');
        $grid->gp_date_end('挂牌结束时间');
        $grid->process('状态');
        $grid->user_id('项目经理');
        // $grid->column('work_process_instances.work_process_node_id');
        // $grid->column('WorkProcessInstance.code');
        
        $user = Admin::user();
        $role = $user->roles()->first();
        if($user->id != 1){
            $grid->model()->whereIn('id',$this->getProjectIds());
        }
        // $grid->model()->instance()->node()->where('role_id',$role->id);
        
        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('title', '项目名称');
            $filter->like('xmbh', '项目编号');

        });
        $grid->actions(function ($actions) use($user){
            // $actions->disableView();
            $actions->disableDelete();
            $actions->disableEdit();
            // 当前行的数据数组
            $rec = $actions->row;
            // $aprovePage = $this->getAprovePage($rec->type);
            $fbnodes = array('19','29','39','49');
            if(in_array($rec->process,$fbnodes) ){
                $actions->append("<a href='/admin/projects/showapproval/$rec->id' style='float: left'><i class='fa fa-edit'>发布</i></a>");
            }
            else{
                $actions->append("<a href='/admin/projects/showapproval/$rec->id' style='float: left'><i class='fa fa-edit'>审批</i></a>");
            }
            
        });
        $grid->disableCreateButton();//禁用新增按钮
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
        $show = new Show(Project::findOrFail($id));

        $show->id('Id');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->type('Type');
        $show->price('Price');
        $show->gp_date_start('Gp date start');
        $show->gp_date_end('Gp date end');
        $show->status('Status');
        $show->djl('Djl');
        $show->user_id('User id');
        $show->detail_id('Detail id');
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
        $form = new Form(new Project);

        $form->text('xmbh', 'Xmbh');
        $form->text('title', 'Title');
        $form->text('type', 'Type');
        $form->decimal('price', 'Price');
        $form->datetime('gp_date_start', 'Gp date start')->default(date('Y-m-d H:i:s'));
        $form->datetime('gp_date_end', 'Gp date end')->default(date('Y-m-d H:i:s'));
        $form->number('status', 'Status')->default(1);
        $form->number('djl', 'Djl');
        $form->number('user_id', 'User id');
        $form->text('detail_id', 'Detail id');

        return $form;
    }

    private function getProjectIds(){
        $user = Admin::user();
        $roles = $user->roles()->pluck('id');

        $projectids = DB::table('work_process_instances')
            ->leftJoin('work_process_nodes','work_process_instances.work_process_node_id','=','work_process_nodes.id')
            ->whereIn('work_process_nodes.role_id',$roles)
            ->pluck('work_process_instances.project_id');

        return $projectids;
    }

    private function getAprovePage($projecttype){
        $aproveAage = '';
         
         
        // 'qycg'  => '1',
        // 'zczl'  => '2',
        // 'qycq'  => '3',
        // 'zzkg'  => '4'
        // 'xxypl' => '5',
         
        switch($projecttype){
            case 'qycg':
                $aproveAage = 'projectpurchases';
                break;
            case 'zczl':
                $aproveAage = 'projectleases';
                break;
                 
        }
        return $aproveAage;
    }

    /**
    自定义JS效果：
    1、Admin::script($script);可直接传JS代码
    2、还有个更好的办法： $form->html( view('admin.public.test') ); 然后在"admin.public.test"这个模板里面写js脚本实现你想要的页面效果
    **/
    public function showapproval($id, Content $content)
    {

        $records = DB::table('work_process_records')->leftJoin('admin_users','work_process_records.user_id','.admin_users.id')    ->where('work_process_records.project_id','=',$id)
                ->select('work_process_records.operation','admin_users.name','work_process_records.created_at')
                ->get();
        $pbresults = Project::find($id)->pbResults()->get();
        $url = '';
        $detail = null;
        switch(Project::find($id)->type){
            case 'qycg':
                    $detial = Project::find($id)->projectPurchase()->first();        
                    $url = 'admin.project.purchase.approval';
                break;
            case 'zczl':
                    $detial = ProjectLease::where('project_id',$id)->first();        
                    $url = 'admin.project.lease.approval';
                break;
                 
        }
        $datas = [
            'project' => $detial,
            'records' => $records,
            'pbresults' => $pbresults,
        ]; 
        return $content
            ->header('审批')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view($url, $datas));  
    }

    public function approval($id,Request $request,ProcessService $processService){
        $reason = $request->reason;
        $operation = $request->operation;
        $process = $request->process;
        DB::transaction(function () use($id,$reason,$operation,$process,$processService) {
            $processService->next($id,$reason,$operation,$nodecode=null);
            $processService->postGZW($id,$process);
        });
        
        return redirect('/admin/projects');
        // return [];
    }

}
