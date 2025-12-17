<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'bank_id',
        'gender',
        'fees_type',
        'fees_amount',
        'paid_date',
        'file',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }


    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
