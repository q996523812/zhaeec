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
            $table->string('wtf_name')->comment('委托方名称');//委托方名称
            $table->string('wtf_qyxz')->comment('企业性质');//企业性质
            $table->string('wtf_province')->comment('省');//
            $table->string('wtf_city')->comment('市')->nullable();//
            $table->string('wtf_area')->comment('区')->nullable();//
            $table->string('wtf_street')->comment('详细地址');//
            $table->string('wtf_yb')->comment('邮编');//
            $table->string('wtf_fddbr')->comment('法定代表人');//
            $table->string('wtf_phone')->comment('联系电话');//
            $table->string('wtf_fax')->comment('传真');//
            $table->string('wtf_email')->comment('邮箱');//
            $table->string('wtf_jt')->comment('所属集团');//
            $table->string('wtf_dlr_name')->comment('委托代理人名称');//
            $table->string('wtf_dlr_phone')->comment('委托代理人联系电话');//
            $table->string('xmbh')->comment('项目编号')->unique()->nullable();//
            $table->string('title')->comment('标的名称');//
            $table->string('pzjg')->comment('挂牌交易批准机构');//
            $table->text('bdgk')->comment('项目(标的)概况');//
            $table->text('other')->comment('其它需要披露的事项')->nullable();//
            $table->datetime('gp_date_start')->comment('公告开始日期')->nullable();//
            $table->datetime('gp_date_end')->comment('公告结束日期')->nullable();//
            $table->string('sfhs')->comment('是否含税');//
            $table->string('gpjg_sm')->comment('租金说明')->nullable();//
            $table->decimal('gpjg_zj',26,6)->comment('总租金')->nullable();//
            $table->decimal('gpjg_dj',26,6)->comment('月租金/单价')->nullable();//
            $table->unsignedInteger('zlqx')->comment('租赁期限（月限）');//
            $table->string('jymd')->comment('交易目的');//
            $table->string('zclb')->comment('资产类别');//
            $table->string('fbfs')->comment('信息发布方式');//
            $table->string('zcsfsx')->comment('交易资产中是否存在权利受到限制的情形');//
            $table->decimal('pgjz',26,6)->comment('标的资产评估值(人民币)元');//
            $table->string('jyfs')->comment('交易方式');//
            $table->string('bjms')->comment('报价模式');//
            $table->decimal('jjfd',26,6)->comment('加价幅度');//
            $table->string('jysj_bz')->comment('交易时间备注');//
            $table->text('yxf_zgtj')->comment('意向方资格条件');//
            $table->text('yxdj_zlqd')->comment('意向登记要求及资料清单');//
            $table->datetime('bzj_jn_time_end')->comment('报名资料提交及交纳竞标保证金截止时间')->nullable();//
            $table->decimal('bzj',26,6)->comment('竞标保证金金额(人民币) (万元)');//
            $table->string('jypt_lxfs')->comment('交易平台联系方式')->nullable();//
            $table->text('notes')->comment('备注')->nullable();//
            $table->string('fc_province')->comment('省')->nullable();//
            $table->string('fc_city')->comment('市')->nullable();//
            $table->string('fc_area')->comment('区')->nullable();//
            $table->string('fc_street')->comment('详细地址')->nullable();//
            $table->string('fc_gn')->comment('功能')->nullable();
            $table->string('fc_mj')->comment('面积')->nullable();
            $table->string('fc_zjh')->comment('房产证号')->nullable();
            $table->string('fc_zjjg')->comment('建筑结构')->nullable();
            $table->string('fc_ysynx')->comment('已使用年限')->nullable();
            $table->string('fc_ghyt')->comment('规划用途')->nullable();
            $table->string('fc_sfyyzh')->comment('是否有原租户')->nullable();
            $table->string('fc_jcsj')->comment('建成时间')->nullable();
            $table->string('fc_dqyt')->comment('当前用途')->nullable();
            $table->string('fc_yzh_yxq')->comment('原租户是否享有优先权')->nullable();
            $table->unsignedInteger('status');

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
        Schema::dropIfExists('project_leases');
    }
}
