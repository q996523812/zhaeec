<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id');
            $table->string('xmbh')->unique();
            $table->string('title');
            $table->string('type');
            $table->decimal('price', 26, 6)->nullable();
            $table->datetime('gp_date_start')->nullable();
            $table->datetime('gp_date_end')->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->unsignedInteger('djl')->default(0);
            $table->unsignedInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('admin_users');
            $table->string('detail_id');  
            $table->unsignedInteger('process');
            $table->string('process_name')->nullable();//流程节点中文名称
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
        Schema::dropIfExists('projects');
    }
}
