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
            $table->unsignedInteger('type')->comment('意向方类型，1:法人、2:自然人');//意向方类型，1:法人、2:自然人
            $table->string('name')->comment('名称');//名称
            $table->string('id_type')->comment('证件类型');//证件类型
            $table->string('id_code')->comment('证件号码');//证件号码
            // $table->datetime('date_register');//登记时间
            $table->decimal('deposit')->comment('保证金')->nullable();//保证金
            $table->unsignedInteger('is_win')->comment('是否中标,0:否、1：是')->default(0);//是否中标,0:否、1：是

            $table->string('project_id');
            $table->unsignedInteger('status')->default(1);
            $table->unsignedInteger('process')->comment('//流程节点')->nullable();//流程节点
            $table->string('process_name')->comment('流程节点中文名称')->nullable();//流程节点中文名称
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
