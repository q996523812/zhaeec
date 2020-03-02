<?php

namespace App\Admin\Controllers;

use App\Models\AuditReport;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Services\AuditReportService;
use App\Http\Requests\AuditReportRequest;

class AuditReportsController extends Controller
{
    private $service = null;
    
    protected $fields = ['year','zzc','zfz','syzqy','yysl','yylr','jlr','sjjgmc','desc','ywwftg','project_id'];

    public function __construct(AuditReportService $service)
    {
        $this->service = $service;
    }

    public function insert(AuditReportRequest $request){
        $params = $request->only($this->fields);

        $model = $this->service->add($params);
        
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function modify(AuditReportRequest $request){
        $params = $request->only($this->fields);
        $id = $request->auditReport_id;
        $this->service->update($id,$params);
        
        $result = [
            'success' => 'true',
            'message' => '',
            'status_code' => '200'
        ];
        return response()->json($result);
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
        $grid = new Grid(new TargetCompanyBaseInfo);

        $grid->id('Id');
        $grid->compName('CompName');
        $grid->compZcode('CompZcode');
        $grid->compIndustry1('CompIndustry1');
        $grid->compIndustry2('CompIndustry2');
        $grid->comp0One('Comp0One');
        $grid->comp0Two('Comp0Two');
        $grid->compTime('CompTime');
        $grid->compProvince('CompProvince');
        $grid->compCity('CompCity');
        $grid->compCounty('CompCounty');
        $grid->compAddress('CompAddress');
        $grid->compUniGslx('CompUniGslx');
        $grid->compUniJjlx('CompUniJjlx');
        $grid->compScope('CompScope');
        $grid->compFunding('CompFunding');
        $grid->moneytype('Moneytype');
        $grid->compBoss('CompBoss');
        $grid->compScale('CompScale');
        $grid->compZrs('CompZrs');
        $grid->innerAudit('InnerAudit');
        $grid->innerAuditDesc('InnerAuditDesc');
        $grid->compTdhb('CompTdhb');
        $grid->holderNum('HolderNum');
        $grid->spare2('Spare2');
        $grid->project_id('Project id');
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
        $show = new Show(TargetCompanyBaseInfo::findOrFail($id));

        $show->id('Id');
        $show->compName('CompName');
        $show->compZcode('CompZcode');
        $show->compIndustry1('CompIndustry1');
        $show->compIndustry2('CompIndustry2');
        $show->comp0One('Comp0One');
        $show->comp0Two('Comp0Two');
        $show->compTime('CompTime');
        $show->compProvince('CompProvince');
        $show->compCity('CompCity');
        $show->compCounty('CompCounty');
        $show->compAddress('CompAddress');
        $show->compUniGslx('CompUniGslx');
        $show->compUniJjlx('CompUniJjlx');
        $show->compScope('CompScope');
        $show->compFunding('CompFunding');
        $show->moneytype('Moneytype');
        $show->compBoss('CompBoss');
        $show->compScale('CompScale');
        $show->compZrs('CompZrs');
        $show->innerAudit('InnerAudit');
        $show->innerAuditDesc('InnerAuditDesc');
        $show->compTdhb('CompTdhb');
        $show->holderNum('HolderNum');
        $show->spare2('Spare2');
        $show->project_id('Project id');
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
        $form = new Form(new TargetCompanyBaseInfo);

        $form->text('compName', 'CompName');
        $form->text('compZcode', 'CompZcode');
        $form->text('compIndustry1', 'CompIndustry1');
        $form->text('compIndustry2', 'CompIndustry2');
        $form->text('comp0One', 'Comp0One');
        $form->text('comp0Two', 'Comp0Two');
        $form->datetime('compTime', 'CompTime')->default(date('Y-m-d H:i:s'));
        $form->text('compProvince', 'CompProvince');
        $form->text('compCity', 'CompCity');
        $form->text('compCounty', 'CompCounty');
        $form->text('compAddress', 'CompAddress');
        $form->text('compUniGslx', 'CompUniGslx');
        $form->text('compUniJjlx', 'CompUniJjlx');
        $form->text('compScope', 'CompScope');
        $form->decimal('compFunding', 'CompFunding');
        $form->text('moneytype', 'Moneytype');
        $form->text('compBoss', 'CompBoss');
        $form->text('compScale', 'CompScale');
        $form->number('compZrs', 'CompZrs');
        $form->text('innerAudit', 'InnerAudit');
        $form->text('innerAuditDesc', 'InnerAuditDesc');
        $form->text('compTdhb', 'CompTdhb');
        $form->text('holderNum', 'HolderNum');
        $form->text('spare2', 'Spare2');
        $form->text('project_id', 'Project id');

        return $form;
    }
}
