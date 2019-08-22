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
            $table->string('service_type')->comment('服务类型');
            $table->string('service_type_name')->comment('服务类型名称');
            $table->string('formula')->comment('公式');
            $table->string('explain')->comment('收费说明');
            $table->unsignedInteger('status')->default(1);
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
