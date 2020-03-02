<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_modes', function (Blueprint $table) {
            $table->string('id');
            $table->unsignedInteger('pubDealWay')->comment('交易方式');
            $table->string('dealWayDesc')->comment('其他交易方式说明')->nullable();
            $table->unsignedInteger('ifBiddyn')->comment('是否采用动态报价')->nullable();
            $table->unsignedInteger('bidmode')->comment('报价方式')->nullable();
            $table->decimal('increase_range',26,6)->comment('加价幅度')->nullable();
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
        Schema::dropIfExists('transaction_modes');
    }
}
