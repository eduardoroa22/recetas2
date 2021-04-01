<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // registro creado manualmente
        $user=User::create([
            'name' => 'eduardo roa',
            'email' =>'eduardoroa22@gmail.com',
            'password' => bcrypt(19134072)
        ]);

        $user->assignRole('Admin');

        User::factory(1)->create();
    }
}
