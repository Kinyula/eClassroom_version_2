<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakeEteQuizController extends Controller
{
    public function index()
    {
        return view('make-ete-quiz');
    }
}