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
                            <li class="breadcrumb-item"><a
                                    href="{{url(Helper::sitePrefix().'location/'.$urlType)}}">{{$type}}</a></li>
                            <li class="breadcrumb-item active">{{$key}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Basic Information</h3>
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
                              
                                <div class="form-group col-md-{{($type=='Sub Category')?'4':'6'}}">
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control for_canonical_url required" autocomplete="off"
                                           value="{{ @$category->title }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-{{($type=='Sub Category')?'4':'6'}}">
                                    <label> Code*</label>
                                    <input type="text" name="code" id="code" placeholder="Code"
                                           class="form-control for_canonical_url required" autocomplete="off"
                                           value="{{ @$category->code }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                    @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Travel Sector*</label>
                                    <select name="travel_sector" id="travel_sector" class="form-control required">
                                        <option value="domestic" {{ (old('travel_sector', @$category->travel_sector) == 'domestic') ? 'selected' : '' }}>Domestic</option>
                                        <option value="International" {{ (old('travel_sector', @$category->travel_sector) == 'International') ? 'selected' : '' }}>International</option>
                                    </select>
                                    <div class="help-block with-errors" id="travel_sector_error"></div>
                                    @error('travel_sector')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Image*</label>
                                    <div class="file-loading">
                                        <input id="image" name="image" type="file">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 550 x 550px</span>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group col-md-12 mb-4">
                                            <label for="description">Description*</label>
                                            <textarea class="form-control tinyeditor required reset" id="description" class="required"
                                                    name="description">{!! isset($category)?$category->description:'' !!}</textarea>
                                            <div class="help-block with-errors" id="description_error"></div>
                                        </div>


                                <div class="form-group col-md-6">
                                    <label> Home Thumbnail Image*</label>
                                    <div class="file-loading">
                                        <input id="desktop_banner" name="desktop_banner" type="file">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 550 x 550px</span>
                                    @error('desktop_banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>
                               
                                
                                
                        </div>
                        
                       
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label> Meta Title</label>
                                                                                <textarea class="form-control" id="meta_title" name="meta_title"
                                                                                        placeholder="Meta Title">{{ isset($category)?$category->meta_title:'' }}</textarea>
                                                                                @error('meta_title')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label> Meta Description</label>
                                                                                <textarea class="form-control" id="meta_description" name="meta_description"
                                                                                        placeholder="Meta Description">{{ isset($category)?$category->meta_description:'' }}</textarea>
                                                                                @error('meta_description')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label> Meta Keyword</label>
                                                                                <textarea class="form-control" id="meta_keyword" name="meta_keyword"
                                                                                        placeholder="Meta Keyword">{{ isset($category)?$category->meta_keyword:'' }}</textarea>
                                                                                @error('meta_keyword')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label> Other Meta Tag</label>
                                                                                <textarea class="form-control" id="other_meta_tag" name="other_meta_tag"
                                                                                        placeholder="Other Meta Tag">{{ isset($category)?$category->other_meta_tag:'' }}</textarea>
                                                                                @error('other_meta_tag')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>                            
                             
                             
                       
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Clear</button>
                            <img class="animation__shake loadingImg" src="{{asset('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
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
                // minImageWidth: 550,
                // minImageHeight: 550,
                // maxImageWidth: 550,
                // maxImageHeight: 550,
                maxFileSize: 2500,
                showRemove: true,
                @if(isset($category) && $category->image!=NULL)
                initialPreview: ["{{asset($category->image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($category->image!=NULL)?last(explode('/',$category->image)):''}}",
                    width: "120px"
                }]
                @endif
            });

        });

        $("#desktop_banner").fileinput({
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
                // minImageWidth: 1000,
                // minImageHeight: 500,
                // maxImageWidth: 1920,
                // maxImageHeight: 500,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($category) && $category->desktop_banner!=NULL)
                initialPreview: ["{{asset($category->desktop_banner)}}",],
                initialPreviewConfig: [{
                    caption: "{{last(explode('/',$category->desktop_banner))}}",
                    width: "120px"
                }]
                @endif
            });

    </script>
@endsection
