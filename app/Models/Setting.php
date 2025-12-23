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
        'chairman_avatar',
        'chairman_name',
        'chairman_designation',
        'chairman_message',
        'principal_avatar',
        'principal_name',
        'principal_designation',
        'principal_message',
        'mission',
        'vision',
        'created_by',
        'updated_by',
    ];
}