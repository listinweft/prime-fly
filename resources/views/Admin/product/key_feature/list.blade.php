@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Product Key Feature</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'product')}}">Products</a>
                            </li>
                            <li class="breadcrumb-item active">Product Key Feature</li>
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
                                <a href="{{url(Helper::sitePrefix().'product/key-feature/create/'.$product_id)}}"
                                   class="btn btn-success pull-right">Add Product Key Feature <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productKeyFeatureList as $feature)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                               {{$feature->title}}
                                            </td>
{{--                                            <td>--}}
{{--                                                <input type="text" name="gallery_order"--}}
{{--                                                       id="gallery_order_{{$loop->iteration}}"--}}
{{--                                                       data-table="ProductKeyFeature" data-id="{{ $feature->id }}"--}}
{{--                                                       data-field="product_id"--}}
{{--                                                       data-field-value="{{ $feature->product_id }}"--}}
{{--                                                       class="common_sort_order" style="width:25%"--}}
{{--                                                       value="{{$feature->sort_order}}">--}}
{{--                                            </td>--}}
                                            <td>
                                                <input type="text" name="sort_order"
                                                       id="sort_order_{{$loop->iteration}}" data-field="product_id"
                                                       data-field-value="{{$feature->product_id}}" data-table="ProductKeyFeature"
                                                       data-id="{{ $feature->id }}" class="common_sort_order"
                                                       style="width:25%"
                                                       value="{{$feature->sort_order}}" maxlength="3">
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="ProductKeyFeature"
                                                           data-field="status" data-pk="{{ $feature->id}}"
                                                        {{($feature->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>{{ date("d-M-Y", strtotime($feature->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'product/key-feature/edit/'.$feature->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit Key Feature"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       title="Delete Key Feature" data-url="product/key-feature/delete"
                                                       data-id="{{$feature->id}}"><i class="fas fa-trash"></i></a>
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
