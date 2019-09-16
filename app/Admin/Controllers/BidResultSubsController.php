<?php

namespace App\Admin\Controllers;

use App\Models\BidResultSub;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BidResultSubsController extends Controller
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
        $grid = new Grid(new BidResultSub);

        $grid->id('Id');
        $grid->bid_result_id('Bid result id');
        $grid->xmbh('Xmbh');
        $grid->title('Title');
        $grid->tbr('Tbr');
        $grid->jjf('Jjf');
        $grid->jsf('Jsf');
        $grid->zf('Zf');
        $grid->tbbj('Tbbj');
        $grid->pm('Pm');
        $grid->deleted_at('Deleted at');
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
        $show = new Show(BidResultSub::findOrFail($id));

        $show->id('Id');
        $show->bid_result_id('Bid result id');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->tbr('Tbr');
        $show->jjf('Jjf');
        $show->jsf('Jsf');
        $show->zf('Zf');
        $show->tbbj('Tbbj');
        $show->pm('Pm');
        $show->deleted_at('Deleted at');
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
        $form = new Form(new BidResultSub);

        $form->text('bid_result_id', 'Bid result id');
        $form->text('xmbh', 'Xmbh');
        $form->text('title', 'Title');
        $form->text('tbr', 'Tbr');
        $form->text('jjf', 'Jjf');
        $form->text('jsf', 'Jsf');
        $form->text('zf', 'Zf');
        $form->decimal('tbbj', 'Tbbj');
        $form->text('pm', 'Pm');

        return $form;
    }
}
