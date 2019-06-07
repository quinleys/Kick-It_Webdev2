<?php


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'name' => Str::random(10),
            'intro' => Str::random(30),
            'description' => Str::random(300),
            'user_id' => 1,
            'image' => 'default.jpg',
        ]);
    }
}
