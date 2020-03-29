<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Encore\Admin\Auth\Database\Menu as Admin_Menu;

class AdminMenusTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            $this->create(8,0,0,'业务审批','fa-android',null),
            $this->create(9,8,0,'项目审批','fa-bars','/projects'),
            $this->create(10,8,0,'意向登记审核','fa-bars','/yxdj'),
            $this->create(11,0,0,'项目设置','fa-anchor',null),
            $this->create(12,11,0,'流程设置','fa-bars','/workprocesses'),
            $this->create(13,11,0,'流程节点设置','fa-bars','/workprocessnodes'),
            $this->create(14,0,0,'项目管理','fa-android',null),
            $this->create(15,14,0,'企业采购','fa-bars','/qycg'),
            $this->create(16,14,0,'资产租赁','fa-bars','/zczl'),
            $this->create(17,14,0,'产权转让','fa-bars','/cqzr'),
            $this->create(18,14,0,'增资扩股','fa-bars','/zzkg'),
            $this->create(19,14,0,'资产转让','fa-bars','/zczr'),
            $this->create(20,14,0,'预披露','fa-bars','/ypl'),
            $this->create(21,14,0,'评审结果录入','fa-bars','/pbresults'),
            $this->create(22,14,0,'中标通知','fa-bars','/winnotices'),
            $this->create(23,14,0,'接收采购项目','fa-bars','/jgpt/qycg'),
            $this->create(24,14,0,'接收租赁项目','fa-bars','/jgpt/zczl'),
            $this->create(25,0,0,'客户管理','fa-bars',null),
            $this->create(26,25,0,'客户管理','fa-bars','/customer'),
            $this->create(27,0,0,'统计报表','fa-bars',null),
            $this->create(28,27,0,'报表1','fa-bars','/report/show'),
            
        ];

        // 将数据集合插入到数据库中
        Admin_Menu::insert($rows);
    }

    private function create($id,$parent_id,$order,$title,$icon,$uri){
        $row = [
            'id' => $id,
            'parent_id' => $parent_id,
            'order' => $order,
            'title' => $title,
            'icon' => $icon,
            'uri' => $uri,
            'created_at' => now(),
        ];
        return $row;
    }    
}