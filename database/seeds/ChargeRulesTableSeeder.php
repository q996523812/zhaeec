<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\ChargeRule;

class ChargeRulesTableSeeder extends Seeder
{
    public function run()
    {
    	$memo = '以成交金额为基数，按差额定率累进法计算。计费区间中，开始区间不包含本数，结束区间包含本数';
        $rows = [
        	$this->create('zczl','资产租赁','1','按标准收取','','',$memo),
        	$this->create('zczl','资产租赁','2','手工录入','','',''),//用于手工录入非标准收费金额
            $this->create('zczl','资产租赁','3','不收取服务费','','',''),

            $this->create('qycg','企业采购','1','按标准收取','1','服务招标',$memo),
        	$this->create('qycg','企业采购','1','按标准收取','2','货物招标',$memo),
            $this->create('qycg','企业采购','1','按标准收取','3','工程招标',$memo),
            $this->create('qycg','企业采购','2','手工录入','','',''),//用于手工录入非标准收费金额
            $this->create('qycg','企业采购','3','不收取服务费','','',''),
        ];

        // 将数据集合插入到数据库中
        ChargeRule::insert($rows);
    }

    private function create($project_type,$project_type_name,$charge_type,$charge_type_name,$service_type,$service_type_name,$explain){
        $row = [
        	'id' => (string)Str::uuid(),
            'project_type' => $project_type,
            'project_type_name' => $project_type_name,
            'charge_type' => $charge_type,
            'charge_type_name' => $charge_type_name,
            'service_type' => $service_type,
            'service_type_name' => $service_type_name,
            'explain' => $explain,
            'created_at' => now(),
        ];
        return $row;
    }
}