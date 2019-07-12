<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\WorkProcessNode;
use App\Models\WorkProcess;

class WorkProcessesTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
        	$this->create('qycg','企业采购','qycg'),
        	$this->create('zczl','资产租赁','zczl'),
        	$this->create('ypl','预披露','ypl'),
        	$this->create('qycq','企业产权','qycq'),
        	$this->create('wqxm','物权项目','wqxm'),
        	$this->create('zqxm','债权项目','zqxm'),
        	$this->create('qyzz','企业增资','qyzz'),
        	$this->create('zsyz','招商引资','zsyz'),
        	
        ];

        // 将数据集合插入到数据库中
        WorkProcess::insert($rows);
    }

    private function create($code,$name,$projecttype){
        $row = [
            'id' => (string)Str::uuid(),
            'code' => $code,
            'name' => $name,
            'projecttype' => $projecttype,
            'status' => 1,
            'created_at' => now(),
        ];
        return $row;
    }    
}