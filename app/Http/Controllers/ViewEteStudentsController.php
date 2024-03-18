<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewEteStudentsController extends Controller
{
    public function index()
    {
        return view('view-ete-students');
    }
}
