<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewCseStudentsController extends Controller
{
    public function index()
    {
        return view('view-cse-students');
    }
}
