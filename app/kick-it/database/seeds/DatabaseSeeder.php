<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            TagsTableSeeder::class,
            CategoriesTableSeeder::class,
            PrivacysTableSeeder::class,
            AboutsTableSeeder::class,
            ProjectsTableSeeder::class,
            ImagesTableSeeder::class,
            Project_TagTableSeeder::class,
            PackagesTableSeeder::class,
            CommentsTableSeeder::class,
            DonationsTableSeeder::class,
            
        ]);
    }
}
