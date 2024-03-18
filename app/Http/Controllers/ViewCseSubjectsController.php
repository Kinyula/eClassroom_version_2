<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class ViewCseSubjectsController extends Controller
{
    public function index()
    {
        // $subjects = Subject::where('department_id', '2')->paginate(5);
        return view('view-cse-subjects');
    }

    // public function deletesubjects(Request $request, $id)
    // {
    //     $delete = Subject::where('id', $id)->exists() ? Subject::where('id', $id)->delete() : false;

    //     $message = 'Subject is deleted successfully';
    //     return back()->with('subjectDeleted', $message);
    // }
}
