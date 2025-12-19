<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'roll',
        'blood_group',
        'religion',
        'semester',
        'email',
        'class',
        'section',
        'department',
        'phone',
        'file',
    ];
}
