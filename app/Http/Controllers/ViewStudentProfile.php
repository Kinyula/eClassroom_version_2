<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;

class ViewStudentProfile extends Controller
{
    public function index()
    {

        $users = Student::where('id', auth()->user()->student->id)->first();

        return view('view-student-profile', compact('users'));
    }
}
