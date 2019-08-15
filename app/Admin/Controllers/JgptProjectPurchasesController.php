<?php

namespace App\Admin\Controllers;

use App\Models\JgptProjectPurchase;
use App\Http\Controllers\Controller;
use App\Services\JgptProjectPurchaseService;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;

class JgptProjectPurchasesController extends WbjkProjectBaseController
{

    public function __construct(JgptProjectPurchaseService $jgptProjectPurchaseService)
    {
        $this->projectTypeName = '企业采购';
        $this->projectTypeCode = 'qycg';
        // $this->folder_controller = 'projectpurchases';
        $this->folder_view = 'admin.project.jgpt.qycg';
        $this->detail_class = JgptProjectPurchase::class;
        $this->fields = [
            'insert' => ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','bdyx','xmpz','gq','jyfs','bjms','jjfd','jy_date','zbdl_lxfs','yxf_zgtj','yxdj_zlqd','yxdj_sj','yxdj_fs','bzj_jn_time_end','bzj','zbwj_dj','jypt_lxfs','notes','bzj_zhm','bzj_bank','bzj_zh'],
            'update' => ['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','bdyx','xmpz','gq','jyfs','bjms','jjfd','jy_date','zbdl_lxfs','yxf_zgtj','yxdj_zlqd','yxdj_sj','yxdj_fs','bzj_jn_time_end','bzj','zbwj_dj','jypt_lxfs','notes','bzj_zhm','bzj_bank','bzj_zh'],
        ];
        $this->service = $jgptProjectPurchaseService;
        
    }

}
