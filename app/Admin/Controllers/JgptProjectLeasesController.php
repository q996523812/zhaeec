<?php

namespace App\Admin\Controllers;

use App\Models\JgptProjectLease;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\JgptProjectLeaseService;

class JgptProjectLeasesController extends WbjkProjectBaseController
{

    public function __construct(JgptProjectLeaseService $jgptProjectLeaseService)
    {
        $this->projectTypeName = '资产租赁';
        $this->projectTypeCode = 'zczl';
        // $this->folder_controller = 'projectpurchases';
        $this->folder_view = 'admin.project.jgpt.zczl';
        $this->detail_class = JgptProjectLease::class;
        $this->fields = [
            'insert' => ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','xmbh','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','gpjg_dj','zlqx','jymd','zclb','fbfs','zcsfsx','pgjz','jyfs','bjms','jjfd','jysj_bz','yxf_zgtj','yxdj_zlqd','bzj_jn_time_end','bzj','jypt_lxfs','notes','fc_province','fc_city','fc_area','fc_street','fc_gn','fc_mj','fc_zjh','fc_zjjg','fc_ysynx','fc_ghyt','fc_sfyyzh','fc_jcsj','fc_dqyt','fc_yzh_yxq','status'],
            'update' => ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','xmbh','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','gpjg_dj','zlqx','jymd','zclb','fbfs','zcsfsx','pgjz','jyfs','bjms','jjfd','jysj_bz','yxf_zgtj','yxdj_zlqd','bzj_jn_time_end','bzj','jypt_lxfs','notes','fc_province','fc_city','fc_area','fc_street','fc_gn','fc_mj','fc_zjh','fc_zjjg','fc_ysynx','fc_ghyt','fc_sfyyzh','fc_jcsj','fc_dqyt','fc_yzh_yxq','status'],
        ];
        $this->service = $jgptProjectLeaseService;
        
    }

    public function sendGp($id,Content $content){
        $jgpt_detail = JgptProjectLease::find($id);
        $result = $this->service->sendGpData($jgpt_detail->detail_id);
        if($result['success']){
            return $content->withSuccess('Title', $result['msg']);
        }
        else{
            return $content->withError('Title', $result['msg']);
        }
    }
}
