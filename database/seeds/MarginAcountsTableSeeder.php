<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\MarginAcount;

class MarginAcountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
        	$this->create('珠海产权交易中心有限责任公司','中国农业银行珠海拱北支行','44350401040016913',1),
            
        ];

        // 将数据集合插入到数据库中
        MarginAcount::insert($rows);
    }

    private function create($name,$bank,$account,$default){
        $row = [
            'name' => $name,
            'bank' => $bank,
            'account' => $account,
            'default' => $default,
            'created_at' => now(),
        ];
        return $row;
    }
}
