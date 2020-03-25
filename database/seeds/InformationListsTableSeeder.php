<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\InformationList;

class InformationListsTableSeeder extends Seeder
{
    public function run()
    {
        $rows = [
        	$this->create('cqzr','产权转让信息发布申请书','原件、复印件','1',null,'广东联合产权交易中心提供样本，转让方填写完善后盖章'),
        	$this->create('cqzr','产权交易委托合同','原件、复印件','1',null,''),
        	$this->create('cqzr','产权转让的可行性研究和论证方案','原件、复印件','1',null,''),
        	$this->create('cqzr','企业国有产权登记证明','原件、复印件','1',null,''),
        	$this->create('cqzr','企业营业执照或法人证书','原件、复印件','1',null,'如为外商投资企业的，还需提供外商投资企业批准证书'),
        	$this->create('cqzr','公司章程','原件、复印件','1',null,'加盖工商查询章'),
        	$this->create('cqzr','上级批准文件','原件、复印件','1',null,''),
        	$this->create('cqzr','总经理办公会或股东会或董事会决议等内部决策文件','原件、复印件','1',null,''),
        	$this->create('cqzr','资产评估结果备案表或核准文件','原件、复印件','1',null,''),
        	$this->create('cqzr','授权委托书','原件、复印件','1',null,''),
        	$this->create('cqzr','受托人身份证复印件','原件、复印件','1',null,''),
        	$this->create('cqzr','竞价文件(如有）','原件、复印件','1',null,''),
        	$this->create('cqzr','法定代表人身份证复印件','原件、复印件','1',null,''),
        	$this->create('cqzr','产权交易合同（范本）','原件、复印件','1',null,''),
        	
        	$this->create('cqzr','转让信息公告要求的其他材料','原件、复印件','2','0',''),
        	$this->create('cqzr','联合受让协议','原件、复印件','2','0',''),
        	$this->create('cqzr','授权委托书原件及受托人身份证复印件','原件、复印件','2','0',''),
        	$this->create('cqzr','产权受让申请书','原件、复印件','2','0',''),
        	$this->create('cqzr','法定代表人或负责人身份证明书','原件、复印件','2','2',''),
        	$this->create('cqzr','法定代表人或负责人证件','原件、复印件','2','2',''),
        	$this->create('cqzr','有权决策机构同意受让交易标的的决议复印件内部决议','原件、复印件','2','2',''),
        	$this->create('cqzr','公司章程','原件、复印件','2','2',''),
        	$this->create('cqzr','企业营业执照或单位法人证书或其他企业合法经营证明复印件','原件、复印件','2','2',''),
        	$this->create('cqzr','自然人有效身份证明','原件、复印件','2','1',''),


        	$this->create('zzkg','增资信息发布申请书','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','营业执照','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','公司章程复印件','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','组织机构代码证复印件','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','《企业国有资产产权登记表》或相关说明','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','主管部门批复','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','总经理办公会决议、股东会决议、董事会决议','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','近三年年度审计报告','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','近一期财务报表','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','资产评估报告或估值报告','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','资产评估备案表或核准文件','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','增资协议','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','投资价值分析','原件 复印件 电子版','2',null,''),
        	$this->create('zzkg','身份验证','原件 复印件 电子版','2',null,''),
        	
        	$this->create('zzkg','意向投资方承诺函','原件、复印件','2','0',''),
        	$this->create('zzkg','情况说明与承诺','原件、复印件','2','0',''),
        	$this->create('zzkg','尽职调查资料','原件、复印件','2','0',''),
        	$this->create('zzkg','企业增资扩股投资申请书','原件、复印件','2','0',''),

        	$this->create('zczr','房产证复印件','原件 复印件 电子版','2',null,''),
        	$this->create('zczr','持有人身份证复印件','复印件 电子版','2',null,''),
        	
        	$this->create('zczr','联合受让其他材料','原件、复印件、电子版','2','0','如果联合受让，请提供此项'),
        	$this->create('zczr','受理申请书','原件、复印件','2','0',''),
        	$this->create('zczr','交易申请函','复印件、电子版','2','0',''),
        	$this->create('zczr','税务登记证','原件、复印件','2','2',''),
        	$this->create('zczr','法人证明件','原件、复印件、电子版','2','2',''),
        	$this->create('zczr','身份证复印件文件','原件、复印件','2','1',''),
        	
        ];

        // 将数据集合插入到数据库中
        InformationList::insert($rows);
    }

    private function create($project_type,$information_name,$information_type,$applicable_party,$applicable_person,$memo){
        $row = [
        	'id' => (string)Str::uuid(),
            'project_type' => $project_type,
            'information_name' => $information_name,
            'information_type' => $information_type,
            'applicable_party' => $applicable_party,
            'applicable_person' => $applicable_person,
            'memo' => $memo,
            'created_at' => now(),
        ];
        return $row;
    }    
}
