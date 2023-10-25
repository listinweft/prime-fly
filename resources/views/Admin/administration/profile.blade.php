
@extends('Admin.layouts.main')
@section('content')
<div class="content-wrapper">
<section class="myaccount_section">
    <!-- <section class="mb-3">
        <div class="container position-relative">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section> -->
    <div class="container position-relative">
        <div class="row">
            <div class="col-12 profile_detail_wrapper">
                <div class="left_profile_nav sticky-xl-top sticky-lg-top-110">
                    <div class="info_user_box">
                        <div class="profile_photo">
                            <img class="img-fluid" src="assets/images/profile.jpg" alt="">
                            <div class="upload_photo">
                              
                            </div>
                        </div>
                        <div class="profile_info">
                            <div class="name">
                          Name:  {{@$adminData->name}}
                            </div>
                            <div class="username">
                          Role:  {{@$adminData->role}}
                            </div>
                            
                        </div>
                    </div>
                   
                        
                </div>
               
            </div>
        </div>
    </div>
</section>
</div>

@endsection
@push('scripts')

    
@endpush