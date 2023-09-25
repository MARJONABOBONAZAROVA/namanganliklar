<?php

namespace Database\Seeders;

use App\Models\User;
Use App\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       $user = User::create([
            'name' => 'Marjona',
            'email' => 'admin@gmail.com',
            'password'=> Hash::make('admin12345'),

        ]);
        $user->assignRole([1]);


    $user = User::create([
        'name' => 'Admin',
        'email' => 'admin1@gmail.com',
        'password'=> Hash::make('admin12345'),

    ]);
    $user->assignRole([2]);

    $user = User::create([
        'name' => 'Admin Writer',
        'email' => 'writer@gmail.com',
        'password'=> Hash::make('admin12345'),

    ]);
    $user->assignRole([3]);
}

}
