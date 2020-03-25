<?php

namespace App\Admin\Controllers;

use App\Models\FinancialStatement;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\FinancialStatementService;
use App\Http\Requests\FinancialStatementRequest;

class FinancialStatementsController extends Controller
{
    private $service = null;
    
    protected $fields = ['type','statement_date','zzc','zfz','syzqy','yysl','yylr','jlr','desc','ywwftg','project_id'];

    public function __construct(FinancialStatementService $service)
    {
        $this->service = $service;
    }

    public function insert(FinancialStatementRequest $request){
        $params = $request->only($this->fields);

        $model = $this->service->add($params);
        
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function modify(FinancialStatementRequest $request){
        $params = $request->only($this->fields);
        $id = $request->financialStatement_id;
        $this->service->update($id,$params);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        return response()->json($result);
    }
    
}
