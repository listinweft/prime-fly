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
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css">
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
    </script>
</head>
<body>
<main>
    <div class="col-12 b2b-header">
        <div class="d-flex align-items-center">
            <div class="b2b-logo">
                <a href="{{ url('/') }}">
                <img src="{{ asset('frontend/img/logo-blue.png')}}" alt="logo"/>
</a>
            </div>
            <div class="b2b-header-search">
                <div class="col-lg-3 input-group">
                    
                </div>
            </div>
            <div class="b2b-header-profile">
                <div class="d-flex justify-content-end">
                @if(Auth::guard('customer')->check() )
                @if (Helper::getCartItemCount() > 0)

                    <a href="{{ url('cart/') }}" class="header-cart position-relative">
                        <img src="{{ asset('frontend/img/cart-icon.png')}}" alt="logo"/> <span class="cart-count">{{ Helper::getCartItemCount() }}</span>
                    </a>
                    @endif
                    @endif

                    @if($customer->user->profile_image)
                    <a href="#" class="header-user ">
                            {!! Helper::printImage($customer->user, 'profile_image', 'profile_image_webp', '', 'img-fluid') !!}
                            </a>
                            @else
                               
                            <a href="#" class="header-user">
                        <img src="{{ asset('frontend/img/common-user.png')}}" alt="logo"/>
                    </a>


                                @endif

                  
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 b2b-dash">
        <div class="d-flex">
            <div class="b2b-side-nav d-flex flex-wrap justify-content-between flex-column">
                <div class="side-nav-top">
                    <div class="menu-profile d-flex align-items-center">
                        <div>
                            <img src="{{ $user->profile_image ? asset($user->profile_image) : asset('frontend/img/camer.png') }}" alt="logo"/>
                        </div>
                        <div class="">
                            <h4>{{@$customer->first_name}}</h4>
                            <p>{{@$customer->user->phone}}</p>
                        </div>
                    </div>
                    <div class="menu-head">
                        <h4>Account</h4>
                    </div>
                    <div class="top-menu">
                        <ul class="p-0">
                            <li class="nav-item active" data-section="orders">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('frontend/img/ticket.svg')}}"/>
                                    Orders & Bookings
                                </a>
                            </li>
                            <li class="nav-item" data-section="profile">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('frontend/img/user-icon.svg')}}"/>
                                    My Profile
                                </a>
                            </li>
                            <li class="nav-item" data-section="help">
                                <a href="{{ url('support/') }}">
                                    <img src="{{ asset('frontend/img/chat.svg')}}"/>
                                    Help & Support
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="side-nav-bottom">
                    <div class="menu-head">
                        <h4>Others</h4>
                    </div>
                    <div class="top-menu">
                        <ul class="p-0">
                            <li class="nav-item" data-section="chat">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('frontend/img/chat.svg')}}"/>
                                    Chat Support
                                </a>
                            </li>
                            <li class="nav-item" data-section="terms">
                                <a href="{{ url('terms-and-conditions/') }}">
                                    <img src="{{ asset('frontend/img/terms-icon.svg')}}"/>
                                    Terms of Use
                                </a>
                            </li>
                            <li class="nav-item" data-section="privacy">
                                <a href="{{ url('privacy-policy/') }}">
                                    <img src="{{ asset('frontend/img/privacy-icon.svg')}}"/>
                                    Privacy Policy
                                </a>
                            </li>
                            <li class="nav-item" data-section="logout">
                                <a href="{{ url('logout/') }}">
                                    <img src="{{ asset('frontend/img/logout-icon.svg')}}"/>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="b2b-dash-content">
                
                <div id="orders-section" class="content-section">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="b2b_upload text-center">
                            <div class="upload_user">
                                @if($customer->user->profile_image)
                            {!! Helper::printImage($customer->user, 'profile_image', 'profile_image_webp', '', 'img-fluid') !!}
                            @else
                               
                                <img class="upload_user_img" src="{{ asset('frontendimg/common-user.png')}}" alt="user">

                                @endif
                                <input type="file" name="myfile"/>
                            </div>
                            <h3>Orders & Bookings</h3>
                        </div>
                        <div class="col-lg-11">
                        @if($orders->isNotEmpty())
    @foreach($orders as $order)
        <div class="col-12 b2b_order-summery">
            <div class="b2b_smmry_header">
                <p class="mb-0"><b>Order ID : Primefly# {{$order->orderData->order_code}}</b></p>
            </div>
            
            @foreach ($order->orderData->orderProducts as $product)
                @php
                    $orderStatus = App\Models\OrderLog::where('order_product_id', $product->id)->latest()->first();
                    $package = App\Models\Product::where('id', $product->product_id)->first();
                    $orderStatusPrevious = App\Models\OrderLog::where('order_product_id', $product->id)->latest()->skip(1)->take(1)->first();
                    if ($orderStatus && $orderStatus->status == 'Refunded') {
                        $refundStatus = $orderStatus;
                        $refundStatusPrevious = $orderStatusPrevious;
                    }
                @endphp

                <div class="row b2b_smmry_content">
                @foreach($product->productData->product_categories ?? [] as $product_category)
                        <div class="col-lg-4">
                            <p class="ms-0"><span>{{ $product_category->title }}</span></p>
                            <span style="color:#707070;font-size:11px; ">Package:{{ ucfirst($package->title) }}</span>




                              

@if(!is_null($product->travel_type) && $product->travel_type !== '')

<span style="color:#707070;font-size:11px; ">Travel Type:{{ucfirst($product->travel_type)}}</span>

@endif


                @if($product->origin)

<span style="color:#707070;font-size:11px; ">Origin:{{$product->origin}}</span>


@endif

@if($product->destination)

<span style="color:#707070;font-size:11px; ">Destination:{{$product->destination}}</span>


@endif
<br>
@if($product_category->title == "Porter")
@if(isset($product->guest) && $product->guest > 0)
<span style="color:#707070;font-size:11px;">Porter Count: {{$product->guest}}</span>
@else
<span style="color:#707070;font-size:11px;">Porter information not available</span>
@endif
@elseif(in_array($product_category->title, ['Meet and Greet', 'Airport Entry']))
@if(isset($product->guest) && $product->guest > 0)
<span style="color:#707070;font-size:11px;">Guest: {{$product->guest}}</span>
@else
<span style="color:#707070;font-size:11px;">Guest information not available</span>
@endif
@elseif(in_array($product_category->title, ['Car Parking', 'Cloak Room', 'Baggage Wrapping']))
@if(isset($product->guest) && $product->guest > 0)
<span style="color:#707070;font-size:11px;">Bag: {{$product->guest}}</span>
@else
<span style="color:#707070;font-size:11px;">Bag count information not available</span>
@endif
@else
@if(isset($product->guest) && $product->guest > 0)
<span style="color:#707070;font-size:11px;">Guest: {{$product->guest}}</span>
@else
<span style="color:#707070;font-size:11px;">Guest information not available</span>
@endif
@endif
                    @endforeach
                        </div>

                        
                    <div class="col-lg-4 text-center">
                        <p><b>Date: {{date('d-m-Y', strtotime($order->orderData->created_at))}}</b></p>
                    </div>
                    <div class="col-lg-2 text-center">
                        <h4>Total: ₹ {{ $product->total }}</h4>
                    </div>
                </div>
            @endforeach

            <div class="row">
                <div class="col-lg-12 text-end">
                    <a href="{{ route('invoice.pdf', ['order_id' => $order->orderData->id]) }}">View Invoice</a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-lg-12">
        <div class="d-flex justify-content-center">
            <div class="col-lg-4 no-booking text-center">
                <img src="{{ asset('frontend/img/no-booking.png') }}"/>
                <h4>You haven’t made any bookings</h4>
                <p>Lorem agtuineo pertiqe debozihri </p>
                <div class="col-12 text-center mt-3">
                    <a href="{{ url('/services') }}" class="btn-style-2"><div class="btn-in">View More</div></a>
                </div>
            </div>
        </div>
    </div>
@endif

</div>


                    </div>
                </div>
                <div id="profile-section" class="content-section" style="display:none;">

                <form action="#" method="POST" enctype="multipart/form-data" class="account-form" id="customerProfileForm">
    @csrf
    <div class="b2b_upload text-center"> 
    <div class="upload_user">
    <img id="profileImagePreview" class="upload_user_img" 
     src="{{ $user->profile_image ? asset($user->profile_image) : asset('frontend/img/camer.png') }}" 
     alt="Profile Image">


            <input type="file" name="profileImage" id="profileImageInput" onchange="previewImage(event)" />
        </div> 


        
        <h3>My Profile</h3>
    </div> 
    <div class="col-lg-11">
        <div class="d-flex justify-content-center">
            <div class="col-lg-6 profile-form">
                <h4>Personal Details</h4>
                <div class="row">
                    <div class="col-lg-6 profile_form_grid">
                        <label>Full name</label>
                        <input type="text" placeholder="Enter Your Name" name="first_name" id="first_name" value="{{@$customer->first_name}}" class="required">
                    </div>
                    <div class="col-lg-6 profile_form_grid">
                        <label>Mobile Number</label>
                        <input id="phone" name="phone" type="tel" value="{{@$customer->user->phone}}" class="required" />
                    </div>
                    <div class="col-lg-6 profile_form_grid">
                        <label>Email</label>
                        <input type="email" placeholder="Enter Your Email" name="email" id="email" value="{{@$customer->user->email}}" class="required">
                    </div>
                    <div class="col-lg-6 profile_form_grid">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{@$customer->date_of_birth}}">
                    </div>
                    <div class="col-lg-6 profile_form_grid">
                        <label>Nationality</label>
                        <select name="country">
                        <option value="india" {{ @$customer->country == 'india' ? 'selected' : '' }}>India</option>
                        <option value="dubai" {{ @$customer->country == 'dubai' ? 'selected' : '' }}>Dubai</option>
                        <option value="usa" {{ @$customer->country == 'usa' ? 'selected' : '' }}>USA</option>
                        <option value="canada" {{ @$customer->country == 'canada' ? 'selected' : '' }}>Canada</option>
                    </select>
                    </div>
                    <div class="col-12 register_form_grid text-center mt-4">
                        <button type="submit" class="btn btn-primary form_submit_btnu" data-url="/customer/update-profile">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add other sections like help, chat, terms, privacy, logout here -->
            </div>
        </div>
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
<script src="{{ asset('frontend/js/b2b.js')}}"></script>

      
<script>
    $(document).ready(function() {
        // Handle navigation click
        $('.nav-item').on('click', function() {
            var sectionToShow = $(this).data('section');
           
            
            // Hide all sections
            $('.content-section').hide();
            
            // Show the selected section
            $('#' + sectionToShow + '-section').show();
            
            // Remove active class from all nav items
            $('.nav-item').removeClass('active');
            
            // Add active class to the clicked nav item
            $(this).addClass('active');
        });
    });
</script>
<script>
        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
          
          initialCountry: "in",
         
        });
        window.iti = iti; // useful for testing
     




    document.getElementById('profileImageInput').addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profileImagePreview').src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
</body>
</html>
