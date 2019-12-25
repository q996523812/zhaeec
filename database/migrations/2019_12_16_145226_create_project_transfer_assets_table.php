<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTransferAssetsTable extends Migration
{
    /**
     * 资产转让
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_transfer_assets', function (Blueprint $table) {
            $table->string('id');
            //基础信息
            $table->string('xmbh')->comment('项目编号');
            $table->string('title')->comment('项目名称');
            $table->decimal('gpjg',26,6)->comment('转让底价（万元）');
            $table->string('pauseText')->comment('产权隶属关系');
            $table->string('spare4',1000)->comment('合作机构信息');
            $table->string('proDesc',1000)->comment('项目概述');
            $table->unsignedInteger('isGzw')->comment('是否国资');
            $table->unsignedInteger('pauseTime')->comment('是否让公共资源采集');
            $table->unsignedInteger('proType')->comment('资产类型');
            $table->string('proProvince')->comment('标的所在地区-省');
            $table->string('proCity')->comment('标的所在地区-市');
            $table->string('proCounty')->comment('标的所在地区-县');
            $table->unsignedInteger('proSource')->comment('资产来源');

            //挂牌信息
            $table->unsignedInteger('pubDays')->comment('挂牌公告期（至少20个）');
            $table->datetime('gp_date_start')->comment('挂牌开始日期')->nullable();
            $table->datetime('gp_date_end')->comment('挂牌结束日期')->nullable();
            $table->unsignedInteger('pubDelayFlag')->comment('是否自动延牌');
            $table->unsignedInteger('delayBuyerSize')->comment('延牌条件（少于等于XX个意向方）');
            $table->unsignedInteger('delayMax')->comment('最长延长周期数');
            $table->unsignedInteger('delayPeroid')->comment('延牌周期（工作日，至少5个）');
            $table->unsignedInteger('ifBiddyn')->comment('是否采用动态报价');
            $table->unsignedInteger('pubDealWay')->comment('征集到两个以上受让方采用的交易方式');
            $table->string('dealWayDesc')->comment('其他交易方式说明');
            $table->unsignedInteger('bidmode')->comment('报价方式');

            //披露信息
            $table->unsignedInteger('allowEndPrio')->comment('优先权人是否放弃优先购买权');
            $table->unsignedInteger('unitTransferee')->comment('是否允许联合受让');
            $table->unsignedInteger('pub0')->comment('是否允许网上报名');

            //保证金交纳规则
            $table->decimal('pubBail',26,6)->comment('保证金金额（万元）');
            $table->unsignedInteger('bailStartFlag')->comment('保证金交纳时间');
            $table->unsignedInteger('pubBailType')->comment('保证金交纳截止时间要求');
            $table->unsignedInteger('pubBailDays')->comment(' XX个工作日17:00前有效(以银行到账时间为准)');
            $table->string('pubBailMethod')->comment('保证金交纳方式');
            $table->string('bail_account_code')->comment('账号');
            $table->string('bail_account_name')->comment('账户名称');
            $table->string('bail_account_bank')->comment('开户行');

            //交易条件
            $table->string('buyConditions',1000)->comment('受让方资格条件');
            $table->string('pubPayMode')->comment('价款支付方式');
            $table->string('payPeriodInfo',200)->comment('价款支付要求');
            $table->unsignedInteger('pub16')->comment('是否披露意向方应提交的附件材料');
            $table->text('important')->comment('重大事项及其他披露内容');
            $table->text('sellConditions')->comment('与转让相关的其他条件');
            $table->text('valueDesc',1000)->comment('保证内容');
            $table->text('pubBailMemo',1000)->comment('处置方法');

            $table->unsignedInteger('buyerAuditLevel')->comment('受让审核级别');
            
            //其他
            $table->unsignedInteger('is_examination')->comment('是否联合资格审查')->default(2);

            $table->string('pre_listing_id')->comment('预挂牌ID')->nullable();
            $table->string('project_id')->comment('项目总表ID');
            $table->unsignedInteger('process')->comment('流程节点代码')->default(111);
            $table->string('process_name')->comment('流程节点名称')->nullable();//流程节点中文名称
            $table->unsignedInteger('user_id')->comment('录入用户，即项目经理');
            $table->unsignedInteger('status');
            $table->unsignedInteger('date_type')->comment('挂牌日期类型：1：工作日、2：日历日')->default(1);
            $table->unsignedInteger('is_member_in')->comment('是否会员带入：1：是（会员带入）、2：否（自有项目）')->default(2);
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
        Schema::dropIfExists('project_transfer_assets');
    }
}
