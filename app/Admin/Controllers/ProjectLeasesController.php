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

class ProjectLeasesController extends ProjectBaseController
{
    public function __construct(ProjectLeaseService $projectLeaseService)
    {
        $this->projectTypeName = '资产租赁';
        $this->projectTypeCode = 'zczl';
        // $this->folder_controller = 'projectpurchases';
        $this->folder_view = 'admin.project.zczl';
        $this->detail_class = ProjectLease::class;
        $this->fields = [
            'insert' => ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg','gpjg_dj','zlqx','jymd','zclb','fbfs','zcsfsx','pgjz','jyfs','bjms','jjfd','jysj_bz','yxf_zgtj','yxdj_zlqd','bzj_jn_time_end','bzj','jypt_lxfs','notes','fc_province','fc_city','fc_area','fc_street','fc_gn','fc_mj','fc_zjh','fc_zjjg','fc_ysynx','fc_ghyt','fc_sfyyzh','fc_jcsj','fc_dqyt','fc_yzh_yxq','status','bail_account_code','bail_account_name','bail_account_bank','pubDays'],
            'update' => ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg','gpjg_dj','zlqx','jymd','zclb','fbfs','zcsfsx','pgjz','jyfs','bjms','jjfd','jysj_bz','yxf_zgtj','yxdj_zlqd','bzj_jn_time_end','bzj','jypt_lxfs','notes','fc_province','fc_city','fc_area','fc_street','fc_gn','fc_mj','fc_zjh','fc_zjjg','fc_ysynx','fc_ghyt','fc_sfyyzh','fc_jcsj','fc_dqyt','fc_yzh_yxq','status','bail_account_code','bail_account_name','bail_account_bank','pubDays'],
        ];
        $this->service = $projectLeaseService;
    }

    public function insert(ProjectLeasesRequest $request){
        return parent::add($request);
    }
    
    public function modify(ProjectLeasesRequest $request){
        return parent::update($request);
    }
    
}
