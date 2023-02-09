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
                                <a href="{{url(Helper::sitePrefix().'product/')}}">Product</a>
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
                <form role="form" action="{{ route('latest.update') }}" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Product Form</h3>
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
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control required for_canonical_url" autocomplete="off"
                                           value="{{ isset($latest)?$latest->title:'' }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Product Description*</label>
                                    <textarea name="description" id="description"
                                              placeholder="Description" class="form-control required tinyeditor"
                                              autocomplete="off">{{ isset($latest)?$latest->description:'' }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                           

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>product*</label>
                                    <select name="product[]" id="products" multiple
                                            class="form-control select2 required">
                                        <option value="">Select Product</option>
                                      
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                            {{ $product->latest == 'Yes' ? 'selected' : '' }}
                                            >{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="product_error"></div>
                                    @error('products')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>




                          
                        <div class="card-footer">
                            <input type="submit" id="btn_save" name="btn_save"
                                   data-id="{{isset($product)?$product->id:''}}" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <input type="hidden" name="id" id="id" value="{{ isset($product)?$product->id:'0' }}">
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
            $('#featured_image_div').hide();
            @if(isset($product))
            $('#similar_product_id').val([{{@$product->similar_product_id}}]).change();
            $('#addon_id').val([{{@$product->add_on_id}}]).change();
            $('#tag_id').val([{{@$product->tag_id}}]).change();
            $('#related_product_id').val([{{@$product->related_product_id}}]).change();
            $('#category').val([{{@$product->category_id}}]).change();
            $('#sub_category').val([{{@$product->sub_category_id}}]).change();
            @endif
            $("#thumbnail_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: true,
                allowedFileTypes: ['image'],
                minImageWidth: 1000,
                minImageHeight: 1000,
                maxImageWidth: 1000,
                maxImageHeight: 1000,
                maxFilesize: 10240,
                showRemove: true,
                @if(isset($product) && $product->thumbnail_image!=NULL)
                initialPreview: ["{{asset($product->thumbnail_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($product->thumbnail_image!=NULL)?last(explode('/',$product->thumbnail_image)):''}}",
                    width: "120px"
                }]
                @endif
            });

            $("#product_manual").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                removeLabel: "Remove",
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: [],
                maxFileSize: 512,
                showRemove: true,
                @if(isset($product) && $product->product_manual!=NULL)
                initialPreview: ["{{asset($product->product_manual)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($product->product_manual!=NULL)?last(explode('/',$product->product_manual)):''}}",
                    width: "120px"
                }]
                @endif
            });


            $("#desktop_banner").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                minImageWidth: 1920,
                minImageHeight: 420,
                maxImageWidth: 1920,
                maxImageHeight: 420,
                showRemove: true,
                @if(isset($product) && $product->desktop_banner!=NULL)
                initialPreview: ["{{asset($product->desktop_banner)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($product->desktop_banner!=NULL)?last(explode('/',$product->desktop_banner)):''}}",
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
                maxImageWidth: 960,
                maxImageHeight: 450,
                showRemove: true,
                @if(isset($product) && $product->mobile_banner!=NULL)
                initialPreview: ["{{asset($product->mobile_banner)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($product->mobile_banner!=NULL)?last(explode('/',$product->mobile_banner)):''}}",
                    width: "120px"
                }]
                @endif
            });

            $("#featured_image").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileTypes: ['image'],
                minImageWidth: 1131,
                minImageHeight: 604,
                maxImageWidth: 1131,
                maxImageHeight: 604,
                showRemove: true,
                @if(isset($product) && $product->featured_image!=NULL)
                initialPreview: ["{{asset($product->featured_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($product->featured_image!=NULL)?last(explode('/',$product->featured_image)):''}}",
                    width: "120px"
                }]
                @endif
            });
        });
        $('#featured_video_url').on('input', function () {
            var url = $(this).val();
            if (url != '') {
                $('#featured_image_div').show();
            } else {
                $('#featured_image_div').hide();
            }
        });
    </script>
@endsection
