<!doctype html>
<html lang="en" data-bs-theme="auto">
   <head>

     
    
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.122.0">
      <meta name="csrf-token" content="{{ csrf_token() }}"/>
      <title>Corporate Login | Primefly</title>
      <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css')}}">
      <link href="{{ asset('frontend/css/animate.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css')}}" />
      <link rel="stylesheet" href="{{ asset('frontend/build/css/intlTelInput.css')}}" />
      <link href="{{ asset('frontend/css/aos.css')}}" rel="stylesheet">
      <link href="{{ asset('frontend/css/btob.css')}}" rel="stylesheet">

      <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css">

      <script type="text/javascript">
         var base_url = "{{ url('/') }}";
    </script>
   </head>
   <body>
      <main> 
        <div class="col-12 register-wrap">
            <section class="col-12 BtoB_back">
                <a href="{{ url('choose/') }}"> 
                    <svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.0566 0.99227L10.057 0.992678C10.2034 1.14003 10.2856 1.33935 10.2856 1.54712C10.2856 1.75488 10.2034 1.9542 10.057 2.10155L10.0565 2.10203L10.0565 2.10202L2.66266 9.49853L10.0565 16.895C10.0565 16.895 10.0565 16.895 10.0565 16.895C10.1295 16.9681 10.1875 17.0548 10.227 17.1502C10.2665 17.2457 10.2869 17.348 10.2869 17.4513C10.2869 17.5546 10.2665 17.6569 10.227 17.7524C10.1875 17.8478 10.1295 17.9346 10.0565 18.0076L9.88812 17.8393L10.0565 18.0076C9.9834 18.0807 9.89667 18.1386 9.80122 18.1782C9.70577 18.2177 9.60347 18.2381 9.50015 18.2381C9.39683 18.2381 9.29453 18.2177 9.19908 18.1782C9.10362 18.1386 9.0169 18.0807 8.94384 18.0076L0.992518 10.0563L0.992424 10.0562L1.16076 9.88788C1.10977 9.83695 1.06933 9.77647 1.04173 9.7099C1.01413 9.64333 0.999927 9.57197 0.999927 9.4999C0.999927 9.42784 1.01413 9.35648 1.04173 9.28991C1.06933 9.22334 1.10977 9.16286 1.16076 9.11193L10.0566 0.99227ZM10.0566 0.99227C9.98351 0.919149 9.89678 0.861143 9.8013 0.821568C9.70584 0.78199 9.6035 0.76162 9.50015 0.76162C9.3968 0.76162 9.29446 0.78199 9.19899 0.821569C9.10356 0.861126 9.01686 0.919102 8.94384 0.992176C8.94381 0.992207 8.94378 0.992239 8.94375 0.99227L0.992518 8.9435L10.0566 0.99227Z" fill="#969696" stroke="#969696" stroke-width="0.476123"/>
                    </svg>
                    Back
                </a>   
            </section>
            <section class="col-12 BtoB_form_wrap">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 BtoB_form">
                            <div class="text-center">
                                <img src="{{ asset('frontend/img/logo-blue.png')}}" alt="Logo"/>
                            </div> 
                            <div class="register_form">
                                <h4 class="text-center">Corporate Login</h4>
                                <form action="#0" id="login"> 
                                <div class="register_form_wrap"> 
                                    <div class="register_form_grid">
                                        <label>Email</label>
                                        <input type="email" placeholder="Enter Your Email" id="username" name="username" class="required">
                                    </div> 

                                    <input type="hidden" value="{{$type}}">
                                    <div class="register_form_grid">
                                        <label>Password</label>
                                        <div class="position-relative">
                                        <input id="password-field" type="password" placeholder="Type Your Password" class="required" name="password">
<svg id="eye-open-createloginc" class="eye eye-open" toggle="#password-field" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
</svg>
<svg id="eye-close-createloginc" class="eye eye-close" toggle="#password-field" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
    <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
</svg>
                                        </div>
                                        <div class="text-end otp_grid mt-1">
                                            <p>  <a href="{{ url('forgot-password/') }}">Forgot password ? </a></p> 
                                        </div>  
                                    </div>
                                    <div class="col-12 register_form_grid text-center mt-3">
                                    <input type="submit" value="Login"  class="loginform_submit_btn" data-url="/login">
                                     </div>
                                     <div class="text-center otp_grid ">
                                        <p>Don't have an account ? <a href="{{ url('register-corporate/') }}">Signup</div></p>
                                     </div>
                                </div> 
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="botm-illstrater">
                <img class="w-100" src="{{ asset('frontend/img/illstrator.png')}}" alt="illstrator"/>
            </section>
         </div>
      </main>

      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script  src="{{ asset('frontend/js/custom.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.5.0/dist/sweetalert2.all.min.js"></script>
<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    var swal = Swal.mixin({
        backdrop: true,
        showConfirmButton: true,
    });

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 6000,
    });
</script>

@if(Session::has('success'))
<script>
    
    setTimeout(function () {
        Toast.fire({
            title: "",
            text: '{{ Session::get('success') }}',
            icon: 'success'
        });
    }, 2000); // Delay set to 0 to execute immediately
</script>
@endif



@if(Session::has('error'))
<script>
    setTimeout(function () {
        Toast.fire({
            title: "Error!",
            text: '{{ Session::get('error') }}',
            icon: 'error'
        });
    }, 3000); // Delay set to 0 to execute immediately
</script>
@endif
      <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script> 
      <script src="{{ asset('frontend/js/custom-datepicker.js')}}"></script>
      <script src="{{ asset('frontend/js/jquery.timepicker.js')}}"></script>
      <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
      <script src="{{ asset('frontend/js/aos.js')}}"></script>  
      <script src="{{ asset('frontend/build/js/intlTelInputWithUtils.js')}}"></script>
      <script>
         AOS.init(); 
      </script> 
   
      <script src="{{ asset('frontend/js/b2b.js')}}"></script> 

      <script>
   $(document).ready(function() {
    $("#eye-open-createloginc").on('click', function() {
        var toggleSelector = $(this).attr("toggle");
        var passwordField = $(toggleSelector);

        if (passwordField.length) {
            $("#eye-close-createloginc").show();
            $(this).hide();
            passwordField.attr("type", "text");
        } else {
            console.error("Password field not found. Check the toggle attribute.");
        }
    });

    $("#eye-close-createloginc").on('click', function() {
        var toggleSelector = $(this).attr("toggle");
        var passwordField = $(toggleSelector);

        if (passwordField.length) {
            $("#eye-open-createloginc").show();
            $(this).hide();
            passwordField.attr("type", "password");
        } else {
            console.error("Password field not found. Check the toggle attribute.");
        }
    });
});



   
</script>
   </body>
</html>