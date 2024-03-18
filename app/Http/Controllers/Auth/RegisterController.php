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
    protected $redirectTo = RouteServiceProvider::LOGIN;


    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {

        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:100'],
            'middleName' => ['required', 'string', 'max:100'],
            'lastName' => ['required', 'string', 'max:100'],
            'email' => ['required|unique:users', 'string', 'email', 'max:255'],
            'course_name' => ['required', 'string',  'max:255'],
            'phone_number' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string',  'max:10'],
        ]);
    }


    public function showRegistrationForm()
    {

        return view('auth.register', [
            'courses' => Course::all(),
            'departments' => Department::get(),

        ]);
    }
}
