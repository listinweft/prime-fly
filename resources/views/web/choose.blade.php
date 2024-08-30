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
      <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png')}}">
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
        <section class="col-12 choose-user-wrap bg-light-orange">
            <div class="d-flex flex-wrap">

            <a href="{{ route('login_form_public', ['token' => 'public']) }}">
                <div class="choose-user" data-aos="fade-up" data-aos-duration="600">
                    <img src="{{ asset('frontend/img/user2.png')}}" alt="user"/>
                    <p>Public</p>
                </div>  
            </a>
                <a href="{{ route('login_form', ['token' => 'b2b']) }}">
                    <div class="choose-user" data-aos="fade-up" data-aos-duration="300">
                        <img src="{{ asset('frontend/img/user1.png')}}" alt="user"/>
                        <p>Corporate</p>
                    </div>
                </a>
                           

            </div> 
        </section>
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
       
      
   </body>
</html>