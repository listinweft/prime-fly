@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> {{$adminData->role}} - Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            @if(isset($title))
                                <li class="breadcrumb-item">
                                    <a href="{{url(Helper::sitePrefix().'administration')}}">Admin list</a>
                                </li>
                            @endif
                            <li class="breadcrumb-item active">{{$adminData->role}} - Profile</li>
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
                            <h3 class="card-title">Basic Information</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control required" name="name" placeholder="Name"
                                           id="name" value="{{ old('name', @$adminData->name) }}">
                                    <div class="help-block with-errors" id="name_error"></div>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="username">Username*</label>
                                    <input type="text" name="username" id="username" placeholder="Username"
                                           class="form-control required" autocomplete="off"
                                           value="{{ old('username', @$adminData->user->username) }}">
                                    <div class="help-block with-errors" id="username_error"></div>
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" class="form-control required" id="phone"
                                           name="phone" placeholder="Phone Number"
                                           value="{{ old('phone', @$adminData->user->phone) }}">
                                    <div class="help-block with-errors" id="phone_error"></div>
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image_attribute"> Profile Image Attribute</label>
                                    <input type="text" name="image_attribute" id="image_attribute"
                                           placeholder="Alt='Image Attribute'"
                                           class="form-control required placeholder-cls" autocomplete="off"
                                           value="{{ old('image_attribute',@$adminData->user->image_attribute) }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="profile_image">Profile Image</label>
                                    <div class="file-loading">
                                        <input id="profile_image" name="profile_image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 300x300</span>
                                    @error('profile_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Authentication Credentials</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email*</label>
                                    <input type="email" class="form-control required" id="email" name="email"
                                           placeholder="Email" readonly
                                           value="{{ old('email', @$adminData->user->email) }}">
                                    <div class="help-block with-errors" id="email_error"></div>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Cancel</button>
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
            $("#profile_image").fileinput({
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
                minImageWidth: 300,
                minImageHeight: 300,
                maxImageWidth: 300,
                maxImageHeight: 300,
                maxFilesize: 512,
                showRemove: true,
                @if(isset($adminData->user) && $adminData->user->profile_image!=NULL)
                initialPreview: ["{{asset($adminData->user->profile_image)}}",],
                initialPreviewConfig: [{
                    caption: "{{ last(explode('/',$adminData->user->profile_image))}}",
                    width: "120px",
                    key: "{{($adminData->user->profile_image)}}",
                }]
                @endif
            });
        });
    </script>
@endsection
