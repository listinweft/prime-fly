@extends('web.layouts.main')

@section('content')

@include('web.includes.banner',[$banner, 'type'=> 'my-account'])



<section class="myaccount_section">
    <div class="container">
        <div class="row">
            <div class="col-12 profile_detail_wrapper">
                <div class="left_profile_nav sticky-xl-top sticky-lg-top-110">
                    <div class="info_user_box">
                        <div class="profile_photo">
                            <img class="img-fluid" src="assets/images/profile.png" alt="">
                            <div class="upload_photo">
                                <form action="">
                                    <label class="custom-file-upload">
                                        <input type="file">
                                        <i class="fa-solid fa-plus"></i>
                                    </label>
                                </form>
                            </div>
                        </div>
                        <div class="profile_info">
                            <div class="name">
                                {{@$customer->first_name}} {{@$customer->last_name}}
                            </div>
                            <div class="mail">
                                {{@$customer->user->email}}
                            </div>
                        </div>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                       
                            <button class="nav-link {{$tab=='profile'?'active':''}}" id="v-pills-information-tab" data-bs-toggle="pill" data-bs-target="#v-pills-information" type="button" role="tab" aria-controls="v-pills-information" aria-selected="true"><i class="fa-solid fa-user"></i> Personal Information</button>
                       
                        <button class="nav-link {{$tab=='password'?'active':''}}" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="false"><i class="fa-solid fa-keyboard"></i> Change Password</button>
                        <button class="nav-link {{$tab=='order'?'active':''}}" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false"><i class="fa-solid fa-bag-shopping"></i> My Orders</button>
                        
                        <button class="nav-link {{$tab=='address'?'active':''}}" id="v-pills-Address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Address" type="button" role="tab" aria-controls="v-pills-Address" aria-selected="false"><i class="fa-solid fa-map-location-dot"></i> Address</button>
                       
                        <button class="nav-link {{$tab=='wishlist'?'active':''}}" id="v-pills-wishlist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-wishlist" type="button" role="tab" aria-controls="v-pills-wishlist" aria-selected="false"><i class="fa-solid fa-heart"></i> Wishlist</button>
                        <a class="nav-link" href="{{url('logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                        
                </div>
                <div class="right_detail_wrapper">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade  {{$tab=='profile'?'show active':''}}" id="v-pills-information" role="tabpanel" aria-labelledby="v-pills-information-tab">
                            <div id="info_box">
                                <div class="tab-pane-header">
                                    <h4>Personal Information</h4>
                                    <a class="edit_profile" href="javascript:void(0)" id="edit_profile_go"> <i class="fa-solid fa-pen-to-square"></i>Edit Profile</a>
                                </div>
                                <div class="tab-pane-body"> <form action="#" method="POST" class="account-form"
                                    id="customerProfileForm">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1" class="form-label">First
                                                  Name*</label>
                                              <input type="text" class="form-control profile-required"
                                                     name="first_name" id="profile_first_name"
                                                     aria-describedby="emailHelp" placeholder="First name"
                                                     value="{{@$customer->first_name}}">
                                          </div>
                                      </div>
                                      
                                  
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1" class="form-label">Last
                                                  Name*</label>
                                              <input type="text" class="form-control profile-required"
                                                     name="last_name" id="profile_last_name"
                                                     aria-describedby="emailHelp" placeholder="Last name"
                                                     value="{{@$customer->last_name}}">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1"
                                                     class="form-label">Email</label>
                                              <input type="email" class="form-control" name="email"
                                                     id="email" aria-describedby="emailHelp"
                                                     placeholder="Email ID" value="{{@$customer->user->email}}"
                                                     readonly>
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1"
                                                     class="form-label">Phone*</label>
                                              <input type="number" class="form-control profile-required"
                                                     name="phone_number" id="phone_number"
                                                     aria-describedby="emailHelp"
                                                     placeholder="Phone Number"
                                                     value="{{@$customer->user->phone}}">
                                          </div>
                                      </div>
                              
                                  </div>
                                  <div class="btn-group" id="button_edit">
                                      <button type="submit" class="primary_btn" id="profile-update">
                                          Update
                                      </button> &nbsp; &nbsp;
                                      <button type="reset" class="secondary_btn">Cancel</button>
                                  </div>
                              </form>
                                </div>
                            </div>
                            <div id="info_box_edit" class="d-none">
                                <div class="tab-pane-header">
                                    <h4>Personal Information</h4>
                                </div>
                                <div class="tab-pane-body">                                        
                                    <form action="" id="profileUpdateForm" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $customer->first_name) }}" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('first_name', $customer->last_name) }}" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ old('email', $user->email) }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" name="phone_number" id="phone" class="form-control" placeholder="" value="{{ old('phone', $user->phone) }}">
                                                </div>
                                            </div>
                                         
                                            <div class="col-12 d-flex flex-column flex-sm-row mt-3">
                                                <a href="javascript:void(0)" class="secondary_btn"  id="edit_profile_go">Cancel</a>
                                                <div class="form-group mb-0">
                                                    <button class="btn primary_btn form_submit_btn" data-url="/customer/update-profile">Save </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade  {{$tab=='password'?'show active':''}}" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                            <div class="tab-pane-header">
                                <h4>Change Password</h4>
                            </div>
                            <div class="tab-pane-body">
                                <form id="change-password-form" >
                                    <div class="row">
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                               
                                                <input type="passsword" class="form-control password-required" id="current_password" name="current_password" aria-describedby="emailHelp" placeholder="Current Password">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              
                                                <input type="password" class="form-control password-required" id="new_password" name="password" aria-describedby="emailHelp" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <input type="password" class="form-control password-required" name="confirm_password" id="confirm_password" aria-describedby="emailHelp" placeholder="Confirm Password">
                                            <p id="confirm_password_error"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="submit" class="primary_btn" id="change-password-btn">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade  {{$tab=='order'?'show active':''}}" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                            <div class="tab-pane-header">
                                <h4>My Orders</h4>
                            </div>
                            <div class="tab-pane-body">
                            
                                @if($orders->isNotEmpty())
                                        @foreach($orders as $order)
                                            <div id="my_order_list{{$order->orderData->id}}">
                                                <div class="my_order_list" >
                                                    <div class="order_header">
                                                        <ul>
                                                            <li>
                                                                Order ID : MB# {{$order->orderData->order_code}}
                                                            </li>
                                                            <li>
                                                                Placed Order on {{date('d-m-Y',strtotime($order->orderData->created_at))}}
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" id="my_order_details_go" data-id="{{$order->orderData->id}}">Order Details <i class="fa-solid fa-arrow-right"></i></a>
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
                                                                            <div class="product_card_flex">
                                                                                <div class="product_item_card">
                                                                                        <div class="product_item_body">
                                                                                            <div class="sale_new_tag_wrapper">
                                                                                                @foreach($product->productData->product_categories as $product_category)
                                                                                                    <div class="product_tag">
                                                                                                        <a href="{{ url('category/'.$product_category->short_url) }}">
                                                                                                            <p>{{ $product_category->title }}</p>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                @endforeach
                                                                                                @if($product->productData->new_arrival=='Yes')
                                                                                                <div class="new"> New  </div>
                                                                                            @endif
                                                                                            </div>
                                                                                            <div class="product_item_top_image pt-45">
                                                                                                {!! Helper::printImage($product->productData, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                                                                            </div>
                                                                                            <div class="product_item_cnt text-center">
                                                                                                <div class="text">
                                                                                                    {{ $product->productData->title }}
                                                                                                </div>
                                                                                                <div class="rate_area">
                                                                                                    <i class="fa-solid fa-star"></i> 4.5
                                                                                                </div>
                                                                                                <ul class="price_area">
                                                                                                    <li>
                                                                                                        {{$order->currency}} {{$product->cost}}
                                                                                                    </li>
                                                                                                    <li></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="my_order_list_details{{$order->orderData->id}}" class="d-none">
                                                    <div class="order_details">
                                                        <div class="order_details_header">
                                                            <ul>
                                                                <li>
                                                                    Order ID : MB# {{$order->orderData->order_code}}
                                                                </li>
                                                                <li>
                                                                    Placed Order on {{date('d-m-Y',strtotime($order->orderData->created_at))}}
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)" id="my_order_details_go" data-id="{{$order->orderData->id}}"><i class="fa-solid fa-arrow-left"></i>Back</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="order_address_area">
                                                            <div class="address_card">
                                                                <h5>Billing Address</h5>
                                                                <div class="address">
                                                                    <h6>{{ $order->orderData->orderCustomer->billingAddress->first_name . ' ' .$order->orderData->orderCustomer->billingAddress->last_name }}</h6>
                                                                    <p>{{ $order->orderData->orderCustomer->billingAddress->address }}</p>
                                                                    @if($order->orderData->orderCustomer->billingAddress->state!=NULL)
                                                                    <p>{{$order->orderData->orderCustomer->billingAddress->state->title}},
                                                                        {{$order->orderData->orderCustomer->billingAddress->state->country->title}}</p>
                                                                @endif
                                                                </div>
                                                                <ul>
                                                                    <li>
                                                                        Email: {{ $order->orderData->orderCustomer->billingAddress->email }}
                                                                    </li>
                                                                    <li>
                                                                        Phone: {{ $order->orderData->orderCustomer->billingAddress->phone }}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="address_card">
                                                                <h5>Shipping Address</h5>
                                                                <div class="address">
                                                                    <h6>{{ $order->orderData->orderCustomer->shippingAddress->first_name . ' ' .$order->orderData->orderCustomer->shippingAddress->last_name }}</h6>
                                                                    <p>{{ $order->orderData->orderCustomer->shippingAddress->address }} </p>
                                                                    <p> {{ $order->orderData->orderCustomer->shippingAddress->state->country->title }}
                                                                        , {{ $order->orderData->orderCustomer->shippingAddress->state->title }}</p>
                                                                </div>
                                                                <ul>
                                                                    <li>
                                                                        Email:{{ $order->orderData->orderCustomer->shippingAddress->email }}
                                                                    </li>
                                                                    <li>
                                                                        Phone: {{ $order->orderData->orderCustomer->shippingAddress->phone }}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $refundStatus = $refundStatusPrevious = null;
                                                        @endphp
                                                        @foreach($order->orderData->orderProducts as $product)
                                                        @php
                                                            $orderStatus = App\Models\OrderLog::where('order_product_id',$product->id)->latest()->first();
                                                            $orderStatusPrevious = App\Models\OrderLog::where('order_product_id',$product->id)->latest()->skip(1)->take(1)->first();
                                                            if ($orderStatus->status == 'Refunded'){
                                                                $refundStatus = $orderStatus;
                                                                $refundStatusPrevious = $orderStatusPrevious;
                                                            }
                                                        @endphp
                                                         <div class="order_details_item">
                                                            <div class=" products_item">
                                                                <div class="product_image">
                                                                    {!! Helper::printImage($product->productData, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                                                </div>
                                                                <div class="product_details">
                                                                    <div>
                                                                        <h6>
                                                                            {{ $product->productData->title }}
                                                                        </h6>
                                                                        <ul class="price_area">
                                                                           
                                                                            <li>
                                                                                {{$order->orderData->currency}} {{$product->cost}}
                                                                            </li>
                                                                            <li></li>
                                                                           
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="item_box">
                                                                    <ul class="order_highlight">
                                                                        <li>
                                                                            <div class="head">
                                                                                Quantity 
                                                                            </div>
                                                                            <div class="data">
                                                                                :  {{$product->qty}}
                                                                            </div>
                                                                        </li>
                                                                        @if (@$product->capacity)
                                                                        <li>
                                                                            <div class="head">
                                                                                Capacity 
                                                                            </div>
                                                                            <div class="data">
                                                                                : {{$product->capacity}}
                                                                            </div>
                                                                        </li>
                                                                        @endif
                                                                        {{-- <li>
                                                                            <div class="head">
                                                                                Material 
                                                                            </div>
                                                                            <div class="data">
                                                                                : Stainless Steel
                                                                            </div>
                                                                        </li> --}}
                                                                        @if (@$product->colorData)
                                                                        <li>
                                                                            <div class="head">
                                                                                Colour 
                                                                            </div>
                                                                            <div class="data">
                                                                                : {{ $product->colorData->title}}
                                                                            </div>
                                                                        </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                                @php
                                                                     $orderTotal = \App\Models\Order::getProductTotal($order->orderData->id);
                                                                    $orderGrandTotal =  \App\Models\Order::OrderGrandTotal($order->orderData->id);
                                                                    $orderCurrentTotal =  \App\Models\Order::getOrderCurrentTotal($order->orderData->id);

                                                                @endphp
                                                              
                                                                <div class="item_box">
                                                                    <h6>Status :  <mark>{{$orderStatus->status}}</mark></h6>
                                                                    @if(Auth::guard('customer')->check())
                                                                    @if($orderStatus->status=="Processing" )
                                                                        <form action="">
                                                                            <div class="form-group mb-0">
                                                                                <a href="javascript:void(0)"
                                                                                   class="btn primary_btn cancel cancel-order"
                                                                                   data-status="cancel" data-id="{{$product->id}}"
                                                                                   data-order_id="{{$order->orderData->id}}"
                                                                                   data-coupon_min="{{$order->orderData->getMaxCouponsMinimumSpend()}}"
                                                                                   data-order_total="{{ $orderTotal }}"
                                                                                   data-price="{{ $product->total }}"
                                                                                   data-all_product_statuses="{{ implode(',',array_unique($order->orderData->orderLogs->pluck(['status'])->toArray())) }}">Cancel</a>
                                                                            </div>
                                                                        </form>   
                                                                    @endif  
                                                                    @endif                                               
                                                                </div>
                                                            </div>
                                                                
                                                        </div>
                                                        @endforeach
                
                                                        <div class="order_bill_note_area">
                                                            <div class="bill_note_card">
                                                                <h5>Customer Notes</h5>
                                                                <p>
                                                                    {{ $order->orderData->remarks }}
                                                                </p>
                                                            </div>
                                                            @if($orderTotal!=0)
                                                                <div class="bill_note_card">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="left">
                                                                                <h6>Subtotal  {{ ($order->orderData->tax_type == 'Inside')? '(Tax Inclusive - '.$order->orderData->tax.'%)':''}}</h6>
                                                                            </div>
                                                                            <div class="right">
                                                                                <h5>{{$order->orderData->currency.' '.$orderTotal}}</h5>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="left">
                                                                                <h6>Tax ({{$order->orderData->tax}}%)</h6>
                                                                            </div>
                                                                            <div class="right">
                                                                                <h5>{{$order->orderData->currency.' '.$order->orderData->tax_amount}}</h5>
                                                                            </div>
                                                                        </li>
                                                                        @if($order->orderData->orderCoupons)
                                                                            @foreach ($order->orderData->orderCoupons as $orderCoupon)
                                                                                <li>
                                                                                    <div class="left">
                                                                                        <h6>Coupon Code ({{$orderCoupon->coupon->code}})</h6>
                                                                                    </div>
                                                                                    <div class="right">
                                                                                        <h5>{{$order->orderData->currency.' '.$orderCoupon->coupon_value}}</h5>
                                                                                    </div>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif
                                                                        
                                                                        @if($order->orderData->payment_method=='COD' && $order->orderData->cod_extra_charge!='0.00')
                                                                            <li>
                                                                                <div class="left">
                                                                                    <h6>COD Charge</h6>
                                                                                </div>
                                                                                <div class="right">
                                                                                    <h5>{{$order->orderData->currency.' '.$order->orderData->cod_extra_charge}}</h5>
                                                                                </div>
                                                                            </li>
                                                                        @endif
                                                                        <li>
                                                                            <div class="left">
                                                                                <h6>Shipping Charge</h6>
                                                                            </div>
                                                                            <div class="right">
                                                                                <h5>{{$order->orderData->currency.' '.$order->orderData->shipping_charge}}</h5>
                                                                            </div>
                                                                        </li>
                                                                        @if(@$refundStatus)

                                                                        <li>
                                                                            <p>Return/Refund</p>
                                                                            @if($refundStatusPrevious->refund_type=="Bank Account" || $refundStatusPrevious->refund_type=="None")
                                                                                <h5>{{$order->orderData->currency.' '.number_format($orderGrandTotal['returnAmount'],2)}}</h5>
                                                                            @else
                                                                                <h5>{{$order->orderData->currency.' 0.00'}}</h5>
                                                                            @endif
                                                                        </li>
                                                                    @endif
                                                                        <li>
                                                                            <div class="left">
                                                                                <h6>Total</h6>
                                                                            </div>
                                                                            <div class="right">
                                                                                <h5>{{$order->orderData->currency}} {{number_format(($orderGrandTotal['orderGrandTotal']>0)?$orderGrandTotal['orderGrandTotal']:'0',2)}}</h5>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    
                                    </div>
                                </div>
                            <div class="tab-pane fade  {{$tab=='address'?'show active':''}}" id="v-pills-Address" role="tabpanel" aria-labelledby="v-pills-Address-tab">
                                <div class="tab-pane-header">
                                    <h4>Address</h4>
                                </div>
                                <div class="tab-pane-body">
                                
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-billing_address" role="tabpanel" aria-labelledby="nav-billing_address-tab">
                                            <div id="my_address_list">
                                                {{-- <a class="btn secondary_btn" id="add_address_go"><i class="fa-solid fa-plus"></i>Add Address</a>
                                                <div class="address_wrapper">
                                                   
                                                    
                                                </div> --}}
                                                @include('web.includes.customer_addresses')
                                            </div>
                                            <div id="my_address_add_form" class="d-none" >
                                                <form method="post" id="addAddressForm">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" value="{{ @$customerAddress->first_name }}" name="first_name" id="first_name"
                                                                       class="form-control required" placeholder="First Name*" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" value="{{ @$customerAddress->last_name }}" name="last_name" id="last_name"
                                                                       class="form-control required" placeholder="Last Name*" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="email" value="{{ @$customerAddress->email }}" name="email" id="email"
                                                                       class="form-control required" placeholder="Email*" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="number" value="{{ @$customerAddress->phone }}" name="phone" id="phone"
                                                                       class="form-control required" placeholder="Phone Number*" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group address_label">
                                                                <label class="label_cnt">
                                                                    <span>Address Type</span>
                                                                </label>
                                                                <div class="d-flex">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input"
                                                                               {{ !isset($customerAddress) ? 'checked' : '' }} {{ @$customerAddress->address_type == 'Home' ? 'checked' : '' }} type="radio"
                                                                               name="address_label_type" id="address_label_type" value="Home">
                                                                        <label class="form-check-label" for="address_label_type">
                                                                            Home
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input"
                                                                               {{ @$customerAddress->address_type == 'Work' ? 'checked' : '' }} type="radio"
                                                                               name="address_label_type" id="address_label_type" value="Work">
                                                                        <label class="form-check-label" for="address_label_type">
                                                                            Work
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="number" value="{{ @$customerAddress->zipcode }}" maxlength="15" name="zipcode" id="zipcode"
                                                                       class="form-control required" placeholder="Zip Code*" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <select name="country" id="country" class="form-control form_select required" required>
                                                                    <option value="">Select Country*</option>
                                                                    @foreach($countries as $country)
                                                                        <option value="{{ $country->id }}"
                                                                            {{(@$customerAddress->state->country_id==$country->id)?'selected':''}}>
                                                                            {{$country->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <select name="state" id="state" class="form-control form_select required" required>
                                                                    <option value="">Select Emirate*</option>
                                                                    @if(!empty($states))
                                                                        @foreach($states as $state)
                                                                            <option value="{{ $state->id }}"
                                                                                {{(@$customerAddress->state_id==$state->id)?'selected':''}}
                                                                            >{{$state->title}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control form-message required" name="address" id="address"
                                                                          placeholder="Address*" required>{{ @$customerAddress->address }}</textarea>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="id" name="id" value="{{@$customerAddress->id??0}}">
                                                        <input type="hidden" name="set_session" id="set_session" value="0">
                                                        <input type="hidden" name="show_page" id="show_page" value="1">
                                                        <input type="hidden" id="account_type" name="account_type"  value="{{(Auth::guard('customer')->check())?1:0}}">
                                                        <input type="hidden" name="is_default" id="is_default" value="0">
                                                        <div class="col-12 d-flex flex-column flex-sm-row mt-3">
                                                            <a href="javascript:void(0)" class="secondary_btn " id="add_address_go">Cancel</a>
                                                            <div class="form-group mb-0">
                                                                <button class="btn primary_btn form_submit_btn" data-url="/customer/update-customer-address">Save
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                              
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade  {{$tab=='wishlist'?'show active':''}}" id="v-pills-wishlist" role="tabpanel" aria-labelledby="v-pills-wishlist-tab">
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
                                        <div class="col-md-4 product_card_flex"  id="wishlistBox{{$row->id}}">
                                            <div class="product_item_card">
                                                <div class="buttons_box">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0)" class="icon_box my_wishlist add_compare_product
                                                            {{Session::exists('compare_products')? (in_array($product->id, array_column(Session::get('compare_products'), 'product_id'))? 'fill':''):'' }}"
                                                               data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover"
                                                               data-bs-content="Compare" data-id="{{ $product->id }}">
                                                                <div class="comprae_icon">
                                                                    <i class="fa-solid fa-code-compare"></i>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-id="{{$product->id}}"  href="javascript:void(0)" class="icon_box my_wishlist {{ (Auth::guard('customer')->check())?'wishlist-action':'login-popup' }}"
                                                                 data-bs-toggle="popover"  id="wishlist_check_{{$product->id}}" 
                                                                data-bs-placement="left" data-bs-trigger="hover" data-bs-content="Wishlist">
                                                                <span
                                                                    id="wishlist_check_span_{{$product->id}}"
                                                                    class="wishlist-image {{ (Auth::guard('customer')->check())?((app('wishlist')->get($product->id))?'fill':''):'' }}">
                                                                <i class="fa-solid fa-heart"></i></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" data-id="{{$product->id}}"
                                                             class="icon_box my_wishlist cartBtn {{ ($product->availability=='In Stock' && $product->stock!=0)?'cart-action':'out-of-stock' }}" 
                                                             data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover" data-bs-content="Cart">
                                                                <i class="fa-solid fa-cart-shopping"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a href="product-details-ecommerce.php">
                                                    <div class="product_item_body">
                                                        <div class="sale_new_tag_wrapper">
                                                            @foreach($product->product_categories as $product_category)
                                                            <div class="product_tag">
                                                                <a href="{{ url('category/'.$product_category->short_url) }}">
                                                                    <p>{{ $product_category->title }}</p>
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                         @if($product->availability=='Out of Stock')
                                                            <div class="sale">
                                                                Out of Stock     
                                                            </div>
                                                            @else
                                                            <div class="sale">
                                                                Sale  
                                                            </div>
                                                            @endif
                                                            @if($product->new_arrival=='Yes')
                                                            <div class="new">
                                                                New     
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <a href="{{ url('/product/'.$product->short_url) }}">
                                                            <div class="product_item_top_image pt-45">
                                                                    {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                                            </div>
                                                        </a>
                                                        <div class="product_item_cnt text-center">
                                                            <div class="text">
                                                            <a href="{{ url('/product/'.$product->short_url) }}" class="text">
                                                                <h5>{{ $product->title }}</h5>
                                                            </a>
                                                        </div>
                                                            @if(Helper::averageRating($product->id)>0)
                                                            <div class="rate_area">
                                                                <i class="fa-solid fa-star"></i>{{ Helper::averageRating($product->id) }}                                                                                           
                                                            </div>
                                                            @endif
                                                            <ul class="price_area">
                                                                @if(Helper::offerPrice($product->id)!='')
                                                                <li>
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
                                                        </div>
                                                    </div>
                                                </a>
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

<div class="modal fade quickEnquiryModal" id="cancelOrder" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
       <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
           <div class="row">
               <div class="col-md-12">
                   <form action="" id="cancelOrderForm" enctype="multipart/form-data">
                       <div class="col-md-12 ">
                           <div class="form-group">
                               <div class="customer_note">
                                   <label for="reason">Customer Notes</label>
                                   <textarea name="reason" id="reason" class="form-control mt-3"
                                             placeholder="Please enter your reason to cancel this order"></textarea>
                               </div>
                           </div>
                       </div>
                       <input type="hidden" name="product_id" id="product_id">
                       <input type="hidden" name="order_id" id="order_id">
                       <input type="hidden" name="order_status" id="order_status">
                       <button type="submit" class="primary_btn form_submit_btn" data-url="/cancel-order"
                       >Submit
                       </button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
</div>

@endsection
