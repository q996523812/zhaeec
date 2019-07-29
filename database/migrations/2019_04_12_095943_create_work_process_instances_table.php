<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkProcessInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_process_instances', function (Blueprint $table) {
            $table->string('id');
            $table->string('code');
            $table->string('work_process_id');
            $table->string('work_process_node_id');
            // $table->string('project_id');
            $table->string('table_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->string('next_work_process_node_id')->nullable();
            $table->unsignedInteger('next_user_id')->nullable();
            $table->unsignedInteger('next_role_id')->nullable();
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
        Schema::dropIfExists('work_process_instances');
    }
}
