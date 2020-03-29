<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Encore\Admin\Auth\Database\Permission as Admin_Permission;

class AdminPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            $this->create(6,'项目管理','projects','',"/qycg*\r\n/jgpt/qycg*\r\n/jgpt/zczl*\r\n/zczl*\r\n/cqzr*\r\n/zzkg*\r\n/zczr*\r\n/pbresults*\r\n/winnotices*\r\n/files*\r\n/images*\r\n/yxdj*\r\n/bdqy*\r\n/bdqygqjg*\r\n/sjbg*\r\n/cwbb*\r\n/pgqk*\r\n/zrf*\r\n/jgxx*\r\n/bdxq*\r\n/gpsj*\r\n/zp*\r\n/lhsc*\r\n/lhscqr*\r\n/jyfs*\r\n/cjxx*\r\n/zbtz*\r\n/sftz*\r\n/htxx*\r\n/jyjz*\r\n/cjgg*\r\n/sfgz*\r\n/lxfs*\r\n/pbjg*\r\n/lbgg*\r\n/zzgg*\r\n/zjgg*\r\n/hfgg*\r\n/yqgg*\r\n/bggg*\r\n/gg*\r\n/ypl*"),
            $this->create(7,'项目设置','projectsetting','','/workprocesses*'),
            $this->create(8,'项目审批','approve','',"/projects*\r\n/yxdj*\r\n/qycg*\r\n/zczl*\r\n/cqzr*\r\n/zzkg*\r\n/zczr*\r\n/ypl*"),
            $this->create(9,'客户管理','customer','',"/customer*"),
            $this->create(10,'统计报表','report','',"/report*"),
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