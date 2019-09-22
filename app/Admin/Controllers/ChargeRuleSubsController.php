<?php

namespace App\Admin\Controllers;

use App\Models\ChargeRuleSub;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ChargeRuleSubsController extends Controller
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
        $grid = new Grid(new ChargeRuleSub);

        $grid->id('Id');
        $grid->charge_rule_id('Charge rule id');
        $grid->type('Type');
        $grid->seq('Seq');
        $grid->start('Start');
        $grid->end('End');
        $grid->rate('Rate');
        $grid->quick_num('Quick num');
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
        $show = new Show(ChargeRuleSub::findOrFail($id));

        $show->id('Id');
        $show->charge_rule_id('Charge rule id');
        $show->type('Type');
        $show->seq('Seq');
        $show->start('Start');
        $show->end('End');
        $show->rate('Rate');
        $show->quick_num('Quick num');
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
        $form = new Form(new ChargeRuleSub);

        $form->text('charge_rule_id', 'Charge rule id');
        $form->text('type', 'Type');
        $form->number('seq', 'Seq');
        $form->number('start', 'Start');
        $form->number('end', 'End');
        $form->decimal('rate', 'Rate');
        $form->decimal('quick_num', 'Quick num');

        return $form;
    }
}
