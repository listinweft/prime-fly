@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
       
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
                                @if($type=="Sub Category")
                                    <div class="form-group col-md-4">
                                        <label> Category*</label>
                                        <select class="form-control select2 required" name="parent_id" id="parent_id">
                                            <option value="">Select Option</option>
                                            @foreach($parentCategories as $parent)
                                                <option value="{{$parent->id}}"
                                                    {{($parent->id==@$category->parent_id)?'selected':''}}
                                                >{{$parent->title}}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors" id="parent_id_error"></div>
                                        @error('parent_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
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
                                
                            </div>

                            <div class="form-row">
                                
                            

                            </div>

                                    <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label> Short URL *</label>
                                    <input type="text" name="short_url" id="short_url" placeholder="Short URL"
                                        class="form-control required" autocomplete="off"
                                        value="{{ isset($category)?$category->short_url:'' }}">
                                    <div class="help-block with-errors" id="short_url_error"></div>
                                    @error('short_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                               



                                </div>


                               

                                @if($type=="Category")

                            <div class="form-group col-md-6">
                                        <label>Image</label>
                                        <div class="file-loading">
                                            <input id="image" name="image" type="file">
                                        </div>
                                        <span class="caption_note">Note: Image size must be 550x550px</span>
                                        @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                       <label> Desktop Banner*</label>
                                        <div class="file-loading">
                                          <input id="desktop_banner" name="desktop_banner" type="file"
                                                 accept="image/*">
                                       </div>                                       <span
                                          class="caption_note">Note: Image size should be minimum of 1920 x 340</span>                                      @error('desktop_banner')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                 </div>

                                 <div class="form-group col-md-4">
                                       <label> Icon Image*</label>
                                        <div class="file-loading">
                                          <input id="icon" name="icon" type="file"
                                                 accept="image/*">
                                       </div>                                       <span
                                          class="caption_note">Note: Image size should be minimum of 1920 x 340</span>                                      @error('icon')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                 </div>

                                 @endif
                                
                                
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
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
                required: false,
                allowedFileTypes: ['image'],
                // minImageWidth: 550,
                // minImageHeight: 550,
                // maxImageWidth: 550,
                // maxImageHeight: 550,
                maxFileSize: 512,
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

         $("#icon").fileinput({
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
                // minImageWidth: 550,
                // minImageHeight: 550,
                // maxImageWidth: 550,
                // maxImageHeight: 550,
                maxFileSize: 512,
                showRemove: true,
                @if(isset($category) && $category->icon!=NULL)
                initialPreview: ["{{asset($category->icon)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($category->icon!=NULL)?last(explode('/',$category->icon)):''}}",
                    width: "120px"
                }]
                @endif
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
                // minImageWidth: 1920,
                // minImageHeight: 500,
                // maxImageWidth: 1920,
                // maxImageHeight: 500,
                // maxFileSize: 512,
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
