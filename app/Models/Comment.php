<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'instructors_id',
        'instructor_comment',
        'department_id'
    ];

    public function instructor(){
        return $this->belongsTo(Instructors::class, 'instructors_id');
    }
}
