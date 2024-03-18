<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class ViewEteSubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::where('department_id', 1)->paginate(5);
        return view('view-ete-subjects', compact('subjects'));
    }

    public function deletesubjects(Request $request, $id)
    {
        $delete = Subject::where('id', $id)->exists() ? Subject::where('id', $id)->delete() : false;

        $message = 'Subject is deleted successfully';
        return back()->with('subjectDeleted', $message);
    }
}
