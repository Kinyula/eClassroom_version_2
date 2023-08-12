<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Providers\RouteServiceProvider;
use App\Models\Student;
use App\Models\User;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'course_name' => ['required', 'string',  'max:255'],
            'phone_number' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string',  'max:10'],
        ]);
        dd('done');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(Request $request)
    // {

    //     Student::create([
    //         'username' => $request->input('username'),
    //         'email' => $request->input('email'),
    //         'course_name' => $request->input('courseName'),
    //         'phone_number' => $request->input('phoneNumber'),
    //         'gender' =>$request->input('gender'),
    //     ]);

    //     User::create([
    //         'role_id' => $request->input('role_id'),
    //         'email' => $request->input('email'),
    //         'password' => Hash::make($request->input('password')),
    //     ]);
    // }

    public function showRegistrationForm(){

        // $courses = Course::with('students')->get();
        return view('auth.register',[
            'courses' => Course::all(),
            'departments' => Department::all(),
        ]);
    }

//     protected function create(Request $request) {
//         dd("dhjabvshdbvk");
//         $students = new Student();

// foreach($students->all() as $student) {
    

//     if($student->email = $request->input('email')){
//         return;
//     }
// }
//  $students->username = $request->input('username');
//     $students->email = $request->input('email');
//     $students->password = $request->input('password');
//     $students->phone_number = $request->input('phoneNumber');
//     $students->course_name = $request->input('courseName');
//     $students->gender = $request->input('gender');
//     $students->save();

//     $Users = new User();
//     $Users->email = $request->input('email');
//     $Users->password = $request->input('password');
//     $Users->save();

//  }

}