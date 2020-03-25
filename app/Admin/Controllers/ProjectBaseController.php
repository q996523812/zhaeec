<?php

namespace App\Admin\Controllers;

use App\Models\Project;
use App\Models\ProjectLease;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Models\PbResult;
use App\Models\TargetCompanyBaseInfo;
use App\Models\TargetCompanyOwnershipStructure;
use App\Models\AuditReport;
use App\Models\FinancialStatement;
use App\Models\Assessment;
use App\Models\SellerInfo;
use App\Models\Supervise;
use App\Models\AssetInfo;
use App\Models\Contact;
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
use Illuminate\Support\Facades\Auth;
use App\Services\ProcessService;
use App\Services\ProjectLeaseService;
use App\Services\MarginAcountService;
use App\Services\ProjectBaseService;
use App\Services\ProjectService;
use App\Services\FileService;
use App\Http\Requests\ProjectLeasesRequest;
use Carbon\Carbon;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Role;

class ProjectBaseController extends Controller
{
    use HasResourceActions;
    protected $service;
    /**
     * 项目类型名称
     * 资产租赁、企业采购
     */
    protected $projectTypeName;
    /**
     * 项目类型编码
     * zczl、qycg
     */
    protected $projectTypeCode;
   
    /**
     * 页面路径：
     * admin.project.zczl,admin.project.qycg
     */
    protected $folder_view;

    /**
     * model的class：
     * 
     */
    protected $detail_class;

	/**
     * 列表页面
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header($this->projectTypeName)
            ->body($this->grid());
    }

    /**
     * 显示详情页面，不可编辑
     *
     * @param mixed $id 项目明细表ID
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        $detail = $this->detail_class::find($id);
        $datas = $this->getDatasToView($detail);
        $datas['cjxx'] = $detail->project->transaction;
        // $url = $this->getViewUrl('show');
        $url = 'admin.project.show';
        return $content
            ->header($this->projectTypeName.'-查看')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view($url, $datas)); 
    }

    /**
     * 显示编辑页面
     *
     * @param mixed $id 项目明细表ID
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
        $detail = $this->detail_class::find($id);
        if($detail->sjly == '监管平台'){
            $this->getMarginAcount($detail);
        }
        $datas = $this->getDatasToView($detail);
        
        // $url = $this->getViewUrl('edit');  
        $url = 'admin.project.edit';
        return $content
            ->header($this->projectTypeName.'-编辑')
            ->body(view($url, $datas));  
    }

    /**
     * 显示新增页面
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        $detail = new $this->detail_class;
        switch ($this->projectTypeCode) {
            case 'qycg':
                // $detail->yxfsl_0 = 1;
                // $detail->yxfsl_0_desc = '不变更信息公告内容，按照不少于5个工作日为一个周期延长挂牌。';
                // $detail->yxfsl_1 = 1;
                // $detail->yxfsl_1_desc = '按挂牌价格与意向方报价孰低原则成交。';
                // $detail->yxfsl_2 = 1;

                $detail->yxfsl_0 = '意向登记期满，如没有征集到符合条件的意向受让方';
                $detail->yxfsl_0_desc = '不变更信息公告内容，按照不少于5个工作日为一个周期延长挂牌。';
                $detail->yxfsl_1 = '意向登记期满，如只征集到1个符合条件的意向方';
                $detail->yxfsl_1_desc = '按挂牌价格与意向方报价孰低原则成交。';
                $detail->yxfsl_2 = '意向登记期满，征集到不少于3个符合条件的意向方';
                break;
            case 'zczl':
                $detail->yxfsl_0 = '意向登记期满，如没有征集到符合条件的意向受让方';
                $detail->yxfsl_0_desc = '不变更信息公告内容，按照不少于5个工作日为一个周期延长挂牌。';
                $detail->yxfsl_1 = '意向登记期满，如只征集到1个符合条件的意向方';
                $detail->yxfsl_1_desc = '按挂牌价格与意向方报价孰低原则成交。';
                $detail->yxfsl_2 = '意向登记期满，征集到不少于3个符合条件的意向方';
                break;
            case 'zczr':
                $detail->pubDealWay1 = '协议成交';
                break;
            case 'cqzr':
                break;
            case 'zzkg':
                $detail->pub10 = '在融资方同意的情况下';
                $detail->pub7 = '但未达到募集资金总额';
                $detail->pub8 = '且达到募集资金总额';
                $detail->pub9 = '信息发布终结并组织遴选';
                $detail->pub2 = '并通知已报名的投资方';
                $detail->pub3 = '根据征集到的投资方情况决定具体延长时间';
                break;
            
            default:
                # code...
                break;
        }
        $this->getMarginAcount($detail);
        $datas = $this->getDatasToView($detail);
        
        // $url = $this->getViewUrl('edit');
        $url = 'admin.project.edit';
        return $content
            ->header('新增')
            ->body(view($url,$datas));  
    }

    /**
     * 复制项目后，显示编辑页面
     *
     * @param mixed $id 项目明细表ID
     * @param Content $content
     * @return Content
     */
    public function copy($id, Content $content)
    {
        $detail = $this->detail_class::find($id);
        $project =$detail->project;
        if(empty($project)){
            $project = new Project;
        }

        $bdqy = $detail->targetCompanyBaseInfo;
        if(empty($bdqy)){
            $bdqy = new TargetCompanyBaseInfo;
        }

        $sjbg1 = new AuditReport;
        $sjbg2 = new AuditReport;
        $sjbg3 = new AuditReport;
        $sjbgs = $detail->auditReports;
        if(!empty($sjbgs) && $sjbgs->Count()>=1){
            for($i = 0; $i < $sjbgs->Count(); $i++){
                switch ($i) {
                    case 0:
                        $sjbg1 = $sjbgs[$i];
                        break;
                    case 1:
                        $sjbg2 = $sjbgs[$i];
                        break;
                    case 2:
                        $sjbg3 = $sjbgs[$i];
                        break;
                }
            }
        }

        $bdxq = $detail->assetInfo;
        if(empty($bdxq)){
            $bdxq = new AssetInfo;
        }

        $cwbb = $detail->financialStatement;
        if(empty($cwbb) ){
            $cwbb = new FinancialStatement;
        }
        $pgqk = $detail->assessment;
        if(empty($pgqk)){
            $pgqk = new Assessment;
        }
        $zrf = $detail->sellerInfo;
        if(empty($zrf)){
            $zrf = new SellerInfo;
        }
        $jgxx = $detail->supervise;
        if(empty($jgxx)){
            $jgxx = new Supervise;
        }
        $lxfs = $detail->contact;
        if(empty($lxfs)){
            $lxfs = new Contact;
        }
        
        $detail->id = '';
        $detail->project_id = '';
        $detail->process = '111';
        $detail->xmbh = 

        $project->detail_id = '';
        $project->id = '';
        $project->process = '111';
        $project->xmbh = '';

        $bdqy->id = '';
        $bdqy->project_id = '';
        
        $bdxq->id = '';
        $bdxq->project_id = '';
        
        $cwbb->id = '';
        $cwbb->project_id = '';
        
        $pgqk->id = '';
        $pgqk->project_id = '';
        
        $zrf->id = '';
        $zrf->project_id = '';
        
        $jgxx->id = '';
        $jgxx->project_id = '';
        
        $sjbg1->id = '';
        $sjbg1->project_id = '';
        
        $sjbg2->id = '';
        $sjbg2->project_id = '';

        $sjbg3->id = '';
        $sjbg3->project_id = '';
        
        $lxfs->id = '';
        $lxfs->project_id = '';

        $datas = [
            'id' => $detail->id,
            'detail' => $detail,
            'projecttype' => $this->projectTypeCode,
            'files' => $detail->files,
            'images' => $detail->images,
        ];

        $datas['project'] = $project;
        $datas['bdqy'] = $bdqy;
        $datas['bdxq'] = $bdxq;
        $datas['cwbb'] = $cwbb;
        $datas['pgqk'] = $pgqk;
        $datas['zrf'] = $zrf;
        $datas['jgxx'] = $jgxx;
        $datas['sj1'] = $sjbg1;
        $datas['sj2'] = $sjbg2;
        $datas['sj3'] = $sjbg3;
        $datas['lxfs'] = $lxfs;
        
        $datas['files_wtf'] = '';
        $datas['files_yxf'] = '';

        '';
        
        $present_user = Auth::guard('admin')->user();//当前用户
        $role = Role::find(2);
        // $users = $role->administrators;
        // $users = $role->administrators->where('id','<>',$present_user->id);
        $users = $role->administrators->except([$present_user->id]);
        $datas['users'] = $users;
        
        $url = $this->getViewUrl('edit');
        return $content
            ->header($this->projectTypeName.'-新增')
            ->body(view($url,$datas)); 
    }

    public function manage($id,Content $content)
    {
        $detail = $this->detail_class::find($id);
        $datas = $this->getDatasToView($detail);
        $url = $this->getViewUrl('manage');  
        return $content
            ->header($this->projectTypeName.'-管理')
            ->body(view($url, $datas));  
    }

    public function print($id,Request $request)
    {
        $detail = $this->detail_class::find($id);
        $datas = [
            'detail' => $detail,
        ]; 
        $url = $this->getViewUrl('print');  
        return view($url,$datas);
    }

    protected function getViewUrl($name){
    	$url = $this->folder_view.'.'.$name;
    	return $url;
    }

    protected function getDatasToView($detail){
        $datas = [
            'project' => $detail->project,
            'id' => $detail->id,
            'detail' => $detail,
            'projecttype' => $this->projectTypeCode,
            'yxfs' => $detail->intentionalParties,
            'files' => $detail->files,
            'images' => $detail->images,
        ];

        $project =$detail->project;
        if(empty($project)){
            $project = new Project;
        }

        $bdqy = $detail->targetCompanyBaseInfo;
        if(empty($bdqy)){
            $bdqy = new TargetCompanyBaseInfo;
        }

        $sjbg1 = new AuditReport;
        $sjbg2 = new AuditReport;
        $sjbg3 = new AuditReport;
        $sjbgs = $detail->auditReports;
        if(!empty($sjbgs) && $sjbgs->Count()>=1){
            for($i = 0; $i < $sjbgs->Count(); $i++){
                switch ($i) {
                    case 0:
                        $sjbg1 = $sjbgs[$i];
                        break;
                    case 1:
                        $sjbg2 = $sjbgs[$i];
                        break;
                    case 2:
                        $sjbg3 = $sjbgs[$i];
                        break;
                }
            }
        }

        $bdxq = $detail->assetInfo;
        if(empty($bdxq)){
            $bdxq = new AssetInfo;
        }

        $cwbb = $detail->financialStatement;
        if(empty($cwbb) ){
            $cwbb = new FinancialStatement;
        }
        $pgqk = $detail->assessment;
        if(empty($pgqk)){
            $pgqk = new Assessment;
        }
        $zrf = $detail->sellerInfo;
        if(empty($zrf)){
            $zrf = new SellerInfo;
        }
        $jgxx = $detail->supervise;
        if(empty($jgxx)){
            $jgxx = new Supervise;
        }
        $lxfs = $detail->contact;
        if(empty($lxfs)){
            $lxfs = new Contact;
        }
        
        $datas['project'] = $project;
        $datas['bdqy'] = $bdqy;
        $datas['bdxq'] = $bdxq;
        $datas['cwbb'] = $cwbb;
        $datas['pgqk'] = $pgqk;
        $datas['zrf'] = $zrf;
        $datas['jgxx'] = $jgxx;
        $datas['sj1'] = $sjbg1;
        $datas['sj2'] = $sjbg2;
        $datas['sj3'] = $sjbg3;
        $datas['lxfs'] = $lxfs;
        
        $fileServicde = new FileService();
        $files_wtf = $fileServicde->getFilesWtf($this->projectTypeCode,$detail->id);
        $files_yxf = $fileServicde->getFilesYxf($this->projectTypeCode,$detail->id);
        $datas['files_wtf'] = $files_wtf;
        $datas['files_yxf'] = $files_yxf;

        $present_user = Auth::guard('admin')->user();//当前用户
        $role = Role::find(2);
        // $users = $role->administrators;
        // $users = $role->administrators->where('id','<>',$present_user->id);
        $users = $role->administrators->except([$present_user->id]);
        $datas['users'] = $users;

        return $datas;
    }
    protected function getMarginAcount($detail){
        $accountService = new MarginAcountService();
        $account = $accountService->getDefault();
        $detail->bail_account_code = $account->account;
        $detail->bail_account_name = $account->name;
        $detail->bail_account_bank = $account->bank;
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new $this->detail_class);

        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('title', '项目名称');
            $filter->like('xmbh', '项目编号');
        });
        $grid->xmbh('项目编号');
        $grid->sellerInfo_id('委托方名称')->display(function($sellerInfo_id){
            $name = '';
            $wtf = $this->sellerInfo;
            if(!empty($wtf)){
                $name = $wtf->name;
            }
            return $name;
        });
        // $grid->column('委托方名称')->display(function () {
        //     $name = '';
        //     $seller = $this->sellerInfo;
        //     if(!empty($seller)){
        //         $name = $seller->sellerName;
        //     }
        //     return $name;
        // });
        $grid->title('项目名称');
        $grid->gpjg('挂牌金额(总价)');
        $grid->gp_date_start('挂牌开始使时间')->display(function($gp_date_start){            
            if(is_null($gp_date_start)){
                return '';
            }
            else{
                return date('Y-m-d',strtotime($gp_date_start));
            }
        });
        $grid->gp_date_end('挂牌结束时间')->display(function($gp_date_end){            
            if(is_null($gp_date_end)){
                return '';
            }
            else{
                return date('Y-m-d',strtotime($gp_date_end));
            }
        });
        $grid->sjly('项目来源')->display(function($sellerInfo_id){
            $ssjt = '';
            $wtf = $this->sellerInfo;
            if(!empty($wtf)){
                $ssjt = $wtf->ssjt;
            }
            return $ssjt;
        });
        $grid->process_name('项目状态');
        // $workProcess = WorkProcess::where('status',1)->where('type',$this->projectTypeCode)->first();       
        // $nodes = $workProcess->nodes; 
        // $grid->process('项目状态')->display(function($process)use($nodes) {
        //     $node = $nodes->where('code',$process)->first();
        //     return $node->name;
        // });
        $user = Admin::user();
        if($user->id != 1){
            $grid->model()->where('user_id', $user->id);
        }
        

        $getBotton = function($title,$view,$fa,$id,$methed){
            $a = "<a href='/admin/".$this->projectTypeCode."/".$methed."/".$id."' style='margin-left:10px;' title='".$title."'><i class='fa fa-".$fa."'></i>".$view."</a>";
            return $a; 
        };
        $grid->actions(function ($actions)use(&$getBotton){
            // $actions->disableView();
            
            // 当前行的数据数组
            $rec = $actions->row;
            if($rec->process >= 113){
                $actions->disableDelete();
                $actions->disableEdit();
            }
            
            $pause = "<a href='/admin/zzgg/choice/$rec->project_id' style='margin-left:10px;' title='中止挂牌'><i class='fa fa-pause'></i>中止</a>";
            $stop = "<a href='/admin/zjgg/choice/$rec->project_id' style='margin-left:10px;' title='终结挂牌'><i class='fa fa-stop'></i>终结</a>";
            $recover = "<a href='/admin/hfgg/choice/$rec->project_id' style='margin-left:10px;' title='恢复挂牌'><i class='fa fa-mail-reply'></i>恢复</a>";
            $delay = "<a href='/admin/yqgg/choice/$rec->project_id' style='margin-left:10px;' title='延期挂牌'><i class='fa fa-mail-reply'></i>延期</a>";
            $change = "<a href='/admin/bggg/choice/$rec->project_id' style='margin-left:10px;' title='变更挂牌内容'><i class='fa fa-mail-reply'></i>变更</a>";

            $zzgg = "<a href='/admin/zzgg/edit/$rec->project_id' style='margin-left:10px;' title='中止挂牌'><i class='fa fa-pause'></i>中止公告</a>";
            $zjgg = "<a href='/admin/zjgg/edit/$rec->project_id' style='margin-left:10px;' title='终结挂牌'><i class='fa fa-stop'></i>终结公告</a>";
            $hfgg = "<a href='/admin/hfgg/recover/$rec->project_id' style='margin-left:10px;' title='恢复挂牌'><i class='fa fa-mail-reply'></i>恢复公告</a>";
            $yqgg = "<a href='/admin/yqgg/recover/$rec->project_id' style='margin-left:10px;' title='延期挂牌'><i class='fa fa-mail-reply'></i>延期公告</a>";
            $bggg = "<a href='/admin/bggg/recover/$rec->project_id' style='margin-left:10px;' title='变更挂牌内容'><i class='fa fa-mail-reply'></i>变更公告</a>";

            $uploadcontract = "<a href='/admin/htxx/edit/$rec->project_id' style='margin-left:10px;' title='上传合同'><i class='fa fa-edit'></i>上传合同</a>";

            $yxdj = "<a href='/admin/yxdj/list/edit/$rec->project_id' style='margin-left:10px;' title='意向登记'><i class='fa fa-edit2'></i>意向登记</a>";

            $cjxx = "<a href='/admin/cjxx/edit/$rec->project_id' style='margin-left:10px;' title='录入成交信息'><i class='fa fa-edit2'></i>录入成交信息</a>";
            $cjgg = "<a href='/admin/cjgg/edit/$rec->project_id' style='margin-left:10px;' title='录入成交公告'><i class='fa fa-edit2'></i>录入成交公告</a>";
            $zbtz = "<a href='/admin/zbtz/edit/$rec->project_id' style='margin-left:10px;' title='录入中标通知'><i class='fa fa-edit2'></i>录入中标通知</a>";
            $sftz = "<a href='/admin/sftz/edit/$rec->project_id' style='margin-left:10px;' title='录入收费通知'><i class='fa fa-edit2'></i>录入缴费通知</a>";
            $jyjz = "<a href='/admin/jyjz/edit/$rec->project_id' style='margin-left:10px;' title='交易鉴证'><i class='fa fa-edit2'></i>交易鉴证</a>";

            $pbjg = "<a href='/admin/pbjg/list/edit/$rec->project_id' style='margin-left:10px;' title='评标结果'><i class='fa fa-edit2'></i>录入评标结果</a>";

            $gpsj = "<a href='/admin/gpsj/edit/$rec->project_id' style='margin-left:10px;' title='挂牌时间'><i class='fa fa-edit2'></i>录入挂牌时间</a>";
            $zp = "<a href='/admin/zp/edit/$rec->project_id' style='margin-left:10px;' title='摘牌'><i class='fa fa-edit2'></i>摘牌</a>";
            $lhsc = "<a href='/admin/lhsc/edit/$rec->project_id' style='margin-left:10px;' title='联合资格审查'><i class='fa fa-edit2'></i>联合资格审查</a>";
            $lhscqr = "<a href='/admin/lhscqr/edit/$rec->project_id' style='margin-left:10px;' title='联合资格审查确认'><i class='fa fa-edit2'></i>联合资格审查确认</a>";
            $jyfs = "<a href='/admin/jyfs/edit/$rec->project_id' style='margin-left:10px;' title='确认交易方式'><i class='fa fa-edit2'></i>确认交易方式</a>";

            $bottons = "";

            switch($rec->process){
                case 120:
                    // $bottons .= $getBotton('管理项目','管理项目','edit2',$rec->id,'manage');
                    $bottons .= $yxdj;
                    $bottons .= $zp;
                    //$bottons .= $pause;
                    //$bottons .= $zjgg;
                    break;
                case 111:
                case 112:
                    //项目录入
                    break;
                case 121:
                case 122:
                    //项目信息发布（录入挂牌时间）
                    $bottons .= $gpsj;
                    break;
                case 131:
                case 132:
                    //联合资格审查
                    $bottons .= $lhsc;
                    break;
                case 141:
                case 142:
                    //确认联合资格审查
                    $bottons .= $lhscqr;
                    break;
                case 151:
                case 152:
                    //交易方式确定
                    $bottons .= $jyfs;
                    break;
                case 161:
                case 162:
                    //评标结果公示
                    $bottons .= $pbjg;
                    break;
                case 171:
                case 172:
                    //成交信息录入
                    $bottons .= $cjxx;
                    break;
                case 181:
                case 182:
                    //成交公告发布
                    $bottons .= $cjgg;
                    break;
                case 191:
                case 192:
                    //中标通知
                    $bottons .= $zbtz;
                    break;
                case 201:
                case 202:
                    //收费通知
                    $bottons .= $sftz;
                    break;
                case 211:
                case 212:
                    //合同
                    $bottons .= $uploadcontract;
                    break;
                case 221:
                case 222:
                    //交易鉴证
                    $bottons .= $jyjz;
                    break;
                case 231:
                case 232:
                    //流标
                    break;
                case 241:
                case 242:
                    //中止
                    break;
                case 251:
                case 252:
                    //恢复
                    break;
                case 261:
                case 262:
                    //终结
                    $bottons .= $zjgg;
                    break;
                case 271:
                case 272:
                    //延期
                    break;
                
            }
            $actions->append($bottons); 

        });
        return $grid;
    }


    protected $fields_project = [
        'insert' => ['title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl','customer_id'],
        'update' => ['title','type','price','gp_date_start','gp_date_end','status','djl','customer_id'],
    ];
    protected $fields = [
        'insert' => [],
        'update' => [],
    ];

    protected function add(Request $request){
        $data_detail = $request->only($this->fields['insert']);
        $data_project = $request->only($this->fields_project['insert']);
        $detail = $this->service->add($data_detail,$data_project,111,null);
        
        $result = [
            'success' => 'true',
            'message' => $detail,
            'detail_id' => $detail->id,
            'project_id' => $detail->project_id,
            'xmbh' => $detail->xmbh,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    protected function update(Request $request){
        $detail_id = $request->id;
        $data_detail = $request->only($this->fields['update']);
        $data_project = $request->only($this->fields_project['update']);
        $data_project['price'] = $data_detail['gpjg'];

        $this->service->update($detail_id,$data_detail,$data_project,111,null);
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];

        return response()->json($result);
    }

    public function submit(Request $request){
        $detail_id = $request->id;
        $fhr_user_id = $request->fhr;
        $this->service->submit($detail_id,$fhr_user_id);
        return redirect()->route($this->projectTypeCode.'.index');
    }


    public function getOptionHistory($project_id){
        $records = DB::table('work_process_records')->leftJoin('admin_users','work_process_records.user_id','.admin_users.id')    ->where('work_process_records.table_id','=',$project_id)
                ->select('work_process_records.operation','admin_users.name','work_process_records.created_at')
                ->get();
        return $records;
    }

    public function approval($id, Content $content){
        $project = Project::find($id);
        $pbresults = $project->pbResults()->get();
        $detail = $project->detail;
        // $url = 'admin.project.'.$project->type.'.approval';
        $url = 'admin.project.approval';
        $records = $this->getOptionHistory($id);
        $datas = $this->getDatasToView($detail);
        $datas['pbresults'] = $pbresults;
        // $datas = [
        //     'detail' => $detail,
        //     'records' => $records,
        //     'pbresults' => $pbresults,
        //     'yxfs' => $project->intentionalParties,
        //     'files' => $detail->files,
        //     'images' => $detail->images,
        //     'projecttype' => 'projects',
        // ]; 
        return $content
            ->header('审批')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view($url, $datas));  
    }

    /**
     *录入评标结果
     */
    public function editpb($id, Content $content)
    {
        $detail = $this->detail_class::find($id);

        $records = $this->getOptionHistory($detail->project_id);
        $pbresults = PbResult::where('project_id',$detail->project_id)->get();
        $datas = [
            'detail' => $detail,
            'records' => $records,
            'projecttype' => $this->projectTypeCode,
            'pbresults' => $pbresults,
            'files' => $detail->files,
            // 'images' => $detail->images,
        ];
        return $content
            ->header('评标结果录入')
            ->body(view('admin.project.gkzb.edit', $datas));  
    }

    // public function pb($id,Request $request,ProcessService $processService){
    //     $purchase_id = $request->id;
    //     $process = $request->process;
    //     $operation = $request->operation;
    //     DB::transaction(function () use($id,$process,$operation,$processService) {
    //         $processService->next($id,null,$operation,$nodecode=null);
    //     });
        
    //     return redirect()->route($this->projectTypeCode.'.index');
    // }  

    public function editjj($id, Content $content)
    {
        $detail = $this->detail_class::find($id);
        $records = $this->getOptionHistory($detail->project_id);

        $datas = [
            'detail' => $detail,
            'records' => $records,
            'projecttype' => $this->projectTypeCode,
            'yxfs' => $detail->intentionalParties,
            'files' => $detail->files,
            'images' => $detail->images,
        ];
        return $content
            ->header('评标结果录入')
            ->body(view('admin.cjxx.edit', $datas));  
    } 

    public function jj(Request $request){
        $yxf_id = $request->yxf_id;
        $this->service->jj($yxf_id);
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];

        return response()->json($result);
    }

    //===========================================================
    //显示挂牌日期编辑页面
    public function gpsjEdit($project_id, Content $content){
        $project = Project::find($project_id);
        $detail = $project->detail;
        $datas = [
            'detail' => $detail,
            'project' => $project,
            'projecttype' => 'gpsj',
            'id' => $detail->id,
            'project_id' => $project->id,
            'files' => $detail->files,
            'images' => $detail->images,
        ];
        return $content
            ->header('挂牌日期录入')
            ->body(view('admin.gpsj.edit', $datas));
    }

    //挂牌日期保存
    protected function gpsjSave(Request $request){
        $detail_id = $request->id;
        $project_id = $request->project_id;
        $gp_date_start = $request->gp_date_start;
        $gp_date_end = $request->gp_date_end;
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        try{
            $baseService = new ProjectBaseService();
            $detail = $baseService->gprqSave($project_id,$gp_date_start,$gp_date_end);
        }
        catch(\Exception $e){
            $result['success'] = 'false';
            $result['message'] = '保存失败，请联系管理员';
            Log::error($e);
        }
        // $detail = $this->service->gprqSave($project_id,$gp_date_start,$gp_date_end);
        return response()->json($result);
    }

    public function gpsjSubmit(Request $request){
        $detail_id = $request->id;
        $project_id = $request->project_id;
        $project = Project::find($project_id);
        $projectService = new ProjectService();
        $projectService->submit($project,'挂牌时间录入');
        return redirect()->route($project->type.'.index');
    }
    //显示挂牌日期审批页面
    public function gpsjApproval($project_id, Content $content){
        $project = Project::find($project_id);
        $detail = $project->detail;
        $datas = [
            'detail' => $detail,
            'project' => $project,
            'projecttype' => 'gpsj',
            'id' => $detail->id,
            'project_id' => $project->id,
            'files' => $detail->files,
            'images' => $detail->images,
        ];
        return $content
            ->header('挂牌日期审批')
            ->body(view('admin.gpsj.approval', $datas));
    }

    /**摘牌
     *@param $id 明细表ID
     */
    public function zpEdit($project_id, Content $content)
    {
        $project = Project::find($project_id);
        // $records = $this->getOptionHistory($detial->project_id);
        $datas = [
            'detail' => $project->detail,
            'project' => $project,
            'projecttype' => 'zp',
        ];
        return $content
            ->header('挂牌日期录入')
            ->body(view('admin.zp.edit', $datas));
    }

    /**摘牌/流标
     *@param $id 项目主表ID
     */
    public function zp($project_id,Request $request){
        $process = '';
        $operation = $request->operation;
        $operationtype = $request->operationtype;
        $project = Project::find($project_id);
        $detail = $project->detail;
        if($operationtype == '1'){//摘牌
            $is_examination = $detail->is_examination;
            if($is_examination == '1'){//是，
                $process = 131;//联合资格审查
            }
            else if($is_examination == '2'){//否
                $process = 151;//确定交易方式
            }
        }
        else if($operationtype == '2'){//流标
            $process = 231;
        }
        switch ($operationtype) {
            case 1://摘牌
                $is_examination = $detail->is_examination;
                if($is_examination == '1'){//是，
                    $process = 131;//联合资格审查
                }
                else if($is_examination == '2'){//否
                    $process = 151;//确定交易方式
                }
                break;
            case 2://流标
                $process = 231;
                break;
            case 3://中止
                $process = 241;
                break;
            case 4://终结
                $process = 261;
                break;
            case 5://延期
                $process = 271;
                break;
            
            default:
                # code...
                break;
        }
        $baseService = new ProjectBaseService();
        $baseService->zp($detail->id,$process,$operation);
        return redirect()->route($project->type.'.index');
    }


    /**联合资格审查
     */
    public function lhscEdit($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $detail = $project->detail;
        // $records = $this->getOptionHistory($detial->project_id);
        $datas = [
            'detail' => $project->detail,
            'project' => $project,
            'projecttype' => 'lhsc',
            'id' => $detail->id,
            'project_id' => $project->id,
            'files' => $detail->files,
            'images' => $detail->images,
            'yxfs' => $project->intentionalParties,
        ];
        return $content
            ->header('联合资格审查')
            ->body(view('admin.lhsc.edit', $datas));
    }

    //联合资格审查保存
    protected function lhscSave(Request $request){
        $project_id = $request->project_id;
        $project = Project::find($project_id);
        $yxfs = $project->intentionalParties;
        for($i = 0 ;$i< $yxfs->count();$i++){
            $ptf_opinion_name = 'ptf_opinion'.$i;
            $ptf_desc_name = 'ptf_desc'.$i;
            $wtf_opinion_name = 'wtf_opinion'.$i;
            $wtf_desc_name = 'wtf_desc'.$i;

            $yxfs[$i]->ptf_opinion = $request->$ptf_opinion_name;
            $yxfs[$i]->ptf_desc = $request->$ptf_desc_name;
            $yxfs[$i]->wtf_opinion = $request->$wtf_opinion_name;
            $yxfs[$i]->wtf_desc = $request->$wtf_desc_name;

        }
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        try{
            $baseService = new ProjectBaseService();
            $detail = $baseService->lhscSave($project_id,$yxfs);
        }
        catch(\Exception $e){
            $result['success'] = 'false';
            $result['message'] = '保存失败，请联系管理员';
            Log::error($e);
        }
        return response()->json($result);
    }

    public function lhscSubmit(Request $request){
        $detail_id = $request->id;
        $project_id = $request->project_id;
        $project = Project::find($project_id);
        $projectService = new ProjectService();
        $projectService->submit($project,'联合资格审查录入');
        return redirect()->route($project->type.'.index');
    }

    //显示联合资格审查审批页面
    public function lhscApproval($project_id, Content $content){
        $project = Project::find($project_id);
        $detail = $project->detail;
        $datas = [
            'detail' => $detail,
            'project' => $project,
            'projecttype' => 'lhsc',
            'id' => $detail->id,
            'project_id' => $project->id,
            'files' => $detail->files,
            'images' => $detail->images,
            'yxfs' => $project->intentionalParties,
        ];
        return $content
            ->header('联合资格审查审批')
            ->body(view('admin.lhsc.approval', $datas));
    }

    /**联合资格审查确认
     */
    public function lhscqrEdit($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $detail = $project->detail;
        // $records = $this->getOptionHistory($detial->project_id);
        $datas = [
            'detail' => $project->detail,
            'project' => $project,
            'projecttype' => 'lhscqr',
            'id' => $detail->id,
            'project_id' => $project->id,
            'files' => $detail->files,
            'images' => $detail->images,
            'yxfs' => $project->intentionalParties,
        ];
        return $content
            ->header('联合资格审查确认')
            ->body(view('admin.lhsc.edit', $datas));
    }

    public function lhscqrSubmit(Request $request){
        $detail_id = $request->id;
        $project_id = $request->project_id;
        $project = Project::find($project_id);
        $projectService = new ProjectService();
        $projectService->submit($project,'联合资格审查确认录入');
        return redirect()->route($project->type.'.index');
    }

    //显示联合资格审查审批页面
    public function lhscqrApproval($project_id, Content $content){
        $project = Project::find($project_id);
        $detail = $project->detail;
        $datas = [
            'detail' => $detail,
            'project' => $project,
            'projecttype' => 'lhscqr',
            'id' => $detail->id,
            'project_id' => $project->id,
            'files' => $detail->files,
            'images' => $detail->images,
            'yxfs' => $project->intentionalParties,
        ];
        return $content
            ->header('联合资格审查确认审批')
            ->body(view('admin.lhscqr.approval', $datas));
    }


}