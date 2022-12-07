<?php include('assets/includes/header.php') ?>



<!--Login Page Start-->
    <section class="loginSection loginRegisterSection position-relative">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-lg-7 myAccountContainer">
                    <div class="myAccountForm">
                        <h3>Register</h3>
                        <form action="">
                            <div class="row">
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <img src="assets/images/loginUser.png" alt="">
                                        <input type="text" class="form-control" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <img src="assets/images/loginUserName.png" alt="">
                                        <input type="text" class="form-control" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Email address</label>
                                        <img src="assets/images/icon-email.png" alt="">
                                        <input type="email" class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Phone number</label>
                                        <img src="assets/images/icon-phone.png" alt="">
                                        <input type="email" class="form-control" placeholder="Enter Phone number">
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <img src="assets/images/loginPassword.png" alt="">
                                            <input id="password-field" type="password" class="form-control" placeholder="Enter Password" name="password" value="aswed">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <div class="position-relative d-flex align-items-center">
                                            <img src="assets/images/loginPasswordRe.png" alt="">
                                            <input id="password-field" type="password" class="form-control" placeholder="Re-enter Password" name="password" value="asdf">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12x ">
                                    <div class="form-group btnWrapper">
                                        <button type="submit" class="primary_btn ">Register</button>
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
<!--Login Page End -->




<?php include('assets/includes/footer.php') ?>
