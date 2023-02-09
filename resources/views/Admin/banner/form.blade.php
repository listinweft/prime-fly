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
                            <h3 class="card-title">{{ $key }} Banner - {{ ucfirst($type) }}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
{{--                                <div class="form-group col-md-4">--}}
{{--                                    <label> Banner Title*</label>--}}
{{--                                    <input type="text" name="banner_title" id="banner_title"--}}
{{--                                           placeholder="Banner Title"--}}
{{--                                           class="form-control required" autocomplete="off"--}}
{{--                                           value="{{ isset($banner)?$banner->banner_title:'' }}">--}}
{{--                                    <div class="help-block with-errors" id="banner_title_error"></div>--}}
{{--                                    @error('banner_title')--}}
{{--                                    <div class="invalid-feedback">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="form-group col-md-4">--}}
{{--                                    <label> Banner Sub Title</label>--}}
{{--                                    <input type="text" name="banner_sub_title" id="banner_sub_title"--}}
{{--                                           placeholder="Banner Sub Title"--}}
{{--                                           class="form-control" autocomplete="off"--}}
{{--                                           value="{{ isset($banner)?$banner->banner_sub_title:'' }}">--}}
{{--                                    <div class="help-block with-errors" id="banner_sub_title_error"></div>--}}
{{--                                    @error('banner_sub_title')--}}
{{--                                    <div class="invalid-feedback">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Desktop Banner</label>
                                    <div class="file-loading">
                                        <input id="desktop_banner" name="desktop_banner" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 1920 x 420</span>
                                    @error('desktop_banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Mobile Banner</label>
                                    <div class="file-loading">
                                        <input id="mobile_banner" name="mobile_banner" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 960 x 450</span>
                                    @error('mobile_banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Banner Attribute</label>
                                    <input type="text" class="form-control placeholder-cls" id="banner_attribute"
                                           name="banner_attribute" placeholder="Alt='Banner Attribute'"
                                           value="{{ isset($banner)?$banner->banner_attribute:'' }}">
                                    @error('banner_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" id="id" value="{{ isset($banner)?$banner->id:'0' }}">
                            <input type="hidden" name="type" id="type" value="{{ $type }}">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
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
            $("#desktop_banner").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                showRemove: false,
                minImageWidth: 1920,
                minImageHeight: 420,
                maxImageWidth: 1920,
                maxImageHeight: 421,
                maxFileSize: 512,
                @if(isset($banner) && $banner->desktop_banner != NULL)
                initialPreview: ["{{asset($banner->desktop_banner)}}"],
                initialPreviewConfig: [{
                    caption: "{{ last(explode('/',$banner->desktop_banner))}}",
                    width: "120px",
                    key: "{{($banner->desktop_banner)}}",
                }]
                @endif
            });

            $("#mobile_banner").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                showRemove: false,
                minImageWidth: 960,
                minImageHeight: 450,
                maxImageWidth: 960,
                maxImageHeight: 450,
                maxFileSize: 512,
                @if(isset($banner) && $banner->mobile_banner != NULL)
                initialPreview: ["{{asset($banner->mobile_banner)}}"],
                initialPreviewConfig: [{
                    caption: "{{ last(explode('/',$banner->desktop_banner))}}",
                    width: "120px",
                    key: "{{($banner->mobile_banner)}}",
                }]
                @endif
            });
        });
    </script>
@endsection
