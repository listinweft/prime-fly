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
                <div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Heading Form</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="home_title">Title*</label>
                    <input type="text" class="form-control required" id="home_title" name="homeTitle"
                           placeholder="Title" value="{{@$home_heading->title}}">
                    <div class="help-block with-errors" id="home_title_error"></div>
                    @error('home_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="subtitle">Sub Title*</label>
                    <input type="text" class="form-control required" id="subtitle" name="subtitle"
                           placeholder="Sub Title" value="{{@$home_heading->subtitle}}">
                    <div class="help-block with-errors" id="subtitle_error"></div>

                </div>
            </div>


            <input type="hidden" name="is_description" id="is_description" value="1">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="home_description">Description</label>
                        <textarea class="form-control tinyeditor" id="home_description" name="homeDescription"
                                  placeholder="Description">{{@$home_heading->description}}</textarea>
                        <div class="help-block with-errors" id="home_description_error"></div>
                        @error('home_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

        </div>
        <div class="card-footer">
            <input type="button" id="headingSubmit" data-type="selection"
                   name="btn_save" data-url="/home-heading" value="Submit" class="btn btn-primary pull-left">
            <button type="reset" class="btn btn-default">Cancel</button>
            <img class="animation__shake loadingImg" src="{{asset('backend/dist/img/loading.gif')}}"
                 style="display:none;">
        </div>
    </form>
</div>

                <form role="form" action="{{route('selection.update')}}" id="formWizards" class="form--wizards" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Our Selection</h3>
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
                            
                            <!-- <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Latest Title*</label>
                                    <input type="text" name="latest_title" id="title" placeholder="Title"
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
                                    <label>Latest  Product Description*</label>
                                    <textarea name="latest_description" id="description"
                                              placeholder="Description" class="form-control required tinyeditor"
                                              autocomplete="off">{{ isset($latest)?$latest->description:'' }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                              
                            </div> -->

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>product*</label>
                                    <select name="product" id="products"  maxlength="1"
                                            class="form-control select2 required">
                                        <option value="">Select Product</option>
                                      
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                                @if($product->id == @$productID->id)
                                                    selected
                                                @endif
                                               >{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="product_error"></div>
                                    @error('product')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>product*</label>
                                    <select name="product1" id="products1"  maxlength="1"
                                            class="form-control select2 required">
                                        <option value="">Select Product</option>
                                      
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                                @if($product->id==@$productID1->id)
                                                    selected
                                                @endif
                                               >{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="product1_error"></div>
                                    @error('product1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>product*</label>
                                    <select name="product2" id="products2"  maxlength="1"
                                            class="form-control select2 required">
                                        <option value="">Select Product</option>
                                      
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                            @if($product->id == @$productID2->id)
                                                    selected
                                                @endif
                                               >{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="product2_error"></div>
                                    @error('product2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>product*</label>
                                    <select name="product3" id="products3"  maxlength="1"
                                            class="form-control select2 required">
                                        <option value="">Select Product</option>
                                      
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                            @if($product->id==@$productID3->id)
                                                    selected
                                                @endif
                                               >{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="product3_error"></div>
                                    @error('product3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>product*</label>
                                    <select name="product4" id="products4"  maxlength="1"
                                            class="form-control select2 required">
                                        <option value="">Select Product</option>
                                      
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                            @if($product->id==@$productID4->id)
                                                    selected
                                                @endif
                                               >{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="product4_error"></div>
                                    @error('product4')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>product*</label>
                                    <select name="product5" id="products5"  maxlength="1"
                                            class="form-control select2 required">
                                        <option value="">Select Product</option>
                                      
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                            @if($product->id==@$productID5->id)
                                                    selected
                                                @endif
                                               >{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="product5_error"></div>
                                    @error('product5')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>

                           
                           
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>product*</label>
                                    <select name="product6" id="products6"  maxlength="1"
                                            class="form-control select2 required">
                                        <option value="">Select Product</option>
                                      
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                            @if($product->id==@$productID6->id)
                                                    selected
                                                @endif
                                               >{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="product6_error"></div>
                                    @error('product6')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>product*</label>
                                    <select name="product7" id="products7"  maxlength="1"
                                            class="form-control select2 required">
                                        <option value="">Select Product</option>
                                      
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                            @if($product->id==@$productID7->id)
                                                    selected
                                                @endif
                                               >{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="product6_error"></div>
                                    @error('product6')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>

                            


                          
                        <div class="card-footer">
                            <input type="submit" id="btn_save" name="btn_save"
                                   data-id="{{isset($product)?$product->id:''}}" value="Submit"
                                   class="btn btn-primary pull-left ">
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
    <script>
        $(document).ready(function(){
          $(".js-example-basic-multiple").select2();
        });//document ready
        </script>
        
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
