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

 if ( $validData) {
  $User =   User::create([
    'role_id' => $request->input('role_id'),
    'email' => $request->input('email'),
    'password' => Hash::make($request->input('password'))
 
      ]);
  
  
 
  
      $User->instructor()->create([
 
       'first_name' =>$request->input('firstName'),
       'middle_name' =>$request->input('middleName'),
       'last_name' =>$request->input('lastName'),
       'email' => $request->input('email'),
       'teaching_course_name' => $request->input('teachingCourse'),
       'department_id' => $request->input('departmentId'),
       'status' =>$request->input('status'),
       'phone_number' => $request->input('phoneNumber'),
       'gender' =>$request->input('gender'),]
       );
 }


 

     $message = "Staff is successfull added!";
      return back()->with("addedOperation",$message);
 }

 
}
