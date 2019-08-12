<?php

namespace App\Admin\Controllers;

use App\Models\JgptProjectLease;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\JgptProjectLeaseService;

class JgptProjectLeasesController extends Controller
{
    use HasResourceActions;
    protected $jgptProjectLeaseService;
    protected $projectTypeName = '资产租赁';
    protected $projectTypeCode = 'jgptprojectleases';
    // 利用 Laravel 的自动解析功能注入 CartService 类
    public function __construct(JgptProjectLeaseService $jgptProjectLeaseService)
    {
        $this->jgptProjectLeaseService = $jgptProjectLeaseService;
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
        $detail = JgptProjectLease::find($id);
        $datas = $this->getDatasToView($detail);
        $url = 'admin.project.jgpt.zczl.edit';  
        return $content
            ->header($this->projectTypeName.'-编辑')
            ->body(view($url, $datas));
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

    protected function getDatasToView($detail){
        
        $datas = [
            'detail' => $detail,
            'projecttype' => $this->projectTypeCode,
            'files' => $detail->files,
            'images' => $detail->images,
        ];
        return $datas;        
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new JgptProjectLease);

        $grid->id('Id');
        $grid->wtf_name('委托方名称');
        $grid->title('项目名称');
        $grid->gpjg_zj('挂牌金额(总价)');
        $grid->gp_date_start('挂牌开始使时间');
        $grid->gp_date_end('挂牌结束时间');
        $grid->unsignedInteger('项目状态');
 /*       
        $grid->jgpt_key('Jgpt key');
        $grid->wtf_name('Wtf name');
        $grid->wtf_qyxz('Wtf qyxz');
        $grid->wtf_province('Wtf province');
        $grid->wtf_city('Wtf city');
        $grid->wtf_area('Wtf area');
        $grid->wtf_street('Wtf street');
        $grid->wtf_yb('Wtf yb');
        $grid->wtf_fddbr('Wtf fddbr');
        $grid->wtf_phone('Wtf phone');
        $grid->wtf_fax('Wtf fax');
        $grid->wtf_email('Wtf email');
        $grid->wtf_jt('Wtf jt');
        $grid->wtf_dlr_name('Wtf dlr name');
        $grid->wtf_dlr_phone('Wtf dlr phone');
        $grid->xmbh('Xmbh');
        $grid->title('Title');
        $grid->pzjg('Pzjg');
        $grid->bdgk('Bdgk');
        $grid->other('Other');
        $grid->gp_date_start('Gp date start');
        $grid->gp_date_end('Gp date end');
        $grid->sfhs('Sfhs');
        $grid->gpjg_sm('Gpjg sm');
        $grid->gpjg_zj('Gpjg zj');
        $grid->gpjg_dj('Gpjg dj');
        $grid->zlqx('Zlqx');
        $grid->jymd('Jymd');
        $grid->zclb('Zclb');
        $grid->fbfs('Fbfs');
        $grid->zcsfsx('Zcsfsx');
        $grid->pgjz('Pgjz');
        $grid->jyfs('Jyfs');
        $grid->bjms('Bjms');
        $grid->jjfd('Jjfd');
        $grid->jysj_bz('Jysj bz');
        $grid->yxf_zgtj('Yxf zgtj');
        $grid->yxdj_zlqd('Yxdj zlqd');
        $grid->bzj_jn_time_end('Bzj jn time end');
        $grid->bzj('Bzj');
        $grid->jypt_lxfs('Jypt lxfs');
        $grid->notes('Notes');
        $grid->fc_province('Fc province');
        $grid->fc_city('Fc city');
        $grid->fc_area('Fc area');
        $grid->fc_street('Fc street');
        $grid->fc_gn('Fc gn');
        $grid->fc_mj('Fc mj');
        $grid->fc_zjh('Fc zjh');
        $grid->fc_zjjg('Fc zjjg');
        $grid->fc_ysynx('Fc ysynx');
        $grid->fc_ghyt('Fc ghyt');
        $grid->fc_sfyyzh('Fc sfyyzh');
        $grid->fc_jcsj('Fc jcsj');
        $grid->fc_dqyt('Fc dqyt');
        $grid->fc_yzh_yxq('Fc yzh yxq');
        $grid->status('Status');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
*/
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
        $show = new Show(JgptProjectLease::findOrFail($id));

        $show->id('Id');
        $show->jgpt_key('Jgpt key');
        $show->wtf_name('Wtf name');
        $show->wtf_qyxz('Wtf qyxz');
        $show->wtf_province('Wtf province');
        $show->wtf_city('Wtf city');
        $show->wtf_area('Wtf area');
        $show->wtf_street('Wtf street');
        $show->wtf_yb('Wtf yb');
        $show->wtf_fddbr('Wtf fddbr');
        $show->wtf_phone('Wtf phone');
        $show->wtf_fax('Wtf fax');
        $show->wtf_email('Wtf email');
        $show->wtf_jt('Wtf jt');
        $show->wtf_dlr_name('Wtf dlr name');
        $show->wtf_dlr_phone('Wtf dlr phone');
        $show->xmbh('Xmbh');
        $show->title('Title');
        $show->pzjg('Pzjg');
        $show->bdgk('Bdgk');
        $show->other('Other');
        $show->gp_date_start('Gp date start');
        $show->gp_date_end('Gp date end');
        $show->sfhs('Sfhs');
        $show->gpjg_sm('Gpjg sm');
        $show->gpjg_zj('Gpjg zj');
        $show->gpjg_dj('Gpjg dj');
        $show->zlqx('Zlqx');
        $show->jymd('Jymd');
        $show->zclb('Zclb');
        $show->fbfs('Fbfs');
        $show->zcsfsx('Zcsfsx');
        $show->pgjz('Pgjz');
        $show->jyfs('Jyfs');
        $show->bjms('Bjms');
        $show->jjfd('Jjfd');
        $show->jysj_bz('Jysj bz');
        $show->yxf_zgtj('Yxf zgtj');
        $show->yxdj_zlqd('Yxdj zlqd');
        $show->bzj_jn_time_end('Bzj jn time end');
        $show->bzj('Bzj');
        $show->jypt_lxfs('Jypt lxfs');
        $show->notes('Notes');
        $show->fc_province('Fc province');
        $show->fc_city('Fc city');
        $show->fc_area('Fc area');
        $show->fc_street('Fc street');
        $show->fc_gn('Fc gn');
        $show->fc_mj('Fc mj');
        $show->fc_zjh('Fc zjh');
        $show->fc_zjjg('Fc zjjg');
        $show->fc_ysynx('Fc ysynx');
        $show->fc_ghyt('Fc ghyt');
        $show->fc_sfyyzh('Fc sfyyzh');
        $show->fc_jcsj('Fc jcsj');
        $show->fc_dqyt('Fc dqyt');
        $show->fc_yzh_yxq('Fc yzh yxq');
        $show->status('Status');
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
        $form = new Form(new JgptProjectLease);
        $form->text('wtf_name', '委托方名称')->readonly();
        $form->text('wtf_qyxz', '委托方企业性质')->readonly();
        $form->text('wtf_province', '省')->readonly();
        $form->text('wtf_city', '市')->readonly();
        $form->text('wtf_area', '区')->readonly();
        $form->text('wtf_street', '详细地址')->readonly();
        $form->text('wtf_yb', '邮编')->readonly();
        $form->text('wtf_fddbr', '法定代表人')->readonly();
        $form->text('wtf_phone', '联系电话')->readonly();
        $form->text('wtf_fax', '传真')->readonly();
        $form->text('wtf_email', '邮箱')->readonly();
        $form->text('wtf_jt', '所属集团')->readonly();
        $form->text('wtf_dlr_name', '委托代理人')->readonly();
        $form->text('wtf_dlr_phone', '联系电话')->readonly();
        $form->text('xmbh', '项目编号')->readonly();
        $form->text('title', '标的名称')->readonly();
        $form->text('pzjg', '挂牌交易批准机构')->readonly();
        $form->textarea('bdgk', '标的概况')->readonly();
        $form->textarea('other', '其它需要披露的事项')->readonly();
        $form->datetime('gp_date_start', '挂牌开始日期')->default(date('Y-m-d'));
        $form->datetime('gp_date_end', '挂牌结束日期')->default(date('Y-m-d'));
        $form->text('sfhs', '是否含税')->readonly();
        $form->text('gpjg_sm', '价格说明')->readonly();
        $form->decimal('gpjg_zj', '总租金')->readonly();
        $form->decimal('gpjg_dj', '月租金')->readonly();
        $form->number('zlqx', '租赁期限（月限）')->readonly();
        $form->text('jymd', '交易目的')->readonly();
        $form->text('zclb', '资产类别')->readonly();
        $form->text('fbfs', '信息发布方式')->readonly();
        $form->text('zcsfsx', '交易资产中是否存在权利受到限制的情形')->readonly();
        $form->decimal('pgjz', '标的资产评估值(人民币)元')->readonly();
        $form->text('jyfs', '交易方式')->readonly();
        $form->text('bjms', '报价模式')->readonly();
        $form->decimal('jjfd', '加价幅度')->readonly();
        $form->text('jysj_bz', '交易时间备注')->readonly();
        $form->text('yxf_zgtj', '意向方资格条件')->readonly();
        $form->text('yxdj_zlqd', '意向登记要求及资料清单')->readonly();
        $form->datetime('bzj_jn_time_end', '报名资料提交及交纳竞标保证金截止时间')->default(date('Y-m-d H:i:s'));
        $form->decimal('bzj', '竞标保证金金额(人民币) (万元)')->readonly();
        $form->text('jypt_lxfs', '交易平台联系方式');
        $form->textarea('notes', '备注');
        $form->text('fc_province', '省')->readonly();
        $form->text('fc_city', '市')->readonly();
        $form->text('fc_area', '区')->readonly();
        $form->text('fc_street', '详细地址')->readonly();
        $form->text('fc_gn', '功能')->readonly();
        $form->text('fc_mj', '面积')->readonly();
        $form->text('fc_zjh', '房产证号')->readonly();
        $form->text('fc_zjjg', '建筑结构')->readonly();
        $form->text('fc_ysynx', '已使用年限')->readonly();
        $form->text('fc_ghyt', '规划用途')->readonly();
        $form->text('fc_sfyyzh', '是否有原租户')->readonly();
        $form->text('fc_jcsj', '建成时间')->readonly();
        $form->text('fc_dqyt', '当前用途')->readonly();
        $form->text('fc_yzh_yxq', '原租户是否享有优先权')->readonly();
        $form->hidden('status', '状态');
        $form->hasMany('files', '附件列表', function (Form\NestedForm $form) {
            
            $form->file('path','附件')->readonly();
            //$form->text('name', '文件名称')->rules('required');
            //$form->text('path', '文件路径')->rules('required');
        });
        return $form;
    }

    //业务员接收申请
    public function receive(Request $request){
        $user = Admin::user();
        $data = $request->all();
        $data_datail = $request->only(['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','xmbh','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','gpjg_dj','zlqx','jymd','zclb','fbfs','zcsfsx','pgjz','jyfs','bjms','jjfd','jysj_bz','yxf_zgtj','yxdj_zlqd','bzj_jn_time_end','bzj','jypt_lxfs','notes','fc_province','fc_city','fc_area','fc_street','fc_gn','fc_mj','fc_zjh','fc_zjjg','fc_ysynx','fc_ghyt','fc_sfyyzh','fc_jcsj','fc_dqyt','fc_yzh_yxq','status']);
        $data_project = $request->only(['xmbh','title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl']);
        $id = $request->id;
        $jgptPurchase = $this->jgptProjectLeaseService->receive($data_datail,$data_project,$id);
        // return back()->withErrors(['1111111111111！']);
        return redirect()->route('jgptprojectleases.index');
    }
    
    //业务员退回申请
    public function back(Request $request,JgptProjectLease $jgptPurchase){
        DB::transaction(function () use($jgptPurchase,$data) {
            $jgptPurchase = $this->jgptProjectLeaseService->back($data);
        });
        return redirect()->route('projectleases.index');
    }    
}
