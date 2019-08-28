<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * 成交信息表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_id');
            $table->string('intentional_parties_id')->comment('中标方，意向方信息表ID');
            $table->decimal('price_total',26,6)->comment('成交价格(总价)');
            $table->decimal('price_unit',26,6)->comment('成交价格(单价)')->nullable();
            $table->text('price_note')->comment('成交价格备注')->nullable();
            $table->datetime('transaction_date')->comment('成交时间')->nullable();
            $table->decimal('service_charge_receivable',26,6)->comment('中心应收服务费')->default(0);
            $table->decimal('service_charge_received',26,6)->comment('中心已收服务费')->nullable();
            $table->decimal('wtf_service_fee_payable',26,6)->comment('委托方应缴服务费')->default(0);
            $table->decimal('wtf_service_fee_paid',26,6)->comment('委托方已缴服务费')->nullable();
            $table->decimal('zbf_service_fee_payable',26,6)->comment('中标方应缴服务费')->default(0);
            $table->decimal('zbf_service_fee_paid',26,6)->comment('中标方已缴服务费')->nullable();
            $table->string('charge_rule_id')->comment('应用的收费规则，收费规则表ID')->nullable();
            $table->unsignedInteger('status')->default(1);
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
        Schema::dropIfExists('transactions');
    }
}
