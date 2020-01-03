<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetCompanyBaseInfosTable extends Migration
{
    /**
     * 资产转让：标的企业基本情况
     * 增资扩股：融资企业基本情况
     * @return void
     */
    public function up()
    {
        Schema::create('target_company_base_infos', function (Blueprint $table) {
            $table->string('id');
            $table->string('compName')->comment('企业名称');
            $table->string('compZcode')->comment('统一社会信用代码或组织机构代码');
            $table->string('compIndustry1')->comment('所属行业（大类）');
            $table->string('compIndustry2')->comment('所属行业（细分）');
            $table->string('comp0One')->comment('金融业分类（大类）')->nullable();
            $table->string('comp0Two')->comment('金融业分类（细分）')->nullable();
            $table->datetime('compTime')->comment('成立时间');
            $table->string('compProvince')->comment('所在地区（省）');
            $table->string('compCity')->comment('所在地区（市）');
            $table->string('compCounty')->comment('所在地区（县）')->nullable();
            $table->string('compAddress')->comment('注册地（地址）')->nullable();
            $table->unsignedInteger('compUniGslx')->comment('企业类型');
            $table->unsignedInteger('compUniJjlx')->comment('经济类型');
            $table->string('compScope',1000)->comment('经营范围');
            $table->decimal('compFunding',26,6)->comment('注册资本（万元）');
            $table->string('moneytype')->comment('注册资本币种');
            $table->string('compBoss')->comment('法定代表人')->nullable();
            $table->unsignedInteger('compScale')->comment('经营规模');
            $table->unsignedInteger('compZrs')->comment('职工人数');
            $table->string('innerAudit')->comment('内部决策情况');
            $table->string('innerAuditDesc')->comment('内部决策情况其他选项说明')->nullable();
            $table->unsignedInteger('compTdhb')->comment('是否含有国有划拨土地')->nullable();
            $table->unsignedInteger('holderNum')->comment('股东数量(个)');
            $table->unsignedInteger('spare2')->comment('股份总数')->nullable();

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
        Schema::dropIfExists('target_company_base_infos');
    }
}
