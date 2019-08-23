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
            $table->increments('id');
            $table->string('action')->comment('值为：发送/接收')->nullable();
            $table->text('message')->comment('发送/接收到的内容')->nullable();
            // $table->datetime('send_time')->comment('发送/接收时间')->nullable();
            $table->unsignedInteger('is_success')->comment('是否发送/接收成功，1 成功，0失败')->nullable();
            $table->text('receipt')->comment('发送/接收消息后收到/发送的回执')->nullable();
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
