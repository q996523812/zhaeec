<?php

namespace App\Admin\Controllers;

use App\Models\ProjectLease;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Admin as Import;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Handlers\FileUploadHandler;
use App\Services\ProcessService;
use App\Services\ProjectLeaseService;
use App\Http\Requests\ProjectLeasesRequest;
use Carbon\Carbon;

class ProjectLeasesController extends Controller
{
    use HasResourceActions;
    protected $projectLeaseService;

    // 利用 Laravel 的自动解析功能注入 Service 类
    public function __construct(ProjectLeaseService $projectLeaseService)
    {
        $this->projectLeaseService = $projectLeaseService;
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
            ->header('资产租赁')
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
        $detail = ProjectLease::find($id);
        $datas = [
            'detail' => $detail,
            'projecttype' => 'projectleases',
            'yxfs' => $detail->intentionalParties,
            'files' => $detail->files,
            'images' => $detail->images,
        ]; 
        $url = 'admin.project.lease.show';   
        return $content
            ->header('查看')
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
        // return $content
        //     ->header('Edit')
        //     ->description('description')
        //     ->body($this->form()->edit($id));
        // Import::script('$(document).ready(function(){var url="/admin/projectleases";});');        
        $detail = ProjectLease::find($id);
        $datas = [
            'detail' => $detail,
            'projecttype' => 'projectleases',
            'files' => $detail->files,
            'images' => $detail->images,
        ]; 
        $url = 'admin.project.lease.edit';   
        return $content
            ->header('编辑')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view($url, $datas));  
    }

    public function copy($id, Content $content)
    {
        $detail = ProjectLease::find($id);
        $detail->id = '';
        $detail->project_id = '';
        $detail->process = '11';
        
        $datas = [
            'detail' => $detail,
            'projecttype' => 'projectleases',
            'files' => $detail->files,
            'images' => $detail->images,
        ];
        $url = 'admin.project.lease.edit';
        return $content
            ->header('新增')
            ->body(view($url,$datas)); 
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        $detail = new ProjectLease();
        $datas = [
            'detail' => $detail,
            'projecttype' => 'projectleases',
            'files' => $detail->files,
            'images' => $detail->images,
        ];
        $url = 'admin.project.lease.edit';
        return $content
            ->header('新增')
            ->body(view($url,$datas));  
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function manage($id,Content $content)
    {
        $detail = ProjectLease::find($id);
        $datas = [
            'detail' => $detail,
            'projecttype' => 'projectleases',
            'yxfs' => $detail->intentionalParties,
            'files' => $detail->files,
            'images' => $detail->images,
        ];
        $url = 'admin.project.lease.manage';
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
        $grid = new Grid(new ProjectLease);

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
        $grid->model()->where('user_id', $user->id);

        $grid->actions(function ($actions) {
            // $actions->disableView();
            
            // 当前行的数据数组
            $rec = $actions->row;
            if($rec->process >= 13){
                $actions->disableDelete();
                $actions->disableEdit();
            }
            switch($rec->process){
                case 20:
                    $actions->append("<a href='/admin/projectleases/manage/$rec->id' style='margin-left:10px;' title='管理项目'><i class='fa fa-edit2'></i>管理项目</a>"); 
                    $actions->append("<a href='/admin/projectleases/showzp/$rec->id' style='margin-left:10px;' title='摘牌'><i class='fa fa-edit2'></i>摘牌</a>"); 
                    $actions->append("<a href='/admin/suspends/pause/$rec->project_id' style='margin-left:10px;' title='中止挂牌'><i class='fa fa-pause'></i>中止</a>"); 
                    $actions->append("<a href='/admin/suspends/end/$rec->project_id' style='margin-left:10px;' title='终结挂牌'><i class='fa fa-stop'></i>终结</a>"); 
                    break;
                case 21:
                    $actions->append("<a href='/admin/projectleases/editlb/$rec->id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>录入流标通知书</a>"); 
                    break;
                case 31:
                    $actions->append("<a href='/admin/suspends/pause/$rec->project_id' style='margin-left:10px;' title='中止挂牌'><i class='fa fa-pause'></i>中止</a>"); 
                    break;
                case 32:
                    $actions->append("<a href='/admin/suspends/pause/$rec->project_id' style='margin-left:10px;' title='中止挂牌'><i class='fa fa-pause'></i>中止</a>"); 
                    break;
                case 30:
                    $actions->append("<a href='/admin/suspends/recover/$rec->project_id' style='margin-left:10px;' title='恢复挂牌'><i class='fa fa-mail-reply'></i>恢复</a>"); 
                    break;    
                case 41:
                    $actions->append("<a href='/admin/suspends/end/$rec->project_id' style='margin-left:10px;' title='终结挂牌'><i class='fa fa-stop'></i>终结</a>");
                    break;
                case 42:
                    $actions->append("<a href='/admin/suspends/end/$rec->project_id' style='margin-left:10px;' title='终结挂牌'><i class='fa fa-stop'></i>终结</a>");
                    break;
                    
                case 51:
                    $actions->append("<a href='/admin/projectleases/editjj/$rec->id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>录入竞价结果</a>"); 
                    break;
                case 52:
                    $actions->append("<a href='/admin/projectleases/editjj/$rec->id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>录入竞价结果</a>"); 
                    break;    
                case 81:
                    $actions->append("<a href='/admin/winnotices/insert/$rec->project_id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>录入中标信息</a>"); 
                    break;
                case 82:
                    $actions->append("<a href='/admin/winnotices/insert/$rec->project_id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>录入中标信息</a>");    
                    break;
                case 98:
                    $actions->append("<a href='/admin/projectleases/uploadcontract/$rec->id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>上传合同</a>"); 
                    break;
                
            }
            // $actions->append("<a href='/admin/projectpurchases/showapproval/$rec->id' style='float: left'><i class='fa fa-edit'>审批</i></a>");
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
        $show = new Show(ProjectLease::findOrFail($id));

        $show->id('Id');
        $show->wtf_name('委托方名称');
        $show->wtf_qyxz('企业性质');
        $show->wtf_province('省');
        $show->wtf_city('市');
        $show->wtf_area('区');
        $show->wtf_street('详细地址');
        $show->wtf_yb('邮编');
        $show->wtf_fddbr('法定代表人');
        $show->wtf_phone('联系电话');
        $show->wtf_fax('传真');
        $show->wtf_email('邮箱');
        $show->wtf_jt('所属集团');
        $show->wtf_dlr_name('委托代理人');
        $show->wtf_dlr_phone('联系电话');
        $show->xmbh('项目编号');
        $show->title('标的名称');
        $show->pzjg('挂牌交易批准机构');
        $show->bdgk('项目(标的)概况');
        $show->other('其它需要披露的事项');
        $show->gp_date_start('公告开始日期');
        $show->gp_date_end('公告结束日期');
        $show->sfhs('是否含税');
        $show->gpjg_sm('租金说明');
        $show->gpjg_zj('总租金');
        $show->gpjg_dj('月租金/单价');
        $show->zlqx('租赁期限（月限）');
        $show->jymd('交易目的');
        $show->zclb('资产类别');
        $show->fbfs('信息发布方式');
        $show->zcsfsx('交易资产中是否存在权利受到限制的情形');
        $show->pgjz('标的资产评估值(人民币)元');
        $show->jyfs('交易方式');
        $show->bjms('报价模式');
        $show->jjfd('加价幅度');
        $show->jysj_bz('交易时间备注');
        $show->yxf_zgtj('意向方资格条件');
        $show->yxdj_zlqd('意向登记要求及资料清单');
        $show->bzj_jn_time_end('报名资料提交及交纳竞标保证金截止时间');
        $show->bzj('竞标保证金金额(人民币) (万元)');
        $show->jypt_lxfs('交易平台联系方式');
        $show->notes('备注');
        $show->fc_province('省');
        $show->fc_city('市');
        $show->fc_area('区');
        $show->fc_street('详细地址');
        $show->fc_gn('功能');
        $show->fc_mj('面积');
        $show->fc_zjh('房产证号');
        $show->fc_zjjg('建筑结构');
        $show->fc_ysynx('已使用年限');
        $show->fc_ghyt('规划用途');
        $show->fc_sfyyzh('是否有原租户');
        $show->fc_jcsj('建成时间');
        $show->fc_dqyt('当前用途');
        $show->fc_yzh_yxq('原租户是否享有优先权');


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ProjectLease);

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
        $form->text('gpjg_sm', '价格说明');
        $form->decimal('gpjg_zj', '总租金');
        $form->decimal('gpjg_dj', '月租金/单价');
        $form->number('zlqx', '租赁期限（月限）');
        $form->text('jymd', '交易目的');
        $form->text('zclb', '资产类别');
        $form->text('fbfs', '信息发布方式');
        $form->text('zcsfsx', '交易资产中是否存在权利受到限制的情形');
        $form->decimal('pgjz', '标的资产评估值(人民币)元');
        $form->text('jyfs', '交易方式');
        $form->text('bjms', '报价模式');
        $form->decimal('jjfd', '加价幅度');
        $form->text('jysj_bz', '交易时间备注');
        $form->text('yxf_zgtj', '意向方资格条件');
        $form->text('yxdj_zlqd', '意向登记要求及资料清单');
        $form->datetime('bzj_jn_time_end', '报名资料提交及交纳竞标保证金截止时间')->default(date('Y-m-d H:i:s'));
        $form->decimal('bzj', '竞标保证金金额(人民币) (万元)');
        $form->text('jypt_lxfs', '交易平台联系方式');
        $form->textarea('notes', '备注');
        $form->text('fc_province', '省');
        $form->text('fc_city', '市');
        $form->text('fc_area', '区');
        $form->text('fc_street', '详细地址');
        $form->text('fc_gn', '功能');
        $form->text('fc_mj', '面积');
        $form->text('fc_zjh', '房产证号');
        $form->text('fc_zjjg', '建筑结构');
        $form->text('fc_ysynx', '已使用年限');
        $form->text('fc_ghyt', '规划用途');
        $form->text('fc_sfyyzh', '是否有原租户');
        $form->text('fc_jcsj', '建成时间');
        $form->text('fc_dqyt', '当前用途');
        $form->text('fc_yzh_yxq', '原租户是否享有优先权');
        $form->hidden('status', 'Status');
        $form->hidden('process', 'Process')->default(11);
        $form->hidden('user_id', 'User id');
        $form->hidden('project_id', 'Project id');
        $form->hidden('sjly', 'Sjly')->default('业务录入');
        $form->hasMany('files', '附件列表', function (Form\NestedForm $form) {
            $form->select('type','附件类型')->options(['1' => '委托方附件', '2'=> '意向方附件'])->default('1');
            $form->file('path','附件');
            //$form->text('name', '文件名称')->rules('required');
            //$form->text('path', '文件路径')->rules('required');
        });
        return $form;
    }

    private function fields(){
        $fields = [
            'detail' => ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','gpjg_dj','zlqx','jymd','zclb','fbfs','zcsfsx','pgjz','jyfs','bjms','jjfd','jysj_bz','yxf_zgtj','yxdj_zlqd','bzj_jn_time_end','bzj','jypt_lxfs','notes','fc_province','fc_city','fc_area','fc_street','fc_gn','fc_mj','fc_zjh','fc_zjjg','fc_ysynx','fc_ghyt','fc_sfyyzh','fc_jcsj','fc_dqyt','fc_yzh_yxq','status'],
            'project' => ['title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl']
        ];
        return $fields;
    }
    public function add(ProjectLeasesRequest $request,FileUploadHandler $uploader){
        $data_detail = $request->only($this->fields()['detail']);
        $data_project = $request->only($this->fields()['project']);

        $detail = $this->projectLeaseService->add($data_detail,$data_project,11,null);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'detail_id' => $detail->id,
            'project_id' => $detail->project_id,
            'status_code' => '200'
        ];
        return response()->json($result);
        // return admin_success('title1', '保存成功');
    }

    public function update(Request $request,FileUploadHandler $uploader,ProcessService $process){
        $detail_id = $request->id;
        $data_detail = $request->only($this->fields()['detail']);
        $data_project = $request->only($this->fields()['project']);

        $this->projectLeaseService->update($detail_id,$data_detail,$data_project,11,null);
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];

        return response()->json($result);
    }

    public function submit(Request $request){
        $detail_id = $request->id;
        $this->projectLeaseService->submit($detail_id);
        return redirect()->route('projectleases.index');
    }

    /**摘牌
     *@param $id 明细表ID
     */
    public function showzp($id, Content $content)
    {
        $detial = ProjectLease::find($id);

        $records = DB::table('work_process_records')->leftJoin('admin_users','work_process_records.user_id','.admin_users.id')    ->where('work_process_records.table_id','=',$detial->project_id)
                ->select('work_process_records.operation','admin_users.name','work_process_records.created_at')
                ->get();
        
        // $pbresults = PbResult::where('project_id',$detial->project_id)->get();
        $datas = [
            'detial' => $detial,
            'records' => $records,
            'pbresults' => '',
        ]; 

        return $content
            ->header('摘牌')
            ->body(view('admin.project.lease.zp', $datas));  
    }

    /**摘牌/流标
     *@param $id 项目主表ID
     */
    public function zp($id,Request $request,ProcessService $processService){
        $process = $request->process;
        $operation = $request->operation;
        DB::transaction(function () use($id,$process,$operation,$processService) {
            //流程
            $processService->next($id,null,$operation,$process);
        });
        return redirect()->route('projectleases.index');
    }


    public function editjj($id, Content $content)
    {
        $detail = ProjectLease::find($id);

        $records = DB::table('work_process_records')->leftJoin('admin_users','work_process_records.user_id','.admin_users.id')    ->where('work_process_records.table_id','=',$detail->project_id)
                ->select('work_process_records.operation','admin_users.name','work_process_records.created_at')
                ->get();
        
        $datas = [
            'detail' => $detail,
            'records' => $records,
            'projecttype' => 'projectleases',
            'yxfs' => $detail->intentionalParties,
            'files' => $detail->files,
            // 'images' => $detail->images,
        ]; 
        return $content
            ->header('评标结果录入')
            ->body(view('admin.project.wljj.edit', $datas));  
    }
/*
    public function jj($id,Request $request,FileUploadHandler $uploader,ProcessService $processService){

        $data = $request->all();
        $fileCharater = $request->file('jjjg');
        $file_new = null;
        if($fileCharater != null){
            $file_new = $uploader->save($data['jjjg'],'zczl','zczl');
        }  
        DB::transaction(function () use($id,$file_new,$processService) {
            $detial = ProjectLease::find($id);
            $this->projectLeaseService->upload($detial->project_id,$file_new,6);  
            $processService->next($detial->project_id,null,'录入竞价结果',$nodecode=null);
        });     
        return redirect()->route('projectleases.index');
    }
*/
    public function jj(Request $request){
        $yxf_id = $request->yxf_id;
        $this->projectLeaseService->jj($yxf_id);
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];

        return response()->json($result);
    }

}
