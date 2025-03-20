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
                            <li class="breadcrumb-item active">{{$title}}</li>
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
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Site Information Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            
                           
                           
                               
                             
                              
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-5">
                                    <label for="privacy_policy">Contact Us Locations</label>
                                    <textarea name="location" id="privacy_policy"
                                              placeholder="Locations"
                                              class="form-control " autocomplete="off">
                                        {{ old('location', !empty($siteInformation)?$siteInformation->location:'') }}</textarea>
                                </div>
                                <div class="form-group col-md-12 mb-5">
                                    <label for="terms_and_conditions">Contact Us Phone Numbers</label>
                                    <textarea name="phone" id="terms_and_conditions"
                                              placeholder="Phone Numbers" class="form-control "
                                              autocomplete="off">
                                        {{ old('phone', !empty($siteInformation)?$siteInformation->phone:'') }}</textarea>
                                </div>
                                <input type="hidden" name="title" value="Banner">

                                <div class="form-group col-md-12 mb-5">
                                    <label for="terms_and_conditions">Contact Us Emails</label>
                                    <textarea name="email" id="terms_and_conditions"
                                              placeholder="Emails" class="form-control "
                                              autocomplete="off">
                                        {{ old('email', !empty($siteInformation)?$siteInformation->email:'') }}</textarea>
                                </div>
                                <div class="form-row">
                               

                                <div class="form-group col-md-12 mb-4">
                                            <label>Contact Us Banner Image*</label>
                                            <div class="file-loading">
                                                <input id="image" name="image" type="file">
                                            </div>
                                            <span class="caption_note">Note: Image dimension must be 1162 x 505 PX and Size must be less than 512 KB</span>
                                            @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                               
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                            <label>Blog Banner Image*</label>
                                            <div class="file-loading">
                                                <input id="blog_image" name="blog_image" type="file">
                                            </div>
                                            <span class="caption_note">Note: Image dimension must be 1162 x 505 PX and Size must be less than 512 KB</span>
                                            @error('blog_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                               
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                            <label>Faq Banner Image*</label>
                                            <div class="file-loading">
                                                <input id="faq_image" name="faq_image" type="file">
                                            </div>
                                            <span class="caption_note">Note: Image dimension must be 1162 x 505 PX and Size must be less than 512 KB</span>
                                            @error('faq_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                               
                            </div>
                               
                              
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <input type="hidden" name="id" id="id"
                                   value="{{ !empty($siteInformation)?$siteInformation->id:'0' }}">
                        </div>
                    </div>
                </form>
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
                // maxFileSize: 512,
                showRemove: true,
                @if(isset($siteInformation) && $siteInformation->image!=NULL)
                initialPreview: ["{{asset($siteInformation->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$siteInformation->image))}}",
                    width: "120px"
                }]
                @endif
            });
            $("#blog_image").fileinput({
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
                // maxFileSize: 512,
                showRemove: true,
                @if(isset($siteInformation) && $siteInformation->blog_image!=NULL)
                initialPreview: ["{{asset($siteInformation->blog_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$siteInformation->blog_image))}}",
                    width: "120px"
                }]
                @endif
            });

            $("#faq_image").fileinput({
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
                // minImageWidth: 940,
                // minImageHeight: 430,
                // maxImageWidth: 940,
                // maxImageHeight: 430,
                // maxFileSize: 512,
                showRemove: true,
                @if(isset($siteInformation) && $siteInformation->faq_image!=NULL)
                initialPreview: ["{{asset($siteInformation->faq_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ last(explode('/',$siteInformation->faq_image))}}",
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
                minImageWidth: 960,
                minImageHeight: 450,
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
