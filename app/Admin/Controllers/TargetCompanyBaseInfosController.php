<?php

namespace App\Admin\Controllers;

use App\Models\TargetCompanyBaseInfo;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\TargetCompanyBaseInfoService;
use App\Http\Requests\TargetCompanyBaseInfoRequest;

class TargetCompanyBaseInfosController extends Controller
{
    private $service = null;
    
    protected $fields = ['column_name','compName','compZcode','compIndustry1','compIndustry2','comp0One','comp0Two','compTime','compProvince','compCity','compCounty','compAddress','compUniGslx','compUniJjlx','compScope','compFunding','moneytype','compBoss','compScale','compZrs','innerAudit','innerAuditDesc','compTdhb','holderNum','spare2','project_id'];

    public function __construct(TargetCompanyBaseInfoService $service)
    {
        $this->service = $service;
    }

    public function insert(TargetCompanyBaseInfoRequest $request){
        $params = $request->only($this->fields);

        $model = $this->service->add($params);
        
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function modify(TargetCompanyBaseInfoRequest $request){
        $params = $request->only($this->fields);
        $id = $request->targetCompanyBaseInfo_id;
        $this->service->update($id,$params);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        return response()->json($result);
    }

}
