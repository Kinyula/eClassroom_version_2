<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'student_id',
        'instructor_id',
        'email',
        'password'
    ];

    public function student(){

return $this->belongsTo(Student::class);

    }

    public function instructor(){
        return $this->belongsTo(Instructors::class);
    }

}
