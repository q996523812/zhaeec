<?php

use Illuminate\Database\Seeder;
use App\Models\Acount;

class AcountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
        	$this->create('珠海产权交易中心有限责任公司','中国农业银行珠海拱北支行','44350401040016913',1,1),
        	$this->create('珠海产权交易中心有限责任公司','中国工商银行珠海市丽景支行','2002022709100085230',1,2),
        ];

        // 将数据集合插入到数据库中
        Acount::insert($rows);
    }

    /**
     *@param name
     *@param bank
     *@param code
     *@param default 是否默认账号：0，否；1：是；
     *@param type 账户类型：1：保证金，2：服务费；
     *@return
     */
    private function create($name,$bank,$code,$default,$type){
        $row = [
            'name' => $name,
            'bank' => $bank,
            'code' => $code,
            'default' => $default,
            'type' => $type,
            'created_at' => now(),
        ];
        return $row;
    }
}
