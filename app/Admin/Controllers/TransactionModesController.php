<?php

namespace App\Admin\Controllers;

use App\Models\Project;
use App\Models\TransactionMode;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Http\Requests\TransactionModeRequest;
use App\Services\TransactionModeService;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Log;

class TransactionModesController extends Controller
{

    private $service;
    private $module_type;
    protected $fields = ['pubDealWay','dealWayDesc','ifBiddyn','bidmode','quotationRange','quotationRangeDesc','jjdw','project_id'];

    public function __construct(TransactionModeService $service)
    {
        $this->service = $service;
        $this->module_type = 'jyfs';
    }

    /**交易方式确认
     */
    public function edit($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $model = $project->transactionMode;
        if(empty($model)){
            $model = new TransactionMode();
        }
        // $records = $this->getOptionHistory($detial->project_id);
        $datas = [
            'jyfs' => $model,
            'project' => $project,
            'projecttype' => $this->module_type,
            'id' => $model->id,
            'project_id' => $project->id,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('交易方式确认')
            ->body(view('admin.'.$this->module_type.'.edit', $datas));
    }
    
    protected function insert(TransactionModeRequest $request){
        $params = $request->only($this->fields);

        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200',
        ];
        try{
            $model = $this->service->add($params);
            $result['message'] = $model;
        }
        catch(\Exception $e){
            $result['success'] = 'false';
            $result['message'] = '保存失败，请联系管理员';
            Log::error($e);
        }
        return response()->json($result);
    }

    
    protected function modify(TransactionModeRequest $request){
        $project_id = $request->project_id;
        $params = $request->only($this->fields);
        // $id = $request->transactionMode_id;
        $id = $request->id;
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        try{
            $this->service->update($id,$params);
        }
        catch(\Exception $e){
            $result['success'] = 'false';
            $result['message'] = '保存失败，请联系管理员';
            Log::error($e);
        }
        // $detail = $this->service->gprqSave($project_id,$gp_date_start,$gp_date_end);
        return response()->json($result);
    }

    public function submit(TransactionModeRequest $request){
        $detail_id = $request->id;
        if(empty($detail_id)){
            throw new \Exception('请先保存交易方式！');
        }
        $project_id = $request->project_id;
        $project = Project::find($project_id);
        $projectService = new ProjectService();
        $projectService->submit($project,'交易方式确认录入');
        return redirect()->route($project->type.'.index');
    }

    //显示交易方式确认审批页面
    public function approval($project_id, Content $content){
        $project = Project::find($project_id);
        $model = $project->transactionMode;
        $datas = [
            'jyfs' => $model,
            'project' => $project,
            'projecttype' => $this->module_type,
            'id' => $model->id,
            'project_id' => $project->id,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('交易方式确认审批')
            ->body(view('admin.'.$this->module_type.'.approval', $datas));
    }

}
