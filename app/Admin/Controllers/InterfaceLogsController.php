<?php

namespace App\Admin\Controllers;

use App\Models\InterfaceLog;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class InterfaceLogsController extends Controller
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
        $grid = new Grid(new InterfaceLog);

        $grid->id('Id');
        $grid->action('Action');
        $grid->xmbh('Xmbh');
        $grid->title('Title');
        $grid->send_message('Send message');
        $grid->send_time('Send time');
        $grid->is_send_success('Is send success');
        $grid->send_receipt('Send receipt');
        $grid->receive_message('Receive message');
        $grid->receive_time('Receive time');
        $grid->is_receive_success('Is receive success');
        $grid->receive_receipt('Receive receipt');
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
        $show = new Show(InterfaceLog::findOrFail($id));

        $show->id('Id');
        $show->action('Action');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->send_message('Send message');
        $show->send_time('Send time');
        $show->is_send_success('Is send success');
        $show->send_receipt('Send receipt');
        $show->receive_message('Receive message');
        $show->receive_time('Receive time');
        $show->is_receive_success('Is receive success');
        $show->receive_receipt('Receive receipt');
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
        $form = new Form(new InterfaceLog);

        $form->text('action', 'Action');
        $form->text('xmbh', 'Xmbh');
        $form->text('title', 'Title');
        $form->text('send_message', 'Send message');
        $form->datetime('send_time', 'Send time')->default(date('Y-m-d H:i:s'));
        $form->number('is_send_success', 'Is send success');
        $form->text('send_receipt', 'Send receipt');
        $form->text('receive_message', 'Receive message');
        $form->datetime('receive_time', 'Receive time')->default(date('Y-m-d H:i:s'));
        $form->number('is_receive_success', 'Is receive success');
        $form->text('receive_receipt', 'Receive receipt');

        return $form;
    }
}
