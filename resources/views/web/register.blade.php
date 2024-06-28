<!doctype html>
<html lang="en" data-bs-theme="auto">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.122.0">
      <meta name="csrf-token" content="{{ csrf_token() }}"/>
      <title>Public Register | Primefly</title>
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
                <a href=""> 
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
                            <form action="" id="registerForm">

                            <div class="register_form">
                                <h4 class="text-center">Create Account</h4>
                                <div class="register_form_wrap">
                                    <div class="register_form_grid">
                                        <label>Full name</label>
                                        <input type="text" placeholder="Enter Your Name" name="firstname" id="firstname" class="required">
                                    </div>
                                    <div class="register_form_grid">
                                        <label>Email</label>
                                        <input type="email" placeholder="Enter Your Email" id="email" class="required" name="email">
                                    </div>
                                    <div class="register_form_grid">
                                        <label>Phone Number</label>
                                        <!-- <input type="tel" placeholder="91"> -->
                                        <input id="phone" name="phone" type="tel" class="required" maxlength="12" pattern="[0-9]{10}" />

                                        <!-- <div class="input-phone"></div> -->
                                    </div>
                                    <div class="register_form_grid">
                                        <label>Create Password</label>
                                        <input type="password" placeholder="Type Your Password" name="password" class="required" id="password">
                                    </div>
                                    <div class="col-12 register_form_grid text-center mt-3">
                                       
                                        <input type="submit"  class="primary_btn registerform_submit_btn" data-url="/register" value="Submit"/>
                                     </div>
                                </div> 
                            </div>

</form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="botm-illstrater">
                <img class="w-100" src="img/illstrator.png" alt="illstrator"/>
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
       <script>
        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
          
          initialCountry: "in",
         
        });
        window.iti = iti; // useful for testing
      </script>
   </body>
</html>