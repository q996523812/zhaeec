<?php

namespace App\Admin\Controllers;

use App\Models\ChargeRule;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\ChargeRuleRequest;
use App\Services\ChargeRuleService;

class ChargeRulesController extends Controller
{
    use HasResourceActions;
    private $service;

    public function __construct(ChargeRuleService $chargeRuleService)
    {
        $this->service = $chargeRuleService;
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
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
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
        $grid = new Grid(new ChargeRule);

        $grid->id('Id');
        $grid->project_type('Project type');
        $grid->project_type_name('Project type name');
        $grid->charge_type('Charge type');
        $grid->charge_type_name('Charge type name');
        $grid->service_type('Service type');
        $grid->service_type_name('Service type name');
        $grid->explain('Explain');
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
        $show = new Show(ChargeRule::findOrFail($id));

        $show->id('Id');
        $show->project_type('Project type');
        $show->project_type_name('Project type name');
        $show->charge_type('Charge type');
        $show->charge_type_name('Charge type name');
        $show->service_type('Service type');
        $show->service_type_name('Service type name');
        $show->explain('Explain');
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
        $form = new Form(new ChargeRule);

        $form->text('project_type', 'Project type');
        $form->text('project_type_name', 'Project type name');
        $form->text('charge_type', 'Charge type');
        $form->text('charge_type_name', 'Charge type name');
        $form->text('service_type', 'Service type');
        $form->text('service_type_name', 'Service type name');
        $form->text('explain', 'Explain');
        $form->number('status', 'Status')->default(1);

        return $form;
    }

    public function getCharge(Request $request){
        $project = Project::find($request->project_id);
        $service_type = $request->service_type;
        $amount = $request->amount;

        $result = $this->service->calculation($project,$amount,$service_type);
        $this->service->test();
        $result = [
            'success' => 'true',
            'charge' => $result['charge'],
            'rule_id' => $result['rule_id'],
            'status_code' => '200'
        ];
        return response()->json($result);
    }
}
