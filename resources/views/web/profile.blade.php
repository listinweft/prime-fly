

@extends('web.layouts.main')
@section('content')
<main class="my-account">
            <div class="container">
                <div class="user-activity-container">
              
         <div class="user-profile sticky-lg-top">

         <form action="javascript:void(0);" method="POST" id="updateProfileForm">
    
                        <!-- <div class="user-profile-icon"><img src="{{ asset('frontend/images/default-user.png')}}" alt="" srcset=""></div> -->
                        <div class="user-profile-image">
                            <div class="circle">
                           
                                @if (!empty(Helper::printImage($user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid')))
                                    {!! Helper::printImage($user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid') !!}
                                @else
                                    <img src="{{ asset('frontend/images/user-profile.png') }}" alt="Default Profile Image" class="img-fluid">
                                @endif

                            </div>
                            <div class="p-image user-prof-btn" style="display: none;">
                                <i class="bi bi-camera-fill upload-button"></i>
                                <input class="file-upload" type="file" accept="image/*" name="profileImage"/>
                            </div>
                        </div>
                        <div class="user-profile-details">
                          
                        <h4 class="editable profilename" name="first_name"> {{@$customer->first_name}}</h4>

                            <h6 class="editable profile_designation"> {{@$customer->designation}} <span class="profile_edit_icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M6.81511 2.37012H2.29225C1.94952 2.37012 1.62083 2.50626 1.37849 2.74861C1.13615 2.99095 1 3.31964 1 3.66236V12.7081C1 13.0508 1.13615 13.3795 1.37849 13.6219C1.62083 13.8642 1.94952 14.0003 2.29225 14.0003H11.338C11.6807 14.0003 12.0094 13.8642 12.2517 13.6219C12.4941 13.3795 12.6302 13.0508 12.6302 12.7081V8.18523" stroke="#7A7777" stroke-width="1.04007" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11.6613 1.40145C11.9183 1.14441 12.2669 1 12.6304 1C12.994 1 13.3426 1.14441 13.5996 1.40145C13.8567 1.65849 14.0011 2.00712 14.0011 2.37064C14.0011 2.73415 13.8567 3.08278 13.5996 3.33982L7.46145 9.47799L4.87695 10.1241L5.52308 7.53962L11.6613 1.40145Z" stroke="#7A7777" stroke-width="1.04007" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg></span></h6>
                            <p class="editable profile_desc"> {{@$customer->description}}</p>
                        </div>
                        <div class="user-activity-count">
                            <ul>
                                <li>
                                    <p>Journals <span>{{$userJournalsCount}}</span></p>
                                </li>
                                <li>
                                    <p>Blogs <span>{{$userBlogsCount}}</span></p>
                                </li>
                            </ul>
                        </div>
                        <div class="user-credentials">
                            <ul>
                                <li>
                                    <a>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="17" viewBox="0 0 23 17" fill="none">
                                                <path d="M1.93707 0C0.868737 0 0 0.868748 0 1.93707V14.1129C0 15.1813 0.868737 16.05 1.93707 16.05H20.2009C21.2692 16.05 22.1379 15.1813 22.1379 14.1129V1.93707C22.1379 0.868748 21.2692 0 20.2009 0H1.93707ZM1.93707 0.553448H20.2009C20.5497 0.553448 20.8584 0.690814 21.1002 0.899353L12.0029 9.55561C11.4213 10.1087 10.6987 10.1091 10.1177 9.55561L1.02907 0.899353C1.27158 0.68813 1.58576 0.553448 1.93707 0.553448ZM0.69181 1.3404L9.73723 9.95344C10.5021 10.6821 11.6268 10.6812 12.3921 9.95344L21.4461 1.3404C21.5337 1.52273 21.5845 1.71909 21.5845 1.93707V14.1129C21.5845 14.8842 20.9722 15.4966 20.2009 15.4966H1.93707C1.16577 15.4966 0.553448 14.8842 0.553448 14.1129V1.93707C0.553448 1.71909 0.604224 1.52273 0.69181 1.3404Z" fill="#FF000A"/>
                                            </svg>
                                        </span> <b class="editable profile_email"> {{@$customer->user->email}}</b>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                <path d="M21.5426 17.6357L18.0748 14.1664C17.8045 13.8969 17.428 13.7489 17.0149 13.7489C16.5805 13.7489 16.1607 13.9174 15.8641 14.2148L13.9895 16.0908L13.4833 15.8102C12.3692 15.1912 10.8433 14.3452 9.23098 12.7314C7.61282 11.1147 6.76529 9.58444 6.14557 8.46587L5.86867 7.97434L7.74687 6.09685C8.36806 5.4742 8.38857 4.48383 7.79302 3.88536L4.32449 0.419023C4.05419 0.14872 3.67767 0 3.26598 0C2.83013 0 2.41112 0.169948 2.11445 0.467355L1.26324 1.32443L1.1834 1.45554C0.866942 1.86356 0.607631 2.31993 0.412777 2.81658C0.232575 3.29053 0.120497 3.74325 0.0684869 4.19522C-0.378357 7.91208 1.33504 11.3235 5.98441 15.9729C11.496 21.4822 16.1007 21.91 17.3811 21.91C17.6002 21.91 17.7327 21.8983 17.7701 21.8946C18.2433 21.8368 18.696 21.7239 19.1531 21.5459C19.6461 21.3525 20.1017 21.0969 20.5061 20.7783L20.701 20.6259L21.4972 19.845C22.1184 19.2223 22.1374 18.232 21.5426 17.6357ZM21.0672 19.4143L20.4526 20.0215C20.1625 20.2999 19.663 20.6918 18.9334 20.9782C18.5209 21.1372 18.118 21.2383 17.7012 21.2881C17.6778 21.2903 17.584 21.2969 17.4309 21.2969C16.1974 21.2969 11.7575 20.883 6.41514 15.5414C1.15556 10.2825 0.314615 7.23009 0.672823 4.26407C0.718972 3.85972 0.819328 3.4561 0.97902 3.03343C1.26764 2.29577 1.66101 1.7969 1.93864 1.50901L2.54298 0.896617C2.72977 0.709822 2.99348 0.602872 3.26672 0.602872C3.51358 0.602872 3.73773 0.690054 3.8945 0.847548L7.36302 4.31462C7.72123 4.67356 7.69999 5.28009 7.31615 5.66614L5.15005 7.83076L5.1061 7.87618L5.22624 8.0791C5.34711 8.28201 5.47457 8.51348 5.61301 8.76328C6.25105 9.91262 7.12422 11.4861 8.80025 13.1621C10.4792 14.8411 12.0468 15.7099 13.1932 16.3442C13.4533 16.4885 13.6796 16.6138 13.8818 16.7347L14.0855 16.8548L16.294 14.6462C16.4794 14.4609 16.7416 14.3547 17.0149 14.3547C17.2639 14.3547 17.4881 14.4418 17.6456 14.6001L21.1119 18.065C21.4701 18.4246 21.4489 19.0304 21.0672 19.4143Z" fill="#FF000A"/>
                                            </svg>
                                        </span> <b class="editable profile_tel"> {{@$customer->user->phone}} </b>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="user-prof-btn">
                            <div class="d-flex flex-wrap justify-content-start">
                            <!-- <button type="button" class="common-btn cancel-btn">Cancel</button> -->
            <button type="submit" class="common-btn mt-3">Save</button>
                                
                            </div>
                        </div>

                            </form>
                    </div>
                    <div class="user-activity">
                        <div class="nav-pills-container">
                            <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                <div class="slider"></div>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="pills-Blogs-tab" data-bs-toggle="pill" data-bs-target="#pills-Blogs" type="button" role="tab" aria-controls="pills-Blogs" aria-selected="true">Blogs</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-Journals-tab" data-bs-toggle="pill" data-bs-target="#pills-Journals" type="button" role="tab" aria-controls="pills-Journals" aria-selected="false">Journals</button>
                                </li>
                            </ul>
                        </div>
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-Blogs" role="tabpanel" aria-labelledby="pills-Blogs-tab" tabindex="0">
                                <div class="user-activity-item-wraper">
                                    <div class="row">
                                        
                                        
                                    @foreach( $blogs as $blog )
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="user-activity-item">
                                                <div class="user-activity-item-image"> {!! Helper::printImage($blog, 'image', 'image_webp', '', 'img-fluid') !!}</div>
                                                <div class="user-activity-item-content">
                                                    <div class="active-user">
                                                        <div class="active-user-image">  {!! Helper::printImage($user, 'profile_image','profile_image_webp','image_attribute', 'img-fluid') !!}</div>
                                                        <div class="active-user-name">{{@$customer->first_name}}</div>
                                                    </div>
                                                    <div class="active-user-achievement">
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.899 15.8875C8.61471 15.8875 8.33062 15.7795 8.11421 15.5633L1.44601 8.90418C-0.43226 7.02831 -0.488118 3.98589 1.32172 2.12223C2.23136 1.18578 3.45228 0.669922 4.75977 0.669922C6.03969 0.669922 7.24212 1.16691 8.14547 2.06915L8.89863 2.82138L9.64994 2.06933C10.5537 1.16691 11.7561 0.669922 13.0358 0.669922C14.3444 0.669922 15.5659 1.18541 16.4754 2.12149C18.2861 3.98497 18.231 7.02776 16.3522 8.904L9.68379 15.5633C9.46738 15.7793 9.18328 15.8875 8.899 15.8875ZM4.75977 1.42752C3.65888 1.42752 2.63087 1.86162 1.86513 2.65011C0.342354 4.2182 0.394513 6.78342 1.98129 8.36816L8.64949 15.0273C8.78728 15.1647 9.01108 15.1644 9.14851 15.0273L15.8169 8.36798C17.404 6.78287 17.4556 4.21746 15.9319 2.64937C15.1664 1.86144 14.1378 1.42752 13.0358 1.42752C11.9582 1.42752 10.946 1.84572 10.1856 2.60516L9.16701 3.62467C9.01904 3.773 8.77933 3.77263 8.63136 3.62504L7.61019 2.60516C6.84982 1.84572 5.83753 1.42752 4.75977 1.42752Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">{{ $blog->likes }}</div>
                                                        </div>
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.4071 7.77417C15.1881 3.97157 12.142 0.925517 8.33943 0.686611C6.18928 0.547249 4.15857 1.28388 2.60568 2.77704C1.11252 4.23039 0.256434 6.281 0.296252 8.39134C0.375887 12.3731 3.68076 15.678 7.64262 15.7974C9.01633 15.8373 10.3701 15.4988 11.5647 14.8219L14.9094 15.7775C14.9492 15.7974 14.989 15.7974 15.0288 15.7974C15.1284 15.7974 15.2478 15.7576 15.3075 15.678C15.4071 15.5784 15.4469 15.4192 15.4071 15.2798L14.3718 12.0745C15.1483 10.7804 15.5066 9.28724 15.4071 7.77417ZM13.6551 11.7161C13.5556 11.8754 13.5356 12.0546 13.5954 12.2338L14.4315 14.802L11.7837 14.0455C11.5846 13.9857 11.3855 14.0056 11.2063 14.1251C10.1312 14.7224 8.91679 15.0409 7.68244 15.0011C4.13866 14.9015 1.17224 11.9351 1.11252 8.37143C1.0727 6.48009 1.82923 4.64847 3.20295 3.33449C4.4572 2.12005 6.10964 1.46306 7.86162 1.46306C8.00098 1.46306 8.16025 1.46306 8.29961 1.48297C11.704 1.70196 14.4116 4.42948 14.6107 7.83389C14.6904 9.2076 14.3718 10.5415 13.6551 11.7161Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count"> {{ $blog->comments->count() }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach



                                        <form id="uploadForms" enctype="multipart/form-data">

<input type="hidden" name="type" value="blog">

@php   $user = Auth::guard('customer')->user();


@endphp

<input type="hidden" name="user_id" value="{{$user->id}}">


<div class="empty-post">
    <div class="empty-post-icon-relation">
        <div class="empty-post-field">
            <input type="file" name="files" id="files" accept=".pdf,.doc,.docx">
        </div>
        <div class="empty-post-icon">
            <svg width="136" height="97" viewBox="0 0 136 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M110.464 96.8883H25.5359C11.433 96.8883 0 85.4553 0 71.3523C0 57.2494 11.433 45.8164 25.5359 45.8164H110.464C124.567 45.8164 136 57.2494 136 71.3523C136 85.4553 124.567 96.8883 110.464 96.8883Z" fill="#D2D0D0"/>
                <path d="M68.0034 90.6268C87.8368 90.6268 103.915 74.5487 103.915 54.7153C103.915 34.8819 87.8368 18.8037 68.0034 18.8037C48.1699 18.8037 32.0918 34.8819 32.0918 54.7153C32.0918 74.5487 48.1699 90.6268 68.0034 90.6268Z" fill="#599AF2"/>
                <path d="M110.464 94.36H25.5359C11.433 94.36 0 82.9269 0 68.824C0 54.7211 11.433 43.2881 25.5359 43.2881H110.464C124.567 43.2881 136 54.7211 136 68.824C136 82.9269 124.567 94.36 110.464 94.36Z" fill="#DDDDDD"/>
                <path d="M82.216 80.1731C100.431 72.325 108.835 51.1967 100.987 32.9817C93.1389 14.7667 72.0106 6.36262 53.7956 14.2107C35.5806 22.0588 27.1766 43.1871 35.0247 61.4021C42.8727 79.6171 64.001 88.0211 82.216 80.1731Z" fill="#DDDDDD"/>
                <path d="M59.6048 52.5415C59.1753 52.5415 58.7523 52.3762 58.4285 52.0458C57.7875 51.3982 57.8007 50.3474 58.4483 49.7063L68.0838 40.2295L77.5672 49.7129C78.2149 50.3606 78.2149 51.4048 77.5672 52.0524C76.9196 52.7001 75.8754 52.7001 75.2278 52.0524L68.0573 44.882L60.7548 52.059C60.4441 52.3829 60.0212 52.5415 59.6048 52.5415Z" fill="#EE2C0D"/>
                <path d="M68.0057 65.6795C67.0937 65.6795 66.3535 64.9393 66.3535 64.0273V42.5623C66.3535 41.6503 67.0937 40.9102 68.0057 40.9102C68.9177 40.9102 69.6579 41.6503 69.6579 42.5623V64.0273C69.6579 64.9393 68.9177 65.6795 68.0057 65.6795Z" fill="#EE2C0D"/>
                <path d="M83.6206 75.8769H52.1435C49.8899 75.8769 48.0527 74.0397 48.0527 71.7861V60.3465C48.0527 59.4345 48.7929 58.6943 49.7049 58.6943C50.6169 58.6943 51.3571 59.4345 51.3571 60.3465V71.7861C51.3571 72.2223 51.7139 72.5726 52.1435 72.5726H83.6206C84.189 72.5726 84.6582 72.11 84.6582 71.535V60.3465C84.6582 59.4345 85.3984 58.6943 86.3104 58.6943C87.2224 58.6943 87.9625 59.4345 87.9625 60.3465V71.535C87.9559 73.9273 86.013 75.8769 83.6206 75.8769Z" fill="#EE2C0D"/>
            </svg>
        </div>
    </div>
    
    @if(empty($blogs))
    <p>No post yet, upload your first post and become a part of the community</p>   
@endif

    <h4 class="file-names">Upload Your  Post</h4> 
    <button type="submit" class="common-btn">Post</button>                     
</div>
 </form>

 <div id="formContainers">


  </div>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="tab-pane fade" id="pills-Journals" role="tabpanel" aria-labelledby="pills-Journals-tab" tabindex="0">
                            <div class="user-activity-item-wraper">
                                    <div class="row">
                                        
                                        
                                    @foreach( $journals as $journal )
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="user-activity-item">
                                                <div class="user-activity-item-image"> {!! Helper::printImage($journal, 'image', 'image_webp', '', 'img-fluid') !!}</div>
                                                <div class="user-activity-item-content">
                                                    <div class="active-user">
                                                        <div class="active-user-image">  {!! Helper::printImage($user, 'profile_image','profile_image_webp','image_attribute', 'img-fluid') !!}</div>
                                                        <div class="active-user-name">{{@$customer->first_name}}</div>
                                                    </div>
                                                    <div class="active-user-achievement">
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.899 15.8875C8.61471 15.8875 8.33062 15.7795 8.11421 15.5633L1.44601 8.90418C-0.43226 7.02831 -0.488118 3.98589 1.32172 2.12223C2.23136 1.18578 3.45228 0.669922 4.75977 0.669922C6.03969 0.669922 7.24212 1.16691 8.14547 2.06915L8.89863 2.82138L9.64994 2.06933C10.5537 1.16691 11.7561 0.669922 13.0358 0.669922C14.3444 0.669922 15.5659 1.18541 16.4754 2.12149C18.2861 3.98497 18.231 7.02776 16.3522 8.904L9.68379 15.5633C9.46738 15.7793 9.18328 15.8875 8.899 15.8875ZM4.75977 1.42752C3.65888 1.42752 2.63087 1.86162 1.86513 2.65011C0.342354 4.2182 0.394513 6.78342 1.98129 8.36816L8.64949 15.0273C8.78728 15.1647 9.01108 15.1644 9.14851 15.0273L15.8169 8.36798C17.404 6.78287 17.4556 4.21746 15.9319 2.64937C15.1664 1.86144 14.1378 1.42752 13.0358 1.42752C11.9582 1.42752 10.946 1.84572 10.1856 2.60516L9.16701 3.62467C9.01904 3.773 8.77933 3.77263 8.63136 3.62504L7.61019 2.60516C6.84982 1.84572 5.83753 1.42752 4.75977 1.42752Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">{{ $journal->likes }}</div>
                                                        </div>
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.4071 7.77417C15.1881 3.97157 12.142 0.925517 8.33943 0.686611C6.18928 0.547249 4.15857 1.28388 2.60568 2.77704C1.11252 4.23039 0.256434 6.281 0.296252 8.39134C0.375887 12.3731 3.68076 15.678 7.64262 15.7974C9.01633 15.8373 10.3701 15.4988 11.5647 14.8219L14.9094 15.7775C14.9492 15.7974 14.989 15.7974 15.0288 15.7974C15.1284 15.7974 15.2478 15.7576 15.3075 15.678C15.4071 15.5784 15.4469 15.4192 15.4071 15.2798L14.3718 12.0745C15.1483 10.7804 15.5066 9.28724 15.4071 7.77417ZM13.6551 11.7161C13.5556 11.8754 13.5356 12.0546 13.5954 12.2338L14.4315 14.802L11.7837 14.0455C11.5846 13.9857 11.3855 14.0056 11.2063 14.1251C10.1312 14.7224 8.91679 15.0409 7.68244 15.0011C4.13866 14.9015 1.17224 11.9351 1.11252 8.37143C1.0727 6.48009 1.82923 4.64847 3.20295 3.33449C4.4572 2.12005 6.10964 1.46306 7.86162 1.46306C8.00098 1.46306 8.16025 1.46306 8.29961 1.48297C11.704 1.70196 14.4116 4.42948 14.6107 7.83389C14.6904 9.2076 14.3718 10.5415 13.6551 11.7161Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">{{ $journal->comments->count() }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                        <!-- <div class="col-12">
                                            <div class="post-upload-btn-wraper">
                                                <div class="post-upload-field">
                                                    <input type="file" name="file" id="file">
                                                </div>
                                                <div class="post-upload-btn">
                                                    <button type="submit" class="common-btn">Post</button>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>    
                            <!-- if posts  empty -->

                                <form id="uploadForm" enctype="multipart/form-data">

                                <input type="hidden" name="type" value="journal">

                                @php   $user = Auth::guard('customer')->user();
                                
                                
                                @endphp
                                
                                <input type="hidden" name="user_id" value="{{$user->id}}">


                                <div class="empty-post">
                                    <div class="empty-post-icon-relation">
                                        <div class="empty-post-field">
                                            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx">
                                        </div>
                                        <div class="empty-post-icon">
                                            <svg width="136" height="97" viewBox="0 0 136 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M110.464 96.8883H25.5359C11.433 96.8883 0 85.4553 0 71.3523C0 57.2494 11.433 45.8164 25.5359 45.8164H110.464C124.567 45.8164 136 57.2494 136 71.3523C136 85.4553 124.567 96.8883 110.464 96.8883Z" fill="#D2D0D0"/>
                                                <path d="M68.0034 90.6268C87.8368 90.6268 103.915 74.5487 103.915 54.7153C103.915 34.8819 87.8368 18.8037 68.0034 18.8037C48.1699 18.8037 32.0918 34.8819 32.0918 54.7153C32.0918 74.5487 48.1699 90.6268 68.0034 90.6268Z" fill="#599AF2"/>
                                                <path d="M110.464 94.36H25.5359C11.433 94.36 0 82.9269 0 68.824C0 54.7211 11.433 43.2881 25.5359 43.2881H110.464C124.567 43.2881 136 54.7211 136 68.824C136 82.9269 124.567 94.36 110.464 94.36Z" fill="#DDDDDD"/>
                                                <path d="M82.216 80.1731C100.431 72.325 108.835 51.1967 100.987 32.9817C93.1389 14.7667 72.0106 6.36262 53.7956 14.2107C35.5806 22.0588 27.1766 43.1871 35.0247 61.4021C42.8727 79.6171 64.001 88.0211 82.216 80.1731Z" fill="#DDDDDD"/>
                                                <path d="M59.6048 52.5415C59.1753 52.5415 58.7523 52.3762 58.4285 52.0458C57.7875 51.3982 57.8007 50.3474 58.4483 49.7063L68.0838 40.2295L77.5672 49.7129C78.2149 50.3606 78.2149 51.4048 77.5672 52.0524C76.9196 52.7001 75.8754 52.7001 75.2278 52.0524L68.0573 44.882L60.7548 52.059C60.4441 52.3829 60.0212 52.5415 59.6048 52.5415Z" fill="#EE2C0D"/>
                                                <path d="M68.0057 65.6795C67.0937 65.6795 66.3535 64.9393 66.3535 64.0273V42.5623C66.3535 41.6503 67.0937 40.9102 68.0057 40.9102C68.9177 40.9102 69.6579 41.6503 69.6579 42.5623V64.0273C69.6579 64.9393 68.9177 65.6795 68.0057 65.6795Z" fill="#EE2C0D"/>
                                                <path d="M83.6206 75.8769H52.1435C49.8899 75.8769 48.0527 74.0397 48.0527 71.7861V60.3465C48.0527 59.4345 48.7929 58.6943 49.7049 58.6943C50.6169 58.6943 51.3571 59.4345 51.3571 60.3465V71.7861C51.3571 72.2223 51.7139 72.5726 52.1435 72.5726H83.6206C84.189 72.5726 84.6582 72.11 84.6582 71.535V60.3465C84.6582 59.4345 85.3984 58.6943 86.3104 58.6943C87.2224 58.6943 87.9625 59.4345 87.9625 60.3465V71.535C87.9559 73.9273 86.013 75.8769 83.6206 75.8769Z" fill="#EE2C0D"/>
                                            </svg>
                                        </div>
                                    </div>
                                    
                                    
                                                            @if(empty($journals))
                            <p>No post yet, upload your first post and become a part of the community</p>   
                        @endif
                                    <h4 class="file-name">Upload Your  Post</h4> 
                                    <button type="submit" class="common-btn">Post</button>                     
                                </div>
                                 </form>

                                 <div id="formContainer">


                                  </div>




                                <!-- // if posts  empty -->
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </main>
        @push('scripts')
        <script>
        AOS.init();


        $(".nav-pills button").click(function() {
  var position = $(this).parent().position();
  var width = $(this).parent().width();
    $(".slider").css({"left":+ position.left,"width":width});
});
var actWidth = $(".nav-pills").find(".active").parent("li").width();
var actPosition = $(".nav-pills .active").position();
$(".slider").css({"left":+ actPosition.left,"width": actWidth});

    </script> 
    <script>
        $(document).ready(function() {

            var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function() {
        readURL(this);
    });
    $(".upload-button").on('click', function() {
   $(".file-upload").click();
});

    $('#updateProfileForm').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Append the profile image file to the FormData
        var profileImage = $(".file-upload")[0].files[0];
        formData.append('profileImage', profileImage);

        $.ajax({
            url: '/customer/update-profile',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                
                $('.profile-pic').attr('src', response.image_url);
                 window.location.reload();
                console.log('Form submitted successfully. Response:', response);
            },
            error: function(error) {
                console.error('Error submitting the form:', error);
            }
        });
    });
            $('.profile_edit_icon').on('click', function() {
                $('.user-prof-btn').show();
                var that=$('.editable');
                var pname = $('.profilename');
                var pdesignation = $('.profile_designation');
                var pdetails = $('.profile_desc');
                var pemail = $('.profile_email');
                var ptel = $('.profile_tel');
                if (that.find('input').length > 0) {
                    return;
                }
                var nameText = pname.text();  
                var desigText = pdesignation.text(); 
                var descText = pdetails.text(); 
                var mailText = pemail.text(); 
                var telText = ptel.text();
                var $profinput = $('<input>').val(nameText)
                .attr('name', 'first_name')
                .css({
                    width: pname.width(),
                    height: pname.height(),
                });
                var $desiginput = $('<input>').val(desigText)
                .attr('name', 'designation')
                .css({
                    width: pdesignation.width(),
                    height: pdesignation.height(),
                });
                var $descinput = $('<textarea>').val(descText)
                .attr('name', 'description')
                .css({
                    width: pdetails.width(),
                    height: pdetails.height(),
                });
                var $mailinput = $('<input>').val(mailText)
                .attr('name', 'email')
                .css({
                    width: pemail.width(),
                    height: pemail.height(),
                });
                var $telinput = $('<input>').val(telText)
                .attr('name', 'phone_number')
                .css({
                    width: ptel.width(),
                    height: ptel.height(),
                });
                $(pname).append($profinput);
                $(pdesignation).append($desiginput);
                $(pdetails).append($descinput);
                $(pemail).append($mailinput);
                $(ptel).append($telinput);
                 
            });
            // Handle outside click
            $('user-prof-btn a').click(function(event) {

                if(!$(event.target).closest('.editable').length) {
                    if ($input.val()) {
                        that.text($input.val());
                    }
                    that.find('input').remove();
                }
                $('.user-prof-btn').hide();
            });
        });


    </script>


<script>
  $(document).ready(function() {
    $('#uploadForm').submit(function(event) {
      event.preventDefault();

      var formData = new FormData(this);
      formData.append('type', 'journal');

      $.ajax({
        url: '/customer/upload',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          console.log('File uploaded successfully:', response);

          // Display success message under the form
          $('#formContainer').append('<p style="color: green;">File uploaded successfully</p>');
          window.location.reload();
        },
        error: function(xhr, status, error) {
          console.error('Error uploading file:', error);

          // Display error message under the form
          $('#formContainer').append('<p style="color: red;">Error uploading file: ' + xhr.responseText + '</p>');
        }
      });
    });
  });

  $('#file').change(function() {
  var file = $('#file')[0].files[0].name;
  $('.file-name').text(file);
});


// $(document).ready(function() {

    
// var readURL = function(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             $('.profile-pic').attr('src', e.target.result);
//         }

//         reader.readAsDataURL(input.files[0]);
//     }
// }


// $(".file-upload").on('change', function(){
//     readURL(this);
// });

// $(".upload-button").on('click', function() {
//    $(".file-upload").click();
// });
// });
</script>
<script>
  $(document).ready(function() {
    $('#uploadForms').submit(function(event) {
      event.preventDefault();

      var formData = new FormData(this);
      formData.append('type', 'blog');

      $.ajax({
        url: '/customer/uploads',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          console.log('File uploaded successfully:', response);

          // Display success message under the form
          $('#formContainers').append('<p style="color: green;">File uploaded successfully</p>');
          window.location.reload();
        },
        error: function(xhr, status, error) {
          console.error('Error uploading file:', error);

          // Display error message under the form
          $('#formContainers').append('<p style="color: red;">Error uploading file: ' + xhr.responseText + '</p>');
        }
      });
    });
  });

  $('#files').change(function() {
  var file = $('#files')[0].files[0].name;
  $('.file-names').text(file);
});
</script>



  @endpush
@endsection
