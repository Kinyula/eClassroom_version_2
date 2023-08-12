<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone_number',
        'gender',
        'course_name',
        'department_name',
        'status'
    ];

    public function department(){

        return $this->belongsTo(Department::class);
    }

    public function instructor(){

        return $this->hasMany(Instructors::class);
    }



    public function user(){

        return $this->hasOne(User::class);
    }
    
}
