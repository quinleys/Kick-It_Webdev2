<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'title' => 'No extra',
            'description' => 'With this package you get nothing, but thank you for the support!',
            'min_value' => 0,
            'max_value' => 100,
            'project_id' => 1,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53',
        ]);
        DB::table('packages')->insert([
            'title' => 'No extra',
            'description' => 'With this package you get nothing, but thank you for the support!',
            'min_value' => 0,
            'max_value' => 100,
            'project_id' => 2,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53',
        ]);
        DB::table('packages')->insert([
            'title' => 'No extra',
            'description' => 'With this package you get nothing, but thank you for the support!',
            'min_value' => 0,
            'max_value' => 100,
            'project_id' => 3,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53',
        ]);
        DB::table('packages')->insert([
            'title' => 'No extra',
            'description' => 'With this package you get nothing, but thank you for the support!',
            'min_value' => 0,
            'max_value' => 100,
            'project_id' => 4,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53',
        ]);
        DB::table('packages')->insert([
            'title' => 'No extra',
            'description' => 'With this package you get nothing, but thank you for the support!',
            'min_value' => 0,
            'max_value' => 100,
            'project_id' => 5,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53',
        ]);
        DB::table('packages')->insert([
            'title' => 'No extra',
            'description' => 'With this package you get nothing, but thank you for the support!',
            'min_value' => 0,
            'max_value' => 100,
            'project_id' => 6,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53',
        ]);
    }
}
