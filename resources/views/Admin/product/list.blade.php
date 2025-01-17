@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Product List</li>
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
                            <div class="card-header">
                                <a href="{{url(Helper::sitePrefix().'product/create')}}"
                                   class="btn btn-success pull-right">Add Product <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                                <a href="{{url(Helper::sitePrefix().'product/export')}}"
                                   class="btn btn-primary pull-right mr-3">Export <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                        <th>Gallery</th>
                                        <th>Offer</th>
                                        <th>Status</th>
                                        <th>Most Relevent</th>
                                        <th>Latest</th>
                                        <th>Popular</th>
                                        {{-- <th >Display to Home</th> --}}
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productList as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>  
                                                @if($product->parent_product_id == null)
                                                   <strong> {{ $product->title }}</strong>
                                                @else
                                                    <span class="ml-3">{{ $product->title }}</span>
                                                @endif
                                                {{-- {{ $product->title }}</td> --}}
                                                <td>
                                                    {{ $product->productType->title}}
                                                </td>
                                                <td>
                                                @foreach($product->product_categories as $product_category)
                                                    {{ $product_category->title }}
                                                    {{ !$loop->last ? ',': ''}}
                                                @endforeach
                                            </td>


                                         
                                            <td><a href="{{url(Helper::sitePrefix().'product/gallery/'.$product->id)}}"
                                                   class="btn btn-sm btn-primary mr-2 tooltips" title="Add Gallery">Gallery</a>
                                            </td>
                                            <td><a href="{{url(Helper::sitePrefix().'product/offer/'.$product->id)}}"
                                                   class="btn btn-sm btn-warning mr-2 tooltips"
                                                   title="Add Offer">Offer</a></td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="Product"
                                                           data-field="status" data-pk="{{ $product->id}}"
                                                        {{($product->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="bool_status"
                                                           data-url='change-bool-status' data-table="Product"
                                                           data-id="{{$product->id}}" data-field="is_featured"
                                                        {{($product->is_featured == "Yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="bool_status"
                                                           data-url='change-bool-status' data-table="Product"
                                                           data-id="{{$product->id}}" data-field="new_arrival"
                                                        {{($product->new_arrival == "Yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="bool_status"
                                                           data-url='change-bool-status' data-table="Product"
                                                           data-id="{{$product->id}}" data-field="best_seller"
                                                        {{($product->best_seller == "Yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                           
                                            <td>{{ date("d-M-Y", strtotime($product->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'product/edit/'.$product->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit Product"><i
                                                            class="fas fa-edit"></i></a>
                                                            
                                                    <a href="{{url(Helper::sitePrefix().'product/copy/'.$product->id)}}"
                                                       class="btn btn-primary mr-2 product_replica tooltips"
                                                       data-id="{{$product->id}}" title="Copy this product"><i
                                                            class="fas fa-copy"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       data-url="product/delete" data-id="{{$product->id}}"
                                                       title="Delete Product"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
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
