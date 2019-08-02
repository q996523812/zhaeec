<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_leases', function (Blueprint $table) {
            $table->string('id');
            $table->string('wtf_name');//
            $table->string('wtf_qyxz');//
            $table->string('wtf_province');//
            $table->string('wtf_city');//
            $table->string('wtf_area');//
            $table->string('wtf_street');//
            $table->string('wtf_yb');//
            $table->string('wtf_fddbr');//
            $table->string('wtf_phone');//
            $table->string('wtf_fax');//
            $table->string('wtf_email');//
            $table->string('wtf_jt');//
            $table->string('wtf_dlr_name');//
            $table->string('wtf_dlr_phone');//
            $table->string('xmbh')->nullable();//
            $table->string('title');//
            $table->string('pzjg');//
            $table->text('bdgk');//
            $table->text('other')->nullable();//
            $table->datetime('gp_date_start')->nullable();//
            $table->datetime('gp_date_end')->nullable();//
            $table->string('sfhs');//
            $table->string('gpjg_sm')->nullable();//
            $table->decimal('gpjg_zj',26,6)->nullable();//
            $table->decimal('gpjg_dj',26,6)->nullable();//
            $table->unsignedInteger('zlqx');//
            $table->string('jymd');//
            $table->string('zclb');//
            $table->string('fbfs');//
            $table->string('zcsfsx');//
            $table->decimal('pgjz');//
            $table->string('jyfs');//
            $table->string('bjms');//
            $table->decimal('jjfd');//
            $table->string('jysj_bz');//
            $table->text('yxf_zgtj');//
            $table->text('yxdj_zlqd');//
            $table->datetime('bzj_jn_time_end')->nullable();//
            $table->decimal('bzj',26,6);//
            $table->string('jypt_lxfs')->nullable();//
            $table->text('notes')->nullable();//
            $table->string('fc_province')->nullable();//
            $table->string('fc_city')->nullable();//
            $table->string('fc_area')->nullable();//
            $table->string('fc_street')->nullable();//
            $table->string('fc_gn')->nullable();
            $table->string('fc_mj')->nullable();
            $table->string('fc_zjh')->nullable();
            $table->string('fc_zjjg')->nullable();
            $table->string('fc_ysynx')->nullable();
            $table->string('fc_ghyt')->nullable();
            $table->string('fc_sfyyzh')->nullable();
            $table->string('fc_jcsj')->nullable();
            $table->string('fc_dqyt')->nullable();
            $table->string('fc_yzh_yxq')->nullable();
            $table->unsignedInteger('status');

            $table->unsignedInteger('process')->default(11);
            $table->string('process_name')->nullable();//流程节点中文名称
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
        Schema::dropIfExists('project_leases');
    }
}
