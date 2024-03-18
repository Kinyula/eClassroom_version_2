<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;


class User extends \Illuminate\Foundation\Auth\User
{

    use Notifiable;
    use HasFactory;


    protected $fillable = [
        'role_id',
        'email',
        'password'
    ];

    public function student()
    {

        return $this->hasOne(Student::class);
    }

    public function students()
    {

        return $this->hasMany(Complain::class);
    }

    public function instructor()
    {
        return $this->hasOne(Instructors::class, 'user_id', 'id');
    }

    public function complaints()
    {
        return $this->hasMany(Complain::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function isOnline(){
        return Cache::has('user-is-online'.$this->user_id);
       }


}
