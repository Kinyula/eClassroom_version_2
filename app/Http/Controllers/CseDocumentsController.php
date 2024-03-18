<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class CseDocumentsController extends Controller
{
    public function show($id)
    {
    
        return view('view-cse-course-documents', compact('id'));
    }
}
