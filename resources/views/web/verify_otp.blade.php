<!doctype html>
<html lang="en" data-bs-theme="auto">
   <head>

     
    
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.122.0">
      <meta name="csrf-token" content="{{ csrf_token() }}"/>
      <title> Login | Primefly</title>
      <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css')}}">
      <link href="{{ asset('frontend/css/animate.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css')}}" />
      <link rel="stylesheet" href="{{ asset('frontend/build/css/intlTelInput.css')}}" />
      <link href="{{ asset('frontend/css/aos.css')}}" rel="stylesheet">
      <link href="{{ asset('frontend/css/btob.css')}}" rel="stylesheet">
      <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png')}}">
      <!-- <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css"> -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css">

      <script type="text/javascript">
         var base_url = "{{ url('/') }}";
    </script>
   </head>
   <body>
<main> 
    <div class="col-12 register-wrap">
        <section class="col-12 BtoB_back">
        <a href="{{ url('/login-otp') }}"> 
                <svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="..." fill="#969696" stroke="#969696" stroke-width="0.476123"/>
                </svg>
                Back
            </a>   
        </section>

        <section class="col-12 otp_wrap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 otp_toursit text-center">
                        <img src="{{ asset('frontend/img/wanderlust.png') }}" alt="tourist"/>
                    </div>

                    <div class="col-lg-3 otp_grid text-center">
                        <h4>OTP Verification</h4>
                        <p>Enter the verification code we just sent to your number 
    {{ '+91 ' ."*****". substr(session('phone'), -5) }}.
</p>


                        {{-- Laravel Flash/Error Messages --}}
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Laravel OTP Form --}}
                       <form action="#0" id="login"> 
                            @csrf
                            <div class="otp-inputs d-flex justify-content-center gap-2 mt-4">
                                <div>
                                @for ($i = 0; $i < 6; $i++)
    <input type="text" name="otp[{{ $i }}]" maxlength="1" class="otp-input text-center" required style="width: 40px; height: 40px;" />
    

@endfor
                                </div>
                            




</div>


                            <div class="text-center mt-3">
                                 <input type="submit" value="Login"  class="otp_submit_btn btn btn-primary" data-url="/confirm-otp">
                            </div>
                        </form>

                        <div class="text-center mt-3">
                        <p>Didn’t receive code? <a href="{{ route('login.otp.again') }}">Resend</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </section> 
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script  src="{{ asset('frontend/js/custom.js')}}"></script>
      <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.5.0/dist/sweetalert2.all.min.js"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
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
        icon: 'success',
        title: 'General Title',
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
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
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: '{{ Session::get('error') }}',
            footer: '<a href="#">Why do I have this issue?</a>'
            });
    }, 3000); // Delay set to 0 to execute immediately
</script>
@endif
      <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script> 
      <script src="{{ asset('frontend/js/custom-datepicker.js')}}"></script>
      <script src="{{ asset('frontend/js/jquery.timepicker.js')}}"></script>
      <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
      <script src="{{ asset('frontend/js/aos.js')}}"></script>  
      <script src="{{ asset('frontend/js/b2b.js')}}"></script> 
      <script src="{{ asset('frontend/build/js/intlTelInputWithUtils.js')}}"></script>
      <script>
         AOS.init(); 
      </script> 

<script>
   $(document).ready(function() {
    $("#eye-open-createloginp").on('click', function() {
        var toggleSelector = $(this).attr("toggle");
        var passwordField = $(toggleSelector);

        if (passwordField.length) {
            $("#eye-close-createloginp").show();
            $(this).hide();
            passwordField.attr("type", "text");
        } else {
            console.error("Password field not found. Check the toggle attribute.");
        }
    });

    $("#eye-close-createloginp").on('click', function() {
        var toggleSelector = $(this).attr("toggle");
        var passwordField = $(toggleSelector);

        if (passwordField.length) {
            $("#eye-open-createloginp").show();
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