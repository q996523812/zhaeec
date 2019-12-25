<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetCompanyOwnershipStructuresTable extends Migration
{
    /**
     * 标的/融资企业股权结构
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_company_ownership_structures', function (Blueprint $table) {
            $table->string('id');
            $table->string('holderName')->comment('股东名称');
            $table->decimal('holdingRatio',26,6)->comment('持股比例');
            $table->unsignedInteger('originalShare')->comment('持股数量');
            $table->string('target_company_base_infos_id')->comment('标的/融资企业基本信息表ID');
            
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
        Schema::dropIfExists('target_company_ownership_structures');
    }
}
