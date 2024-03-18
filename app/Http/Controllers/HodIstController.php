<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Instructors;

use Illuminate\Http\Request;

class HodIstController extends Controller
{
    public function hod_ist_view(){
        $instructors = Instructors::get()->where('department_id', '3')->count();
$instructorComments = Instructors::with(['comment'])->get()->where('status', 'Information Systems and Technology staff');

   return view('ist_hod_dashboard', compact('instructors', 'instructorComments'));
    }

    public function deletecomment(Request $request, $id){
        $deletecomments = Comment::where("id",$id)->exists()? Comment::find($id)->delete(): false;

        $message = 'Comment deleted successfully';

        return back()->with('deletedComment', $message);

    }
}
