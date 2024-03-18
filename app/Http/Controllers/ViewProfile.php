<?php

namespace App\Http\Controllers;

use App\Models\Instructors;
use Illuminate\Http\Request;
use App\Models\User;

class ViewProfile extends Controller
{
    public function index(){

        $users = Instructors::where('user_id', auth()->user()->id)->first();

        return view('view-profile', compact('users'));
    }
}
