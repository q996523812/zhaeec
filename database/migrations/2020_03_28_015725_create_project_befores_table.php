<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectBeforesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_befores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            //基础信息
            $table->string('xmbh')->comment('项目编号');
            $table->string('title')->comment('项目名称');
            $table->decimal('gpjg',26,6)->comment('转让底价（万元）');
            $table->decimal('bidPrice',26,6)->comment('债权金额（万元）')->nullable();
            $table->decimal('sellPercent',26,6)->comment('拟转让比例（总）%')->nullable();
            $table->unsignedInteger('proExt1')->comment('拟转让股份数（总）')->nullable();
            $table->unsignedInteger('ifControlTrans')->comment('是否导致转让标的企业的实际控制权发生转移')->nullable();
            $table->string('pauseText')->comment('产权隶属关系')->nullable();
            $table->text('spare4')->comment('合作机构信息')->nullable();
            $table->text('proDesc')->comment('项目概述')->nullable();
            $table->unsignedInteger('pauseTime')->comment('是否让公共资源采集')->nullable();
            
            //挂牌信息
            $table->unsignedInteger('pubDays')->comment('挂牌公告期（至少20个）')->nullable();
            $table->datetime('gp_date_start')->comment('挂牌开始日期')->nullable();
            $table->datetime('gp_date_end')->comment('挂牌结束日期')->nullable();
            $table->unsignedInteger('pubDelayFlag')->comment('是否自动延牌')->nullable();
            $table->unsignedInteger('delayBuyerSize')->comment('延牌条件（少于等于XX个意向方）')->nullable();
            $table->unsignedInteger('delayMax')->comment('最长延长周期数')->nullable();
            $table->unsignedInteger('delayPeroid')->comment('延牌周期（工作日，至少5个）')->nullable();
            $table->unsignedInteger('ifBiddyn')->comment('是否采用动态报价')->nullable();
            $table->unsignedInteger('pubDealWay')->comment('征集到两个以上受让方采用的交易方式')->nullable();
            $table->string('dealWayDesc')->comment('其他交易方式说明')->nullable();
            $table->unsignedInteger('bidmode')->comment('报价方式')->nullable();
            $table->text('pubDesc')->comment('权重报价或招投标实施方案主要内容')->nullable();

            //披露信息
            $table->unsignedInteger('holderIn')->comment('企业管理层是否参与受让')->nullable();
            $table->unsignedInteger('allowEndPrio')->comment('标的企业原股东是否放弃优先受让权')->nullable();
            $table->string('announceWay')->comment('披露方式')->nullable();
            $table->string('announceMedia')->comment('披露媒体')->nullable();
            $table->unsignedInteger('unitTransferee')->comment('是否允许联合受让')->nullable();
            $table->unsignedInteger('pub0')->comment('是否允许网上报名')->nullable();

            //保证金交纳规则
            $table->decimal('pubBail',26,6)->comment('保证金金额（万元）')->nullable();
            $table->unsignedInteger('bailStartFlag')->comment('保证金交纳时间')->nullable();
            $table->unsignedInteger('pubBailType')->comment('保证金交纳截止时间要求')->nullable();
            $table->unsignedInteger('pubBailDays')->comment(' XX个工作日17:00前有效(以银行到账时间为准)')->nullable();
            $table->string('pubBailMethod')->comment('保证金交纳方式')->nullable();
            $table->string('bail_account_code')->comment('账号')->nullable();
            $table->string('bail_account_name')->comment('账户名称')->nullable();
            $table->string('bail_account_bank')->comment('开户行')->nullable();

            //交易条件
            $table->text('buyConditions')->comment('受让方资格条件')->nullable();
            $table->string('pubPayMode')->comment('价款支付方式')->nullable();
            $table->text('payPeriodInfo')->comment('价款支付要求')->nullable();
            $table->unsignedInteger('pub16')->comment('是否披露意向方应提交的附件材料')->nullable();
            $table->text('important')->comment('重大事项及其他披露内容')->nullable();
            $table->text('sellConditions')->comment('与转让相关的其他条件')->nullable();
            $table->text('valueDesc')->comment('保证内容')->nullable();
            $table->text('pubBailMemo')->comment('处置方法')->nullable();

            //其他
            $table->unsignedInteger('is_examination')->comment('是否联合资格审查')->default(1);

            $table->unsignedInteger('sfqzypl')->comment('是否强制预披露');
            
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
        Schema::dropIfExists('project_befores');
    }
}
