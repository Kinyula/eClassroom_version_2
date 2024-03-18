<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentScore extends Model
{
    use HasFactory;
    protected $fillable = ['instructors_id', 'student_id', 'scores', 'total_number_of_questions'];
}
