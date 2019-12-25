<?php

namespace App\Admin\Controllers;

use App\Models\Supervise;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\SuperviseService;
use App\Http\Requests\SuperviseRequest;

class SupervisesController extends Controller
{
    private $service = null;
    
    protected $fields = ['sellerIsYq','mgrType','mgrProvince','mgrCity','mgrDistrict','mgrCode','mgrName','permitCompType','permitCompName','permitFileType','permitFileDesc','permitFileName','permitFileNo','permitDate','project_id'];

    public function __construct(SuperviseService $service)
    {
        $this->service = $service;
    }

    public function insert(SuperviseRequest $request){
        $params = $request->only($this->fields);

        $model = $this->service->add($params);
        
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function modify(SuperviseRequest $request){
        $params = $request->only($this->fields);
        $id = $request->supervise_id;
        $this->service->update($id,$params);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        return response()->json($result);
    }
    
}
