<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinNoticesTable extends Migration
{
    /**
     * 中标通知
     *
     * @return void
     */
    public function up()
    {
        Schema::create('win_notices', function (Blueprint $table) {
            $table->string('id');
            $table->string('project_id')->nullable()->index();
            $table->string('type')->comment('项目类型')->nullable();//项目类型
            $table->string('tzsbh')->comment('通知书编号')->nullable();//通知书编号
            $table->string('xmbh')->comment('项目编号')->nullable()->index();//项目编号
            $table->string('title')->comment('项目名称')->nullable()->index();//项目名称
            $table->datetime('gp_date_start')->comment('挂牌开始时间')->nullable();
            $table->datetime('gp_date_end')->comment('挂牌结束时间')->nullable();

            /**资产租赁**/
            $table->unsignedInteger('zlqx')->comment('租赁期限（月限）')->nullable();


            $table->string('zbnr')->comment('中标内容')->nullable();//中标内容
            $table->string('zbr')->comment('中标人（受让方）')->nullable();//中标人（受让方）
            $table->string('zbf_phone')->comment('受让方手机号')->nullable();//受让方手机号
            $table->string('zbf_lx_1')->comment('受让方类型(国有控股、国有参股。。。)')->nullable();//受让方类型(国有控股、国有参股。。。)
            $table->string('zbf_lx_2')->comment('受让方类型（股份公司、有限责任公司。。。）')->nullable();//受让方类型（股份公司、有限责任公司。。。）
            $table->datetime('jysj')->comment('交易时间')->nullable();//交易时间
            $table->decimal('jydj',26,6)->comment('挂牌底价')->nullable()->index();//成交总价
            $table->decimal('cjj_zj',26,6)->comment('成交总价')->nullable()->index();//成交总价
            $table->decimal('cjj_dj',26,6)->comment('成交单价')->nullable()->index();//成交单价
            $table->string('cjj_bz')->comment('成交价备注')->nullable();//成交价备注
            $table->string('jyfs')->comment('交易方式')->nullable();//交易方式
            $table->string('jycd')->comment('交易场地')->nullable();//交易场地
            $table->string('zbf_qy')->comment('中标方所属区域')->nullable();//中标方所属区域
            $table->unsignedInteger('zbhyq')->comment('中标后要求：在XXX个工作日签订合同')->nullable();//中标后要求：在XXX个工作日签订合同
            $table->unsignedInteger('tzs_fs')->comment('此通知一式XXX份')->nullable();//此通知一式XXX份
            $table->unsignedInteger('tzs_fs_1')->comment('转让方/委托方XXX份')->nullable();//转让方/委托方XXX份
            $table->unsignedInteger('tzs_fs_2')->comment('受让方/中标方XXX份')->nullable();//受让方/中标方XXX份
            $table->unsignedInteger('tzs_fs_3')->comment('珠海产权XXX份')->nullable();//珠海产权XXX份
            $table->unsignedInteger('tzs_fs_4')->comment('其他XXX分')->nullable();//其他XXX分
            $table->text('notes')->comment('备注')->nullable();//备注
            $table->datetime('issue_time')->comment('交易机构盖章及签发时间')->nullable();//交易机构盖章及签发时间
            $table->string('file_path')->nullable();//           
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
        Schema::dropIfExists('win_notices');
    }
}
