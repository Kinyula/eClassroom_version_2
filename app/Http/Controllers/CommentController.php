<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request){
        $request->validate(['comment' => 'required|max:255']);


        $comment = new Comment();

        $comment->instructor_comment = $request->input('comment');
        $comment->instructors_id = auth()->user()->instructors_id;
    
        $comment->save();
        $message = 'Comment added successfully!!';
        return back()->with('addedComment', $message);
    }
}
