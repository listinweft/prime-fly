

@extends('web.layouts.main')
@section('content')
<main class="single-blog">
            <section class="single-blog-content">
                <div class="container">
                    <div class="blog-main">
                        <div class="blog-share-left position-sticky">
                            <p>966 <span>Shares</span> </p>
                            <ul>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url('blog/'.$blog->short_url) }}">
                                    <img src="{{ asset('frontend/images/icon/facebook.png')}}" alt=""></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ url('blog/'.$blog->short_url) }}&text={{ urlencode($blog->title) }}">
                                    <img src="{{ asset('frontend/images/icon/twitter.png')}}" alt=""></a></li>
                                <li><a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title) }} - {{ url('blog/'.$blog->short_url) }}">
                                    <img src="{{ asset('frontend/images/icon/whatsapp.png')}}" alt=""></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?url={{ url('blog/'.$blog->short_url) }}">
                                    <img src="{{ asset('frontend/images/icon/linkedIn.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="blog-content-area">
                            <h1 class="single-blog-title">{{ $blog->title }}</h1>
                            <p class="blog-overview"></p>
                            <div class="featured-image"> {!! Helper::printImage($blog, 'desktop_banner','desktop_banner_webp','image_attribute', 'img-fluid') !!}</div>
                            <div class="the-content">
                                <h2>{!! $blog->description !!}</h2>
                                
                                <div class="blog-share d-lg-none">
                                    <ul>
                                        <li><a href="#0" class="share-icon facebook">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="24" height="24" rx="12" fill="white"/>
                                                <path d="M14.9359 12.781L15.2778 10.6083H13.1714V9.1961C13.1714 8.60202 13.4655 8.02151 14.4058 8.02151H15.377V6.17137C14.8114 6.08118 14.24 6.03239 13.6672 6.02539C11.9335 6.02539 10.8017 7.06758 10.8017 8.95168V10.6083H8.87988V12.781H10.8017V18.0361H13.1714V12.781H14.9359Z" fill="#3B5998"/>
                                            </svg>                                            
                                        </a></li>
                                        <li><a href="#0" class="share-icon twitter">
                                            <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21.7195 2.1623C21.0138 2.46628 20.2719 2.67796 19.5121 2.7921C19.8673 2.73115 20.39 2.09119 20.5981 1.83216C20.9141 1.44144 21.155 0.995394 21.3085 0.516691C21.3085 0.481137 21.344 0.430347 21.3085 0.404952C21.2906 0.395172 21.2705 0.390047 21.2501 0.390047C21.2297 0.390047 21.2097 0.395172 21.1918 0.404952C20.3668 0.852121 19.4887 1.19341 18.5784 1.42076C18.5467 1.43046 18.5129 1.43133 18.4807 1.42328C18.4485 1.41522 18.4192 1.39855 18.3957 1.37505C18.3249 1.2906 18.2486 1.21086 18.1674 1.13633C17.7961 0.803376 17.3748 0.530865 16.919 0.328767C16.3038 0.076124 15.6392 -0.0332899 14.9755 0.00878773C14.3315 0.049495 13.7028 0.22238 13.1284 0.516691C12.5628 0.82698 12.0656 1.24852 11.6669 1.75597C11.2475 2.27828 10.9447 2.88442 10.7789 3.53363C10.6421 4.15117 10.6266 4.78942 10.7332 5.41287C10.7332 5.51953 10.7332 5.53477 10.6419 5.51953C7.02373 4.98624 4.05514 3.70124 1.62952 0.943329C1.52295 0.821432 1.46713 0.821432 1.38086 0.943329C0.325365 2.5483 0.837891 5.08782 2.15727 6.34234C2.33487 6.50994 2.51756 6.67247 2.71039 6.82484C2.10546 6.78186 1.51531 6.61778 0.974903 6.34234C0.873413 6.27631 0.817593 6.31186 0.812519 6.43376C0.798133 6.60275 0.798133 6.77267 0.812519 6.94166C0.918401 7.75156 1.2373 8.51878 1.73659 9.16487C2.23588 9.81096 2.89766 10.3127 3.65425 10.6189C3.83869 10.6979 4.03087 10.7575 4.22767 10.7966C3.66766 10.907 3.0933 10.9242 2.52771 10.8474C2.40592 10.822 2.36025 10.8881 2.40592 11.0049C3.15187 13.0365 4.77064 13.6561 5.95808 14.0015C6.12046 14.0269 6.28285 14.0269 6.46553 14.0675C6.46553 14.0675 6.46553 14.0675 6.43508 14.098C6.08494 14.738 4.66915 15.1697 4.01961 15.3932C2.83404 15.8194 1.57 15.9823 0.315216 15.8706C0.11731 15.8401 0.071639 15.8452 0.0208938 15.8706C-0.0298514 15.896 0.0208938 15.9519 0.0767135 16.0027C0.330439 16.1703 0.584165 16.3176 0.84804 16.4598C1.6336 16.8886 2.46409 17.2293 3.32441 17.4756C7.77983 18.7047 12.7935 17.8006 16.1376 14.4739C18.7662 11.8632 19.6897 8.26221 19.6897 4.6561C19.6897 4.51897 19.8572 4.4377 19.9536 4.36659C20.6186 3.84797 21.2049 3.23549 21.6942 2.5483C21.7789 2.44587 21.8223 2.31544 21.8159 2.18261C21.8159 2.10643 21.816 2.12166 21.7195 2.1623Z" fill="white"/>
                                            </svg>                                            
                                        </a></li>
                                        <li><a href="#0" class="share-icon whatsapp">
                                            <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.533203 12.4467C0.532617 14.5636 1.08574 16.6306 2.1375 18.4524L0.432617 24.6772L6.80293 23.0069C8.56487 23.9661 10.539 24.4687 12.5451 24.4688H12.5504C19.173 24.4688 24.5639 19.0799 24.5667 12.4562C24.568 9.24648 23.3191 6.22832 21.0502 3.95762C18.7816 1.68711 15.7646 0.436035 12.5499 0.43457C5.92656 0.43457 0.536035 5.82324 0.533301 12.4467" fill="url(#paint0_linear_7708_9899)"/>
                                                <path d="M0.104492 12.443C0.103809 14.636 0.676758 16.777 1.76602 18.6641L0 25.112L6.59873 23.3818C8.41689 24.3731 10.464 24.8958 12.547 24.8966H12.5523C19.4125 24.8966 24.9971 19.3138 25 12.4529C25.0012 9.12793 23.7074 6.00127 21.3574 3.64922C19.0071 1.29746 15.8821 0.00136719 12.5523 0C5.69101 0 0.107227 5.58203 0.104492 12.443ZM4.03418 18.3391L3.78779 17.948C2.75205 16.3011 2.20537 14.3979 2.20615 12.4438C2.2084 6.74111 6.84941 2.10156 12.5563 2.10156C15.3199 2.10273 17.9172 3.18008 19.8707 5.13477C21.8241 7.08965 22.899 9.68828 22.8983 12.4521C22.8958 18.1548 18.2547 22.7949 12.5523 22.7949H12.5482C10.6915 22.7939 8.87051 22.2953 7.28242 21.353L6.90449 21.1289L2.98867 22.1556L4.03418 18.339V18.3391Z" fill="url(#paint1_linear_7708_9899)"/>
                                                <path d="M9.44141 7.24093C9.2084 6.72306 8.96318 6.71261 8.7416 6.70353C8.56016 6.69571 8.35273 6.6963 8.14551 6.6963C7.93809 6.6963 7.60107 6.77433 7.31621 7.08536C7.03105 7.39669 6.22754 8.14903 6.22754 9.67921C6.22754 11.2095 7.34209 12.6883 7.49746 12.896C7.65303 13.1033 9.64912 16.344 12.8105 17.5906C15.4378 18.6267 15.9725 18.4206 16.5427 18.3687C17.113 18.3169 18.3829 17.6165 18.642 16.8902C18.9013 16.1641 18.9013 15.5416 18.8235 15.4115C18.7458 15.2819 18.5384 15.2041 18.2273 15.0486C17.9162 14.8931 16.3871 14.1406 16.1021 14.0368C15.8169 13.9331 15.6096 13.8814 15.4021 14.1928C15.1947 14.5037 14.5991 15.2041 14.4176 15.4115C14.2362 15.6194 14.0547 15.6453 13.7438 15.4898C13.4325 15.3337 12.4309 15.0057 11.2425 13.9462C10.3179 13.1218 9.69365 12.1037 9.51221 11.7923C9.33076 11.4814 9.49277 11.3128 9.64873 11.1578C9.78848 11.0185 9.95986 10.7946 10.1155 10.6131C10.2706 10.4315 10.3224 10.3019 10.4261 10.0944C10.5299 9.88683 10.4779 9.70519 10.4003 9.54962C10.3224 9.39405 9.71797 7.85587 9.44141 7.24093Z" fill="white"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_7708_9899" x1="1207.14" y1="2424.7" x2="1207.14" y2="0.43457" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#1FAF38"/>
                                                <stop offset="1" stop-color="#60D669"/>
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_7708_9899" x1="1250" y1="2511.2" x2="1250" y2="0" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#F9F9F9"/>
                                                <stop offset="1" stop-color="white"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>                                            
                                        </a></li>
                                        <li><a href="#0" class="share-icon linkedIn">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.97321 16.7447V5.44642H0.221158V16.7447H3.9736H3.97321ZM2.09797 3.9041C3.40611 3.9041 4.22052 3.03652 4.22052 1.95229C4.19603 0.843363 3.40611 0 2.12284 0C0.838696 0 0 0.843363 0 1.9522C0 3.03642 0.814112 3.904 2.07338 3.904H2.09767L2.09797 3.9041ZM6.05002 16.7447H9.80177V10.4359C9.80177 10.0987 9.82626 9.76058 9.92538 9.51972C10.1965 8.84478 10.8138 8.14611 11.8506 8.14611C13.2079 8.14611 13.7512 9.1821 13.7512 10.7011V16.7447H17.5028V10.2666C17.5028 6.79641 15.6521 5.18154 13.1836 5.18154C11.1598 5.18154 10.2709 6.31371 9.77709 7.08482H9.80206V5.44681H6.05021C6.09918 6.50673 6.04992 16.7451 6.04992 16.7451L6.05002 16.7447Z" fill="white"/>
                                            </svg>                                            
                                        </a></li>
                                    </ul>
                                </div>
                                
                            </div>
                            <div class="reaction-stati mb-0">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="reaction-stati-box">
                                            <div class="reaction-stati-image-wraper">
                                                <div class="reaction-stati-image"><img src="{{ asset('frontend/images/blog/avatar-1.png')}}" alt=""></div>
                                                <div class="reaction-stati-image"><img src="{{ asset('frontend/images/blog/avatar-2.png')}}" alt=""></div>
                                                <div class="reaction-stati-image"><img src="{{ asset('frontend/images/blog/avatar-3.png')}}" alt=""></div>
                                            </div>
                                            <div class="reaction-stati-count">{{$totalLikes}} Likes</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="like-share-wraper">
                                            <div class="like-share-item">
                                            <button class="like-button2 {{ $like && $like->likes == 1 ? 'liked' : '' }}" data-blog-id="{{ $blog->id }}">
                                    <!-- {{ $like && $like->likes == 1 ? 'Unlike' : 'Like' }} -->
                                    <svg class="unliked" xmlns="http://www.w3.org/2000/svg" width="34" height="30" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                                </svg> 
                                                 <svg class="liked" xmlns="http://www.w3.org/2000/svg" width="34" height="30" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                </svg>
                                </button>
                                                                                <!-- <div class="like-btn">
                                                    <svg width="34" height="30" viewBox="0 0 34 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.9998 29.0704C16.4568 29.0704 15.9141 28.864 15.5007 28.451L2.76233 15.73C-0.825751 12.1465 -0.932457 6.33453 2.52489 2.77436C4.26258 0.985442 6.59492 0 9.09263 0C11.5377 0 13.8347 0.949403 15.5604 2.67296L16.9991 4.10996L18.4344 2.67331C20.1607 0.949403 22.4578 0 24.9025 0C27.4023 0 29.7357 0.984736 31.473 2.77295C34.9321 6.33277 34.8268 12.1454 31.2377 15.7296L18.499 28.451C18.0856 28.8637 17.5429 29.0704 16.9998 29.0704ZM9.09263 1.44725C6.9896 1.44725 5.02578 2.27652 3.56298 3.78277C0.654003 6.77832 0.753643 11.6787 3.78488 14.706L16.5232 27.427C16.7864 27.6896 17.214 27.6888 17.4765 27.427L30.2152 14.7057C33.2471 11.6776 33.3457 6.7769 30.4349 3.78136C28.9725 2.27616 27.0076 1.44725 24.9025 1.44725C22.8439 1.44725 20.9102 2.24613 19.4576 3.69691L17.5118 5.64448C17.2292 5.92785 16.7712 5.92714 16.4886 5.64518L14.5378 3.69691C13.0853 2.24613 11.1515 1.44725 9.09263 1.44725Z" fill="black"/>
                                                    </svg>                                                    
                                                </div>
                                                Like -->
                                            </div>
                                            <div class="like-share-item">
                                                <div class="like-btn share-buttonss">
                                                    <svg width="39" height="34" viewBox="0 0 39 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M38.2234 12.5084L24.3737 0.190831C24.265 0.0941065 24.1307 0.0308773 23.9869 0.00876393C23.8431 -0.0133494 23.696 0.00659694 23.5633 0.066199C23.4306 0.125801 23.3179 0.222515 23.2389 0.344683C23.1599 0.466852 23.1179 0.609261 23.118 0.754746V5.40922C19.7072 5.28153 16.3126 5.93906 13.1962 7.33106C10.0797 8.72307 7.32465 10.8124 5.14352 13.4378C2.9624 16.0632 1.4135 19.1545 0.61632 22.4733C-0.180863 25.7921 -0.205025 29.2497 0.545696 32.5794C0.579994 32.7312 0.660433 32.8688 0.775984 32.9732C0.891535 33.0775 1.03654 33.1436 1.19112 33.1623C1.22131 33.1661 1.25171 33.168 1.28214 33.1681C1.42227 33.1679 1.55959 33.1288 1.67875 33.0551C1.79792 32.9814 1.89424 32.876 1.95693 32.7506C5.85635 24.9402 13.3552 20.7938 23.118 21.0317V25.3891C23.1179 25.5346 23.1599 25.677 23.2389 25.7992C23.3179 25.9214 23.4306 26.0181 23.5633 26.0777C23.696 26.1373 23.8431 26.1572 23.9869 26.1351C24.1307 26.113 24.265 26.0498 24.3737 25.953L38.2234 13.6359C38.303 13.5651 38.3667 13.4783 38.4103 13.3811C38.4539 13.284 38.4765 13.1787 38.4765 13.0721C38.4765 12.9656 38.4539 12.8603 38.4103 12.7632C38.3667 12.666 38.303 12.5792 38.2234 12.5084ZM24.6269 23.7086V20.3031C24.6269 20.1089 24.552 19.9222 24.4179 19.7818C24.2837 19.6414 24.1006 19.5581 23.9066 19.5493C18.8037 19.3168 14.2365 20.1976 10.3309 22.1666C6.7434 23.9669 3.73762 26.7442 1.65987 30.1785C1.30672 27.263 1.57562 24.3058 2.44886 21.5019C3.3221 18.698 4.77983 16.111 6.72593 13.9116C8.67202 11.7122 11.0623 9.95038 13.739 8.74227C16.4158 7.53415 19.3182 6.90721 22.255 6.90279C22.773 6.90279 23.2947 6.92224 23.8168 6.96071C23.9203 6.9684 24.0243 6.95464 24.1223 6.9203C24.2202 6.88596 24.31 6.83177 24.386 6.76113C24.4621 6.69049 24.5227 6.60491 24.5642 6.50976C24.6056 6.41461 24.627 6.31193 24.6269 6.20814V2.43449L36.5866 13.0719L24.6269 23.7086Z" fill="black"/>
                                                    </svg>                                                                                                        
                                                </div>
                                                Share
                                                <div class="share-links">
        <!-- WhatsApp Share Link -->
        <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title) }} - {{ url('blog/'.$blog->short_url) }}" target="_blank">
        <img src="{{ asset('frontend/images/icon/whatsapp.png')}}" alt="">   
        </a>

        <!-- Twitter Share Link -->
        <a href="https://twitter.com/share?url=<?php echo url('blog/' . $blog->short_url); ?>&text=Check out this blog" target="_blank">
        <img src="{{ asset('frontend/images/icon/twitter.png')}}" alt="">
        </a>

        <!-- LinkedIn Share Link -->
        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo url('blog/' . $blog->short_url); ?>" target="_blank">
        <img src="{{ asset('frontend/images/icon/linkedIn.png')}}" alt="">
        </a>

        <!-- Facebook Share Link -->
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo url('blog/' . $blog->short_url); ?>" target="_blank">
        <img src="{{ asset('frontend/images/icon/facebook.png')}}" alt="">
        </a>
                           </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-wraper">
                            @php
                                        $user = Auth::guard('customer')->user();
                                        $customer = $user->customer;
                                    @endphp
                                <div class="comment-form">
                                <div class="comment-form">
                                                                <form action="{{ route('comments.store') }}" method="post">
                                    @csrf
                                    <div class="form-grid">
                                        <input type="text" name="comment_content" placeholder="Write a Comment.....">
                                        <div class="comment-avatar">@if (!empty(Helper::printImage($user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid')))
                                    {!! Helper::printImage($user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid') !!}
                                @else
                                    <img src="{{ asset('frontend/images/default-user.png') }}" alt="" class="img-fluid">
                                @endif</div>
                                        <input type="hidden" name="journal_id" value="{{$blog->id}}">
                                    </div>
                                    <div class="comment-sending">
                                        <div class="comment-sending-field">
                                            <input type="submit" value="">
                                        </div>
                                        <div class="comment-send-icon">
                                        <svg width="36" height="27" viewBox="0 0 36 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.95784 11.4649C1.98149 11.6931 2.18159 11.8975 2.40641 11.9215L15.1245 13.2815C16.2544 13.4024 16.2556 13.5981 15.1245 13.7191L2.40641 15.0791C2.18232 15.103 1.98109 15.3113 1.95784 15.5357L0.916158 25.5887C0.892512 25.8169 1.04991 25.9347 1.25324 25.8572L33.3102 13.645C33.52 13.5651 33.5136 13.433 33.3102 13.3556L1.25324 1.14339C1.04343 1.06347 0.892909 1.18751 0.916158 1.41188L1.95784 11.4649ZM2.06993 12.7104C1.61893 12.6621 1.21487 12.2519 1.16893 11.8085L0.00466939 0.572505C-0.0419434 0.122654 0.265735 -0.110418 0.690407 0.0513618L35.2237 13.2069C35.6491 13.3689 35.6484 13.6319 35.2237 13.7937L0.690407 26.9492C0.265072 27.1113 -0.0412724 26.8715 0.00466939 26.4281L1.16893 15.1921C1.21554 14.7422 1.61642 14.3387 2.06993 14.2902L9.05034 13.5438C9.27503 13.5198 9.27041 13.4803 9.05034 13.4568L2.06993 12.7104Z" fill="#ABABAB"/>
                                                </svg>                                                  
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <!-- Comment listing -->
                                <div class="comment-listing-wraper">
                                    <h4>Comments</h4>
                                    <div class="comment-listing-item-wraper">
                                       
                                       
                                    @foreach($comments as $comment)
                        <div class="comment-item">
                           <div class="user-comment-avatar">
                           @if (!empty(Helper::printImage($comment->user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid')))
                                    {!! Helper::printImage($comment->user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid') !!}
                               @else
                                    <img src="{{ asset('frontend/images/user_img_de.png') }}" alt="" class="img-fluid">
                                @endif
                           </div>
                           <div class="user-comment-section">
                              <div class="user-comment">
                                 <h5>{{ @$comment->user->customer->first_name }}</h5>
                                 <p>{{ $comment->content }}</p>
                                 <div class="comment-actions">
                                    <div class="comment-share-like flex-wrap">
                                       <div class="comment-share-like-item" id="svg-container">
                                          
                                          
                                             <div class="like-btn" >
                                             <button class="like-button {{ $comment->likes === 0 ? '' : 'liked' }}" data-comment-id="{{ $comment->id }}">
                                                <svg class="unliked" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                                                                                <svg class="liked" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                                                                                </button>
                                             </div>
                                         
                                       </div>
                                       <div class="comment-share-like-item reply-btn" onclick="toggleReplyForm(this)">
                                          <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M5.23536 3.70609H10.6361L7.66016 0.730194C7.49483 0.564867 7.49483 0.289323 7.66016 0.123995C7.82549 -0.0413318 8.10103 -0.0413318 8.26636 0.123995L11.9036 3.8163C11.9587 3.87141 11.9587 3.87141 11.9587 3.92652C12.0138 4.03674 12.0138 4.14696 11.9587 4.25718C11.9587 4.31229 11.9036 4.31229 11.9036 4.36739L8.21125 8.0597C8.15614 8.11481 8.04592 8.16992 7.93571 8.16992C7.82549 8.16992 7.71527 8.11481 7.66016 8.0597C7.49483 7.89437 7.49483 7.61883 7.66016 7.4535L10.6361 4.47761H5.23536C2.81056 4.47761 0.826635 6.46154 0.826635 8.88634C0.826635 9.98852 1.26751 11.0907 1.98393 11.9173C2.81056 12.7991 4.02296 13.3502 5.23536 13.3502C5.4558 13.3502 5.67623 13.5155 5.67623 13.791C5.67623 14.0666 5.51091 14.2319 5.23536 14.2319C3.80253 14.2319 2.36969 13.6257 1.37773 12.5786C0.495981 11.5867 0 10.3192 0 8.99656C0 6.07578 2.31458 3.70609 5.23536 3.70609Z" fill="black"/>
                                          </svg>
                                       </div>
                                       <!-- Reply form -->
                                       <div class="col-12 reply-form-template" style="display: none;">
                                            <div class="comment-reply">
                                                <div class="comment-reply-author">
                                                <div class="comment-avatar">@if (!empty(Helper::printImage($user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid')))
                                                    {!! Helper::printImage($user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid') !!}
                                                @else
                                                    <img src="{{ asset('frontend/images/default-user.png') }}" alt="" class="img-fluid">
                                                @endif</div>
                                                    <div class="reply-comment-container">
                                                        <div class="comment-author">{{ @$user->customer->first_name}}</div>
                                                        <div class="reply">
                                                            <form action="{{ route('reply_comment', ['commentId' => $comment->id]) }}" method="post">
                                                                @csrf
                                                                <div class="form-grid mb-0">
                                                                <textarea name="reply_content" placeholder="Type your reply here...."></textarea>
                                                                </div>
                                                                <div class="post-comment">
                                                                <div class="post-comment-btn">
                                                                    <input type="submit" value="">
                                                                </div>
                                                                <div class="post-comment-btn-icon"><i class="bi bi-send"></i></div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 @if($comment->replies && $comment->replies->count() > 0)
                                 <div class="reply-messages">
                                    <!-- <h6>Replies:</h6> -->
                                    <div class="comment-reply">
                                       @foreach($comment->replies as $reply) 
                                       <div class="comment-reply-author">
                                          <div class="comment-avatar">@if (!empty(Helper::printImage($reply->user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid')))
                                    {!! Helper::printImage($reply->user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid') !!}
                                @else
                                    <img src="{{ asset('frontend/images/user_img_de.png') }}" alt="" class="img-fluid">
                                @endif
                            </div>
                                          <div class="reply-comment-container">
                                             <div class="comment-author">{{ @$reply->user->customer->first_name }}</div>
                                             <div class="reply">
                                                <p>{{ $reply->content }}</p>
                                             </div>
                                          </div>
                                       </div>
                                       @endforeach
                                    </div>
                                 </div>
                                 @endif
                              </div>
                           </div>
                        </div>
                        @endforeach 
                                <!-- // Comment listing -->

                                <!-- Journal author -->
                                <div class="journal-author">
                                    <div class="journal-author-item">
                                        <div class="journal-author-image"> {!! Helper::printImage($blog, 'author_image','author_image_webp','image_attribute', 'img-fluid') !!}</div>
                                        <div class="journal-author-content">
                                            <h5>{{$blog->author}}</h5>
                                            <p>{!! $blog->alternate_description !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- //Journal author -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        
    @endsection
    
    @push('scripts')
    <script>
   @stack('scripts')
   

   function toggleReplyForm(replyBtn) {
   const replyForm = replyBtn.nextElementSibling;
   if (replyForm) {
     replyForm.style.display = (replyForm.style.display === 'none' || replyForm.style.display === '') ? 'block' : 'none';
   }
   }
   
   function toggleLike() {
   const notFilledHeart = document.getElementById('not-filled-heart');
   const filledHeart = document.getElementById('filled-heart');
   
   if (notFilledHeart.style.display === 'none') {
     notFilledHeart.style.display = 'block';
     filledHeart.style.display = 'none';
   } else {
     notFilledHeart.style.display = 'none';
     filledHeart.style.display = 'block';
   }
   }
   
   
   
   
   
   
   
   
</script>
<script>
   function toggleSvg() {
     var svgContainer = document.getElementById('svg-container');
     svgContainer.style.display = (svgContainer.style.display === 'none' || svgContainer.style.display === '') ? 'block' : 'none';
   }
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    const commentLikeButtons = document.querySelectorAll('.like-button');

    commentLikeButtons.forEach(button => {
        let isLiked = button.classList.contains('liked');
        const commentId = button.getAttribute('data-comment-id');
        const url = `/like/comment/${commentId}`;

        button.addEventListener('click', function () {
            const url = isLiked ? `/unlike/comment/${commentId}` : `/like/comment/${commentId}`;

            axios.post(url)
                .then(response => {
                    if (response.data.success) {
                        if (isLiked) {
                            // If already liked, clicking unlikes the comment
                            button.classList.remove('liked');
                            toastr.success('Comment unliked!');
                        } else {
                            // If not liked, clicking likes the comment
                            button.classList.add('liked');
                            toastr.success('Comment liked!');
                        }

                        // Toggle the liked state
                        isLiked = !isLiked;
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>


<script>
const likeButton2 = document.querySelector('.like-button2');
    let isLiked = {{ $like && $like->likes == 1 ? 'true' : 'false' }};

    likeButton2.addEventListener('click', function () {
        const blogId = this.getAttribute('data-blog-id');
        const url = isLiked ? `/unlike/journal/${blogId}` : `/like/journal/${blogId}`;

        axios.get(url)
            .then(response => {
                if (response.data.success) {
                    if (isLiked) {
                        likeButton2.classList.remove('liked');
                        // likeButton2.innerText = 'Like';
                        toastr.success('Journal unliked!');
                        setTimeout(function(){
   window.location.reload(1);
}, 3000);
                    } else {
                        likeButton2.classList.add('liked');
                        // likeButton2.innerText = 'Unlike';
                        toastr.success('Journal liked!');
                        setTimeout(function(){
   window.location.reload(1);
}, 3000);
                    }

                    isLiked = !isLiked;
                }
            })
            .catch(error => console.error('Error:', error));
    });


</script>


<script>
$(document).ready(function() {
    $(".share-buttonss").click(function() {
    
        // Toggle the visibility of the share-links when the "Share" button is clicked
        $(".share-links").slideToggle();
    });
});
</script>




@endpush
<!--Blog Listing Page End -->





