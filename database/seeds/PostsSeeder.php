<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('posts')->insert([
            [
                'title' => 'Post 1',
                'id_type' => 1,
                'content' => str_random(200)
            ],
            [
                'title' => 'Post 2',
                'id_type' => 1,
                'content' => str_random(110)
            ],
            [
                'title' => 'Post 3',
                'id_type' => 2,
                'content' => str_random(150)
            ],
            [
                'title' => 'Post 4',
                'id_type' => 4,
                'content' => str_random(120)
            ],
            [
                'title' => 'Post 5',
                'id_type' => 4,
                'content' => str_random(140)
            ]
        ]);
    }
}
