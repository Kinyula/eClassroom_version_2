<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class ViewCseCourseSubjectsController extends Controller
{
    public function index()
    {


        return view('view-cse-course-subjects');
    }
    
}
