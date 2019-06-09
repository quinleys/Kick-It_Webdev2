<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'project_id' => 1,
            'filepath' => 'storage/project-1',
            'filename' => 'project-1.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('images')->insert([
            'project_id' => 1,
            'filepath' => 'storage/project-1',
            'filename' => 'project-1_1.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('images')->insert([
            'project_id' => 2,
            'filepath' => 'storage/project-2',
            'filename' => 'project-2.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('images')->insert([
            'project_id' => 2,
            'filepath' => 'storage/project-2',
            'filename' => 'project-2_1.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('images')->insert([
            'project_id' => 3,
            'filepath' => 'storage/project-3',
            'filename' => 'project-3.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('images')->insert([
            'project_id' => 3,
            'filepath' => 'storage/project-3',
            'filename' => 'project-3_1.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('images')->insert([
            'project_id' => 4,
            'filepath' => 'storage/project-4',
            'filename' => 'project-4.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('images')->insert([
            'project_id' => 4,
            'filepath' => 'storage/project-4',
            'filename' => 'project-4_1.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('images')->insert([
            'project_id' => 5,
            'filepath' => 'storage/project-5',
            'filename' => 'project-5.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        
        DB::table('images')->insert([
            'project_id' => 6,
            'filepath' => 'storage/project-6',
            'filename' => 'project-6.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('images')->insert([
            'project_id' => 6,
            'filepath' => 'storage/project-6',
            'filename' => 'project-6_1.png',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);

    }
}
