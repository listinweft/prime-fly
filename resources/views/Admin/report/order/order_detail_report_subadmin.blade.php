@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i>Detailed Booking Report </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Detailed Booking Report </li>
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
                                <form method="POST" id="order-detail-filter-form" role="form">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control daterange" name="date_range"
                                                       id="date_range" data-inputmask-alias="datetime"
                                                       data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                       inputmode="numeric">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control seelct2" id="order_report_status"
                                                    name="order_report_status">
                                                <option value="">Select Status</option>
                                                @foreach(['Pending','Processing','On Hold','Cancelled','Packed','Shipped','Out for Delivery','Delivered','Completed','Returned','Refunded','Failed'] AS $status)
                                                    <option value="{{ $status }}"
                                                        {{ (old("order_report_status") == $status)? "selected" : "" }}>
                                                        {{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control select2" id="order_report_customer"
                                                    name="order_report_customer">
                                                <option value="">Select Customer</option>
                                                @foreach($customerList as $customer)
                                                    <option
                                                        value="{{$customer->id}}">{{$customer->first_name.' '.$customer->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control select2" id="order_report_category" name="order_report_category">
    <option value="">Select Service</option>
    @foreach($categoryList as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
    @endforeach
</select>

                                        </div>
                                        <div class="col-sm-2">
    <select class="form-control select2" id="order_report_location" name="order_report_location">
        <option value="">Select Location</option>
        <!-- Locations will be dynamically populated here -->
    </select>
    <span id="location-error" class="text-danger" style="display:none;">Please select a location.</span>
</div>

<div class="col-sm-2">
    <select class="form-control select2" id="order_report_product" name="order_report_product">
        <option value="">Select Product</option>
        <!-- @foreach($productList as $product)
            <option value="{{$product->id}}">{{$product->title}}-{{$product->sector}}</option>
        @endforeach -->
    </select>
    <span id="product-error" class="text-danger" style="display:none;">Please select a product.</span>
</div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-primary" id="order-subdetail-search-result">Search
                                            </button>
                                           <button class="btn btn-danger" id="clear-search-result" onclick="window.location.href='{{ route('admin.report.detail-report-subadmin') }}'" disabled>Clear</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <a href="{{ url(Helper::sitePrefix().'report/export') }}" class="btn btn-primary"
                                       style="margin-bottom: 10px;float: right;">Export Result &nbsp&nbsp<i
                                            class="fa fa-file-excel-o"></i></a>
                                </div>
                                <div class="card-body" id="filter--result">
                                    @include('Admin/report/order/box_values_subadmin')
                                    <div class="records--list-report" style="overflow-x: scroll;">
                                        @include('Admin.report.order.detail_report_excel_subadmin')
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center pagination-wrapper">
                                    {!! $orderList->links() !!}
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .card-outline .pagination-wrapper svg {
            width: 30px;
        }

        .card-outline .pagination-wrapper .flex-1 {
            display: none;
        }
    </style>
    <script>
$(document).ready(function () {
    $('#order_report_category').change(function () {
        var categoryId = $(this).val();
        
        // Clear product and location dropdowns when a new category is selected
        $('#order_report_location').empty().append('<option value="">Select Location</option>');
        $('#order_report_product').empty().append('<option value="">Select Product</option>');
        $('#location-error').hide();
        $('#product-error').hide();

        if (categoryId) {
            $.ajax({
                url: '{{ route("get.locations.by.category.sub") }}',
                type: 'GET',
                data: { category_id: categoryId },
                success: function (response) {
                    var locationSelect = $('#order_report_location');
                    
                    // Populate locations from the response
                    $.each(response.locations, function (index, location) {
                        locationSelect.append('<option value="' + location.id + '">' + location.title + '</option>');
                    });

                    // Trigger product update when a location is selected
                    locationSelect.change(function () {
                        var locationId = $(this).val();

                        // Clear product dropdown when a new location is selected
                        $('#order_report_product').empty().append('<option value="">Select Product</option>');
                        $('#product-error').hide();

                        if (locationId) {
                            $.ajax({
                                url: '{{ route("get.products.by.location") }}',
                                type: 'GET',
                                data: { location_id: locationId },
                                success: function (productResponse) {
                                    var productSelect = $('#order_report_product');

                                    // Populate products from the response
                                                            $.each(productResponse.products, function (index, product) {
                            productSelect.append('<option value="' + product.id + '">' + product.title + ' - ' + product.sector + '</option>');
                        });

                                }
                            });
                        }
                    });
                }
            });
        }
    });


   
});
</script>

@endsection
