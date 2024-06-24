@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    @if($type == "Sub Category")

                    <h1><i class="nav-icon fas fa-user-shield"></i>How It Works LIst</h1>

                    @else
                        <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}}</h1>
                  @endif
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            @if($type == "Sub Category")
                            <li class="breadcrumb-item active">How it Works List</li>
                            @else

                            <li class="breadcrumb-item active">{{$type}}</li>

                            @endif
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
                      
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                @if($type=="Category")
                                    <a href="{{url(Helper::sitePrefix().'product/'.$urlType.'/create')}}"
                                       class="btn btn-success pull-right">Add Category <i
                                            class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                                    </a>
                                @elseif($type=="Sub Category")
                                    <a href="{{url(Helper::sitePrefix().'product/'.$urlType.'/create')}}"
                                       class="btn btn-success pull-right">Add How It Works <i
                                            class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        @if($type=="Sub Category")
                                            <th>Category</th>
                                        @endif

                                        
                                       
                                        <th>Status</th>
                                        @if($type=="Category")
                                        <th>Age Range Pricing</th>
                                        @endif

                                    
                                       
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categoryList as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->title }}</td>
                                            @if($type=="Sub Category")
                                                <td>{{$category->parent->title}}</td>
                                            @endif
                                           
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="Category"
                                                           data-field="status" data-pk="{{ $category->id}}"
                                                        {{($category->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            @if($type=="Category")
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/agerange-change" data-table="Category"
                                                           data-field="age_range" data-pk="{{ $category->id}}"
                                                        {{($category->age_range=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            @endif

                                            @if($type=="Sub Category")

                                            <td><a href="{{url(Helper::sitePrefix().'product/sub-category/gallery/'.$category->id)}}"
                                                   class="btn btn-sm btn-primary mr-2 tooltips" title="Add Gallery">Gallery</a>
                                            </td>

                                            @endif

                                          
                                            <td>{{ date("d-M-Y", strtotime($category->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'product/'.$urlType.'/edit/'.$category->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit {{$type}}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       data-url="product/{{$urlType}}/delete"
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
