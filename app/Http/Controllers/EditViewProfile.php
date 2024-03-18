<?php

namespace App\Http\Controllers;

use App\Models\Instructors;
use App\Models\User;
use Illuminate\Http\Request;

class EditViewProfile extends Controller
{
    public function index(){

        $edituser = User::with(['instructor'])->where('id', auth()->user()->id)->first();
        return view('edit-view-profile', compact('edituser'));

    }

    public function updateuserprofile(Request $request, $id){
        $edituser = Instructors::findOrFail($id);

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
