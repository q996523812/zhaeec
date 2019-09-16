<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_id');
            $table->string('xmbh')->comment('项目编号');
            $table->string('title')->comment('项目名称/标的名称');
            $table->string('wtf')->comment('委托方/出租方/采购人');
            $table->string('zbf')->comment('中标方/承租人/成交供应商');
            $table->decimal('price',26,6)->comment('成交价格(万元)');
            $table->string('jyfs')->comment('交易方式/采购方式');

            $table->datetime('jy_date')->comment('交易日期')->nullable();
            $table->string('jycd')->comment('交易场地')->nullable();
            $table->string('gsnr')->comment('公示内容')->nullable();
            $table->datetime('fb_date')->comment('发布日期')->nullable();
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
        Schema::dropIfExists('transaction_announcements');
    }
}
