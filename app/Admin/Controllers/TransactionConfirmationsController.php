<?php

namespace App\Admin\Controllers;

use App\Models\TransactionConfirmation;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionConfirmationRequest;
use App\Services\TransactionConfirmationService;
use App\Services\IntentionalPartyService;

class TransactionConfirmationsController extends Controller
{
    use HasResourceActions;
    private $service;
    private $module_type;
    
    public function __construct(TransactionConfirmationService $transactionConfirmationService)
    {
        $this->service = $transactionConfirmationService;
        $this->module_type = 'jyjz';
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
        $model = $project->transactionConfirmation;
        if(empty($model)){
            $intentional_parties_ids = $project->transaction->intentional_parties_id;
            $intentionalPartyService = new IntentionalPartyService();
            $zbf = $intentionalPartyService->findNamesByIds($intentional_parties_ids);

            $model = new TransactionConfirmation();
            $model->project_id = $project_id;
            $model->xmbh = $project->xmbh;
            $model->title = $project->title;
            $model->wtf = $detail->wtf_name;
            $model->zbf = $zbf;
            $model->price = $project->price;
            $model->jyfs = $detail->jyfs;
            $model->gp_date_start = $project->gp_date_start;
            $model->gp_date_end = $project->gp_date_end;

            
        }

        $datas = [
            'project' => $project,
            'id' => $model->id,
            'jyjz' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('成交确认书录入')
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
        $grid = new Grid(new TransactionConfirmation);

        $grid->id('Id');
        $grid->project_id('Project id');
        $grid->xmbh('Xmbh');
        $grid->title('Title');
        $grid->wtf('Wtf');
        $grid->zbf('Zbf');
        $grid->price('Price');
        $grid->pgjg('Pgjg');
        $grid->gp_date_start('Gp date start');
        $grid->gp_date_end('Gp date end');
        $grid->jyfs('Jyfs');
        $grid->htqs_date('Htqs date');
        $grid->zffs('Zffs');
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
        $show = new Show(TransactionConfirmation::findOrFail($id));

        $show->id('Id');
        $show->project_id('Project id');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->wtf('Wtf');
        $show->zbf('Zbf');
        $show->price('Price');
        $show->pgjg('Pgjg');
        $show->gp_date_start('Gp date start');
        $show->gp_date_end('Gp date end');
        $show->jyfs('Jyfs');
        $show->htqs_date('Htqs date');
        $show->zffs('Zffs');
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
        $form = new Form(new TransactionConfirmation);

        $form->text('project_id', 'Project id');
        $form->text('xmbh', 'Xmbh');
        $form->text('title', 'Title');
        $form->text('wtf', 'Wtf');
        $form->text('zbf', 'Zbf');
        $form->decimal('price', 'Price');
        $form->text('pgjg', 'Pgjg');
        $form->datetime('gp_date_start', 'Gp date start')->default(date('Y-m-d H:i:s'));
        $form->datetime('gp_date_end', 'Gp date end')->default(date('Y-m-d H:i:s'));
        $form->text('jyfs', 'Jyfs');
        $form->datetime('htqs_date', 'Htqs date')->default(date('Y-m-d H:i:s'));
        $form->text('zffs', 'Zffs');

        return $form;
    }

    protected $fields = [
        'xmbh','title','wtf','zbf','price','jyfs','htqs_date','zffs','pgjg','gp_date_start','gp_date_end'
    ];

    public function insert(TransactionConfirmationRequest $request){
        $data = $request->only($this->fields);
        $project_id = $request->project_id;
        $transaction = $this->service->save($project_id,$data);
        $result = [
            'success' => 'true',
            'message' => $transaction,
            'status_code' => '200'
        ];
        return response()->json($result);
    }
    
    public function modify(TransactionConfirmationRequest $request){
        $data = $request->only($this->fields);
        $id = $request->id;
        $transaction = TransactionConfirmation::find($id);
        $transaction = $this->service->modify($transaction,$data);
        $result = [
            'success' => 'true',
            'message' => $transaction,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function submit(Request $request){
        $id = $request->id;
        $transaction = TransactionConfirmation::find($id);
        $project = $transaction->project;
        $this->service->submit($project);
        return redirect()->route($project->type.'.index');
    }

    public function approval($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $detail = $project->detail;
        $model = $project->transactionConfirmation;
        $datas = [
            'project' => $project,
            'id' => $model->id,
            'jyjz' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('成交公告审批')
            ->description('录入正式发布的成交公告')
            ->body(view('admin.'.$this->module_type.'.approval', $datas)); 
    }

}
