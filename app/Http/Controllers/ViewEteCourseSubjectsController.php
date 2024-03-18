<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewEteCourseSubjectsController extends Controller
{
    public function index()
    {
        return view('view-ete-course-subjects');
    }
}
