<?php

namespace App\Admin\Controllers;

use App\Models\TransactionAnnouncement;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionAnnouncementRequest;
use App\Services\TransactionAnnouncementService;
use App\Services\IntentionalPartyService;

class TransactionAnnouncementsController extends Controller
{
    use HasResourceActions;
    private $service;
    private $module_type;

    public function __construct(TransactionAnnouncementService $transactionAnnouncementService)
    {
        $this->service = $transactionAnnouncementService;
        $this->module_type = 'cjgg';
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
        // $detail = $this->detail_class::find($id);
        $model = TransactionAnnouncement::where('project_id',$project_id)->first();
        if(empty($model)){
            $intentional_parties_ids = $project->transaction->intentional_parties_id;
            $intentionalPartyService = new IntentionalPartyService();
            $zbf = $intentionalPartyService->findNamesByIds($intentional_parties_ids);

            $model = new TransactionAnnouncement();
            $model->project_id = $project_id;
            $model->xmbh = $project->xmbh;
            $model->title = $project->title;
            $model->wtf = $detail->wtf_name;
            $model->zbf = $zbf;
            $model->price = $project->price;
            $model->jyfs = $detail->jyfs;
            if($project->type === 'zczl'){
                $model->jycd = '电脑终端';
            }
            
        }

        $datas = [
            'detail' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header('成交公告录入')
            ->description('录入正式发布的成交公告')
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
        $grid = new Grid(new TransactionAnnouncement);

        $grid->id('Id');
        $grid->project_id('Project id');
        $grid->xmbh('Xmbh');
        $grid->title('Title');
        $grid->wtf('Wtf');
        $grid->zbf('Zbf');
        $grid->price('Price');
        $grid->jyfs('Jyfs');
        $grid->jy_date('Jy date');
        $grid->jycd('Jycd');
        $grid->gsnr('Gsnr');
        $grid->fb_date('Fb date');
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
        $show = new Show(TransactionAnnouncement::findOrFail($id));

        $show->id('Id');
        $show->project_id('Project id');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->wtf('Wtf');
        $show->zbf('Zbf');
        $show->price('Price');
        $show->jyfs('Jyfs');
        $show->jy_date('Jy date');
        $show->jycd('Jycd');
        $show->gsnr('Gsnr');
        $show->fb_date('Fb date');
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
        $form = new Form(new TransactionAnnouncement);

        $form->text('project_id', 'Project id');
        $form->text('xmbh', 'Xmbh');
        $form->text('title', 'Title');
        $form->text('wtf', 'Wtf');
        $form->text('zbf', 'Zbf');
        $form->decimal('price', 'Price');
        $form->text('jyfs', 'Jyfs');
        $form->datetime('jy_date', 'Jy date')->default(date('Y-m-d H:i:s'));
        $form->text('jycd', 'Jycd');
        $form->text('gsnr', 'Gsnr');
        $form->datetime('fb_date', 'Fb date')->default(date('Y-m-d H:i:s'));

        return $form;
    }

    protected $fields = [
        'xmbh','title','wtf','zbf','price','jyfs','jy_date','jycd','gsnr','fb_date'
    ];

    public function insert(TransactionAnnouncementRequest $request){
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
    
    public function modify(TransactionAnnouncementRequest $request){
        $data = $request->only($this->fields);
        $id = $request->id;
        $transaction = TransactionAnnouncement::find($id);
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
        $transaction = TransactionAnnouncement::find($id);
        $project = $transaction->project;
        $transaction = $this->service->submit($project);
        return redirect()->route($project->type.'.index');
    }

    public function approval($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $detail = $project->detail;
        $model = $project->transactionAnnouncement;
        $datas = [
            'detail' => $model,
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
