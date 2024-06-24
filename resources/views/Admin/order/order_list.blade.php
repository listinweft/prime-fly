@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Booking</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Order List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="card card-success card-outline">
                            <!-- <div class="card-header">
                                <a href="{{url(Helper::sitePrefix().'order/create')}}" class="btn btn-success pull-right">Add
                                    Order <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                            </div> -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Customer</th>
                                        <th>Total</th>
                                        <th>Tax</th>
                                       
                                        <th>Order Total</th>
                                      
                                        <th>Payment Method</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderList as $order)
                                        @if($order->orderProducts!=NULL)
                                            @php
                                                $productTotal = App\Models\Order::getProductTotal($order->id);
                                                $orderTotal = App\Models\Order::getOrderTotal($order->id);
                                                $cancelledTotal = App\Models\Order::getCancelledProductTotal($order->id);
                                                $total = $cancelledTotal['total']-$cancelledTotal['couponCharge'];
                                                $returnAmount = $total+$cancelledTotal['taxAmount']+$cancelledTotal['shippingCharge']+$cancelledTotal['otherCouponCharge'];
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ 'SPEEDWINGS#'.$order->order_code }}</td>
                                                @if(@$order->orderCustomer->user_type=="User")
                                                    <td>{{ $order->orderCustomer->CustomerData->first_name.' '.$order->orderCustomer->CustomerData->last_name }}</td>
                                                @else
                                                @if (@$order->orderCustomer->billingAddress)
                                                    
                                                <td>{{ $order->orderCustomer->billingAddress->first_name. ' '.$order->orderCustomer->billingAddress->last_name}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @endif
                                                <td>{{ number_format($productTotal,2) }}</td>
                                                <td>{{ $order->tax_amount }}</td>
                                               
                                                <td>{{ number_format($orderTotal,2).' '.$order->currency }}</td>
                                                
                                                <td>{{ $order->payment_method }}</td>
                                                <td>{{ date("d-M-Y", strtotime($order->created_at))  }}</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                       
                                                        <a href="{{url(Helper::sitePrefix().'order/view/'.$order->id)}}"
                                                           class="btn btn-primary mr-2 tooltips" title="View Order"><i
                                                                class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="order-product-modal">
        <div class="modal-dialog modal-lg" id="order-product-modal-content">
        </div>
    </div>
    <div class="modal fade" id="refund-splitup-modal">
        <div class="modal-dialog" id="refund-splitup-modal-content">
        </div>
    </div>
@endsection
