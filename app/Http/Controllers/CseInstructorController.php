<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\Instructors;
use App\Models\Subject;
use App\Models\Year;
use App\Models\Semester;
use App\Models\Department;

class CseInstructorController extends Controller
{
    public function documentFunction(Request $request)
    {

        $request->validate(['subjects' => 'required|integer', 'file' => 'required|nullable|mimes:pdf,zip,ppt, pptx, xlx, xlsx,docx,doc']);
        $documents = new Document();
        $documents->instructors_id = auth()->user()->instructors_id;
        $documents->department_id = $request->input('departments');
        $documents->year_id = $request->input('years');
        $documents->subject_id = $request->input('subjects');
        $documents->semester_id = $request->input('semesters');
        if($request->hasFile('file')){
            $file = $request->file('file');

            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            $file->move('my_web_documents', $filename);

            $documents->file_name = $filename;

            $documents->save();
        }

        $message = 'Document is successfully added!!';
        return back()->with(['documentAdded', $message]);
    }
    public function index(){
        $departments = Department::get();
        $years = Year::get();
        $subjects = Subject::where('department_id', '2')->orWhereIn('subject_name' , [
        'Information Technology','Communication Skills','Development Perspectives'
        ,'Introduction to IT Security'])->get();
        $semesters = Semester::get();
        $instructors = Instructors::where('id', auth()->user()->instructors_id)->get();

        $documents = Document::with(['instructor','subjects','year'])->get();
        
        return view('cse-instructor', compact('instructors','documents', 'semesters','subjects','departments','years'));
    }

}
