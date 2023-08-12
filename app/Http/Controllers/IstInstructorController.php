<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructors;
use App\Models\Subject;
use App\Models\Year;
use App\Models\Semester;
use App\Models\Department;
use App\Models\Document;

class IstInstructorController extends Controller
{
    public function index(){
        $departments = Department::where('id', '3')->get();
        $years = Year::get();
        $subjects = Subject::where('department_id', '3')->orWhereIn('subject_name' , [
        'Communication Skills','Development Perspectives'
        ])->get();
        $semesters = Semester::get();
        $instructors = Instructors::where('id', auth()->user()->instructors_id)->get();

        $documents = Document::with(['instructor','subjects','year'])->get();
        
        return view('ist-instructor', compact('instructors','documents', 'semesters','subjects','departments','years'));
    }
}
