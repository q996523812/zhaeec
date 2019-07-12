<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Encore\Admin\Auth\Database\Menu as Admin_Menu;

class AdminMenusTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
            $this->create(8,0,0,'项目管理','fa-android',null),
            $this->create(9,8,0,'企业采购','fa-bars','/projectpurchases'),
            $this->create(10,0,0,'项目设置','fa-anchor',null),
            $this->create(11,10,0,'流程设置','fa-bars','/workprocesses'),
            $this->create(12,10,0,'流程节点设置','fa-bars','/workprocessnodes'),
            $this->create(13,8,0,'项目审批','fa-bars','/projects'),
            $this->create(14,8,0,'接收采购项目','fa-bars','/jgptprojectpurchases'),
            $this->create(15,8,0,'接收租赁项目','fa-bars','/jgptprojectleases'),
            $this->create(16,8,0,'资产租赁','fa-bars','/projectleases'),
            $this->create(17,8,0,'评审结果录入','fa-bars','/pbresults'),
            $this->create(18,8,0,'中标通知','fa-bars','/winnotices'),
            
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