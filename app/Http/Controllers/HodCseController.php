<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Instructors;


class HodCseController extends Controller
{
    public function hod_cse_view(){
        $instructors = Instructors::get()->where('department_id', '2')->count();
         $instructorComments = Instructors::with(['comment'])->get()->where('status','Computer Science and Engineering staff');
   return view('cse_hod_dashboard', compact('instructors','instructorComments'));
        
}

   
}