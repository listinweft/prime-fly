
@extends('web.layouts.main')
@section('content')
<!-- <section class="loginSection position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-lg-7 myAccountContainer">
                    <div class="myAccountForm">
                        <h3>Forgot Password</h3>
                        <form action="" id="forgot">
                    <div class="row">
                        <div class="form-group">
                            <img src="{{asset('frontend/images/icon-email.png')}}" alt="">
                            <input type="text" class="form-control required" id="email" name="email" placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <button class="btn primary_btn forgotpasswdform_submit_btn  form_submit_btn" data-url="/forgot-password" id="forgotpasswdform_submit_btn">Send</button>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

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
                            <input type="submit" value="Send" class="loginform_submit_btn btn primary_btn forgotpasswdform_submit_btn  form_submit_btn" data-url="/forgot-password" id="forgotpasswdform_submit_btn">
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
