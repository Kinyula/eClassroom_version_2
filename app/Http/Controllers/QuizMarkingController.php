<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizMarkingController extends Controller
{
    public function index()
    {
        return view('quiz-marking');
    }
}
