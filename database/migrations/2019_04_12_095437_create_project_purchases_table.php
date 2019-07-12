<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_purchases', function (Blueprint $table) {
            $table->string('id');
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
            $table->text('yxdj_zlqd')->nullable();
            $table->string('yxdj_sj')->nullable();
            $table->string('yxdj_fs')->nullable();
            $table->datetime('bzj_jn_time_end')->nullable();
            $table->string('bzj')->nullable();
            $table->string('zbwj_dj')->nullable();
            $table->string('jypt_lxfs')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('status')->default(1);
            
            $table->unsignedInteger('process')->default(1);
            $table->unsignedInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('admin_users');
            $table->string('project_id');
            // $table->foreign('project_id')->references('id')->on('projects');
            $table->string('sjly')->nullable()->default('业务录入');


            $table->string('bzj_zhm')->nullable();
            $table->string('bzj_bank')->nullable();
            $table->string('bzj_zh')->nullable();
                        
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
        Schema::dropIfExists('project_purchases');
    }
}
