<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id');
            $table->string('xmbh')->unique();
            $table->string('title');
            $table->string('type');
            $table->decimal('price', 26, 6)->nullable();
            $table->datetime('gp_date_start')->nullable();
            $table->datetime('gp_date_end')->nullable();
            //0：删除、1：正常（已保存）、11：挂牌、12：流标、13：暂停、14:成交、15：弃标、16：其它原因用户取消挂牌或者终结挂牌
            //其中用于接口数据的状态： 5：接口已保存、6：接口已退回、7：接口已接收、
            $table->unsignedInteger('status')->default(1)->comment('0：删除、1：正常（已保存）、11：挂牌、12：流标、13：暂停、14:成交、15：弃标、16：其它原因用户取消挂牌或者终结挂牌');
            $table->unsignedInteger('djl')->default(0);
            $table->unsignedInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('admin_users');
            $table->string('detail_id');  
            $table->unsignedInteger('process');
            $table->string('process_name')->nullable();//流程节点中文名称
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
        Schema::dropIfExists('projects');
    }
}
