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
        User::create([
            'name' => 'eduardo roa',
            'email' =>'eduardoroa22@gmail.com',
            'password' => bcrypt(19134072)
        ]);

        User::factory(99)->create();
    }
}
