<?php

namespace App\Admin\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Services\CustomerService;

class CustomersController extends Controller
{
    
    private $service;
    private $module_type;
    private $projecttype;

    protected $fields = [
        'type','name','certificate_type','certificate_code','industry1','industry2','financial_industry1','financial_industry2','found_date','province','city','county','address','companytype','economytype','scope','funding','currency','boss','scale','workers_num','inner_audit','inner_audit_desc','Shareholder_num','stock_num','sfhygyhbtd','sfgz','work_unit','work_duty','fax','phone','email','mailing_address','ssjt','qualification','is_member'
    ];

    public function __construct(CustomerService $customerService)
    {
        $this->service = $customerService;
        $this->module_type = '';
        $this->projecttype = 'customer';
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
            ->header('客户信息-列表')
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
        $customer = Customer::find($id);
        $datas = [
            'customer' => $customer,
            'id' => $customer->id,
            'files' =>$customer->files,
            'images' =>$customer->images,
            'projecttype' => $this->projecttype,
        ];
        $url = 'admin.customer.show';
        return $content
            ->header('客户信息-查看')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view($url, $datas)); 
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
        $customer = Customer::find($id);
        $datas = [
            'customer' => $customer,
            'id' => $customer->id,
            'files' =>$customer->files,
            'images' =>$customer->images,
            'projecttype' => $this->projecttype,
        ];
        $url = 'admin.customer.edit';
        return $content
            ->header('客户信息-编辑')
            ->description('description')
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
        $customer = new Customer();
        $customer->is_member = 2;
        $datas = [
            'customer' => $customer,
            'id' => $customer->id,
            'files' =>$customer->files,
            'images' =>$customer->images,
            'projecttype' => $this->projecttype,
        ];
        $url = 'admin.customer.edit';
        return $content
            ->header('客户信息-新增')
            ->description('description')
            ->body(view($url, $datas)); 
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Customer);

        // $grid->id('Id');
        $grid->type('客户类型')->display(function($type){
            $name = '';
            switch ($type) {
                case '1':
                    $name = '自然人';
                    break;
                case '2':
                    $name = '法人';
                    break;
            }
            return $name;
        });
        $grid->name('客户名称');
        $grid->certificate_type('证件类型');
        $grid->certificate_code('证件号码');
        $grid->phone('电话');

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
        $show = new Show(Customer::findOrFail($id));

        $show->id('Id');
        $show->type('Type');
        $show->name('Name');
        $show->certificate_type('Certificate type');
        $show->certificate_code('Certificate code');
        $show->industry1('Industry1');
        $show->industry2('Industry2');
        $show->financial_industry1('Financial industry1');
        $show->financial_industry2('Financial industry2');
        $show->found_date('Found date');
        $show->province('Province');
        $show->city('City');
        $show->county('County');
        $show->address('Address');
        $show->companytype('Companytype');
        $show->economytype('Economytype');
        $show->scope('Scope');
        $show->funding('Funding');
        $show->currency('Currency');
        $show->boss('Boss');
        $show->scale('Scale');
        $show->workers_num('Workers num');
        $show->inner_audit('Inner audit');
        $show->inner_audit_desc('Inner audit desc');
        $show->Shareholder_num('Shareholder num');
        $show->stock_num('Stock num');
        $show->sfhygyhbtd('Sfhygyhbtd');
        $show->sfgz('Sfgz');
        $show->work_unit('Work unit');
        $show->work_duty('Work duty');
        $show->fax('Fax');
        $show->phone('Phone');
        $show->email('Email');
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
        $form = new Form(new Customer);

        $form->text('type', 'Type');
        $form->text('name', 'Name');
        $form->text('certificate_type', 'Certificate type');
        $form->text('certificate_code', 'Certificate code');
        $form->text('industry1', 'Industry1');
        $form->text('industry2', 'Industry2');
        $form->text('financial_industry1', 'Financial industry1');
        $form->text('financial_industry2', 'Financial industry2');
        $form->text('found_date', 'Found date');
        $form->text('province', 'Province');
        $form->text('city', 'City');
        $form->text('county', 'County');
        $form->text('address', 'Address');
        $form->text('companytype', 'Companytype');
        $form->text('economytype', 'Economytype');
        $form->text('scope', 'Scope');
        $form->text('funding', 'Funding');
        $form->text('currency', 'Currency');
        $form->text('boss', 'Boss');
        $form->text('scale', 'Scale');
        $form->text('workers_num', 'Workers num');
        $form->text('inner_audit', 'Inner audit');
        $form->text('inner_audit_desc', 'Inner audit desc');
        $form->text('Shareholder_num', 'Shareholder num');
        $form->text('stock_num', 'Stock num');
        $form->number('sfhygyhbtd', 'Sfhygyhbtd');
        $form->number('sfgz', 'Sfgz');
        $form->text('work_unit', 'Work unit');
        $form->text('work_duty', 'Work duty');
        $form->text('fax', 'Fax');
        $form->mobile('phone', 'Phone');
        $form->email('email', 'Email');

        return $form;
    }



    public function insert(CustomerRequest $request){
        $data = $request->only($this->fields);
        $model = $this->service->insert($data);
        $result = [
            'success' => 'true',
            'message' => $model,
            'status_code' => '200'
        ];
        return response()->json($result);
    }
    
    public function modify(CustomerRequest $request){
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

    public function search(Request $request){
        $data = $request->all();
        $search_type = $request->search_type;
        $search_name = $request->search_name;
        $search_code = $request->search_code;
        $data = [
            'search_type' => $request->search_type,
            'search_name' => $request->search_name,
            'search_code' => $request->search_code,
        ];
        $models = $this->service->search($data);
        $result = [
            'success' => 'true',
            'customers' =>$models,
            'message' => '',
            'status_code' => '200'
        ];
        return response()->json($result);
    }

    public function search_member(Request $request){
        $data = $request->all();
        $search_name = $request->search_name;
        $search_code = $request->search_code;
        $data = [
            'search_name' => $request->search_name,
            'search_code' => $request->search_code,
            'search_is_member' => $request->search_is_member,
        ];
        $models = $this->service->search_member($data);
        $result = [
            'success' => 'true',
            'customers' =>$models,
            'message' => '',
            'status_code' => '200'
        ];
        return response()->json($result);
    }

}
