<?php

namespace App\Http\Controllers;

use App\Models\Instructors;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function indexAdmin()
    {
        $students = Student::all();
        $countInstructors = Instructors::where('department_id', '1')->count();
        $instructorComments = Instructors::with(['comment'])->get()->where('status','Telecommunication Engineering staff');
 
        return view('AdminDashboard', compact('students', 'countInstructors', 'instructorComments'));
    }


public function deletefunction(Request $request, $id) {

   $is= User::where("id",$id)->exists()? User::find($id)->delete(): false;

   $message = "User is successfull deleted!";
    return back()->with("deleteOperation",$message);
}



}
