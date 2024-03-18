<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class EditViewStudentProfile extends Controller
{
    public function index(){

        $edituser = User::with(['student'])->where('id', auth()->user()->id)->first();
        return view('edit-view-student-profile', compact('edituser'));

    }

    public function updatestudentprofile(Request $request, $id){
        $edituser = Student::findOrFail($id);

        $edituser->first_name = $request->input('firstName');

        $edituser->middle_name = $request->input('middleName');

        $edituser->last_name = $request->input('lastName');

        $edituser->email = $request->input('email');

        $edituser->phone_number = $request->input('phoneNumber');




        $edituser->update();

        $message = 'Profile information is updated successfully';
        return back()->with('profileUpdate', $message);
    }



}
