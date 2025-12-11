<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'logo',
        'favicon',
        'banner',
        'mobile',
        'phone',
        'email',
        'address',
        'created_by',
        'updated_by',
    ];
}
