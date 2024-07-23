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
                                <a href="{{url(Helper::sitePrefix().'product/')}}">Service</a>
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
                <form role="form" id="formWizard"
                action="{{@$key=='Copy'?url(Helper::sitePrefix().'product/create'):''}}" class="form--wizard"
                enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Service Form</h3>
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
                            <div class="form-group col-md-3">
                                <label> Category</label>
                                <select name="category" id="category" class="form-control select2">
    <option value="">Select Category</option> <!-- Change value to empty string -->
    @foreach($categories as $category)
        <option value="{{$category->id}}" {{ (@$category->id==@$product->category_id)?'selected':'' }}>
            {{$category->title}}
        </option>
    @endforeach
</select>

                                <div class="help-block with-errors" id="category"></div>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- <div class="form-group col-md-3">
                                <label> Package </label>
                                <select class="form-control select2 " name="sub_category[]"
                                        id="sub_category" multiple>
                                    @if(isset($subCategories))
                                        @foreach($subCategories as $second)
                                    
                                            <option value="{{$second->id}}"
                                                {{($second->id==@$product->sub_category_id)?'selected':''}}
                                            >{{$second->title}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="help-block with-errors" id="sub_category_error"></div>
                                @error('sub_category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> -->

                            <div class="form-row">
                                
                                <div class="form-group col-md-12">
                                    <label> Package Description*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control required for_canonical_url" autocomplete="off"
                                           value="{{ isset($product)?$product->title:'' }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                           
                            <div class="form-row">
    <table class="table table-active" id="firstpricing">
        <thead>
            <tr>
                <th>Price List *</th>
                <th>Price *</th>
              
                

            </tr>
        </thead>
        <tbody>
           
                <tr>
    <td>Price</td>
    <td>
       
        <input type="number" name="pricenormal" class="form-control" id="pricenormal" value="{{ isset($product) ? $product->price : '' }}">
        <div class="help-block with-errors" id="pricenormal_error"></div>
    </td>
   
</tr>

<tr>
    <td>Additional Charges</td>
    <td>
        
        <input type="text" name="additional_price" class="form-control" value="{{ isset($product) ? $product->additional_price : '' }}">
    </td>
</tr>
<tr>
    <!-- <td>Hourly Price</td>
    <td>
      
        <input type="text" name="hourly_price" class="form-control" value="{{ isset($product) ? $product->hourly_price : '' }}">
    </td> -->
    </tr>
    <tr>
    <td>Additional Hourly Price</td>
    <td>
        <input type="text" name="additional_hourly_price" class="form-control" value="{{ isset($product) ? $product->additional_hourly_price : '' }}">
    </td>
</tr>
          
      
    

   
  
        </tbody>
    </table>
</div>


                            <div class="form-row">
                            <table class="table table-active" id="size_price_listing_table">
                                <thead>
                                    <th>Passenger Type *</th>
                                    <th> Price *</th>
                                    
                                </thead>
                                @if (!isset($product))
                                <tbody>
                                    @foreach ($sizes as $size)
                                    <tr>
                                        <td>
                                            {{$size->title}}
                                        </td>
                                        <td>
                                            <input type="hidden" name="size[]" id=""   value="{{$size->id}}">
                                            <input type="number" name="price[{{$size->id}}]" id="pricesize"   class="form-control" value="">
                                            <div class="help-block with-errors" id="pricesize_error"></div>
                                        </td>
                                       
                                        
                                       
                                        
                                      
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                                    @else
                                    <tbody>
                                        @foreach ($sizes as $size)
                                        <tr>
                                            <td>
                                                {{$size->title}}
                                            </td>
                                            <td>
                                                @php
                                                    $price = App\Models\ProductPrice::where('product_id',$product->id)->where('size_id',$size->id)->first();
                                                @endphp
                                                <input type="hidden" name="size[]" id="" value="{{$size->id}}">
                                                <input type="number" name="price[{{$size->id}}]" id="pricesize" class="form-control" value="{{isset($price)?$price->price:''}}">
                                                <div class="help-block with-errors" id="pricesize_error"></div>
                                            </td>
                                           
                                      
                                      
                                      
                                        </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>


                        <!-- <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label>No of Bags*</label>
                                    <input type="text" name="bags" id="bags" placeholder="Bags"
                                           class="form-control  for_canonical_url" autocomplete="off"
                                           value="{{ isset($product)?$product->bags:'' }}">
                                    

                                   
                                  
                                </div>

                            </div> -->
<!-- 
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label>Hours</label>
                                  
                                    

                                    <input type="text" name="hours" id="hours" placeholder="Hours"
                                           class="form-control  for_canonical_url" autocomplete="off"
                                           value="{{ isset($product)?$product->hours:'' }}">
                                   
                                  
                                </div>

                            </div> -->
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label> Short URL *</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Short URL"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($product)?$product->short_url:'' }}">
                                    <div class="help-block with-errors" id="short_url_error"></div>
                                    @error('short_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                               
                               
                            </div>

                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label> Location*</label>
                                    <select name="location[]" id="location" multiple class="form-control select2 required">
                                        <option value="">Select location</option>
                                        @foreach($locations as $location)
    <option value="{{ $location->id }}" {{ in_array($location->id, explode(',', @$product->location_id)) ? 'selected' : '' }}>
        {{ $location->title }}
    </option>
@endforeach
                                    </select>
                                    <div class="help-block with-errors" id="location_error"></div>
                                    @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group col-md-6" id="serviceTypeGrouptype">
    <label> Service Type </label>
    <select name="service_type[]"  class="form-control select2">
        <option value="departure" @if(in_array('departure', $selectedServiceTypes)) selected @endif>Departure</option>
        <option value="arrival" @if(in_array('arrival', $selectedServiceTypes)) selected @endif>Arrival</option>
        <option value="round_trip" @if(in_array('round_trip', $selectedServiceTypes)) selected @endif>Round Trip</option>
        <option value="transit_type" @if(in_array('transit_type', $selectedServiceTypes)) selected @endif>Transit type</option>
    </select>
   
  
</div>


<div class="form-group col-md-6" id="travelSectorGroup">
    <label>Travel Sector</label>
    <select name="sector" id="sector" class="form-control select2">
        @php
            $defaultSector = $selectedSector ?? 'international';
        @endphp
        <option value="international" @if($defaultSector == 'international') selected @endif>International</option>
        <option value="domestic" @if($defaultSector == 'domestic') selected @endif>Domestic</option>
    </select>
    
</div>




                           


                           
                            <div class="form-row">
                              

                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Service Description*</label>
                                    <textarea name="description" id="description"
                                              placeholder="Description" class="form-control required tinyeditor"
                                              autocomplete="off">{{ isset($product)?$product->description:'' }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                         
                            <div class="form-row">
                               

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Service Thumbnail Image*</label>
                                    <div class="file-loading">
                                        <input id="thumbnail_image" name="thumbnail_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span
                                        class="caption_note">Note: Image size should be minimum of 1000 x 1000</span>
                                        @if(@$key)
                                    @error('thumbnail_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Service Thumbnail Attribute</label>
                                    <input type="text" name="thumbnail_image_attribute"
                                           id="thumbnail_image_attribute"
                                           placeholder="Alt='Product Thumbnail Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off"
                                           value="{{ isset($product)?$product->thumbnail_image_attribute:'' }}">
                                    @error('thumbnail_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                           

                            <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Desktop Banner*</label>
                                    <div class="file-loading">
                                        <input id="desktop_banner" name="desktop_banner" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 1920 x 420 PX and Size must be less than 512 KB</span>
                                    @error('desktop_banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Mobile Banner</label>
                                    <div class="file-loading">
                                        <input id="mobile_banner" name="mobile_banner" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image dimension must be 960 x 450 PX and Size must be less than 512 KB</span>
                                    @error('mobile_banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="form-row">

                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Meta Title</label>
                                    <textarea class="form-control" id="meta_title" name="meta_title"
                                              placeholder="Meta Title">{{ isset($product)?$product->meta_title:'' }}</textarea>
                                    @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description"
                                              placeholder="Meta Description">{{ isset($product)?$product->meta_description:'' }}</textarea>
                                    @error('meta_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Meta Keyword</label>
                                    <textarea class="form-control" id="meta_keyword" name="meta_keyword"
                                              placeholder="Meta Keyword">{{ isset($product)?$product->meta_keyword:'' }}</textarea>
                                    @error('meta_keyword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Other Meta Tag</label>
                                    <textarea class="form-control" id="other_meta_tag" name="other_meta_tag"
                                              placeholder="Other Meta Tag">{{ isset($product)?$product->other_meta_tag:'' }}</textarea>
                                    @error('other_meta_tag')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                           
                        </div>
                        <div class="card-footer">
                            <input type="submit" id="btn_save" name="btn_save"
                                   data-id="{{isset($product)?$product->id:''}}" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                                   @if(@$key)
                                   <input type="hidden" value="{{@$key}}" name="copy">
                                   <input type="hidden" value="{{@$product->id}}" name="copy_product_id">
                               @endif
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
                required: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 1000,
                // minImageHeight: 1000,
                // maxImageWidth: 1000,
                // maxImageHeight: 1000,
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


<script>
    

$(document).ready(function () {
    function updateVisibilityBasedOnCategory(ageRange) {
        if (ageRange === 'Active') {


            document.getElementById('travelSectorGroup').style.display = 'block';
            document.getElementById('serviceTypeGrouptype').style.display = 'block';

          
         
           
            $('[id^=size_price_listing_table]').show().each(function() {
                $(this).find('tr:first-child input[name^="price["]').addClass('required');
            });
            $('[id^=firstpricing]').hide().find('#pricenormal').removeClass('required');
            $('#firstpricing input[type="number"]').val('');
        } else {

               document.getElementById('travelSectorGroup').style.display = 'none';
               document.getElementById('serviceTypeGrouptype').style.display = 'none';

             
            $('[id^=size_price_listing_table]').hide();
            $('#size_price_listing_table input[type="number"]').val('');
            $('[id^=firstpricing]').show().find('#pricenormal').addClass('required');
        }
    }

    // Initial check when the document is ready
    var selectedCategoryValue = $('#category').val();
    if (selectedCategoryValue !== '') {
        var base_url = "{{ url(Helper::sitePrefix()) }}";
        // Make an initial AJAX call to fetch age_range
        $.ajax({
            url: base_url + '/product/category/category-details', // The URL to your endpoint
            method: 'GET',
            data: { category_id: selectedCategoryValue },
            success: function(response) {
                updateVisibilityBasedOnCategory(response.age_range);
            },
            error: function() {
                console.log('Error fetching category details');
            }
        });
    } else {
        updateVisibilityBasedOnCategory('');
    }

    // Add change event listener for the category select
    $('#category').change(function () {
        var selectedCategoryValue = $(this).val();
        var base_url = "{{ url(Helper::sitePrefix()) }}";
        if (selectedCategoryValue !== '') {
            // Make an AJAX call to fetch age_range
            $.ajax({
               
                url: base_url + '/product/category/category-details',
                method: 'GET',
                data: { category_id: selectedCategoryValue },
                success: function(response) {
                    updateVisibilityBasedOnCategory(response.age_range);
                },
                error: function() {
                    console.log('Error fetching category details');
                }
            });
        } else {
            updateVisibilityBasedOnCategory('');
        }
    });
});



        
    </script>
@endsection
