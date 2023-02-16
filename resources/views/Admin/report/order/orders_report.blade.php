@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{$title}} </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                @include('Admin/report/order/box_values')
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
                                        <th>Order Code</th>
                                        <th>Customer</th>
                                        <th>No of Items</th>
                                        <th>Payment Method</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderList as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{url(Helper::sitePrefix().'order/view/'.$order['order']->id)}}">{{ 'PP'.$order['order']->order_code}}</a>
                                            </td>
                                            @if($order['order']->orderCustomer->user_type=="User")
                                                <td>{{ $order['order']->orderCustomer->CustomerData->first_name.' '.$order['order']->orderCustomer->CustomerData->last_name }}</td>
                                            @else
                                                <td>{{ $order['order']->orderCustomer->billingAddress->first_name.' '.$order['order']->orderCustomer->billingAddress->last_name}}</td>
                                            @endif
                                            <td>{{ $order['OrderProducts'] }}</td>
                                            <td>{{ $order['order']->payment_method }}</td>
                                            <td>{{ $order['order']->currency.' '.$order['total_price'] }}</td>
                                            <td>{{ date("d-M-Y", strtotime($order['order']->created_at))  }}</td>
                                        </tr>
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
