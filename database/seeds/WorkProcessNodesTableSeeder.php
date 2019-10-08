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
            $this->create($work_process_id,'111','【挂牌】录入中',1,$role_id_0,'','','113'),
            $this->create($work_process_id,'112','【挂牌】已退回',2,$role_id_0,'','','113'),
            $this->create($work_process_id,'113','【挂牌】部门审批',3,$role_id_1,'','112','114'),
            $this->create($work_process_id,'114','【挂牌】风控审批',4,$role_id_2,'','112','115'),
            $this->create($work_process_id,'115','【挂牌】领导审批',5,$role_id_3,'','112','119'),
            $this->create($work_process_id,'119','【挂牌】确认挂牌',6,$role_id_4,'','112','120'),
            $this->create($work_process_id,'120','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'131','【流标】录入',1,$role_id_0,'','','133'),
            $this->create($work_process_id,'132','【流标】退回',2,$role_id_0,'','','133'),
            $this->create($work_process_id,'133','【流标】部门审批',3,$role_id_1,'','132','134'),
            $this->create($work_process_id,'134','【流标】风控审批',4,$role_id_2,'','132','135'),
            $this->create($work_process_id,'135','【流标】领导审批',5,$role_id_3,'','132','139'),
            $this->create($work_process_id,'139','【流标】发布',6,$role_id_4,'','132','999'),

            $this->create($work_process_id,'141','【终结】录入',1,$role_id_0,'','120','143'),
            $this->create($work_process_id,'142','【终结】退回',2,$role_id_0,'','120','143'),
            $this->create($work_process_id,'143','【终结】部门审批',3,$role_id_1,'','142','144'),
            $this->create($work_process_id,'144','【终结】风控审批',4,$role_id_2,'','142','145'),
            $this->create($work_process_id,'145','【终结】领导审批',5,$role_id_3,'','142','149'),
            $this->create($work_process_id,'149','【终结】发布',6,$role_id_4,'','142','999'),

            $this->create($work_process_id,'151','【中止】录入',1,$role_id_0,'','120','153'),
            $this->create($work_process_id,'152','【中止】退回',2,$role_id_0,'','120','153'),
            $this->create($work_process_id,'153','【中止】部门审批',3,$role_id_1,'','152','154'),
            $this->create($work_process_id,'154','【中止】风控审批',4,$role_id_2,'','152','155'),
            $this->create($work_process_id,'155','【中止】领导审批',5,$role_id_3,'','152','159'),
            $this->create($work_process_id,'159','【中止】发布',6,$role_id_4,'','152','160'),
            $this->create($work_process_id,'160','【中止】已暂停',7,$role_id_0,'','','120'),

            $this->create($work_process_id,'161','【恢复】录入',1,$role_id_0,'','160','163'),
            $this->create($work_process_id,'162','【恢复】退回',2,$role_id_0,'','120','163'),
            $this->create($work_process_id,'163','【恢复】部门审批',3,$role_id_1,'','162','164'),
            $this->create($work_process_id,'164','【恢复】风控审批',4,$role_id_2,'','162','165'),
            $this->create($work_process_id,'165','【恢复】领导审批',5,$role_id_3,'','162','169'),
            $this->create($work_process_id,'169','【恢复】发布',6,$role_id_4,'','162','120'),

            $this->create($work_process_id,'171','【延期】录入',1,$role_id_0,'','120','173'),
            $this->create($work_process_id,'172','【延期】退回',2,$role_id_0,'','120','173'),
            $this->create($work_process_id,'173','【延期】部门审批',3,$role_id_1,'','172','174'),
            $this->create($work_process_id,'174','【延期】风控审批',4,$role_id_2,'','172','175'),
            $this->create($work_process_id,'175','【延期】领导审批',5,$role_id_3,'','172','179'),
            $this->create($work_process_id,'179','【延期】发布',6,$role_id_4,'','172','120'),

/******************************************竞价****************************************/
//竞价结果、成交信息，附件：竞价记录
            $this->create($work_process_id,'211','【竞价结果】录入',1,$role_id_0,'','','213'),
            $this->create($work_process_id,'212','【竞价结果】退回',2,$role_id_0,'','','213'),
            $this->create($work_process_id,'213','【竞价结果】部门审批',3,$role_id_1,'','212','214'),
            $this->create($work_process_id,'214','【竞价结果】风控审批',4,$role_id_2,'','212','215'),
            $this->create($work_process_id,'215','【竞价结果】领导审批',5,$role_id_3,'','212','219'),
            $this->create($work_process_id,'219','【竞价结果】确认',6,$role_id_4,'','212','221'),

//成交公告（竞价版）
            $this->create($work_process_id,'221','【成交公告】录入',1,$role_id_0,'','','223'),
            $this->create($work_process_id,'222','【成交公告】退回',2,$role_id_0,'','','223'),
            $this->create($work_process_id,'223','【成交公告】部门审批',3,$role_id_1,'','222','224'),
            $this->create($work_process_id,'224','【成交公告】风控审批',4,$role_id_2,'','222','225'),
            $this->create($work_process_id,'225','【成交公告】领导审批',5,$role_id_3,'','222','229'),
            $this->create($work_process_id,'229','【成交公告】发布',6,$role_id_4,'','222','231'),

//中标通知
            $this->create($work_process_id,'231','【中标通知】录入',1,$role_id_0,'','','233'),
            $this->create($work_process_id,'232','【中标通知】退回',2,$role_id_0,'','','233'),
            $this->create($work_process_id,'233','【中标通知】部门审批',3,$role_id_1,'','232','234'),
            $this->create($work_process_id,'234','【中标通知】风控审批',4,$role_id_2,'','232','235'),
            $this->create($work_process_id,'235','【中标通知】领导审批',5,$role_id_3,'','232','239'),
            $this->create($work_process_id,'239','【中标通知】确认',6,$role_id_4,'','232','241'),

//收费通知
            $this->create($work_process_id,'241','【收费通知】录入',1,$role_id_0,'','','243'),
            $this->create($work_process_id,'242','【收费通知】退回',2,$role_id_0,'','','243'),
            $this->create($work_process_id,'243','【收费通知】部门审批',3,$role_id_1,'','242','244'),
            $this->create($work_process_id,'244','【收费通知】风控审批',4,$role_id_2,'','242','245'),
            $this->create($work_process_id,'245','【收费通知】领导审批',5,$role_id_3,'','242','249'),
            $this->create($work_process_id,'249','【收费通知】确认',6,$role_id_4,'','242','251'),

//上传合同
            $this->create($work_process_id,'251','【合同】上传',1,$role_id_0,'','','261'),

            $this->create($work_process_id,'261','【成交确认书】录入',1,$role_id_0,'','','263'),
            $this->create($work_process_id,'262','【成交确认书】退回',2,$role_id_0,'','','263'),
            $this->create($work_process_id,'263','【成交确认书】部门审批',3,$role_id_1,'','262','264'),
            $this->create($work_process_id,'264','【成交确认书】风控审批',4,$role_id_2,'','262','265'),
            $this->create($work_process_id,'265','【成交确认书】领导审批',5,$role_id_3,'','262','269'),
            $this->create($work_process_id,'269','【成交确认书】确认',6,$role_id_4,'','262','999'),

/******************************************评标****************************************/
//评标结果
            $this->create($work_process_id,'311','【评标结果】录入',1,$role_id_0,'','','313'),
            $this->create($work_process_id,'312','【评标结果】退回',2,$role_id_0,'','','313'),
            $this->create($work_process_id,'313','【评标结果】部门审批',3,$role_id_1,'','312','314'),
            $this->create($work_process_id,'314','【评标结果】风控审批',4,$role_id_2,'','312','315'),
            $this->create($work_process_id,'315','【评标结果】领导审批',5,$role_id_3,'','312','319'),
            $this->create($work_process_id,'319','【评标结果】发布',6,$role_id_4,'','312','321'),

//成交信息，附件：企业盖章版成交公告
            $this->create($work_process_id,'321','【成交信息】录入',1,$role_id_0,'','','323'),
            $this->create($work_process_id,'322','【成交信息】退回',2,$role_id_0,'','','323'),
            $this->create($work_process_id,'323','【成交信息】部门审批',3,$role_id_1,'','322','324'),
            $this->create($work_process_id,'324','【成交信息】风控审批',4,$role_id_2,'','322','325'),
            $this->create($work_process_id,'325','【成交信息】领导审批',5,$role_id_3,'','322','329'),
            $this->create($work_process_id,'329','【成交信息】确认',6,$role_id_4,'','322','331'),

//成交公告（评标版）
            $this->create($work_process_id,'331','【成交公告】录入',1,$role_id_0,'','','333'),
            $this->create($work_process_id,'332','【成交公告】退回',2,$role_id_0,'','','333'),
            $this->create($work_process_id,'333','【成交公告】部门审批',3,$role_id_1,'','332','334'),
            $this->create($work_process_id,'334','【成交公告】风控审批',4,$role_id_2,'','332','335'),
            $this->create($work_process_id,'335','【成交公告】领导审批',5,$role_id_3,'','332','339'),
            $this->create($work_process_id,'339','【成交公告】发布',6,$role_id_4,'','332','341'),

//中标通知
            $this->create($work_process_id,'341','【中标通知】录入',1,$role_id_0,'','','343'),
            $this->create($work_process_id,'342','【中标通知】退回',2,$role_id_0,'','','343'),
            $this->create($work_process_id,'343','【中标通知】部门审批',3,$role_id_1,'','342','344'),
            $this->create($work_process_id,'344','【中标通知】风控审批',4,$role_id_2,'','342','345'),
            $this->create($work_process_id,'345','【中标通知】领导审批',5,$role_id_3,'','342','349'),
            $this->create($work_process_id,'349','【中标通知】确认',6,$role_id_4,'','342','351'),
//收费通知
            $this->create($work_process_id,'351','【收费通知】录入',1,$role_id_0,'','','353'),
            $this->create($work_process_id,'352','【收费通知】退回',2,$role_id_0,'','','353'),
            $this->create($work_process_id,'353','【收费通知】部门审批',3,$role_id_1,'','352','354'),
            $this->create($work_process_id,'354','【收费通知】风控审批',4,$role_id_2,'','352','355'),
            $this->create($work_process_id,'355','【收费通知】领导审批',5,$role_id_3,'','352','359'),
            $this->create($work_process_id,'359','【收费通知】确认',6,$role_id_4,'','352','361'),

//上传合同
            $this->create($work_process_id,'361','【合同】上传',1,$role_id_0,'','','999'),


            $this->create($work_process_id,'999','【结束】',6,$role_id_0,'','',''),

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
            $this->create($work_process_id,'11','【意向登记】录入',1,$role_id_0,'','','13'),
            $this->create($work_process_id,'12','【意向登记】退回',2,$role_id_0,'','','13'),
            $this->create($work_process_id,'13','【意向登记】部门审批',3,$role_id_1,'','12','14'),
            $this->create($work_process_id,'14','【意向登记】风控审批',4,$role_id_2,'','12','15'),
            $this->create($work_process_id,'15','【意向登记】领导审批',5,$role_id_3,'','12','19'),
            $this->create($work_process_id,'19','【意向登记】确认登记',6,$role_id_0,'','12','20'),
            $this->create($work_process_id,'20','【意向登记】完成登记',6,$role_id_0,'','',''),
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
            $this->create($work_process_id,'111','【挂牌】录入中',1,$role_id_0,'','','113'),
            $this->create($work_process_id,'112','【挂牌】已退回',2,$role_id_0,'','','113'),
            $this->create($work_process_id,'113','【挂牌】部门审批',3,$role_id_1,'','112','114'),
            $this->create($work_process_id,'114','【挂牌】风控审批',4,$role_id_2,'','112','115'),
            $this->create($work_process_id,'115','【挂牌】领导审批',5,$role_id_3,'','112','119'),
            $this->create($work_process_id,'119','【挂牌】确认挂牌',6,$role_id_4,'','112','120'),
            $this->create($work_process_id,'120','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'131','【流标】录入',1,$role_id_0,'','','133'),
            $this->create($work_process_id,'132','【流标】退回',2,$role_id_0,'','','133'),
            $this->create($work_process_id,'133','【流标】部门审批',3,$role_id_1,'','132','134'),
            $this->create($work_process_id,'134','【流标】风控审批',4,$role_id_2,'','132','135'),
            $this->create($work_process_id,'135','【流标】领导审批',5,$role_id_3,'','132','139'),
            $this->create($work_process_id,'139','【流标】发布',6,$role_id_4,'','132','999'),

            $this->create($work_process_id,'141','【终结】录入',1,$role_id_0,'','120','143'),
            $this->create($work_process_id,'142','【终结】退回',2,$role_id_0,'','120','143'),
            $this->create($work_process_id,'143','【终结】部门审批',3,$role_id_1,'','142','144'),
            $this->create($work_process_id,'144','【终结】风控审批',4,$role_id_2,'','142','145'),
            $this->create($work_process_id,'145','【终结】领导审批',5,$role_id_3,'','142','149'),
            $this->create($work_process_id,'149','【终结】发布',6,$role_id_4,'','142','999'),

            $this->create($work_process_id,'151','【中止】录入',1,$role_id_0,'','120','153'),
            $this->create($work_process_id,'152','【中止】退回',2,$role_id_0,'','120','153'),
            $this->create($work_process_id,'153','【中止】部门审批',3,$role_id_1,'','152','154'),
            $this->create($work_process_id,'154','【中止】风控审批',4,$role_id_2,'','152','155'),
            $this->create($work_process_id,'155','【中止】领导审批',5,$role_id_3,'','152','159'),
            $this->create($work_process_id,'159','【中止】发布',6,$role_id_4,'','152','160'),
            $this->create($work_process_id,'160','【中止】已暂停',7,$role_id_0,'','','120'),

            $this->create($work_process_id,'161','【恢复】录入',1,$role_id_0,'','160','163'),
            $this->create($work_process_id,'162','【恢复】退回',2,$role_id_0,'','120','163'),
            $this->create($work_process_id,'163','【恢复】部门审批',3,$role_id_1,'','162','164'),
            $this->create($work_process_id,'164','【恢复】风控审批',4,$role_id_2,'','162','165'),
            $this->create($work_process_id,'165','【恢复】领导审批',5,$role_id_3,'','162','169'),
            $this->create($work_process_id,'169','【恢复】发布',6,$role_id_4,'','162','120'),

            $this->create($work_process_id,'171','【延期】录入',1,$role_id_0,'','120','173'),
            $this->create($work_process_id,'172','【延期】退回',2,$role_id_0,'','120','173'),
            $this->create($work_process_id,'173','【延期】部门审批',3,$role_id_1,'','172','174'),
            $this->create($work_process_id,'174','【延期】风控审批',4,$role_id_2,'','172','175'),
            $this->create($work_process_id,'175','【延期】领导审批',5,$role_id_3,'','172','179'),
            $this->create($work_process_id,'179','【延期】发布',6,$role_id_4,'','172','120'),

//竞价结果、成交信息，附件：竞价记录
            $this->create($work_process_id,'211','【竞价结果】录入',1,$role_id_0,'','','213'),
            $this->create($work_process_id,'212','【竞价结果】退回',2,$role_id_0,'','','213'),
            $this->create($work_process_id,'213','【竞价结果】部门审批',3,$role_id_1,'','212','214'),
            $this->create($work_process_id,'214','【竞价结果】风控审批',4,$role_id_2,'','212','215'),
            $this->create($work_process_id,'215','【竞价结果】领导审批',5,$role_id_3,'','212','219'),
            $this->create($work_process_id,'219','【竞价结果】确认',6,$role_id_4,'','212','221'),

//成交公告（竞价版）
            $this->create($work_process_id,'221','【成交公告】录入',1,$role_id_0,'','','223'),
            $this->create($work_process_id,'222','【成交公告】退回',2,$role_id_0,'','','223'),
            $this->create($work_process_id,'223','【成交公告】部门审批',3,$role_id_1,'','222','224'),
            $this->create($work_process_id,'224','【成交公告】风控审批',4,$role_id_2,'','222','225'),
            $this->create($work_process_id,'225','【成交公告】领导审批',5,$role_id_3,'','222','229'),
            $this->create($work_process_id,'229','【成交公告】发布',6,$role_id_4,'','222','231'),

//中标通知
            $this->create($work_process_id,'231','【中标通知】录入',1,$role_id_0,'','','233'),
            $this->create($work_process_id,'232','【中标通知】退回',2,$role_id_0,'','','233'),
            $this->create($work_process_id,'233','【中标通知】部门审批',3,$role_id_1,'','232','234'),
            $this->create($work_process_id,'234','【中标通知】风控审批',4,$role_id_2,'','232','235'),
            $this->create($work_process_id,'235','【中标通知】领导审批',5,$role_id_3,'','232','239'),
            $this->create($work_process_id,'239','【中标通知】确认',6,$role_id_4,'','232','241'),

//收费通知
            $this->create($work_process_id,'241','【收费通知】录入',1,$role_id_0,'','','243'),
            $this->create($work_process_id,'242','【收费通知】退回',2,$role_id_0,'','','243'),
            $this->create($work_process_id,'243','【收费通知】部门审批',3,$role_id_1,'','242','244'),
            $this->create($work_process_id,'244','【收费通知】风控审批',4,$role_id_2,'','242','245'),
            $this->create($work_process_id,'245','【收费通知】领导审批',5,$role_id_3,'','242','249'),
            $this->create($work_process_id,'249','【收费通知】确认',6,$role_id_4,'','242','251'),

//上传合同
            $this->create($work_process_id,'251','【合同】上传',1,$role_id_0,'','','261'),

            $this->create($work_process_id,'261','【成交确认书】录入',1,$role_id_0,'','','263'),
            $this->create($work_process_id,'262','【成交确认书】退回',2,$role_id_0,'','','263'),
            $this->create($work_process_id,'263','【成交确认书】部门审批',3,$role_id_1,'','262','264'),
            $this->create($work_process_id,'264','【成交确认书】风控审批',4,$role_id_2,'','262','265'),
            $this->create($work_process_id,'265','【成交确认书】领导审批',5,$role_id_3,'','262','269'),
            $this->create($work_process_id,'269','【成交确认书】确认',6,$role_id_4,'','262','999'),

            $this->create($work_process_id,'999','【结束】',6,$role_id_0,'','',''),

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
            $this->create($work_process_id,'111','【挂牌】录入中',1,$role_id_0,'','','113'),
            $this->create($work_process_id,'112','【挂牌】已退回',2,$role_id_0,'','','113'),
            $this->create($work_process_id,'113','【挂牌】部门审批',3,$role_id_1,'','112','114'),
            $this->create($work_process_id,'114','【挂牌】风控审批',4,$role_id_2,'','112','115'),
            $this->create($work_process_id,'115','【挂牌】领导审批',5,$role_id_3,'','112','119'),
            $this->create($work_process_id,'119','【挂牌】确认挂牌',6,$role_id_4,'','112','120'),
            $this->create($work_process_id,'120','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'131','【流标】录入',1,$role_id_0,'','','133'),
            $this->create($work_process_id,'132','【流标】退回',2,$role_id_0,'','','133'),
            $this->create($work_process_id,'133','【流标】部门审批',3,$role_id_1,'','132','134'),
            $this->create($work_process_id,'134','【流标】风控审批',4,$role_id_2,'','132','135'),
            $this->create($work_process_id,'135','【流标】领导审批',5,$role_id_3,'','132','139'),
            $this->create($work_process_id,'139','【流标】发布',6,$role_id_4,'','132','999'),

            $this->create($work_process_id,'141','【终结】录入',1,$role_id_0,'','120','143'),
            $this->create($work_process_id,'142','【终结】退回',2,$role_id_0,'','120','143'),
            $this->create($work_process_id,'143','【终结】部门审批',3,$role_id_1,'','142','144'),
            $this->create($work_process_id,'144','【终结】风控审批',4,$role_id_2,'','142','145'),
            $this->create($work_process_id,'145','【终结】领导审批',5,$role_id_3,'','142','149'),
            $this->create($work_process_id,'149','【终结】发布',6,$role_id_4,'','142','999'),

            $this->create($work_process_id,'151','【中止】录入',1,$role_id_0,'','120','153'),
            $this->create($work_process_id,'152','【中止】退回',2,$role_id_0,'','120','153'),
            $this->create($work_process_id,'153','【中止】部门审批',3,$role_id_1,'','152','154'),
            $this->create($work_process_id,'154','【中止】风控审批',4,$role_id_2,'','152','155'),
            $this->create($work_process_id,'155','【中止】领导审批',5,$role_id_3,'','152','159'),
            $this->create($work_process_id,'159','【中止】发布',6,$role_id_4,'','152','160'),
            $this->create($work_process_id,'160','【中止】已暂停',7,$role_id_0,'','','120'),

            $this->create($work_process_id,'161','【恢复】录入',1,$role_id_0,'','160','163'),
            $this->create($work_process_id,'162','【恢复】退回',2,$role_id_0,'','120','163'),
            $this->create($work_process_id,'163','【恢复】部门审批',3,$role_id_1,'','162','164'),
            $this->create($work_process_id,'164','【恢复】风控审批',4,$role_id_2,'','162','165'),
            $this->create($work_process_id,'165','【恢复】领导审批',5,$role_id_3,'','162','169'),
            $this->create($work_process_id,'169','【恢复】发布',6,$role_id_4,'','162','120'),

            $this->create($work_process_id,'171','【延期】录入',1,$role_id_0,'','120','173'),
            $this->create($work_process_id,'172','【延期】退回',2,$role_id_0,'','120','173'),
            $this->create($work_process_id,'173','【延期】部门审批',3,$role_id_1,'','172','174'),
            $this->create($work_process_id,'174','【延期】风控审批',4,$role_id_2,'','172','175'),
            $this->create($work_process_id,'175','【延期】领导审批',5,$role_id_3,'','172','179'),
            $this->create($work_process_id,'179','【延期】发布',6,$role_id_4,'','172','120'),

//评标结果
            $this->create($work_process_id,'311','【评标结果】录入',1,$role_id_0,'','','313'),
            $this->create($work_process_id,'312','【评标结果】退回',2,$role_id_0,'','','313'),
            $this->create($work_process_id,'313','【评标结果】部门审批',3,$role_id_1,'','312','314'),
            $this->create($work_process_id,'314','【评标结果】风控审批',4,$role_id_2,'','312','315'),
            $this->create($work_process_id,'315','【评标结果】领导审批',5,$role_id_3,'','312','319'),
            $this->create($work_process_id,'319','【评标结果】发布',6,$role_id_4,'','312','321'),

//成交信息，附件：企业盖章版成交公告
            $this->create($work_process_id,'321','【成交信息】录入',1,$role_id_0,'','','323'),
            $this->create($work_process_id,'322','【成交信息】退回',2,$role_id_0,'','','323'),
            $this->create($work_process_id,'323','【成交信息】部门审批',3,$role_id_1,'','322','324'),
            $this->create($work_process_id,'324','【成交信息】风控审批',4,$role_id_2,'','322','325'),
            $this->create($work_process_id,'325','【成交信息】领导审批',5,$role_id_3,'','322','329'),
            $this->create($work_process_id,'329','【成交信息】确认',6,$role_id_4,'','322','331'),

//成交公告（评标版）
            $this->create($work_process_id,'331','【成交公告】录入',1,$role_id_0,'','','333'),
            $this->create($work_process_id,'332','【成交公告】退回',2,$role_id_0,'','','333'),
            $this->create($work_process_id,'333','【成交公告】部门审批',3,$role_id_1,'','332','334'),
            $this->create($work_process_id,'334','【成交公告】风控审批',4,$role_id_2,'','332','335'),
            $this->create($work_process_id,'335','【成交公告】领导审批',5,$role_id_3,'','332','339'),
            $this->create($work_process_id,'339','【成交公告】发布',6,$role_id_4,'','332','341'),

//中标通知
            $this->create($work_process_id,'341','【中标通知】录入',1,$role_id_0,'','','343'),
            $this->create($work_process_id,'342','【中标通知】退回',2,$role_id_0,'','','343'),
            $this->create($work_process_id,'343','【中标通知】部门审批',3,$role_id_1,'','342','344'),
            $this->create($work_process_id,'344','【中标通知】风控审批',4,$role_id_2,'','342','345'),
            $this->create($work_process_id,'345','【中标通知】领导审批',5,$role_id_3,'','342','349'),
            $this->create($work_process_id,'349','【中标通知】确认',6,$role_id_4,'','342','351'),
//收费通知
            $this->create($work_process_id,'351','【收费通知】录入',1,$role_id_0,'','','353'),
            $this->create($work_process_id,'352','【收费通知】退回',2,$role_id_0,'','','353'),
            $this->create($work_process_id,'353','【收费通知】部门审批',3,$role_id_1,'','352','354'),
            $this->create($work_process_id,'354','【收费通知】风控审批',4,$role_id_2,'','352','355'),
            $this->create($work_process_id,'355','【收费通知】领导审批',5,$role_id_3,'','352','359'),
            $this->create($work_process_id,'359','【收费通知】确认',6,$role_id_4,'','352','361'),

//上传合同
            $this->create($work_process_id,'361','【合同】上传',1,$role_id_0,'','','999'),


            $this->create($work_process_id,'999','【结束】',6,$role_id_0,'','',''),

        ];
        return $nodes;
    }


}

