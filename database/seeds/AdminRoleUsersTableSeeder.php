<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminRoleUsersTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            $this->create(2,2),
            $this->create(3,3),
            $this->create(4,4),
            $this->create(5,5),
            $this->create(6,6),
            $this->create(6,7),
            $this->create(2,8),
            $this->create(8,9),
            $this->create(9,10),
            $this->create(2,11),
            $this->create(2,12),
            $this->create(2,13),
            $this->create(2,14),
            $this->create(2,15),
            $this->create(2,16),
            $this->create(2,17),
            $this->create(2,18),
            $this->create(2,19),
            $this->create(2,20),
            $this->create(2,21),
            $this->create(2,22),
        ];

        // 将数据集合插入到数据库中
        DB::table('admin_role_users')->insert($rows);
    }

    private function create($role_id,$user_id){
        $row = [
            'role_id' => $role_id,
            'user_id' => $user_id,
        ];
        return $row;
    }    
}