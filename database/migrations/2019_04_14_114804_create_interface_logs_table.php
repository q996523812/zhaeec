<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterfaceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interface_logs', function (Blueprint $table) {
            $table->increments('id');//主键，因无须和其他表关联，用自增ID
            $table->string('action')->nullable();//值为：发送/接收
            // $table->string('xmbh')->nullable();//项目编号
            $table->string('title')->nullable();//项目名称
            $table->text('send_message')->nullable();//发送内容
            $table->datetime('send_time')->nullable();//发送时间
            $table->unsignedInteger('is_send_success')->nullable();//是否发送成功，1 成功，0失败
            $table->text('send_receipt')->nullable();//发送消息后收到的回执
            $table->text('receive_message')->nullable();//接收内容
            $table->datetime('receive_time')->nullable();//接收时间
            $table->unsignedInteger('is_receive_success')->nullable();//是否接收成功，1 成功，0失败
            $table->text('receive_receipt')->nullable();//收到消息后发送给对方的回执
           
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
        Schema::dropIfExists('interface_logs');
    }
}
