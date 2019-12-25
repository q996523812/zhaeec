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
        	$this->create('cqzr','产权转让','cqzr'),
            $this->create('zzkg','增资扩股','zzkg'),
        	$this->create('zczr','资产转让','zczr'),
        	$this->create('zqxm','债权项目','zqxm'),
        	$this->create('zsyz','招商引资','zsyz'),
        	$this->create('yxdj','意向登记','yxdj'),
            
        ];

        // 将数据集合插入到数据库中
        WorkProcess::insert($rows);
    }

    private function create($code,$name,$type){
        $row = [
            'id' => (string)Str::uuid(),
            'code' => $code,
            'name' => $name,
            'type' => $type,
            'status' => 1,
            'created_at' => now(),
        ];
        return $row;
    }
}