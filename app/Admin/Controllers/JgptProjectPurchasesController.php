<?php

namespace App\Admin\Controllers;

use App\Models\JgptProjectPurchase;
use App\Http\Controllers\Controller;
use App\Services\JgptProjectPurchaseService;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JgptProjectPurchasesController extends Controller
{
    use HasResourceActions;
    protected $jgptProjectPurchaseService;

    // 利用 Laravel 的自动解析功能注入 CartService 类
    public function __construct(JgptProjectPurchaseService $jgptProjectPurchaseService)
    {
        $this->jgptProjectPurchaseService = $jgptProjectPurchaseService;
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
        $grid = new Grid(new JgptProjectPurchase);

        $grid->xmbh('项目编号');
        $grid->wtf_name('委托方名称');
        $grid->title('项目名称');
        $grid->gpjg_zj('挂牌金额(总价)');
        $grid->gp_date_start('挂牌开始使时间');
        $grid->gp_date_end('挂牌结束时间');
        $grid->status('项目状态');
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
        $grid->bdyx('Bdyx');
        $grid->xmpz('Xmpz');
        $grid->gq('Gq');
        $grid->jyfs('Jyfs');
        $grid->bjms('Bjms');
        $grid->jjfd('Jjfd');
        $grid->jy_date('Jy date');
        $grid->zbdl_lxfs('Zbdl lxfs');
        $grid->yxf_zgtj('Yxf zgtj');
        $grid->yxdj_zlqd('Yxdj zlqd');
        $grid->yxdj_sj('Yxdj sj');
        $grid->yxdj_fs('Yxdj fs');
        $grid->bzj_jn_time_end('Bzj jn time end');
        $grid->bzj('Bzj');
        $grid->zbwj_dj('Zbwj dj');
        $grid->jypt_lxfs('Jypt lxfs');
        $grid->notes('Notes');
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
        $show = new Show(JgptProjectPurchase::findOrFail($id));

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
        $show->bdyx('Bdyx');
        $show->xmpz('Xmpz');
        $show->gq('Gq');
        $show->jyfs('Jyfs');
        $show->bjms('Bjms');
        $show->jjfd('Jjfd');
        $show->jy_date('Jy date');
        $show->zbdl_lxfs('Zbdl lxfs');
        $show->yxf_zgtj('Yxf zgtj');
        $show->yxdj_zlqd('Yxdj zlqd');
        $show->yxdj_sj('Yxdj sj');
        $show->yxdj_fs('Yxdj fs');
        $show->bzj_jn_time_end('Bzj jn time end');
        $show->bzj('Bzj');
        $show->zbwj_dj('Zbwj dj');
        $show->jypt_lxfs('Jypt lxfs');
        $show->notes('Notes');
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
        $form = new Form(new JgptProjectPurchase);


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
        $form->text('xmbh', '项目编号');
        $form->text('title', '标的名称')->readonly();
        $form->text('pzjg', '挂牌交易批准机构')->readonly();
        $form->textarea('bdgk', '标的概况')->readonly();
        $form->textarea('other', '其它需要披露的事项')->readonly();
        $form->datetime('gp_date_start', '挂牌开始日期')->default(date('Y-m-d'));
        $form->datetime('gp_date_end', '挂牌结束日期')->default(date('Y-m-d'));
        $form->text('sfhs', '是否含税')->readonly();
        $form->text('gpjg_sm', '预算价格说明')->readonly();
        $form->decimal('gpjg_zj', '预算价格')->readonly();
        $form->text('bdyx', '项目(标的)意向')->readonly();
        $form->text('xmpz', '项目配置类型')->readonly();
        $form->text('gq', '工期')->readonly();
        $form->text('jyfs', '交易方式')->readonly();
        $form->text('bjms', '报价模式')->readonly();
        $form->decimal('jjfd', '降价幅度')->readonly();
        $form->datetime('jy_date', '交易（开标、谈判）时间')->default(date('Y-m-d H:i:s'));
        $form->text('zbdl_lxfs', '招标代理机构联系方式 ')->readonly();
        $form->text('yxf_zgtj', '意向方资格条件')->readonly();
        $form->text('yxdj_zlqd', '意向登记要求及资料清单')->readonly();
        $form->text('yxdj_sj', '意向登记的时间');
        $form->text('yxdj_fs', '意向登记方式、招标文件价格');
        $form->datetime('bzj_jn_time_end', '交纳保证金截止时间')->default(date('Y-m-d H:i:s'));
        $form->text('bzj', '保证金金额(人民币) (万元)')->readonly();
        $form->text('zbwj_dj', '投标文件递交时间及地点')->readonly();
        $form->text('jypt_lxfs', '交易平台联系方式');
        $form->textarea('notes', '备注');
        $form->hidden('status', 'Status');
        $form->hasMany('files', '附件列表', function (Form\NestedForm $form) {
            $form->file('path','附件')->readonly();
        });
        return $form;
    }

    //业务员接收申请
    public function receive($id,Request $request,JgptProjectPurchase $jgptPurchase){
        $user = Admin::user();
        $data_datail = $request->only(['wtf_name','wtf_qyxz','wtf_province','wtf_city','wtf_area','wtf_street','wtf_yb','wtf_fddbr','wtf_phone','wtf_fax','wtf_email','wtf_jt','wtf_dlr_name','wtf_dlr_phone','xmbh','title','pzjg','bdgk','other','gp_date_start','gp_date_end','sfhs','gpjg_sm','gpjg_zj','bdyx','xmpz','gq','jyfs','bjms','jjfd','jy_date','zbdl_lxfs','yxf_zgtj','yxdj_zlqd','yxdj_sj','yxdj_fs','bzj_jn_time_end','bzj','zbwj_dj','jypt_lxfs','notes']);
        $data_project = $request->only(['xmbh','title','type','price','gp_date_start','gp_date_end','status','user_id','detail_id','djl']);
        $data['id'] = $id;
        DB::transaction(function () use($jgptPurchase,$data_datail,$data_project,$id) {
            $jgptPurchase = $this->jgptProjectPurchaseService->receive($data_datail,$data_project,$id);
        });
        // return back()->withErrors(['1111111111111！']);
        return redirect()->route('jgptprojectpurchases.index');
        // return [];
    }
    
    //业务员退回申请
    public function back(Request $request,JgptProjectPurchase $jgptPurchase){
        DB::transaction(function () use($jgptPurchase,$data) {
            $jgptPurchase = $this->jgptProjectPurchaseService->back($data);
        });
        return redirect()->route('jgptprojectpurchases.index');
    }
}
