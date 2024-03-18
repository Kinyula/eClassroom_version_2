<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewEteQuizController extends Controller
{
    public function index()
    {
        return view('view-ete-quiz');
    }
}
