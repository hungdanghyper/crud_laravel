<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Thể thao',
            ],
            [
                'name' => 'Kinh Tế',
            ],
            [
                'name' => 'Âm nhạc',
            ],
            [
                'name' => 'Điện ảnh',
            ],
            [
                'name' => 'Showbiz',
            ]
        ]);
    }
}
