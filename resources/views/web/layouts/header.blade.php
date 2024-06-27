<div class="col-12 header{{ Request::is('cart', 'checkout','preview','package/*') ? ' header-cart' : '' }}">
            <div class="container">
               <header class="d-flex flex-wrap justify-content-center align-items-center py-2">

                  <a href="{{ url('/') }}" class="header-logo d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none">

                  @if(Request::is('cart', 'checkout','preview','package/*'))



                  <img src="{{ asset('frontend/img/logo-blue.png')}}" alt="Logo"/>


                  @else
                  <img src="{{ asset('frontend/img/logo.png')}}" alt="Logo"/>
                  @endif

                

                 
                  </a> 


                  <ul class="nav align-items-center">
                     <!-- <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">About Us</a></li> -->
                     <li class="nav-item"><a href="{{ url('services/') }}" class="nav-link">Services</a></li>
                     <li class="nav-item"><a href="{{ url('locations/') }}" class="nav-link">Airports</a></li>
                     <li class="nav-item"><a href="{{ url('blogs/') }}" class="nav-link">Blogs</a></li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                           </svg>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ url('cart/') }}" class="nav-link head-cart"><img src="{{ asset('frontend/img/cart-white.png')}}" alt="logo"><span class="cart-count">{{ Helper::getCartItemCount()}}</span></a>
                     </li>

                     @if(Auth::guard('customer')->check())
                     <li class="nav-item header_account_login">
                        <div class="dropdown">
                        @php
                                        $user = Auth::guard('customer')->user();
                                        $customer = $user->customer;
                                    @endphp
     
                        @if($customer->user->profile_image)
                        <img class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" 
     src="{{ $user->profile_image ? asset($user->profile_image) : asset('frontend/img/camer.png') }}" 
     alt="Profile Image">
                            @else
                               
                            <img class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" 
                            src="{{ asset('frontend/img/common-user.png')}}" alt=""/>

                                @endif

                          

                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ url('customer/account') }}">My Account</a></li> 
                              <li><a href="{{ url('logout/') }}" class="dropdown-item">LogOut</a></li> 
                           </ul>
                        </div>
                  </li>
                     @else

                     <li class="nav-item header-login"><a href="{{ url('choose/') }}" class="btn btn-default">Login</a></li>
                     @endif



                  </ul>
               </header>
            </div>
         </div>