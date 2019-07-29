<?php

namespace App\Http\Controllers\Api;

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

class Controller extends BaseController
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
     * Controller路径：
     * projectleases、projectpurchases
     */
    protected $folder_controller;    
    /**
     * 页面路径：
     * admin.project.lease、admin.project.purchase
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
            ->header($folder_controller)
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
        $detail = $detail_class::find($id);
        $datas = [
            'detail' => $detail,
            'projecttype' => $folder_controller,
        ]; 
        $url = $this->getViewUrl('show');  
        return $content
            ->header($projectTypeName.'-查看')
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
        $detail = $detail_class::find($id);
        $datas = [
            'detail' => $detail,
            'projecttype' => $folder_controller,
        ]; 
        $url = $this->getViewUrl('edit');  
        return $content
            ->header($projectTypeName.'-编辑')
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
        $detail = new $detail_class();
        $datas = [
            'detail' => $detail,
            'projecttype' => $folder_controller,
        ];
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
        $detail = $detail_class::find($id);
        $detail->id = '';
        $detail->project_id = '';
        $detail->process = '11';
        
        $datas = [
            'detail' => $detail,
            'projecttype' => $folder_controller,
        ];
        $url = $this->getViewUrl('edit');
        return $content
            ->header($projectTypeName.'-新增')
            ->body(view($url,$datas)); 
    }

    protected function getViewUrl($name){
    	$url = $folder_view.'.'.$name;
    	return $url;
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new $detail_class);

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

        $workProcess = WorkProcess::where('status',1)->where('projecttype','zczl')->first();       
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
                case 61:
                    $actions->append("<a href='/admin/projectpurchases/editpb/$rec->id' style='float: left;margin-right:10px;'><i class='fa fa-edit'></i>录入评标结果</a>"); 
                    break;    
                case 81:
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

}