<?php

namespace App\Http\Controllers;

use App\Models\Instructors;
use Illuminate\Http\Request;

class ViewStaff extends Controller
{
    public function viewStaff(){
$instructors = Instructors::get()->where('department_name', 'ELECTRONICS AND TELECOMMUNICATIONS ENGINEERING DEPARTMENT');
        return view('viewstaff', compact('instructors'));
    }


    public function functiondelete(Request $request, $id) {

        $is= Instructors::where("id",$id)->exists()? Instructors::find($id)->delete(): false;
     
        $message = "Staff is successfull deleted!";
         return back()->with("deleteOperation",$message);
     }




}




