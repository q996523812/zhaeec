<?php

namespace App\Admin\Controllers;

use App\Models\AssetInfo;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\AssetInfoService;
use App\Http\Requests\AssetInfoRequest;

class AssetInfosController extends Controller
{
    private $service = null;
    
    protected $fields = ['certificateNo','address','area','type','useYear','usedYear','planningPurposes','currentlyUse','supporting_facilities','project_id'];

    public function __construct(AssetInfoService $service)
    {
        $this->service = $service;
    }

    public function insert(AssetInfoRequest $request){
        $params = $request->only($this->fields);

        $model = $this->service->add($params);
        
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function modify(AssetInfoRequest $request){
        $params = $request->only($this->fields);
        $id = $request->assetInfo_id;
        $this->service->update($id,$params);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        return response()->json($result);
    }
    
}
