<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{url(Helper::sitePrefix().'dashboard')}}" class="brand-link">
        {!! Helper::printImage(@$siteInformation, 'logo','logo_webp','logo_attribute','brand-image','opacity: .8') !!}
        <span class="brand-text font-weight-light">{{ @$siteInformation->brand_name }}</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Helper::loggedUserProfileImage()}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @if(auth()->user()->user_type=="Admin")
                    <a href="{{url(Helper::sitePrefix().'administration/profile')}}"
                       class="d-block">{{Helper::loggedUserName()}}</a>
                    <span class="text-white text-sm">{{auth()->user()->user_type}}</span>
                @else
                    <a href="{{url(Helper::sitePrefix().'/profile')}}" class="d-block">{{Helper::loggedUserName()}}</a>
                @endif
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'dashboard')}}"
                       class="nav-link {{ (Request::segment(2)=='dashboard' && Request::segment(1)=='admin')?'active':'' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @include('Admin.includes.menus.'.Helper::loggedUserType().'_menu');
            </ul>
        </nav>
    </div>
</aside>
