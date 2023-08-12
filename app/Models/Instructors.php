<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructors extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'status',
        'department_id',
        'teaching_course_name',
        'last_name',
        'email',
        'gender',
        'phone_number'
    ];


    public function student(){
        return $this->hasMany(Student::class);
    }

    public function user(){
        return $this->hasOne(User::class, 'instructors_id');
    }


    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function documents(){
        return $this->hasMany(Document::class);
    }
}
