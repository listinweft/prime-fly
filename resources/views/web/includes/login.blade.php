<!-- Login Start -->

<div class="modal fade login_create" id="login_form_pop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa-solid fa-right-to-bracket"></i> Login</h5>
                <button type="button" class="btn " data-bs-dismiss="modal" aria-label="Close"><img class="img-fluid" src="{{ asset('frontend/images/svg/colse_login.svg')}}" alt=""></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    {{@csrf_field()}}
                    <div class="row">
                        <div class="form-group">
                            <input type="email" class="form-control required" placeholder="Email  *"  id="username" name="username" value="{{ old('username') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control required" id="password" name="password"  placeholder="Password*">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" aria-label="Close"
                       data-bs-dismiss="modal" class="rest_password d-none d-sm-block">Forgot Password</a>
                        </div>
                        <div class="form-group">
                            <button class="btn primary_btn form_submit_btn" data-url="/login">Login</button>
                        </div>
                    </div> 
                </form>
                <h6>OR</h6>
                <div class="button_box">
                    <a href="{{ url('auth/google') }}" class="google_btn"><img src="{{ asset('frontend/images/google_icon.svg')}}" alt=""><p>Continue With Google</p> </a>
                    <a href="{{ url('auth/facebook') }}" class="facebook_btn"><i class="fa-brands fa-facebook-f"></i><p>Continue With Facebook</p> </a>
                </div>
                <p class="bottom_area">
                    New to Mebashi?
                    <a  href=""  data-bs-target="#create_form_pop" data-bs-toggle="modal" data-bs-dismiss="modal">Create Account</a>
                </p>
                <div class="form-group">
                    <a href="reset-password.php" class="rest_password d-block d-sm-none">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login End -->
<!-- Reset Password -->
<div class="modal fade login_create" id="forgotPasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Forgot your password?</h5>
                <button type="button" class="btn " data-bs-dismiss="modal" aria-label="Close"><img class="img-fluid" src="{{ asset('frontend/images/svg/colse_login.svg')}}" alt=""></button>
            </div>
            <div class="modal-body">
                <form  id="forgotPasswordModalForm">
                    {{@csrf_field()}}
                    <div class="row">
                        <div class="form-group">
                        <input type="email" name="email" class="form-control required" value="{{ old('email') }}" id="email" placeholder="Email*">
                    </div>
                    <div class="form-group">
                        <button class="btn primary_btn form_submit_btn"  data-url="/forgot-password" >Verify</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Create Start -->

<div class="modal fade login_create" id="create_form_pop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa-solid fa-user-plus"></i> Create Account</h5>
                <button type="button" class="btn " data-bs-dismiss="modal" aria-label="Close"><img class="img-fluid" src="{{ asset('frontend/images/svg/colse_login.svg')}}" alt=""></button>
            </div>
            <div class="modal-body">
                <form action="" id="registerForm">
                    <div class="row">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control required" placeholder="name*">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control required" placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control required" placeholder="Phone*">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control required" placeholder="Password*">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control required" placeholder="confirm Password*">
                        </div>
                        <div class="form-group">
                            <button class="btn primary_btn form_submit_btn" data-url="/register"> Create Account</button>
                        </div>
                    </div>
                </form>
                <h6>OR</h6>
                <div class="button_box">
                    <a href="{{ url('auth/google') }}" class="google_btn"><img src="{{ asset('frontend/images/google_icon.svg')}}" alt=""><p>Continue With Google</p> </a>
                    <a href="{{ url('auth/facebook') }}" class="facebook_btn"><i class="fa-brands fa-facebook-f"></i><p>Continue With Facebook</p> </a>
                </div>
                <p class="bottom_area">
                    Existing User?
                    <a href=""  data-bs-target="#login_form_pop" data-bs-toggle="modal" data-bs-dismiss="modal">LogIn</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Create End -->

<!-- Bulk Order Start -->


<!-- Bulk Order End -->


<!-- Bulk Order Start -->



<!-- Bulk Order End -->