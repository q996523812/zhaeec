<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarginAcountsTable extends Migration
{
    /**
     * 保证金账户表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('margin_acounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('账户名')->nullable();
            $table->string('bank')->comment('开户行')->nullable();
            $table->string('account')->comment('账号')->nullable();
            $table->unsignedInteger('default')->comment('是否默认账号：0，否；1：是；')->default(0);
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
        Schema::dropIfExists('margin_acounts');
    }
}
