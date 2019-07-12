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
            $this->create(2,3),
            
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