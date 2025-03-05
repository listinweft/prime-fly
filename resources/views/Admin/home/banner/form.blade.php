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
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'home/slider')}}">List</a></li>
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
                                

                            <div class="form-row">
    <div class="form-group col-md-12">
        <label for="banner_type">Choose Banner Type:</label>
        <div>
            <input type="radio" id="home_banner" name="banner_type" value="banner" {{ old('mode', !empty($banner) && $banner->mode == 'banner' ? 'checked' : '') }}>
            <label for="home_banner">Home Banner</label>
        </div>
        <div>
            <input type="radio" id="offer_banner" name="banner_type" value="offer" {{ old('mode', !empty($banner) && $banner->mode == 'offer' ? 'checked' : '') }}>
            <label for="offer_banner">Offer Banner</label>
        </div>
    </div>
    <div class="form-row" id="slider-div">
                                <div class="form-group col-md-6">
                                    <label>Desktop Banner</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: uploaded images have a maximum size of <strong> 618x650</strong> pixels and can't be over 300KB</span>
                                </div>
                              
                            </div>
</div>
                 

<div class="form-group col-md-6">
                                    <label> Mobile Banner</label>
                                    <div class="file-loading">
                                        <input id="mobile_image" name="mobile_image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 960 x 450</span>
                                    @error('mobile_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                            
                        </div>
                    </div>
                    <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn btn-primary form_submit_btn submitBtn" value="Submit">
                                   
                                    <img class="animation__shake loadingImg" src="{{asset('backend/dist/img/loading.gif')}}" style="display:none;">
                                </div>
                            </div>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript">
    //if button text have value add required attribute to url
    $('#button_text').on('keyup',function(){
        if($(this).val()!=''){
            $('#url').addClass('required');
        }else{
            $('#url').removeClass('required');
        }
    });
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
                showRemove: false,
                @if(isset($banner) && $banner->desktop_image!=NULL)
                initialPreview: ["{{asset($banner->desktop_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($banner->desktop_image!=NULL)?$banner->title:''}}",
                    width: "120px",
                    key: "{{'HomeBanner/desktop_image/'.$banner->id.'/desktop_image_webp' }}",
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
                required: true,
                showRemove: false,
                // minImageWidth: 375,
                // minImageHeight: 310,
                // maxImageWidth: 375,
                // maxImageHeight: 310,
                maxFileSize: 512,
                @if(isset($banner) && $banner->mobile_image != NULL)
                initialPreview: ["{{asset($banner->mobile_image)}}"],
                initialPreviewConfig: [{
                    caption: "{{ last(explode('/',$banner->mobile_image))}}",
                    width: "120px",
                    key: "{{($banner->mobile_image)}}",
                }]
                @endif
            });

        });
    </script>
@endsection
