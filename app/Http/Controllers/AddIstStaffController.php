<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Instructors;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AddIstStaffController extends Controller
{
    public function addiststaff(){
        $getDepartments = Department::get()->where('department_name', 'INFORMATION SYSTEMS AND TECHNOLOGY DEPARTMENT');
        $getCourses = Course::get()->where('department_id', '3');
        return view('IST', compact('getDepartments', 'getCourses'));
    
    }

    public function storeinformation(Request $request)
    {
 
    
  
 $validData = $request->validate( [
    'firstName' => ['required', 'string', 'max:255'],
    'middleName' => ['required', 'string', 'max:255'],
    'lastName' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'teachingCourse' => ['required', 'string',  'max:255'],
    'departmentId' => ['required', 'integer'],
    'phoneNumber' => ['required', 'string','max:255'],
    'gender' => ['required', 'string',  'max:10'],
 ]);
     $instructors =   Instructors::create([
            'first_name' =>$request->input('firstName'),
            'middle_name' =>$request->input('middleName'),
            'last_name' =>$request->input('lastName'),
            'email' => $request->input('email'),
            'teaching_course_name' => $request->input('teachingCourse'),
            'department_id' => $request->input('departmentId'),
            'status' =>$request->input('status'),
            'phone_number' => $request->input('phoneNumber'),
            'gender' =>$request->input('gender'),
 
        ]);
 
 
     // $instructors = new Instructors();
 
     // $instructors->username = $request->input('username');
     // $instructors->first_name = $request->input('firstName');
     // $instructors->last_name = $request->input('lastName');
     // $instructors->email = $request->input('email');
     // $instructors->teaching_course_name = $request->input('teachingCourse');
     // $instructors->department_id = $request->input('department_id');
     // $instructors->phone_number = $request->input('phoneNumber');
     // $instructors->gender = $request->input('gender');
     // $instructors->department_name = $request->input('departmentName');
 
     // $instructors->save();
 
     $instructors->user()->create([
            
        'role_id' => $request->input('role_id'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password'))]
        );
 
     // $user = new User();
     // $user->role_id = $request->input('role_id');
     // $user->email = $request->input('role_id');
     // $user->password = $request->input('password');
     // $user->save();
     $message = "Staff is successfull added!";
      return back()->with("addedOperation",$message);
 }
 
 // public function functiondeleteOnETE(Request $request, $id) {
 
 //     $is= Instructors::where("id",$id)->exists()? Instructors::find($id)->delete(): false;
  
 //     $message = "User is successfull deleted!";
 //      return back()->with("deleteOperation",$message);
 //  }
 
}
