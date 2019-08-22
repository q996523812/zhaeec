<?php

namespace App\Admin\Controllers;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TransactionsController extends Controller
{
    use HasResourceActions;

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
}
