<?php

use Illuminate\Database\Seeder;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            'title' => 'Who are we?',
            'hometitle' => 'Who are we?',
            'intro' => 'We are kick-it! The perfect place to share you ideas and show your projects! This website is made for Webdev 2 Artevelde Hogeschool',
            'homeintro' => 'We are kick-it! The perfect place to share you ideas and show your projects! This website is made for Webdev 2 Artevelde Hogeschool',
            'bodytext' => "We are kick-it! The perfect place to share you ideas and show your projects! This website is made for Webdev 2 Artevelde HogeschoolWe are kick-it! The perfect place to share you ideas and show your projects! This website is made for Webdev 2 Artevelde Hogeschool",
            'image' => 'bg.jpg',
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
    }
}
