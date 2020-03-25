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
            // $table->string('project_id');
            $table->string('filetable_id');
            // $table->foreign('project_id')->references('id')->on('projects');
            /*附件类型
             *1：项目文件，与项目主表project表关联，
             *2：意向方文件，与意向方表IntentionalParties表关联
             *3：
            */
            // $table->unsignedTinyInteger('type')->default(1);
            $table->string('filetable_type');

            $table->string('path')->nullable();
            $table->string('name')->nullable();
            $table->boolean('is_show_on_web')->default(false);
            $table->string('information_lists_id')->nullable();
            $table->string('received_information_type')->comment('收到的材料类型,存储中文，可多选，1：原件、2：复印件、3：电子版')->nullable();
            $table->unsignedInteger('applicable_person')->comment('附件适用人，0:全部、1:自然人、2:法人')->nullable();
            $table->unsignedInteger('applicable_party')->comment('附件适用方，1：委托方附件、2：意向方附件）')->nullable();
            

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
