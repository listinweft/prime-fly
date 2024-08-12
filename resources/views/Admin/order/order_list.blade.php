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
                                        <th>Credit Bill status</th>
                                        <th>Order Total</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderList as $order)
                                        @if($order->orderProducts->count() > 0)
                                            @php
                                                // Calculate total from OrderProduct model
                                                $productTotal = $order->orderProducts->sum('total'); // Sum of 'total' field from order_products
                                                $productTotalWithTax = $productTotal * 1.18; // Adding 18% to order total
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ 'Primefly#'.$order->order_code }}</td>
                                                @if(@$order->orderCustomer->user_type=="User")
                                                    <!-- Display customer name based on user type -->
                                                    <td>{{ $order->orderCustomer->CustomerData->first_name.' '.$order->orderCustomer->CustomerData->last_name }}</td>
                                                @else
                                                    <!-- Display billing address if available -->
                                                    @if (@$order->orderCustomer->billingAddress)
                                                        <td>{{ $order->orderCustomer->billingAddress->first_name. ' '.$order->orderCustomer->billingAddress->last_name}}</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                @endif

                                                <td>

                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change-cod" data-table="Order"
                                                           data-field="payment_method" data-pk="{{ $order->id }}"
                                                        {{( $order->payment_method=="COD")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
</td>
                                                <td>{{ number_format($productTotalWithTax, 2).' '.$order->currency }}</td>
                                                <td>{{ date("d-M-Y", strtotime($order->created_at)) }}</td>
                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <!-- Action buttons -->
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
