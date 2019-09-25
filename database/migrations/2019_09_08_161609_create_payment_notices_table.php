<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_notices', function (Blueprint $table) {
            $table->string('id');
            $table->string('project_id');
            $table->string('xmbh')->comment('项目编号');
            $table->string('title')->comment('项目名称/标的名称');
            $table->string('wtf')->comment('委托方');
            $table->string('zbf')->comment('中标方');
            $table->decimal('zbjg_xx',26,6)->comment('中标价格，小写(元)');
            $table->string('zbjg_dx')->comment('中标价格，大写');
            $table->decimal('wtf_fwf_xx',26,6)->comment('委托方服务费，小写(元)')->nullable();
            $table->string('wtf_fwf_dx')->comment('委托方服务费，大写')->nullable();
            $table->decimal('zbf_fwf_xx',26,6)->comment('中标方服务费，小写(元)');
            $table->string('zbf_fwf_dx')->comment('中标方服务费，大写');
            $table->datetime('hk_date')->comment('汇款时间。在XX日期之前汇款至指定账户');
            $table->string('account_name')->comment('账户名');
            $table->string('account_bank')->comment('开户行');
            $table->string('account_code')->comment('账号');
            $table->string('remark')->comment('备注：')->default('注:在银行的汇款进帐单的“备注”或“付款理由”栏上注明：“XXX项目交易服务费”字样。');
            $table->string('email')->comment('中心联系邮箱');
            $table->datetime('qf_date')->comment('通知签发日期、落款日期');
            
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
        Schema::dropIfExists('payment_notices');
    }
}
