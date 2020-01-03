<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditReportsTable extends Migration
{
    /**
     * 审计报告
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_reports', function (Blueprint $table) {
            $table->string('id');
            $table->unsignedInteger('year')->comment('年份');
            $table->decimal('zzc',26,6)->comment('资产总额（万元 ）');
            $table->decimal('zfz',26,6)->comment('负债总额（万元 ）');
            $table->decimal('syzqy',26,6)->comment('净资产（所有者权益）（万元 ）');
            $table->decimal('yysl',26,6)->comment('营业收入（万元 ）');
            $table->decimal('yylr',26,6)->comment('利润总额（万元 ）');
            $table->decimal('jlr',26,6)->comment('净利润（万元 ）');
            $table->string('sjjgmc')->comment('审计机构名称');
            $table->string('desc',1000)->comment('备注')->nullable();
            $table->string('project_id')->comment('项目总表ID');
            
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
        Schema::dropIfExists('audit_reports');
    }
}
