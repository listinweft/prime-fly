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
                            <li class="breadcrumb-item active">{{$type}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('message') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('message') }}
                            </div>
                        @endif
                       <!-- @if($type == 'Category')
                         @include('Admin.includes.heading_form2',['type'=>'category'])
                        @endif -->
                        <div class="card card-success card-outline">
                            <div class="card-header">
                               
                                    <a href="{{url(Helper::sitePrefix().$urlType.'/create')}}"
                                       class="btn btn-success pull-right">Create Location  <i
                                            class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                                    </a>
                               
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Code</th>
                                        @if($type=="Sub Category")
                                            <th>Category</th>
                                        @endif
                                        <!-- <th>Sort Order</th> -->

                                        <th>Gallery</th>
                                        <th>Status</th>

                                    
                                        <!-- <th>Display to home</th> -->
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categoryList as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->code }}</td>
                                            @if($type=="Sub Category")
                                                <td>{{$category->parent->title}}</td>
                                            @endif

                                            <td><a href="{{url(Helper::sitePrefix().'location/gallery/'.$category->id)}}"
                                                   class="btn btn-sm btn-primary mr-2 tooltips" title="Add Gallery">Gallery</a>
                                            </td>
                                            <!-- <td>
                                                <input type="text" name="gallery_order"
                                                       id="gallery_order_{{$loop->iteration}}"
                                                       data-table="Category" data-id="{{ $category->id }}"


                                                       class="common_sort_order" style="width:25%"
                                                       value="{{$category->sort_order}}">
                                            </td> -->
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="Location"
                                                           data-field="status" data-pk="{{ $category->id}}"
                                                        {{($category->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>

                                            <!-- <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="bool_status"
                                                           data-url='change-bool-status' data-table="Category"
                                                           data-id="{{$category->id}}" data-field="display_to_home"
                                                        {{($category->display_to_home == "Yes")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td> -->
                                            <td>{{ date("d-M-Y", strtotime($category->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().$urlType.'/edit/'.$category->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit {{$type}}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       data-url="{{$urlType}}/delete"
                                                       data-id="{{$category->id}}"
                                                       title="Delete {{$type}}"><i class="fas fa-trash"></i></a>
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
