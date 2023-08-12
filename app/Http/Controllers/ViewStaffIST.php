<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructors;

class ViewStaffIST extends Controller
{
    public function viewStaffist(){
        $instructors = Instructors::get()->whereIn('department_name','INFORMATION SYSTEMS AND TECHNOLOGY DEPARTMENT');
                return view('viewstaffist', compact('instructors'));
            }
        
        
            public function function_delete_ist(Request $request, $id) {
        
                $is= Instructors::where("id",$id)->exists()? Instructors::find($id)->delete(): false;
             
                $message = "Staff is successfull deleted!";
                 return back()->with("deleteOperation",$message);
             }
}
