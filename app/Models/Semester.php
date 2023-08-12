<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester_name'
    ];

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    public function documents(){
        return $this->hasMany(Document::class);
    }
}
