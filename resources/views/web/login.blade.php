
@extends('web.layouts.main')
@section('content')



<div class="wrapper">
        <section class="login">
            <div class="login-left">
                <div class="login-form-box">
                    <a href="#0"><img class="logo" src="{{ asset('frontend/images/logo.png')}}"/></a>
                    <h1>Login </h1>
                    <form action="#0" id="login"> 
                        <div class="form-grid">
                            <input type="email"  placeholder="Email/ User Name" class="form-control required" id="username" name="username">
                           
                        </div>
                        <div class="form-grid">
                            <input type="password"  placeholder="Password" class="form-control required" id="password" name="password">
                            
                        </div>
                        <div class="form-grid mb-0">
                            <input type="submit" value="Login"  class="loginform_submit_btn" data-url="/login">
                        </div>

                    </form>
                    <div class="btnRegister d-block d-sm-flex align-items-center w-100">
                        <div class="w-100 d-flex">
                            <p>Not registered?</p>
                            <a href="{{url('/register')}}">Register</a>
                        </div>
                        <a href="{{ url('forgot-password') }}" class="forgot-password-link">Forgot Password?</a>
                    </div>
                </div>
            </div>
            <div class="login-right">
                <img src="{{ asset('frontend/images/login.jpg')}}" alt="">
                <div class="img-content">Members Area</div>
            </div>
        </section>
    </div>
      

@endsection
@push('scripts')

@endpush
