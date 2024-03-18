<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Instructors;


class HodCseController extends Controller
{
    public function hod_cse_view(){
        $instructors = Instructors::get()->where('department_id', '2')->count();
         $instructorComments = Instructors::with(['comment'])->where('status','Computer Science and Engineering staff')->paginate(1);
   return view('cse_hod_dashboard', compact('instructors','instructorComments'));

}

    public function deletecomment(Request $request, $id){
        $deletecomments = Comment::where("id",$id)->exists()? Comment::find($id)->delete(): false;

        $message = 'Comment deleted successfully';

        return back()->with('deletedComment', $message);

    }


}
