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
            'name' => 'Admin Person',
            'email' => 'admin@imtalk.com',
            'password' => bcrypt('password'),
            'privilege' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'User Person',
            'email' => 'user@imtalk.com',
            'password' => bcrypt('password'),
            'privilege' => 'user',
        ]);
    }
}
