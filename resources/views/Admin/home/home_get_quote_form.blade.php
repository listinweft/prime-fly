@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Get A Quote</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Home Get A Quote</li>
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
                            <h3 class="card-title">Get A Quote Form</h3>
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
                                           value="{{ old('title',isset($quote)?$quote->title:'') }}" maxlength="255">
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
                                              class="form-control tinyeditor required"
                                              placeholder="Description">{{ old('description',isset($quote)?$quote->description:'') }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 966 x 552 PX and Size must be less than 512 KB</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Image Attribute *</label>
                                    <input type="text" class="form-control placeholder-cls required"
                                           id="image_attribute"
                                           name="image_attribute" placeholder="Alt='Home Image Attribute'"
                                           value="{{ old('image_attribute',isset($quote)?$quote->image_attribute:'') }}"
                                           maxlength="255">
                                    @error('image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Button Text*</label>
                                    <input type="text" name="button_text" id="button_text" placeholder="Button Text"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('button_text',isset($quote)?$quote->button_text:'') }}"
                                           maxlength="255">
                                    <div class="help-block with-errors" id="button_text_error"></div>
                                    @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" id="id" value="{{isset($quote)?$quote->id:'0'}}">
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
                // initialPreviewShowDelete: true,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileTypes: ['image'],
                minImageWidth: 966,
                minImageHeight: 552,
                maxImageWidth: 966,
                maxImageHeight: 552,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($quote) && $quote->image!=NULL)
                initialPreview: ["{{asset($quote->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$quote->image))}}",
                    width: "120px",
                    key: "{{'HomeGetQuote/image/'.$quote->id.'/image_webp' }}",
                }]
                @endif
            });
        });
    </script>
@endsection
