<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakeQuizOptionsController extends Controller
{
    public function index(){
        return view('make-quiz-options');
    }
}