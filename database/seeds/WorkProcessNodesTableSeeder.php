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
        $cqzr = $this->createCqzr();
        $zzkg = $this->createZzkg();
        $zczr = $this->createZczr();
        $rows = array_merge($zczl,$qycg,$yxdj,$cqzr,$zzkg,$zczr);

        // 将数据集合插入到数据库中
        WorkProcessNode::insert($rows);
    }

    private $roles = [2,3,4,5,6,8,9];

    private function create($work_process_id,$sub_process_code,$sub_end,$code,$name,$seq,$role_id,$jurisdiction,$back_node_code,$next_node_code){
        $row = [
            'id' => (string)Str::uuid(),
            'sub_process_code' => $sub_process_code,
            'sub_end' => $sub_end,
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




    private function createYxdj(){
        $work_process_id = $this->getProcessId('yxdj');
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[4];//综合部，发布
        $nodes = [
            $this->create($work_process_id,'10',2,'11','【意向登记】录入',1,$role_id_0,'','','13'),
            $this->create($work_process_id,'10',2,'12','【意向登记】退回',2,$role_id_0,'','','13'),
            $this->create($work_process_id,'10',2,'13','【意向登记】部门审批',3,$role_id_1,'','12','14'),
            $this->create($work_process_id,'10',2,'14','【意向登记】风控审批',4,$role_id_2,'','12','15'),
            $this->create($work_process_id,'10',2,'15','【意向登记】领导审批',5,$role_id_3,'','12','19'),
            $this->create($work_process_id,'10',1,'19','【意向登记】确认登记',6,$role_id_0,'','12','20'),
            $this->create($work_process_id,'10',1,'20','【意向登记】完成登记',6,$role_id_0,'','',''),
        ];
        return $nodes;
    }

    //项目呈批
    private function createXmcp($work_process_id){
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[5];//总经理，4级审批
        $role_id_5 = $this->roles[6];//董事长，5级审批
        $role_id_6 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,'111','【呈批】录入中',1,$role_id_0,'','','113'),
            $this->create($work_process_id,'112','【呈批】已退回',2,$role_id_0,'','','113'),
            $this->create($work_process_id,'113','【呈批】业务复核',3,null,'','112','114'),
            $this->create($work_process_id,'114','【呈批】部门审批',4,$role_id_1,'','112','115'),
            $this->create($work_process_id,'115','【呈批】风控审批',5,$role_id_2,'','112','116'),
            $this->create($work_process_id,'116','【呈批】分管领导审批',6,$role_id_3,'','112','117'),
            $this->create($work_process_id,'117','【呈批】总经理审批',7,$role_id_4,'','112',null),
            $this->create($work_process_id,'118','【呈批】董事长审批',8,$role_id_5,'','112','121'),
        ];
        return $nodes;
    }

    //项目发布
    private function createXmfb($work_process_id){
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[5];//总经理，4级审批
        $role_id_5 = $this->roles[6];//董事长，5级审批
        $role_id_6 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,'121','【挂牌】录入中',1,$role_id_0,'','','120'),
        ];
        return $nodes;
    }

    //联合资格审查
    private function createLhzgsc($work_process_id,$nextnode){
        $lr = 131;
        $th = 132;
        $sp1 = 133;
        $sp2 = 134;
        $sp3 = 135;
        $sp4 = 136;
        $sp5 = 139;
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[5];//总经理，4级审批
        $role_id_5 = $this->roles[6];//董事长，5级审批
        $role_id_6 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,$lr,'【联合资格审查】录入中',1,$role_id_0,'','',$sp1),
            $this->create($work_process_id,$th,'【联合资格审查】已退回',2,$role_id_0,'','',$sp1),
            $this->create($work_process_id,$sp1,'【联合资格审查】部门审批',3,$role_id_1,'',$th,$sp2),
            $this->create($work_process_id,$sp2,'【联合资格审查】风控审批',4,$role_id_2,'',$th,$sp3),
            $this->create($work_process_id,$sp3,'【联合资格审查】分管领导审批',5,$role_id_3,'',$th,$sp4),
            $this->create($work_process_id,$sp4,'【联合资格审查】总经理审批',6,$role_id_4,'',$th,$nextnode),
        ];
        return $nodes;
    }

    //联合资格审查
    private function createLhzgscjgqr($work_process_id,$nextnode){
        $lr = 141;
        $th = 142;
        $sp1 = 143;
        $sp2 = 144;
        $sp3 = 145;
        $sp4 = 146;
        $sp5 = 149;
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[5];//总经理，4级审批
        $role_id_5 = $this->roles[6];//董事长，5级审批
        $role_id_6 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,$lr,'【联合资格审查】录入中',1,$role_id_0,'','',$sp1),
            $this->create($work_process_id,$th,'【联合资格审查】已退回',2,$role_id_0,'','',$sp1),
            $this->create($work_process_id,$sp1,'【联合资格审查】部门审批',3,$role_id_1,'',$th,$sp2),
            $this->create($work_process_id,$sp2,'【联合资格审查】风控审批',4,$role_id_2,'',$th,$sp3),
            $this->create($work_process_id,$sp3,'【联合资格审查】分管领导审批',5,$role_id_3,'',$th,$sp4),
            $this->create($work_process_id,$sp4,'【联合资格审查】总经理审批',6,$role_id_4,'',$th,$nextnode),
        ];
        return $nodes;
    }


    /**
     *子流程
     * $work_process_id
     * $startnode 开始节点
     * $nextnode 子流程结束后的下一个节点
     * $subname 子流程名称
     */
    private function subProcess($work_process_id,$sub_code,$startnode,$nextnode,$subName){
        $lr = $startnode;
        $th = $startnode+1;
        $sp1 = $startnode+2;
        $sp2 = $startnode+3;
        $sp3 = $startnode+4;
        $sp4 = $startnode+5;
        $sp5 = $startnode+8;
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[5];//总经理，4级审批
        $role_id_5 = $this->roles[4];//综合
        
        $nodes = [
            $this->create($work_process_id,$sub_code,2,$lr,'【'.$subName.'】录入中',1,$role_id_0,'','',$sp1),
            $this->create($work_process_id,$sub_code,2,$th,'【'.$subName.'】已退回',2,$role_id_0,'','',$sp1),
            $this->create($work_process_id,$sub_code,2,$sp1,'【'.$subName.'】部门审批',3,$role_id_1,'',$th,$sp2),
            $this->create($work_process_id,$sub_code,2,$sp2,'【'.$subName.'】风控审批',4,$role_id_2,'',$th,$sp3),
            $this->create($work_process_id,$sub_code,2,$sp3,'【'.$subName.'】分管领导审批',5,$role_id_3,'',$th,$sp4),
            $this->create($work_process_id,$sub_code,1,$sp4,'【'.$subName.'】总经理审批',6,$role_id_4,'',$th,$nextnode),
        ];
        
        return $nodes;
    }

    //企业采购
    private function createQycg(){
        $work_process_id = $this->getProcessId('qycg');
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[5];//总经理，4级审批
        $role_id_5 = $this->roles[6];//董事长，5级审批
        $role_id_6 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,'11',2,'111','【呈批】录入中',1,$role_id_0,'','','113'),
            $this->create($work_process_id,'11',2,'112','【呈批】已退回',2,$role_id_0,'','','113'),
            $this->create($work_process_id,'11',2,'113','【呈批】业务复核',3,null,'','112','114'),
            $this->create($work_process_id,'11',2,'114','【呈批】部门审批',4,$role_id_1,'','112','115'),
            $this->create($work_process_id,'11',2,'115','【呈批】风控审批',5,$role_id_2,'','112','116'),
            $this->create($work_process_id,'11',2,'116','【呈批】分管领导审批',6,$role_id_3,'','112','117'),
            $this->create($work_process_id,'11',2,'117','【呈批】总经理审批',7,$role_id_4,'','112',null),
            $this->create($work_process_id,'11',1,'118','【呈批】董事长审批',8,$role_id_5,'','112','121'),

            $this->create($work_process_id,'12',1,'121','【挂牌】录入中',1,$role_id_0,'','','120'),
            $this->create($work_process_id,'12',1,'120','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'99',1,'999','【结束】',1,$role_id_0,'','',''),
        ];

        $nodes = $rows = array_merge($nodes,
            $this->subProcess($work_process_id,'23',231,999,'流标'),
            $this->subProcess($work_process_id,'24',241,250,'中止'),
            $this->subProcess($work_process_id,'25',251,120,'恢复'),
            $this->subProcess($work_process_id,'26',261,999,'终结'),
            $this->subProcess($work_process_id,'27',271,120,'延期'),

            $this->subProcess($work_process_id,'15',151,161,'交易方式确定'),
            $this->subProcess($work_process_id,'16',161,171,'评标结果公示'),//
            $this->subProcess($work_process_id,'17',171,181,'成交信息录入'),
            $this->subProcess($work_process_id,'18',181,191,'成交公告'),
            $this->subProcess($work_process_id,'19',191,201,'中标通知'),
            $this->subProcess($work_process_id,'20',201,211,'收费通知'),
            $this->subProcess($work_process_id,'21',211,999,'合同')
            
        );
        // dd($nodes);
        return $nodes;
    }

    //资产租赁
    private function createZczl(){
        $work_process_id = $this->getProcessId('zczl');
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[5];//总经理，4级审批
        $role_id_5 = $this->roles[6];//董事长，5级审批
        $role_id_6 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,'11',2,'111','【呈批】录入中',1,$role_id_0,'','','113'),
            $this->create($work_process_id,'11',2,'112','【呈批】已退回',2,$role_id_0,'','','113'),
            $this->create($work_process_id,'11',2,'113','【呈批】业务复核',3,null,'','112','114'),
            $this->create($work_process_id,'11',2,'114','【呈批】部门审批',4,$role_id_1,'','112','115'),
            $this->create($work_process_id,'11',2,'115','【呈批】风控审批',5,$role_id_2,'','112','116'),
            $this->create($work_process_id,'11',2,'116','【呈批】分管领导审批',6,$role_id_3,'','112','117'),
            $this->create($work_process_id,'11',2,'117','【呈批】总经理审批',7,$role_id_4,'','112',null),
            $this->create($work_process_id,'11',1,'118','【呈批】董事长审批',8,$role_id_5,'','112','121'),

            $this->create($work_process_id,'12',1,'121','【挂牌】录入中',1,$role_id_0,'','','120'),
            $this->create($work_process_id,'12',1,'120','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'99',1,'999','【结束】',1,$role_id_0,'','',''),
        ];

        $nodes = $rows = array_merge($nodes,
            $this->subProcess($work_process_id,'23',231,999,'流标'),
            $this->subProcess($work_process_id,'24',241,250,'中止'),
            $this->subProcess($work_process_id,'25',251,120,'恢复'),
            $this->subProcess($work_process_id,'26',261,999,'终结'),
            $this->subProcess($work_process_id,'27',271,120,'延期'),

            $this->subProcess($work_process_id,'13',131,141,'联合资格审查'),
            $this->subProcess($work_process_id,'14',141,151,'确认联合资格审查'),
            $this->subProcess($work_process_id,'15',151,171,'交易方式确定'),
            $this->subProcess($work_process_id,'17',171,181,'成交信息录入'),
            $this->subProcess($work_process_id,'18',181,191,'成交公告'),
            $this->subProcess($work_process_id,'19',191,201,'中标通知'),
            $this->subProcess($work_process_id,'20',201,211,'收费通知'),
            $this->subProcess($work_process_id,'21',211,999,'合同')
            
        );
        // dd($nodes);
        return $nodes;
    }

    //产权转让
    private function createCqzr(){
        $work_process_id = $this->getProcessId('cqzr');
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[5];//总经理，4级审批
        $role_id_5 = $this->roles[6];//董事长，5级审批
        $role_id_6 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,'11',2,'111','【呈批】录入中',1,$role_id_0,'','','113'),
            $this->create($work_process_id,'11',2,'112','【呈批】已退回',2,$role_id_0,'','','113'),
            $this->create($work_process_id,'11',2,'113','【呈批】业务复核',3,null,'','112','114'),
            $this->create($work_process_id,'11',2,'114','【呈批】部门审批',4,$role_id_1,'','112','115'),
            $this->create($work_process_id,'11',2,'115','【呈批】风控审批',5,$role_id_2,'','112','116'),
            $this->create($work_process_id,'11',2,'116','【呈批】分管领导审批',6,$role_id_3,'','112','117'),
            $this->create($work_process_id,'11',2,'117','【呈批】总经理审批',7,$role_id_4,'','112',null),
            $this->create($work_process_id,'11',1,'118','【呈批】董事长审批',8,$role_id_5,'','112','121'),

            $this->create($work_process_id,'12',1,'121','【挂牌】录入中',1,$role_id_0,'','','120'),
            $this->create($work_process_id,'12',1,'120','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'99',1,'999','【结束】',1,$role_id_0,'','',''),
        ];

        $nodes = $rows = array_merge($nodes,
            $this->subProcess($work_process_id,'23',231,999,'流标'),
            $this->subProcess($work_process_id,'24',241,250,'中止'),
            $this->subProcess($work_process_id,'25',251,120,'恢复'),
            $this->subProcess($work_process_id,'26',261,999,'终结'),
            $this->subProcess($work_process_id,'27',271,120,'延期'),

            $this->subProcess($work_process_id,'13',131,141,'联合资格审查'),
            $this->subProcess($work_process_id,'14',141,151,'确认联合资格审查'),
            $this->subProcess($work_process_id,'15',151,171,'交易方式确定'),
            $this->subProcess($work_process_id,'17',171,191,'成交信息录入'),
            $this->subProcess($work_process_id,'19',191,201,'中标通知'),
            $this->subProcess($work_process_id,'20',201,211,'收费通知'),
            $this->subProcess($work_process_id,'21',211,221,'合同'),
            $this->subProcess($work_process_id,'22',221,181,'交易鉴证'),
            $this->subProcess($work_process_id,'18',181,999,'成交公告')
        );
        // dd($nodes);
        return $nodes;
    }

    //增资扩股
    private function createZzkg(){
        $work_process_id = $this->getProcessId('zzkg');
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[5];//总经理，4级审批
        $role_id_5 = $this->roles[6];//董事长，5级审批
        $role_id_6 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,'11',2,'111','【呈批】录入中',1,$role_id_0,'','','113'),
            $this->create($work_process_id,'11',2,'112','【呈批】已退回',2,$role_id_0,'','','113'),
            $this->create($work_process_id,'11',2,'113','【呈批】业务复核',3,null,'','112','114'),
            $this->create($work_process_id,'11',2,'114','【呈批】部门审批',4,$role_id_1,'','112','115'),
            $this->create($work_process_id,'11',2,'115','【呈批】风控审批',5,$role_id_2,'','112','116'),
            $this->create($work_process_id,'11',2,'116','【呈批】分管领导审批',6,$role_id_3,'','112','117'),
            $this->create($work_process_id,'11',2,'117','【呈批】总经理审批',7,$role_id_4,'','112',null),
            $this->create($work_process_id,'11',1,'118','【呈批】董事长审批',8,$role_id_5,'','112','121'),

            $this->create($work_process_id,'12',1,'121','【挂牌】录入中',1,$role_id_0,'','','120'),
            $this->create($work_process_id,'12',1,'120','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'99',1,'999','【结束】',1,$role_id_0,'','',''),
        ];

        $nodes = $rows = array_merge($nodes,
            $this->subProcess($work_process_id,'23',231,999,'流标'),
            $this->subProcess($work_process_id,'24',241,250,'中止'),
            $this->subProcess($work_process_id,'25',251,120,'恢复'),
            $this->subProcess($work_process_id,'26',261,999,'终结'),
            $this->subProcess($work_process_id,'27',271,120,'延期'),

            $this->subProcess($work_process_id,'13',131,141,'联合资格审查'),
            $this->subProcess($work_process_id,'14',141,151,'确认联合资格审查'),
            $this->subProcess($work_process_id,'15',151,171,'交易方式确定'),
            $this->subProcess($work_process_id,'17',171,191,'成交信息录入'),
            $this->subProcess($work_process_id,'19',191,201,'中标通知'),
            $this->subProcess($work_process_id,'20',201,211,'收费通知'),
            $this->subProcess($work_process_id,'21',211,221,'合同'),
            $this->subProcess($work_process_id,'22',221,181,'交易鉴证'),
            $this->subProcess($work_process_id,'18',181,999,'成交公告')
        );
        // dd($nodes);
        return $nodes;
    }

    //资产转让
    private function createZczr(){
        $work_process_id = $this->getProcessId('zczr');
        //角色ID
        $role_id_0 = $this->roles[0];//业务员
        $role_id_1 = $this->roles[1];//部门，1级审批
        $role_id_2 = $this->roles[2];//风控，2级审批
        $role_id_3 = $this->roles[3];//领导，3级审批
        $role_id_4 = $this->roles[5];//总经理，4级审批
        $role_id_5 = $this->roles[6];//董事长，5级审批
        $role_id_6 = $this->roles[4];//综合部，发布
        
        $nodes = [
            $this->create($work_process_id,'11',2,'111','【呈批】录入中',1,$role_id_0,'','','113'),
            $this->create($work_process_id,'11',2,'112','【呈批】已退回',2,$role_id_0,'','','113'),
            $this->create($work_process_id,'11',2,'113','【呈批】业务复核',3,null,'','112','114'),
            $this->create($work_process_id,'11',2,'114','【呈批】部门审批',4,$role_id_1,'','112','115'),
            $this->create($work_process_id,'11',2,'115','【呈批】风控审批',5,$role_id_2,'','112','116'),
            $this->create($work_process_id,'11',2,'116','【呈批】分管领导审批',6,$role_id_3,'','112','117'),
            $this->create($work_process_id,'11',2,'117','【呈批】总经理审批',7,$role_id_4,'','112',null),
            $this->create($work_process_id,'11',1,'118','【呈批】董事长审批',8,$role_id_5,'','112','121'),

            $this->create($work_process_id,'12',1,'121','【挂牌】录入中',1,$role_id_0,'','','120'),
            $this->create($work_process_id,'12',1,'120','挂牌中',7,$role_id_0,'','',''),

            $this->create($work_process_id,'99',1,'999','【结束】',1,$role_id_0,'','',''),
        ];

        $nodes = $rows = array_merge($nodes,
            $this->subProcess($work_process_id,'23',231,999,'流标'),
            $this->subProcess($work_process_id,'24',241,250,'中止'),
            $this->subProcess($work_process_id,'25',251,120,'恢复'),
            $this->subProcess($work_process_id,'26',261,999,'终结'),
            $this->subProcess($work_process_id,'27',271,120,'延期'),

            $this->subProcess($work_process_id,'13',131,141,'联合资格审查'),
            $this->subProcess($work_process_id,'14',141,151,'确认联合资格审查'),
            $this->subProcess($work_process_id,'15',151,171,'交易方式确定'),
            $this->subProcess($work_process_id,'17',171,191,'成交信息录入'),
            $this->subProcess($work_process_id,'19',191,201,'中标通知'),
            $this->subProcess($work_process_id,'20',201,211,'收费通知'),
            $this->subProcess($work_process_id,'21',211,221,'合同'),
            $this->subProcess($work_process_id,'22',221,181,'交易鉴证'),
            $this->subProcess($work_process_id,'18',181,999,'成交公告')
        );
        // dd($nodes);
        return $nodes;
    }

}

