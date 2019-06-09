<?php

use Illuminate\Database\Seeder;

class Project_TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_tag')->insert([
            'project_id' => 2,
            'tag_id'=> 3,
        ]);
        DB::table('project_tag')->insert([
            'project_id' => 1,
            'tag_id'=> 2,
        ]);
        DB::table('project_tag')->insert([
            'project_id' => 3,
            'tag_id'=> 1,
        ]);
        DB::table('project_tag')->insert([
            'project_id' => 4,
            'tag_id'=> 5,
        ]);
        DB::table('project_tag')->insert([
            'project_id' => 5,
            'tag_id'=> 1,
        ]);
        DB::table('project_tag')->insert([
            'project_id' => 6,
            'tag_id'=> 2,
        ]);
    }
}
