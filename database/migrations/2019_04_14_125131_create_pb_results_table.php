<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePbResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pb_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_id')->nullable()->index();
            $table->string('xmbh')->nullable()->index();
            $table->string('title')->nullable()->index();
            $table->string('tbr')->nullable();
            $table->string('jjf')->nullable();
            $table->string('jsf')->nullable();
            $table->string('zf')->nullable();
            $table->decimal('tbbj',26,6)->nullable();
            $table->string('pm')->nullable();
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
        Schema::dropIfExists('pb_results');
    }
}
