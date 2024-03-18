<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'instructors_id', 'assignment'];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function instructor(){
        return $this->belongsTo(Instructors::class, 'instructors_id');
    }
}
