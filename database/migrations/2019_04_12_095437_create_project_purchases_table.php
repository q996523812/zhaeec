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
            $table->string('wtf_name')->comment('委托方名称')->nullable();
            $table->string('wtf_qyxz')->comment('委托方企业性质')->nullable();
            $table->string('wtf_province')->comment('省')->nullable();
            $table->string('wtf_city')->comment('市')->nullable();
            $table->string('wtf_area')->comment('区')->nullable();
            $table->string('wtf_street')->comment('详细地址')->nullable();
            $table->string('wtf_yb')->comment('邮编')->nullable();
            $table->string('wtf_fddbr')->comment('法定代表人')->nullable();
            $table->string('wtf_phone')->comment('联系电话')->nullable();
            $table->string('wtf_fax')->comment('传真')->nullable();
            $table->string('wtf_email')->comment('邮箱')->nullable();
            $table->string('wtf_jt')->comment('所属集团')->nullable();
            $table->string('wtf_dlr_name')->comment('委托代理人名称')->nullable();
            $table->string('wtf_dlr_phone')->comment('委托代理人联系电话')->nullable();
            $table->string('xmbh')->comment('项目编号')->unique()->nullable();
            $table->string('title')->comment('标的名称')->nullable();
            $table->string('pzjg')->comment('挂牌交易批准机构')->nullable();
            $table->text('bdgk')->comment('标的概况')->nullable();
            $table->text('other')->comment('其它需要披露的事项')->nullable();
            $table->datetime('gp_date_start')->comment('挂牌开始日期')->nullable();
            $table->datetime('gp_date_end')->comment('挂牌结束日期')->nullable();
            $table->string('sfhs')->comment('是否含税')->nullable();
            $table->string('gpjg_sm')->comment('预算价格说明')->nullable();
            $table->decimal('gpjg_zj',26,6)->comment('预算价格')->nullable();
            $table->string('bdyx')->comment('项目(标的)意向')->nullable();
            $table->string('xmpz')->comment('项目配置类型')->nullable();
            $table->string('gq')->comment('工期')->nullable();
            $table->string('jyfs')->comment('交易方式')->nullable();
            $table->string('bjms')->comment('报价模式')->nullable();
            $table->decimal('jjfd',26,6)->comment('降价幅度')->nullable();
            $table->datetime('jy_date')->comment('交易（开标、谈判）时间')->nullable();
            $table->string('zbdl_lxfs')->comment('招标代理机构联系方式')->nullable();
            $table->text('yxf_zgtj')->comment('意向方资格条件')->nullable();
            $table->text('yxdj_zlqd')->comment('意向登记要求及资料清单')->nullable();
            $table->string('yxdj_sj')->comment('意向登记的时间')->nullable();
            $table->string('yxdj_fs')->comment('意向登记方式、招标文件价格')->nullable();
            $table->datetime('bzj_jn_time_end')->comment('交纳保证金截止时间')->nullable();
            $table->string('bzj')->comment('保证金金额(人民币) (万元)')->nullable();
            $table->string('zbwj_dj')->comment('投标文件递交时间及地点')->nullable();
            $table->string('jypt_lxfs')->comment('交易平台联系方式')->nullable();
            $table->text('notes')->comment('备注')->nullable();
            $table->unsignedInteger('status')->default(1);
            
            $table->unsignedInteger('process')->comment('流程节点代码')->default(11);
            $table->string('process_name')->comment('流程节点名称')->nullable();//流程节点中文名称
            $table->unsignedInteger('user_id')->comment('录入用户，即项目经理');
            // $table->foreign('user_id')->references('id')->on('admin_users');
            $table->string('project_id');
            // $table->foreign('project_id')->references('id')->on('projects');
            $table->string('sjly')->comment('数据来源')->nullable()->default('业务录入');


            $table->string('bzj_zhm')->comment('账户名')->nullable();
            $table->string('bzj_bank')->comment('开户行')->nullable();
            $table->string('bzj_zh')->comment('账号')->nullable();
                       
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
