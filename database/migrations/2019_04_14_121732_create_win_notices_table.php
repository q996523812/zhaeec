<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('win_notices', function (Blueprint $table) {
            $table->string('id');
            $table->string('project_id')->nullable()->index();
            $table->string('type')->nullable();//项目类型
            $table->string('tzsbh')->nullable();//通知书编号
            $table->string('xmbh')->nullable()->index();//项目编号
            $table->string('title')->nullable()->index();//项目名称
            $table->string('zbnr')->nullable();//中标内容
            $table->string('zbr')->nullable();//中标人（受让方）
            $table->string('zbf_phone')->nullable();//受让方手机号
            $table->string('zbf_lx_1')->nullable();//受让方类型(国有控股、国有参股。。。)
            $table->string('zbf_lx_2')->nullable();//受让方类型（股份公司、有限责任公司。。。）
            $table->datetime('jysj')->nullable();//交易时间
            $table->decimal('cjj_zj')->nullable()->index();//成交总价
            $table->decimal('cjj_dj')->nullable()->index();//成交单价
            $table->string('cjj_bz')->nullable();//成交价备注
            $table->string('jyfs')->nullable();//交易方式
            $table->string('jycd')->nullable();//交易场地
            $table->string('zbf_qy')->nullable();//中标方所属区域
            $table->unsignedInteger('zbhyq')->nullable();//中标后要求：在XXX个工作日签订合同
            $table->unsignedInteger('tzs_fs')->nullable();//此通知一式XXX份
            $table->unsignedInteger('tzs_fs_1')->nullable();//转让方/委托方XXX份
            $table->unsignedInteger('tzs_fs_2')->nullable();//受让方/中标方XXX份
            $table->unsignedInteger('tzs_fs_3')->nullable();//珠海产权XXX份
            $table->unsignedInteger('tzs_fs_4')->nullable();//其他XXX分
            $table->text('notes')->nullable();//备注
            $table->datetime('issue_time')->nullable();//交易机构盖章及签发时间
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
