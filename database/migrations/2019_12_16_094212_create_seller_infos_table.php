<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_infos', function (Blueprint $table) {
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
