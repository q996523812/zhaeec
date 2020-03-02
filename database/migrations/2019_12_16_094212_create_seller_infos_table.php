<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerInfosTable extends Migration
{
    /**
     * 转让方、出租方
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_infos', function (Blueprint $table) {
            /*
            $table->string('id');
            $table->string('sellerName')->comment('企业名称');
            $table->unsignedInteger('unionFlag')->comment('是否联合转让');
            $table->string('sellerZcode')->comment('统一社会信用代码或组织机构代码');
            $table->string('sellerIndustry1')->comment('所属行业（大类）')->nullable();
            $table->string('sellerIndustry2')->comment('所属行业（细分）')->nullable();
            $table->string('seller0One')->comment('金融业分类（大类）')->nullable();
            $table->string('seller0Two')->comment('金融业分类（细分）')->nullable();
            $table->datetime('sellerTime')->comment('成立时间')->nullable();
            $table->string('sellerProvince')->comment('所在地区（省）')->nullable();
            $table->string('sellerCity')->comment('所在地区（市）')->nullable();
            $table->string('sellerCounty')->comment('所在地区（县）')->nullable();
            $table->string('sellerAddress')->comment('注册地（地址）');
            $table->string('sellerUniGslx')->comment('企业类型');
            $table->string('sellerUniJjlx')->comment('经济类型');
            $table->string('compScope',1000)->comment('经营范围')->nullable();
            $table->decimal('sellerFunding',26,6)->comment('注册资本（万元）');
            $table->string('moneytype')->comment('注册资本币种');
            $table->string('sellerBoss')->comment('法定代表人');
            $table->string('sellerScale')->comment('经营规模')->nullable();
            $table->unsignedInteger('compZrs')->comment('职工人数')->nullable();
            $table->string('innerAudit')->comment('内部决策情况')->nullable();
            $table->string('innerAuditDesc')->comment('内部决策情况其他选项说明');
            $table->decimal('holdPercent',26,6)->comment('转让方持有产（股）权比例%')->nullable();
            $table->unsignedInteger('sharesHave')->comment('转让方持有产（股）份数量')->nullable();
            $table->decimal('sellPercent',26,6)->comment('本次拟转让产（股）权比例%')->nullable();
            $table->unsignedInteger('sharesWant')->comment('本次拟转让产（股）份数量')->nullable();
            $table->string('ssjt')->comment('所属集团')->nullable();
            $table->string('project_id')->comment('项目总表ID');
            $table->timestamps();
            */
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
            $table->string('province')->comment('所在地区-省')->nullable();
            $table->string('city')->comment('所在地区-市')->nullable();
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
            
            $table->string('project_id')->comment('项目总表ID');

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
        Schema::dropIfExists('seller_infos');
    }
}
