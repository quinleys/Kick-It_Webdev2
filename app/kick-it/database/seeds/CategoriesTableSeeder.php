<?php


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Art',

        ]);
        DB::table('categories')->insert([
            'name' => 'Comics & Illustration',

        ]);
        DB::table('categories')->insert([
            'name' => 'Design & Tech',

        ]);
        DB::table('categories')->insert([
            'name' => 'Film',

        ]);
        DB::table('categories')->insert([
            'name' => 'Food & Craft',

        ]);
        DB::table('categories')->insert([
            'name' => 'Games',

        ]);
        DB::table('categories')->insert([
            'name' => 'Music',

        ]);
    }
}
