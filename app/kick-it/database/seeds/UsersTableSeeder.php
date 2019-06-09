<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'fullname' => 'fullname',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'admin' => true,
            'avatar' => 'default.jpg',
            'credits' => 500
        ]);

        DB::table('users')->insert([
            'name' => 'Quinten',
            'fullname' => 'Quinten Leysen',
            'email' => 'quinten@leysen.com',
            'password' => bcrypt('secret'),
            'admin' => false,
            'avatar' => 'quinten.jpg',
            'credits' => 500
        ]);

        DB::table('users')->insert([
            'name' => 'Fa',
            'fullname' => 'Fatima de Fa',
            'email' => 'fa@fa.com',
            'password' => bcrypt('secret'),
            'admin' => false,
            'avatar' => 'fa.jpg',
            'credits' => 500
        ]);

        DB::table('users')->insert([
            'name' => 'Mela',
            'fullname' => 'Mela Ya',
            'email' => 'mela@ya.com',
            'password' => bcrypt('secret'),
            'admin' => false,
            'avatar' => 'mela.jpg',
            'credits' => 500
        ]);
    }
}
