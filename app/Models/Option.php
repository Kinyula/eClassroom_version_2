<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'options','is_correct'];

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function submitquiz(){
        return $this->hasMany(SubmitQuiz::class);
    }
}
