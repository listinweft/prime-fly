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
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'home/advertisement')}}">Home Advertisement</a>
                            </li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Home-Advertisement Form</h3>
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
{{--                            <div class="form-row">--}}
{{--                                <div class="form-group col-md-12">--}}
{{--                                    <label for="title"> Title</label>--}}
{{--                                    <input type="text" name="title" id="title" placeholder="Title"--}}
{{--                                           class="form-control " autocomplete="off"--}}
{{--                                           value="{{ old('title',@$advertisement->title) }}">--}}
{{--                                    <div class="help-block with-errors" id="title_error"></div>--}}
{{--                                    @error('title')--}}
{{--                                    <div class="invalid-feedback">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}

{{--                            </div>--}}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label> Desktop Image*</label>
                                        <div class="file-loading">
                                            <input id="desktop_image" name="desktop_image" type="file" accept="image/*">
                                        </div>
                                        <span class="caption_note">Note: Image dimension must be 1920 x 623 PX and Size must be less than 512 KB</span>
                                        @error('desktop_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label> Mobile Image</label>
                                        <div class="file-loading">
                                            <input id="mobile_image" name="mobile_image" type="file" accept="image/*">
                                        </div>
                                        <span class="caption_note">Note: Image dimension must be 960 x 520 PX and Size must be less than 512 KB</span>
                                        @error('mobile_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="image_attribute"> Image Attribute *</label>
                                    <input type="text" class="form-control required placeholder-cls"
                                           id="image_attribute"
                                           name="image_attribute" placeholder="Banner Attribute"
                                           value="{{ old('image_attribute',@$advertisement->image_attribute) }}">
                                    <div class="help-block with-errors" id="image_attribute_error"></div>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="url"> URL*</label>
                                    <input type="text" name="url" id="url" placeholder="URL"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('url',@$advertisement->url) }}">
                                    <div class="help-block with-errors" id="url_error"></div>
                                    @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <img class="animation__shake loadingImg" src="{{url('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#desktop_image").fileinput({
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
                minImageWidth: 1920,
                minImageHeight: 623,
                maxImageWidth: 1920,
                maxImageHeight: 623,
                showRemove: false,
                @if(isset($advertisement) && $advertisement->desktop_image!=NULL)
                initialPreview: ["{{asset($advertisement->desktop_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($advertisement->desktop_image!=NULL)?last(explode('/',$advertisement->desktop_image)):''}}",
                    width: "120px"
                }]
                @endif
            });
            $("#mobile_image").fileinput({
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
                minImageWidth: 960,
                minImageHeight: 520,
                maxImageWidth: 960,
                maxImageHeight: 520,
                showRemove: false,
                @if(isset($advertisement) && $advertisement->mobile_image!=NULL)
                initialPreview: ["{{asset($advertisement->mobile_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($advertisement->mobile_image!=NULL)?last(explode('/',$advertisement->mobile_image)):''}}",
                    width: "120px"
                }]
                @endif
            });
        });
    </script>
@endsection
