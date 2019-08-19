<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJgptProjectLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jgpt_project_leases', function (Blueprint $table) {
            $table->string('id');
            $table->string('jgpt_key');
            $table->string('wtf_name');
            $table->string('wtf_qyxz');
            $table->string('wtf_province');
            $table->string('wtf_city');
            $table->string('wtf_area');
            $table->string('wtf_street');
            $table->string('wtf_yb');
            $table->string('wtf_fddbr');
            $table->string('wtf_phone');
            $table->string('wtf_fax');
            $table->string('wtf_email');
            $table->string('wtf_jt');
            $table->string('wtf_dlr_name');
            $table->string('wtf_dlr_phone');
            $table->string('xmbh')->nullable();
            $table->string('title');
            $table->string('pzjg');
            $table->text('bdgk');
            $table->text('other')->nullable();
            $table->datetime('gp_date_start')->nullable();
            $table->datetime('gp_date_end')->nullable();
            $table->string('sfhs');
            $table->string('gpjg_sm')->nullable();
            $table->decimal('gpjg_zj',26,6)->nullable();
            $table->decimal('gpjg_dj',26,6)->nullable();
            $table->unsignedInteger('zlqx');
            $table->string('jymd');
            $table->string('zclb');
            $table->string('fbfs');
            $table->string('zcsfsx');
            $table->decimal('pgjz',26,6);
            $table->string('jyfs');
            $table->string('bjms');
            $table->decimal('jjfd',26,6);
            $table->string('jysj_bz');
            $table->string('yxf_zgtj');
            $table->string('yxdj_zlqd');
            $table->datetime('bzj_jn_time_end')->nullable();
            $table->decimal('bzj',26,6);
            $table->string('jypt_lxfs')->nullable();
            $table->text('notes')->nullable();
            $table->string('fc_province')->nullable();
            $table->string('fc_city')->nullable();
            $table->string('fc_area')->nullable();
            $table->string('fc_street')->nullable();
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
        Schema::dropIfExists('jgpt_project_leases');
    }
}
