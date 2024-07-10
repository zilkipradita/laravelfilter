<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User_filter;

class User_Filter_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $createMultipleUsers = [
            [
                'name'            => 'Zilki Pradita',
                'telp'            => '087823358555',
                'gender'          => 'male',
                'province'        => 'West Java',
                'city'            => 'Bandung',
                'address'         => 'Jl. Raya No. 1',
            ],[
                'name'            => 'Altan',
                'telp'            => '087823358888',
                'gender'          => 'male',
                'province'        => 'West Java',
                'city'            => 'Cimahi',
                'address'         => 'Jl. Raya No. 2',
            ],[
                'name'            => 'Sandy',
                'telp'            => '087823358777',
                'gender'          => 'female',
                'province'        => 'DKI Jakarta',
                'city'            => 'Center Jakarta',
                'address'         => 'Jl. Raya No. 3',
            ],[
                'name'            => 'Thomas',
                'telp'            => '087823354444',
                'gender'          => 'male',
                'province'        => 'Bali',
                'city'            => 'Denpasar',
                'address'         => 'Jl. Raya No. 4',
            ],[
                'name'            => 'Tina',
                'telp'            => '087823359999',
                'gender'          => 'female',
                'province'        => 'Papua',
                'city'            => 'Jayapura',
                'address'         => 'Jl. Raya No. 5',
            ]
        ];

        User_filter::insert($createMultipleUsers);
    }
}
