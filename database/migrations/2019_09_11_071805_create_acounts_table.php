<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('账户名')->nullable();
            $table->string('bank')->comment('开户行')->nullable();
            $table->string('code')->comment('账号')->nullable();
            $table->unsignedInteger('type')->comment('账户类型：1：保证金，2：服务费；')->default(0);
            $table->unsignedInteger('default')->comment('是否默认账号：0，否；1：是；')->default(0);
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
        Schema::dropIfExists('acounts');
    }
}
