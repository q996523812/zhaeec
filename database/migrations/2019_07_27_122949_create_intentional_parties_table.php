<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntentionalPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intentional_parties', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type');//意向方类型，1:法人、2:自然人
            $table->string('name');//名称
            $table->string('id_type');//证件类型
            $table->string('id_code');//证件号码
            // $table->datetime('date_register');//登记时间
            $table->decimal('deposit')->nullable();//保证金
            $table->unsignedInteger('is_win')->default(0);//是否中标,0:否、1：是

            $table->string('project_id');
            $table->unsignedInteger('status')->default(1);
            $table->unsignedInteger('process')->nullable();//流程节点
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
        Schema::dropIfExists('intentional_parties');
    }
}
