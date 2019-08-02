<?php

namespace App\Admin\Controllers;

use App\Models\Project;
use App\Models\ProjectLease;
use App\Models\WorkProcess;
use App\Models\WorkProcessNode;
use App\Models\PbResult;
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
use App\Services\ProcessService;
use App\Services\ProjectLeaseService;
use App\Http\Requests\ProjectLeasesRequest;
use Carbon\Carbon;

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
        $url = $this->getViewUrl('show');  
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
        $datas = $this->getDatasToView($detail);
        $url = $this->getViewUrl('edit');  
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
        $datas = $this->getDatasToView($detail);
        $url = $this->getViewUrl('edit');
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
        $detail->id = '';
        $detail->project_id = '';
        $detail->process = '11';
        
        $datas = $this->getDatasToView($detail);
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

    protected function getViewUrl($name){
    	$url = $this->folder_view.'.'.$name;
    	return $url;
    }

    protected function getDatasToView($detail){
        $datas = [
            'detail' => $detail,
            'projecttype' => $this->projectTypeCode,
            'yxfs' => $detail->intentionalParties,
            'files' => $detail->files,
            'images' => $detail->images,
        ];
        return $datas;        
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

        $grid->wtf_name('委托方名称');
        $grid->title('项目名称');
        $grid->gpjg_zj('挂牌金额(总价)');
        $grid->gp_date_start('挂牌开始使时间')->display(function($gp_date_start){            
            return date('Y-m-d',strtotime($gp_date_start));
        });
        $grid->gp_date_end('挂牌结束时间')->display(function($gp_date_end){            
            return date('Y-m-d',strtotime($gp_date_end));
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
            if($rec->process >= 13){
                $actions->disableDelete();
                $actions->disableEdit();
            }
            
            $pause = "<a href='/admin/suspends/pause/$rec->project_id' style='margin-left:10px;' title='中止挂牌'><i class='fa fa-pause'></i>中止</a>";
            $stop = "<a href='/admin/suspends/end/$rec->project_id' style='margin-left:10px;' title='终结挂牌'><i class='fa fa-stop'></i>终结</a>";
            $recover = "<a href='/admin/suspends/recover/$rec->project_id' style='margin-left:10px;' title='恢复挂牌'><i class='fa fa-mail-reply'></i>恢复</a>";
            $winnotices = "<a href='/admin/winnotices/insert/$rec->project_id' style='float: right;margin-left:10px;'><i class='fa fa-edit'></i>录入中标信息</a>";

            $bottons = "";
            switch($rec->process){
                case 20:
                    $bottons .= $getBotton('管理项目','管理项目','edit2',$rec->id,'manage');
                    $bottons .= $getBotton('确认摘牌','摘牌','edit2',$rec->id,'showzp');
                    $bottons .= $pause;
                    $bottons .= $stop;                   
                    break;
                case 21:
                    $bottons .= $getBotton('录入流标通知书','录入流标通知书','edit2',$rec->id,'editlb');
                    break;
                case 31:
                    $bottons .= $pause;
                    break;
                case 32:
                    $bottons .= $pause;
                    break;
                case 30:
                    $bottons .= $recover;
                    break;    
                case 41:
                    $bottons .= $stop;
                    break;
                case 42:
                    $bottons .= $stop;
                    break;               
                case 51:
                    $bottons .= $getBotton('录入竞价结果','录入竞价结果','edit2',$rec->id,'editjj');
                    break;
                case 52:
                    $bottons .= $getBotton('录入竞价结果','修改竞价结果','edit2',$rec->id,'editjj');
                    break;               
                case 61:
                    $bottons .= $getBotton('录入评标结果','录入评标结果','edit2',$rec->id,'editpb');
                    break; 
                case 62:
                    $bottons .= $getBotton('录入评标结果','修改评标结果','edit2',$rec->id,'editpb');
                    break;   
                case 81:
                    $bottons .= $winnotices;
                    break;
                case 82:
                    $bottons .= $winnotices;
                    break;    
                case 98:
                    // $actions->append("<a href='/admin/projectleases/uploadcontract/$rec->id' style='float: left;margin-left:10px;'><i class='fa fa-edit'></i>上传合同</a>"); 
                    break;
            }
            $actions->append($bottons); 

        });
        return $grid;
    }


    protected $fields_project = [
        'insert' => ['title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl'],
        'update' => ['title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl'],
    ];
    protected $fields = [
        'insert' => [],
        'update' => [],
    ];

    protected function add(Request $request){
        $data_detail = $request->only($this->fields['insert']);
        $data_project = $request->only($this->fields_project['insert']);

        $detail = $this->service->add($data_detail,$data_project,11,null);
        
        $result = [
            'success' => 'true',
            'message' => $detail,
            'detail_id' => $detail->id,
            'project_id' => $detail->project_id,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    protected function update(Request $request){
        $detail_id = $request->id;
        $data_detail = $request->only($this->fields['update']);
        $data_project = $request->only($this->fields_project['update']);

        $this->service->update($detail_id,$data_detail,$data_project,11,null);
        $result = [
            'success' => 'true',
            'message' => $data_detail,
            'status_code' => '200'
        ];

        return response()->json($result);
    }

    public function submit(Request $request){
        $detail_id = $request->id;
        $this->service->submit($detail_id);
        return redirect()->route($this->projectTypeCode.'.index');
    }

    public function getOptionHistory($project_id){
        $records = DB::table('work_process_records')->leftJoin('admin_users','work_process_records.user_id','.admin_users.id')    ->where('work_process_records.table_id','=',$project_id)
                ->select('work_process_records.operation','admin_users.name','work_process_records.created_at')
                ->get();
        return $records;
    }
    /**摘牌
     *@param $id 明细表ID
     */
    public function showzp($id, Content $content)
    {
        $detial = $this->detail_class::find($id);
        $records = $this->getOptionHistory($detial->project_id);
        // $pbresults = PbResult::where('project_id',$detial->project_id)->get();
        $datas = [
            'detial' => $detial,
            'records' => $records,
            'projecttype' => $this->projectTypeCode,
            'pbresults' => '',
        ]; 
        $url = $this->getViewUrl('zp');
        return $content
            ->header('摘牌')
            ->body(view($url, $datas));  
    }

    /**摘牌/流标
     *@param $id 项目主表ID
     */
    public function zp($id,Request $request){
        $process = $request->process;
        $operation = $request->operation;
        $this->service->zp($id,$process,$operation);
        return redirect()->route($this->projectTypeCode.'.index');
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
            // 'images' => $detail->images,
        ];
        return $content
            ->header('评标结果录入')
            ->body(view('admin.project.wljj.edit', $datas));  
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
}