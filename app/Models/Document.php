<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'instructors_id',
        'subject_id',
        'semester_id',
        'year_id',
        'department_id',
        'file_name'
    ];

    public function instructor(){
        return $this->belongsTo(Instructors::class,'instructors_id', 'id');
    }

    public function subjects(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function semester(){
        return $this->belongsTo(Semester::class);
    }

    public function year(){
        return $this->belongsTo(Year::class);
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
