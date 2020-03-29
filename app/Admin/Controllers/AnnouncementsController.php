<?php

namespace App\Admin\Controllers;

use App\Models\Announcement;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;
use App\Services\AnnouncementService;

class AnnouncementsController extends Controller
{
    use HasResourceActions;
    protected $service;
    protected $module_type;//模块：zzgg、zjgg、yqgg、等
    protected $processes;

    protected $fields = [
        'xmbh','title','wtf_name','type','content','date_matter','seq','delay_days','date_start','date_end','inscription_company','inscription_date'
    ];

    public function __construct(AnnouncementService $announcementService)
    {
        $this->service = $announcementService;
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
        // $model = $project->announcements()->where('type',$type)->whereIn('process',[$this->processes[2],$this->processes[5]])->first();
        $model = $project->announcements()->where('type',$this->module_type)->where('process',2)->first();
        if(!empty($model)){
            throw \Exception("已存在审批中的公告，不能新增");
        }
        // $model = $project->announcements()->where('type',$this->module_type)->whereIn('process',[$this->processes[0],$this->processes[1]])->first();
        $model = $project->announcements()->where('type',$this->module_type)->where('process',1)->first();
        if(empty($model)){
            $model = new Announcement();
            $model->type = $this->module_type;
            $model->xmbh = $project->xmbh;
            $model->title = $project->title;
            $model->wtf_name = $project->wtf->name;
            $model->inscription_company = '珠海产权交易中心有限责任公司';
            $model->inscription_date = date("Y-m-d");
            
        }
        $datas = [
            'project' => $project,
            'id' => $model->id,
            'gg' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header($this->service->getAnnouncementTypeName($this->module_type).'录入')
            // ->description('录入正式发布的成交公告')
            ->body(view('admin.gg.edit', $datas)); 
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function editDefault($type,$project_id, Content $content)
    {
        $project = Project::find($project_id);
        // $model = $project->announcements()->where('type',$type)->whereIn('process',[$this->processes[2],$this->processes[5]])->first();
        $model = $project->announcements()->where('type',$type)->where('process',[$this->processes[2],$this->processes[5]])->first();
        if(!empty($model)){
            throw \Exception("已存在审批中的公告，不能新增");
        }
        $model = $project->announcements()->where('type',$type)->whereIn('process',[$this->processes[0],$this->processes[1]])->first();
        if(empty($model)){
            $model = new Announcement();
            $model->type = $this->module_type;
            $model->xmbh = $project->xmbh;
            $model->title = $project->title;
            $model->wtf_name = $project->detail->wtf_name;
            $model->inscription_company = '珠海产权交易中心有限责任公司';
            $model->inscription_date = date("Y-m-d");
            
        }
        $datas = [
            'project' => $project,
            'id' => $model->id,
            $this->module_type => $model,
            'projecttype' => $this->module_type,
        ];
        return $content
            ->header($this->service->getAnnouncementTypeName($this->module_type).'录入')
            // ->description('录入正式发布的成交公告')
            ->body(view('admin.gg.'.$this->module_type.'.edit', $datas)); 
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
        $grid = new Grid(new Announcement);

        $grid->id('Id');
        $grid->xmbh('Xmbh');
        $grid->title('Title');
        $grid->wtf_name('Wtf name');
        $grid->type('Type');
        $grid->content('Content');
        $grid->date_matter('Date matter');
        $grid->seq('Seq');
        $grid->delay_days('Delay days');
        $grid->date_start('Date start');
        $grid->date_end('Date end');
        $grid->inscription_company('Inscription company');
        $grid->inscription_date('Inscription date');
        $grid->project_id('Project id');
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
        $show = new Show(Announcement::findOrFail($id));

        $show->id('Id');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->wtf_name('Wtf name');
        $show->type('Type');
        $show->content('Content');
        $show->date_matter('Date matter');
        $show->seq('Seq');
        $show->delay_days('Delay days');
        $show->date_start('Date start');
        $show->date_end('Date end');
        $show->inscription_company('Inscription company');
        $show->inscription_date('Inscription date');
        $show->project_id('Project id');
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
        $form = new Form(new Announcement);

        $form->text('xmbh', 'Xmbh');
        $form->text('title', 'Title');
        $form->text('wtf_name', 'Wtf name');
        $form->text('type', 'Type');
        $form->textarea('content', 'Content');
        $form->datetime('date_matter', 'Date matter')->default(date('Y-m-d H:i:s'));
        $form->number('seq', 'Seq');
        $form->number('delay_days', 'Delay days');
        $form->datetime('date_start', 'Date start')->default(date('Y-m-d H:i:s'));
        $form->datetime('date_end', 'Date end')->default(date('Y-m-d H:i:s'));
        $form->text('inscription_company', 'Inscription company');
        $form->datetime('inscription_date', 'Inscription date')->default(date('Y-m-d H:i:s'));
        $form->text('project_id', 'Project id');

        return $form;
    }



    public function insert(AnnouncementRequest $request){
        $data = $request->only($this->fields);
        $project_id = $request->project_id;
        $project = Project::find($project_id);
        $model = $this->service->insert($project,$data);
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }
    
    public function modify(AnnouncementRequest $request){
        $data = $request->only($this->fields);
        $id = $request->id;
        
        $model = $this->service->modify($id,$data);
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function submit(Request $request){
        $id = $request->id;
        $model = Announcement::find($id);
        $project = $model->project;
        $model = $this->service->submit($project,$model);
        return redirect()->route($project->type.'.index');
    }

    /**
     * 显示审批页面
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function approval($project_id, Content $content)
    {
        $project = Project::find($project_id);
        $model = $project->announcements()->where('type',$this->module_type)->whereIn('process',[1,2])->first();
        
        $datas = [
            'project' => $project,
            'id' => $model->id,
            'gg' => $model,
            'projecttype' => $this->module_type,
            'files' => $model->files,
            'images' => $model->images,
        ];
        return $content
            ->header($this->service->getAnnouncementTypeName($this->module_type).'录入')
            // ->description('录入正式发布的成交公告')
            ->body(view('admin.gg.approval', $datas)); 
    }

}
