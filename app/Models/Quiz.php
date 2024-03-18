<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','questions'];

    public function optionstexts(){
        return $this->hasMany(Option::class);
    }

    public function submitquiz(){
        return $this->hasMany(SubmitQuiz::class);
    }
}
