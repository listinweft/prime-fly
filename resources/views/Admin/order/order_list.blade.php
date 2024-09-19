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
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Service</th>
                                        <th>Customer</th>
                                        <th>Customer phone Number</th>
                                        
                                        <th>Credit Bill status</th>
                                        @if($admintype->role == "Super Admin")
                                        <th> Service Price</th>
                                        @endif
                                        <th>Service Date</th> <!-- Display service date -->
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderList as $order)
                                        @foreach($order->orderProducts as $product)
                                            @php
                                                // Calculate the total for this product
                                                $productTotal = $product->total;
                                                $productTotalWithTax = $productTotal * 1.18; // Adding 18% tax
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->parent->iteration . '.' . $loop->iteration }}</td> <!-- Unique identifier -->
                                                <td>{{ 'Primefly#'.$order->order_code }}</td>

                                                @php

                                                $package = App\Models\Product::where('id', $product->product_id)->first();

                                                $category = App\Models\Category::where('id', $package->category_id)->first();
                                                @endphp


                                                <td>{{ $category->title }}</td>

                                               
                                                
                                                <!-- Display customer name based on user type -->
                                                @if(@$order->orderCustomer->user_type == "User")
                                                    <td>{{ $order->orderCustomer->CustomerData->first_name.' '.$order->orderCustomer->CustomerData->last_name }}</td>
                                                @else
                                                    @if (@$order->orderCustomer->billingAddress)
                                                        <td>{{ $order->orderCustomer->billingAddress->first_name. ' '.$order->orderCustomer->billingAddress->last_name}}</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                @endif

                                                <td>{{ $order->orderCustomer->CustomerData->user->phone }}</td>


                                                <td>
                                                @php
                                                    $btype =  $order->orderCustomer->CustomerData->user->btype;
                                                @endphp

                                                @if($btype == "b2b")
                                                    <label class="switch">
                                                        <input type="checkbox" class="status_check"
                                                               data-url="/status-change-cod" data-table="Order"
                                                               data-field="payment_method" data-pk="{{ $order->id }}"
                                                            {{( $order->payment_method == "COD") ? 'checked' : ''}}>
                                                        <span class="slider"></span>
                                                    </label>
                                                @endif
                                                </td>

                                             
                                                @if($admintype->role == "Super Admin")
                                                    <td>{{ number_format($productTotalWithTax, 2).' '.$order->currency }}</td>
                                                @endif

                                                <!-- Display service date of the current product -->
                                                <td>{{ date("d-M-Y", strtotime($product->exit_date)) }}</td>

                                                <td class="text-right py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <!-- Action buttons -->
                                                        <a href="{{url(Helper::sitePrefix().'order/view/'.$order->id)}}"
                                                           class="btn btn-primary mr-2 tooltips" title="View Order"><i
                                                                class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
@endsection
