<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedProjectcodeData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $records = [
            [
                'type' => '采购项目实质进场业务',
                'template' => 'ZHAEEC*CGJ',
                'pointer' => 1,
                'year' => 2019,
            ],
            [
                'type' => '采购项目信息公示业务',
                'template' => 'ZHAEEC*CG',
                'pointer' => 1,
                'year' => 2019,
            ],
            [
                'type' => '经营权出让业务信息公示',
                'template' => 'ZHAEEC*CR',
                'pointer' => 1,
                'year' => 2019,
            ],
            [
                'type' => '企业产权',
                'template' => 'ZHAEEC*C',
                'pointer' => 1,
                'year' => 2019,
            ],
            [
                'type' => '实物资产',//物权项目、资产转让
                'template' => 'ZHAEEC*D',
                'pointer' => 1,
                'year' => 2019,
            ],
            [
                'type' => '信息预披露',
                'template' => 'ZHAEEC*YP',
                'pointer' => 1,
                'year' => 2019,
            ],
            [
                'type' => '增资扩股',
                'template' => 'ZHAEEC*ZZ',
                'pointer' => 1,
                'year' => 2019,
            ],
            [
                'type' => '租赁项目信息公示',
                'template' => 'ZHAEEC*ZL',
                'pointer' => 1,
                'year' => 2019,
            ],
            [
                'type' => '物业租赁',
                'template' => 'ZHAEEC*L',
                'pointer' => 1,
                'year' => 2019,
            ],

        ];
        //DB::table('project_codes')->insert($records);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('project_codes')->truncate();
    }
}
