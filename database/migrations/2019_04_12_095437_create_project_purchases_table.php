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
            /*
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
            */
            $table->unsignedInteger('sfjc')->comment('采购项目类型/是否进场：1、实质性进场(是)；2、仅挂牌(否)')->nullable();
            $table->string('xmbh')->comment('项目编号')->unique()->nullable();
            $table->string('title')->comment('标的名称')->nullable();
            $table->string('pzjg')->comment('挂牌交易批准机构')->nullable();
            $table->text('bdgk')->comment('标的概况')->nullable();
            $table->text('other')->comment('其它需要披露的事项')->nullable();
            $table->unsignedInteger('gpqx')->comment('挂牌期限')->nullable();
            $table->unsignedInteger('pubDays')->comment('挂牌公告期（至少20个工作日）');
            $table->datetime('gp_date_start')->comment('挂牌开始日期')->nullable();
            $table->datetime('gp_date_end')->comment('挂牌结束日期')->nullable();
            $table->string('sfhs')->comment('是否含税')->nullable();
            $table->string('gpjg_sm')->comment('预算价格说明')->nullable();
            $table->decimal('gpjg',26,6)->comment('预算价格（总价）')->nullable();
            $table->string('bdyx')->comment('项目(标的)意向')->nullable();
            $table->string('xmpz')->comment('项目配置类型')->nullable();
            $table->string('gq')->comment('工期')->nullable();

            $table->string('yxfsl_0')->comment('意向登记期满，如没有征集到符合条件的意向受让方')->nullable();
            $table->string('yxfsl_0_desc')->comment('不变更信息公告内容，按照不少于5个工作日为一个周期延长挂牌。')->nullable();
            $table->string('yxfsl_1')->comment('意向登记期满，如只征集到1个符合条件的意向方')->nullable();
            $table->string('yxfsl_1_desc')->comment('按挂牌价格与意向方报价孰低原则成交。')->nullable();
            $table->string('yxfsl_2')->comment('意向登记期满，征集到不少于3个符合条件的意向方')->nullable();
            $table->string('jyfs')->comment('意向登记期满，征集到不少于3个符合条件的意向方时，采取的交易方式')->nullable();
            $table->string('bjms')->comment('报价模式')->nullable();
            $table->decimal('jjfd',26,6)->comment('报价幅度/降价幅度')->nullable();
            $table->string('quotationRangeDesc')->comment('报价幅度说明')->nullable();
            $table->unsignedInteger('jjdw')->comment('竞价单位：价格（元）、比例（%）')->nullable();
            $table->unsignedInteger('pubDelayFlag')->comment('是否自动延牌')->nullable();
            // $table->unsignedInteger('delayBuyerSize')->comment('延牌条件（少于等于XX个意向方）')->nullable();
            $table->unsignedInteger('delayMax')->comment('最长延长周期数')->nullable();
            $table->unsignedInteger('delayPeroid')->comment('延牌周期（工作日，至少5个）')->nullable();
            

            $table->datetime('jy_date')->comment('交易（开标、谈判）时间')->nullable();
            $table->string('zbdl_lxfs')->comment('招标代理机构联系方式')->nullable();
            $table->datetime('zbwj_dj_time_start')->comment('投标文件递交时间起')->nullable();
            $table->datetime('zbwj_dj_time_end')->comment('投标文件递交时间止')->nullable();
            $table->string('zbwj_dj_address')->comment('投标文件递交地点')->nullable();
            $table->decimal('zbwjjg',26,6)->comment('招标文件价格')->nullable();
            $table->string('zbwjjgbz')->comment('招标文件价格备注')->nullable();
            $table->text('yxf_zgtj')->comment('意向方资格条件')->nullable();
            $table->text('yxdj_zlqd')->comment('意向登记要求及资料清单')->nullable();
            $table->string('yxdj_sj_start')->comment('意向登记的时间起')->nullable();
            $table->string('yxdj_sj_end')->comment('意向登记的时间止')->nullable();
            $table->text('yxdj_fs')->comment('意向登记方式')->nullable();
            $table->datetime('bzj_jn_time_end')->comment('交纳保证金截止时间')->nullable();
            $table->string('bzj')->comment('保证金金额(人民币) (万元)')->nullable();
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
            $table->unsignedInteger('date_type')->comment('挂牌日期类型：1：工作日、2：日历日')->default(1);
            $table->unsignedInteger('is_member_in')->comment('是否会员带入：1：是（会员带入）、2：否（自有项目）')->default(1);
            $table->string('customer_id')->comment('会员表ID')->nullable();

            $table->unsignedInteger('is_examination')->comment('是否联合资格审查')->default(2);

            $table->string('bail_account_code')->comment('账户名')->nullable();
            $table->string('bail_account_name')->comment('开户行')->nullable();
            $table->string('bail_account_bank')->comment('账号')->nullable();
           
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
