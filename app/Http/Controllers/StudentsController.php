<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\User;
use App\Models\Course;

class StudentsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)

    {

        $validData = $request->validate([


            'firstName' => ['required', 'string', 'max:255'],
            'middleName' => ['required', 'string', 'max:255'],
            'departmentName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'courseName' => ['required', 'string',  'max:255'],
            'phoneNumber' => ['required', 'digits',  'max:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string',  'max:10'],

        ]);

        if ($validData) {

            $User = User::create([

                'role_id' => $request->input('role_id'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))


            ]);


            $User->student()->create(
                [

                    'first_name' => $request->input('firstName'),
                    'middle_name' => $request->input('middleName'),
                    'last_name' => $request->input('lastName'),
                    'email' => $request->input('email'),
                    'course_name' => $request->input('courseName'),
                    'department_name' => $request->input('departmentName'),
                    'phone_number' => $request->input('phoneNumber'),
                    'gender' => $request->input('gender'),
                    'status' => $request->input('status'),

                ]
            );
        }



        return redirect('/login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
