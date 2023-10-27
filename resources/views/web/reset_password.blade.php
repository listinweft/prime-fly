
@extends('web.layouts.main')
@section('content')
<!-- <section class="loginSection position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-lg-7 myAccountContainer">
                    <div class="myAccountForm">
                        <h3>Reset Password Error</h3>
                        <form action="" id="forgot">
                    <div class="row">
                        <div class="form-group">
                            <img src="{{asset('frontend/images/loginPassword.png')}}" alt="">
                            <input type="password" class="form-control required" id="password" name="password" placeholder="New Password*">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <img src="{{asset('frontend/images/loginPasswordRe.png')}}" alt="">
                            <input type="password" class="form-control required" id="password_confirmation" name="password_confirmation" placeholder="Re-type Password*">
                            <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button class="btn primary_btn form_submit_btn" data-url="/reset-password/{{$token}}" >Reset Password</button>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <div class="wrapper">
        <section class="login forgot-password reset-password">
            <div class="login-left">
                <div class="login-form-box">
                    <!-- <a href="#0"><img class="logo" src="{{ asset('frontend/images/logo.png')}}"/></a> -->
                    <h1>Reset Password</h1>
                    <form action="#0" id="forgot"> 
                        <div class="form-grid">
                            <input type="password" class="form-control required" id="password" name="password" placeholder="New Password*">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <div class="showPass" id="showPass">
                                <i class="bi bi-eye-slash"></i>
                                <i class="bi bi-eye" style="display:none;"></i>
                            </div>
                        </div>
                        <div class="form-grid">
                            <input type="password" class="form-control required" id="password_confirmation" name="password_confirmation" placeholder="Re-type Password*">
                            <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <div class="showPass" id="rePass">
                                <i class="bi bi-eye-slash"></i>
                                <i class="bi bi-eye" style="display:none;"></i>
                            </div>
                        </div>
                        <div class="form-grid mb-0">
                            <!-- <button class="btn primary_btn form_submit_btn" data-url="/reset-password/{{$token}}" >Reset Password</button> -->
                            <input type="submit" value="Reset Password" class="loginform_submit_btn  form_submit_btn" data-url="/reset-password/{{$token}}">
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
<script>
    $(document).ready(function() {
  $("#showPass").click(function() {
    if ($("#password").attr("type") == "password") {
      $("#password").attr("type", "text");
    } else {
      $("#password").attr("type", "password");
    }
  });
  $("#showPass").click(function() {
    $("#showPass i").toggle();
  });
});
$(document).ready(function() {
  $("#rePass").click(function() {
    if ($("#password_confirmation").attr("type") == "password") {
      $("#password_confirmation").attr("type", "text");
    } else {
      $("#password_confirmation").attr("type", "password");
    }
  });
  $("#rePass").click(function() {
    $("#rePass i").toggle();
  });
});
</script>
@endpush
