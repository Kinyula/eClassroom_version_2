<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Document;
use App\Models\Instructors;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function documentFunction(Request $request){

        $request->validate(['subjects'=> 'required|integer', 'file' => 'required|nullable|mimes:pdf,zip,ppt, pptx, xlx, xlsx,docx,doc']);

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

$message = "Document is successfull added!";
return back()->with("documentAdded",$message);
    }
    public function index(){
        $departments = Department::get();
        $years = Year::get();
        $subjects = Subject::where('department_id', '1')->orWhereIn('subject_name' , ['Principles of Programming',
        'Information Technology','Communication Skills','Development Perspectives'
        ,'Introduction to Probability and Statistics','Introduction to IT Security'])->get();
        $semesters = Semester::get();
        $instructors = Instructors::where('id', auth()->user()->instructors_id)->get();

        $documents = Document::with(['instructor','subjects','year'])->get();
        
        return view('ete-instructor', compact('instructors','documents', 'semesters','subjects','departments','years'));
    }

}
