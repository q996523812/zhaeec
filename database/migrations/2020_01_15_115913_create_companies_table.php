<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->string('id');
            $table->string('name')->comment('企业名称');
            $table->string('certificate_type')->comment('证件类型');
            $table->string('certificate_code')->comment('证件号码');
            /**
            $table->string('industry1')->comment('所属行业大类');
            $table->string('industry2')->comment('所属行业小类');
            $table->string('financial_industry1')->comment('金融业分类大类');
            $table->string('financial_industry2')->comment('金融业分类小类');
            $table->string('certificateNo')->comment('成立时间');
            $table->string('province')->comment('所在地区-省');
            $table->string('city')->comment('所在地区-市');
            $table->string('county')->comment('所在地区-县')->nullable();
            $table->string('address')->comment('注册地址')->nullable();
            $table->string('companytype')->comment('企业类型');
            $table->string('economytype')->comment('经济类型');
            $table->string('scope')->comment('经营范围');
            $table->string('certificateNo')->comment('注册资本（万元）');
            $table->string('currency')->comment('注册资本币种');
            $table->string('boss')->comment('法定代表人');
            $table->string('scale')->comment('经营规模');
            $table->string('certificateNo')->comment('职工人数');
            $table->string('certificateNo')->comment('内部决策情况');
            $table->string('certificateNo')->comment('内部决策情况（其他）');
            $table->string('certificateNo')->comment('股东数量(个)');
            $table->string('certificateNo')->comment('股份总数');
            $table->unsignedInteger('certificateNo')->comment('是否含有国有划拨土地');
            $table->unsignedInteger('certificateNo')->comment('是否国资');
            **/
            $table->string('fax')->comment('传真');
            $table->string('phone')->comment('电话');
            $table->string('email')->comment('邮箱');
            
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
        Schema::dropIfExists('companies');
    }
}
