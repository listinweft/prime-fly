@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Home Banner</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Banner</li>
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
                                <a href="{{url(Helper::sitePrefix().'home-ecommerce/banner/create')}}"
                                   class="btn btn-success pull-right">Add
                                    Banner <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Desktop Image</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bannerList as $banner)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{asset($banner->desktop_image)}}"
                                                     style="width: 20%;height: 20%">
                                            </td>                                            <td>
                                                <input type="text" name="banner_order"
                                                       id="banner_order_{{$loop->iteration}}"
                                                       data-table="HomeBanner" data-id="{{ $banner->id }}"
                                                       class="common_sort_order" style="width:25%"
                                                       value="{{$banner->sort_order}}">
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="HomeBanner"
                                                           data-field="status" data-pk="{{ $banner->id}}"
                                                        {{($banner->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>{{ date("d-M-Y", strtotime($banner->created_at)) }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'home-ecommerce/banner/edit/'.$banner->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit Banner"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       title="Delete Banner" data-url="home-ecommerce/banner/delete"
                                                       data-id="{{$banner->id}}"><i class="fas fa-trash"></i></a>
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
