<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_email',
        'employee_name',
        'employee_age',
        'employee_experience',
        'employee_photo',
        'employee_salary'
    ];
    public $timestamps = false;
}
