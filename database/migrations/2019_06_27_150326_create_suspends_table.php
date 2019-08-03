<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuspendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //公告表：中止公告、终结公告、澄清公告、竞价延期公告、答疑公告
        Schema::create('suspends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('xmbh')->comment('项目编号')->nullable();//项目编号
            $table->string('title')->comment('项目名称')->nullable();//项目名称
            $table->string('type')->comment('公告类型：中止公告、终结公告、澄清公告、竞价延期公告、答疑公告')->nullable();//公告类型：中止公告、终结公告、澄清公告、竞价延期公告、答疑公告
            $table->text('content')->comment('理由或者内容')->nullable();//理由或者内容
            $table->datetime('date_matter')->comment('中止、终结日期')->nullable();//中止、终结日期
            $table->datetime('date_start')->comment('公告发布开始日期')->nullable();//公告发布开始日期
            $table->datetime('date_end')->comment('公告发布结束日期')->nullable();//公告发布结束日期
            $table->datetime('date_inscription')->comment('落款日期')->nullable();//落款日期
            $table->string('project_id');
            $table->unsignedInteger('status')->default(1);
            $table->unsignedInteger('process')->default(1);
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
        Schema::dropIfExists('suspends');
    }
}
