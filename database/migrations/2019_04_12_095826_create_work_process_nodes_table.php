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
            $table->string('work_process_id')->comment('流程ID');
            // $table->foreign('work_process_id')->references('id')->on('work_processes');
            $table->string('sub_process_code')->comment('子流程代码')->nullable();
            $table->string('code')->comment('节点代码');
            $table->string('name')->comment('节点名称');
            $table->unsignedInteger('seq')->comment('顺序号');
            $table->unsignedInteger('role_id')->comment('审批角色')->nullable();
            $table->string('jurisdiction')->nullable();
            $table->string('back_node_code')->comment('上一个节点，用于退回，目前直接退回到业务员')->nullable();
            $table->string('next_node_code')->comment('下一个节点')->nullable();
            $table->unsignedInteger('sub_end')->comment('子流程是否结束，1：是，2：否');
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
