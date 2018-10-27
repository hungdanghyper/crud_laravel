<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('types')->insert(
            [
                [
                    'name'=>'Bóng Đá',
                    'id_category' => 1
                ],
                [
                    'name'=>'Võ thuật',
                    'id_category' => 1
                ],
                [
                    'name'=>'Chứng Khoán',
                    'id_category' => 2
                ],
                [
                    'name'=>'Sao Việt',
                    'id_category' => 5
                ],
                [
                    'name'=>'Sao Hàn',
                    'id_category' => 5
                ]
            ]
                );
    }
}
