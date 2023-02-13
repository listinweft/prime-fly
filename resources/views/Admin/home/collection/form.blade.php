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
                                    <input type="text" class="required" name="title" id="title" placeholder="Title" class="form-control" autocomplete="off" value="{{ isset($collect)?$collect->title:'' }}" maxlength="230">
                                    <div class="help-block with-errors" id="title_error"></div>
                                </div>

                                

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description*</label>
                                    <textarea class="form-control tinyeditor required reset" id="description"
                                              name="description">{!! @$collect->description !!}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                </div>
                            </div>
                            <div class="form-row" id="slider-div" style="display: {{@$banner->banner_type=='video'?'none':''}}">
                                <div class="form-group col-md-6">
                                    <label>First Image</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 450 x 600 PX and Size must be less than 512 KB</span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label> Image Attribute</label>
                                    <input type="text" class="form-control placeholder-cls required" id="image_attribute"
                                           name="image_attribute" placeholder="Alt='Image Attribute'"
                                           value="{{ isset($collect)?$collect->image_attribute:'' }}">
                                           <div class="help-block with-errors" id="image_attribute_error"></div>
                                </div>

                            </div>
                            <div class="form-row" id="slider-div" style="display: {{@$banner->banner_type=='video'?'none':''}}">
                                <div class="form-group col-md-6">
                                    <label>Second Image</label>
                                    <div class="file-loading">
                                        <input id="image1" name="image1" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 958 x 600 PX and Size must be less than 512 KB</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Second Image Attribute</label>
                                    <input type="text" class="form-control placeholder-cls required" id="image_attribute2"
                                           name="image_attribute2" placeholder="Alt='Image Attribute'"
                                           value="{{ isset($collect)?$collect->image_attribute2:'' }}">
                                           <div class="help-block with-errors" id="image_attribute2_error"></div>
                                </div>
                             <input type="hidden" value="{!! @$collect->id !!}" name="id" >

                            </div>
                            <div class="form-row" id="slider-div" style="display: {{@$banner->banner_type=='video'?'none':''}}">
                                <div class="form-group col-md-6">
                                    <label>Third Image</label>
                                    <div class="file-loading">
                                        <input id="image2" name="image2" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 450 x 600 PX and Size must be less than 512 KB</span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Third  Image Attribute</label>
                                    <input type="text" class="form-control placeholder-cls required" id="image_attribute3"
                                           name="image_attribute3" placeholder="Alt='Image Attribute'"
                                           value="{{ isset($collect)?$collect->image_attribute3:'' }}">
                                           <div class="help-block with-errors" id="image_attribute3_error"></div>
                                           
                                </div>
                              

                            </div>
                            <div class="form-row" id="slider-div" style="display: {{@$banner->banner_type=='video'?'none':''}}">
                                <div class="form-group col-md-6">
                                    <label>Fourth Image</label>
                                    <div class="file-loading">
                                        <input id="image3" name="image3" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 958 x 600 PX and Size must be less than 512 KB</span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Fourth Image Attribute</label>
                                    <input type="text" class="form-control placeholder-cls required" id="image_attribute4"
                                           name="image_attribute4" placeholder="Alt='Image Attribute4'"
                                           value="{{ isset($collect)?$collect->image_attribute4:'' }}">
                                           <div class="help-block with-errors" id="image_attribute4_error"></div>
                                    
                                </div>
                               

                            </div>
                            <div class="form-row" id="slider-div" style="display: {{@$banner->banner_type=='video'?'none':''}}">
                                <div class="form-group col-md-6">
                                    <label>Fifth Image</label>
                                    <div class="file-loading">
                                        <input id="image4" name="image4" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 450 x 600 PX and Size must be less than 512 KB</span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Fifth Image Attribute</label>
                                    <input type="text" class="form-control placeholder-cls required" id="image_attribute5"
                                           name="image_attribute5" placeholder="Alt='Image Attribute'"
                                           value="{{ isset($collect)?$collect->image_attribute5:'' }}">
                                           <div class="help-block with-errors" id="image_attribute6_error"></div>
                                    
                                </div>
                               

                            </div>
                            <div class="form-row" id="slider-div" style="display: {{@$banner->banner_type=='video'?'none':''}}">
                                <div class="form-group col-md-6">
                                    <label>sixth Image</label>
                                    <div class="file-loading">
                                        <input id="image5" name="image5" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 450 x 600 PX and Size must be less than 512 KB</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>sixth Image Attribute</label>
                                    <input type="text" class="form-control placeholder-cls required" id="image_attribute6"
                                           name="image_attribute6" placeholder="Alt='Image Attribute'"
                                           value="{{ isset($collect)?$collect->image_attribute6:'' }}">
                                           <div class="help-block with-errors" id="image_attribute5_error"></div>
                                   
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
                required: true,
                allowedFileTypes: ['image'],
                minImageWidth: 450,
                minImageHeight: 600,
                maxImageWidth: 450,
                maxImageHeight: 600,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($collect) && $collect->mobile_image!=NULL)
                initialPreview: ["{{asset($collect->mobile_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($collect->mobile_image!=NULL)?$collect->title:''}}",
                    width: "120px",
                    key: "{{($collect->mobile_image)}}",
                }]
                @endif
            });
            $("#image1").fileinput({
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
                minImageWidth: 958,
                minImageHeight: 600,
                maxImageWidth: 958,
                maxImageHeight: 600,
                maxFileSize: 1500,
                showRemove: true,
                @if(isset($collect) && $collect->mobile_image1!=NULL)
                initialPreview: ["{{asset($collect->mobile_image1)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($collect->mobile_image1!=NULL)?$collect->title:''}}",
                    width: "120px",
                    key: "{{($collect->mobile_image1)}}",
                }]
                @endif
            });
            $("#image2").fileinput({
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
                minImageWidth: 450,
                minImageHeight: 600,
                maxImageWidth: 450,
                maxImageHeight: 600,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($collect) && $collect->mobile_image2!=NULL)
                initialPreview: ["{{asset($collect->mobile_image2)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($collect->mobile_image2!=NULL)?$collect->title:''}}",
                    width: "120px",
                    key: "{{($collect->mobile_image2)}}",
                }]
                @endif
            });
            $("#image3").fileinput({
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
                minImageWidth: 450,
                minImageHeight: 600,
                maxImageWidth: 450,
                maxImageHeight: 600,
                maxFileSize: 1500,
                showRemove: true,
                @if(isset($collect) && $collect->mobile_image3!=NULL)
                initialPreview: ["{{asset($collect->mobile_image3)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($collect->mobile_image3!=NULL)?$collect->title:''}}",
                    width: "120px",
                    key: "{{($collect->mobile_image3)}}",
                }]
                @endif
            });
            $("#image4").fileinput({
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
                minImageWidth: 450,
                minImageHeight: 600,
                maxImageWidth: 450,
                maxImageHeight: 600,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($collect) && $collect->mobile_image4!=NULL)
                initialPreview: ["{{asset($collect->mobile_image4)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($collect->mobile_image4!=NULL)?$collect->title:''}}",
                    width: "120px",
                    key: "{{($collect->mobile_image4)}}",
                }]
                @endif
            });
            $("#image5").fileinput({
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
                minImageWidth: 450,
                minImageHeight: 600,
                maxImageWidth: 450,
                maxImageHeight: 600,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($collect) && $collect->mobile_image4!=NULL)
                initialPreview: ["{{asset($collect->mobile_image4)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($collect->mobile_image4!=NULL)?$collect->title:''}}",
                    width: "120px",
                    key: "{{($collect->mobile_image4)}}",
                }]
                @endif
            });

            // $("#video_id").fileinput({
            //     'theme': 'explorer-fas',
            //     validateInitialCount: true,
            //     overwriteInitial: false,
            //     autoReplace: true,
            //     layoutTemplates: {actionDelete: ''},
            //     removeLabel: "Remove",
            //     initialPreviewAsData: true,
            //     dropZoneEnabled: false,
            //     // required: true,
            //     allowedFileTypes: ['video'],
            //     // minImageWidth: 747,
            //     // minImageHeight: 902,
            //     // maxImageWidth: 747,
            //     // maxImageHeight: 902,
            //     // maxFileSize: 512,
            //     showRemove: true,
            //     type: "video",
            //     @if(isset($banner) && $banner->video!=NULL)
            //     initialPreview: ["{{asset($banner->video)}}"],
            //     initialPreviewConfig: [
            //         {
            //             type: "video",
            //             filetype: "video/mp4",
            //             caption: "{{$banner->title}}",
            //             url: "{{asset($banner->video)}}",
            //             key: 3,
            //             filename: '{{$banner->title}}' // override download filename
            //         },
            //     ]
            //     @endif
            // });

            // $("#thumbnail_image").fileinput({
            //     'theme': 'explorer-fas',
            //     validateInitialCount: true,
            //     overwriteInitial: false,
            //     autoReplace: true,
            //     layoutTemplates: {actionDelete: ''},
            //     removeLabel: "Remove",
            //     initialPreviewAsData: true,
            //     dropZoneEnabled: false,
            //     required: false,
            //     allowedFileTypes: ['image'],
            //     minImageWidth: 1643,
            //     minImageHeight: 581,
            //     maxImageWidth: 1643,
            //     maxImageHeight: 581,
            //     maxFileSize: 512,
            //     showRemove: true,
            //     @if(isset($banner) && $banner->video_thumbnail_image!=NULL)
            //     initialPreview: ["{{asset($banner->video_thumbnail_image)}}",],
            //     initialPreviewConfig: [{
            //         caption: "{{ ($banner->video_thumbnail_image!=NULL)?$banner->title:''}}",
            //         width: "120px",
            //         key: "{{($banner->video_thumbnail_image)}}",
            //     }]
            //     @endif
            // });


        });
    </script>
@endsection
