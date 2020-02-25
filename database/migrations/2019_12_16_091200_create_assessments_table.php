<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentsTable extends Migration
{
    /**
     * 评估情况
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->string('id');
            $table->string('pgjg')->comment('评估机构');
            $table->string('pgbajg')->comment('评估核准（备案）机构')->nullable();
            $table->string('hezhunFlag')->comment('核准')->nullable();
            $table->string('beianFlag')->comment('备案')->nullable();
            $table->date('hzbarq')->comment('核准（备案）日期');
            $table->date('pgjzr')->comment('评估基准日');
            $table->string('estNoticeno')->comment('评估报告文号');
            $table->string('pgjzrsjjg')->comment('评估基准日审计机构')->nullable();
            $table->string('lssws')->comment('律师事务所')->nullable();
            $table->decimal('estimatePrice',26,6)->comment('转让标的评估值（万元）');
            $table->decimal('zmLdzc',26,6)->comment('流动资产账面价值(万元)')->nullable();
            $table->decimal('pgLdzc',26,6)->comment('流动资产评估价值(万元)')->nullable();
            $table->decimal('zmQtzc',26,6)->comment('其他资产账面价值(万元)')->nullable();
            $table->decimal('pgQtzc',26,6)->comment('其他资产评估价值(万元)')->nullable();
            $table->decimal('zmZzc',26,6)->comment('总资产账面价值(万元)')->nullable();
            $table->decimal('pgZzc',26,6)->comment('总资产评估价值(万元)')->nullable();
            $table->decimal('zmLdfz',26,6)->comment('流动负债账面价值(万元)')->nullable();
            $table->decimal('pgLdfz',26,6)->comment('流动负债评估价值(万元)')->nullable();
            $table->decimal('zmCqfz',26,6)->comment('长期负债账面价值(万元)')->nullable();
            $table->decimal('pgCqfz',26,6)->comment('长期负债评估价值(万元)')->nullable();
            $table->decimal('zmZfz',26,6)->comment('总负债账面价值(万元)')->nullable();
            $table->decimal('pgZfz',26,6)->comment('总负债评估价值(万元)')->nullable();
            $table->decimal('zmJzc',26,6)->comment('净资产账面价值(万元)')->nullable();
            $table->decimal('pgJzc',26,6)->comment('净资产评估价值(万元)')->nullable();
            $table->string('remark',1000)->comment('评估备注信息')->nullable();

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
        Schema::dropIfExists('assessments');
    }
}
