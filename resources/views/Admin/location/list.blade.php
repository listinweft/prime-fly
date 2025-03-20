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

                                <div class="form-group col-md-12 mb-4">
                                            <label>Desktop  Image*</label>
                                            <div class="file-loading">
                                                <input id="image" name="image" type="file">
                                            </div>
                                            <span class="caption_note">Note: Image dimension must be 1162 x 505 PX and Size must be less than 512 KB</span>
                                            @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                       
                                        
                                    </div>
                                </div>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $("#image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileTypes: ['image'],
                // minImageWidth: 443,
                // minImageHeight: 271,
                // // maxImageWidth: 443,
                // // maxImageHeight: 271,
                //maxFileSize: 512,
                showRemove: true,
                @if(isset($blog) && $blog->image!=NULL)
                initialPreview: ["{{asset($blog->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$blog->image))}}",
                    width: "120px"
                }]
                @endif
            });
            $("#author_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileTypes: ['image'],
                // minImageWidth: 940,
                // minImageHeight: 430,
                // maxImageWidth: 940,
                // maxImageHeight: 430,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($blog) && $blog->author_image!=NULL)
                initialPreview: ["{{asset($blog->author_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$blog->author_image))}}",
                    width: "120px"
                }]
                @endif
            });

            $("#video_thumbnail").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                minImageWidth: 940,
                minImageHeight: 430,
                // maxImageWidth: 940,
                // maxImageHeight: 430,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($blog) && $blog->video_thumbnail_image!=NULL)
                initialPreview: ["{{asset($blog->video_thumbnail_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ last(explode('/',$blog->video_thumbnail_image))}}",
                    width: "120px"
                }]
                @endif
            });

            $("#desktop_banner").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                minImageWidth: 1000,
                minImageHeight: 500,
                // maxImageWidth: 1920,
                // maxImageHeight: 500,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($blog) && $blog->desktop_banner!=NULL)
                initialPreview: ["{{asset($blog->desktop_banner)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$blog->desktop_banner))}}",
                    width: "120px"
                }]
                @endif
            });


            $("#mobile_banner").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
               // minImageWidth: 960,
               // minImageHeight: 450,
                // maxImageWidth: 960,
                // maxImageHeight: 450,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($blog) && $blog->mobile_banner!=NULL)
                initialPreview: ["{{asset($blog->mobile_banner)}}",],
                initialPreviewConfig: [{
                    caption: "{{ last(explode('/',$blog->mobile_banner))}}",
                    width: "120px"
                }]
                @endif
            });
        });
    </script>
@endsection
