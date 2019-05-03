<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkProcessNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_process_nodes', function (Blueprint $table) {
            $table->string('id');
            $table->string('work_process_id');
            // $table->foreign('work_process_id')->references('id')->on('work_processes');
            $table->string('code');
            $table->string('name');
            $table->unsignedInteger('seq');
            $table->unsignedInteger('role_id');
            $table->string('jurisdiction')->nullable();
            $table->string('back_node_code')->nullable();
            $table->string('next_node_code')->nullable();
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
        Schema::dropIfExists('work_process_nodes');
    }
}
