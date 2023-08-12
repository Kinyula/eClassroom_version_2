

@section('content')
@extends('layouts/GuestLayout.guest');
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-6">
        <img src="{{asset('images/udom.png')}}" alt="" srcset="" class="loginLogo">
            <div class="card">
              
                 
         
                <div class="card-header" >
                {{ __('Udom eClassroom version 2') }}
                    
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('students.store') }}">
                        @csrf
                        <input type="hidden" value="8" name="role_id">
                            <input type="hidden" value="student" name="status">


                        <div class="row mb-3">
                            <div class="col-md-6 w-100">
                                <div class="form-floating">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName"
                                 autofocus placeholder="firstName">
                                 <label for="" class="form-label">First name</label>
                                 @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 w-100">
                                <div class="form-floating">
                                <input id="middleName" type="text" class="form-control @error('middleName') is-invalid @enderror" name="middleName" value="{{ old('middleName') }}" required autocomplete="firstName"
                                 autofocus placeholder="middleName">
                                 <label for="" class="form-label">Middle name</label>
                                 @error('middleName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>


                            </div>
                        </div>

                        

                        <div class="row mb-3">
                            <div class="col-md-6 w-100">
                                <div class="form-floating">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName"
                                 autofocus placeholder="lastName">
                                 <label for="" class="form-label">Last name</label>
                                 @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>


                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6 w-100">
                                <div class="form-floating">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                <label for="" class="form-label">Email</label>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">

<div class="col-md-6 w-100">
    <div class="form-floating">
    <select id="courseName" type="text" class="form-select @error('courseName') is-invalid @enderror" name="courseName" value="{{ old('courseName') }}" required autocomplete="courseName" >
    <option value="0">-- Select Course --</option>
    @foreach ($courses as $course)
    <option value="{{$course->course_name}}">{{$course->course_name}}</option>
    @endforeach


    </select>
    <label for="" class="form-label">Course name</label>
    
    @error('courseName')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

</div>
</div>

<div class="row mb-3">

<div class="col-md-6 w-100">
    <div class="form-floating">
    <select id="departmentName" type="text" class="form-select @error('departmentName') is-invalid @enderror" name="departmentName" value="{{ old('departmentName') }}" required autocomplete="departmentName" >
    <option value="0">-- Select Department --</option>
    @foreach ($departments as $department)
    <option value="{{$department->department_name}}">{{$department->department_name}}</option>
    @endforeach


    </select>
    <label for="" class="form-label">Department name</label>
    
    @error('departmentName')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

</div>
</div>

                        <div class="row mb-3">

<div class="col-md-6 w-100">
    <div class="form-floating">
    <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" placeholder="Phone number">
    <label for="" class="form-label">Phone number</label>
    @error('phoneNumber')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>


</div>
</div>

                        <div class="row mb-3">

                            <div class="col-md-6 w-100 ">
                                <div class="form-floating">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                <label for="" class="form-label">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>



                            </div>
                        </div>

                        <div class="row mb-3">


                            <div class="col-md-6 w-100">
                                <div class="form-floating">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                <label for="" class="form-label">Confirm password</label>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">

<div class="col-md-6 w-100">
    <div class="form-floating">
    <select id="gender"  class="form-select  @error('gender') is-invalid @enderror" name="gender"  required autocomplete="gender" >
    <option value="0">-- Select Gender --</option>
        <option value="MALE" >MALE</option>
        <option value="FEMALE">FEMALE</option>
    </select>
    <label for="gender" class="form-label">Gender</label>
    @error('phoneNumber')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>


</div>
</div>  

                        <div class="row mb-0 ">
                            <div class="col-md-8 offset-md-0 w-100">
                                <button type="submit" class="btn btn-primary w-100 border-rounded-50 " >
                                    <i class="fas fa-sign-in"></i>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <footer class="footer-register">
        <p>copyright &copy;2023 all rights reserved</p>
                    <p class="footer-paragraph">
                        Developed and maintained by victor Kinyula from <a href="" class="footer-link text-decoration-none">University of Dodoma</a>
                       </p>
                    </footer>
</div>
@endsection
