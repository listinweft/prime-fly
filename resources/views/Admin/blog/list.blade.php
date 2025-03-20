@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Blog</li>
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
                        @include('Admin.includes._heading_form',['type'=>'blog'])
                        <div class="card card-success card-outline">

                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Basic Information</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('error') }}
                                </div>
                            @endif   -->
                            <div class="row">
                                <div class="col-lg-8 content-leftbar">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mb-4">
                                            <label> Title*</label>
                                            <input type="text" name="title" id="title" placeholder="Title"
                                                class="form-control for_canonical_url required" autocomplete="off"
                                                value="{{ @$blog->title }}">
                                            <div class="help-block with-errors" id="title_error"></div>
                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 mb-4">
                                            <label for="description">Description*</label>
                                            <textarea class="form-control tinyeditor required reset" id="description"
                                                    name="description">{!! isset($blog)?$blog->description:'' !!}</textarea>
                                            <div class="help-block with-errors" id="description_error"></div>
                                        </div>
                                       
                                    </div>
                                </div>
                              
                                   

                                      
                                       
                                <!-- <div class="form-group col-md-12 mb-4">
                                            <label>Mobile Image*</label>
                                            <div class="file-loading">
                                                <input id="mobile_banner" name="mobile_banner" type="file">
                                            </div>
                                            <span class="caption_note">Note: Image dimension must be 1162 x 505 PX and Size must be less than 512 KB</span>
                                            @error('mobile_banner')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                       
                                        
                                    </div>
                                </div> -->

                                
                            </div>  

                              
                        </div>
                                
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Clear</button>
                            <img class="animation__shake loadingImg" src="{{asset('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                    </div>
                </form>
                            <div class="card-header">
                                <a href="{{url(Helper::sitePrefix().'blog/create')}}"
                                   class="btn btn-success pull-right">Add Blog <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Posted Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogList as $blog)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->author }}</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="Blog"
                                                           data-field="status" data-pk="{{ $blog->id}}"
                                                        {{($blog->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td>{{ date("d-M-Y", strtotime($blog->posted_date))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'blog/edit/'.$blog->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit Blog"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       title="Delete Blog" data-url="blog/delete"
                                                       data-id="{{$blog->id}}"><i class="fas fa-trash"></i></a>
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
