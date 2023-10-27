
@extends('web.layouts.main')
@section('content')


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
                            <input type="submit" value="Reset Password" class="loginform_submit_btn" data-url="/reset-password/{{$token}}">

                          
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
