<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewIstStudentsController extends Controller
{
    public function index()
    {
        return view('view-ist-students');
    }
}
