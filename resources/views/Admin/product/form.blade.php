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
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
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
                                           value="{{ isset($product)?$product->title:'' }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
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
                                <div class="form-group col-md-6">
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
                                <div class="form-group col-md-6">
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
                                <div class="form-group col-md-6">
                                    <label> Sub Category</label>
                                    <select class="form-control select2" name="sub_category[]"
                                            id="sub_category" multiple>
                                        @if(isset($subCategories))
                                            @foreach($subCategories as $second)
                                                <option value="{{$second->id}}"
                                                    {{($second->id==@$product->sub_category_id)?'selected':''}}
                                                >{{$second->title}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('sub_category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Capacity</label>
                                    <input type="text" name="capacity" id="capacity" placeholder="Capacity"
                                           class="form-control " autocomplete="off"
                                           value="{{ isset($product)?$product->capacity:'' }}">
                                    <div class="help-block with-errors" id="capacity_error"></div>
                                    @error('capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
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
                            </div>


                            <div class="form-row" id="availability_div"
                                 style="display: {{(@$product->availability=='Out of stock')?'none':''}};">
                                <div class="form-group col-md-6">
                                    <label> Stock*</label>
                                    <input type="text" name="stock" id="stock" placeholder="Stock"
                                           class="form-control {{(@$product->availability=='Out of Stock')?'':'required'}}"
                                           autocomplete="off" value="{{ isset($product)?$product->stock:'2' }}">
                                    <div class="help-block with-errors" id="stock_error"></div>
                                    @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Alert Quantity *</label>
                                    <input type="text" name="alert_quantity" id="alert_quantity"
                                           placeholder="Alert Quantity"
                                           class="form-control {{(@$product->quantity=='Out of Stock')?'':'required'}}"
                                           autocomplete="off"
                                           value="{{ isset($product)?$product->alert_quantity:'1' }}">
                                    <div class="help-block with-errors" id="alert_quantity_error"></div>
                                    @error('alert_quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label> Color*</label>
                                    <select name="color" id="color"
                                            class="form-control select2 required">
                                        <option value="">Select Color</option>
                                        @foreach($colors as $color)
                                            <option
                                                value="{{ $color->id }}" {{ (@$product->color_id==$color->id)?'selected':'' }}>{{ $color->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="color_error"></div>
                                    @error('color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label> Price*</label>
                                    <input type="text" name="price" id="price" placeholder="Price"pattern="[0-9]+"
                                           class="form-control required" step=".01" min="0"
                                           value="{{ isset($product)?$product->price:'' }}">
                                    <div class="help-block with-errors" id="price_error"></div>
                                    @error('price')
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
                            {{--                            <div class="form-row">--}}
                            {{--                                <div class="form-group col-md-6">--}}
                            {{--                                    <label> Measurement Unit*</label>--}}
                            {{--                                    <select name="measurement_unit" id="measurement_unit"--}}
                            {{--                                            class="form-control select2 required">--}}
                            {{--                                        <option value="">Select Measurement Unit</option>--}}
                            {{--                                        @foreach($measurement_units as $measurement_unit)--}}
                            {{--                                            <option--}}
                            {{--                                                value="{{ $measurement_unit->id }}" {{ (@$product->measurement_unit_id==$measurement_unit->id)?'selected':'' }}>{{ $measurement_unit->title }}</option>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </select>--}}
                            {{--                                    <div class="help-block with-errors" id="measurement_unit_error"></div>--}}
                            {{--                                    @error('measurement_unit')--}}
                            {{--                                    <div class="invalid-feedback">{{ $message }}</div>--}}
                            {{--                                    @enderror--}}
                            {{--                                </div>--}}
                            {{--                                <div class="form-group col-md-6">--}}
                            {{--                                    <label> Quantity(weight/size/pieces)*</label>--}}
                            {{--                                    <input type="text" name="quantity" id="quantity" placeholder="Quantity"--}}
                            {{--                                           class="form-control required"--}}
                            {{--                                           value="{{ isset($product)?$product->quantity:'' }}">--}}
                            {{--                                    <div class="help-block with-errors" id="quantity_error"></div>--}}
                            {{--                                    @error('quantity')--}}
                            {{--                                    <div class="invalid-feedback">{{ $message }}</div>--}}
                            {{--                                    @enderror--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-row">--}}
                            {{--                                <div class="form-group col-md-6">--}}
                            {{--                                    <label> Brand*</label>--}}
                            {{--                                    <select name="brand" id="brand" class="form-control select2 required">--}}
                            {{--                                        <option value="">Select Brand</option>--}}
                            {{--                                        @foreach($brands as $brand)--}}
                            {{--                                            <option value="{{ $brand->id }}"--}}
                            {{--                                                {{ (@$product->brand_id==$brand->id)?'selected':'' }}--}}
                            {{--                                            >{{ $brand->title }}</option>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </select>--}}
                            {{--                                    <div class="help-block with-errors" id="brand_error"></div>--}}
                            {{--                                    @error('brand')--}}
                            {{--                                    <div class="invalid-feedback">{{ $message }}</div>--}}
                            {{--                                    @enderror--}}
                            {{--                                </div>--}}

                            {{--                            </div>--}}

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Similar Product</label>
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

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Product Thumbnail Image*</label>
                                    <div class="file-loading">
                                        <input id="thumbnail_image" name="thumbnail_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span
                                        class="caption_note">Note: Image size should be minimum of 1000 x 1000</span>
                                    @error('thumbnail_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Product Thumbnail Attribute</label>
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
                                <div class="form-group col-md-12">
                                    <label> Featured Video URL</label>
                                    <input type="text" name="featured_video_url" id="featured_video_url"
                                           placeholder="Featured Video URL"
                                           class="form-control " autocomplete="off"
                                           value="{{ isset($product)?$product->featured_video_url:'' }}">
                                    <div class="help-block with-errors" id="feature_video_url_error"></div>
                                    @error('feature_video_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row" id="featured_image_div">
                                <div class="form-group col-md-6">
                                    <label> Featured Image</label>
                                    <div class="file-loading">
                                        <input id="featured_image" name="featured_image" type="file"
                                               accept="image/*">
                                    </div>
                                    <span
                                        class="caption_note">Note: Image dimension must be 1131 x 604 PX and Size must be less than 512 KB</span>
                                    @error('thumbnail_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Featured Image Attribute</label>
                                    <input type="text" name="featured_image_attribute"
                                           id="featured_image_attribute"
                                           placeholder="Alt='Featured Image Attribute'"
                                           class="form-control placeholder-cls" autocomplete="off"
                                           value="{{ isset($product)?$product->featured_image_attribute:'' }}">
                                    @error('thumbnail_image_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                       

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Featured Description</label>
                                    <textarea name="featured_description" id="featured_description"
                                              placeholder="Featured Description" class="form-control tinyeditor"
                                              autocomplete="off">{{ isset($product)?$product->featured_description:'' }}</textarea>
                                    <div class="help-block with-errors" id="featured_description_error"></div>
                                    @error('featured_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Product Manual</label>
                                    <div class="file-loading">
                                        <input id="product_manual" name="product_manual" type="file" accept="application/pdf">
                                    </div>
                                                                           <span class="caption_note">Note: Size should be minimum of 512kb

                                                                            
                                                                           </span>
                                    @error('product_manual')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label> Banner Attribute</label>
                                    <input type="text" class="form-control placeholder-cls" id="banner_attribute"
                                           name="banner_attribute" placeholder="Alt='Banner Attribute'"
                                           value="{{ isset($product)?$product->banner_attribute:'' }}">
                                    @error('banner_attribute')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{--                            <div class="form-row">--}}
                            {{--                                <div class="form-group col-md-4">--}}
                            {{--                                    <label> Banner Title</label>--}}
                            {{--                                    <input type="text" name="banner_title" id="banner_title"--}}
                            {{--                                           placeholder="Banner Title"--}}
                            {{--                                           class="form-control" autocomplete="off"--}}
                            {{--                                           value="{{ isset($product)?$product->banner_title:'' }}">--}}
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
                            {{--                                           value="{{ isset($product)?$product->banner_sub_title:'' }}">--}}
                            {{--                                    <div class="help-block with-errors" id="banner_sub_title_error"></div>--}}
                            {{--                                    @error('banner_sub_title')--}}
                            {{--                                    <div class="invalid-feedback">{{ $message }}</div>--}}
                            {{--                                    @enderror--}}
                            {{--                                </div>--}}

                            {{--                            </div>--}}
                            <div class="form-row">
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
                            </div>
                            <div class="form-row">
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
                                <div class="form-group col-md-6">
                                    <label> Product Type </label>
                                    <select name="product_type" id="product_type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="All" @if(@$product->type=="All") selected @endif>All</option>
                                        <option value="Ecommerce"  @if(@$product->type=="Ecommerce") selected @endif >E-Commerce</option>
                                        <option value="Corporative"  @if(@$product->type=="Corporative") selected @endif >Corprate</option>
                                    </select>
                                    @error('related_product_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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


                            {{--                            <div class="form-row">--}}
                            {{--                                <div class="form-group col-md-6">--}}
                            {{--                                    <label> Add Ons </label>--}}
                            {{--                                    <select name="addon_id[]" multiple id="addon_id" class="form-control select2">--}}
                            {{--                                        @foreach($products as $addon)--}}
                            {{--                                            <option value="{{ $addon->id }}">{{ $addon->title }}</option>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </select>--}}
                            {{--                                    @error('addon_id')--}}
                            {{--                                    <div class="invalid-feedback">{{ $message }}</div>--}}
                            {{--                                    @enderror--}}
                            {{--                                </div>--}}
                            {{--                                <div class="form-group col-md-6">--}}
                            {{--                                    <label> Tags </label>--}}
                            {{--                                    <select name="tag_id[]" multiple id="tag_id" class="form-control select2">--}}
                            {{--                                        @foreach($tags as $tag)--}}
                            {{--                                            <option value="{{ ($tag->id ) }}">{{ $tag->title }}</option>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </select>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
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
