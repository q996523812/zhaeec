<?php

namespace App\Admin\Controllers;

use App\Models\Transaction;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Services\TransactionService;
use App\Services\ChargeRuleService;
use App\Http\Requests\TransactionRequest;

class TransactionsController extends Controller
{
    use HasResourceActions;

    private $service;
    private $module_type;
    private $chargeRuleService;

    public function __construct(TransactionService $transactionService,ChargeRuleService $chargeRuleService)
    {
        $this->service = $transactionService;
        $this->module_type = 'cjxx';
        $this->chargeRuleService = $chargeRuleService;
    }
    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($project_id, Content $content)
    {
        $project = Project::find($project_id);
        // $detail = $this->detail_class::find($id);
        $transaction = $project->transaction;
        if(empty($transaction)){
            $transaction = new Transaction();
            $transaction->project_id = $project_id;
            $transaction->wtf_service_fee_payable = 0;
            
        }
        $datas = [
            'project' => $project,
            'id' => $transaction->id,
            'cjxx' => $transaction,
            'projecttype' => $this->module_type,
            'yxfs' => $project->intentionalParties,
            'files' => $transaction->files,
            'images' => $transaction->images,
        ];
        $description = null;
        switch($project->type){
            case 'zczl':
                $description = '根据网络竞价结果，录入成交信息，并上传附件报价记录';
                break;
            case 'qycg':
                $description = '根据企业盖章的成交公告，录入成交信息，并将该公告作为附件上传';
                break;
        }
        return $content
            ->header('成交信息录入')
            ->description($description)
            ->body(view('admin.'.$this->module_type.'.edit', $datas)); 
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Transaction);

        $grid->id('Id');
        $grid->project_id('Project id');
        $grid->intentional_parties_id('Intentional parties id');
        $grid->price('Price');
        $grid->service_charge_receivable('Service charge receivable');
        $grid->service_charge_received('Service charge received');
        $grid->wtf_service_fee_payable('Wtf service fee payable');
        $grid->wtf_service_fee_paid('Wtf service fee paid');
        $grid->zbf_service_fee_payable('Zbf service fee payable');
        $grid->zbf_service_fee_paid('Zbf service fee paid');
        $grid->charge_rule_id('Charge rule id');
        $grid->status('Status');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Transaction::findOrFail($id));

        $show->id('Id');
        $show->project_id('Project id');
        $show->intentional_parties_id('Intentional parties id');
        $show->price('Price');
        $show->service_charge_receivable('Service charge receivable');
        $show->service_charge_received('Service charge received');
        $show->wtf_service_fee_payable('Wtf service fee payable');
        $show->wtf_service_fee_paid('Wtf service fee paid');
        $show->zbf_service_fee_payable('Zbf service fee payable');
        $show->zbf_service_fee_paid('Zbf service fee paid');
        $show->charge_rule_id('Charge rule id');
        $show->status('Status');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Transaction);

        $form->text('project_id', 'Project id');
        $form->text('intentional_parties_id', 'Intentional parties id');
        $form->decimal('price', 'Price');
        $form->decimal('service_charge_receivable', 'Service charge receivable')->default(0.000000);
        $form->decimal('service_charge_received', 'Service charge received');
        $form->decimal('wtf_service_fee_payable', 'Wtf service fee payable')->default(0.000000);
        $form->decimal('wtf_service_fee_paid', 'Wtf service fee paid');
        $form->decimal('zbf_service_fee_payable', 'Zbf service fee payable')->default(0.000000);
        $form->decimal('zbf_service_fee_paid', 'Zbf service fee paid');
        $form->text('charge_rule_id', 'Charge rule id');
        $form->number('status', 'Status')->default(1);

        return $form;
    }

    protected $fields = [
        'insert' => ['intentional_parties_id','price_total','price_unit','price_note','transaction_date','service_charge_receivable','service_charge_received','wtf_service_fee_payable','wtf_service_fee_paid','zbf_service_fee_payable','zbf_service_fee_paid','wtf_charge_rule_id','zbf_charge_rule_id','zbf_charge_type','wtf_charge_type'],
        'update' => ['intentional_parties_id','price_total','price_unit','price_note','transaction_date','service_charge_receivable','service_charge_received','wtf_service_fee_payable','wtf_service_fee_paid','zbf_service_fee_payable','zbf_service_fee_paid','wtf_charge_rule_id','zbf_charge_rule_id','zbf_charge_type','wtf_charge_type'],
    ];

    public function insert(TransactionRequest $request){
        $data = $request->only($this->fields['insert']);
        $project_id = $request->project_id;

        $project = Project::find($project_id);
        $zbf_charge_type = $request->zbf_charge_type;
        $wtf_charge_type = $request->wtf_charge_type;

        if($zbf_charge_type == 1){
            $zbf_chargeRule = $this->chargeRuleService->getRuleByType($project,$zbf_charge_type);
            $data['zbf_charge_rule_id'] = $zbf_chargeRule->id;
        }
        if($wtf_charge_type == 1){
            $wtf_chargeRule = $this->chargeRuleService->getRuleByType($project,$wtf_charge_type);
            $data['wtf_charge_rule_id'] = $wtf_chargeRule->id;
        }
        $transaction = $this->service->insert($project_id,$data);
        $result = [
            'success' => 'true',
            'message' => $transaction,
            'status_code' => '200',
        ];
        return response()->json($result);
    }
    
    public function modify(TransactionRequest $request){
        $data = $request->only($this->fields['update']);
        $id = $request->id;

        $project = Transaction::find($id)->project;
        $zbf_charge_type = $request->zbf_charge_type;
        $wtf_charge_type = $request->wtf_charge_type;
        $zbf_chargeRule = $this->chargeRuleService->getRuleByType($project,$zbf_charge_type);
        $wtf_chargeRule = $this->chargeRuleService->getRuleByType($project,$wtf_charge_type);
        $data['wtf_charge_rule_id'] = $wtf_chargeRule->id;
        $data['zbf_charge_rule_id'] = $zbf_chargeRule->id;

        $transaction = $this->service->modify($id,$data);
        $result = [
            'success' => 'true',
            'message' => $transaction,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function submit(Request $request){
        $id = $request->id;
        $transaction = Transaction::find($id);
        $project = $transaction->project;
        $transaction = $this->service->submit($project);
        return redirect()->route($project->type.'.index');
    }

    public function approval($project_id,Content $content)
    {
        $project = Project::find($project_id);
        $detail = $project->detail;
        $model = $project->transaction;
        $datas = [
            'project' => $project,
            'cjxx' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('成交信息审批')
            // ->description('录入正式发布的成交公告')
            ->body(view('admin.'.$this->module_type.'.approval', $datas)); 
    }
}
