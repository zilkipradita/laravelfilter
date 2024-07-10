<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class User_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        User::create([
            'username'        => 'zilkipradita',
            'password'        => Hash::make('12345678'),
            'nama'            => 'Zilki Pradita',
            'telp'            => '087823358555',
            'email'           => 'mr.zilkipradita@gmail.com',
            'user_levels_id'  => '1',
        ]);
    }
}
