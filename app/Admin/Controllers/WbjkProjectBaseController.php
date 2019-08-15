<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\MarginAcountService;
use Carbon\Carbon;

class WbjkProjectBaseController extends Controller
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
        $detail = $this->detail_class::find($id);
        $datas = $this->getDatasToView($detail);
        $url = $this->getViewUrl('edit');  
        return $content
            ->header($this->projectTypeName.'-编辑')
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
            'files' => $detail->files,
            'images' => $detail->images,
        ];
        return $datas;        
    }
    protected function getMarginAcount($detail){
        $accountService = new MarginAcountService();
        $account = $accountService->getDefault();
        $detail->bzj_zhm = $account->name;
        $detail->bzj_bank = $account->bank;
        $detail->bzj_zh = $account->account;
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
        $grid->wtf_name('委托方名称');
        $grid->title('项目名称');
        $grid->gpjg_zj('挂牌金额(总价)');
        $grid->gp_date_start('挂牌开始使时间')->display(function($gp_date_start){            
            return date('Y-m-d',strtotime($gp_date_start));
        });
        $grid->gp_date_end('挂牌结束时间')->display(function($gp_date_end){            
            return date('Y-m-d',strtotime($gp_date_end));
        });
        $grid->status('项目状态')->display(function($status){
            $name = '';
            switch($status){
                case 5: 
                    $name = '待接收';
                    break;
                case 6: 
                    $name = '已退回';
                    break;
                case 7: 
                    $name = '已接收';
                    break;
            }
            return $name;
        });
        $user = Admin::user();

        $getBotton = function($title,$view,$fa,$id,$methed){
            $a = "<a href='/admin/jgpt/".$this->projectTypeCode."/".$methed."/".$id."' style='margin-left:10px;' title='".$title."'><i class='fa fa-".$fa."'></i>".$view."</a>";
            return $a; 
        };
        $grid->actions(function ($actions)use(&$getBotton){
            $actions->disableView();
            $actions->disableDelete();
            $actions->disableEdit();
            // 当前行的数据数组
            $rec = $actions->row;
            $bottons = $getBotton('接收','接收','edit2',$rec->id,'edit');
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

    //业务员接收申请
    public function receive(Request $request){
        $id = $request->id;
        $jgptDetail = $this->service->receive($id);
        return redirect()->route('jgpt.'.$this->projectTypeCode.'.index');
    }

    //业务员退回申请
    public function back(Request $request,JgptProjectPurchase $jgptPurchase){
        $id = $request->id;
        $jgptDetail = $this->service->back($id);
        return redirect()->route('jgpt.'.$this->projectTypeCode.'.index');
    }
}