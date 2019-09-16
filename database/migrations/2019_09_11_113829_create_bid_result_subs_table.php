<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidResultSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_result_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bid_result_id')->nullable()->index();
            $table->string('xmbh')->nullable()->index();
            $table->string('title')->nullable()->index();
            $table->string('tbr')->nullable();
            $table->string('jjf')->nullable();
            $table->string('jsf')->nullable();
            $table->string('zf')->nullable();
            $table->decimal('tbbj',26,6)->nullable();
            $table->string('pm')->nullable();
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
        Schema::dropIfExists('bid_result_subs');
    }
}
