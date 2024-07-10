<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_filter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
		'telp',
		'gender',
        'province',
        'city',
        'address',
    ];
}
