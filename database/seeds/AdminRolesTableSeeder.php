<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Encore\Admin\Auth\Database\Role as Admin_Role;

class AdminRolesTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
        	$this->create(2,'业务员','business'),
        	$this->create(3,'部门经理','zczl'),
        	$this->create(4,'风控','riskcontrol'),
        	$this->create(5,'分管领导','leader'),
        	$this->create(6,'综合','complex'),
        	$this->create(7,'信息部','manage'),
            $this->create(8,'总经理','president'),
            $this->create(9,'董事长','chairman'),
        	
        ];

        // 将数据集合插入到数据库中
        Admin_Role::insert($rows);
    }

    private function create($id,$name,$slug){
        $row = [
            'id' => $id,
            'name' => $name,
            'slug' => $slug,
            'created_at' => now(),
        ];
        return $row;
    }    
}