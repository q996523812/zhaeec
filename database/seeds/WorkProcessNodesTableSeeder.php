<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\WorkProcessNode;
use App\Models\WorkProcess;

class WorkProcessNodesTableSeeder extends Seeder
{
    public function run()
    {
        $zczl = $this->createZczl();
        $qycg = $this->createQycg();
        $yxdj = $this->createYxdj();

        $rows = array_merge($zczl,$qycg,$yxdj);

        // 将数据集合插入到数据库中
        WorkProcessNode::insert($rows);
    }

    private function create($work_process_id,$code,$name,$seq,$role_id,$jurisdiction,$back_node_code,$next_node_code){
        $row = [
            'id' => (string)Str::uuid(),
            'work_process_id' => $work_process_id,
            'code' => $code,
            'name' => $name,
            'seq' => $seq,
            'role_id' => $role_id,
            'jurisdiction' => $jurisdiction,
            'back_node_code' => $back_node_code,
            'next_node_code' => $next_node_code,
            'created_at' => now(),
        ];
        return $row;
    }

    private function getProcessId($type){
        $work_process = WorkProcess::where('type',$type)->where('status','1')->first();
        return $work_process->id;
    }

    private $roles = [2,3,4,5,6];
    private function createDefault($type){
        $work_process_id = $this->getProcessId($type);
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,'11','录入中',1,$role_id_0,'','','13'),
            $this->create($work_process_id,'12','已退回',2,$role_id_0,'','','13'),
            $this->create($work_process_id,'13','部门审批',3,$role_id_1,'','12','14'),
            $this->create($work_process_id,'14','风控审批',4,$role_id_2,'','12','15'),
            $this->create($work_process_id,'15','领导审批',5,$role_id_3,'','12','19'),
            $this->create($work_process_id,'19','确认挂牌',6,$role_id_4,'','12','20'),
            $this->create($work_process_id,'20','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'21','流标录入',1,$role_id_0,'','','23'),
            $this->create($work_process_id,'22','流标退回',2,$role_id_0,'','','23'),
            $this->create($work_process_id,'23','部门审批',3,$role_id_1,'','22','24'),
            $this->create($work_process_id,'24','风控审批',4,$role_id_2,'','22','25'),
            $this->create($work_process_id,'25','领导审批',5,$role_id_3,'','22','29'),
            $this->create($work_process_id,'29','发布',6,$role_id_4,'','22','99'),

            $this->create($work_process_id,'31','中止录入',1,$role_id_0,'','20','33'),
            $this->create($work_process_id,'32','中止退回',2,$role_id_0,'','20','33'),
            $this->create($work_process_id,'33','部门审批',3,$role_id_1,'','32','34'),
            $this->create($work_process_id,'34','风控审批',4,$role_id_2,'','32','35'),
            $this->create($work_process_id,'35','领导审批',5,$role_id_3,'','32','39'),
            $this->create($work_process_id,'39','发布',6,$role_id_4,'','32','30'),
            $this->create($work_process_id,'30','已暂停',7,$role_id_0,'','','20'),
            
            $this->create($work_process_id,'41','终结录入',1,$role_id_0,'','20','43'),
            $this->create($work_process_id,'42','终结退回',2,$role_id_0,'','20','43'),
            $this->create($work_process_id,'43','部门审批',3,$role_id_1,'','42','44'),
            $this->create($work_process_id,'44','风控审批',4,$role_id_2,'','42','45'),
            $this->create($work_process_id,'45','领导审批',5,$role_id_3,'','42','49'),
            $this->create($work_process_id,'49','发布',6,$role_id_4,'','42','99'),

            $this->create($work_process_id,'51','录入竞价结果',1,$role_id_0,'','','53'),
            $this->create($work_process_id,'52','已退回',2,$role_id_0,'','','53'),
            $this->create($work_process_id,'53','部门审批',3,$role_id_1,'','52','54'),
            $this->create($work_process_id,'54','风控审批',4,$role_id_2,'','52','55'),
            $this->create($work_process_id,'55','领导审批',5,$role_id_3,'','52','59'),
            $this->create($work_process_id,'59','发布',6,$role_id_4,'','52','81'),

            $this->create($work_process_id,'61','录入评标结果',1,$role_id_0,'','','63'),
            $this->create($work_process_id,'62','已退回',2,$role_id_0,'','','63'),
            $this->create($work_process_id,'63','部门审批',3,$role_id_1,'','62','64'),
            $this->create($work_process_id,'64','风控审批',4,$role_id_2,'','62','65'),
            $this->create($work_process_id,'65','领导审批',5,$role_id_3,'','62','69'),
            $this->create($work_process_id,'69','发布',6,$role_id_4,'','62','81'),

            $this->create($work_process_id,'81','录入成交信息',1,$role_id_0,'','','83'),//中标通知
            $this->create($work_process_id,'82','已退回',2,$role_id_0,'','','83'),
            $this->create($work_process_id,'83','部门审批',3,$role_id_1,'','82','84'),
            $this->create($work_process_id,'84','风控审批',4,$role_id_2,'','82','85'),
            $this->create($work_process_id,'85','领导审批',5,$role_id_3,'','82','89'),
            $this->create($work_process_id,'89','发布',6,$role_id_4,'','82','91'),

            $this->create($work_process_id,'91','上传合同',1,$role_id_0,'','','99'),
            $this->create($work_process_id,'99','结束',6,$role_id_0,'','',''),

        ];
        return $nodes;
    }
    private function createYxdj(){
        $work_process_id = $this->getProcessId('yxdj');
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[4];//综合部，发布
        $nodes = [
            $this->create($work_process_id,'11','录入中',1,$role_id_0,'','','13'),
            $this->create($work_process_id,'12','已退回',2,$role_id_0,'','','13'),
            $this->create($work_process_id,'13','部门审批',3,$role_id_1,'','12','14'),
            $this->create($work_process_id,'14','风控审批',4,$role_id_2,'','12','15'),
            $this->create($work_process_id,'15','领导审批',5,$role_id_3,'','12','19'),
            $this->create($work_process_id,'19','确认登记',6,$role_id_0,'','12','20'),
            $this->create($work_process_id,'20','完成登记',6,$role_id_0,'','',''),
        ];
        return $nodes;
    }
    private function createZczl(){
        $work_process_id = $this->getProcessId('zczl');
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,'11','录入中',1,$role_id_0,'','','13'),
            $this->create($work_process_id,'12','已退回',2,$role_id_0,'','','13'),
            $this->create($work_process_id,'13','部门审批',3,$role_id_1,'','12','14'),
            $this->create($work_process_id,'14','风控审批',4,$role_id_2,'','12','15'),
            $this->create($work_process_id,'15','领导审批',5,$role_id_3,'','12','19'),
            $this->create($work_process_id,'19','确认挂牌',6,$role_id_4,'','12','20'),
            $this->create($work_process_id,'20','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'21','流标录入',1,$role_id_0,'','','23'),
            $this->create($work_process_id,'22','流标退回',2,$role_id_0,'','','23'),
            $this->create($work_process_id,'23','部门审批',3,$role_id_1,'','22','24'),
            $this->create($work_process_id,'24','风控审批',4,$role_id_2,'','22','25'),
            $this->create($work_process_id,'25','领导审批',5,$role_id_3,'','22','29'),
            $this->create($work_process_id,'29','发布',6,$role_id_4,'','22','99'),

            $this->create($work_process_id,'31','中止录入',1,$role_id_0,'','20','33'),
            $this->create($work_process_id,'32','中止退回',2,$role_id_0,'','20','33'),
            $this->create($work_process_id,'33','部门审批',3,$role_id_1,'','32','34'),
            $this->create($work_process_id,'34','风控审批',4,$role_id_2,'','32','35'),
            $this->create($work_process_id,'35','领导审批',5,$role_id_3,'','32','39'),
            $this->create($work_process_id,'39','发布',6,$role_id_4,'','32','30'),
            $this->create($work_process_id,'30','已暂停',7,$role_id_0,'','','20'),
            
            $this->create($work_process_id,'41','终结录入',1,$role_id_0,'','20','43'),
            $this->create($work_process_id,'42','终结退回',2,$role_id_0,'','20','43'),
            $this->create($work_process_id,'43','部门审批',3,$role_id_1,'','42','44'),
            $this->create($work_process_id,'44','风控审批',4,$role_id_2,'','42','45'),
            $this->create($work_process_id,'45','领导审批',5,$role_id_3,'','42','49'),
            $this->create($work_process_id,'49','发布',6,$role_id_4,'','42','99'),

            $this->create($work_process_id,'51','录入竞价结果',1,$role_id_0,'','','53'),
            $this->create($work_process_id,'52','已退回',2,$role_id_0,'','','53'),
            $this->create($work_process_id,'53','部门审批',3,$role_id_1,'','52','54'),
            $this->create($work_process_id,'54','风控审批',4,$role_id_2,'','52','55'),
            $this->create($work_process_id,'55','领导审批',5,$role_id_3,'','52','59'),
            $this->create($work_process_id,'59','发布',6,$role_id_4,'','52','81'),

            $this->create($work_process_id,'61','录入评标结果',1,$role_id_0,'','','63'),
            $this->create($work_process_id,'62','已退回',2,$role_id_0,'','','63'),
            $this->create($work_process_id,'63','部门审批',3,$role_id_1,'','62','64'),
            $this->create($work_process_id,'64','风控审批',4,$role_id_2,'','62','65'),
            $this->create($work_process_id,'65','领导审批',5,$role_id_3,'','62','69'),
            $this->create($work_process_id,'69','发布',6,$role_id_4,'','62','81'),

            $this->create($work_process_id,'81','录入成交信息',1,$role_id_0,'','','83'),//中标通知
            $this->create($work_process_id,'82','已退回',2,$role_id_0,'','','83'),
            $this->create($work_process_id,'83','部门审批',3,$role_id_1,'','82','84'),
            $this->create($work_process_id,'84','风控审批',4,$role_id_2,'','82','85'),
            $this->create($work_process_id,'85','领导审批',5,$role_id_3,'','82','89'),
            $this->create($work_process_id,'89','发布',6,$role_id_4,'','82','91'),

            $this->create($work_process_id,'91','上传合同',1,$role_id_0,'','','99'),
            $this->create($work_process_id,'99','结束',6,$role_id_0,'','',''),

        ];
        return $nodes;
    }
    private function createQycg(){
        $work_process_id = $this->getProcessId('qycg');
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,'11','录入中',1,$role_id_0,'','','13'),
            $this->create($work_process_id,'12','已退回',2,$role_id_0,'','','13'),
            $this->create($work_process_id,'13','部门审批',3,$role_id_1,'','12','14'),
            $this->create($work_process_id,'14','风控审批',4,$role_id_2,'','12','15'),
            $this->create($work_process_id,'15','领导审批',5,$role_id_3,'','12','19'),
            $this->create($work_process_id,'19','确认挂牌',6,$role_id_4,'','12','20'),
            $this->create($work_process_id,'20','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'21','流标录入',1,$role_id_0,'','','23'),
            $this->create($work_process_id,'22','流标退回',2,$role_id_0,'','','23'),
            $this->create($work_process_id,'23','部门审批',3,$role_id_1,'','22','24'),
            $this->create($work_process_id,'24','风控审批',4,$role_id_2,'','22','25'),
            $this->create($work_process_id,'25','领导审批',5,$role_id_3,'','22','29'),
            $this->create($work_process_id,'29','发布',6,$role_id_4,'','22','99'),

            $this->create($work_process_id,'31','中止录入',1,$role_id_0,'','20','33'),
            $this->create($work_process_id,'32','中止退回',2,$role_id_0,'','20','33'),
            $this->create($work_process_id,'33','部门审批',3,$role_id_1,'','32','34'),
            $this->create($work_process_id,'34','风控审批',4,$role_id_2,'','32','35'),
            $this->create($work_process_id,'35','领导审批',5,$role_id_3,'','32','39'),
            $this->create($work_process_id,'39','发布',6,$role_id_4,'','32','30'),
            $this->create($work_process_id,'30','已暂停',7,$role_id_0,'','','20'),
            
            $this->create($work_process_id,'41','终结录入',1,$role_id_0,'','20','43'),
            $this->create($work_process_id,'42','终结退回',2,$role_id_0,'','20','43'),
            $this->create($work_process_id,'43','部门审批',3,$role_id_1,'','42','44'),
            $this->create($work_process_id,'44','风控审批',4,$role_id_2,'','42','45'),
            $this->create($work_process_id,'45','领导审批',5,$role_id_3,'','42','49'),
            $this->create($work_process_id,'49','发布',6,$role_id_4,'','42','99'),

            $this->create($work_process_id,'51','录入竞价结果',1,$role_id_0,'','','53'),
            $this->create($work_process_id,'52','已退回',2,$role_id_0,'','','53'),
            $this->create($work_process_id,'53','部门审批',3,$role_id_1,'','52','54'),
            $this->create($work_process_id,'54','风控审批',4,$role_id_2,'','52','55'),
            $this->create($work_process_id,'55','领导审批',5,$role_id_3,'','52','59'),
            $this->create($work_process_id,'59','发布',6,$role_id_4,'','52','81'),

            $this->create($work_process_id,'61','录入评标结果',1,$role_id_0,'','','63'),
            $this->create($work_process_id,'62','已退回',2,$role_id_0,'','','63'),
            $this->create($work_process_id,'63','部门审批',3,$role_id_1,'','62','64'),
            $this->create($work_process_id,'64','风控审批',4,$role_id_2,'','62','65'),
            $this->create($work_process_id,'65','领导审批',5,$role_id_3,'','62','69'),
            $this->create($work_process_id,'69','发布',6,$role_id_4,'','62','81'),

            $this->create($work_process_id,'81','录入成交信息',1,$role_id_0,'','','83'),
            $this->create($work_process_id,'82','已退回',2,$role_id_0,'','','83'),
            $this->create($work_process_id,'83','部门审批',3,$role_id_1,'','82','84'),
            $this->create($work_process_id,'84','风控审批',4,$role_id_2,'','82','85'),
            $this->create($work_process_id,'85','领导审批',5,$role_id_3,'','82','89'),
            $this->create($work_process_id,'89','发布',6,$role_id_4,'','82','91'),

            $this->create($work_process_id,'91','上传合同',1,$role_id_0,'','','99'),
            $this->create($work_process_id,'99','结束',6,$role_id_0,'','',''),

        ];
        return $nodes;
    }


}

