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
            <form role="form" id="formWizard"
                  action="{{@$key=='Copy'?url(Helper::sitePrefix().'product/create'):''}}" class="form--wizard"
                  enctype="multipart/form-data" method="post">
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
                            <div class="form-group col-md-4">
                                <label> Title*</label>
                                <input type="text" name="title" id="title" placeholder="Title"
                                       class="form-control required for_canonical_url" autocomplete="off"
                                       value="{{ isset($product)?$product->title:'' }}">
                                <div class="help-block with-errors" id="title_error"></div>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label> Short URL *</label>
                                <input type="text" name="short_url" id="short_url" placeholder="Short URL"
                                       class="form-control required" autocomplete="off"
                                       value="{{ isset($product)?$product->short_url:'' }}">
                                <div class="help-block with-errors" id="short_url_error"></div>
                                @error('short_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sku/Product Code*</label>
                                <input type="text" name="sku" id="sku" placeholder="Product Code"
                                       class="form-control required" autocomplete="off"
                                       value="{{ isset($product)?$product->sku:'' }}">
                                <div class="help-block with-errors" id="sku_error"></div>
                                @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label> Category*</label>
                                <select name="category[]" id="category" multiple
                                        class="form-control select2 required">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{ (@$category->id==@$product->category_id)?'selected':'' }}
                                        >{{$category->title}}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors" id="category_error"></div>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label> Sub Category</label>
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
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label> Tags *</label>
                                <select class="form-control select2 " name="tags[]" id="tag_id" multiple>
                                    @foreach($tags as $tag)
                                    <option value="{{$tag->id}}"
                                       
                                        {{ (@$tag->id==@$product->tag_id)?'selected':'' }}
                                   >{{$tag->title}}</option>
                                @endforeach
                                </select>
                                <div class="help-block with-errors" id="tags_error"></div>
                                @error('tags')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Product Description*</label>
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
                            <div class="form-group col-md-3">
                                <label> Availability*</label>
                                <select class="form-control required" name="availability" id="availability">
                                    @foreach(["In Stock", "Out of Stock"] AS $availability)
                                        <option value="{{ $availability }}"
                                            {{ old("availability", @$product->availability) == $availability ? "selected" : "" }}>{{ $availability }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors" id="availability_error"></div>
                                @error('availability')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 availability_div"      style="display: {{(@$product->availability=='Out of stock')?'none':''}};">
                                <label> Stock*</label>
                                <input type="text" name="stock" id="stock" placeholder="Stock"
                                        class="form-control stock {{(@$product->availability=='Out of Stock')?'':'required'}}"
                                        autocomplete="off" value="{{ isset($product)?$product->stock:'2' }}">
                                <div class="help-block with-errors" id="stock_error"></div>
                                @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 availability_div"      style="display: {{(@$product->availability=='Out of stock')?'none':''}};">
                                <label> Alert Quantity *</label>
                                <input type="text" name="alert_quantity" id="alert_quantity"
                                        placeholder="Alert Quantity"
                                        class="form-control alert_quantity {{(@$product->quantity=='Out of Stock')?'':'required'}}"
                                        autocomplete="off"
                                        value="{{ isset($product)?$product->alert_quantity:'1' }}">
                                <div class="help-block with-errors" id="alert_quantity_error"></div>
                                @error('alert_quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="form-group col-md-3">
                                <label> Quantity*</label>
                                <input type="text" name="quantity" id="quantity" placeholder="Quantity"
                                       class="form-control required"
                                       value="{{ isset($product)?$product->quantity:'' }}">
                                <div class="help-block with-errors" id="quantity_error"></div>
                                @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> You May Also Like</label>
                                <select name="similar_product_id[]" multiple id="similar_product_id"
                                        class="form-control select2">
                                    @foreach($products as $similar)
                                        <option value="{{ $similar->id  }}">{{ $similar->title }}</option>
                                    @endforeach
                                </select>
                                @error('similar_product_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Related products </label>
                                <select name="related_product_id[]" multiple id="related_product_id"
                                        class="form-control select2">
                                    @foreach($products as $related)
                                        <option value="{{ $related->id }}">{{ $related->title }}</option>
                                    @endforeach
                                </select>
                                @error('related_product_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Product Thumbnail Image*</label>
                                <div class="file-loading">
                                    <input id="thumbnail_image" name="thumbnail_image" type="file"
                                           accept="image/*">
                                </div>
                                <span class="caption_note">Note: uploaded images have a maximum size of <strong> 1200x960</strong> pixels and can't be over 512kb</span>
                                
                                @error('thumbnail_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Product Thumbnail Attribute*</label>
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Banner Image</label>
                                <div class="file-loading">
                                    <input id="desktop_banner" name="desktop_banner" type="file"
                                            accept="image/*">
                                </div>
                                <span class="caption_note">Note: uploaded images have a maximum size of <strong> 1920x500</strong> pixels and can't be over 512kb</span>
                                @error('desktop_banner')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Banner Attribute</label>
                                <input type="text" name="banner_attribute"
                                        id="banner_attribute"
                                        placeholder="Alt='Product Thumbnail Attribute'"
                                        class="form-control placeholder-cls" autocomplete="off"
                                        value="{{ isset($product)?$product->banner_attribute:'' }}">
                                @error('banner_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> About This Item</label>
                                <textarea name="about_this_item" id="about_this_item"
                                          placeholder="About This Item" class="form-control required  tinyeditor"
                                          autocomplete="off">{{ isset($product)?$product->about_item:'' }}</textarea>
                                <div class="help-block with-errors" id="about_this_item_error"></div>
                                @error('about_this_item')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Featured Image</label>
                                <div class="file-loading">
                                    <input id="featured_image" name="featured_image" type="file"
                                            accept="image/*">
                                </div>
                                <span class="caption_note">Note: uploaded images have a maximum size of <strong> 900x830</strong> pixels and can't be over 512kb</span>
                                @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> Featured Attribute</label>
                                <input type="text" name="featured_image_attribute"
                                        id="featured_image_attribute"
                                        placeholder="Alt='Product Thumbnail Attribute'"
                                        class="form-control placeholder-cls" autocomplete="off"
                                        value="{{ isset($product)?$product->featured_image_attribute:'' }}">
                                @error('featured_image_attribute')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-12">
                                <label> Feature Description*</label>
                                <textarea name="feature_description" id="feature_description"
                                          placeholder="Feture Description" class="form-control  tinyeditor"
                                          autocomplete="off">{{ isset($product)?$product->featured_description:'' }}</textarea>
                                <div class="help-block with-errors" id="feature_description_error"></div>
                                @error('feature_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                         
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label> Product Type*</label>
                                <select name="type" id="type" 
                                        class="form-control  required">
                                    <option value="">Select product type </option>
                                    @foreach($productTypes as $productType)
                                        <option value="{{$productType->id}}"
                                            {{ (@$productType->id==@$product->product_type_id)?'selected':'' }}
                                        >{{$productType->title}}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors" id="type_error"></div>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 mount_div">
                                <br>
                                <div class="form-check">
                                    &nbsp; &nbsp;&nbsp; &nbsp; <input class="form-check-input mount" type="radio" name="mount" id="mount" {{@$product->mount == 'Yes' ? 'checked':''}}>
                                    <label class="form-check-label" for="mount">
                                      With Mount&nbsp; &nbsp;
                                    </label> &nbsp; &nbsp; &nbsp;
                                    <input class="form-check-input mount" type="radio" name="mount" id="mount"{{@$product->mount == 'No' ? 'checked':''}} >
                                    <label class="form-check-label" for="mount">
                                     No Mount
                                    </label>
                                  </div>
                                  <div class="form-check">
                                  </div>
                            </div>
                            <div class="form-group col-md-3 ">
                                <label> Frame Colour</label>
                                <select name="frame_color[]" id="frame_color"  class="form-control select2 required" multiple>
                                    <option value="">Select Frame Colour </option>
                                    @foreach($frames as $frame)
                                        <option value="{{$frame->id}}"  {{ (@$frame->id==@$product->frame_id)?'selected':'' }} >{{$frame->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 ">
                                <label> Shapes</label>
                                <select name="shapes[]" id="shapes"  class="form-control select2 required" multiple>
                                    <option value="">Select Shapes </option>
                                    @foreach($shapes as $shape)
                                        <option value="{{$shape->id}}"  {{ (@$shape->id==@$product->shape_id)?'selected':'' }} >{{$shape->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <table class="table table-active">
                                <thead>
                                    <th>Size </th>
                                    <th> Price </th>
                             
                                </thead>
                                @if (!isset($product))
                                <tbody>
                                    @foreach ($sizes as $size)
                                    <tr>
                                        <td>
                                            {{$size->title}}
                                        </td>
                                        <td>
                                            <input type="text" name="price[{{$size->id}}]" id="price" class="form-control" value="{{isset($product)?$product->price:''}}">

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
                                                <input type="text" name="price[{{$size->id}}]" id="price" class="form-control" value="{{isset($price)?$price->price:''}}">
    
                                            </td>
                                          
                                        </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label> Meta Title</label>
                                <textarea class="form-control" id="meta_title" name="meta_title" rows="4"
                                          placeholder="Meta Title">{{ isset($product)?$product->meta_title:'' }}</textarea>
                                @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label> Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="4"
                                          placeholder="Meta Description">{{ isset($product)?$product->meta_description:'' }}</textarea>
                                @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label> Meta Keyword</label>
                                <textarea class="form-control" id="meta_keyword" name="meta_keyword" rows="4"
                                          placeholder="Meta Keyword">{{ isset($product)?$product->meta_keyword:'' }}</textarea>
                                @error('meta_keyword')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label> Other Meta Tag</label>
                                <textarea class="form-control" id="other_meta_tag" name="other_meta_tag" rows="4"
                                          placeholder="Other Meta Tag">{{ isset($product)?$product->other_meta_tag:'' }}</textarea>
                                @error('other_meta_tag')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save"
                               data-id="{{isset($product)?$product->id:''}}" value="Submit"
                               class="btn btn-primary pull-left submitBtn">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        @if(@$key)
                            <input type="hidden" value="{{@$key}}" name="copy">
                            <input type="hidden" value="{{@$product->id}}" name="copy_product_id">
                        @endif
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

        @if(isset($product))
        var type =$('#type').val();
        if (type == 1  || type == 3) {
            $('.mount_div').hide();
            $('.mount').attr('required', false).removeClass('required');
           
        } else {
            $('.mount_div').show();
            $('.mount').attr('required', true).addClass('required');
           
        }
        $('#similar_product_id').val([{{@$product->similar_product_id}}]).change();
        $('#shapes').val([{{@$product->shape_id}}]).change();
        $('#tag_id').val([{{@$product->tag_id}}]).change();
        $('#frame_color').val([{{@$product->frame_color}}]).change();
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
            minImageWidth: 1200,
            minImageHeight: 960,
            maxImageWidth: 1200,
            maxImageHeight: 960,
            maxFilesize: 540,
            showRemove: true,
            @if(isset($product) && $product->thumbnail_image!=NULL)
                initialPreview: ["{{asset($product->thumbnail_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($product->thumbnail_image!=NULL)?last(explode('/',$product->thumbnail_image)):''}}",
                    width: "120px",
                    key: "{{'product/thumbnail_image/'.$product->id.'/thumbnail_image_webp' }}",
                }],
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
            minImageHeight: 500,
            maxImageWidth: 1920,
            maxImageHeight: 500,
            showRemove: true,
            @if(isset($product) && $product->desktop_banner!=NULL)
                initialPreview: ["{{asset($product->desktop_banner)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($product->desktop_banner!=NULL)?last(explode('/',$product->desktop_banner)):''}}",
                    width: "120px",
                    key: "{{'product/desktop_banner/'.$product->id.'/desktop_banner_webp' }}",
                }],
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
            minImageWidth: 900,
            minImageHeight: 830,
            maxImageWidth: 900,
            maxImageHeight: 830,
            showRemove: true,
            @if(isset($product) && $product->featured_image!=NULL)
                initialPreview: ["{{asset($product->featured_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($product->featured_image!=NULL)?last(explode('/',$product->featured_image)):''}}",
                    width: "120px",
                    key: "{{'product/featured_image/'.$product->id.'/featured_image_webp' }}",
                }],
                @endif
        });
    });
</script>
@endsection