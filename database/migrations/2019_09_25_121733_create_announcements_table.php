<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->string('id');
            $table->string('xmbh')->comment('项目编号')->nullable();
            $table->string('title')->comment('项目名称')->nullable();
            $table->string('wtf_name')->comment('委托方名称')->nullable();
            
            //公告类型：中止公告、终结公告、澄清公告、竞价延期公告、答疑公告、流标公告
            //中止公告、终结公告、恢复公告、流标公告
            //延期公告
            //其他公告：变更公告
            $table->string('type')->comment('公告类型：中止公告、终结公告、澄清公告、竞价延期公告、答疑公告');

            $table->text('content')->comment('理由或者内容')->nullable();//理由或者内容
            $table->datetime('date_matter')->comment('终结日期')->nullable();
            $table->unsignedInteger('seq')->comment('延期顺序数，即第几次延期')->nullable();
            $table->unsignedInteger('delay_days')->comment('延期天数')->nullable();
            $table->datetime('date_start')->comment('中止/延期开始日期')->nullable();
            $table->datetime('date_end')->comment('中止/延期结束日期')->nullable();
            $table->string('inscription_company')->comment('落款单位')->nullable();
            $table->datetime('inscription_date')->comment('落款日期')->nullable();
            $table->string('project_id');
            //同一个项目，可能会出现多个同类型的公告，例如延期公告，因此这里增加保存公告流程节点，记录公告状态
            //1,录入中；2：审批中，9：审批完成
            $table->unsignedInteger('process');
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
        Schema::dropIfExists('announcements');
    }
}
