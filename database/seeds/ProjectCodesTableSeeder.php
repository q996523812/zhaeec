<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\ProjectCode;

class ProjectCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
        	$this->create(1,'采购项目实质进场业务','qycg','CGJ',1),
        	$this->create(2,'采购项目信息公示业务','qycg2','CG',1),
        	$this->create(3,'经营权出让业务信息公示','jyq','CR',1),
        	$this->create(4,'企业产权','qycq','C',1),
        	$this->create(5,'实物资产','swzc','D',1),
        	$this->create(6,'信息预披露','ypl','YP',1),
        	$this->create(7,'增资扩股','zzkg','ZZ',1),
        	$this->create(8,'租赁项目信息公示','zczl','ZL',1),
        	$this->create(9,'物业租赁','wyzl','L',1),
        	$this->create(10,'中标通知','zbtz','ZB',1),
        	
        ];

        // 将数据集合插入到数据库中
        ProjectCode::insert($rows);
    }
    private function create($id,$type,$code,$template,$pointer){
        $row = [
            'id' => $id,
            'type' => $type,
            'code' => $code,
            'template' => 'ZHAEEC*'.$template,
            'pointer' => $pointer,
            'year' => 2019,
            'created_at' => now(),
        ];
        return $row;
    }      
}
