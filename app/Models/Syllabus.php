<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;
    protected $table = 'syllabus';
    protected $fillable = [
        'title',
        'department_id',
        'file',
        'created_by',
        'updated_by',
    ];
    public function department()
    {
        return $this->hasMany(Department::class, 'id', 'department_id');
    }
}
