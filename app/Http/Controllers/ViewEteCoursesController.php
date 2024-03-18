<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class ViewEteCoursesController extends Controller
{
    public function index()
    {
        $courses = Course::where('department_id', 1)->get();
        return view('view-ete-courses', compact('courses'));
    }

    public function deletecourses(Request $request, $id)
    {
        $delete = Course::where('id', $id)->exists() ? Course::where('id', $id)->delete() : false;

        $message = 'Course deleted successfully';
        return back()->with('courseDeleted', $message);
    }
}
