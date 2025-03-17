<?php

use App\User;
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
        $user = User::create([
            'name'      => 'Mochamad Rizki',
            'email'     => 'rizkilabs.dev@gmail.com',
            'password'  => bcrypt('password')
        ]);
    }
}
