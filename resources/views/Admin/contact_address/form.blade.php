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
                            <h3 class="card-title">Contact-Us Page Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Location*</label>
                                    <input type="text" name="location" id="location" placeholder="Location"
                                           class="form-control required" autocomplete="off"
                                           value="{{ !empty($contact)?$contact->location: old('location') }}"
                                           maxlength="230">
                                    <div class="help-block with-errors" id="location_error"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Address </label>
                                    <textarea name="address" id="address" placeholder="Address"
                                              class="form-control tinyeditor"
                                              autocomplete="off">{{ @$contact->address }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Working Time</label>
                                    <textarea name="working_hours" id="working_hours" placeholder="Working Hours"
                                              class="form-control tinyeditor" autocomplete="off"
                                    >{{ !empty($contact)?$contact->working_time: old('working_time') }}</textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Email*</label>
                                    <input type="email" name="email" id="email" class="form-control required"
                                           placeholder="Email"
                                           value="{{ !empty($contact)?$contact->email:old('email') }}"
                                           maxlength="230">
                                    <div class="help-block with-errors" id="email_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Alternate Email</label>
                                    <input type="email" name="alternate_email" id="alternate_email"
                                           class="form-control" placeholder="Alternate Email"
                                           value="{{ !empty($contact)?$contact->alternate_email:old('alternate_email') }}"
                                           maxlength="230">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Email Recipient Name*</label>
                                    <input type="text" name="email_recipient" id="email_recipient"
                                           class="form-control required"
                                           placeholder="Email Recipient Name"
                                           value="{{ !empty($contact)?$contact->email_recipient:old('email_recipient') }}"
                                           maxlength="230">
                                    <div class="help-block with-errors" id="email_recipient_error"></div>
                                </div>
                            <div class="form-group col-md-6">
                                <label> Whatsapp Number</label>
                                <input type="text" name="whatsapp_number" id="whatsapp_number"
                                       class="form-control phoneField" placeholder="Whatsapp Number"
                                       value="{{ !empty($contact)?$contact->whatsapp_number:old('whatsapp_number') }}" minlength="7"
                                       maxlength="15">
                                <div class="help-block with-errors" id="whatsapp_number_error"></div>
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Phone Number</label>
                                    <input type="text" name="phone" id="phone"
                                           placeholder="Phone Number" class="form-control phoneField" autocomplete="off"
                                           value="{{ !empty($contact)?$contact->phone:old('phone') }}" minlength="7"
                                           maxlength="15">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Alternate Phone Number</label>
                                    <input type="text" name="alternate_phone" id="alternate_phone"
                                           placeholder="Alternate Phone Number" class="form-control phoneField"
                                           autocomplete="off"
                                           value="{{ !empty($contact)?$contact->alternate_phone:old('alternate_phone') }}" minlength="7"
                                           maxlength="15">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Facebook</label>
                                    <input type="text" name="facebook_url" id="facebook_url" class="form-control"
                                           placeholder="Facebook"
                                           value="{{ !empty($contact)?$contact->facebook_url:old('facebook_url') }}" maxlength="230">
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Instagram</label>
                                    <input type="text" name="instagram_url" id="instagram_url" class="form-control"
                                           placeholder="Instagram"
                                           value="{{ !empty($contact)?$contact->instagram_url:old('instagram_url') }}"
                                           maxlength="230">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Twitter</label>
                                    <input type="text" name="twitter_url" id="twitter_url" class="form-control"
                                           placeholder="Twitter"
                                           value="{{ !empty($contact)?$contact->twitter_url:old('twitter_url') }}"
                                           maxlength="230">
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Linkedin</label>
                                    <input type="text" name="linkedin_url" id="linkedin_url" class="form-control"
                                           placeholder="Linkedin"
                                           value="{{ !empty($contact)?$contact->linkedin_url:old('linkedin_url') }}" maxlength="230">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Youtube</label>
                                    <input type="text" name="youtube_url" id="youtube_url" class="form-control"
                                           placeholder="Youtube"
                                           value="{{ !empty($contact)?$contact->youtube_url:old('youtube_url') }}"
                                           maxlength="230">
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Pinterest</label>
                                    <input type="text" name="pinterest_url" id="pinterest_url" class="form-control"
                                           placeholder="Pinterest"
                                           value="{{ !empty($contact)?$contact->pinterest_url:old('pinterest_url') }}"
                                           maxlength="230">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Snapchat</label>
                                    <input type="text" name="snapchat_url" id="snapchat_url" class="form-control"
                                           placeholder="Snapchat"
                                           value="{{ !empty($contact)?$contact->snapchat_url: old('snapchat_url')}}" maxlength="230">
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Google Map</label>
                                    <input type="text" name="google_map" id="google_map" class="form-control"
                                           placeholder="Google Map"
                                           value="{{ !empty($contact)?$contact->google_map:old('google_map') }}">
                                    <span
                                        style='color:green;font-size:14px;'>Note: src from google map iframe</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <input type="hidden" name="id" id="id" value="{{ !empty($contact)?$contact->id:'0' }}">
                            <img class="animation__shake loadingImg" src="{{url('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
