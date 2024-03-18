<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EteDocumentsController extends Controller
{
    public function showEte($id)
    {
    
        return view('view-ete-course-documents', compact('id'));
    }
}
