<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructors;

class ViewStaffCSE extends Controller
{
    public function viewStaffcse(){
        $instructors = Instructors::where('department_id','2')->get();
                return view('viewstaffcse', compact('instructors'));
            }


            public function function_delete_cse(Request $request, $id) {

                $is= Instructors::where("id",$id)->exists()? Instructors::find($id)->delete(): false;

                $message = "User is successfull deleted!";
                 return back()->with("deleteOperation",$message);
             }
}
