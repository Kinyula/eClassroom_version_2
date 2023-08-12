<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
        'student_id',
        'instructor_id',

    ];


    public function course(){
        return $this->hasMany(Course::class);
    }

    
    public function student(){
        return $this->hasMany(Student::class);
    }

    
    public function instructor(){
        return $this->hasMany(Instructors::class);
    }

    public function subjects(){
        return $this->hasMany(Subject::class);
    }
}
