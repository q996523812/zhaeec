<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'        => '企业采购',
                'description' => 'qycg',
            ],
            [
                'name'        => '资产租赁',
                'description' => 'zczl',
            ],
            [
                'name'        => '增资扩股',
                'description' => 'zzkg',
            ],
            [
                'name'        => '资产转让',
                'description' => 'zczr',
            ],
            [
                'name'        => '产权转让',
                'description' => 'cqzr',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    private function create($id,$name,$description){
        $row = [
            'name' => $name,
            'description' => $description,
        ];
        return $row;
    }
}
