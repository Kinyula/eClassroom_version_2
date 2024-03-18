<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Instructors extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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


    public function student()
    {
        return $this->hasMany(Student::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function repliestostudents()
    {
        return $this->hasMany(ReplyToStudent::class);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online' . $this->user_id);
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
