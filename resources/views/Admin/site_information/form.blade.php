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
                            <h3 class="card-title">Site Information Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            
                           
                           
                               
                             
                              
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-5">
                                    <label for="privacy_policy">Privacy Policy</label>
                                    <textarea name="privacy_policy" id="privacy_policy"
                                              placeholder="Privacy Policy"
                                              class="form-control tinyeditor" autocomplete="off">
                                        {{ old('privacy_policy', !empty($siteInformation)?$siteInformation->privacy_policy:'') }}</textarea>
                                </div>
                                <div class="form-group col-md-12 mb-5">
                                    <label for="terms_and_conditions">Terms & Conditions</label>
                                    <textarea name="terms_and_conditions" id="terms_and_conditions"
                                              placeholder="Terms & Conditions" class="form-control tinyeditor"
                                              autocomplete="off">
                                        {{ old('terms_and_conditions', !empty($siteInformation)?$siteInformation->terms_and_conditions:'') }}</textarea>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="logo"> Logo*</label>
                                    <div class="file-loading">
                                        <input id="logo" name="logo" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: uploaded images have a maximum size of <strong> 441x75</strong> pixels and can't be over 5KB</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="logo_meta_tag"> Logo Attribute *</label>
                                    <input type="text" id="logo_attribute" name="logo_attribute"
                                           class="form-control required placeholder-cls"
                                           placeholder="Alt='Logo Attribute'"
                                           maxlength="230"
                                           value="{{ !empty($siteInformation)?$siteInformation->logo_attribute:'' }}">
                                       
                             
                                    <div class="help-block with-errors" id="logo_attribute_error"></div>
                                </div>
                            </div>
                               
                                <!-- <div class="form-group col-md-6">
                                    <label for="privacy_policy">Contact Detail</label>
                                    <textarea name="contact" id="contact"
                                              placeholder="Contact Detail"
                                              class="form-control tinyeditor" autocomplete="off">
                                        {{ old('contact', !empty($siteInformation)?$siteInformation->contact:'') }}</textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="privacy_policy">Disclaimer</label>
                                    <textarea name="disclaimer" id="disclaimer"
                                              placeholder="Disclaimer"
                                              class="form-control tinyeditor" autocomplete="off">
                                        {{ old('disclaimer', !empty($siteInformation)?$siteInformation->disclaimer:'') }}</textarea>
                                </div>
                              
                                <div class="form-group col-md-12">
                                    <label for="privacy_policy">Faq's</label>
                                    <textarea name="faq" id="faq"
                                              placeholder="FAQ's"
                                              class="form-control tinyeditor" autocomplete="off">
                                        {{ old('faq', !empty($siteInformation)?$siteInformation->faq:'') }}</textarea>
                                </div> -->
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <input type="hidden" name="id" id="id"
                                   value="{{ !empty($siteInformation)?$siteInformation->id:'0' }}">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#logo").fileinput({
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
               
              
                // showRemove: true,
                @if(!empty($siteInformation) && $siteInformation->logo!=NULL)
                initialPreview: ["{{asset($siteInformation->logo)}}",],
                initialPreviewConfig: [{
                    caption: "{{ ($siteInformation->logo!=NULL)?last(explode('/',$siteInformation->logo)):''}}",
                    width: "120px"
                }]
                @endif
            });
        });
    </script>
@endsection
