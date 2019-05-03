<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->string('id');
            $table->string('project_id');
            // $table->foreign('project_id')->references('id')->on('projects');
            $table->unsignedTinyInteger('type')->default(1);
            $table->string('path')->nullable();
            $table->string('name')->nullable();
            $table->boolean('is_show_on_web')->default(false);
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
        Schema::dropIfExists('files');
    }
}
