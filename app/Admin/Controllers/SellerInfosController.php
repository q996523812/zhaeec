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
    
    protected $fields = ['sellerName','unionFlag','sellerZcode','sellerIndustry1','sellerIndustry2','seller0One','seller0Two','sellerTime','sellerProvince','sellerCity','sellerCounty','sellerAddress','sellerUniGslx','sellerUniJjlx','compScope','sellerFunding','moneyType','sellerBoss','sellerScale','compZrs','innerAudit','innerAuditDesc','holdPercent','sharesHave','sellPercent','sharesWant','project_id'];

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
