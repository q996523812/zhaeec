<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCapitalIncreasesTable extends Migration
{
    /**
     * 增资扩股
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_capital_increases', function (Blueprint $table) {
            $table->string('id');
            //基础信息
            $table->string('xmbh')->comment('项目编号');
            $table->string('title')->comment('项目名称');
            $table->string('pauseText')->comment('产权隶属关系');
            $table->unsignedInteger('isGzw')->comment('是否国有');
            $table->decimal('gpjg',26,6)->comment('拟公开募集资金总额(万元)-最低');
            $table->decimal('proPriceMax',26,6)->comment('拟公开募集资金总额(万元)-最高')->nullable();
            $table->text('planPriceDesc')->comment('拟公开募集资金总额说明')->nullable();

            $table->decimal('sellPercent1',26,6)->comment('拟公开募集资金对应持股比例(%)-最低');
            $table->decimal('sellPercent2',26,6)->comment('拟公开募集资金对应持股比例(%)-最高')->nullable();
            $table->text('planPercentDesc')->comment('拟公开募集资金对应持股比例(%)说明')->nullable();

            $table->decimal('sellNum1',26,6)->comment('拟公开募集资金对应股份数(股)-最低')->nullable();
            $table->decimal('sellNum2',26,6)->comment('拟公开募集资金对应股份数(股)-最高')->nullable();
            $table->text('proExt2')->comment('拟公开募集资金对应股份数(股)说明')->nullable();

            $table->decimal('spare21',26,6)->comment('拟新增注册资本(万元)-最低')->nullable();
            $table->decimal('spare22',26,6)->comment('拟新增注册资本(万元)-最高')->nullable();
            $table->text('announceMedia')->comment('拟新增注册资本(万元)说明')->nullable();

            $table->decimal('spare91',26,6)->comment('拟公开征集投资方数量(个)-最低');
            $table->decimal('spare92',26,6)->comment('拟公开征集投资方数量(个)-最高')->nullable();
            $table->text('planBuyersDesc')->comment('拟公开征集投资方数量(个)说明')->nullable();

            $table->string('pub_moneyFor',600)->comment('募集资金用途');
            $table->unsignedInteger('pub_holderIn')->comment('原股东是否有投资意向');
            $table->unsignedInteger('pub_buyerPaperFlag')->comment('企业管理层或员工是否有投资意向');
            $table->string('pub_valueDesc',1000)->comment('专业机构推荐意见')->nullable();

            //挂牌信息
            $table->unsignedInteger('pubDays')->comment('挂牌公告期（至少20个）');
            $table->datetime('gp_date_start')->comment('挂牌开始日期')->nullable();
            $table->datetime('gp_date_end')->comment('挂牌结束日期')->nullable();
            $table->unsignedInteger('delayMax')->comment('最长延长周期数')->nullable();
            $table->unsignedInteger('delayPeroid')->comment('延牌周期（工作日，至少5个）')->nullable();
            $table->string('pub10')->comment('未征集到意向投资方')->default('在融资方同意的情况下');
            $table->unsignedInteger('pubDelayFlag')->comment('未征集到意向投资方的延牌类型');
            $table->string('pub7')->comment('征集到意向投资方')->default('但未达到募集资金总额');
            $table->unsignedInteger('pub1')->comment('征集到意向投资方的延牌类型');
            $table->string('pub2')->comment('信息发布终结 说明');
            $table->string('pub3')->comment('延长信息发布 说明');
            $table->string('pub8')->comment('征集到意向投资方')->default('且达到募集资金总额');
            $table->string('pub9')->comment('征集到意向投资方 信息发布终结，说明')->default('信息发布终结并组织遴选');
            $table->unsignedInteger('delayFlag')->comment('是否无限期延牌');

            //披露信息
            $table->unsignedInteger('unitTransferee')->comment('是否允许联合受让');
            $table->unsignedInteger('pub0')->comment('是否允许网上报名');

            //保证金交纳规则
            $table->decimal('pubBail',26,6)->comment('保证金 金额（万元）/比例');
            $table->unsignedInteger('bailStartFlag')->comment('保证金交纳时间');
            $table->unsignedInteger('pubBailType')->comment('保证金交纳截止时间要求');
            $table->unsignedInteger('pubBailDays')->comment(' XX个工作日17:00前有效(以银行到账时间为准)')->nullable();
            $table->string('pubBailMethod')->comment('保证金交纳方式')->nullable();
            $table->string('bail_account_code')->comment('账号');
            $table->string('bail_account_name')->comment('账户名称');
            $table->string('bail_account_bank')->comment('开户行');
            $table->unsignedInteger('pubBailCtrl')->comment('保证金收取方式')->nullable();
            $table->string('pubBailMemo',1000)->comment('保证金处置方式');
            $table->string('valueDesc',1000)->comment('保证内容')->nullable();

            //交易条件
            $table->string('buyConditions',1000)->comment('受让方资格条件');
            $table->string('pubPayMode')->comment('价款支付方式');
            $table->string('payPeriodInfo',200)->comment('价款支付要求')->nullable();
            $table->unsignedInteger('pub16')->comment('是否披露意向方应提交的附件材料')->nullable();
            $table->text('important')->comment('重大事项及其他披露内容/对增资有重大影响的信息')->nullable();

            //遴选方式
            $table->string('pubDealWay')->comment('遴选方式');
            $table->string('dealWayDesc')->comment('遴选方式 其他')->nullable();
            $table->text('pubDesc')->comment('遴选方案')->nullable();
            $table->text('spare4')->comment('其他披露事项')->nullable();
            $table->string('addMoneyPlan',300)->comment('增资方案主要内容');
            $table->text('sellConditions')->comment('增资条件')->nullable();
            $table->text('dealConditions')->comment('交易达成条件')->nullable();
            $table->string('pub15')->comment('增资后（拟）股权结构描述')->nullable();
            
            //其他
            $table->unsignedInteger('is_examination')->comment('是否联合资格审查')->default(1);

            $table->string('pre_listing_id')->comment('预挂牌ID')->nullable();
            $table->string('project_id')->comment('项目总表ID');
            $table->unsignedInteger('process')->comment('流程节点代码')->default(111);
            $table->string('process_name')->comment('流程节点名称')->nullable();//流程节点中文名称
            $table->unsignedInteger('user_id')->comment('录入用户，即项目经理');
            $table->unsignedInteger('status');
            $table->unsignedInteger('date_type')->comment('挂牌日期类型：1：工作日、2：日历日')->default(1);
            $table->unsignedInteger('is_member_in')->comment('是否会员带入：1：是（会员带入）、2：否（自有项目）')->default(1);
            $table->string('customer_id')->comment('会员表ID')->nullable();

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
        Schema::dropIfExists('project_capital_increases');
    }
}
