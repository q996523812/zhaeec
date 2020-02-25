<?php

namespace App\Admin\Controllers;

use App\Models\SellerInfo;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\SellerInfoService;
use App\Http\Requests\SellerInfoRequest;

class SellerInfosController extends Controller
{
    private $service = null;
    
    // protected $fields = ['sellerName','unionFlag','sellerZcode','sellerIndustry1','sellerIndustry2','seller0One','seller0Two','sellerTime','sellerProvince','sellerCity','sellerCounty','sellerAddress','sellerUniGslx','sellerUniJjlx','compScope','sellerFunding','moneyType','sellerBoss','sellerScale','compZrs','innerAudit','innerAuditDesc','holdPercent','sharesHave','sellPercent','sharesWant','project_id'];

    protected $fields = [
        'type','name','certificate_type','certificate_code','industry1','industry2','financial_industry1','financial_industry2','found_date','province','city','county','address','companytype','economytype','scope','funding','currency','boss','scale','workers_num','inner_audit','inner_audit_desc','Shareholder_num','stock_num','sfhygyhbtd','sfgz','work_unit','work_duty','ssjt','fax','phone','email','ssjt','qualification','project_id'
    ];


    public function __construct(SellerInfoService $service)
    {
        $this->service = $service;
    }

    public function insert(SellerInfoRequest $request){
        $params = $request->only($this->fields);

        $model = $this->service->add($params);
        
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function modify(SellerInfoRequest $request){
        $params = $request->only($this->fields);
        $id = $request->sellerInfo_id;
        $this->service->update($id,$params);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        return response()->json($result);
    }

}
