
    <li class="nav-item">
        <a href="{{ url(Helper::sitePrefix().'order/calendar') }}" class="nav-link {{ (Request::segment(3) == 'calendar') ? 'active' : '' }}">
            <i class="nav-icon fas fa-calendar"></i>
            <p>Calendar</p>
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

@if (auth()->check() && Auth::user()->admin->role == "Super Admin")
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Service Management
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
    <!-- <a href="{{url(Helper::sitePrefix().'order')}}" class="nav-link {{ (Request::segment(2)=='order')?'active':'' }}"> -->
    <a href="{{ url(Helper::sitePrefix().'order') }}" class="nav-link {{ Request::is(Helper::sitePrefix().'order') ? 'active' : '' }}">

        <i class="nav-icon fas fa-th-list"></i>
        <p>Booking</p>
        <span class="pull-right-container">
            <!-- <span class="badge badge-success pull-right">{{App\Models\Order::OrderCountByStatus('Processing')}}</span> -->
        </span>
    </a>
</li>

<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'service')}}"
       class="nav-link {{ (Request::segment(2)=='service')?'active':''}}">
       <i class="fas fa-wrench nav-icon"></i>

        <p>Package</p>
    </a>
</li>

        </ul>
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
    <a href="#" class="nav-link {{ (Request::segment(2)=='gallery' || Request::segment(2)=='faq' || Request::segment(2)=='contact') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            CMS Management
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
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/slider-banner')}}"
               class="nav-link {{ (Request::segment(3)=='slider-banner')?'active':'' }}">
               <i class="fas fa-circle nav-icon"></i>

                <p>Home Banner</p>
            </a>
        </li>

       
        <li class="nav-item">
                <a href="{{ url(Helper::sitePrefix().'product/sub-category') }}"
                   class="nav-link {{ (Request::segment(2) == 'sub-category') ? 'active' : '' }}">
                    <i class="fas fa-folder nav-icon"></i>
                    <p>How It Works</p>
                </a>
            </li>

        <li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'home/testimonial')}}"
       class="nav-link {{ (Request::segment(3)=='testimonial')?'active':''}}">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Testimonial</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'site-information')}}"
       class="nav-link {{ (Request::segment(2)=='site-information')?'active':''}}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>Site Information</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'blog')}}"
       class="nav-link {{ (Request::segment(2)=='blog')?'active':''}}">
        <i class="fas fa-blog nav-icon"></i>
        <p>Blog</p>
    </a>
</li>



<li class="nav-item">
                  <a href="{{url(Helper::sitePrefix().'location')}}"
                 class="nav-link {{ (Request::segment(2)=='location')?'active':'' }}">
                 <i class="fas fa-map-marker-alt nav-icon"></i>

                   <p>Location</p>
                   </a>
               </li>

    </ul>
</li>

@endif



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
      
      
    </ul>
</li>

@endif

@if ((Auth::user()->admin->role) !== "Super Admin") 
<li class="nav-item menu-report hide-menu {{ (Request::segment(2)=='report')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas icon fas fa-info"></i>
        <p>Report
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='report')?'block':'none' }}">
       <li class="nav-item menu-detail hide-menu">
    <a href="{{url(Helper::sitePrefix().'report/detail_report_subadmin')}}"
       class="nav-link {{ (Request::segment(3)=='detail_report_subadmin')?'active':'' }}">
        <i class="nav-icon fas fa-th-list"></i>
        <p>
            Detail Report
        </p>
    </a>
</li>
      
        
    </ul>
</li>


@endif

 