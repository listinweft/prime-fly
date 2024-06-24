@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> View Bookings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'order')}}">Bookings</a></li>
                            <li class="breadcrumb-item active">Booking View - {{'PP'.$order->order_code}}</li>
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
                                          
                                          
                                            <th>Status</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $shoppingTotal = [];
                                        $refundStatus = $refundStatusPrevious = null;
                                        @endphp
                                        @foreach($order->orderProducts as $product)
                                            @php
                                                $shoppingTotal[] = $product->total;
                                                $orderStatus = App\Models\OrderLog::where('order_product_id','=',$product->id)->orderBy('created_at','DESC')->first();
                                                $orderStatusPrevious = App\Models\OrderLog::where('order_product_id',$product->id)->orderBy('id','DESC')->skip(1)->take(1)->first();
                                                if ($orderStatus->status == 'Refunded'){
                                                $refundStatus = $orderStatus;
                                                $refundStatusPrevious = $orderStatusPrevious;
                                            }
                                            @endphp
                                            <tr>
                                                @php
                                                $frame = App\Models\Frame::where('id',$product->frame)->first();
                                                $type = App\Models\ProductType::where('id',$product->type)->first();
                                                   $size = App\Models\Size::where('id',$product->size)->first();
                                            @endphp
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    {{$product->productData->title}}
                                                </td>
                                                <td>{{$order->currency}} {{$product->cost}}</td>
                                               
                                              
                                               
                                              
                                                <td>
                                                    <select name="status" id="orderStatus" class="form-control"
                                                            data-id="{{ $product->id }}" data-order_id="{{$order->id}}"
                                                            data-coupon_min="{{$order->getMaxCouponsMinimumSpend()}}"
                                                            data-order_total="{{ $orderTotal }}"
                                                            data-price="{{ $product->total }}"
                                                            data-all_product_statuses="{{ implode(',',array_unique($order->orderLogs->pluck(['status'])->toArray())) }}">
                                                        {{-- @foreach(['Pending','Processing','On Hold','Cancelled','Packed','Shipped','Out For Delivery','Delivered','Completed','Returned','Refunded','Failed'] AS $status)--}}
                                                        @foreach(['Pending'=>'Payment Pending','Processing'=>'Processing','On Hold'=>'On Hold','Cancelled'=>'Cancelled','Packed'=>'Packed','Shipped'=>'Shipped','Out For Delivery'=>'Out For Delivery','Delivered'=>'Delivered','Completed'=>'Completed','Refunded'=>'Refunded','Failed'=>'Failed'] AS $statusKey => $status)
                                                            <option value="{{ $statusKey }}"
                                                                {{ (old("status", @$orderStatus->status) == $statusKey)? "selected" : "" }}>
                                                                {{ $status }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
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
                                    
                                    
                                    
                                    <hr>
                                    @if($refundStatus)
                                        <p class="lead">Return/Refund:</p>                     
                                        @if($refundStatusPrevious->remarks!=NULL)
                                            <p>Remarks: {!!$refundStatusPrevious->remarks!!}</p>
                                        @endif
                                        <p>Refund Method: {{$refundStatusPrevious->refund_type}}</p>
                                        @if($refundStatusPrevious->refund_type=="Bank Account")
                                            <p> Account Holder: {{$refundStatusPrevious->account_holder_name}}</p>
                                            <p> Account Number: {{$refundStatusPrevious->account_number}}</p>
                                            <p> IFSC Code {{$refundStatusPrevious->ifsc_code}}</p>
                                        @elseif($refundStatusPrevious->refund_type=="Credit Point")
                                            @php
                                                $pointAgainstOrder = App\Models\CreditPoint::where([['order_id',$order->id],['type','Backend'],['status','Active']])->first();
                                            @endphp
                                            <p> Credit Point: {{$pointAgainstOrder->earned_points}} (pts)</p>
                                        @elseif($refundStatusPrevious->refund_type=="Voucher")
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
                                            @if($refundStatus)
                                                <tr>
                                                    <th>Return/Refund:</th>
                                                    <td>{{$order->currency}} {{number_format($orderGrandTotal['returnAmount'],2)}}</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="{{url(Helper::sitePrefix().'order/print-invoice/'.$order->id)}}"
                                       target="_blank" rel="noopener" class="btn btn-default">
                                        <i class="fas fa-print"></i> Print
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
