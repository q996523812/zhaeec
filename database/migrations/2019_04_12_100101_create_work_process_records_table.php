<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkProcessRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_process_records', function (Blueprint $table) {
            $table->string('id');
            // $table->string('project_id');
            $table->string('table_id');
            $table->string('work_process_instance_id');
            $table->string('work_process_node_name');
            $table->unsignedInteger('user_id');
            $table->string('operation')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('work_process_records');
    }
}
