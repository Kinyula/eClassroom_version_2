<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitQuiz extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'user_id','option_id'];

    public function optionstexts(){
        return $this->belongsTo(Option::class, 'option_id');
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
