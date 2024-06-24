@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> View Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'order')}}">Orders</a></li>
                            <li class="breadcrumb-item active">Order View - {{'PP'.$order->order_code}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <img src="{{asset('frontend/images/primefly_Logo.jpg')}}" class="mb-3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i>
                                        @if($orderDetails)
                                            {{@$orderDetails->shippingAddress->first_name .' '.@$orderDetails->shippingAddress->last_name}}
                                        @endif
                                        <small
                                            class="float-right">Date: {{ date("F, d Y", strtotime($order->created_at))  }}</small>
                                    </h4>
                                </div>
                            </div>

                            <div class="row invoice-info">

                                
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice {{'PP#'.$order->order_code}}</b><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service</th>
                                            <th>Cost</th>
                                       
                                           
                                            <th>Quantity</th>
                                 
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $shoppingTotal = [];
                                        @endphp
                                        @foreach($order->orderProducts as $product)
                                            @php
                                                $shoppingTotal[] = $product->total;
                                                $orderStatus = App\Models\OrderLog::where('order_product_id','=',$product->id)->orderBy('created_at','DESC')->first();
                                                $orderStatusPrevious = App\Models\OrderLog::where('order_product_id',$product->id)->orderBy('id','DESC')->skip(1)->take(1)->first();
                                            @endphp
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    {{$product->productData->title}}
                                                </td>
                                                <td>{{$order->currency}} {{$product->cost}}</td>
                                                @php
                                                $frame = App\Models\Frame::where('id',$product->frame)->first();
                                                $type = App\Models\ProductType::where('id',$product->type)->first();
                                                   $size = App\Models\Size::where('id',$product->size)->first();
                                                    @endphp
                                       
                                            
                                                
                                                <td>{{$product->qty}}</td>
                                                <td>{{$order->currency}}
                                                    @if(count($order->orderProducts)==1)
                                                        @if($order->orderCoupons!=NULL)
                                                            {{ $product->total-$order->orderCoupons->sum('coupon_value') }}
                                                        @else
                                                            {{ $product->total }}
                                                        @endif
                                                    @else
                                                        {{ $product->total }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    
                                    
                                    <p>
                                    <hr>
                                    @if($orderStatus->status=="Refunded")
                                        <p class="lead">Return/Refund:</p>
                                        @if($orderStatusPrevious->remarks!=NULL)
                                            <p>Remarks: {!!$orderStatusPrevious->remarks!!}</p>
                                        @endif
                                        <p>Refund Method: {{$orderStatusPrevious->refund_type}}</p>
                                        @if($orderStatusPrevious->refund_type=="Bank Account")
                                            <p> Account Holder: {{$orderStatusPrevious->account_holder_name}}</p>
                                            <p> Account Number: {{$orderStatusPrevious->account_number}}</p>
                                            <p> IFSC Code {{$orderStatusPrevious->ifsc_code}}</p>
                                        @elseif($orderStatusPrevious->refund_type=="Credit Point")
                                            @php
                                                $pointAgainstOrder = App\Models\CreditPoint::where([['order_id',$order->id],['type','Backend'],['status','Active']])->first();
                                            @endphp
                                            <p> Credit Point: {{$pointAgainstOrder->earned_points}} (pts)</p>
                                        @elseif($orderStatusPrevious->refund_type=="Voucher")
                                            @php
                                                $couponAgainstOrder = App\Models\VoucherCoupon::where([['order_id',$order->id],['status','Active']])->first();
                                            @endphp
                                            @if($couponAgainstOrder!=NULL)
                                                <p> Voucher: {{$couponAgainstOrder->coupon->code}}</p>
                                            @endif
                                        @else
                                            <p>{{$order->currency.' '.number_format($orderGrandTotal['returnAmount'],2)}}</p>
                                            @endif
                                            @endif
                                            </p>
                                </div>
                                <div class="col-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                           
                                           
                                            
                                            <tr>
                                                <th>Total:</th>
                                                <td>{{$order->currency}} {{number_format(($orderGrandTotal['orderGrandTotal']>0)?$orderGrandTotal['orderGrandTotal']:'0',2)}}</td>
                                            </tr>
                                           
                                            </tbody>
                                        </table>
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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
            $('.invoice-page-btn').on('click', function () {
                window.print();
            });
        });  
    </script>
@endsection
