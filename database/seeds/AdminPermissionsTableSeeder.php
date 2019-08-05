<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Encore\Admin\Auth\Database\Permission as Admin_Permission;

class AdminPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            $this->create(6,'项目管理','projects','',"/qycg*\r\n/jgptprojectpurchases*\r\n/jgptprojectleases*\r\n/zczl*\r\n/pbresults*\r\n/winnotices*\r\n/files*\r\n/images*"),
            $this->create(7,'项目设置','projectsetting','','/workprocesses*'),
            $this->create(8,'项目审批','approve','',"/projects*\r\n/yxdj*"),
        ];

        // 将数据集合插入到数据库中
        Admin_Permission::insert($rows);
    }

    private function create($id,$name,$slug,$http_method,$http_path){
        $row = [
            'id' => $id,
            'name' => $name,
            'slug' => $slug,
            'http_method' => $http_method,
            'http_path' => $http_path,
            'created_at' => now(),
        ];
        return $row;
    }    
}