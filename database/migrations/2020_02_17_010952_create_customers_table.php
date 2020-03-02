<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
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
            $table->string('mailing_address',500)->comment('邮寄地址')->nullable();
            
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
        Schema::dropIfExists('customers');
    }
}
