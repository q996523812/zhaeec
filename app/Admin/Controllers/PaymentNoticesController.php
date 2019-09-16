<?php

namespace App\Admin\Controllers;

use App\Models\PaymentNotice;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentNoticeRequest;
use App\Services\PaymentNoticeService;
use App\Services\IntentionalPartyService;

class PaymentNoticesController extends Controller
{
    use HasResourceActions;
    private $service;
    private $module_type;

    public function __construct(PaymentNoticeService $paymentNoticeService)
    {
        $this->service = $paymentNoticeService;
        $this->module_type = 'sftz';
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
        $detail = $project->detail;
        $model = $project->paymentNotice;
        if(empty($model)){
            $intentional_parties_ids = $project->transaction->intentional_parties_id;
            $intentionalPartyService = new IntentionalPartyService();
            $zbf = $intentionalPartyService->findNamesByIds($intentional_parties_ids);

            $model = new PaymentNotice();
            $model->project_id = $project_id;
            $model->xmbh = $project->xmbh;
            $model->title = $project->title;
            
            
        }

        $datas = [
            'detail' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('收费通知录入')
            // ->description('录入正式发布的成交公告')
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
        $grid = new Grid(new PaymentNotice);

        $grid->id('Id');
        $grid->project_id('Project id');
        $grid->xmbh('Xmbh');
        $grid->title('Title');
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
        $show = new Show(PaymentNotice::findOrFail($id));

        $show->id('Id');
        $show->project_id('Project id');
        $show->xmbh('Xmbh');
        $show->title('Title');
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
        $form = new Form(new PaymentNotice);

        $form->text('project_id', 'Project id');
        $form->text('xmbh', 'Xmbh');
        $form->text('title', 'Title');

        return $form;
    }


    protected $fields = [
        'xmbh','title'
    ];

    public function insert(PaymentNoticeRequest $request){
        $data = $request->only($this->fields);
        $project_id = $request->project_id;
        $model = $this->service->save($project_id,$data);
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '201'
        ];
        return response()->json($result);
    }
    
    public function modify(PaymentNoticeRequest $request){
        $data = $request->only($this->fields);
        $id = $request->id;
        $paymentNotice = PaymentNotice::find($id);
        $model = $this->service->modify($paymentNotice,$data);
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '202'
        ];
        return response()->json($result);
    }

    public function submit(Request $request){
        $id = $request->id;
        $model = PaymentNotice::find($id);
        $project = $model->project;
        $this->service->submit($project);
        return redirect()->route($project->type.'.index');
    }

    public function approval($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $detail = $project->detail;
        $model = $project->paymentNotice;
        $datas = [
            'detail' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('收费通知审批')
            // ->description('录入正式发布的成交公告')
            ->body(view('admin.'.$this->module_type.'.approval', $datas)); 
    }

    public function printZbf($id, Content $content)
    {
        $model = PaymentNotice::find($id);
        $datas = [
            'detail' => $model,
        ];
        return view('admin.'.$this->module_type.'.print_zbf',$datas);
    }
    public function printWtf($id, Content $content)
    {
        $model = PaymentNotice::find($id);
        $datas = [
            'detail' => $model,
        ];
        return view('admin.'.$this->module_type.'.print_wtf',$datas);
    }

}
