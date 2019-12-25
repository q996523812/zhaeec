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
            $this->create(4,'jyn','$2y$10$P2xh7RReeoXezmKVHBtKc.F.c3nM62HY9Tc5sXjwlxg0e2ILFp2tm','江玉尼',null),
            $this->create(5,'dyp','$2y$10$O74aGb1MFvpfOZAe4oWHbekHH9l2aaQIAzfiqk/etc99Bc7GEK./.','邓艳平',null),
            $this->create(6,'cyl','$2y$10$vzVDjQXOcNpXKpiO7mubUO7xD6mjYhf0XlqBoAaVU/20EpD/sMOmy','岑茵蓝',null),
            $this->create(7,'zyf','$2y$10$2cl6Ta.KjUF9vWO39ddVHeT9EMZRt/th4PTYXsyNxmWZCYcuVNCCC','赵涯菲',null),
            $this->create(8,'qss','$2y$10$y.EhVMwnZ4.89rrnRw1qcuqrNCs1KG1Sscq9YsbwtQYqOhjkmfcqC','覃山山',null),
            $this->create(9,'xy','$2y$10$kh8eOU1BBquek209.X5SlOF9uug91A1H9RuOvK2XpGTsfCN45gHEu','夏毅',null),
            $this->create(10,'xdx','$2y$10$FlSJ3mE8lctMfQpB8gQ5uezeaw5/h2tFK81Clo3NRMRpgDXuJm.i2','夏德兴',null),
            
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