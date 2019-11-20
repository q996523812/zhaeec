<?php

namespace App\Admin\Controllers;

use App\Models\IntentionalParty;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\IntentionalPartyService;
use Illuminate\Http\Request;
use App\Services\ProcessService;
use Illuminate\Support\Facades\Log;

class IntentionalPartiesController extends Controller
{
    use HasResourceActions;
    protected $service;

    // 利用 Laravel 的自动解析功能注入 Service 类
    public function __construct(IntentionalPartyService $intentionalPartyService)
    {
        $this->service = $intentionalPartyService;
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
        $model = IntentionalParty::find($id);
        $datas = [
            'project' => $model->project,
            'id'=>$model->id,
            'yxf' => $model,
            'projecttype' => 'yxdj',
            'files' => $model->files,
            'images' => $model->images,
        ]; 
        $url = 'admin.yxf.detail.show';   
        return $content
            ->header('编辑')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view($url, $datas)); 
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
        $model = IntentionalParty::find($id);
        $project = $model->project;
        $datas = [
            'project' => $project,
            'id'=>$model->id,
            'yxf' => $model,
            'projecttype' => 'yxdj',
            'files' => $model->files,
            'images' => $model->images,
        ]; 
        $url = 'admin.yxf.detail.edit';   
        return $content
            ->header('编辑')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view($url, $datas));  
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create($project_id,Content $content)
    {
        $project = Project::find($project_id);
        $model = new IntentionalParty();
        $model->project_id = $project_id;
        $datas = [
            'project' => $project,
            'id'=>$model->id,
            'yxf' => $model,
            'projecttype' => 'yxdj',
            'files' => $model->files,
            'images' => $model->images,
        ];
        $url = 'admin.yxf.detail.edit';
        return $content
            ->header('新增')
            ->body(view($url,$datas));  
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new IntentionalParty);
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('title', '项目名称');
            $filter->like('name', '意向方名称');
        });
        $grid->type('类型');
        $grid->name('意向方名称');
        $grid->created_at('登记时间')->display(function($created_at){            
            return date('Y-m-d',strtotime($created_at));
        });
        $grid->project_id('项目名称')->display(function($project_id){            
            return Project::find($project_id)->title;
        });
        $grid->process_name('状态');
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            
            $rec = $actions->row;
            $spnodes = array('13','14','15');
            if(in_array($rec->process,$spnodes) ){
                $actions->disableView();
                $actions->append("<a href='/admin/yxdj/showapproval/$rec->id' style='margin-left:10px;'><i class='fa fa-edit'>审批</i></a>");
            }
            
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
        $show = new Show(IntentionalParty::findOrFail($id));

        $show->id('Id');
        $show->type('Type');
        $show->name('Name');
        $show->id_type('Id type');
        $show->id_code('Id code');
        $show->deposit('Deposit');
        $show->is_win('Is win');
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
        $form = new Form(new IntentionalParty);

        $form->number('type', 'Type');
        $form->text('name', 'Name');
        $form->text('id_type', 'Id type');
        $form->text('id_code', 'Id code');
        $form->decimal('deposit', 'Deposit');
        $form->number('is_win', 'Is win');
        $form->text('project_id', 'Project id');
        $form->number('status', 'Status')->default(1);
        $form->number('process', 'Process');

        return $form;
    }

    private function fields(){
        $fields = [
            'insert' => ['customertype','name','id_type','id_code','province','city','area','isgz','registered_address','registered_capital','registered_capital_currency','found_date','legal_representative','industry1','industry2','companytype','economytype','scale','scope','credit_cer','work_unit','work_duty','contact_name','contact_phone','contact_email','contact_fax','account_code','account_bank','account_name','deposit','is_win','win_amount','project_id'],
            'update' => ['customertype','name','id_type','id_code','province','city','area','isgz','registered_address','registered_capital','registered_capital_currency','found_date','legal_representative','industry1','industry2','companytype','economytype','scale','scope','credit_cer','work_unit','work_duty','contact_name','contact_phone','contact_email','contact_fax','account_code','account_bank','account_name','deposit','is_win','win_amount'],
        ];
        return $fields;
    }
    public function add(Request $request){
        $insert = $request->only($this->fields()['insert']);

        $detail = $this->service->add($insert,11);
        // $detail = new IntentionalParty();
        $result = [
            'success' => 'true',
            'message' => $detail,
            'detail_id' => $detail->id,
            'project_id' => $detail->project_id,
            'status_code' => '200'
        ];
        return response()->json($result);
        // return admin_success('title1', '保存成功');
    }

    public function update(Request $request){
        $detail_id = $request->id;
        $update = $request->only($this->fields()['update']);

        $this->service->update($detail_id,$update,11);
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];

        return response()->json($result);
    }

    public function submit(Request $request){
        $id = $request->id;
        $this->service->submit($id);
        $project = IntentionalParty::find($id)->project;
        return redirect('admin/yxdj/list/edit/'.$project->id);
        // return back();
    }

    public function showapproval($id,Content $content){
        $model = IntentionalParty::find($id);
        $project = $model->project;
        $datas = [
            'project' => $project,
            'yxf' => $model,
            'projecttype' => 'yxdj',
            'files' => $model->files,
            'images' => $model->images,
        ]; 
        $url = 'admin.yxf.detail.approval';   
        return $content
            ->header('审批')
            ->body(view($url, $datas));
    } 

    public function approval(Request $request){
        $id = $request->id;
        
        $reason = $request->reason;
        $operation = $request->operation;
        $process = $request->process;
        $this->service->approval($id,$reason,$operation,null);
        return redirect()->route('yxdj.index');
    }
    public function showconfirm($id,Content $content){
        $model = IntentionalParty::find($id);
        $project = $model->project;
        $datas = [
            'project' => $project,
            'yxf' => $model,
            'projecttype' => 'yxdj',
            'files' => $model->files,
            'images' => $model->images,
        ]; 
        $url = 'admin.yxf.detail.confirm';   
        return $content
            ->header('意向登记')
            ->description('最后登记确认')
            ->body(view($url, $datas));         
    } 

    public function confirm(Request $request,ProcessService $processService,Content $content){
        $id = $request->id;
        $model = IntentionalParty::find($id);
        $reason = $request->reason;
        $operation = $request->operation;
        $process = $request->process;
        // $this->service->approval($id,$reason,$operation,null);

        $project = $model->project;
        $isSuccess = true;
        $message = '操作成功！';
        try{
            if($project->detail->sjly == '监管平台'){
                $sendNodes = ['19'];

                if(in_array($model->process,$sendNodes)){
                    Log::error('confirm  '.'111111111111111');
                    Log::error('confirm  '.$model->id);
                    $isSuccess = $processService->postYxfGZW($model->id,$model->process);
                }
            }
        }
        catch(\Exception $e){
            $isSuccess = false;
            Log::error($e);
        }

        if($isSuccess){
            return redirect('/admin/yxdj/list/edit/'.$project->id);
        }
        else{
            if($project->type === 'zczl'){
                $message = $project->xmbh.'审核成功，但自动接口消息发送失败，请前往“接收租赁项目”手动发送！';
            }
            else{
                $message = $project->xmbh.'审核成功，但自动接口消息发送失败，请前往“接收采购项目”手动发送！';
            }
            return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid())->withWarning('Warning', $message);
        }
        return redirect('admin/yxdj/list/edit/'.$model->project_id);
    }

    public function listEdit($project_id,Content $content){
        $project = Project::find($project_id);
        $yxfs = $project->intentionalParties;
        $datas = [
            'project' => $project,
            'yxfs' => $yxfs,
        ]; 
        $url = 'admin.yxf.list.edit';
        return $content
            ->header('意向登记')
            ->body(view($url, $datas));
    }

    public function listShow($project_id,Content $content){

        $datas = [
            'project_id' => $project_id,
        ]; 
        $url = 'admin.yxf.list.show';
        return $content
            ->header('意向登记')
            ->body(view($url, $datas));
    }
}
