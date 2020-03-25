<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_lists', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('project_type')->comment('项目类型');
            $table->string('information_name')->comment('要求的材料名称');
            $table->string('information_type')->comment('要求的材料类型,存储中文，可多选，1：原件、2：复印件、3：电子版')->nullable();
            $table->unsignedInteger('applicable_party')->comment('附件适用方，1：委托方附件、2：意向方附件）')->nullable();
            $table->unsignedInteger('applicable_person')->comment('附件适用人，0:全部、1:自然人、2:法人')->nullable();
            $table->string('memo')->comment('说明')->nullable();
            $table->string('path')->comment('模板文件地址')->nullable();
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
        Schema::dropIfExists('information_lists');
    }
}
