<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_hod',
        'gender',
        'date_of_birth',
        'phone',
        'joining_date',
        'leaving_date',
        'address',
        'designation',
        'department_id',
        'avatar',
        'email',
        'religion',
        'country',
        'blood_group',
        'status',
        'created_by'
    ];
}
