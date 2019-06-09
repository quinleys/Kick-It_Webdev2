<?php

use Illuminate\Database\Seeder;

class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('donations')->insert([
            'project_id' => 1,
            'user_id' => 2 ,
            'amount' => 100,
            'package_id' => 1 ,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('donations')->insert([
            'project_id' => 2,
            'user_id' => 3 ,
            'amount' => 30,
            'package_id' => 2 ,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('donations')->insert([
            'project_id' => 3,
            'user_id' => 4 ,
            'amount' => 30,
            'package_id' => 3 ,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('donations')->insert([
            'project_id' => 4,
            'user_id' => 3 ,
            'amount' => 20,
            'package_id' => 4 ,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('donations')->insert([
            'project_id' => 5,
            'user_id' => 1 ,
            'amount' => 90,
            'package_id' => 5 ,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('donations')->insert([
            'project_id' => 6,
            'user_id' => 2 ,
            'amount' => 10,
            'package_id' => 6 ,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);

    }
    
}
