<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeRuleSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_rule_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('charge_rule_id');
            $table->string('type')->comment('按金额计费（万元）、按年限计费（年）');
            $table->unsignedInteger('seq')->comment('顺序数');
            $table->Integer('start')->comment('计费区间开始点(含)');
            $table->Integer('end')->comment('计费区间结束点(不含)')->nullable();
            $table->decimal('rate',26,6)->comment('费率');
            $table->decimal('quick_num',26,6)->comment('速算数,金额，万元')->nullable();
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
        Schema::dropIfExists('charge_rule_subs');
    }
}
