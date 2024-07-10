<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User_level;

class User_level_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        User_level::create(['id' => '1','nama' => 'Admin']);
        User_level::create(['id' => '2','nama' => 'User']);
    }
}
