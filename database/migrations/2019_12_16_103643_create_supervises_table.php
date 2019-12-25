<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisesTable extends Migration
{
    /**
     * 监管信息
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervises', function (Blueprint $table) {
            $table->string('id');
            $table->string('sellerIsYq')->comment('国资监管类型');
            $table->string('mgrType')->comment('国资监管机构');
            $table->string('mgrProvince')->comment('监管机构属地--省')->nullable();
            $table->string('mgrCity')->comment('监管机构属地--市')->nullable();
            $table->string('mgrDistrict')->comment('监管机构属地--区')->nullable();
            $table->string('mgrCode')->comment('统一社会信用代码或组织机构代码');
            $table->string('mgrName')->comment('选择国家出资企业或主管部门名称');
            $table->string('permitCompType')->comment('批准机构类型');
            $table->string('permitCompName')->comment('批准单位名称');
            $table->string('permitFileType')->comment('批准文件类型');
            $table->string('permitFileDesc')->comment('其他')->nullable();
            $table->string('permitFileName')->comment('批准文件名称/决议名称');
            $table->string('permitFileNo')->comment('批准文号')->nullable();
            $table->datetime('permitDate')->comment('批准日期');
            
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
        Schema::dropIfExists('supervises');
    }
}
