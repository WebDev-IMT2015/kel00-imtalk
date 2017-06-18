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
            'email' => 'admin@imtalk.com',
            'password' => bcrypt('password'),
            'privilege' => 'admin',
        ]);

        DB::table('users')->insert([
            'email' => 'user@imtalk.com',
            'password' => bcrypt('password'),
            'privilege' => 'user',
        ]);
    }
}
