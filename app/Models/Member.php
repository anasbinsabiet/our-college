<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'phone',
        'joining_date',
        'qualification',
        'address',
        'city',
        'email',
        'religion',
        'country',
        'blood_group',
    ];
}
