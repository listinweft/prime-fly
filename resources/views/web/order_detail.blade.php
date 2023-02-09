@extends('web.layouts.main')
@section('content')
<div class="d-none d-md-block">
    <section class="inner_banner ">
        <picture>
            <img class="img-fluid" src="{{asset('frontend/images/inner_banner.jpg')}}" alt="">
        </picture>
    </section>
</div>

<div class="d-block d-md-none">
    <section class="inner_banner ">
        <picture>
            <img class="img-fluid" src="{{asset('frontend/images/mobile_inner_banner.jpg')}}" alt="">
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
                        My Orders
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="myaccount_section">
    <div class="container">
        <div class="row">
            <div class="col-12 profile_detail_wrapper">
                <div class="left_profile_nav sticky-xl-top sticky-lg-top-110">
                    <div class="info_user_box">
                        @if(Auth::guard('customer')->check())
                        <div class="profile_info">
                            <div class="name">
                               
                            {{$order->orderCustomer->CustomerData->first_name}}  {{$order->orderCustomer->CustomerData->last_name}}
                            </div>
                            <div class="mail">
                                {{$order->orderCustomer->CustomerData->user->email}} 
                            </div>
                        </div>
                        @else
                        <div class="profile_info">
                            <div class="name">
                            {{$order->orderCustomer->billingAddress->first_name}}    {{$order->orderCustomer->billingAddress->last_name}}
                            </div>
                            <div class="mail">
                                {{$order->orderCustomer->billingAddress->email}} 
                            </div>
                        </div>
                       
                        @endif
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false"><i class="fa-solid fa-bag-shopping"></i> My Orders</button>
                    </div>
                        
                </div>
                <div class="right_detail_wrapper">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                         
                            <div class="tab-pane-body">
                                <div id="my_order_list{{$order->id}}">
                                    <div class="my_order_list" >
                                        <div class="order_header">
                                            <ul>
                                                <li>
                                                    Order ID : MB# {{$order->order_code}}
                                                </li>
                                                <li>
                                                    Placed Order on {{date('d-m-Y',strtotime($order->created_at))}}
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" id="my_order_details_go" data-id="{{$order->id}}">Order Details <i class="fa-solid fa-arrow-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="order_body">
                                            <section id="demos">
                                                <div class="our-works-slider owl-carousel owl-theme ">
                                                    @php
                                                        
                                                        $refundStatus = $refundStatusPrevious = null;
                                                    @endphp
                                                    @foreach ($order->orderProducts as $product)
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
                                                                            {{-- <div class="rate_area">
                                                                                <i class="fa-solid fa-star"></i> 4.5
                                                                            </div> --}}
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
                                <div id="my_order_list_details{{$order->id}}" class="d-none">
                                    <div class="order_details">
                                        <div class="order_details_header">
                                            <ul>
                                                <li>
                                                    Order ID : MB# {{$order->order_code}}
                                                </li>
                                                <li>
                                                    Placed Order on {{date('d-m-Y',strtotime($order->created_at))}}
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" id="my_order_details_go" data-id="{{$order->id}}"><i class="fa-solid fa-arrow-left"></i>Back</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="order_address_area">
                                            <div class="address_card">
                                                <h5>Billing Address</h5>
                                                <div class="address">
                                                    <h6>{{ $order->orderCustomer->billingAddress->first_name . ' ' .$order->orderCustomer->billingAddress->last_name }}</h6>
                                                    <p>{{ $order->orderCustomer->billingAddress->address }}</p>
                                                    @if($order->orderCustomer->billingAddress->state!=NULL)
                                                    <p>{{$order->orderCustomer->billingAddress->state->title}},
                                                        {{$order->orderCustomer->billingAddress->state->country->title}}</p>
                                                @endif
                                                </div>
                                                <ul>
                                                    <li>
                                                        Email: {{ $order->orderCustomer->billingAddress->email }}
                                                    </li>
                                                    <li>
                                                        Phone: {{ $order->orderCustomer->billingAddress->phone }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="address_card">
                                                <h5>Shipping Address</h5>
                                                <div class="address">
                                                    <h6>{{ $order->orderCustomer->shippingAddress->first_name . ' ' .$order->orderCustomer->shippingAddress->last_name }}</h6>
                                                    <p>{{ $order->orderCustomer->shippingAddress->address }} </p>
                                                    <p> {{ $order->orderCustomer->shippingAddress->state->country->title }}
                                                        , {{ $order->orderCustomer->shippingAddress->state->title }}</p>
                                                </div>
                                                <ul>
                                                    <li>
                                                        Email:{{ $order->orderCustomer->shippingAddress->email }}
                                                    </li>
                                                    <li>
                                                        Phone: {{ $order->orderCustomer->shippingAddress->phone }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    
                                        @php
                                            $refundStatus = $refundStatusPrevious = null;
                                        @endphp
        
                                        @foreach($order->orderProducts as $product)
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
                                                                    {{$order->currency}} {{$product->cost}}
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
                                                    <div class="item_box">
                                                        <h6>Status :  <mark>{{$orderStatus->status}}</mark></h6>
                                                        @if(Auth::guard('customer')->check())
                                                        @if($orderStatus->status=="Processing" || $orderStatus->status=="Packed")
                                                            <form action="">
                                                                <div class="form-group mb-0">
                                                                    <a href="javascript:void(0)"
                                                                       class="btn primary_btn cancel cancel-order"
                                                                       data-status="cancel" data-id="{{$product->id}}"
                                                                       data-order_id="{{$order->id}}"
                                                                       data-coupon_min="{{$order->getMaxCouponsMinimumSpend()}}"
                                                                       data-order_total="{{ $orderTotal }}"
                                                                       data-price="{{ $product->total }}"
                                                                       data-all_product_statuses="{{ implode(',',array_unique($order->orderLogs->pluck(['status'])->toArray())) }}">Cancel</a>
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
                                                    {{ $order->remarks }}
                                                </p>
                                            </div>
                                            @if($orderTotal!=0)
                                            <div class="bill_note_card">
                                                <ul>
                                                    <li>
                                                        <div class="left">
                                                            <h6>Subtotal  {{ ($order->tax_type == 'Inside')? '(Tax Inclusive - '.$order->tax.'%)':''}}</h6>
                                                        </div>
                                                        <div class="right">
                                                            <h5>{{$order->currency.' '.$orderTotal}}</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="left">
                                                            <h6>Tax ({{$order->tax}}%)</h6>
                                                        </div>
                                                        <div class="right">
                                                            <h5>{{$order->currency.' '.$order->tax_amount}}</h5>
                                                        </div>
                                                    </li>
                                                    @if($order->orderCoupons)
                                                        @foreach ($order->orderCoupons as $orderCoupon)
                                                            <li>
                                                                <div class="left">
                                                                    <h6>Coupon Code ({{$orderCoupon->coupon->code}})</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h5>{{$order->currency.' '.$orderCoupon->coupon_value}}</h5>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                    
                                                    @if($order->payment_method=='COD' && $order->cod_extra_charge!='0.00')
                                                        <li>
                                                            <div class="left">
                                                                <h6>COD Charge</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h5>{{$order->currency.' '.$order->cod_extra_charge}}</h5>
                                                            </div>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <div class="left">
                                                            <h6>Shipping Charge</h6>
                                                        </div>
                                                        <div class="right">
                                                            <h5>{{$order->currency.' '.$order->shipping_charge}}</h5>
                                                        </div>
                                                    </li>
                                                    @if(@$refundStatus)

                                                    <li>
                                                        <p>Return/Refund</p>
                                                        @if($refundStatusPrevious->refund_type=="Bank Account" || $refundStatusPrevious->refund_type=="None")
                                                            <h5>{{$order->currency.' '.number_format($orderGrandTotal['returnAmount'],2)}}</h5>
                                                        @else
                                                            <h5>{{$order->currency.' 0.00'}}</h5>
                                                        @endif
                                                    </li>
                                                @endif
                                                    <li>
                                                        <div class="left">
                                                            <h6>Total</h6>
                                                        </div>
                                                        <div class="right">
                                                            <h5>{{$order->currency}} {{number_format(($orderGrandTotal['orderGrandTotal']>0)?$orderGrandTotal['orderGrandTotal']:'0',2)}}</h5>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
</section>
@endsection