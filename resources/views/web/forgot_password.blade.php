
@extends('web.layouts.main')
@section('content')


    <div class="wrapper">
        <section class="login forgot-password">
            <div class="login-left">
                <div class="login-form-box">
                    <!-- <a href="#0"><img class="logo" src="{{ asset('frontend/images/logo.png')}}"/></a> -->
                    <h1>Forgot Password ?</h1>
                    <form action="#0" id="forgot"> 
                        <div class="form-grid">
                            <input type="text" class="form-control required" id="email" name="email" placeholder="Email*">
                           
                        </div>
                        <div class="form-grid mb-0">
                            <!-- <input type="submit" value="Login"  class="loginform_submit_btn" data-url="/login"> -->
                            <input type="submit" value="Send" class="forgotpasswdform_submit_btn" data-url="/forgot-password" id="forgotpasswdform_submit_btn">
                        </div>

                    </form>
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
