<?php

use Illuminate\Database\Seeder;
use App\Models\ChargeRule;
use App\Models\ChargeRuleSub;

class ChargeRuleSubsTableSeeder extends Seeder
{
    public function run()
    {
    	$memo = '以成交金额为基数，按差额定率累进法计算。计费区间中，开始区间不包含本数，结束区间包含本数';
    	$zczl_1 = ChargeRule::where('project_type','zczl')->where('charge_type',1)->first()->id;
    	$qycg_1 = ChargeRule::where('project_type','qycg')->where('charge_type',1)->where('service_type',1)->first()->id;
    	$qycg_2 = ChargeRule::where('project_type','qycg')->where('charge_type',1)->where('service_type',2)->first()->id;
    	$qycg_3 = ChargeRule::where('project_type','qycg')->where('charge_type',1)->where('service_type',3)->first()->id;
    	
        $rows = [
        	$this->create($zczl_1,'按租赁年限计费（年）',1,0,5,0.012,null),
        	$this->create($zczl_1,'按租赁年限计费（年）',2,5,10,0.006,null),
        	$this->create($zczl_1,'按租赁年限计费（年）',3,10,null,0.003,null),

			$this->create($qycg_1,'按成交金额计费（万元）',1,0  ,100,0.015,0),
			$this->create($qycg_1,'按成交金额计费（万元）',2,100,500,0.011,1.5),
			$this->create($qycg_1,'按成交金额计费（万元）',3,500,1000,0.008,5.9),
			$this->create($qycg_1,'按成交金额计费（万元）',4,1000,5000,0.005,9.9),
			$this->create($qycg_1,'按成交金额计费（万元）',5,5000,10000,0.0025,29.9),
			$this->create($qycg_1,'按成交金额计费（万元）',6,10000,100000,0.0005,42.4),
			$this->create($qycg_1,'按成交金额计费（万元）',7,100000,null,0.0001,87.4),

			$this->create($qycg_2,'按成交金额计费（万元）',1,0  ,100,0.015,0),
			$this->create($qycg_2,'按成交金额计费（万元）',2,100,500,0.008,1.5),
			$this->create($qycg_2,'按成交金额计费（万元）',3,500,1000,0.0045,4.7),
			$this->create($qycg_2,'按成交金额计费（万元）',4,1000,5000,0.0025,6.95),
			$this->create($qycg_2,'按成交金额计费（万元）',5,5000,10000,0.001,16.95),
			$this->create($qycg_2,'按成交金额计费（万元）',6,10000,100000,0.0005,21.95),
			$this->create($qycg_2,'按成交金额计费（万元）',7,100000,null,0.0001,66.95),

			$this->create($qycg_3,'按成交金额计费（万元）',1,0  ,100,0.01,0),
			$this->create($qycg_3,'按成交金额计费（万元）',2,100,500,0.007,1),
			$this->create($qycg_3,'按成交金额计费（万元）',3,500,1000,0.0055,3.8),
			$this->create($qycg_3,'按成交金额计费（万元）',4,1000,5000,0.0035,6.55),
			$this->create($qycg_3,'按成交金额计费（万元）',5,5000,10000,0.002,20.55),
			$this->create($qycg_3,'按成交金额计费（万元）',6,10000,100000,0.0005,30.55),
			$this->create($qycg_3,'按成交金额计费（万元）',7,100000,null,0.0001,75.55),

        ];

        // 将数据集合插入到数据库中
        ChargeRuleSub::insert($rows);
    }

    private function create($charge_rule_id,$type,$seq,$start,$end,$rate,$quick_num){
        $row = [
        	'charge_rule_id' => $charge_rule_id,
            'type' => $type,
            'seq' => $seq,
            'start' => $start,
            'end' => $end,
            'rate' => $rate,
            'quick_num' => $quick_num,
            'created_at' => now(),
        ];
        return $row;
    }
}
