<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJgptProjectPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jgpt_project_purchases', function (Blueprint $table) {
            $table->string('id');
            $table->string('jgpt_key')->nullable();
            $table->string('wtf_name')->nullable();
            $table->string('wtf_qyxz')->nullable();
            $table->string('wtf_province')->nullable();
            $table->string('wtf_city')->nullable();
            $table->string('wtf_area')->nullable();
            $table->string('wtf_street')->nullable();
            $table->string('wtf_yb')->nullable();
            $table->string('wtf_fddbr')->nullable();
            $table->string('wtf_phone')->nullable();
            $table->string('wtf_fax')->nullable();
            $table->string('wtf_email')->nullable();
            $table->string('wtf_jt')->nullable();
            $table->string('wtf_dlr_name')->nullable();
            $table->string('wtf_dlr_phone')->nullable();
            $table->string('xmbh')->nullable()->nullable();
            $table->string('title')->nullable();
            $table->string('pzjg')->nullable();
            $table->text('bdgk')->nullable();
            $table->text('other')->nullable()->nullable();
            $table->datetime('gp_date_start')->nullable();
            $table->datetime('gp_date_end')->nullable();
            $table->string('sfhs')->nullable();
            $table->string('gpjg_sm')->nullable();
            $table->decimal('gpjg_zj',26,6)->nullable();
            $table->string('bdyx')->nullable();
            $table->string('xmpz')->nullable();
            $table->string('gq')->nullable();
            $table->string('jyfs')->nullable();
            $table->string('bjms')->nullable();
            $table->decimal('jjfd',26,6)->nullable();
            $table->datetime('jy_date')->nullable();
            $table->string('zbdl_lxfs')->nullable();
            $table->string('yxf_zgtj')->nullable();
            $table->string('yxdj_zlqd')->nullable();
            $table->string('yxdj_sj')->nullable();
            $table->string('yxdj_fs')->nullable();
            $table->datetime('bzj_jn_time_end')->nullable();
            $table->string('bzj')->nullable();
            $table->string('zbwj_dj')->nullable();
            $table->string('jypt_lxfs')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('status');
            $table->string('detail_id')->nullable();//对应的业务表ID
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
        Schema::dropIfExists('jgpt_project_purchases');
    }
}
