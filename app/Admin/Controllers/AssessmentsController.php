<?php

namespace App\Admin\Controllers;

use App\Models\Assessment;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\AssessmentService;
use App\Http\Requests\AssessmentRequest;

class AssessmentsController extends Controller
{
    private $service = null;
    
    protected $fields = ['pgjg','pgbajg','hezhunFlag','beianFlag','hzbarq','pgjzr','estNoticeno','pgjzrsjjg','lssws','estimatePrice','zmLdzc','pgLdzc','zmQtzc','pgQtzc','zmZzc','pgZzc','zmLdfz','pgLdfz','zmCqfz','pgCqfz','zmZfz','pgZfz','zmJzc','pgJzc','remark','project_id'];

    public function __construct(AssessmentService $service)
    {
        $this->service = $service;
    }

    public function insert(AssessmentRequest $request){
        $params = $request->only($this->fields);

        $model = $this->service->add($params);
        
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function modify(AssessmentRequest $request){
        $params = $request->only($this->fields);
        $id = $request->assessment_id;
        $this->service->update($id,$params);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        return response()->json($result);
    }
}
