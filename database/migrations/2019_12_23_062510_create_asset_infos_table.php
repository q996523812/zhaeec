<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_infos', function (Blueprint $table) {
            $table->string('id');
            $table->string('certificateNo')->comment('土地证号')->nullable();
            $table->string('address')->comment('地址')->nullable();
            $table->string('area')->comment('土地面积')->nullable();
            $table->string('type')->comment('土地类型')->nullable();
            $table->unsignedInteger('useYear')->comment('使用年限')->nullable();
            $table->unsignedInteger('usedYear')->comment('已用年限')->nullable();
            $table->string('planningPurposes')->comment('规划用途')->nullable();
            $table->string('currentlyUse')->comment('目前用途')->nullable();
            $table->text('supporting_facilities')->comment('配套设施说明/标的详情')->nullable();
            $table->string('project_id')->comment('项目总表ID')->nullable();
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
        Schema::dropIfExists('asset_infos');
    }
}
