<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ViewCseCoursesController extends Controller
{
    public function index()
    {
        $courses = Course::where('department_id', 2)->get();
        return view('view-cse-courses', compact('courses'));
    }

    public function deletecourses(Request $request, $id)
    {
        $delete = Course::where('id', $id)->exists() ? Course::where('id', $id)->delete() : false;

        $message = 'Course deleted successfully';
        return back()->with('courseDeleted', $message);
    }
}
