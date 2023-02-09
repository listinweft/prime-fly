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
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'about/about')}}">About</a>
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
                            <h3 class="card-title">About Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($about)?$about->title:'' }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Description*</label>
                                    <textarea name="description" id="description"
                                              class="form-control required tinyeditor" placeholder="Description"
                                    >{{ isset($about)?$about->description:'' }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Image</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 966 x 552 PX and Size must
                                        be less than 512 KB</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Image Attribute</label>
                                    <input type="text" class="form-control placeholder-cls" id="image_attribute"
                                           name="image_attribute" placeholder="Alt='Image Attribute'"
                                           value="{{ isset($about)?$about->image_attribute:'' }}">
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Video URL</label>
                                    <input type="text" class="form-control " id="video_url"
                                           name="video_url" placeholder="Video URL"
                                           value="{{ isset($about)?$about->video_url:'' }}">
                                    @error('video_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Feature Title</label>
                                    <input type="text" name="feature_title" id="feature_title" placeholder="Feature Title"
                                           class="form-control " autocomplete="off"
                                           value="{{ isset($about)?$about->feature_title:'' }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('feature_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label> Feature Description</label>
                                    <textarea name="feature_description" id="feature_description"
                                              class="form-control tinyeditor" placeholder= Feature"Description"
                                    >{{ isset($about)?$about->feature_description:'' }}</textarea>
                                    <div class="help-block with-errors" id="feature_description_error"></div>
                                    @error('feature_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Feature Image</label>
                                    <div class="file-loading">
                                        <input id="feature_image" name="feature_image" type="file">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 988 x 538 PX and Size must
                                        be less than 512 KB</span>
                                    @error('feature_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Feature Image Attribute</label>
                                    <input type="text" class="form-control placeholder-cls" id="feature_image_attribute"
                                           name="feature_image_attribute" placeholder="Alt='Feature Image Attribute'"
                                           value="{{ isset($about)?$about->feature_image_attribute:'' }}">
                                    @error('feature_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>History Title</label>
                                    <input type="text" name="history_title" id="history_title" placeholder="History Title"
                                           class="form-control " autocomplete="off"
                                           value="{{ isset($about)?$about->history_title:'' }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('history_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>History Description</label>
                                    <textarea name="history_description" id="history_description"
                                              class="form-control tinyeditor" placeholder="History Description"
                                    >{{ isset($about)?$about->history_description:'' }}</textarea>
                                    @error('history_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Products Available Title</label>
                                    <input type="text" name="products_available_title" id="products_available_title"
                                           placeholder="Products Available Title" class="form-control " autocomplete="off"
                                           value="{{ isset($about)?$about->products_available_title:'' }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('products_available_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Products Available Image</label>
                                    <div class="file-loading">
                                        <input id="products_available_image" name="products_available_image" type="file">
                                    </div>
                                    <span class="caption_note">Note: Products Available Image dimension must be 1364 x 599 PX and Size must
                                        be less than 512 KB</span>
                                    @error('products_available_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Products Available Description</label>
                                    <textarea name="products_available_description" id="products_available_description"
                                              class="form-control tinyeditor" placeholder="Products Available Description"
                                    >{{ isset($about)?$about->products_available_description:'' }}</textarea>
                                    @error('products_available_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" id="id" value="{{isset($about)?$about->id:'0'}}">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
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
                minImageWidth: 966,
                minImageHeight: 552,
                maxImageWidth: 966,
                maxImageHeight: 552,
                showRemove: false,
                @if(isset($about) && $about->image!=NULL)
                initialPreview: ["{{asset($about->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($about->image!=NULL)?last(explode('/',$about->image)):''}}",
                    width: "120px"
                }]
                @endif
            });

            $("#feature_image").fileinput({
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
                minImageWidth: 988,
                minImageHeight: 538,
                maxImageWidth: 988,
                maxImageHeight: 538,
                showRemove: false,
                @if(isset($about) && $about->feature_image!=NULL)
                initialPreview: ["{{asset($about->feature_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($about->feature_image!=NULL)?last(explode('/',$about->feature_image)):''}}",
                    width: "120px"
                }]
                @endif
            });

            $("#products_available_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                layoutTemplates: {actionDelete: ''},
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                allowedFileTypes: ['image', 'svg'],
                required: false,
                minImageWidth: 1364,
                minImageHeight: 599,
                maxImageWidth: 1364,
                maxImageHeight: 599,
                showRemove: true,
                @if(isset($about) && $about->products_available_image!=NULL)
                initialPreview: ["{{asset($about->products_available_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($about->products_available_image!=NULL)?last(explode('/',$about->products_available_image)):''}}",
                    width: "120px"
                }]
                @endif
            });
        });
    </script>
@endsection
