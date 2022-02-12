<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::updateOrCreate(['id' => 1],[
            'name' => 'John Doe',
            'email'=> 'johndoe@johndoe.com',
            'password' => '$2y$10$T1OOFiEFv8jaEc9kKQR3Rehm8fq4MSDf.lYCDaqpu61uKL3k3MBDO' //password
        ]

        );
    }
}
