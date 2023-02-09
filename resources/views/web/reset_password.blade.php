
@extends('web.layouts.main')

@section('content')

<div class="d-none d-md-block">
    <section class="inner_banner ">
        <picture>
            <img class="img-fluid" src="assets/images/inner_banner.jpg" alt="">
        </picture>
    </section>
</div>

<div class="d-block d-md-none">
    <section class="inner_banner ">
        <picture>
            <img class="img-fluid" src="assets/images/mobile_inner_banner.jpg" alt="">
        </picture>
    </section>
</div>

<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Choose a new password
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="reset_password_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="reset_password_wrapper">
                    <h5>Choose a new password</h5>

                    @if(@$status == 'invalid')
                        <div class="alert alert-danger">
                            <li>{{ $message }}</li>
                        </div>
                    @elseif(@$link_expired=='true')
                        <div class="alert alert-danger">
                            <li>Link Expired</li>
                        </div>
                    @else
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        @endif
                    <form action=""  method="POST"  id="resetPasswordForm">
                        <div class="form-group">
                            <input type="text" class="form-control" name="password" placeholder="New password*">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="password_confirmation" placeholder="Repeat your new password*">
                        </div>
                        <div class="form-group">
                            <button class="btn primary_btn form_submit_btn" data-url="/reset-password/{{ $token }}">Change password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="btn-group  compare_btn_test compare_count_item dropup d-none" id="compare_count">
  <a href="compare.php" class="dropdown-toggle"  >
    <h6>Compare</h6>
    <div class="count_num">
        3
    </div>
  </a>
  <ul class="dropdown-menu" aria-labelledby="">
    <li>
        <div class="dropdown-item" href="#">
            <a href="javascript:void(0)" class="close_compare_btn"><i class="fa-solid fa-xmark"></i></a>
            <picture>
                <img src="assets/images/products/products_04(1000).png" class="d-block w-100" alt="...">
            </picture>
            <div class="p_name">
                Espresso Coffee Machine ME-ECM1007B
            </div>
        </div>
    </li>
    <li>
        <div class="dropdown-item" href="#">
            <a href="javascript:void(0)" class="close_compare_btn"><i class="fa-solid fa-xmark"></i></a>
            <picture>
                <img src="assets/images/products/products_03(1000).png" class="d-block w-100" alt="...">
            </picture>
            <div class="p_name">
                Espresso Coffee Machine ME-ECM2001 2 in 1
            </div>
        </div>
    </li>
    <li>
        <div class="dropdown-item" href="#">
            <a href="javascript:void(0)" class="close_compare_btn"><i class="fa-solid fa-xmark"></i></a>
           <picture>
                <img src="assets/images/products/products_04(1000).png" class="d-block w-100" alt="...">
            </picture>
            <div class="p_name">
                Air Fryer ME-AF993B
            </div>
        </div>
    </li>
  </ul>
</div>

@endsection