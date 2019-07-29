<?php

namespace App\Admin\Controllers;

use App\Models\ProjectPurchase;
use App\Models\Project;
use App\Models\PbResult;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Services\ProjectPurchaseService;
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
use App\Services\ProcessService;

class ProjectPurchasesController extends Controller
{
    use HasResourceActions;
    protected $projectPurchaseService;

    // 利用 Laravel 的自动解析功能注入 CartService 类
    public function __construct(ProjectPurchaseService $projectPurchaseService)
    {
        $this->projectPurchaseService = $projectPurchaseService;
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
            ->header('列表')
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
            ->header('详情')
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
            ->header('修改')
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
            ->header('创建')
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
        $grid = new Grid(new ProjectPurchase);
        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('title', '项目名称');
            $filter->like('xmbh', '项目编号');

        });

        $grid->wtf_name('委托方名称');
        $grid->title('项目名称');
        $grid->gpjg_zj('挂牌金额(总价)');
        $grid->gp_date_start('挂牌开始使时间')->display(function($gp_date_start){            
            return date('Y-m-d',strtotime($gp_date_start));
        });
        $grid->gp_date_end('挂牌结束时间')->display(function($gp_date_end){            
            return date('Y-m-d',strtotime($gp_date_end));
        });

        $workProcess = WorkProcess::where('status',1)->where('type','zczl')->first();       
        $nodes = $workProcess->nodes; 
        $grid->process('项目状态')->display(function($process)use($nodes) {
            $node = $nodes->where('code',$process)->first();
            return $node->name;
        });
        $user = Admin::user();
        if($user->id != 1){
            $grid->model()->where('user_id', $user->id);
        }
        
        // $jurisdiction = '';
        // if($grid->model()->id){

        // }
        // $jurisdiction = $grid->model()->project->instance->node->jurisdiction;
        $grid->actions(function ($actions) {
            // $actions->disableView();
            
            // 当前行的数据数组
            $rec = $actions->row;
            if($rec->process >= 13){
                $actions->disableDelete();
                $actions->disableEdit();
            }

            switch($rec->process){
/*
                case 20:
                    $actions->append("<a href='/admin/projectpurchases/showzp/$rec->id' style='float: left;margin-right:10px;'><i class='fa fa-edit'></i>摘牌</a>"); 
                    break;
                case 21:
                    $actions->append("<a href='/admin/projectpurchases/editlb/$rec->id' style='float: left;margin-right:10px;'><i class='fa fa-edit'></i>录入流标通知书</a>"); 
                    break;
                case 31:
                    $actions->append("<a href='/admin/projectpurchases/editpb/$rec->id' style='float: left;margin-right:10px;'><i class='fa fa-edit'></i>录入评标结果</a>"); 
                    break;
                case 41:
                    $actions->append("<a href='/admin/winnotices/insert/$rec->project_id' style='float: left;margin-right:10px;'><i class='fa fa-edit'></i>录入中标信息</a>"); 
                    break;
                case 51:
                    $actions->append("<a href='/admin/projectpurchases/uploadcontract/$rec->id' style='float: left;margin-right:10px;'><i class='fa fa-edit'></i>上传合同</a>"); 
                    break;
*/
                case 20:
                    $actions->append("<a href='/admin/projectpurchases/showzp/$rec->id' style='margin-left:10px;' title='摘牌'><i class='fa fa-edit2'></i>摘牌</a>"); 
                    $actions->append("<a href='/admin/suspends/pause/$rec->project_id' style='margin-left:10px;' title='中止挂牌'><i class='glyphicon glyphicon-pause'></i>中止</a>"); 
                    $actions->append("<a href='/admin/suspends/end/$rec->project_id' style='margin-left:10px;' title='终结挂牌'><i class='fa fa-stop'></i>终结</a>"); 
                    break;
                case 21:
                    $actions->append("<a href='/admin/projectpurchases/editlb/$rec->id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>录入流标通知书</a>"); 
                    break;
                case 31:
                    $actions->append("<a href='/admin/suspends/pause/$rec->project_id' style='margin-left:10px;' title='中止挂牌'><i class='glyphicon glyphicon-pause'></i>中止</a>"); 
                    break;
                case 32:
                    $actions->append("<a href='/admin/suspends/pause/$rec->project_id' style='margin-left:10px;' title='中止挂牌'><i class='glyphicon glyphicon-pause'></i>中止</a>"); 
                    break;
                case 30:
                    $actions->append("<a href='/admin/suspends/recover/$rec->project_id' style='margin-left:10px;' title='恢复挂牌'><i class='glyphicon glyphicon-revoke'></i>恢复</a>"); 
                    break;  
                case 41:
                    $actions->append("<a href='/admin/suspends/end/$rec->project_id' style='margin-left:10px;' title='终结挂牌'><i class='fa fa-stop'></i>终结</a>");
                    break;
                case 42:
                    $actions->append("<a href='/admin/suspends/end/$rec->project_id' style='margin-left:10px;' title='终结挂牌'><i class='fa fa-stop'></i>终结</a>");
                    break;
                    
                case 51:
                    $actions->append("<a href='/admin/projectpurchases/editjj/$rec->id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>录入竞价结果</a>"); 
                    break;
                case 61:
                    $actions->append("<a href='/admin/projectpurchases/editpb/$rec->id' style='float: left;margin-right:10px;'><i class='fa fa-edit'></i>录入评标结果</a>"); 
                    break;
                case 81:
                    $actions->append("<a href='/admin/winnotices/insert/$rec->project_id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>录入中标信息</a>"); 
                    break;
                case 98:
                    $actions->append("<a href='/admin/projectpurchases/uploadcontract/$rec->id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>上传合同</a>"); 
                    break;
 
                
            }

            // $actions->append("<a href='/admin/projectpurchases/showapproval/$rec->id' style='float: left'><i class='fa fa-edit'>审批</i></a>");
        });
        // $grid->disableCreateButton();//禁用新增按钮
        /*
        $grid->tools(function ($tools) {//按钮重构
            $tools->append('<div class="btn-group pull-right" style="margin-right: 10px"><a href="/admin/projectpurchases/create" class="btn btn-sm btn-success" title="审批"><i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;审批</span></a></div>');
        });
        */
/*
        $grid->id('Id');        
        $grid->wtf_name('Wtf name');
        $grid->wtf_qyxz('Wtf qyxz');
        $grid->wtf_province('Wtf province');
        $grid->wtf_city('Wtf city');
        $grid->wtf_area('Wtf area');
        $grid->wtf_street('Wtf street');
        $grid->wtf_yb('Wtf yb');
        $grid->wtf_fddbr('Wtf fddbr');
        $grid->wtf_phone('Wtf phone');
        $grid->wtf_fax('Wtf fax');
        $grid->wtf_email('Wtf email');
        $grid->wtf_jt('Wtf jt');
        $grid->wtf_dlr_name('Wtf dlr name');
        $grid->wtf_dlr_phone('Wtf dlr phone');
        $grid->xmbh('Xmbh');
        $grid->title('Title');
        $grid->pzjg('Pzjg');
        $grid->bdgk('Bdgk');
        $grid->other('Other');
        $grid->gp_date_start('Gp date start');
        $grid->gp_date_end('Gp date end');
        $grid->sfhs('Sfhs');
        $grid->gpjg_sm('Gpjg sm');
        $grid->gpjg_zj('Gpjg zj');
        $grid->bdyx('Bdyx');
        $grid->xmpz('Xmpz');
        $grid->gq('Gq');
        $grid->jyfs('Jyfs');
        $grid->bjms('Bjms');
        $grid->jjfd('Jjfd');
        $grid->jy_date('Jy date');
        $grid->zbdl_lxfs('Zbdl lxfs');
        $grid->yxf_zgtj('Yxf zgtj');
        $grid->yxdj_zlqd('Yxdj zlqd');
        $grid->yxdj_sj('Yxdj sj');
        $grid->yxdj_fs('Yxdj fs');
        $grid->bzj_jn_time_end('Bzj jn time end');
        $grid->bzj('Bzj');
        $grid->zbwj_dj('Zbwj dj');
        $grid->jypt_lxfs('Jypt lxfs');
        $grid->notes('Notes');
        $grid->status('Status');
        $grid->process('Process');
        $grid->user_id('User id');
        $grid->project_id('Project id');
        $grid->sjly('Sjly');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
*/
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
        $show = new Show(ProjectPurchase::findOrFail($id));

        $show->id('Id');
        $show->wtf_name('Wtf name');
        $show->wtf_qyxz('Wtf qyxz');
        $show->wtf_province('Wtf province');
        $show->wtf_city('Wtf city');
        $show->wtf_area('Wtf area');
        $show->wtf_street('Wtf street');
        $show->wtf_yb('Wtf yb');
        $show->wtf_fddbr('Wtf fddbr');
        $show->wtf_phone('Wtf phone');
        $show->wtf_fax('Wtf fax');
        $show->wtf_email('Wtf email');
        $show->wtf_jt('Wtf jt');
        $show->wtf_dlr_name('Wtf dlr name');
        $show->wtf_dlr_phone('Wtf dlr phone');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->pzjg('Pzjg');
        $show->bdgk('Bdgk');
        $show->other('Other');
        $show->gp_date_start('Gp date start');
        $show->gp_date_end('Gp date end');
        $show->sfhs('Sfhs');
        $show->gpjg_sm('Gpjg sm');
        $show->gpjg_zj('Gpjg zj');
        $show->bdyx('Bdyx');
        $show->xmpz('Xmpz');
        $show->gq('Gq');
        $show->jyfs('Jyfs');
        $show->bjms('Bjms');
        $show->jjfd('Jjfd');
        $show->jy_date('Jy date');
        $show->zbdl_lxfs('Zbdl lxfs');
        $show->yxf_zgtj('Yxf zgtj');
        $show->yxdj_zlqd('Yxdj zlqd');
        $show->yxdj_sj('Yxdj sj');
        $show->yxdj_fs('Yxdj fs');
        $show->bzj_jn_time_end('Bzj jn time end');
        $show->bzj('Bzj');
        $show->zbwj_dj('Zbwj dj');
        $show->jypt_lxfs('Jypt lxfs');
        $show->notes('Notes');
        $show->status('Status');

        $show->process('Process');
        $show->user_id('User id');
        $show->project_id('Project id');
        $show->sjly('Sjly');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        
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
        
        return Admin::form(ProjectPurchase::class, function (Form $form) {
            $form->row(function ($row) use ($form)
            {
                $row->width(8)->text('wtf_name', '委托方名称');
                $row->width(4)->text('wtf_qyxz', '委托方企业性质');
                $row->width(4)->text('wtf_province', '省');
                $row->width(4)->text('wtf_city', '市');
                $row->width(4)->text('wtf_area', '区');
                $row->width(12)->text('wtf_street', '详细地址');
                $row->width(4)->text('wtf_yb', '邮编');
                $row->width(4)->text('wtf_fddbr', '法定代表人');
                $row->width(4)->text('wtf_phone', '联系电话');
                $row->width(4)->text('wtf_fax', '传真');
                $row->width(4)->text('wtf_email', '邮箱');
                $row->width(4)->text('wtf_jt', '所属集团');
                $row->width(4)->text('wtf_dlr_name', '委托代理人');
                $row->width(4)->text('wtf_dlr_phone', '联系电话');
                $row->width(12)->divide();
                $row->width(4)->text('xmbh', '项目编号');
                $row->width(4)->text('title', '标的名称');
                $row->width(4)->text('pzjg', '挂牌交易批准机构');
                $row->width(12)->textarea('bdgk', '标的概况');
                $row->width(12)->textarea('other', '其它需要披露的事项');
                $row->width(4)->datetime('gp_date_start', '挂牌开始日期')->default(date('Y-m-d'));
                $row->width(4)->datetime('gp_date_end', '挂牌结束日期')->default(date('Y-m-d'));
                $row->width(4)->text('sfhs', '是否含税');
                $row->width(4)->text('gpjg_sm', '预算价格说明');
                $row->width(4)->decimal('gpjg_zj', '预算价格');
                $row->width(4)->text('bdyx', '项目(标的)意向');
                $row->width(4)->text('xmpz', '项目配置类型');
                $row->width(4)->text('gq', '工期');
                $row->width(4)->text('jyfs', '交易方式');
                $row->width(4)->text('bjms', '报价模式');
                $row->width(4)->decimal('jjfd', '降价幅度');
                $row->width(4)->datetime('jy_date', '交易（开标、谈判）时间')->default(date('Y-m-d H:i:s'));
                $row->width(4)->text('zbdl_lxfs', '招标代理机构联系方式 ');
                $row->width(4)->text('yxf_zgtj', '意向方资格条件');
                $row->width(4)->text('yxdj_zlqd', '意向登记要求及资料清单');
                $row->width(4)->datetime('yxdj_sj', '意向登记的时间');
                $row->width(4)->text('yxdj_fs', '意向登记方式、招标文件价格');
                $row->width(4)->datetime('bzj_jn_time_end', '交纳保证金截止时间')->default(date('Y-m-d H:i:s'));
                $row->width(4)->text('bzj', '保证金金额(人民币) (万元)');
                $row->width(4)->text('zbwj_dj', '投标文件递交时间及地点');
                $row->width(4)->text('jypt_lxfs', '交易平台联系方式');
                $row->width(12)->textarea('notes', '备注');  

                $row->hidden('status', 'Status')->default(11);
                $row->hidden('process', 'Process')->default(1);
                $row->hidden('user_id', 'User id')->default(1);
                $row->hidden('project_id', 'Project id')->default('1');
                $row->hidden('id', 'id')->default('1');
                $row->hidden('sjly', 'Sjly')->default('业务录入');  
          
            },  $form); 
        });
/*
        $form = new Form(new ProjectPurchase);
        $form->text('wtf_name', '委托方名称');
        $form->text('wtf_qyxz', '委托方企业性质');
        $form->text('wtf_province', '省');
        $form->text('wtf_city', '市');
        $form->text('wtf_area', '区');
        $form->text('wtf_street', '详细地址');
        $form->text('wtf_yb', '邮编');
        $form->text('wtf_fddbr', '法定代表人');
        $form->text('wtf_phone', '联系电话');
        $form->text('wtf_fax', '传真');
        $form->text('wtf_email', '邮箱');
        $form->text('wtf_jt', '所属集团');
        $form->text('wtf_dlr_name', '委托代理人');
        $form->text('wtf_dlr_phone', '联系电话');
        $form->text('xmbh', '项目编号');
        $form->text('title', '标的名称');
        $form->text('pzjg', '挂牌交易批准机构');
        $form->textarea('bdgk', '标的概况');
        $form->textarea('other', '其它需要披露的事项');
        $form->datetime('gp_date_start', '挂牌开始日期')->default(date('Y-m-d'));
        $form->datetime('gp_date_end', '挂牌结束日期')->default(date('Y-m-d'));
        $form->text('sfhs', '是否含税');
        $form->text('gpjg_sm', '预算价格说明');
        $form->decimal('gpjg_zj', '预算价格');
        $form->text('bdyx', '项目(标的)意向');
        $form->text('xmpz', '项目配置类型');
        $form->text('gq', '工期');
        $form->text('jyfs', '交易方式');
        $form->text('bjms', '报价模式');
        $form->decimal('jjfd', '降价幅度');
        $form->datetime('jy_date', '交易（开标、谈判）时间')->default(date('Y-m-d H:i:s'));
        $form->text('zbdl_lxfs', '招标代理机构联系方式 ');
        $form->text('yxf_zgtj', '意向方资格条件');
        $form->text('yxdj_zlqd', '意向登记要求及资料清单');
        $form->text('yxdj_sj', '意向登记的时间');
        $form->text('yxdj_fs', '意向登记方式、招标文件价格');
        $form->datetime('bzj_jn_time_end', '交纳保证金截止时间')->default(date('Y-m-d H:i:s'));
        $form->text('bzj', '保证金金额(人民币) (万元)');
        $form->text('zbwj_dj', '投标文件递交时间及地点');
        $form->text('jypt_lxfs', '交易平台联系方式');
        $form->textarea('notes', '备注');

        $form->hidden('status', 'Status')->default(11);
        $form->hidden('process', 'Process')->default(1);
        $form->hidden('user_id', 'User id')->default(1);
        $form->hidden('project_id', 'Project id')->default('1');
        $form->text('id', 'id')->default('1');
        $form->hidden('sjly', 'Sjly')->default('业务录入');

        $form->hasMany('files', '附件列表', function (Form\NestedForm $form) {
            $form->select('type','附件类型')->options(['1' => '委托方附件', '2'=> '意向方附件'])->default('1');
            $form->file('path','附件');
            //$form->text('name', '文件名称')->rules('required');
            //$form->text('path', '文件路径')->rules('required');
        });

        // 定义事件回调，当模型即将保存时会触发这个回调
        // $form->saving(function (Form $form) {
        //     $form->model()->id = '1';
        // });

        return $form;
 */       
    }

    private $all_colums =  ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','bdyx','xmpz','gq','jyfs','bjms','jjfd','jy_date','zbdl_lxfs','yxf_zgtj','yxdj_zlqd','yxdj_sj','yxdj_fs','bzj_jn_time_end','bzj','zbwj_dj','jypt_lxfs','notes'];

    public function add(Request $request,FileUploadHandler $uploader){
        $data = $request->all();
        $data_Purchase = $request->only($this->all_colums);
        $data_project = $request->only(['title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl']);
        $files = $request->path;
        $fileCharater = $request->file('path');

        $files_new = null;
        if($fileCharater != null){
            $files_new = $uploader->batchUpload($data['files'],'qycq','qycq');
        }
        $this->projectPurchaseService->add($data_Purchase,$data_project,11,$files_new);
        return redirect()->route('projectpurchase.index');
    }

    public function update(Request $request,FileUploadHandler $uploader,ProcessService $process){
        $data = $request->all();
        $purchase_id = $request->id;
        $data_Purchase = $request->only($this->all_colums);
        $data_project = $request->only(['title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl']);
        $files = $request->path;
        $fileCharater = $request->file('path');

        $files_new = null;
        if($fileCharater != null){
            $files_new = $uploader->batchUpload($data['files'],'qycq','qycq');
        }
        DB::transaction(function () use($purchase_id,$data_Purchase,$data_project,$files_new,$process) {
            $this->projectPurchaseService->update($purchase_id,$data_Purchase,$data_project,13,$files_new);
            $process->create('qycg',ProjectPurchase::find($purchase_id)->project_id,'提交',13);

        });
        return redirect()->route('projectpurchase.index');
        // return [];
    }


    public function submit(Request $request,FileUploadHandler $uploader,ProcessService $process){
        $data = $request->all();
        $purchase_id = $request->id;
        $data_Purchase = $request->only($this->all_colums);
        $data_project = $request->only(['xmbh','title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl']);
        $files = $request->path;
        $fileCharater = $request->file('path');

        $files_new = null;
        if($fileCharater != null){
            $files_new = $uploader->batchUpload($data['files'],'qycq','qycq');
        }

        DB::transaction(function () use($purchase_id,$data_Purchase,$data_project,$files_new,$process) {
            $this->projectPurchaseService->submit($purchase_id,$data_Purchase,$data_project,13,$files_new);
            //流程
            $process->create('qycg',ProjectPurchase::find($purchase_id)->project_id,'提交',13);

        });
        
        return redirect()->route('projectpurchase.index');
    }

    /**摘牌
     *@param $id 明细表ID
     */
    public function showzp($id, Content $content)
    {
        $detial = ProjectPurchase::find($id);

        $records = DB::table('work_process_records')->leftJoin('admin_users','work_process_records.user_id','.admin_users.id')    ->where('work_process_records.project_id','=',$detial->project_id)
                ->select('work_process_records.operation','admin_users.name','work_process_records.created_at')
                ->get();
        
        $pbresults = PbResult::where('project_id',$detial->project_id)->get();
        $datas = [
            'project' => $detial,
            'records' => $records,
            'pbresults' => $pbresults,
        ]; 

        return $content
            ->header('摘牌')
            ->body(view('admin.project.purchase.zp', $datas));  
    }

    /**
     *@param $id 项目主表ID
     */
    public function zp($id,Request $request,ProcessService $processService){
        $process = $request->process;
        $operation = $request->operation;
        DB::transaction(function () use($id,$process,$operation,$processService) {
            //流程
            $processService->next($id,null,$operation,$process);
        });
        return redirect()->route('projectpurchase.index');
    }


    public function editpb($id, Content $content)
    {
        $detial = ProjectPurchase::find($id);

        $records = DB::table('work_process_records')->leftJoin('admin_users','work_process_records.user_id','.admin_users.id')    ->where('work_process_records.project_id','=',$detial->project_id)
                ->select('work_process_records.operation','admin_users.name','work_process_records.created_at')
                ->get();
        
        $pbresults = PbResult::where('project_id',$detial->project_id)->get();
        $datas = [
            'project' => $detial,
            'records' => $records,
            'pbresults' => $pbresults,
        ]; 
        return $content
            ->header('评标结果录入')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view('admin.project.purchase.pb', $datas));  
    }

    public function pb($id,Request $request,ProcessService $processService){
        $purchase_id = $request->id;
        $process = $request->process;
        $operation = $request->operation;
        DB::transaction(function () use($id,$process,$operation,$processService) {
            $processService->next($id,null,$operation,$nodecode=null);
        });
        
        return redirect()->route('projectpurchase.index');
    }
}
