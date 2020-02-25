<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntentionalPartiesTable extends Migration
{
    /**
     * 意向方信息表，报名表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intentional_parties', function (Blueprint $table) {
            /**
            $table->string('id');
            $table->unsignedInteger('customertype')->comment('意向方类型，1:自然人、2:法人、3：其他组织');
            $table->string('name')->comment('客户名称');
            $table->string('id_type')->comment('证件类型');
            $table->string('id_code')->comment('证件号码');
            $table->string('province')->comment('所在地区-省');
            $table->string('city')->comment('所在地区-市')->nullable();
            $table->string('area')->comment('所在地区-区')->nullable();
            //法人、其他组织
            $table->unsignedInteger('isgz')->comment('是否国资')->nullable();
            $table->string('registered_address')->comment('注册地址')->nullable();
            $table->decimal('registered_capital',26,6)->comment('注册资本（万元）')->nullable();
            $table->string('registered_capital_currency')->comment('币种')->nullable();
            $table->datetime('found_date')->comment('成立时间')->nullable();
            $table->string('legal_representative')->comment('法定代表人')->nullable();
            $table->string('industry1')->comment('所属行业,大类')->nullable();
            $table->string('industry2')->comment('所属行业，详细分类')->nullable();
            $table->string('companytype')->comment('企业类型')->nullable();
            $table->string('economytype')->comment('经济类型')->nullable();
            $table->string('scale')->comment('经营规模')->nullable();
            $table->string('scope')->comment('经营范围')->nullable();
            $table->string('credit_cer')->comment('主体资格证明')->nullable();
            //自然人
            $table->string('work_unit')->comment('工作单位')->nullable();
            $table->string('work_duty')->comment('职务')->nullable();

            $table->string('contact_name')->comment('联系人姓名')->nullable();
            $table->string('contact_phone')->comment('联系人电话')->nullable();
            $table->string('contact_email')->comment('联系人邮箱')->nullable();
            $table->string('contact_fax')->comment('联系人传真')->nullable();
            $table->string('account_code')->comment('银行账号')->nullable();
            $table->string('account_bank')->comment('开户行')->nullable();
            $table->string('account_name')->comment('账户名')->nullable();
            **/
            $table->string('id');
            $table->string('type')->comment('客户类型，1:自然人、2:法人、3：其他组织');
            $table->string('name')->comment('客户名称/企业名称');
            $table->string('certificate_type')->comment('证件类型');
            $table->string('certificate_code')->comment('证件号码');
            /*法人、其他组织*/
            $table->string('industry1')->comment('所属行业大类')->nullable();
            $table->string('industry2')->comment('所属行业小类')->nullable();
            $table->string('financial_industry1')->comment('金融业分类大类')->nullable();
            $table->string('financial_industry2')->comment('金融业分类小类')->nullable();
            $table->string('found_date')->comment('成立时间')->nullable();
            $table->string('province')->comment('所在地区-省');
            $table->string('city')->comment('所在地区-市');
            $table->string('county')->comment('所在地区-县')->nullable();
            $table->string('address')->comment('注册地址')->nullable();
            $table->string('companytype')->comment('企业类型')->nullable();
            $table->string('economytype')->comment('经济类型')->nullable();
            $table->string('scope')->comment('经营范围')->nullable();
            $table->string('funding')->comment('注册资本（万元）')->nullable();
            $table->string('currency')->comment('注册资本币种')->nullable();
            $table->string('boss')->comment('法定代表人')->nullable();
            $table->string('scale')->comment('经营规模')->nullable();
            $table->string('workers_num')->comment('职工人数')->nullable();
            $table->string('inner_audit')->comment('内部决策情况')->nullable();
            $table->string('inner_audit_desc')->comment('内部决策情况（其他）')->nullable();
            $table->string('Shareholder_num')->comment('股东数量(个)')->nullable();
            $table->string('stock_num')->comment('股份总数')->nullable();
            $table->unsignedInteger('sfhygyhbtd')->comment('是否含有国有划拨土地')->nullable();
            $table->unsignedInteger('sfgz')->comment('是否国资')->nullable();
            $table->text('qualification')->comment('主体资格证明')->nullable();
            $table->string('ssjt')->comment('所属集团')->nullable();

            /*自然人*/
            $table->string('work_unit')->comment('工作单位')->nullable();
            $table->string('work_duty')->comment('职务')->nullable();
            
            $table->string('fax')->comment('传真')->nullable();
            $table->string('phone')->comment('电话')->nullable();
            $table->string('email')->comment('邮箱')->nullable();
            

            // $table->datetime('date_register');//登记时间
            $table->decimal('deposit',26,6)->comment('保证金')->nullable();
            $table->unsignedInteger('is_win')->comment('是否中标,0:否、1：是')->default(0);
            $table->decimal('win_amount',26,6)->comment('中标金额')->default(0);

            $table->string('project_id');
            $table->unsignedInteger('status')->default(1);
            $table->unsignedInteger('process')->comment('流程节点')->nullable();
            $table->string('process_name')->comment('流程节点中文名称')->nullable();
            $table->string('examination')->comment('联合资格审查结果')->nullable();
            $table->string('ptf_opinion')->comment('平台意见：1：通过、2：不通过')->nullable();
            $table->string('ptf_desc')->comment('平台意见')->nullable();
            $table->string('wtf_opinion')->comment('委托方意见：1：通过、2：不通过')->nullable();
            $table->string('wtf_desc')->comment('委托方意见')->nullable();

            $table->unsignedInteger('is_member_in')->comment('是否会员带入：1：是（会员带入）、2：否（自有项目）')->default(2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intentional_parties');
    }
}
