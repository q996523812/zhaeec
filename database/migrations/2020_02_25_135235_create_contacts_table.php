<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->string('id');
            $table->string('project_id')->comment('项目总表ID');
            $table->string('wtf_lxr_name')->comment('委托方联系人姓名')->nullable();
            $table->string('wtf_lxr_mobile')->comment('委托方联系人电话')->nullable();
            $table->string('wtf_lxr_email')->comment('委托方联系人邮箱')->nullable();
            $table->string('ptf_lxr_name')->comment('平台方联系人姓名')->nullable();
            $table->string('ptf_lxr_mobile')->comment('平台方联系人电话')->nullable();
            $table->string('ptf_lxr_email')->comment('平台方联系人邮箱')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
