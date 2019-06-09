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
            'name' => "A pledge has a life of its own.",
            'intro' => "Backing a project is about more than money. You’re getting behind an internet stranger’s creative vision—and that support can have profound ripple effects. Here’s how a few standout projects went on to change the world around them.",
            'description' => "Backing a project is about more than money. You’re getting behind an internet stranger’s creative vision—and that support can have profound ripple effects. Here’s how a few standout projects went on to change the world around them. Backing a project is about more than money. You’re getting behind an internet stranger’s creative vision—and that support can have profound ripple effects. Here’s how a few standout projects went on to change the world around them.",
            'user_id' => 1,
            'image' => 'news.jpg',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53',
        ]);
    }
}
