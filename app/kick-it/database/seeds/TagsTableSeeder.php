<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'Cool',

        ]);
        DB::table('tags')->insert([
            'name' => 'Fun',

        ]);
        DB::table('tags')->insert([
            'name' => 'FirstTime',

        ]);
        DB::table('tags')->insert([
            'name' => 'Donate',

        ]);
        DB::table('tags')->insert([
            'name' => 'Beautiful',

        ]);
        DB::table('tags')->insert([
            'name' => 'Important',

        ]);
        DB::table('tags')->insert([
            'name' => 'Proud',

        ]);
    }
}
