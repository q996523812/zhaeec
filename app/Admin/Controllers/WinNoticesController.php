<?php

namespace App\Admin\Controllers;

use App\Models\WinNotice;
use App\Models\Project;
use App\Models\IntentionalParty;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\WinNoticeRequest;
use App\Services\WinNoticeService;
use App\Services\IntentionalPartyService;

class WinNoticesController extends Controller
{
    use HasResourceActions;
    protected $service;
    private $module_type;

    public function __construct(WinNoticeService $winNoticeService)
    {
        $this->service = $winNoticeService;
        $this->module_type = 'zbtz';
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
        $model = $project->winNotice;
        $zbf = IntentionalParty::find($project->transaction->intentional_parties_id);
        if(empty($model)){
            // $intentional_parties_ids = $project->transaction->intentional_parties_id;
            // $intentionalPartyService = new IntentionalPartyService();
            // $zbf = $intentionalPartyService->findNamesByIds($intentional_parties_ids);

            $cjgg = $project->transactionAnnouncement;
            $cjxx = $project->transaction;
            $jyfs = $project->transactionMode;

            $model = new WinNotice();
            $model->project_id = $project_id;
            $model->type = $project->type;
            $model->xmbh = $project->xmbh;
            $model->title = $project->title;
            $model->zbnr = $project->title;
            $model->gp_date_start = $project->gp_date_start;
            $model->gp_date_end = $project->gp_date_end;
            $model->jydj = $project->price;
            
            $model->zbr = $zbf->name;
            $model->zbf_phone = $zbf->phone;
            $model->zbf_lx_1 = $zbf->companytype;
            $model->zbf_lx_2 = $zbf->economytype;
            if(!empty($cjgg)){
                $model->jysj = $cjgg->jy_date;
                $model->jycd = $cjgg->jycd;
            }
            
            $model->cjj_zj = $cjxx->price_total;
            $model->cjj_dj = $cjxx->price_unit;
            $model->cjj_bz = $cjxx->price_note;
            $model->jyfs = $jyfs->pubDealWay;
            $model->zbf_qy = $zbf->province.$zbf->city.$zbf->county;
        }

        $datas = [
            'project' => $project,
            'id' => $model->id,
            'zbtz' => $model,
            'zbf' => $zbf,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('中标通知录入')
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
        $grid = new Grid(new WinNotice);

        $grid->type('项目类型');
        $grid->tzsbh('通知书编号');
        $grid->xmbh('项目编号');
        $grid->title('标的名称');
        // $grid->zbnr('中标内容');
        $grid->zbr('中标方名称');
        $grid->zbf_phone('中标方手机号');
        // $grid->zbf_lx_1('中标方类型1');
        // $grid->zbf_lx_2('中标方类型2');
        $grid->jysj('交易时间');
        $grid->cjj_zj('成交总价');
        $grid->cjj_dj('成交单价');
        // $grid->cjj_bz('成交价格备注');
        // $grid->jyfs('交易方式');
        // $grid->jycd('交易场地');
        // $grid->zbf_qy('中标方所属区域');
        // $grid->zbhyq('Zbhyq');
        // $grid->tzs_fs('Tzs fs');
        // $grid->tzs_fs_1('Tzs fs 1');
        // $grid->tzs_fs_2('Tzs fs 2');
        // $grid->tzs_fs_3('Tzs fs 3');
        // $grid->tzs_fs_4('Tzs fs 4');
        // $grid->notes('Notes');
        // $grid->issue_time('Issue time');
        // $grid->file_path('File path');
        // $grid->created_at('Created at');
        // $grid->updated_at('Updated at');

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
        $show = new Show(WinNotice::findOrFail($id));

        $show->id('Id');
        $show->project_id('Project id');
        $show->type('Type');
        $show->tzsbh('Tzsbh');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->zbnr('Zbnr');
        $show->zbr('Zbr');
        $show->zbf_phone('Zbf phone');
        $show->zbf_lx_1('Zbf lx 1');
        $show->zbf_lx_2('Zbf lx 2');
        $show->jysj('Jysj');
        $show->cjj_zj('Cjj zj');
        $show->cjj_dj('Cjj dj');
        $show->cjj_bz('Cjj bz');
        $show->jyfs('Jyfs');
        $show->jycd('Jycd');
        $show->zbf_qy('Zbf qy');
        $show->zbhyq('Zbhyq');
        $show->tzs_fs('Tzs fs');
        $show->tzs_fs_1('Tzs fs 1');
        $show->tzs_fs_2('Tzs fs 2');
        $show->tzs_fs_3('Tzs fs 3');
        $show->tzs_fs_4('Tzs fs 4');
        $show->notes('Notes');
        $show->issue_time('Issue time');
        $show->file_path('File path');
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
        $form = new Form(new WinNotice);

        $form->text('project_id', 'Project id');
        $form->text('type', '项目类型');
        $form->text('tzsbh', '通知书编号');
        $form->text('xmbh', '项目编号');
        $form->text('title', '标的名称');
        $form->text('zbnr', '中标内容');
        $form->text('zbr', '中标方名称');
        $form->text('zbf_phone', '中标方手机号码');
        $form->text('zbf_lx_1', '中标方类型1');
        $form->text('zbf_lx_2', '中标方类型2');
        $form->datetime('jysj', '交易时间')->default(date('Y-m-d'));
        $form->decimal('cjj_zj', '成交总价(万元)');
        $form->decimal('cjj_dj', '成交单价（万元）');
        $form->text('cjj_bz', '成交价格备注');
        $form->text('jyfs', '交易方式');
        $form->text('jycd', '交易场地');
        $form->text('zbf_qy', '中标方所属区域');
        $form->number('zbhyq', 'Zbhyq');
        $form->number('tzs_fs', 'Tzs fs');
        $form->number('tzs_fs_1', 'Tzs fs 1');
        $form->number('tzs_fs_2', 'Tzs fs 2');
        $form->number('tzs_fs_3', 'Tzs fs 3');
        $form->number('tzs_fs_4', 'Tzs fs 4');
        $form->textarea('notes', '备注');
        $form->datetime('issue_time', '盖章时间')->default(date('Y-m-d'));
        $form->file('file_path', 'File path');

        return $form;
    }

    protected $fields = [
        'type','xmbh','title','gp_date_start','gp_date_end','zlqx','zbnr','zbr','zbf_phone','zbf_lx_1','zbf_lx_2','jysj','jydj','cjj_zj','cjj_dj','cjj_bz','jyfs','jycd','zbf_qy','zbhyq','tzs_fs','tzs_fs_1','tzs_fs_2','tzs_fs_3','tzs_fs_4','notes','issue_time',
    ];

    public function insert(WinNoticeRequest $request){
        $data = $request->only($this->fields);
        $project_id = $request->project_id;
        $model = $this->service->save($project_id,$data);
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }
    
    public function modify(WinNoticeRequest $request){
        $data = $request->only($this->fields);
        $id = $request->id;
        $winNotice = WinNotice::find($id);
        $model = $this->service->modify($winNotice,$data);
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function submit(Request $request){
        $id = $request->id;
        $model = WinNotice::find($id);
        $project = $model->project;
        $this->service->submit($project);
        return redirect()->route($project->type.'.index');
    }

    public function approval($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $detail = $project->detail;
        $model = $project->winNotice;
        $zbf = IntentionalParty::find($project->transaction->intentional_parties_id);
        $datas = [
            'project' => $project,
            'zbtz' => $model,
            'zbf' => $zbf,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('中标通知')
            ->description('审批')
            ->body(view('admin.'.$this->module_type.'.approval', $datas)); 
    }

}
