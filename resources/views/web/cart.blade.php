@extends('web.layouts.main')
@section('content')



@if (Session::has('session_key') && !Cart::session($sessionKey)->isEmpty())

<section class="col-12 cart-progress">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <ul class="d-flex justify-content-center mb-0 ps-0">
                        <li class="active"><span>1</span>Cart</li>
                        <li><span>2</span>Preview</li>
                        <li><span>3</span>Payment</li>
                    </ul>
                </div>
            </div>
         </section>
         <section class="col-12 cart-wrap">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-11">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 cart-product-list">
                                <h4>Your Bookings</h4>
                                @foreach(Cart::session($sessionKey)->getContent()->sort() as $row)
    @php
        $product = App\Models\Product::find($row->id);
    @endphp

    <div class="col-12 cart-product">
        <div class="d-flex align-items-center justify-content-between">
            <div class="cart-dtl-wrp">
                <div class="d-flex align-items-center">
                    <div class="cart-prdt-img">
                        {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block') !!}
                    </div>
                    <div class="cart-prdct-dtls">

                    @if(isset($row->attributes['travel_type']))
    @php
        $travelType = $row->attributes['travel_type'];
        $locationId = $travelType == 'departure' ? $row->attributes['origin'] : $row->attributes['destination'];
        $location = App\Models\Location::find($locationId);

        $origindata = $row->attributes['origin'];

        $locationnew = App\Models\Location::find($origindata);

        $locationTitle = $location ? $location->title : $locationnew->title; // Default title if location is not found

    @endphp
@else
    @php

    $origin = $row->attributes['origin'];


        $locationTitle =   $location = App\Models\Location::find($origin);
    @endphp
@endif

<h4>{{ $product->title }}</h4>

@if(isset($row->attributes['guest']))
    <p>From: {{ $locationTitle }} Guest: {{ $row->attributes['guest'] }}</p>
@else
    <p>Guest information not available</p>
@endif

                        
                        <p>{{$product->service_type}}:  Date:{{$row->attributes['setdate']}} </p>
                        <a href="javascript:void(0)" class="remove-cart-item" data-id="{{$row->id}}">Remove</a>
                    </div>
                </div>
            </div> 
            <div class="cart-prdct-price">
                <h5>Total:&#8377; {{$row->price}}</h5>
            </div>
        </div>
    </div>
@endforeach

                            </div>
                            <div class="col-lg-5 col-md-5 cart-price-summry">
                                <h4>Price Details</h4>
                                <div class="price-summery">
                                    <table>
                                        <tbody>
                                            @php 

                                            $totalAmount = 0;
                                            @endphp


                                        @foreach(Cart::session($sessionKey)->getContent()->sort() as $row)
                                            <tr>
                                                <td>{{$row->name}}</td>
                                                <td>&#8377; {{$row->price}}</td>
                                            </tr>
                                            @php 

                                            $totalAmount += $row->price;
                                            $cgst = ($totalAmount * 0.09);
                                            $sgst = ($totalAmount * 0.09);

                                            

                                         
                                            @endphp


                                            @endforeach
                                           
                                        </tbody>
                                        <tfoot>

                                        
                                        
                                                <td><b>CGST (9%)</b></td>
                                                <td><b>&#8377;  {{$cgst}}</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>SGST (9%)</b></td>
                                                <td><b>&#8377;  {{$sgst}}</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Total Amount</b></td>
                                                <td><b>&#8377;  {{$totalAmount}}</b></td>
                                            </tr>
                                            
                                        </tfoot>
                                    </table>
                                    <div class="col-12 package-content-button text-center mt-3">
                                        <a href="{{ route('preview') }}" class="btn btn-primary">Continue</a>
                                       
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                </div>
            </div>
         </section>

         @else


 <div class="cart-empty text-center">
    <img class="mb-3" src="{{ asset('frontend/img/empty-cart.png')}}" alt="logo">
    <h4>Your cart is empty</h4>
    <p>Looks like you haven't made <br> your choice yet
 </div>


@endif
<div class="col-12 cart-addon">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h4 class="text-center mb-4">Ad on Services</h4>
                <div class="col-lg-12 service-slider" data-aos="fade-up" data-aos-duration="600">
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
    </div>
    
</div>    
@endsection


