
    <li class="nav-item">
        <a href="{{ url(Helper::sitePrefix().'order/calendar') }}"
         
          class="nav-link {{ (Request::segment(3) == 'calendar') ? 'active' : '' }}">


            <i class="nav-icon fas fa-calendar"></i>
            <p>calendar</p>
        </a>
    </li>
  


    @if (Auth::user()->admin->role == "Super Admin")

    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
            Admin Management
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
      
        <li class="nav-item">
            <a href="{{ url(Helper::sitePrefix().'administration') }}"
               class="nav-link {{ (Request::segment(2) == 'administration' && !Request::segment(3)) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>Administration</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url(Helper::sitePrefix().'administration/assign') }}"
               class="nav-link {{ (Request::segment(3) == 'assign') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>Assign</p>
            </a>
        </li>
    </ul>
</li>

@endif



@if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'customer')}}"
       class="nav-link {{ (Request::segment(2)=='customer')?'active':'' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Customers</p>
    </a>
</li>
@endif
<!-- @if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'home/slider-banner')}}"
       class="nav-link {{ (Request::segment(3)=='slider-banner')?'active':'' }}">
        <i class="nav-icon fas fa-image"></i>
        <p>Home-slider</p>
    </a>
</li>
@endif -->

<!-- @if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item {{ (Request::segment(2)=='banner')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='banner')?'active':'' }}">
        <i class="nav-icon fas fa-image"></i>
        <p>Banner
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='banner')?'block':'none' }}"> -->

        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/product')}}"
               class="nav-link {{ (Request::segment(3)=='product')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product </p>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/blogs')}}"
               class="nav-link {{ (Request::segment(3)=='blogs')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Blog</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/journal')}}"
               class="nav-link {{ (Request::segment(3)=='journal')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Journal</p>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/cart')}}"
               class="nav-link {{ (Request::segment(3)=='cart')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Cart</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/checkout')}}"
               class="nav-link {{ (Request::segment(3)=='checkout')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Checkout</p>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/contact')}}"
               class="nav-link {{ (Request::segment(3)=='contact')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact</p>
            </a>
        </li> -->
<!-- <li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'home/slider-banner')}}"
       class="nav-link {{ (Request::segment(3)=='slider-banner')?'active':'' }}">
        <i class="nav-icon fas fa-image"></i>
        <p>Home-slider</p>
    </a>
</li> -->

          <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/contact')}}"
               class="nav-link {{ (Request::segment(3)=='contact')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/about')}}"
               class="nav-link {{ (Request::segment(3)=='about')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>About Us</p>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/my-account')}}"
               class="nav-link {{ (Request::segment(3)=='my-account')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>My Account</p>
            </a>
        </li> -->




        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/faq')}}"
               class="nav-link {{ (Request::segment(3)=='faq')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Faq</p>
            </a>
        </li> -->

        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/shipping-policy')}}"
               class="nav-link {{ (Request::segment(3)=='faq')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Shipping Policy</p>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/payment-policy')}}"
               class="nav-link {{ (Request::segment(3)=='faq')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>payment-policy</p>
            </a>
        </li> -->

        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/privacy-policy')}}"
               class="nav-link {{ (Request::segment(3)=='privacy-policy')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Privacy Policy</p>
            </a>
        </li> -->

        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/terms-and-conditions')}}"
               class="nav-link {{ (Request::segment(3)=='terms-and-conditions')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Terms and Condition</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/return-policy')}}"
               class="nav-link {{ (Request::segment(3)=='return-policy')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Return Policy</p>
            </a>
        </li> -->

        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/shipping-policy')}}"
               class="nav-link {{ (Request::segment(3)=='shipping-policy')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Shipping Policy</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/disclaimer')}}"
               class="nav-link {{ (Request::segment(3)=='disclaimer')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Disclaimer</p>
            </a>
        </li> -->

        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/404')}}"
               class="nav-link {{ (Request::segment(3)=='404')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>404 </p>
            </a>
        </li> -->
    <!-- </ul>
</li>
@endif -->
<!-- @if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'about')}}"
        class="nav-link {{ (Request::segment(2)=='about')?'active':'' }}">
        <i class="nav-icon fas fa-th-list"></i>
        <p>About</p>
    </a>
 <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='about')?'block':'none' }}"> 

 
  

        <li class="nav-item">
                  <a href="{{url(Helper::sitePrefix().'about')}}"
                 class="nav-link {{ (Request::segment(2)=='about')?'active':'' }}">
                     <i class="fas fa-star nav-icon"></i>
                   <p>Why Us</p>
                   </a>
               </li>
               <li class="nav-item">
                  <a href="{{url(Helper::sitePrefix().'about/who-we-are')}}"
                 class="nav-link {{ (Request::segment(3)=='who-we-are')?'active':'' }}">
                     <i class="fas fa-star nav-icon"></i>
                   <p>Who We Are</p>
                   </a>
               </li>
               <li class="nav-item">
                  <a href="{{url(Helper::sitePrefix().'about/who-we-are')}}"
                 class="nav-link {{ (Request::segment(3)=='who-we-are')?'active':'' }}">
                     <i class="fas fa-star nav-icon"></i>
                   <p>Vision and Mission</p>
                   </a>
               </li>
               <li class="nav-item">
                  <a href="{{url(Helper::sitePrefix().'about/who-we-are')}}"
                 class="nav-link {{ (Request::segment(3)=='who-we-are')?'active':'' }}">
                     <i class="fas fa-star nav-icon"></i>
                   <p>Our Features</p>
                   </a>
               </li>
              
     </ul> 
</li>
@endif -->
@if (auth()->check() && Auth::user()->admin->role == "Super Admin")
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Category Management
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url(Helper::sitePrefix().'product/category')}}"
                   class="nav-link {{ (Request::segment(3) == 'category') ? 'active' : '' }}">
                    <i class="fas fa-folder nav-icon"></i>
                    <p>Service-Category</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url(Helper::sitePrefix().'product/sub-category') }}"
                   class="nav-link {{ (Request::segment(2) == 'sub-category') ? 'active' : '' }}">
                    <i class="fas fa-folder nav-icon"></i>
                    <p>How It Works</p>
                </a>
            </li>
        </ul>
    </li>
@endif

<!-- 
               @if ((Auth::user()->admin->role) == "Super Admin")            
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'contact')}}"
       class="nav-link {{ (Request::segment(2)=='contact')?'active':''}}">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Contact</p>
    </a>
</li>
@endif -->
@if ((Auth::user()->admin->role) == "Super Admin")  

<li class="nav-item">
    <!-- <a href="{{url(Helper::sitePrefix().'order')}}" class="nav-link {{ (Request::segment(2)=='order')?'active':'' }}"> -->
    <a href="{{ url(Helper::sitePrefix().'order') }}" class="nav-link {{ Request::is(Helper::sitePrefix().'order') ? 'active' : '' }}">

        <i class="nav-icon fas fa-th-list"></i>
        <p>Booking</p>
        <span class="pull-right-container">
            <!-- <span class="badge badge-success pull-right">{{App\Models\Order::OrderCountByStatus('Processing')}}</span> -->
        </span>
    </a>
</li>
@endif
@if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item {{ (Request::segment(2)=='enquiry')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='enquiry')?'active':'' }}">
        {{--        <i class="nav-icon fas fa-envelope"></i>--}}
        <i class="nav-icon fas fa-inbox"></i>
        <p>Enquiry
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='enquiry')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'enquiry')}}"
               class="nav-link {{ (Request::is(Helper::sitePrefix().'enquiry'))?'active':'' }}">
                <i class="fas fa-envelope-open-text"></i>
                <p>Contact Page</p>
            </a>
   
    </ul>
</li>
@endif
@if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'site-information')}}"
       class="nav-link {{ (Request::segment(2)=='site-information')?'active':''}}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>Site Information</p>
    </a>
</li>
@endif
@if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'blog')}}"
       class="nav-link {{ (Request::segment(2)=='blog')?'active':''}}">
        <i class="fas fa-blog nav-icon"></i>
        <p>Blog</p>
    </a>
</li>
@endif
@if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'service')}}"
       class="nav-link {{ (Request::segment(2)=='service')?'active':''}}">
       <i class="fas fa-wrench nav-icon"></i>

        <p>Package</p>
    </a>
</li>
@endif
<li class="nav-item">
                  <a href="{{url(Helper::sitePrefix().'location')}}"
                 class="nav-link {{ (Request::segment(2)=='location')?'active':'' }}">
                 <i class="fas fa-map-marker-alt nav-icon"></i>

                   <p>Location</p>
                   </a>
               </li>
<!-- @if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'gallery')}}"
       class="nav-link {{ (Request::segment(2)=='gallery')?'active':''}}">
       <i class="fas fa-image nav-icon"></i>

        <p>Gallery</p>
    </a>
</li>
@endif
@if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'faq')}}"
       class="nav-link {{ (Request::segment(2)=='faq')?'active':''}}">
        <i class="nav-icon fas fa-question-circle"></i>
        <p>Faqs</p>
    </a>
</li>
@endif -->
@if ((Auth::user()->admin->role) == "Super Admin")
<li class="nav-item">
    <a href="#" class="nav-link {{ (Request::segment(2)=='gallery' || Request::segment(2)=='faq' || Request::segment(2)=='contact') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            HomePage
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'gallery')}}"
               class="nav-link {{ (Request::segment(2)=='gallery')?'active':''}}">
                <i class="fas fa-image nav-icon"></i>
                <p>Gallery</p>
            </a>
        </li> -->
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'faq')}}"
               class="nav-link {{ (Request::segment(2)=='faq')?'active':''}}">
                <i class="nav-icon fas fa-question-circle"></i>
                <p>FAQs</p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'contact')}}"
               class="nav-link {{ (Request::segment(2)=='contact')?'active':''}}">
                <i class="nav-icon fas fa-envelope"></i>
                <p>Contact</p>
            </a>
        </li> -->

        <li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'home/testimonial')}}"
       class="nav-link {{ (Request::segment(3)=='testimonial')?'active':''}}">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Testimonial</p>
    </a>
</li>
    </ul>
</li>
@endif


               <!-- @if ((Auth::user()->admin->role) == "Super Admin")            
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'home/testimonial')}}"
       class="nav-link {{ (Request::segment(3)=='testimonial')?'active':''}}">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Testimonial</p>
    </a>
</li>
@endif -->
@if ((Auth::user()->admin->role) == "Super Admin")   
<li class="nav-item menu-report hide-menu {{ (Request::segment(2)=='report')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas icon fas fa-info"></i>
        <p>Report
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='report')?'block':'none' }}">
       <li class="nav-item menu-detail hide-menu">
    <a href="{{url(Helper::sitePrefix().'report/detail-report')}}"
       class="nav-link {{ (Request::segment(3)=='detail_report')?'active':'' }}">
        <i class="nav-icon fas fa-th-list"></i>
        <p>
            Detail Report
        </p>
    </a>
</li>
      
        <li class="nav-item {{ (Request::segment(3)=='product')?'menu-is-opening menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Customer
                    <i class=""></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: {{ (Request::segment(3)=='customer')?'block':'none' }}">
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/customer/basic')}}"
                       class="nav-link {{ (Request::segment(4)=='basic')?'active':'' }}">
                        <i class="fas fa-check-circle nav-icon"></i>
                        <p>Basic Report</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'report/customer/order-report')}}"
                       class="nav-link {{ (Request::segment(4)=='order-report')?'active':'' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Booking Report</p>
                    </a>
                </li> -->
            </ul>
        </li>
    </ul>
</li>

@endif

 