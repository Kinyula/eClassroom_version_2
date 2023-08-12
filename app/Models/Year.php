<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_of_study',
        'status_description'
    ];

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    public function documents(){
        return $this->hasMany(Document::class);
    }
}
