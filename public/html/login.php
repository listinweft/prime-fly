<?php include('assets/includes/header.php') ?>



<!--Login Page Start-->
    <section class="loginSection position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-lg-7 myAccountContainer">
                    <div class="myAccountForm">
                        <h3>Login</h3>
                        <form action="">
                            <div class="row">
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <img src="assets/images/loginUser.png" alt="">
                                        <input type="text" class="form-control" placeholder="Enter Username">
                                        <span class="invalidMessage"> Given Data Error </span>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <img src="assets/images/loginPassword.png" alt="">
                                            <input id="password-field" type="password" class="form-control" placeholder="Enter Password" name="password" value="Password">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <span class="invalidMessage"> Given Data Error </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12x ">
                                    <div class="form-group btnWrapper">
                                        <button type="submit" class="primary_btn ">Login</button>
                                        <div class="btnRegister">
                                            <p>New to <span>ARTE</span>MYST</p>
                                            <a href="register.php">Register</a>
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
<!--Login Page End -->




<?php include('assets/includes/footer.php') ?>
