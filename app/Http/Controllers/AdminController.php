<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Complain;
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

        $instructorComments = Instructors::with(['comment'])->where('status','Telecommunication Engineering staff')->paginate(1);

        return view('AdminDashboard', compact('students', 'countInstructors', 'instructorComments'));
    }


public function deletefunction(Request $request, $id) {

   $is= User::where("id",$id)->exists()? User::findOrFail($id)->delete(): false;

   $message = "User is successfull deleted!";
    return back()->with("deleteOperation",$message);
}


    public function deletecomment(Request $request, $id){
        $deletecomments = Comment::where("id",$id)->exists()? Comment::find($id)->delete(): false;

        $message = 'Comment deleted successfully';

        return back()->with('deletedComment', $message);

    }

    
    public function deletecomplaint(Request $request, $id){
        $deletecomplaints = Complain::where("id",$id)->exists()? Complain::find($id)->delete(): false;

        $message = 'Complaint deleted successfully';

        return back()->with('deletedComplaint', $message);

    }
}
