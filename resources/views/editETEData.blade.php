@section('content')
    @extends('layouts/AuthLayout.frontendLayout');

    <main id="" class="main">
    @if(Session::has("addedOperation"))
  <div role="alert" class="alert alert-success alert-dismissible fade show">
    <strong>{{ Session::get("addedOperation") }}</strong>
    <button class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  @endif
    <div class="card-body bg-white ETE-table w-100 p-5">
      <h2 class="p-5">Telecommunication Engineering Staffs</h2>
              <h5 class="card-title">Add staff <span>| Today</span></h5>



              <div class="row justify-content-center">
        <div class="col-md-0">
            <div class="card">
              
                 
         
                <div class="card-header" >
                {{ __('Udom eClassroom version 2') }}
                    
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editinstructor') }}" class="w-100">
                        @csrf
                        <input type="hidden" value="2" name="role_id">
                        <input type="hidden" value="1" name="department_id">
    <div class="row g-2">
  <div class="col">
  <div class="form-floating">
                                <input id="username" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName"
                                 autofocus placeholder="firstName">
                                 <label for="" class="form-label">First name</label>
                                 @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
  </div>

  <div class="col">
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

<div class="row g-2">
  <div class="col">
  <div class="form-floating">
                                <input id="middleName" type="text" class="form-control @error('middleName') is-invalid @enderror" name="middleName" value="{{ old('middleName') }}" required autocomplete="middleName"
                                 autofocus placeholder="Middle Name">
                                 <label for="" class="form-label">Middle name</label>
                                 @error('middleName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
  </div>

  <div class="col">
  <div class="form-floating">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" placeholder="Last Name">
                                <label for="" class="form-label">Last Name</label>
                                
                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
  </div>
</div>
  <div class="row g-2">
  <div class="col">
  <div class="form-floating">
                                <input id="firstName" type="firstName" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" placeholder="First name">
                                <label for="" class="form-label">First name</label>
                                
                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
  </div>
  <div class="col">
  <div class="form-floating">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" placeholder="lastName">
                                <label for="" class="form-label">Last name</label>
                                
                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
  </div>

  </div>


  <div class="row g-2">
  <div class="col">
  <div class="form-floating">
    <select id="departmentName" type="text" class="form-select @error('departmentName') is-invalid @enderror" name="departmentName" value="{{ old('departmentName') }}" required autocomplete="departmentName" >
    <option value="0">-- Select Department --</option>
    @foreach ($getDepartments as $getDepartment)
    <option value="{{$getDepartment->department_name}}">{{$getDepartment->department_name}}</option>
    @endforeach


    </select>
    <label for="DepartmentName" class="form-label">Department name</label>
    
    @error('departmentName')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
  </div>

  <div class="col">
  <div class="form-floating">
    <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber"  required autocomplete="phoneNumber" placeholder="Phone number">
    <label for="phoneNumber" class="form-label">Phone number</label>
    @error('phoneNumber')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
  </div>

  
</div>




<div class="row g-2">
  <div class="col">
  <div class="form-floating">
    <select id="gender"  class="form-select  @error('gender') is-invalid @enderror" name="gender"  required autocomplete="gender" >
    <option value="0">-- Select Gender --</option>
        <option value="MALE" >MALE</option>
        <option value="FEMALE">FEMALE</option>
    </select>
    <label for="gender" class="form-label">Gender</label>
    @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
  </div>
  <div class="col">
  <div class="col">
  <div class="form-floating">
    <select id="teachingCourse"  class="form-select  @error('teachingCourse') is-invalid @enderror" name="teachingCourse"  required autocomplete="teachingCourse" >
    <option value="0">-- Select Teaching Course --</option>

    @foreach ($getCourses as $getCourse)
    <option value="{{$getCourse->course_name}}" >{{$getCourse->course_name}}</option>

    @endforeach

    </select>
    <label for="teachingCourse" class="form-label">Teaching course</label>
    @error('teachingCourse')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
  </div>
</div>

<div class="col">
<div class="row mb-0 p-2">
                            <div class="col-md-8 offset-md-0 w-100">
                                <button type="submit" class="btn btn-primary w-100 border-rounded-50 " >
                                    <i class="fas fa-user-plus"></i>
                                    {{ __('Add staff') }}
                                </button>
                            </div>
                        </div>
</div>

  </div>

            </div>
    </main>
@endsection