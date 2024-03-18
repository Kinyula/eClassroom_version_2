<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['instructors_id', 'user_id', 'hod_reply'];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function instructor(){
        return $this->belongsTo(Instructors::class, 'instructors_id');
    }
}
