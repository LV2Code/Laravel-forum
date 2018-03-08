<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run() {
         

        App\User::create([

            'admin' => 1,
            'name' => 'admin',
            'email' => 'admin@forum.com',
            'password' => bcrypt( 'admin' ),
            'avatar' => asset( 'avatars/avatar.png' ),
        ]);

        App\User::create([

            'name' => 'Sample User',
            'email' => 'sample@forum.com',
            'password' => bcrypt( 'password' ),
            'avatar' => asset( 'avatars/avatar.png' ),
        ]);
    }
}
