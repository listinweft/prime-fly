@extends('web.layouts.main')
@section('content')


    <section class="loginSection loginRegisterSection position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-lg-7 myAccountContainer">
                    <div class="myAccountForm">
                        <h3>Register</h3>
                        <form action="" id="registerForm">
                            <div class="row">
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <img src="assets/images/loginUser.png" alt="">
                                        <input type="text" name="firstname" id="firstname"  class="form-control required" placeholder="Enter First Name">
                                        <span class="invalidMessage">  </span>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Last Name</label> 
                                        <img src="assets/images/loginUserName.png" alt="">
                                        <input type="text" name="lastname" id="lastname" class="form-control required" placeholder="Enter Last Name">
                                        <span class="invalidMessage"></span>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Email address</label>
                                        <img src="assets/images/icon-email.png" alt="">
                                        <input type="email" name="email" id="email" class="form-control required" placeholder="Enter Email">
                                        <span class="invalidMessage"> </span>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Phone number</label>
                                        <img src="assets/images/icon-phone.png" alt="">
                                        <input type="email" class="form-control required" name="phone" id="phone"placeholder="Enter Phone number">
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <img src="assets/images/loginPassword.png" alt="">
                                            <input id="password-field" type="password" class="form-control" id="password" name="password" placeholder="Enter Password" name="password" value="aswed">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <img src="assets/images/loginPasswordRe.png" alt="">
                                            <input id="password-field" type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter Password" name="password" value="asdf">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12x ">
                                    <div class="form-group btnWrapper">
                                        <button type="button" class="primary_btn form_submit_btn" data-url="/register">Register</button>
                                        <div class="btnRegister">
                                            <p>Already a Member</p>
                                            <a href="">Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <h6 class="or">OR</h6>
                        <div class="loginOptionWrapper">
                            <a class="btnBox" href=""> <img src="assets/images/googleIcon.png" alt="">  <p>Continue With Google</p> </a>
                            <a class="btnBox btnBoxFace" href=""> <img src="assets/images/facebookIcon.png" alt=""> <p>Continue With Facebook</p> </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 myAccountImageBox">
                    <img class="img-fluid w-100" src="assets/images/loginImage.png" alt="">
                </div>
            </div>
        </div>
    </section>

    @endsection
@push('scripts')
    
@endpush




