@extends('layouts.AuthLayout.frontendLayout')
@section('content')
    @if(Session::has("addedOperation"))
        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ Session::get("addedOperation") }}</strong>
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <main id="main" class="main">



        <div class="card-body bg-white w-100 p-5">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person fs-1 mb-2"></i>
                  <h2 class="p-5 ">Edit profile here</h2>
                </div>

            <h5 class="card-title">Edit profile <span>| Today</span></h5>

            <div class="row justify-content-center">
                <div class="col-md-0">
                    <div class="card">

                        <div class="card-header" >
                            {{ __('Brand name') }}

                        </div>

                        <div class="card-body">

                            @if(Session::has("profileUpdate"))
                                <div role="alert" class="alert alert-success alert-dismissible fade show">
                                    <strong>{{ Session::get("profileUpdate") }}</strong>
                                    <button class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('editProfileStudentRoute' , ['id' => $edituser->student->id]) }}" class="w-100 p-2" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-2">
                                    <div class="col">
                                        <label for="" class=""></label>
                                        <div class="form-floating">

                                            <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ $edituser->student->first_name }}" required autocomplete="firstName" >
                                            <label for="" class="form-label">First name</label>

                                            @error('firstName')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="" class=""></label>
                                        <div class="form-floating">

                                            <input id="middleName" type="text" class="form-control @error('middleName') is-invalid @enderror" name="middleName" value="{{ $edituser->student->middle_name }}" required autocomplete="middleName" >
                                            <label for="" class="form-label">Middle name</label>

                                            @error('middleName')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row g-2">

                                        <div class="col">
                                            <label for="" class=""></label>
                                            <div class="form-floating">

                                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $edituser->student->last_name }}" required autocomplete="lastName" >
                                                <label for="" class="form-label">Last name</label>

                                                @error('lastName')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col">
                                            <label for="" class=""></label>
                                            <div class="form-floating">

                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $edituser->email }}" required autocomplete="email" >
                                                <label for="" class="form-label">Email</label>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    <div class="row g-2">

                                        <div class="col">
                                            <label for="" class=""></label>
                                            <div class="form-floating">

                                                <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ $edituser->student->phone_number }}" required autocomplete="username" >
                                                <label for="" class="form-label">Phone number</label>

                                                @error('phoneNumber')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>




                                    <div class="col">
                                        <div class="row mb-0 p-2">
                                            <div class="col-md-8 offset-md-0 w-75">
                                                <button type="submit" class="btn btn-primary w-100 border-rounded-50 " >
                                                    <i class="fas fa-paper-plane fs-5" style="position: relative;top:3px;"></i>
                                                    {{ __('Edit profile') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </div>
                                </div>

                        </form>

    </main>



