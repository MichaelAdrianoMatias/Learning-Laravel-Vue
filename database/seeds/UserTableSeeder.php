<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

            'name' => 'System Administrator',
            'password' => bcrypt('systemadmin'),
            'email' => 'admin@system.dev.com',
            'activated' => 1,
            'username' => 'systemadmin',
        ]);
    }
}
