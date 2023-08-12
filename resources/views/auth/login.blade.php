@extends('layouts/GuestLayout.guest')

@section('content')
<div class="container">

    <div class="row justify-content-center">
    
        <div class="col-md-6">
        
               <img src="{{asset('images/udom.png')}}" alt="" srcset="" class="loginLogo">
                 
    
            <div class="card">
                <div class="card-header">{{ __('UDOM eClassroom version 2') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">


                            <div class="col-md-6 w-100">
                                <div class="form-floating">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
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


                            <div class="col-md-6 w-100" >
                                <div class="form-floating">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror " name="password" required autocomplete="current-password" placeholder="Password">
                                <label for="" class="form-label">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3 ">
                            <div class="col-md-6 offset-md-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-0 w-100">
                                
                                <button type="submit" class="btn btn-primary w-100 border-radius-50">
                              <strong>  <i class="fas fa-sign-in"></i>  {{ __('Login') }}</strong>
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
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

@endsection
