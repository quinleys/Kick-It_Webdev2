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
        DB::table('comments')->insert([
            'project_id' => 1,
            'user_id' => 2 ,
            'amount' => 100,
            'comment' => 'Very cool project!',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
    }
}
