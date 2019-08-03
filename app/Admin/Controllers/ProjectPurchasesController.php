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
use App\Http\Requests\ProjectPurchaseRequest;

class ProjectPurchasesController extends ProjectBaseController
{
    // 利用 Laravel 的自动解析功能注入 Service 类
    public function __construct(ProjectPurchaseService $projectPurchaseService)
    {
        $this->projectTypeName = '企业采购';
        $this->projectTypeCode = 'qycg';
        // $this->folder_controller = 'projectpurchases';
        $this->folder_view = 'admin.project.qycg';
        $this->detail_class = ProjectPurchase::class;
        $this->fields = [
            'insert' => ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','bdyx','xmpz','gq','jyfs','bjms','jjfd','jy_date','zbdl_lxfs','yxf_zgtj','yxdj_zlqd','yxdj_sj','yxdj_fs','bzj_jn_time_end','bzj','zbwj_dj','jypt_lxfs','notes'],
            'update' => ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','bdyx','xmpz','gq','jyfs','bjms','jjfd','jy_date','zbdl_lxfs','yxf_zgtj','yxdj_zlqd','yxdj_sj','yxdj_fs','bzj_jn_time_end','bzj','zbwj_dj','jypt_lxfs','notes'],
        ];
        $this->service = $projectPurchaseService;
        
    }

    public function insert(ProjectPurchaseRequest $request){
        return parent::add($request);
    }
    
    public function modify(ProjectPurchaseRequest $request){
        return parent::update($request);
    }

}
