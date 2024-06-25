<div class="col-12 header{{ Request::is('cart', 'checkout') ? ' header-cart' : '' }}">
            <div class="container">
               <header class="d-flex flex-wrap justify-content-center align-items-center py-2">

                  <a href="/" class="header-logo d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none">

                  @if(Request::is('cart', 'checkout'))



                  <img src="{{ asset('frontend/img/logo-blue.png')}}" alt="Logo"/>


                  @else
                  <img src="{{ asset('frontend/img/logo.png')}}" alt="Logo"/>
                  @endif

                

                 
                  </a> 


                  <ul class="nav">
                     <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">About Us</a></li>
                     <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
                     <li class="nav-item"><a href="#" class="nav-link">Airports</a></li>
                     <li class="nav-item"><a href="{{ url('blogs/') }}" class="nav-link">Blogs</a></li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                           </svg>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ url('cart/') }}" class="nav-link"><img src="{{ asset('frontend/img/cart-white.png')}}" alt="logo"><span class="cart-count">{{ Helper::getCartItemCount()}}</span></a>
                     </li>
                     <li class="nav-item header-login"><a href="{{ url('choose/') }}" class="btn btn-default">Login</a></li>
                  </ul>
               </header>
            </div>
         </div>