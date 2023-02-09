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
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'about/history')}}">History</a></li>
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
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">History Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
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
                            <div class="form-group col-md-12">
                                <label> Year*</label>
                                <input type="number" name="year" id="year" placeholder="Year" class="form-control required" autocomplete="off"  value="{{ isset($history)?$history->year:'' }}" maxlength="4" min="0">
                                <div class="help-block with-errors" id="year_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" class="form-control required">
                                </div>
                                <span class="caption_note">Note: Image dimension must be 1500 x 1000 PX and Size must
                                        be less than 512 KB</span>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Image Attribute</label>
                                <input type="text" class="form-control placeholder-cls" id="image_attribute"
                                       name="image_attribute" placeholder="Alt='Image Attribute'"
                                       value="{{ isset($about)?$about->image_attribute:'' }}">
                                @error('image_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
						<div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Description*</label>
                                <textarea class="form-control tinyeditor required" id="description"  name="description" placeholder="Answer">{{ isset($history)?$history->description:'' }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script type="text/javascript">
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
        minImageWidth: 1500,
        minImageHeight: 1000,
        maxImageWidth: 1500,
        maxImageHeight: 1000,
        showRemove: false,
        @if(isset($history) && $history->image!=NULL)
        initialPreview: ["{{asset($history->image)}}",],
        initialPreviewConfig: [{
            caption: "{{ ($history->image!=NULL)?last(explode('/',$history->image)):''}}",
            width: "120px"
        }]
        @endif
    });
</script>
@endsection
