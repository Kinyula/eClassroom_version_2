<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewEteStudentScoresController extends Controller
{
    public function index()
    {
        return view('view-ete-student-scores');
    }
}
