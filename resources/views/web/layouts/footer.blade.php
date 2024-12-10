<footer>
          <div class="col-12">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-4 footer_logo">
                <a href="{{ url('/') }}">
                  <img src="{{ asset('frontend/img/logo.png')}}" alt="Logo"/>
                </a>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-8">
                <div class="d-flex justify-content-center">
                  <!-- <div class="col-lg-4 footer_menu">
                    <h4>Links</h4>
                    <ul>
                      <li><a href="">Contact Us</a></li>
                      <li><a href="">News</a></li>
                      <li><a href="">Partners</a></li>
                    </ul>
                  </div> -->
                  <div class="col-lg-4 col-md-4 col-sm-4 col-6 footer_menu">
                    <h4>Services</h4>
                    <ul>
                    @php
        $categorydata = App\Models\Category::whereNull('parent_id')->get();
      
       
       @endphp
                    @foreach ($categorydata as $categories)
                      <li><a href="{{url('service/'.$categories->short_url)}}">{{$categories->title}}</a></li>
                     @endforeach
                    </ul>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-6 footer_menu">
                    <h4>More</h4>
                    <ul>
                      <li><a href="{{ url('contact/') }}">Contact Us</a></li>
                      <li><a href="{{ url('blogs/') }}">Blog</a></li>
                      <li><a href="{{ url('register-corporate/') }}">Become a B2B Partner</a></li>
                      <li><a href="{{ url('privacy-policy/') }}">Privacy Policy</a></li>
                      <li><a href="{{ url('terms-and-conditions/') }}">Terms & Condition</a></li> 
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-12 mt-4">
                <div class="row justify-content-between">
                  <div class="col-lg-4 col-sm-5 col-6 footer-bottom-contact">
                    <hr>
                      <p><a href="tel:+91 7511172225">+91 7511172225</a></p>
                      <p><a href="mailto:info@primefly.com">support@primefly.in</a></p>
                  </div>
                  <div class="col-lg-4 col-sm-5 col-6  footer-bottom-social">
                      <ul class="d-flex justify-content-end">
                        <li>
                          <a href="https://www.facebook.com/primefly.airportservices" aria-label="facebook">
                            
<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect x="0.453913" y="0.453913" width="44.4835" height="44.4835" rx="22.2417" stroke="white" stroke-width="0.907826"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M28.1426 15.4331H17.2487C16.2474 15.4331 15.433 16.2474 15.433 17.2488V28.1427C15.433 29.144 16.2474 29.9583 17.2487 29.9583H22.6957V24.9653H20.88V22.6957H22.6957V20.8801C22.6957 20.1578 22.9826 19.465 23.4933 18.9543C24.0041 18.4435 24.6968 18.1566 25.4191 18.1566H27.2348V20.4261H26.327C25.8258 20.4261 25.4191 20.3789 25.4191 20.8801V22.6957H27.6887L26.7809 24.9653H25.4191V29.9583H28.1426C29.1439 29.9583 29.9583 29.144 29.9583 28.1427V17.2488C29.9583 16.2474 29.1439 15.4331 28.1426 15.4331Z" fill="white"/>
  </svg>
  
                          </a>
                        </li>
                        <!-- <li>
                          <a href="#" aria-label="google">
                            
<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect x="0.923456" y="0.453669" width="44.4835" height="44.4835" rx="22.2417" stroke="white" stroke-width="0.907826"/>
  <path d="M19.2079 21.5304V24.0966H23.1391C23.0299 25.134 21.9925 27.0996 19.2079 27.0996C16.8601 27.0996 14.9491 25.134 14.9491 22.7316C14.9491 20.3292 16.7509 18.3636 19.0987 18.3636C20.4637 18.3636 21.3919 18.9096 21.8833 19.401L23.7943 17.5992C22.815 16.6698 21.582 16.0518 20.2514 15.8233C18.9207 15.5948 17.5522 15.7661 16.3189 16.3155C15.0857 16.865 14.043 17.7678 13.323 18.9099C12.6029 20.052 12.2378 21.3819 12.2737 22.7316C12.2737 26.5536 15.3859 29.6658 19.2079 29.6658C23.2483 29.6658 25.8691 26.772 25.8691 22.8408L25.7599 21.5304" fill="white"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M31.6294 23.2503V25.68H30.046V23.2503H27.6163V21.6669H30.046V19.2372H31.6294V21.6669H34.0591V23.2503H31.6294Z" fill="white"/>
  </svg>
  
                          </a>
                        </li> -->
                        <li>
                          <a href="https://www.instagram.com/_primefly/" aria-label="instagram">
                            
<svg width="47" height="46" viewBox="0 0 47 46" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect x="1.39312" y="0.453669" width="44.4835" height="44.4835" rx="22.2417" stroke="white" stroke-width="0.907826"/>
  <path d="M23.6348 16.7454C25.5598 16.7454 25.8223 16.7454 26.6098 16.7454C27.3099 16.7454 27.6599 16.9204 27.9224 17.0079C28.2724 17.1829 28.5349 17.2704 28.7974 17.5329C29.0599 17.7954 29.2349 18.0579 29.3224 18.4079C29.4099 18.6704 29.4974 19.0204 29.5849 19.7204C29.5849 20.5079 29.5849 20.6829 29.5849 22.6955C29.5849 24.708 29.5849 24.883 29.5849 25.6705C29.5849 26.3705 29.4099 26.7205 29.3224 26.983C29.1474 27.333 29.0599 27.5955 28.7974 27.858C28.5349 28.1206 28.2724 28.2956 27.9224 28.3831C27.6599 28.4706 27.3099 28.5581 26.6098 28.6456C25.8223 28.6456 25.6473 28.6456 23.6348 28.6456C21.6223 28.6456 21.4473 28.6456 20.6598 28.6456C19.9597 28.6456 19.6097 28.4706 19.3472 28.3831C18.9972 28.2081 18.7347 28.1206 18.4722 27.858C18.2097 27.5955 18.0347 27.333 17.9472 26.983C17.8597 26.7205 17.7722 26.3705 17.6847 25.6705C17.6847 24.883 17.6847 24.708 17.6847 22.6955C17.6847 20.6829 17.6847 20.5079 17.6847 19.7204C17.6847 19.0204 17.8597 18.6704 17.9472 18.4079C18.1222 18.0579 18.2097 17.7954 18.4722 17.5329C18.7347 17.2704 18.9972 17.0954 19.3472 17.0079C19.6097 16.9204 19.9597 16.8329 20.6598 16.7454C21.4473 16.7454 21.7098 16.7454 23.6348 16.7454ZM23.6348 15.4329C21.6223 15.4329 21.4473 15.4329 20.6598 15.4329C19.8722 15.4329 19.3472 15.6079 18.9097 15.7829C18.4722 15.9579 18.0347 16.2204 17.5972 16.6579C17.1597 17.0954 16.9847 17.4454 16.7222 17.9704C16.5472 18.4079 16.4597 18.9329 16.3722 19.7204C16.3722 20.5079 16.3722 20.7704 16.3722 22.6955C16.3722 24.708 16.3722 24.883 16.3722 25.6705C16.3722 26.458 16.5472 26.983 16.7222 27.4205C16.8972 27.858 17.1597 28.2956 17.5972 28.7331C18.0347 29.1706 18.3847 29.3456 18.9097 29.6081C19.3472 29.7831 19.8722 29.8706 20.6598 29.9581C21.4473 29.9581 21.7098 29.9581 23.6348 29.9581C25.5598 29.9581 25.8223 29.9581 26.6098 29.9581C27.3974 29.9581 27.9224 29.7831 28.3599 29.6081C28.7974 29.4331 29.2349 29.1706 29.6724 28.7331C30.1099 28.2956 30.2849 27.9455 30.5474 27.4205C30.7224 26.983 30.8099 26.458 30.8974 25.6705C30.8974 24.883 30.8974 24.6205 30.8974 22.6955C30.8974 20.7704 30.8974 20.5079 30.8974 19.7204C30.8974 18.9329 30.7224 18.4079 30.5474 17.9704C30.3724 17.5329 30.1099 17.0954 29.6724 16.6579C29.2349 16.2204 28.8849 16.0454 28.3599 15.7829C27.9224 15.6079 27.3974 15.5204 26.6098 15.4329C25.8223 15.4329 25.6473 15.4329 23.6348 15.4329Z" fill="white"/>
  <path d="M23.6348 18.9329C21.5348 18.9329 19.8722 20.5954 19.8722 22.6955C19.8722 24.7955 21.5348 26.458 23.6348 26.458C25.7348 26.458 27.3974 24.7955 27.3974 22.6955C27.3974 20.5954 25.7348 18.9329 23.6348 18.9329ZM23.6348 25.1455C22.3223 25.1455 21.1848 24.0955 21.1848 22.6955C21.1848 21.383 22.2348 20.2454 23.6348 20.2454C24.9473 20.2454 26.0848 21.2954 26.0848 22.6955C26.0848 24.008 24.9473 25.1455 23.6348 25.1455Z" fill="white"/>
  <path d="M27.4849 19.7204C27.9681 19.7204 28.3599 19.3287 28.3599 18.8454C28.3599 18.3622 27.9681 17.9704 27.4849 17.9704C27.0016 17.9704 26.6098 18.3622 26.6098 18.8454C26.6098 19.3287 27.0016 19.7204 27.4849 19.7204Z" fill="white"/>
  </svg>
  
                          </a>
                        </li>
                        <li>
                          <a href="#" aria-label="youtube">
                            
<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect x="0.862604" y="0.453669" width="44.4835" height="44.4835" rx="22.2417" stroke="white" stroke-width="0.907826"/>
  <path d="M32.5912 17.6376C32.3415 16.7298 31.7174 16.0813 30.8436 15.8219C29.3457 15.4329 22.9795 15.4329 22.9795 15.4329C22.9795 15.4329 16.7383 15.4329 15.1155 15.8219C14.2417 16.0813 13.6176 16.7298 13.3679 17.6376C13.1183 19.3235 13.1183 22.6955 13.1183 22.6955C13.1183 22.6955 13.1183 26.0674 13.4928 27.7534C13.7424 28.6612 14.3665 29.3096 15.2403 29.569C16.7382 29.9581 23.1044 29.9581 23.1044 29.9581C23.1044 29.9581 29.3457 29.9581 30.9684 29.569C31.8422 29.3096 32.4663 28.6612 32.716 27.7534C33.0905 26.0674 33.0905 22.6955 33.0905 22.6955C33.0905 22.6955 33.0905 19.3235 32.5912 17.6376ZM21.1071 25.808V19.5829L26.3499 22.6955L21.1071 25.808Z" fill="white"/>
  </svg>
  
                          </a>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="https://api.whatsapp.com/send?phone=+91 7511172225&amp;text=Hello" class="btn-whatsapp-pulse" target="blank">
            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.0683 9.16215e-05C7.7397 9.16215e-05 0.136684 7.56507 0.136684 16.847C0.136684 19.822 0.922613 22.712 2.39196 25.262L0 34L8.96985 31.654C11.4472 32.997 14.2322 33.711 17.0683 33.711C26.397 33.711 34 26.146 34 16.864C34 12.3591 32.2402 8.12607 29.0452 4.94708C27.4786 3.37306 25.6128 2.12503 23.5565 1.2757C21.5003 0.42638 19.2947 -0.00724737 17.0683 9.16215e-05ZM17.0854 2.83908C20.8442 2.83908 24.3638 4.30108 27.0291 6.95307C28.3368 8.25445 29.3737 9.79974 30.0802 11.5004C30.7868 13.2011 31.1492 15.0238 31.1467 16.864C31.1467 24.582 24.8251 30.855 17.0683 30.855C14.5397 30.855 12.0623 30.192 9.90955 28.9L9.39698 28.611L4.06633 30.005L5.48442 24.837L5.14271 24.293C3.73239 22.0633 2.98597 19.4816 2.98995 16.847C3.00703 9.12907 9.31156 2.83908 17.0854 2.83908ZM11.0714 9.06107C10.798 9.06107 10.3367 9.16307 9.94372 9.58807C9.56784 10.0131 8.45729 11.0501 8.45729 13.1071C8.45729 15.1811 9.97789 17.17 10.1658 17.459C10.405 17.748 13.1729 21.998 17.4271 23.8C18.4352 24.259 19.2211 24.514 19.8362 24.701C20.8442 25.024 21.7668 24.973 22.5015 24.871C23.3216 24.752 24.996 23.851 25.3548 22.865C25.7136 21.879 25.7136 21.046 25.6111 20.859C25.4915 20.689 25.2181 20.587 24.791 20.4C24.3638 20.162 22.2794 19.142 21.9035 19.006C21.5106 18.87 21.2714 18.802 20.9467 19.21C20.6734 19.635 19.8533 20.587 19.6141 20.859C19.3578 21.148 19.1186 21.182 18.7085 20.978C18.2643 20.757 16.8975 20.315 15.2915 18.887C14.0271 17.765 13.1899 16.388 12.9337 15.9631C12.7286 15.5551 12.9166 15.3001 13.1216 15.1131C13.3095 14.9261 13.5829 14.6201 13.7538 14.3651C13.9759 14.1271 14.0442 13.9401 14.1809 13.6681C14.3176 13.3791 14.2492 13.1411 14.1467 12.9371C14.0442 12.7501 13.1899 10.6421 12.8312 9.80907C12.4894 8.99307 12.1477 9.09507 11.8744 9.07807C11.6352 9.07807 11.3618 9.06107 11.0714 9.06107Z" fill="white"/>
</svg>

        </a>
          <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WFM73QWD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
         </footer>
      

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script> 
      <script src="{{ asset('frontend/js/custom-datepicker.js')}}"></script>
      <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
      <script src="{{ asset('frontend/js/aos.js')}}"></script>
      <script  src="{{ asset('frontend/js/custom.js')}}"></script> 
      <script src="{{ asset('frontend/js/jquery.timepicker.js')}} "></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.5.0/dist/sweetalert2.all.min.js"></script>

      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />

<!-- Add Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-selectbox/0.2.4/jquery.selectbox-0.2.min.js"></script>

      <script>
        $('.head_search a').click(function(){
          $('.head_search').toggleClass('search-expand');
        });
      </script>
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

      <script>
        var counted = []; // Initialize the counted array
        document.addEventListener("scroll", function() {
            var counterItems = document.querySelectorAll('.company-counter-item');
            counterItems.forEach(function(item, index) {
                var rect = item.getBoundingClientRect();
                var oTop = rect.top + window.pageYOffset - window.innerHeight;
                if (counted[index] === undefined && window.pageYOffset > oTop) {
                var countSpan = item.querySelector('.count');
                var countTo = parseInt(countSpan.getAttribute('data-count'));

                var countNum = parseInt(countSpan.textContent);
                var duration = 2000;
                var startTime = null;

                function animate(now) {
                    if (!startTime) startTime = now;
                    var progress = now - startTime;
                    var increment = Math.floor((countTo - countNum) * progress / duration);
                    countSpan.textContent = (countNum + increment).toLocaleString();
                    if (progress < duration) {
                    requestAnimationFrame(animate);
                    } else {
                    countSpan.textContent = countTo.toLocaleString();
                    }
                }

                requestAnimationFrame(animate);

                counted[index] = true;
                }
            });
        });
    </script>
    <script>
      let hamburger = document.querySelector('.hamburger');
      let menuConatiner = document.querySelector('.menu-container');
      function menuOpen(){
          hamburger.classList.toggle('active');
          menuConatiner.classList.toggle('active');
      }
    </script>
      <script>
        $(document).ready(function(){
          
          $( function() {
            $( "#datepicker" ).datepicker({
              
                  dateFormat: "dd-mm-yy",
              changeMonth: true,
              changeYear: true,
              minDate: 0,
              "setDate": new Date(),
              "autoclose": true,
              firstDay: 1
              
            });
              $("#datepicker").datepicker("setDate", new Date());
          } );

          $( function() {
            $( "#exitdatepicker" ).datepicker({
              // dateFormat: "dd-mm-yy",	
                  // duration: "fast",
                  // maxDate: 0,
                  // changeYear: true,
                  // changeMonth: true,
                  dateFormat: "dd-mm-yy",
                  changeMonth: true,
                  changeYear: true,
                  minDate: 0, 
                  "autoclose": true,
                  firstDay: 1
              // yearRange: "-100:-1",
              // numberOfMonths: 12
            });
              $("#exitdatepicker").datepicker(); 
          });

          $('#starttime').timepicker({'step': 15}); 
          $('#endtime').timepicker({'step': 15});

          

          

          AOS.init();
          $(".mob-filter-slider").owlCarousel({
            loop:false,
            margin:5,
            dots:false,
            items:4,
            nav: false,
            navText: [
                    `<img src="{{ asset('frontend/img/prev.png') }}" alt="Previous">`,
                    `<img src="{{ asset('frontend/img/next.png') }}" alt="Next">`
                ], 
          });
          $(".service-carousel").owlCarousel({
            loop:false,
            margin:20,
            dots:false,
            nav: true,
            navText: [
                    `<img src="{{ asset('frontend/img/prev.png') }}" alt="Previous">`,
                    `<img src="{{ asset('frontend/img/next.png') }}" alt="Next">`
                ],
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,
                    nav:true
                },
                600:{
                    items:3,
                    nav:true
                },
                800:{
                    items:4,
                    nav:true
                },
                1000:{
                    items:5,
                    nav:true 
                }
            }
          });
          $(".testimonial-carousel").owlCarousel({
            loop:true,
            margin:20,
            dots:false,
            nav: true,
            navText: [
                    `<img src="{{ asset('frontend/img/prev.png') }}" alt="Previous">`,
                    `<img src="{{ asset('frontend/img/next.png') }}" alt="Next">`
                ],
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:2,
                    nav:false
                },
                1000:{
                    items:3,
                    nav:true 
                }
            }
          }); 
          $('.minus').click(function () {
              var $input = $(this).parent().find('input');
              var count = parseInt($input.val()) - 1;
              count = count < 1 ? 1 : count;
              $input.val(count);
              $input.change();
              return false;
          });
          $('.plus').click(function () {
              var $input = $(this).parent().find('input');
              $input.val(parseInt($input.val()) + 1);
              $input.change();
              return false;
          });

          $('.minusi').click(function () {
              var $input = $(this).parent().find('input');
              var count = parseInt($input.val()) - 1;
              count = count < 0 ? 0 : count;
              $input.val(count);
              $input.change();
              return false;
          });
          $('.plusi').click(function () {
              var $input = $(this).parent().find('input');
              $input.val(parseInt($input.val()) + 1);
              $input.change();
              return false;
          });

          $('.minusc').click(function () {
              var $input = $(this).parent().find('input');
              var count = parseInt($input.val()) - 1;
              count = count < 0 ? 0 : count;
              $input.val(count);
              $input.change();
              return false;
          });
          $('.plusc').click(function () {
              var $input = $(this).parent().find('input');
              $input.val(parseInt($input.val()) + 1);
              $input.change();
              return false;
          });
        });
      </script>
      <!-- <script>
         $('select').each(function(){
         var $this = $(this), selectOptions = $(this).children('option').length;
         
         $this.addClass('hide-select'); 
         $this.wrap('<div class="select"></div>');
         $this.after('<div class="custom-select"></div>');
         
         var $customSelect = $this.next('div.custom-select');
         $customSelect.text($this.children('option').eq(0).text());
         
         var $optionlist = $('<ul />', {
           'class': 'select-options'
         }).insertAfter($customSelect);
         
         for (var i = 0; i < selectOptions; i++) {
           $('<li />', {
               text: $this.children('option').eq(i).text(),
               rel: $this.children('option').eq(i).val()
           }).appendTo($optionlist);
         }
         
         var $optionlistItems = $optionlist.children('li');
         
         $customSelect.click(function(e) {
           e.stopPropagation();
           $('div.custom-select.active').not(this).each(function(){
               $(this).removeClass('active').next('ul.select-options').hide();
           });
           $(this).toggleClass('active').next('ul.select-options').slideToggle();
         });
         
         $optionlistItems.click(function(e) {
           e.stopPropagation();
           $customSelect.text($(this).text()).removeClass('active');
           $this.val($(this).attr('rel'));
           $optionlist.hide();
         });
         
         $(document).click(function() {
           $customSelect.removeClass('active');
           $optionlist.hide();
         });
         
         });
      </script> -->
      <script>
        var counted = []; // Initialize the counted array
        document.addEventListener("scroll", function() {
            var counterItems = document.querySelectorAll('.company-counter-item');
            counterItems.forEach(function(item, index) {
                var rect = item.getBoundingClientRect();
                var oTop = rect.top + window.pageYOffset - window.innerHeight;
                if (counted[index] === undefined && window.pageYOffset > oTop) {
                var countSpan = item.querySelector('.count');
                var countTo = parseInt(countSpan.getAttribute('data-count'));

                var countNum = parseInt(countSpan.textContent);
                var duration = 2000;
                var startTime = null;

                function animate(now) {
                    if (!startTime) startTime = now;
                    var progress = now - startTime;
                    var increment = Math.floor((countTo - countNum) * progress / duration);
                    countSpan.textContent = (countNum + increment).toLocaleString();
                    if (progress < duration) {
                    requestAnimationFrame(animate);
                    } else {
                    countSpan.textContent = countTo.toLocaleString();
                    }
                }

                requestAnimationFrame(animate);

                counted[index] = true;
                }
            });
        });
    </script>

<script>
  $(document).ready(function() {
    $(".chosen-select").chosen({
      width: "100%",  // Adjust width as needed
      no_results_text: "No results found"
    });
  });
</script>





</body>
</html>
     



