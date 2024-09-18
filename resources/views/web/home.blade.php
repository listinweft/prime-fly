@extends('web.layouts.main')
@section('content')

<section class="col-12 banner d-none d-sm-block">
            <img src="{{ asset('frontend/img/banner.webp')}}" alt="Banner" />

            <!-- {!! Helper::printImage(@$banners, 'desktop_image', 'desktop_image_webp', '', 'img-fluid') !!} -->
            <div class="banner_content">
               <div class="container">
                  <div class="d-flex justify-content-center">
                     <div class="col-lg-12">
                        <h1 data-aos="fade-up" data-aos-duration="500">
                           <span>It’s time to</span> Discover  <b>Find and book a great experience</b>
                        </h1>
                    


                        <div class="banner_filter" data-aos="fade-up" data-aos-duration="1000">
                          
                           <ul class="nav nav-pills banner_filter_pills" id="pills-tab" role="tablist">



                           @php
    // Fetch categories
    $meetandgreet = App\Models\Category::where('title', 'meet and greet')->where('status', 'Active')->first();
    $lounge = App\Models\Category::where('title', 'Lounge Booking')->where('status', 'Active')->first();
    $baggage = App\Models\Category::where('title', 'Baggage wrapping')->where('status', 'Active')->first();
    $airportentry = App\Models\Category::where('title', 'Airport Entry')->where('status', 'Active')->first();
    $carParking = App\Models\Category::where('title', 'Car Parking')->where('status', 'Active')->first();
    $porter = App\Models\Category::where('title', 'Porter')->where('status', 'Active')->first();
    $cloakRoom = App\Models\Category::where('title', 'Cloak Room')->where('status', 'Active')->first();

    // Determine the active category based on the available categories
    $activeCategory = '';
    if ($meetandgreet) {
        $activeCategory = 'meet and greet';
    } elseif ($lounge) {
        $activeCategory = 'Lounge Booking';
    } elseif ($baggage) {
        $activeCategory = 'Baggage wrapping';
    } elseif ($airportentry) {
        $activeCategory = 'Airport Entry';
    } elseif ($carParking) {
        $activeCategory = 'Car Parking';
    } elseif ($porter) {
        $activeCategory = 'Porter';
    } elseif ($cloakRoom) {
        $activeCategory = 'Cloak Room';
    }
@endphp
                            @php
                           $category = App\Models\Category::where('title', 'meet and greet')->where('status','Active')->first();
                           @endphp
                           @if($category)
                             <li class="nav-item col" role="presentation">
                                 <button class="nav-link {{ $activeCategory == 'meet and greet' ? 'active' : '' }}" id="meet-and-greet-tab" data-bs-toggle="pill" data-bs-target="#meet-and-greet-tab-pane" type="button" role="tab" aria-controls="meet-and-greet-tab-pane" aria-selected="false">
                                    <svg width="17" height="25" viewBox="0 0 17 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M8.34019 4.2998L7.83542 8.06032C8.03733 8.16127 8.21399 8.33794 8.34019 8.51461C8.46638 8.3127 8.64305 8.16127 8.84495 8.06032L8.34019 4.2998Z" fill="#ADAAAA"/>
                                       <path d="M14.6242 19.2407C13.8922 18.2816 13.5137 17.0954 13.5389 15.884C13.5894 13.7892 13.4884 9.85201 11.9489 6.89912V6.87388L9.7784 1.29621C9.6522 0.96811 9.27363 0.791441 8.92029 0.917633C8.76886 0.96811 8.66791 1.06906 8.59219 1.19525V2.33098L9.32411 7.88342C9.39982 7.85818 9.50077 7.85818 9.57649 7.85818C10.3841 7.85818 11.0656 8.51437 11.0656 9.34724V15.0006C11.0656 15.1521 10.9646 15.253 10.8132 15.253C10.6617 15.253 10.5608 15.1521 10.5608 15.0006V9.34724C10.586 8.81723 10.1822 8.36294 9.62697 8.31247C9.09696 8.28723 8.64267 8.69104 8.59219 9.24629C8.59219 9.27152 8.59219 9.322 8.59219 9.34724V19.3669C8.59219 19.3669 8.81934 21.5374 10.2832 22.6478L10.3084 22.6731L12.706 24.995L16.6432 21.8402L14.6242 19.2407Z" fill="#ADAAAA"/>
                                       <path d="M7.50708 8.43875H7.48184C7.38089 8.38827 7.25469 8.36304 7.1285 8.36304C6.5985 8.36304 6.14421 8.79209 6.16945 9.34733V14.9755C6.16945 15.1269 6.06849 15.2279 5.91706 15.2279C5.76563 15.2279 5.66468 15.1269 5.66468 14.9755V9.34733C5.66468 8.5397 6.32088 7.88351 7.1285 7.85827C7.20422 7.85827 7.30517 7.85827 7.38089 7.88351L8.08756 2.33107V1.17011C8.01184 1.04392 7.88565 0.942963 7.73422 0.892486C7.40612 0.766295 7.02755 0.942963 6.90136 1.27106L4.7561 6.87397V6.89921C3.21656 9.8521 3.09037 13.7893 3.16608 15.8841C3.19132 17.0955 2.81275 18.2817 2.08083 19.2408L0.0617676 21.8403L4.02419 24.9951L6.42183 22.6732L6.44707 22.6479C7.91089 21.5122 8.13804 19.3417 8.13804 19.3417V9.34733C8.08756 8.94352 7.86041 8.59018 7.50708 8.43875Z" fill="#ADAAAA"/>
                                    </svg>
                                    Meet and Greet
                                 </button>
                              </li>
                              @endif
                              @php
                           $categoryl = App\Models\Category::where('title', 'Lounge Booking')->where('status','Active')->first();
                           @endphp
                           @if($categoryl)
                              <li class="nav-item col" role="presentation">
                                 <button class="nav-link {{ $activeCategory == 'Lounge Booking' ? 'active' : '' }}" id="lounge-tab" data-bs-toggle="pill" data-bs-target="#lounge-tab-pane" type="button" role="tab" aria-controls="lounge-tab-pane" aria-selected="false">
                                    <svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M19.5796 15.8315V13.6159C19.5796 13.2665 19.863 12.9828 20.2127 12.9828C20.5624 12.9828 20.8458 13.2662 20.8458 13.6159V15.8315C20.8458 15.8437 20.843 15.8549 20.8424 15.8667H26.1295V12.4205C24.2718 11.9882 22.8734 10.3065 22.8734 8.33434C22.8734 6.36216 24.2718 4.68051 26.1295 4.24817V0.802246H20.8458V2.53845C20.8458 2.88788 20.5624 3.17153 20.2127 3.17153C19.8633 3.17153 19.5796 2.88819 19.5796 2.53845V0.802246H0.37037V4.24817C2.22783 4.68051 3.62615 6.36216 3.62615 8.33434C3.62615 10.3065 2.22783 11.9882 0.37037 12.4205V15.8664H19.5834C19.5827 15.8546 19.5796 15.8434 19.5796 15.8315ZM19.5796 4.75407C19.5796 4.40433 19.863 4.12099 20.2127 4.12099C20.5624 4.12099 20.8458 4.40433 20.8458 4.75407V6.96968C20.8458 7.31911 20.5624 7.60276 20.2127 7.60276C19.8633 7.60276 19.5796 7.31942 19.5796 6.96968V4.75407ZM19.5796 9.18498C19.5796 8.83556 19.863 8.55191 20.2127 8.55191C20.5624 8.55191 20.8458 8.83525 20.8458 9.18498V11.4006C20.8458 11.75 20.5624 12.0337 20.2127 12.0337C19.8633 12.0337 19.5796 11.7503 19.5796 11.4006V9.18498ZM16.5592 9.28255L14.558 9.21584L13.5179 13.3061H12.507V9.14758L10.4672 9.07963L9.57944 11.0898H8.56858L8.96569 8.33434L8.56889 5.57853H9.57976L10.4675 7.58873L12.5073 7.52078V3.36261H13.5182L14.558 7.45283L16.5592 7.38612C17.2976 7.3615 17.931 7.7876 17.931 8.33434C17.931 8.88076 17.2976 9.30686 16.5592 9.28255Z" fill="#ADAAAA"/>
                                       <rect x="8.24895" y="2.46118" width="9.95204" height="12.0254" fill="#ADAAAA"/>
                                       <path d="M16.8541 6.73716C16.7617 6.48187 16.0973 6.49826 15.8347 6.60277C14.8788 6.98767 13.9327 7.37022 12.9769 7.75511L9.51486 6.61657L9.17949 7.01624L10.7272 8.65789C9.82231 9.04078 8.1512 9.74224 7.84968 9.85613C7.58702 9.96065 9.59043 10.1249 10.0471 10.0147C10.0471 10.0147 13.4713 8.65366 14.989 8.04064C15.383 7.88387 15.7673 7.72944 16.1613 7.57267C16.4286 7.48758 16.9439 7.02394 16.8541 6.73716Z" fill="white"/>
                                       <path d="M7.23611 8.67756L6.97948 8.93484L7.74865 9.73624L8.7631 9.29607L7.23611 8.67756Z" fill="#ADAAAA"/>
                                    </svg>
                                    Lounge Booking
                                 </button>
                              </li>
                              @endif
                              @php
                              $categoryb = App\Models\Category::where('title', 'Baggage wrapping')->where('status','Active')->first();
                             
                           @endphp
                           @if($categoryb)
                              <li class="nav-item col" role="presentation">
                                 <button class="nav-link {{ $activeCategory == 'Baggage wrapping' ? 'active' : '' }}" id="Baggage-Wrapping-tab" data-bs-toggle="pill" data-bs-target="#Baggage-Wrapping-tab-pane" type="button" role="tab" aria-controls="Baggage-Wrapping-tab-pane" aria-selected="true">
                                    <svg width="15" height="27" viewBox="0 0 15 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0313 4.36543V6.10818H10.3872V4.36543C10.5989 4.41605 10.8196 4.41605 11.0313 4.36543ZM4.63492 6.10818V4.36543C4.84666 4.41605 5.06735 4.41605 5.27908 4.36543V6.10818H4.63492ZM2.62776 9.87797C2.63032 9.79426 2.66538 9.71483 2.7255 9.65652C2.78562 9.5982 2.86609 9.56559 2.94984 9.56559C3.0336 9.56559 3.11406 9.5982 3.17418 9.65652C3.2343 9.71483 3.26936 9.79426 3.27192 9.87797V20.7519C3.26936 20.8356 3.2343 20.915 3.17418 20.9733C3.11406 21.0317 3.0336 21.0643 2.94984 21.0643C2.86609 21.0643 2.78562 21.0317 2.7255 20.9733C2.66538 20.915 2.63032 20.8356 2.62776 20.7519V9.88038V9.87797ZM5.06948 9.87797C5.07204 9.79426 5.1071 9.71483 5.16722 9.65652C5.22734 9.5982 5.30781 9.56559 5.39156 9.56559C5.47532 9.56559 5.55578 9.5982 5.6159 9.65652C5.67603 9.71483 5.71108 9.79426 5.71364 9.87797V20.7519C5.71108 20.8356 5.67603 20.915 5.6159 20.9733C5.55578 21.0317 5.47532 21.0643 5.39156 21.0643C5.30781 21.0643 5.22734 21.0317 5.16722 20.9733C5.1071 20.915 5.07204 20.8356 5.06948 20.7519V9.88038V9.87797ZM7.5109 9.87797C7.51449 9.79492 7.55001 9.71647 7.61005 9.65897C7.67009 9.60147 7.75 9.56938 7.83313 9.56938C7.91626 9.56938 7.99618 9.60147 8.05622 9.65897C8.11625 9.71647 8.15177 9.79492 8.15536 9.87797V20.7519C8.15177 20.8349 8.11625 20.9134 8.05622 20.9709C7.99618 21.0284 7.91626 21.0605 7.83313 21.0605C7.75 21.0605 7.67009 21.0284 7.61005 20.9709C7.55001 20.9134 7.51449 20.8349 7.5109 20.7519V9.88038V9.87797ZM9.95262 9.87797C9.95518 9.79426 9.99024 9.71483 10.0504 9.65652C10.1105 9.5982 10.1909 9.56559 10.2747 9.56559C10.3585 9.56559 10.4389 9.5982 10.499 9.65652C10.5592 9.71483 10.5942 9.79426 10.5968 9.87797V20.7519C10.5942 20.8356 10.5592 20.915 10.499 20.9733C10.4389 21.0317 10.3585 21.0643 10.2747 21.0643C10.1909 21.0643 10.1105 21.0317 10.0504 20.9733C9.99024 20.915 9.95518 20.8356 9.95262 20.7519V9.88038V9.87797ZM12.3943 9.87797C12.3969 9.79426 12.432 9.71483 12.4921 9.65652C12.5522 9.5982 12.6327 9.56559 12.7164 9.56559C12.8002 9.56559 12.8806 9.5982 12.9408 9.65652C13.0009 9.71483 13.0359 9.79426 13.0385 9.87797V20.7519C13.0359 20.8356 13.0009 20.915 12.9408 20.9733C12.8806 21.0317 12.8002 21.0643 12.7164 21.0643C12.6327 21.0643 12.5522 21.0317 12.4921 20.9733C12.432 20.915 12.3969 20.8356 12.3943 20.7519V9.88038V9.87797ZM5.43116 3.57822C5.49301 3.51927 5.54226 3.44839 5.57596 3.36987C5.60965 3.29136 5.62709 3.20682 5.62721 3.12138V2.46668C5.62879 2.38279 5.66363 2.30295 5.72405 2.24473C5.78447 2.18651 5.86555 2.15466 5.94944 2.1562H9.71682C9.75835 2.15544 9.79962 2.16287 9.83827 2.17806C9.87693 2.19326 9.91221 2.21592 9.9421 2.24475C9.972 2.27358 9.99592 2.30802 10.0125 2.3461C10.0291 2.38418 10.038 2.42515 10.0388 2.46668V3.12138C10.0389 3.20685 10.0564 3.29139 10.0901 3.36991C10.1239 3.44843 10.1732 3.51929 10.2351 3.57822C10.3631 3.69964 10.5328 3.76732 10.7093 3.76732C10.8857 3.76732 11.0554 3.69964 11.1834 3.57822C11.2453 3.51929 11.2946 3.44843 11.3284 3.36991C11.3621 3.29139 11.3796 3.20685 11.3798 3.12138V1.51023C11.3796 1.42477 11.3621 1.34022 11.3284 1.2617C11.2946 1.18318 11.2453 1.11232 11.1834 1.05339C11.0559 0.931304 10.886 0.8635 10.7094 0.864264H4.95745C4.78091 0.8635 4.61097 0.931304 4.48344 1.05339C4.42155 1.11232 4.37223 1.18318 4.33849 1.2617C4.30474 1.34022 4.28726 1.42477 4.2871 1.51023V3.12138C4.28726 3.20685 4.30474 3.29139 4.33849 3.36991C4.37223 3.44843 4.42155 3.51929 4.48344 3.57822C4.61146 3.69964 4.78117 3.76732 4.9576 3.76732C5.13404 3.76732 5.30375 3.69964 5.43177 3.57822H5.43116ZM1.58639 24.0564V25.0619C1.58508 25.1458 1.61564 25.2271 1.67191 25.2893C1.69356 25.3132 1.71987 25.3325 1.74924 25.3458C1.77861 25.3592 1.8104 25.3664 1.84266 25.367H13.8236C13.8559 25.3664 13.8877 25.3592 13.917 25.3458C13.9464 25.3325 13.9727 25.3132 13.9944 25.2893C14.0506 25.2271 14.0812 25.1458 14.0799 25.0619V24.0567C13.5716 24.3612 12.9901 24.5215 12.3977 24.5205H3.26861C2.67616 24.5215 2.09462 24.3609 1.58639 24.0564ZM4.50934 25.9877H3.15417C3.1511 26.0147 3.14959 26.0418 3.14965 26.069C3.14979 26.1559 3.16756 26.2419 3.20188 26.3218C3.2362 26.4016 3.28635 26.4737 3.34932 26.5337C3.4794 26.657 3.65186 26.7258 3.83116 26.7258C4.01045 26.7258 4.18291 26.657 4.31299 26.5337C4.376 26.4737 4.4262 26.4017 4.46057 26.3218C4.49494 26.2419 4.51276 26.1559 4.51296 26.069C4.51293 26.0418 4.51132 26.0147 4.50814 25.9877H4.50934ZM12.5115 25.9877H11.1563C11.1531 26.0147 11.1515 26.0418 11.1515 26.069C11.1517 26.1559 11.1695 26.2419 11.2038 26.3217C11.2381 26.4016 11.2883 26.4737 11.3512 26.5337C11.4813 26.657 11.6537 26.7257 11.833 26.7257C12.0123 26.7257 12.1847 26.657 12.3148 26.5337C12.3778 26.4737 12.428 26.4016 12.4623 26.3218C12.4966 26.2419 12.5144 26.1559 12.5145 26.069C12.5146 26.0418 12.5131 26.0147 12.51 25.9877H12.5115ZM14.1299 23.2418C14.1568 23.2014 14.1925 23.1676 14.2344 23.143C14.4601 22.9204 14.6395 22.6553 14.7624 22.363C14.8852 22.0707 14.9491 21.7571 14.9502 21.44V9.18774C14.9488 8.86261 14.8816 8.54113 14.7527 8.24266C14.6238 7.94419 14.4358 7.6749 14.2 7.45101C13.7155 6.9858 13.0694 6.7267 12.3977 6.72825H3.26861C2.59686 6.72654 1.95068 6.98566 1.46623 7.45101C1.23047 7.6749 1.04247 7.94419 0.913545 8.24266C0.784622 8.54113 0.717447 8.86261 0.716064 9.18774V21.4403C0.717221 21.7574 0.78106 22.0711 0.903911 22.3634C1.02676 22.6558 1.2062 22.9209 1.4319 23.1436C1.47379 23.168 1.50953 23.2017 1.5364 23.2421C2.01313 23.6671 2.62992 23.9013 3.26861 23.8998H12.3977C13.0363 23.9013 13.6531 23.6668 14.1299 23.2418Z" fill="white"/>
                                       <rect x="1.95026" y="8.6875" width="12.0715" height="13.4643" fill="white"/>
                                    </svg>
                                    Baggage Wrapping
                                 </button>
                              </li>
                              @endif

                              @php
                              $categorya = App\Models\Category::where('title', 'Airport Entry')->where('status','Active')->first();
                             
                           @endphp
                           @if($categorya)

                              <li class="nav-item col" role="presentation">
                                 <button class="nav-link {{ $activeCategory == 'Airport Entry' ? 'active' : '' }}" id="airport-tab" data-bs-toggle="pill" data-bs-target="#airport-tab-pane" type="button" role="tab" aria-controls="airport-tab-pane" aria-selected="false">
                                    <svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M19.5796 15.8315V13.6159C19.5796 13.2665 19.863 12.9828 20.2127 12.9828C20.5624 12.9828 20.8458 13.2662 20.8458 13.6159V15.8315C20.8458 15.8437 20.843 15.8549 20.8424 15.8667H26.1295V12.4205C24.2718 11.9882 22.8734 10.3065 22.8734 8.33434C22.8734 6.36216 24.2718 4.68051 26.1295 4.24817V0.802246H20.8458V2.53845C20.8458 2.88788 20.5624 3.17153 20.2127 3.17153C19.8633 3.17153 19.5796 2.88819 19.5796 2.53845V0.802246H0.37037V4.24817C2.22783 4.68051 3.62615 6.36216 3.62615 8.33434C3.62615 10.3065 2.22783 11.9882 0.37037 12.4205V15.8664H19.5834C19.5827 15.8546 19.5796 15.8434 19.5796 15.8315ZM19.5796 4.75407C19.5796 4.40433 19.863 4.12099 20.2127 4.12099C20.5624 4.12099 20.8458 4.40433 20.8458 4.75407V6.96968C20.8458 7.31911 20.5624 7.60276 20.2127 7.60276C19.8633 7.60276 19.5796 7.31942 19.5796 6.96968V4.75407ZM19.5796 9.18498C19.5796 8.83556 19.863 8.55191 20.2127 8.55191C20.5624 8.55191 20.8458 8.83525 20.8458 9.18498V11.4006C20.8458 11.75 20.5624 12.0337 20.2127 12.0337C19.8633 12.0337 19.5796 11.7503 19.5796 11.4006V9.18498ZM16.5592 9.28255L14.558 9.21584L13.5179 13.3061H12.507V9.14758L10.4672 9.07963L9.57944 11.0898H8.56858L8.96569 8.33434L8.56889 5.57853H9.57976L10.4675 7.58873L12.5073 7.52078V3.36261H13.5182L14.558 7.45283L16.5592 7.38612C17.2976 7.3615 17.931 7.7876 17.931 8.33434C17.931 8.88076 17.2976 9.30686 16.5592 9.28255Z" fill="#ADAAAA"/>
                                       <rect x="8.24895" y="2.46118" width="9.95204" height="12.0254" fill="#ADAAAA"/>
                                       <path d="M16.8541 6.73716C16.7617 6.48187 16.0973 6.49826 15.8347 6.60277C14.8788 6.98767 13.9327 7.37022 12.9769 7.75511L9.51486 6.61657L9.17949 7.01624L10.7272 8.65789C9.82231 9.04078 8.1512 9.74224 7.84968 9.85613C7.58702 9.96065 9.59043 10.1249 10.0471 10.0147C10.0471 10.0147 13.4713 8.65366 14.989 8.04064C15.383 7.88387 15.7673 7.72944 16.1613 7.57267C16.4286 7.48758 16.9439 7.02394 16.8541 6.73716Z" fill="white"/>
                                       <path d="M7.23611 8.67756L6.97948 8.93484L7.74865 9.73624L8.7631 9.29607L7.23611 8.67756Z" fill="#ADAAAA"/>
                                    </svg>
                                    Airport Entry Ticketing
                                 </button>
                              </li>
                              @endif
                              

                              @php
                           $categoryc = App\Models\Category::where('title', 'Car Parking')->where('status','Active')->first();
                           @endphp
                           @if($categoryc)
                              <li class="nav-item col" role="presentation">
                                 <button class="nav-link {{ $activeCategory == 'Car Parking' ? 'active' : '' }}" id="Car-Parking-tab" data-bs-toggle="pill" data-bs-target="#Car-Parking-tab-pane" type="button" role="tab" aria-controls="Car-Parking-tab-pane" aria-selected="false">
                                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M19.1151 7.09758L18.8263 6.80884L18.1552 6.97632C15.6564 7.8336 13.0259 8.26895 10.339 8.26895C7.66106 8.26895 5.03679 7.8336 2.53825 6.97632L1.86808 6.80884L1.57884 7.09758C0.934264 7.74141 0.407471 9.01466 0.407471 9.92536V17.38H2.89234L3.55655 14.7239C8.11803 15.5004 12.7888 15.4607 17.1366 14.7222L17.8016 17.38H20.2865V9.92536C20.2865 9.01466 19.7592 7.74141 19.1151 7.09758ZM5.75417 12.1434C5.50121 12.4987 3.27228 12.4987 3.01932 12.1434C2.85035 11.9073 2.85035 10.6738 3.01932 10.4375C3.2857 10.0638 5.75417 10.8395 5.75417 11.291C5.75417 11.4332 5.83791 12.0253 5.75417 12.1434ZM17.6753 12.1444C17.4221 12.4994 15.193 12.4994 14.9405 12.1444C14.8563 12.0261 14.9405 11.4342 14.9405 11.2915C14.9405 10.8403 17.4085 10.0645 17.6753 10.4382C17.8436 10.6746 17.8436 11.908 17.6753 12.1444Z" fill="#ADAAAA"/>
                                       <path d="M17.2499 4.12802L16.6689 2.38637C16.3802 1.52189 15.3991 0.814941 14.4884 0.814941H6.20536C5.2944 0.814941 4.31313 1.52189 4.02538 2.38637L3.44491 4.12802H1.23561V5.37046L2.89228 5.78469C7.86028 7.50347 13.1941 7.37799 17.8015 5.78469L19.4582 5.37046V4.12802H17.2499Z" fill="#ADAAAA"/>
                                    </svg>
                                    Car Parking
                                 </button>
                              </li>
                              @endif

                              @php
                           $categoryp = App\Models\Category::where('title', 'Porter')->where('status','Active')->first();
                           @endphp
                           @if($categoryp)

                              <li class="nav-item col" role="presentation">
                                 <button class="nav-link {{ $activeCategory == 'Porter' ? 'active' : '' }}" id="porter-tab" data-bs-toggle="pill" data-bs-target="#porter-tab-pane" type="button" role="tab" aria-controls="porter-tab-pane" aria-selected="false">
                                    <svg width="18" height="30" viewBox="0 0 18 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M2.99674 25.8935C4.00745 25.8875 4.83165 26.702 4.83764 27.7127C4.84363 28.7234 4.02915 29.5476 3.01844 29.5536C2.00772 29.5596 1.18352 28.7451 1.17753 27.7344C1.17154 26.7236 1.98603 25.8994 2.99674 25.8935ZM17.0689 27.0301C17.4058 27.0281 17.6806 27.2996 17.6826 27.6365C17.6846 27.9734 17.4131 28.2482 17.0762 28.2502L5.16372 28.3208C5.21743 28.1266 5.24557 27.9218 5.24432 27.7103C5.24307 27.4989 5.21254 27.2946 5.15661 27.1011L17.0689 27.0301ZM3.00397 27.1135C2.66707 27.1155 2.39557 27.3902 2.39757 27.7271C2.39957 28.064 2.6743 28.3355 3.0112 28.3335C3.34811 28.3315 3.6196 28.0568 3.6176 27.7199C3.61561 27.383 3.34087 27.1115 3.00397 27.1135ZM15.5949 18.4983C16.0441 18.4956 16.4104 18.8576 16.4131 19.3068L16.4517 25.8137C16.4543 26.2629 16.0923 26.6292 15.6431 26.6319L4.99453 26.6953C4.74939 26.2225 4.34054 25.8486 3.8435 25.6482L3.80606 19.3816C3.8034 18.9324 4.16539 18.5661 4.6146 18.5634L15.5949 18.4983ZM1.21319 0.547107L2.98019 1.55336C3.10494 1.62441 3.19509 1.73282 3.24457 1.8565C3.27776 1.93072 3.29641 2.01325 3.29692 2.10013L3.43593 25.5277C3.29308 25.5 3.14541 25.4859 2.99433 25.4868C2.72052 25.4884 2.4585 25.5392 2.21656 25.6306L2.0788 2.44399L0.609436 1.60731C0.316671 1.44058 0.214492 1.06809 0.381214 0.775329C0.547937 0.482563 0.920425 0.380385 1.21319 0.547107ZM15.5443 9.95804C15.9935 9.95538 16.3598 10.3174 16.3625 10.7666L16.4011 17.2734C16.4037 17.7226 16.0417 18.089 15.5925 18.0916L4.61219 18.1567C4.16298 18.1594 3.79667 17.7974 3.79401 17.3482L3.75544 10.8413C3.75277 10.3921 4.11477 10.0258 4.56397 10.0231L15.5443 9.95804Z" fill="#ADAAAA"/>
                                    </svg>
                                    Porter
                                 </button>
                              </li>
                              @endif

                              @php
                           $categoryp = App\Models\Category::where('title', 'Cloak Room')->where('status','Active')->first();
                           @endphp
                           @if($categoryp)

                              <li class="nav-item col" role="presentation">
                                 <button class="nav-link {{ $activeCategory == 'Cloak Room' ? 'active' : '' }}" id="cloak-tab" data-bs-toggle="pill" data-bs-target="#cloak" type="button" role="tab" aria-controls="cloak" aria-selected="false">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M9.62003 9.21737H18.0225V1.25717C18.0225 1.19909 18.0111 1.14157 17.9889 1.0879C17.9667 1.03423 17.9341 0.985463 17.893 0.944391C17.8519 0.903319 17.8032 0.870745 17.7495 0.848533C17.6958 0.826321 17.6383 0.814907 17.5802 0.814941H9.62003V9.21737ZM14.9268 5.67951C14.9268 5.56222 14.9734 5.44974 15.0564 5.3668C15.1393 5.28387 15.2518 5.23727 15.3691 5.23727C15.4863 5.23727 15.5988 5.28387 15.6818 5.3668C15.7647 5.44974 15.8113 5.56222 15.8113 5.67951V6.56397C15.8113 6.68126 15.7647 6.79375 15.6818 6.87668C15.5988 6.95962 15.4863 7.00621 15.3691 7.00621C15.2518 7.00621 15.1393 6.95962 15.0564 6.87668C14.9734 6.79375 14.9268 6.68126 14.9268 6.56397V5.67951Z" fill="#ADAAAA"/>
                                       <path d="M8.73576 9.21713V0.814697H0.775562C0.717477 0.814662 0.659955 0.826077 0.606285 0.848289C0.552615 0.870501 0.50385 0.903075 0.462778 0.944147C0.421706 0.985219 0.389132 1.03398 0.36692 1.08765C0.344708 1.14132 0.333293 1.19885 0.333328 1.25693V9.21713H8.73576ZM6.52459 5.67926C6.52459 5.56198 6.57119 5.44949 6.65412 5.36656C6.73706 5.28362 6.84954 5.23703 6.96683 5.23703C7.08412 5.23703 7.1966 5.28362 7.27953 5.36656C7.36247 5.44949 7.40906 5.56198 7.40906 5.67926V6.56373C7.40906 6.68102 7.36247 6.7935 7.27953 6.87644C7.1966 6.95937 7.08412 7.00596 6.96683 7.00596C6.84954 7.00596 6.73706 6.95937 6.65412 6.87644C6.57119 6.7935 6.52459 6.68102 6.52459 6.56373V5.67926Z" fill="#ADAAAA"/>
                                       <path d="M10.3205 10.1016H9.62003V18.504H17.5802C17.6383 18.504 17.6958 18.4926 17.7495 18.4704C17.8032 18.4482 17.8519 18.4156 17.893 18.3745C17.9341 18.3335 17.9667 18.2847 17.9889 18.231C18.0111 18.1774 18.0225 18.1198 18.0225 18.0618V10.1016H10.3205ZM15.8113 14.9661C15.8113 15.0834 15.7647 15.1959 15.6818 15.2788C15.5988 15.3618 15.4863 15.4084 15.3691 15.4084C15.2518 15.4084 15.1393 15.3618 15.0564 15.2788C14.9734 15.1959 14.9268 15.0834 14.9268 14.9661V14.0817C14.9268 13.9644 14.9734 13.8519 15.0564 13.769C15.1393 13.686 15.2518 13.6394 15.3691 13.6394C15.4863 13.6394 15.5988 13.686 15.6818 13.769C15.7647 13.8519 15.8113 13.9644 15.8113 14.0817V14.9661Z" fill="#ADAAAA"/>
                                       <path d="M8.73584 10.1016H0.333405V18.0618C0.33337 18.1198 0.344785 18.1774 0.366997 18.231C0.389208 18.2847 0.421782 18.3335 0.462854 18.3745C0.503926 18.4156 0.552691 18.4482 0.606361 18.4704C0.660031 18.4926 0.717553 18.504 0.775638 18.504H8.73584V10.1016ZM7.40914 14.9661C7.40914 15.0834 7.36255 15.1959 7.27961 15.2788C7.19668 15.3618 7.08419 15.4084 6.9669 15.4084C6.84962 15.4084 6.73713 15.3618 6.6542 15.2788C6.57126 15.1959 6.52467 15.0834 6.52467 14.9661V14.0817C6.52467 13.9644 6.57126 13.8519 6.6542 13.769C6.73713 13.686 6.84962 13.6394 6.9669 13.6394C7.08419 13.6394 7.19668 13.686 7.27961 13.769C7.36255 13.8519 7.40914 13.9644 7.40914 14.0817V14.9661Z" fill="#ADAAAA"/>
                                    </svg>
                                    Cloakroom
                                 </button>
                              </li>
                              @endif
                             
                           </ul>
                           
                           <div class="tab-content filter_tab_content" id="filter_tab">

                           @php

                           $category = App\Models\Category::where('title', 'meet and greet')->where('status','Active')->first();
                           @endphp

                           @if($category)


                          
                           <div class="tab-pane fade show {{ $activeCategory == 'meet and greet' ? 'active' : '' }}" id="meet-and-greet-tab-pane" role="tabpanel" aria-labelledby="meet-and-greet-tab" tabindex="0">
                      

        @php
            $category = App\Models\Category::where('title', 'meet and greet')->where('status','Active')->first();
            if ($category) {
            $products = App\Models\Product::where('category_id', $category->id)->get();
            $allLocationIds = [];

            foreach ($products as $product) {
               
                $locationIds = explode(',', $product->location_id);

                
                $allLocationIds = array_merge($allLocationIds, $locationIds);
            }

           
            $uniqueLocationIds = array_unique($allLocationIds);

          
            $locations = App\Models\Location::whereIn('id', $uniqueLocationIds)->get();
        }
        @endphp
      
       
      
                              @include('web.home_meet_and_greet', ['category' => $category, 'locations' => $locations])
                           </div>
                           @endif

                           @php

$categoryl = App\Models\Category::where('title', 'Lounge Booking')->where('status','Active')->first();
@endphp

@if($categoryl)

                          
                           <div class="tab-pane fade show {{ $activeCategory == 'Lounge Booking' ? 'active' : '' }}" id="lounge-tab-pane" role="tabpanel" aria-labelledby="lounge-tab" tabindex="0">
                              @php
        $category = App\Models\Category::where('title', 'Lounge Booking')->first();

        if ($category) {
            $products = App\Models\Product::where('category_id', $category->id)->get();
            $allLocationIds = [];

            foreach ($products as $product) {
               
                $locationIds = explode(',', $product->location_id);

                
                $allLocationIds = array_merge($allLocationIds, $locationIds);
            }

           
            $uniqueLocationIds = array_unique($allLocationIds);

          
            $locations = App\Models\Location::whereIn('id', $uniqueLocationIds)->get();
        }
      
       
       @endphp
                              @include('web.home_lounge', ['category' => $category, 'locations' => $locations])
                              </div>
                              @endif


                              @php

$categoryb = App\Models\Category::where('title', 'Baggage wrapping')->where('status','Active')->first();
@endphp

@if($categoryb)

                              <div class="tab-pane fade show {{ $activeCategory == 'Baggage wrapping' ? 'active' : '' }}" id="Baggage-Wrapping-tab-pane" role="tabpanel" aria-labelledby="Baggage-Wrapping-tab" tabindex="0">
                              @php
        $category = App\Models\Category::where('title', 'Baggage wrapping')->first();

        if ($category) {
            $products = App\Models\Product::where('category_id', $category->id)->get();
            $allLocationIds = [];

            foreach ($products as $product) {
               
                $locationIds = explode(',', $product->location_id);

                
                $allLocationIds = array_merge($allLocationIds, $locationIds);
            }

           
            $uniqueLocationIds = array_unique($allLocationIds);

          
            $locations = App\Models\Location::whereIn('id', $uniqueLocationIds)->get();
        }
      
       
       @endphp
                              @include('web.home_baggage', ['category' => $category, 'locations' => $locations])
                              </div>

                              @endif

@php
                              
$categoryc = App\Models\Category::where('title', 'Car Parking')->where('status','Active')->first();
@endphp

@if($categoryc)

                              
                              
                              <div class="tab-pane fade show {{ $activeCategory == 'Car Parking' ? 'active' : '' }}" id="Car-Parking-tab-pane" role="tabpanel" aria-labelledby="Car-Parking-tab" tabindex="0">
                              @php
        $category = App\Models\Category::where('title', 'Car Parking')->first();
        if ($category) {
            $products = App\Models\Product::where('category_id', $category->id)->get();
            $allLocationIds = [];

            foreach ($products as $product) {
               
                $locationIds = explode(',', $product->location_id);

                
                $allLocationIds = array_merge($allLocationIds, $locationIds);
            }

           
            $uniqueLocationIds = array_unique($allLocationIds);

          
            $locations = App\Models\Location::whereIn('id', $uniqueLocationIds)->get();
        }
      
       
       @endphp
                              @include('web.home_carparking', ['category' => $category, 'locations' => $locations])
</div>      

@endif



@php
                              
$categorya = App\Models\Category::where('title', 'Airport Entry')->where('status','Active')->first();
@endphp

@if($categorya)
                              <div class="tab-pane fade show {{ $activeCategory == 'Airport Entry' ? 'active' : '' }}" id="airport-tab-pane" role="tabpanel" aria-labelledby="airport-tab" tabindex="0">
                              @php
        $category = App\Models\Category::where('title', 'Airport Entry')->first();
        if ($category) {
            $products = App\Models\Product::where('category_id', $category->id)->get();
            $allLocationIds = [];

            foreach ($products as $product) {
               
                $locationIds = explode(',', $product->location_id);

                
                $allLocationIds = array_merge($allLocationIds, $locationIds);
            }

           
            $uniqueLocationIds = array_unique($allLocationIds);

          
            $locations = App\Models\Location::whereIn('id', $uniqueLocationIds)->get();
        }
      
       
       @endphp
                              @include('web.home_airport_entry', ['category' => $category, 'locations' => $locations])
</div>

@endif

@php
                              
$categorycl = App\Models\Category::where('title', 'Cloak Room')->where('status','Active')->first();
@endphp

@if($categorycl)


                              <div class="tab-pane fade show {{ $activeCategory == 'Cloak Room' ? 'active' : '' }}" id="cloak" role="tabpanel" aria-labelledby="cloak-tab" tabindex="0">

                              @php
        $category = App\Models\Category::where('title', 'Cloak Room')->first();

        if ($category) {
            $products = App\Models\Product::where('category_id', $category->id)->get();
            $allLocationIds = [];

            foreach ($products as $product) {
                
                $locationIds = explode(',', $product->location_id);

                
                $allLocationIds = array_merge($allLocationIds, $locationIds);
            }

           
            $uniqueLocationIds = array_unique($allLocationIds);

          
            $locations = App\Models\Location::whereIn('id', $uniqueLocationIds)->get();
        }
      
       
       @endphp
       @include('web.home_cloakroom', ['category' => $category, 'locations' => $locations])
</div>

                           </div>
                             @endif

                             @php
                              
$categoryp = App\Models\Category::where('title', 'porter')->where('status','Active')->first();
@endphp

@if($categoryp)


                           <div class="tab-pane fade show {{ $activeCategory == 'porter' ? 'active' : '' }}" id="porter-tab-pane" role="tabpanel" aria-labelledby="porter-tab" tabindex="0">
                              @php
        $category = App\Models\Category::where('title', 'porter')->first();
        if ($category) {
            $products = App\Models\Product::where('category_id', $category->id)->get();
            $allLocationIds = [];

            foreach ($products as $product) {
               
                $locationIds = explode(',', $product->location_id);

                
                $allLocationIds = array_merge($allLocationIds, $locationIds);
            }

           
            $uniqueLocationIds = array_unique($allLocationIds);

          
            $locations = App\Models\Location::whereIn('id', $uniqueLocationIds)->get();
        }
      
       
       @endphp
       @include('web.home_porter', ['category' => $category, 'locations' => $locations])
                           </div>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <div class="col-lg-12 service-slider d-block d-sm-none mob_homeservice" data-aos="fade-up" data-aos-duration="600">
                   <div class="row justify-content-center">
                   @foreach ($categorys as $category)
                    <div class="servce_listing_grid">
                   

                        <div class="item"> 
                            <a href="{{ url('service/'.@$category->short_url) }}">
                            {!! Helper::printImage(@$category, 'image', 'image_webp', '', 'img-fluid') !!}
                                <h4>{{$category->title}}</h4>
                            </a>
                        </div>

                       

                    </div>
                    @endforeach
                   
                    
                    
                </div>
                <div class="col-12 text-center">
                  <a href="{{ url('services/') }}" class="btn-style-2"><div class="btn-in">View More</div></a>
                </div>
      </div>
      <section class="col-12 airport_list_section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 section-head text-center mb-4">
        <h2 data-aos="fade-up" data-aos-duration="600">Our Airports</h2>
        <p data-aos="fade-up" data-aos-duration="800">We take pride in offering top-notch airport services that cater to all scales of airports.</p>
      </div>
      <div class="col-lg-10 airport_lists">
        <div class="d-flex flex-wrap justify-content-center">

          @php
          $displayLocations = $locationsall->take(10);
          $totalLocations = $locationsall->count();
          @endphp

          @foreach ($displayLocations as $location)
          <div class="airport_list_grid text-center" data-aos="fade-up" data-aos-duration="1000">
            <a href="{{ url('location/' . @$location->title) }}">
              <div class="airtport_list_thumb">
                {!! Helper::printImage(@$location, 'desktop_banner', 'desktop_banner_webp', '', 'img-fluid') !!}
                <h3>{{ $location->code }}</h3>
              </div>
              <h4>{{ $location->code }}</h4>
              <p>{{ $location->title }} International Airport</p>
            </a>
          </div>
          @endforeach

          @if ($totalLocations > 10)
          <div class="col-12 text-center mt-3">
            <a href="{{ url('locations/') }}" class="btn-style-2">
              <div class="btn-in">View More</div>
            </a>
          </div>
          @endif

        </div>
      </div>
    </div>
  </div>
</section>


         <section class="col-12 service-section  d-none d-sm-block">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-7 section-head text-center mb-4">
                  <h2 data-aos="fade-up" data-aos-duration="600">Our Services</h2>
                  <p data-aos="fade-up" data-aos-duration="800">Our airport services include Meet-and-greet service, comfortable lounges, protective baggage wrapping, 
                    excellent luggage assistance, and even viewer gallery tickets for layovers.</p>
                </div>
                <div class="col-lg-10 service-slider" data-aos="fade-up" data-aos-duration="600">
                  <div class="owl-carousel owl-theme service-carousel">
                  @foreach ($categorys as $category)
                    <div class="item"> 
                      <a href="{{ url('service/'.@$category->short_url) }}">
                        <!-- <img src="{{ asset('frontend/img/meet_greet.svg')}}" alt="Service"/> -->

                        {!! Helper::printImage(@$category, 'image', 'image_webp', '', 'img-fluid') !!}


                        <h4>{{$category->title}}</h4>
                      </a>
                    </div>
                    @endforeach
                  
                  </div>
                </div>
              </div>
            </div>
         </section>
         <section class="col-12 primefly_section">
          <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-7 primefly_feature_content">
                  <h2 data-aos="fade-up" data-aos-duration="600">Primefly</h2>
                  <p data-aos="fade-up" data-aos-duration="800">Primefly is an exclusive airport hospitality service provided by Speedwings. They provide services such as meet 
                    and greet, parking, cloakroom, check-in assistance, and baby/elder sitting within the airport premises. 
                    They have been operating in most parts of India for the past 25 years and have earned the trust of millions of passengers.. </p>
                </div>
                <div class="company-counter" data-aos="fade-up" data-aos-duration="1000">
                  <div class="company-counter-item">
                      <div class="company-counter-item-wraper">
                          <div class="company-counter-item-icon"><img src="{{ asset('frontend/img/trust.webp')}}" alt=""></div>
                          <div class="company-counter-item-content">
                              <h4 class="count adon" data-count="25" data-adon="+">25+</h4>
                              <span>Years of Trust</span>
                          </div>
                      </div>
                  </div>
                  <div class="company-counter-item">
                      <div class="company-counter-item-wraper">
                          <div class="company-counter-item-icon"><img src="{{ asset('frontend/img/happy-customer.webp')}}" alt=""></div>
                          <div class="company-counter-item-content">
                              <h4 class="count adon" data-count="22" data-adon="+">22+</h4>
                              <span>Lakhs Customers</span>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
          </div>
          <div class="col-lg-12 places"> 
            <img src="{{ asset('frontend/img/places.webp')}}" class="w-100 place_vector" alt="Place" />
            <img src="{{ asset('frontend/img/cloud.webp')}}" class="cloud-left" alt="cloud"/>
            <img src="{{ asset('frontend/img/cloud2.webp')}}" class="cloud-right" alt="cloud"/>
          </div>
         </section>
         <section class="col-12 home-blog-section">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5 section-head text-center mb-4">
                <h2 data-aos="fade-up" data-aos-duration="600">Blogs</h2>
                <p data-aos="fade-up" data-aos-duration="800">News, updates, and the most awaited things happening in the 
                  industry are being discussed here. </p>
              </div>
              <div class="col-lg-11 home_blog_list">
                <div class="row">
                @foreach ($blogs as $blog)
                  <div class="col-lg-4 col-md-4 col-sm-4 gome-blog-grid" data-aos="fade-up" data-aos-duration="800">
                    <div class="home_bloglist_grid">
                      <div class="home_bloglist_wrap">
                        <!-- <img src="{{ asset('frontend/img/blog.png')}}" alt="Blog" /> -->

                        {!! Helper::printImage(@$blog, 'image', 'image_webp', '', 'img-fluid') !!}
                        <h4>{{$blog->title}}</h4>
                          <p> {!! strlen($blog->description) > 100  ? substr($blog->description, 0, 100) . '...' : $blog->description !!} </p>
                          <a href="{{ url('blog/'.@$blog->short_url) }}" class="btn-style-2"><div class="btn-in">Read Blog</div></a>
                      </div>
                    </div>
                  </div>
                  
                  @endforeach
                 
<!--                  
                  <div class="col-12 text-center mt-3">
                    <a href="{{ url('blogs') }}" class="btn-style-2"><div class="btn-in">View More</div></a>
                  </div> -->
              
                </div>
              </div>
            </div>
          </div>
         </section>
         <section class="col-12 home_testimonial">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-5 section-head text-center mb-4">
                  <h2 data-aos="fade-up" data-aos-duration="600">Testimonials</h2>
                  <p data-aos="fade-up" data-aos-duration="800">Listen to our customers as they share where we excelled 
                    in terms of quality.</p>
                </div>
                <div class="col-lg-10 testimonial_slider" data-aos="fade-up" data-aos-duration="1000">
                    <div class="owl-carousel owl-theme testimonial-carousel" >
                    @foreach ($testimonials as $testimonial)
                      <div class="item testimonial-wrap">
                          <div class="d-flex">
                           
                         
                              <div class="testimonial-grid">
                                <p><img src="{{ asset('frontend/img/quote1.png')}}" style="width:20px" alt="author"/>
                                {!! strip_tags($testimonial->message) !!}

                                  <img src="{{ asset('frontend/img/quote2.png')}}" style="width:20px" alt="author"/></p>
                                <div class="d-flex testimonial-author">
                                  <div class="testiminial-img">
                                  {!! Helper::printImage(@$testimonial, 'image', 'image_webp', '', 'img-fluid') !!}
                                  </div>
                                  <div class="testiminial-designation">
                                    <h4>{{ $testimonial->name}}</h4>
                                    <h5>{{ $testimonial->designation}}.</h5>
                                  </div>
                                </div>
                            </div>
                           


                          </div>
                      </div>
                      @endforeach

                     
                   
                  </div>
                </div>
              </div>
            </div>
         </section>
    @endsection


@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>




@endpush
