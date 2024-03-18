<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCseAssignmentScores extends Controller
{
    public function index()
    {
        return view('view-cse-assignment-scores');
    }
}
