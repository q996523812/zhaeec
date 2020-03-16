<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminRolePermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            $this->create(2,2),
            $this->create(2,3),
            $this->create(2,4),
            $this->create(2,6),
            $this->create(2,8),
            $this->create(2,9),
            $this->create(2,10),

            $this->create(3,2),
            $this->create(3,3),
            $this->create(3,4),
            $this->create(3,6),
            $this->create(3,8),
            $this->create(3,9),
            $this->create(3,10),

            $this->create(4,2),
            $this->create(4,3),
            $this->create(4,4),
            $this->create(4,6),
            $this->create(4,8),
            $this->create(4,9),
            $this->create(4,10),

            $this->create(5,2),
            $this->create(5,3),
            $this->create(5,4),
            $this->create(5,6),
            $this->create(5,8),
            $this->create(5,9),
            $this->create(5,10),

            $this->create(6,2),
            $this->create(6,3),
            $this->create(6,4),
            $this->create(6,6),
            $this->create(6,8),
            $this->create(6,9),
            $this->create(6,10),

            $this->create(7,2),
            $this->create(7,3),
            $this->create(7,4),
            $this->create(7,6),
            $this->create(7,7),
            $this->create(7,8),
            $this->create(7,9),
            $this->create(7,10),
            
            $this->create(8,2),
            $this->create(8,3),
            $this->create(8,4),
            $this->create(8,6),
            $this->create(8,8),
            $this->create(8,9),
            $this->create(8,10),
            
            $this->create(9,2),
            $this->create(9,3),
            $this->create(9,4),
            $this->create(6,6),
            $this->create(9,8),
            $this->create(9,9),
            $this->create(9,10),
            
            $this->create(10,2),
            $this->create(10,3),
            $this->create(10,4),
            $this->create(10,6),
            $this->create(10,9),
            $this->create(10,10),
            
        ];

        // 将数据集合插入到数据库中
        DB::table('admin_role_permissions')->insert($rows);
    }

    private function create($role_id,$permission_id){
        $row = [
            'role_id' => $role_id,
            'permission_id' => $permission_id,
        ];
        return $row;
    }    
}