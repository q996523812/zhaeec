<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeRulesTable extends Migration
{
    /**
     * 收费规则
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_rules', function (Blueprint $table) {
            $table->string('id');
            $table->string('project_type')->comment('项目类型');
            $table->string('project_type_name')->comment('项目类型名称');
            $table->string('charge_type')->comment('收费方式：1、按标准收费，2、手工录入');
            $table->string('charge_type_name')->comment('收费方式：1、按标准收费，2、手工录入');
            //仅用于采购招标，1、货物招标，2、服务招标，3、工程招标
            $table->string('service_type')->comment('服务类型，1、货物招标，2、服务招标，3、工程招标');
            $table->string('service_type_name')->comment('服务类型名称：货物招标、服务招标、工程招标');
            // $table->string('formula')->comment('公式');
            $table->string('explain')->comment('收费说明');
            // $table->unsignedInteger('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('charge_rules');
    }
}
