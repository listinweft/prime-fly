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
                                <a href="{{ url(Helper::sitePrefix().'dashboard') }}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ url(Helper::sitePrefix().'order') }}">Bookings</a></li>
                            <li class="breadcrumb-item active">Booking View - {{ 'PP'.$order->order_code }}</li>
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
                                            {{ @$orderDetails->shippingAddress->first_name .' '. @$orderDetails->shippingAddress->last_name }}
                                        @endif
                                        <small class="float-right">Date: {{ date("F, d Y", strtotime($order->created_at)) }}</small>
                                    </h4>
                                </div>
                            </div>

                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice {{ 'PP#'.$order->order_code }}</b><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped order-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Service</th>
                                                <th>Package</th>
                                                <th>Flight Number</th>
                                                <th>Origin</th>
                                                <th>Destination</th>
                                                <th>Transit</th>
                                                <th>Travel Type</th>
                                                <th>Porter count</th>
                                                <th>Guest</th>
                                                <th>Bag count</th>
                                                <th>Adults</th>
                                                <th>Infants</th>
                                                <th>Children</th>
                                                <th>Cost</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $shoppingTotal = [];
                                                $refundStatus = $refundStatusPrevious = null;
                                                $orderGrandTotal = 0; // Initialize grand total
                                            @endphp
                                            @foreach($order->orderProducts as $product)
                                                @php
                                                    $package = App\Models\Product::where('id', $product->product_id)->first();
                                                    $category = App\Models\Category::where('id', $package->category_id)->first();
                                                    $product_category = $category->title;
                                                    
                                                    $shoppingTotal[] = $product->total;
                                                    $orderStatus = App\Models\OrderLog::where('order_product_id', '=', $product->id)->orderBy('created_at', 'DESC')->first();
                                                    $orderStatusPrevious = App\Models\OrderLog::where('order_product_id', $product->id)->orderBy('id', 'DESC')->skip(1)->take(1)->first();
                                                    if ($orderStatus->status == 'Refunded') {
                                                        $refundStatus = $orderStatus;
                                                        $refundStatusPrevious = $orderStatusPrevious;
                                                    }
                                                    
                                                    $orderGrandTotal += $product->total; // Calculate grand total
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $category->title }}</td>
                                                    <td>{{ $product->productData->title }}</td>
                                                    <td>{{ $product->flight_number }}</td>
                                                    <td>{{ $product->origin }}</td>
                                                    <td>{{ $product->destination }}</td>
                                                    <td>{{ $product->trans }}</td>
                                                    <td>{{ $product->travel_type }}</td>
                                                    @if ($product->porter_count > 0 && $product_category == 'Porter')
                                                        <td>{{ $product->porter_count }}</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($product->guest > 0 && in_array($product_category, ['Meet and Greet', 'Airport Entry', 'Lounge Booking']))
                                                        <td>{{ $product->guest }}</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    @if ($product->guest > 0 && in_array($product_category, ['Car Parking', 'Cloak Room', 'Baggage Wrapping']))
                                                        <td>{{ $product->guest }}</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    <td>{{ $product->adults }}</td>
                                                    <td>{{ $product->infants }}</td>
                                                    <td>{{ $product->children }}</td>
                                                    <td>{{ $order->currency }} {{ $product->cost }}</td>
                                                    <td>
                                                        <select name="status" id="orderStatus" class="form-control" style="min-width: 130px;"
                                                                data-id="{{ $product->id }}" data-order_id="{{ $order->id }}"
                                                                data-coupon_min="{{ $order->getMaxCouponsMinimumSpend() }}"
                                                                data-order_total="{{ $orderGrandTotal }}"
                                                                data-price="{{ $product->total }}"
                                                                data-all_product_statuses="{{ implode(',', array_unique($order->orderLogs->pluck(['status'])->toArray())) }}">
                                                            @foreach(['Pending' => 'Pending', 'Processing' => 'Processing', 'On Hold' => 'On Hold', 'Cancelled' => 'Cancelled',  'Completed' => 'Completed', 'Refunded' => 'Refunded', 'Failed' => 'Failed'] as $statusKey => $status)
                                                                <option value="{{ $statusKey }}"
                                                                        {{ old("status", @$orderStatus->status) == $statusKey ? "selected" : "" }}>
                                                                    {{ $status }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>{{ $order->currency }}
                                                        @if (count($order->orderProducts) == 1)
                                                            @if ($order->orderCoupons != null)
                                                                {{ $product->total - $order->orderCoupons->sum('coupon_value') }}
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
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Subtotal:</td>
                                                    <td>{{ $order->currency }} {{ number_format($orderGrandTotal, 2) }}</td>
                                                </tr>
                                                @php
                                                    $subtotal = $orderGrandTotal;
                                                    $sgst = $subtotal * 0.09;
                                                    $cgst = $subtotal * 0.09;
                                                    $totalWithTax = $subtotal + $sgst + $cgst;
                                                @endphp
                                                <tr>
                                                    <td>SGST (9%):</td>
                                                    <td>{{ $order->currency }} {{ number_format($sgst, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>CGST (9%):</td>
                                                    <td>{{ $order->currency }} {{ number_format($cgst, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total:</td>
                                                    <td>{{ $order->currency }} {{ number_format($totalWithTax, 2) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="{{ url(Helper::sitePrefix().'order/print-invoice/'.$order->id) }}"
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
@endsection
