<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'name' => 'admin',
            'approved' => true ,
            'project_id' => 1 ,
            'user_id' => 1,
            'comment' => 'Very cool project!',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('comments')->insert([
            'name' => 'Quinten',
            'approved' => true ,
            'project_id' => 1 ,
            'user_id' => 2,
            'comment' => 'Amazing!',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('comments')->insert([
            'name' => 'Fa',
            'approved' => true ,
            'project_id' => 2 ,
            'user_id' => 3,
            'comment' => 'Big Fan!',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('comments')->insert([
            'name' => 'Mela',
            'approved' => true ,
            'project_id' => 3 ,
            'user_id' => 4,
            'comment' => 'So cool!',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('comments')->insert([
            'name' => 'Admin',
            'approved' => true ,
            'project_id' => 4 ,
            'user_id' => 1,
            'comment' => 'Funny!',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('comments')->insert([
            'name' => 'Mela',
            'approved' => true ,
            'project_id' => 5 ,
            'user_id' => 4,
            'comment' => 'Worth donating!',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('comments')->insert([
            'name' => 'Fa',
            'approved' => true ,
            'project_id' => 6 ,
            'user_id' => 3,
            'comment' => 'Nicely done!',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
    }
}
