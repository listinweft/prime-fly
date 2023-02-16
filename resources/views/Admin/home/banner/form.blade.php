@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}} </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'home/slider')}}">Slider List</a></li>
                            <li class="breadcrumb-item active">{{$title}} </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"method="post">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Banner Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" user_type="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger" user_type="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" placeholder="Title" class="form-control" autocomplete="off" value="{{ isset($banner)?$banner->title:'' }}" maxlength="230">
                                    <div class="help-block with-errors" id="title_error"></div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Banner Type*</label>
                                    <select class="form-control required" name="banner_type" id="banner_type">
                                        <option value="slider" {{ (@$banner->banner_type=='slider')?'selected':''}}>Slider</option>
                                        <option value="video" {{  (@$banner->banner_type=='video')?'selected':'' }}>Video</option>
                                    </select>
                                    <div class="help-block with-errors" id="banner_type_error"></div>
                                </div>

                            </div>

                            <div class="form-row" id="slider-div" style="display: {{@$banner->banner_type=='video'?'none':''}}">
                                <div class="form-group col-md-6">
                                    <label>Image</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 1545 x 644 PX and Size must be less than 512 KB</span>
                                </div>
                                <!-- <div class="form-group col-md-6">
                                  <label> Mobile Image*</label>
                                  <div class="file-loading">
                                      <input id="mobile_image" name="mobile_image" type="file" accept="image/*">
                                  </div>
                                  <span class="caption_note">Note: Image size must be 747 x 902</span>
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="image_meta_tag">Image Meta Tag</label>
                                    <input type="text" name="image_meta_tag" id="image_meta_tag" placeholder="Image Alternate Text" class="form-control placeholder-cls" required autocomplete="off" value="{{ isset($banner)?$banner->image_meta_tag:'' }}" maxlength="230">
                                </div>

                            </div>

                            <div class="form-row" id="video-div" style="display:{{@$banner->banner_type=='video'?'':'none'}} ">

                                <div class="form-group col-md-6">
                                    <label for="title">Sub Title</label>
                                    <input type="text" name="sub_title" id="sub_title" placeholder="Sub Title" class="form-control" autocomplete="off" value="{{ isset($banner)?$banner->sub_title:'' }}" maxlength="230">
                                    <div class="help-block with-errors" id="sub_title_error"></div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label> Video</label>
                                    <div class="file-loading">
                                        <input id="video_id" name="video" type="file" accept="video/*">
                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                      <label> Mobile Image*</label>
                                      <div class="file-loading">
                                          <input id="mobile_image" name="mobile_image" type="file" accept="image/*">
                                      </div>
                                      <span class="caption_note">Note: Image size must be 747 x 902</span>
                                    </div> -->

                                </div>


                            </div>


                            <div class="form-row" id="thumbnail_div" style="display:{{@$banner->banner_type=='video'?'':'none'}} ">
                                <div class="form-group col-md-6">
                                    <label>Video Thumbnail Image</label>
                                    <div class="file-loading">
                                        <input id="thumbnail_image" name="thumbnail_image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 1545 x 644 PX and Size must be less than 512 KB</span>
                                </div>
                                <!-- <div class="form-group col-md-6">
                                  <label> Mobile Image*</label>
                                  <div class="file-loading">
                                      <input id="mobile_image" name="mobile_image" type="file" accept="image/*">
                                  </div>
                                  <span class="caption_note">Note: Image size must be 747 x 902</span>
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="thumbnail_meta_tag">Video Thumbnail Meta Tag</label>
                                    <input type="text" name="thumbnail_meta_tag" id="thumbnail_meta_tag" placeholder="Thumbnail Alternate Text" class="form-control placeholder-cls"  autocomplete="off" value="{{ isset($banner)?$banner->video_thumbnail_image_mata_tag:'' }}" maxlength="230">
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn btn-primary form_submit_btn submitBtn" value="Submit">
                                    <input type="reset" class="btn btn-default" value="Reset">
                                    <img class="animation__shake loadingImg" src="{{url('backend/dist/img/loading.gif')}}" style="display:none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#image").fileinput({
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
                minImageWidth: 1545,
                minImageHeight: 644,
                maxImageWidth: 1545,
                maxImageHeight: 644,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($banner) && $banner->banner_image!=NULL)
                initialPreview: ["{{asset($banner->banner_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($banner->banner_image!=NULL)?$banner->title:''}}",
                    width: "120px",
                    key: "{{($banner->banner_image)}}",
                }]
                @endif
            });

            $("#video_id").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                // required: true,
                allowedFileTypes: ['video'],
                // minImageWidth: 747,
                // minImageHeight: 902,
                // maxImageWidth: 747,
                // maxImageHeight: 902,
                // maxFileSize: 512,
                showRemove: true,
                type: "video",
                @if(isset($banner) && $banner->video!=NULL)
                initialPreview: ["{{asset($banner->video)}}"],
                initialPreviewConfig: [
                    {
                        type: "video",
                        filetype: "video/mp4",
                        caption: "{{$banner->title}}",
                        url: "{{asset($banner->video)}}",
                        key: 3,
                        filename: '{{$banner->title}}' // override download filename
                    },
                ]
                @endif
            });

            $("#thumbnail_image").fileinput({
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
                minImageWidth: 1643,
                minImageHeight: 581,
                maxImageWidth: 1643,
                maxImageHeight: 581,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($banner) && $banner->video_thumbnail_image!=NULL)
                initialPreview: ["{{asset($banner->video_thumbnail_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($banner->video_thumbnail_image!=NULL)?$banner->title:''}}",
                    width: "120px",
                    key: "{{($banner->video_thumbnail_image)}}",
                }]
                @endif
            });


        });
    </script>
@endsection
