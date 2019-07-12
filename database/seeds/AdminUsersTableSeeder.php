<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Encore\Admin\Auth\Database\Administrator as Admin_User;

class AdminUsersTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            $this->create(2,'hqq','$2y$10$59y0W2B819pvQnnHCypUIeWCRdaQuiF38xxLkBJ0HeMC5fEYa0Ifa','贺芊芊','4C013UFIX7sBcaVPHIXjplGIOBuG4Uyprs1W1TJccA7D7pQ9ZZ742IqMnohB'),
            $this->create(3,'cj','$2y$10$VIOBTy5z4lVcHsU/7O7b1OtPMuWK000x0lSOdPztqLcMebnjr.G.O','陈俊','L1aNyjFE0MDmALyZP6v5cFq8NQfeOBqHj799IIfYPsI9NczgJG7gAl7wkECh'),
            
        ];

        // 将数据集合插入到数据库中
        Admin_User::insert($rows);
    }

    private function create($id,$username,$password,$name,$remember_token){
        $row = [
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'remember_token' => $remember_token,
            'created_at' => now(),
        ];
        return $row;
    }    
}