@extends('Admin.layouts.main')

@section('content')
<style>
    table {
        border-spacing: 0;
        width: 100%;
        border: 0;
    }
    td {
        border: 0;
        vertical-align: top;
    }
    tr {
        border: 0;
    }
    p, h4, h5, h3, h2, h1 {
        margin-bottom: 0;
        margin-top: 0;
    }
    .invoice-container {
        margin-bottom: 60px;
        font-family: sans-serif;
        background-color: #fff;
    }
    .invoice-header {
        margin-bottom: 20px;
    }
    .invoice-footer {
        margin-top: 20px;
        text-align: center;
    }
    .print-btn {
        margin: 20px 0;
        display: block;
        text-align: center;
    }
</style>
<div class="content-wrapper">
    <section class="content-header" style="padding-top: 20px">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> View Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url(Helper::sitePrefix().'dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url(Helper::sitePrefix().'order') }}">Orders</a>
                        </li>
                        <li class="breadcrumb-item active">Order View - {{ 'CFF#' . $order->order_code }}</li>

                        @php
                        $personaladdress = App\Models\PersonalDetails::where('order_id', $order->id)->first();

                        @endphp


               


                    </ol>
                </div>
            </div>
        </div>
    </section>
    @php 

$admintype = Auth::guard('admin')->user()->admin;

@endphp
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary print-btn" onclick="window.print()">Print</button>

                    <div class="invoice-container">
                        <table style="width: 100%;">
                            <tr>
                                <td style="padding: 20px 35px">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="vertical-align: bottom;">
                                                <h4 style="color: #707070; font-size: 17px; font-weight: 700; text-transform: uppercase; margin-bottom: 10px">Invoice {{ $order->order_code }}</h4>
                                            </td>
                                            <td style="text-align: right; vertical-align: bottom;">
                                                <img style="width: 110px; margin-bottom: 10px" src="https://demo.wefttechnologies.com/primefly/public/frontend/img/logo-blue.png"/>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="width: 33%; border: 1px solid #D7DAE0; border-left: 0; padding: 20px; padding-left: 0; border-right: 0;">
                                                <h4 style="color: #1A1C21; font-size: 14px; font-weight: 700; margin-bottom: 10px">Issued</h4>
                                                <h5 style="color: #5E6470; font-size: 13px">{{ date('F, d Y', strtotime($order->created_at)) }}</h5>
                                            </td>

                                            @if(!empty($personaladdress->gst_number))

                                            <td style="width: 33%; border: 1px solid #D7DAE0; border-left: 0; padding: 20px; padding-left: 0; border-right: 0;">
                                                <h4 style="color: #1A1C21; font-size: 14px; font-weight: 700; margin-bottom: 10px">GST  Number</h4>
                                                <h5 style="color: #5E6470; font-size: 13px">{{  $personaladdress->gst_number  }}</h5>
                                            </td>

                                            @endif
                                           



                                            <td style="width: 33%; border: 1px solid #D7DAE0; border-left: 0; border-right: 0; padding: 20px;">
                                                <p style="color: #5E6470; font-size: 13px; line-height: 1.4">
                                                    @if($order->orderCustomer)
                                                        {{ $order->orderCustomer->first_name . ' ' . $order->orderCustomer->last_name }}
                                                        <br>
                                                        {{ $order->orderCustomer->email }}
                                                        <br>
                                                        {{ $order->orderCustomer->phone }}
                                                    @endif
                                                </p>
                                            </td>
                                            <td style="width: 33%; border: 1px solid #D7DAE0; border-right: 0; border-left: 0; padding: 20px; padding-right: 0">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 0; border-bottom: 1px solid #D7DAE0;">
                                    <table>
                                        <tr>
                                            <td style="width: 75%; padding: 10px 0;">
                                                <h3 style="color: #1A1C21; font-size: 14px; font-weight: 700;">Bookings</h3>
                                            </td>
                                            @if($admintype->role == "Super Admin")
                                            <td style="width: 25%; text-align: right;">
                                                <h4 style="color: #707070; font-size: 14px; font-weight: 700;">SUBTOTAL</h4>
                                            </td>
                                            @endif
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 1px solid #D7DAE0;">
                                    <table>
                                        @php
                                        $shoppingTotal = [];
                                        @endphp
                                        @foreach($order->orderProducts as $product)
                                        @php
                                        $package = App\Models\Product::where('id', $product->product_id)->first();
                                        $category = App\Models\Category::where('id', $package->category_id)->first();
                                        $product_category = $category->title;
                                        $shoppingTotal[] = $product->total;
                                        @endphp
                                        <tr>
                                            <td style="width: 5%; padding: 10px 0;">
                                                <h3 style="color: #151525; font-size: 14px;">{{ $loop->iteration }}</h3>
                                            </td>
                                            <td style="width: 40%; padding: 10px 0;">
                                                <h3 style="color: #151525; font-size: 14px; font-weight: 700; margin-bottom: 5px;">{{ $category->title }}</h3>
                                                <h4 style="color: #707070; font-size: 12px;">Package: {{ $product->productData->title }}</h4>
                                                <h4 style="color: #707070; font-size: 12px;">{{ ucfirst($product->travel_sector) }}</h4>
                                                @if(!is_null($product->travel_type) && $product->travel_type !== '')
                                                <h4 style="color: #707070; font-size: 12px;">Service Offered: {{ ucfirst($product->travel_type) }}</h4>
                                                @endif
                                                @if($product->travel_type == 'departure')
                                                <h4 style="color: #707070; font-size: 12px;">Service Airport: {{ $product->origin }}</h4>

                                                @elseif($product->travel_type == 'Transit')

                                                <h4 style="color:#707070;font-size:11px; ">Service Airport:{{$product->trans}}</h4>

                                                @else
                                                <h4 style="color: #707070; font-size: 12px;">Service Airport: {{ $product->destination }}</h4>
                                                @endif
                                                @if($product->origin)
                                                <h4 style="color: #707070; font-size: 12px;">Origin: {{ $product->origin }}</h4>
                                                @endif
                                                @if($product->destination)
                                                <h4 style="color: #707070; font-size: 12px;">Destination: {{ $product->destination }}</h4>
                                                @endif
                                                @if($product->porter_count > 0 && $product_category == 'Porter')
                                                <h4 style="color: #707070; font-size: 12px;">Porter Count: {{ $product->porter_count }}</h4>
                                                @endif
                                                @if($product->guest > 0 && in_array($product_category, ['Meet and Greet', 'Airport Entry', 'Lounge Booking']))
                                                <h4 style="color: #707070; font-size: 12px;">Guest Count: {{ $product->guest }}</h4>
                                                @endif
                                                @if($product->bag > 0 && $product_category == 'Baggage Wrapping')
                                                <h4 style="color: #707070; font-size: 12px;">Bag Count: {{ $product->bag }}</h4>
                                                @endif
                                                @if($product->flight_number)
                                                <h4 style="color: #707070; font-size: 12px;">Flight Number: {{ $product->flight_number }}</h4>
                                                @endif
                                                @if($product->flight_date)
                                                <h4 style="color: #707070; font-size: 12px;">Flight Date: {{ date('Y-m-d', strtotime($product->flight_date)) }}</h4>
                                                @endif
                                            </td>
                                            @if($admintype->role == "Super Admin")
                                            <td style="width: 35%; padding: 10px 0; text-align: right;">
                                                <h3 style="color: #151525; font-size: 14px; font-weight: 700;">₹{{ number_format($product->total, 2) }}</h3>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 0;">

                                @php 

                                $admintype = Auth::guard('admin')->user()->admin;

                                @endphp

                                @if($admintype->role == "Super Admin")
                                    <table>
                                    @php
    $subtotal = array_sum($shoppingTotal); // Total amount before taxes
    $sgst = $subtotal * 0.09; // SGST 9%
    $cgst = $subtotal * 0.09; // CGST 9%
    $totalWithGST = $subtotal + $sgst + $cgst; // Total with SGST and CGST
    $finalAmount = $totalWithGST * 1.18; // Final amount with additional 18% GST
@endphp

<tr>
    <td style="width: 75%; padding: 10px 0;">
        <h3 style="color: #1A1C21; font-size: 14px; font-weight: 700;">Subtotal</h3>
    </td>
    <td style="width: 25%; padding: 10px 0; text-align: right;">
        <h3 style="color: #1A1C21; font-size: 14px; font-weight: 700;">₹{{ number_format($subtotal - ($subtotal * 0.09) - ($subtotal * 0.09), 2) }}</h3>
       
    </td>
</tr>
<tr>
    <td style="width: 75%; padding: 10px 0;">
        <h3 style="color: #1A1C21; font-size: 14px; font-weight: 700;">SGST 9%</h3>
    </td>
    <td style="width: 25%; padding: 10px 0; text-align: right;">
        <h3 style="color: #1A1C21; font-size: 14px; font-weight: 700;">₹{{ number_format($sgst, 2) }}</h3>
    </td>
</tr>
<tr>
    <td style="width: 75%; padding: 10px 0;">
        <h3 style="color: #1A1C21; font-size: 14px; font-weight: 700;">CGST 9%</h3>
    </td>
    <td style="width: 25%; padding: 10px 0; text-align: right;">
        <h3 style="color: #1A1C21; font-size: 14px; font-weight: 700;">₹{{ number_format($cgst, 2) }}</h3>
    </td>
</tr>
<tr>
    <td style="width: 75%; padding: 10px 0;">
        <h3 style="color: #1A1C21; font-size: 14px; font-weight: 700;">Total Amount</h3>
    </td>
    <td style="width: 25%; padding: 10px 0; text-align: right;">
        <h3 style="color: #1A1C21; font-size: 14px; font-weight: 700;">₹ {{ number_format($subtotal, 2) }}</h3>
    </td>
</tr>


                                    </table>

                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
