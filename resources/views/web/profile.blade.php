
@extends('web.layouts.main')
@section('content')

<section class="myaccount_section">
    <section class="mb-3">
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
    </section>
    <div class="container position-relative">
        <div class="row">
            <div class="col-12 profile_detail_wrapper">
                <div class="left_profile_nav sticky-xl-top sticky-lg-top-110">
                    <div class="info_user_box">
                        <div class="profile_photo">
                            <img class="img-fluid" src="assets/images/profile.jpg" alt="">
                            <div class="upload_photo">
                                <form action="">
                                    <label class="custom-file-upload">
                                        <input type="file">
                                        <img class="img-fluid" src="assets/images/image.png" alt="">
                                    </label>
                                </form>
                            </div>
                        </div>
                        <div class="profile_info">
                            <div class="name">
                            {{@$customer->first_name}} {{@$customer->last_name}}
                            </div>
                            <div class="username">
                            {{@$customer->user->email}}
                            </div>
                            <div class="mail">
                            {{@$customer->user->email}}
                            </div>
                        </div>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link {{$tab=='profile'?'active':''}}" id="v-pills-information-tab" data-bs-toggle="pill" data-bs-target="#v-pills-information" type="button" role="tab" aria-controls="v-pills-information" aria-selected="true">
                            <div class="iconBox">
                                <img src="assets/images/myAccount-01.png" alt="">
                            </div>
                            Personal Information
                        </button>
                        <button class="nav-link {{$tab=='password'?'active':''}}" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="false">
                            <div class="iconBox">
                                <img src="assets/images/myAccount-02.png" alt="">
                            </div>
                            Change Password
                        </button>
                        <button class="nav-link {$tab=='order'?'active':''}}" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">
                            <div class="iconBox">
                                <img src="assets/images/myAccount-03.png" alt="">
                            </div>
                            My Orders
                        </button>
                        <button class="nav-link {{$tab=='address'?'active':''}}" id="v-pills-Address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Address" type="button" role="tab" aria-controls="v-pills-Address" aria-selected="false">
                            <div class="iconBox">
                                <img src="assets/images/myAccount-04.png" alt="">
                            </div>
                            Address
                        </button>
                        <button class="nav-link {{$tab=='wishlist'?'active':''}}" id="v-pills-wishlist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-wishlist" type="button" role="tab" aria-controls="v-pills-wishlist" aria-selected="false">
                            <div class="iconBox">
                                <img src="assets/images/myAccount-05.png" alt="">
                            </div>
                            Wishlist
                        </button>
                        <a class="nav-link" href="{{url('logout')}}">
                            <div class="iconBox">
                                <img src="assets/images/myAccount-06.png" alt="">
                            </div>
                            Logout
                        </a>
                    </div>
                        
                </div>
                <div class="right_detail_wrapper">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-information" role="tabpanel" aria-labelledby="v-pills-information-tab">
                            <div id="info_box">
                                <div class="tab-pane-header">
                                    <h4>Personal Information</h4>
                                    <a class="edit_profile" href="javascript:void(0)" id="edit_profile_go"> <i class="fa-solid fa-pen-to-square"></i>Edit Profile</a>
                                </div>
                                <div class="tab-pane-body">
                                    <form action="">
                                        <fieldset disabled="">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  name="first_name" id="profile_first_name" placeholder="" value="{{@$customer->first_name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  name="last_name" id="profile_last_name" placeholder="" value="{{@$customer->last_name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  name="email"
                                                     id="email" value="{{@$customer->user->email}}" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" value="{{@$customer->user->phone}}"  name="phone_number" id="phone_number" class="form-control" placeholder="+971 12345 6987">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="2022-3-23">
                                                    </div>
                                                </div> -->
                                            </div>
                                        </fieldset>
                                        
                                    </form>
                                </div>
                            </div>
                            <div id="info_box_edit" class="d-none">
                                <div class="tab-pane-header">
                                    <h4>Personal Information</h4>
                                </div>
                                <div class="tab-pane-body">                                        
                                    <form action="#" method="" class="account-form"
                                    id="customerProfileForm">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  name="first_name" id="profile_first_name" placeholder="John George" value="{{@$customer->first_name}}">
                                                    <!-- <span class="invalidMessage"> Given Data Error </span> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  name="last_name" id="profile_last_name" placeholder="John George" value="{{@$customer->last_name}}">
                                                    <!-- <span class="invalidMessage"> Given Data Error </span> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="johngeorge@gmail.com" name="email"
                                                     id="email" value="{{@$customer->user->email}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="+971 12345 6987"  name="phone_number" id="phone_number"  value="{{@$customer->user->phone}}">
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" value="2012-3-23">
                                                </div>
                                            </div> -->
                                            <div class="col-12 d-flex flex-column flex-sm-row mt-3">
                                                <a href="javascript:void(0)" class="secondary_btn" id="edit_profile_go">Cancel</a>
                                                <div class="form-group mb-0" id="button_edit">
                                                    <button class="btn primary_btn form_submit_btn" data-url="/customer/update-profile" id="profile-update">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade   {{$tab=='password'?'show active':''}}" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                            <div class="tab-pane-header">
                                <h4>Change Password</h4>
                            </div>
                            <div class="tab-pane-body">
                            <form action="#"id="change-password-form" >
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              
                                            <input type="password" class="form-control password-required" id="new_password" name="password" aria-describedby="emailHelp" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <input type="password" class="form-control password-required" name="password_confirmation" id="confirm_password" aria-describedby="emailHelp" placeholder="Confirm Password">
                                            <p id="confirm_password_error"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="primary_btn" id="change-password-btn">Update</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                            <div class="tab-pane-header">
                                <h4>My Orders</h4>
                            </div>
                            <div class="tab-pane-body">

                            @if($orders->isNotEmpty())
                                        @foreach($orders as $order)
                                <div id="my_order_list">
                                    <div class="my_order_list my_order_list{{$order->orderData->id}}" >
                                        <div class="order_header">
                                            <ul>
                                                <li>
                                                Order ID : MB# {{$order->orderData->order_code}}
                                                </li>
                                                <li>
                                                Placed Order on {{date('d-m-Y',strtotime($order->orderData->created_at))}}
                                                </li>
                                                <li>
                                                    <a  href="javascript:void(0)" id="my_order_details_go" data-id="{{$order->orderData->id}}" >Order Details <i class="fa-solid fa-arrow-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="order_body">
                                            <section id="demos">
                                                <div class="our-works-slider owl-carousel owl-theme ">
                                                @php
                                                                        
                                                                        $refundStatus = $refundStatusPrevious = null;
                                                                    @endphp
                                                                    
                                                                    @foreach ($order->orderData->orderProducts as $product)
                                                                        @php
                                                                            $orderStatus = App\Models\OrderLog::where('order_product_id',$product->id)->latest()->first();
                                                                            $orderStatusPrevious = App\Models\OrderLog::where('order_product_id',$product->id)->latest()->skip(1)->take(1)->first();
                                                                            if ($orderStatus->status == 'Refunded'){
                                                                                $refundStatus = $orderStatus;
                                                                                $refundStatusPrevious = $orderStatusPrevious;
                                                                            }
                                                                        @endphp
                                                   
                                                   
                                                    
                                                   
                                                    <div class="item">
                                                        <div class="product-item-info">
                                                            <div class="product-photo ">

                                                                <div class="product-image-container w-100">
                                                                @foreach($product->productData->product_categories as $product_category)
                                                                    <div class="product-image-wrapper">
                                                                        <a href="{{ url('category/'.$product_category->short_url) }}" tabindex="-1">
                                                                            <img class="product-image-photo" src="assets/images/product/product07.jpg" loading="lazy"  alt="">
                                                                        </a>
                                                                    </div>
                                                                    @endforeach
                                                                    <div class="cartWishlistBox">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0)" class="my_wishlist">
                                                                                    <div class="textIcon">
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="iconBox">
                                                                                        <i class="fa-regular fa-heart"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0)" class="my_wishlist">
                                                                                    <div class="iconBox">
                                                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                                                    </div>
                                                                                    <div class="textIcon">
                                                                                        Add to Cart
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="logoArea mt-auto">
                                                                        {!! Helper::printImage($product->productData, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-details">
                                                                <a href="product-details.php">
                                                                    <div class="pro-name">
                                                                    {{ $product->productData->title }}
                                                                    </div>
                                                                    <ul class="price-area">
                                                                        <li class="offer">
                                                                           {{$order->currency}} {{$product->cost}}
                                                                        </li>
                                                                        <li>
                                                                        {{$order->currency}} {{$product->cost}}
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="type-review">
                                                                        <li>
                                                                            Landscape
                                                                        </li>
                                                                        <li class="review">
                                                                            <i class="fa-solid fa-star"></i> 4.5
                                                                        </li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                   
                                </div>

                                @endforeach
                                        @endif
                            </div>
                        </div>

                      
                        <div class="tab-pane fade" id="v-pills-Address" role="tabpanel" aria-labelledby="v-pills-Address-tab">
                            <div class="tab-pane-header">
                                <h4>Address</h4>
                            </div>
                            <div class="tab-pane-body">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-billing_address" role="tabpanel" aria-labelledby="nav-billing_address-tab">
                                        <div id="my_address_list">
                                        @include('web.includes.customer_address')
                                        </div>
                                        <div id="my_address_add_form" class="d-none" >
                                        @include('web.includes.customer_address_form')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-wishlist" role="tabpanel" aria-labelledby="v-pills-wishlist-tab">
                            <div class="tab-pane-header">
                                <h4>Wishlist</h4>
                            </div>
                            <div class="tab-pane-body">
                                <div class="row">
                                @foreach(app('wishlist')->getContent() as $row)
                                        @php
                                            $product = App\Models\Product::find($row->id);
                                        @endphp
                                        @if($product!=NULL)
                                    <div class="col-md-4 product_card_flex mb-4" id="wishlistBox{{$row->id}}">
                                        <div class="product-item-info">
                                            <div class="product-photo ">

                                                <div class="product-image-container w-100">
                                                    <div class="product-image-wrapper">
                                                    <a href="product-details.php" tabindex="-1">
                                                    {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                                                        </a>

                                                    </div>
                                                    <div class="cartWishlistBox">
                                                        <ul>
                                                            <li>
                                                                <a data-id="{{$product->id}}"  href="javascript:void(0)" class=" my_wishlist icon_box my_wishlist {{ (Auth::guard('customer')->check())?'wishlist-action':'login-popup' }}  {{ (Auth::guard('customer')->check())?((app('wishlist')->get($product->id))?'fill':''):'' }} {{ (Auth::guard('customer')->check())?((app('wishlist')->get($product->id))?'fill':''):'' }}" id="wishlist_check_{{$product->id}}"  >
                                                                    <div class="textIcon">
                                                                        Wishlist
                                                                    </div>
                                                                    <div class="iconBox">
                                                                        <i class="fa-regular fa-heart"></i>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" data-id="{{$product->id}}"
                                                             class="my_wishlist icon_box my_wishlist cartBtn {{ ($product->availability=='In Stock' && $product->stock!=0)?'cart-action':'out-of-stock' }}" >
                                                                    <div class="iconBox">
                                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                                    </div>
                                                                    <div class="textIcon">
                                                                        Add to Cart
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="logoArea mt-auto">
                                                        <img class="img-fluid" src="{{asset('frontend/images/productListLogo.png')}}" alt="">
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($product->product_categories as $product_category)
                                            <div class="product-details">
                                                <a href="{{ url('category/'.$product_category->short_url) }}">

                                                    <div class="pro-name">
                                                    {{ $product->title }}
                                                    </div>
                                                    @endforeach
                                                    <ul class="price-area">
                                                    @if(Helper::offerPrice($product->id)!='')
                                                        <li class="offer">
                                                        {{Helper::defaultCurrency().' '.number_format(Helper::offerPriceAmount($product->id),2)}}
                                                        </li>
                                                        <li>
                                                        {{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}
                                                        </li>
                                                        @else
                                                                <li>
                                                                    {{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}
                                                                </li>
                                                                <li>
                                                                   
                                                                </li>
                                                                @endif
                                                    </ul>
                                                    
                                                    <ul class="type-review">
                                                        <li>
                                                            Landscape
                                                        </li>
                                                        @if(Helper::averageRating($product->id)>0)
                                                        <li class="review">
                                                            <i class="fa-solid fa-star"></i> {{ Helper::averageRating($product->id) }}   
                                                        </li>
                                                        @endif
                                                    </ul>
                                                   
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                        @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('scripts')

    
@endpush