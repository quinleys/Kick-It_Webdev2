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
        $this->call(UsersTableSeeder::class);
        $this->call(ProjectsTable::class);
        $this->call(PostsTable::class);
        $this->call(CategoriesTable::class);
        $this->call(TagsTable::class);
    }
}
