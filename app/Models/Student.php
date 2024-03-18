<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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

        return $this->hasMany(Instructors::class, 'instructors_id');
    }



    public function user(){

        return $this->belongsTo(User::class);
    }

    public function complaints(){
        return $this->hasMany(Complain::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function isOnline(){
        return Cache::has('user-is-online'.$this->user_id);
       }

}
