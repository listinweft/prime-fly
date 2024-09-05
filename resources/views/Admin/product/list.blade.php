@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Services</h1>
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
                                <a href="{{url(Helper::sitePrefix().'service/create')}}"
                                   class="btn btn-success pull-right">Add service <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                                <!-- <a href="{{url(Helper::sitePrefix().'product/export')}}"
                                   class="btn btn-primary pull-right mr-3">Export <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a> -->
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>Service</th>
                                        <th>Locations</th>
                                        <th>Package</th>
                                        <th>Travel Sector</th>
                                     
                                      
                                        <th>B2b</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productList as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ implode(', ', $product->category_titles) }}</td>
                                            <td>{{ implode(', ', $product->location_titles) }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ ucwords(str_replace('_', ' ', $product->sector)) }}</td>

                                            
                                            <td><a href="{{url(Helper::sitePrefix().'product/offer/'.$product->id)}}"
                                                   class="btn btn-sm btn-warning warning  warning-btntext  mr-2 tooltips"
                                                   title="Add B2b-Price">Price</a></td>
                                           
                                           <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="Service"
                                                           data-field="status" data-pk="{{ $product->id}}"
                                                        {{($product->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                           
                                          
                                            
                                            <td>{{ date("d-M-Y", strtotime($product->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'service/edit/'.$product->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit Product">
                                                       <i class="fas fa-edit"></i></a>
                                                   
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       data-url="service/delete" data-id="{{$product->id}}"
                                                       title="Delete Service"><i class="fas fa-trash"></i></a>
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
