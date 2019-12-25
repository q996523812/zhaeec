<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->string('id');
            $table->string('project_id');
            $table->string('code')->comment('合同编号')->nullable();
            $table->datetime('sign_date')->comment('签约时间')->nullable();
            $table->datetime('effect_date')->comment('合同生效时间')->nullable();
            $table->datetime('term_date_start')->comment('合同期限开始日期XXX年XX月XX日')->nullable();
            $table->datetime('term_date_end')->comment('合同期限结束日期XXX年XX月XX日')->nullable();
            
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
        Schema::dropIfExists('contracts');
    }
}
