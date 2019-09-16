<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_confirmations', function (Blueprint $table) {
            $table->string('id');
            $table->string('project_id');
            $table->string('xmbh')->comment('项目编号');
            $table->string('title')->comment('项目名称/标的名称');
            $table->string('wtf')->comment('委托方/出租方/采购人');
            $table->string('zbf')->comment('中标方/承租人/成交供应商');
            $table->decimal('price',26,6)->comment('成交价格(万元)');
            $table->text('pgjg')->comment('评估结果')->nullable();
            $table->datetime('gp_date_start')->comment('挂牌开始时间')->nullable();
            $table->datetime('gp_date_end')->comment('挂牌结束时间')->nullable();
            $table->string('jyfs')->comment('交易方式/采购方式');
            $table->datetime('htqs_date')->comment('合同签署日期')->nullable();
            $table->string('zffs')->comment('交易价款支付方式')->nullable();
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
        Schema::dropIfExists('transaction_confirmations');
    }
}
