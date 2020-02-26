<?php

namespace App\Admin\Controllers;

use App\Models\Contract;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\ContractRequest;
use App\Services\ContractService;
use App\Services\IntentionalPartyService;

class ContractsController extends Controller
{
    use HasResourceActions;
    private $service;
    private $module_type;
    
    public function __construct(ContractService $contractService)
    {
        $this->service = $contractService;
        $this->module_type = 'htxx';
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
        $model = $project->contract;
        if(empty($model)){
            $intentional_parties_ids = $project->transaction->intentional_parties_id;
            $intentionalPartyService = new IntentionalPartyService();
            $zbf = $intentionalPartyService->findNamesByIds($intentional_parties_ids);

            $model = new Contract();
            $model->project_id = $project_id;
            $model->xmbh = $project->xmbh;
            $model->title = $project->title;

        }

        $datas = [
            'project' => $project,
            'id'=>$model->id,
            'htxx' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('上传合同')
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
        $grid = new Grid(new Contract);

        $grid->id('Id');
        $grid->project_id('Project id');
        $grid->xmbh('Xmbh');
        $grid->title('Title');
        $grid->code('Code');
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
        $show = new Show(Contract::findOrFail($id));

        $show->id('Id');
        $show->project_id('Project id');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->code('Code');
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
        $form = new Form(new Contract);

        $form->text('project_id', 'Project id');
        $form->text('xmbh', 'Xmbh');
        $form->text('title', 'Title');
        $form->text('code', 'Code');

        return $form;
    }

    protected $fields = [
        'code','sign_date','effect_date','term_date_start','term_date_end'
    ];

    public function insert(ContractRequest $request){
        $data = $request->only($this->fields);
        $project_id = $request->project_id;
        $contract = $this->service->save($project_id,$data);
        $result = [
            'success' => 'true',
            'message' => $contract,
            'status_code' => '200'
        ];
        return response()->json($result);
    }
    
    public function modify(ContractRequest $request){
        $data = $request->only($this->fields);
        $id = $request->id;
        $contract = Contract::find($id);
        $contract = $this->service->modify($contract,$data);
        $result = [
            'success' => 'true',
            'message' => $contract,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function submit(Request $request){
        $id = $request->id;
        $contract = Contract::find($id);
        $project = $contract->project;
        $this->service->submit($project);
        return redirect()->route($project->type.'.index');
    }

    public function approval($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $detail = $project->detail;
        $model = $project->contract;
        $datas = [
            'project' => $project,
            'htxx' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('合同信息审批')
            ->body(view('admin.'.$this->module_type.'.approval', $datas)); 
    }

}
