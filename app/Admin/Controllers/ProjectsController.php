<?php

namespace App\Admin\Controllers;

use App\Models\Project;
use App\Models\ProjectPurchase;
use App\Models\ProjectLease;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Models\TargetCompanyBaseInfo;
use App\Models\TargetCompanyOwnershipStructure;
use App\Models\AuditReport;
use App\Models\FinancialStatement;
use App\Models\Assessment;
use App\Models\SellerInfo;
use App\Models\Supervise;
use App\Models\AssetInfo;
use App\Models\Contact;
use Encore\Admin\Auth\Database\Administrator;
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
use Illuminate\Support\Facades\Log;

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
        $project = Project::find($id);
        $pbresults = $project->pbResults()->get();

        $detail = $project->detail;
        $url = 'admin.project.'.$project->type.'.show';

        $records = DB::table('work_process_records')->leftJoin('admin_users','work_process_records.user_id','.admin_users.id')    ->where('work_process_records.table_id','=',$detail->id)
                ->select('work_process_records.operation','admin_users.name','work_process_records.created_at')
                ->get();

        $datas = [
            'detail' => $detail,
            'records' => $records,
            'pbresults' => $pbresults,
            'yxfs' => $project->intentionalParties,
            'files' => $detail->files,
            'images' => $detail->images,
            'projecttype' => 'projects',
            'cjxx' => $detail->project->transaction,
        ]; 

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
        $grid->type('项目类型')->display(function($type){
            return getXmlxName($type);
        });
        $grid->price('挂牌金额');
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
        $grid->process_name('项目状态');
        // $workProcess = WorkProcess::where('status',1)->where('type','zczl')->first();       
        // $nodes = $workProcess->nodes; 
        // $grid->process('项目状态')->display(function($process)use($nodes) {
        //     $node = $nodes->where('code',$process)->first();
        //     return $node->name;
        // });

        $grid->user_id('项目经理')->display(function($user_id){
            // $admin_user = $nodes->where('code',$process)->first();
            $admin_user = Administrator::find($user_id);
            return $admin_user->name;
        });
        // $grid->column('work_process_instances.work_process_node_id');
        // $grid->column('WorkProcessInstance.code');
        
        $user = Admin::user();
        $role = $user->roles()->first();
        if($user->id != 1){
            $grid->model()->whereIn('detail_id',$this->getProjectIds());
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
            $fbnodes = array(
                '119','129','139','149','159','169','179','189',
                '219','229','239','249','259','269','279','289',
                '319','329','339','349','359','369','379','389',
            );
            $spnodes = array(
                '113','114','115','123','124','125','133','134','135',
                '143','144','145','153','154','155','163','164','165',
                '173','174','175','183','184','185','193','194','195',
                '213','214','215','223','224','225','233','234','235',
                '243','244','245','253','254','255','263','264','265',
                '273','274','275','283','284','285','293','294','295',
                '313','314','315','323','324','325','333','334','335',
                '343','344','345','353','354','355','363','364','365',
                '373','374','375','383','384','385','393','394','395',
            );
            if(in_array($rec->process,$fbnodes) ){
                //$actions->append("<a href='/admin/projects/showapproval/$rec->id' style='margin-left:10px;'><i class='fa fa-edit'>发布</i></a>");
            }
            else if(in_array($rec->process,$spnodes) ){
                //$actions->append("<a href='/admin/projects/showapproval/$rec->id' style='margin-left:10px;'><i class='fa fa-edit'>审批</i></a>");
            }

            $bottons = null;
            switch($rec->process){
                case 113:
                case 114:
                case 115:
                case 116:
                case 117:
                case 118:
                    $bottons = getButtion($rec->type,$rec->id,'审批');
                    break;

                case 123:
                case 124:
                case 125:
                case 126:
                case 127:
                case 128:
                    $bottons = getButtion($rec->type,$rec->id,'审批');
                    break;
                case 129:
                    $bottons = getButtion($rec->type,$rec->id,'发布');
                    break;

                case 133:
                case 134:
                case 135:
                case 136:
                    $bottons = getButtion('lhsc',$rec->id,'审批');
                    break;
                case 139:
                    
                    break;

                case 143:
                case 144:
                case 145:
                case 146:
                    $bottons = getButtion('lhscqr',$rec->id,'审批');
                    break;
                case 149:
                    
                    break;

                case 153:
                case 154:
                case 155:
                case 156:
                    $bottons = getButtion('jyfs',$rec->id,'审批');
                    break;
                case 159:
                    
                    break;

                case 163:
                case 164:
                case 165:
                case 166:
                    $bottons = getButtion('pbjg/list',$rec->id,'审批');
                    break;
                case 169:
                    $bottons = getButtion('pbjg/list',$rec->id,'发布');
                    break;

                case 173:
                case 174:
                case 175:
                case 176:
                    $bottons = getButtion('cjxx',$rec->id,'审批');
                    break;
                case 179:
                    $bottons = getButtion('cjxx',$rec->id,'确认');
                    break;

                case 183:
                case 184:
                case 185:
                case 186:
                    $bottons = getButtion('cjgg',$rec->id,'审批');
                    break;
                case 189:
                    $bottons = getButtion('cjgg',$rec->id,'发布');
                    break;

                case 193:
                case 194:
                case 195:
                case 196:
                    $bottons = getButtion('zbtz',$rec->id,'审批');
                    break;
                case 199:
                    $bottons = getButtion('zbtz',$rec->id,'确认');
                    break;

                case 203:
                case 204:
                case 205:
                case 206:
                    $bottons = getButtion('sftz',$rec->id,'审批');
                    break;
                case 209:
                    $bottons = getButtion('sftz',$rec->id,'确认');
                    break;

                case 213:
                case 214:
                case 215:
                case 216:
                    $bottons = getButtion('htxx',$rec->id,'审批');
                    break;
                case 219:
                    $bottons = getButtion('htxx',$rec->id,'确认');
                    break;

                case 223:
                case 224:
                case 225:
                case 226:
                    $bottons = getButtion('jyjz',$rec->id,'审批');
                    break;
                case 229:
                    $bottons = getButtion('jyjz',$rec->id,'确认');
                    break;

                case 233:
                case 234:
                case 235:
                case 236:
                    $bottons = getButtion('lbgg',$rec->id,'审批');
                    break;
                case 239:
                    $bottons = getButtion('lbgg',$rec->id,'发布');
                    break;

                case 243:
                case 244:
                case 245:
                case 246:
                    $bottons = getButtion('zzgg',$rec->id,'审批');
                    break;
                case 249:
                    $bottons = getButtion('zzgg',$rec->id,'发布');
                    break;

                case 253:
                case 254:
                case 255:
                case 256:
                    $bottons = getButtion('hfgg',$rec->id,'审批');
                    break;
                case 259:
                    $bottons = getButtion('hfgg',$rec->id,'发布');
                    break;


                case 263:
                case 264:
                case 265:
                case 266:
                    $bottons = getButtion('zjgg',$rec->id,'审批');
                    break;
                case 269:
                    $bottons = getButtion('zjgg',$rec->id,'发布');
                    break;

                case 273:
                case 274:
                case 275:
                case 276:
                    $bottons = getButtion('yqgg',$rec->id,'审批');
                    break;
                case 279:
                    $bottons = getButtion('yqgg',$rec->id,'发布');
                    break;


            }
            $actions->append($bottons);
            
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
            ->orWhere('work_process_instances.user_id',$user->id)
            ->pluck('work_process_instances.table_id');

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

        $project = Project::find($id);
        $pbresults = $project->pbResults()->get();
        $url = '';
        $detail = null;
        switch($project->type){
            case 'qycg':
                    $detail = $project->projectPurchase()->first();        
                    $url = 'admin.project.qycg.approval';
                break;
            case 'zczl':
                    $detail = ProjectLease::where('project_id',$id)->first();        
                    $url = 'admin.project.zczl.approval';
                break;
                 
        }
        $records = DB::table('work_process_records')->leftJoin('admin_users','work_process_records.user_id','.admin_users.id')    ->where('work_process_records.table_id','=',$detail->id)
                ->select('work_process_records.operation','admin_users.name','work_process_records.created_at')
                ->get();

        $datas = [
            'detail' => $detail,
            'records' => $records,
            'pbresults' => $pbresults,
            'yxfs' => $project->intentionalParties,
            'files' => $detail->files,
            'images' => $detail->images,
            'projecttype' => 'projects',
        ]; 
        return $content
            ->header('审批')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view($url, $datas));  
    }

    public function approval(Request $request,ProcessService $processService,Content $content){
        $id = $request->id;
        $project_id = $request->project_id;
        $reason = $request->reason;
        $operation = $request->operation;
        $process = $request->process;
        $isNext = $request->isNext;

        $isSuccess = true;
        $message = '操作成功！';
        $project = Project::find($project_id);
        $processService->refreshInstance($project->detail_id,$isNext,$reason,$operation,null);
        try{
        // DB::transaction(function () use($id,$reason,$operation,$process,$isNext,$processService) {
        //     $project = Project::find($id);
        //     // $processService->next($project->detail_id,$reason,$operation,$nodecode=null);
        //     $processService->refreshInstance($project->detail_id,$isNext,$reason,$operation,null);
        //     $processService->postGZW($id,$project->process);
        // });
            if($project->detail->sjly == '监管平台'){
                $sendNodes = ['119','139','149','159','169','219','229','239','269','319','339','349'];
                if(in_array($project->process,$sendNodes)){
                    $isSuccess = $processService->postGZW($project_id,$project->process);
                }
            }
        }
        catch(\Exception $e){
            $isSuccess = false;
            Log::error($e);
        }

        if($isSuccess){
            return redirect('/admin/projects');
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
        // return redirect('/admin/projects');
        // return $this->index(Content $content);
        
        // return redirect('/admin/projects')->withInfo('Title', $message);
        // return view('projects.index')->with('Title', $message);
    }

}
