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
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'faq')}}">FAQ</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
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
                            <h3 class="card-title">FAQ Form</h3>
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
                                    <label for="question">Question*</label>
                                    <input type="text" name="question" id="question"
                                           placeholder="Question" maxlength="230" required
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($faq)?$faq->question:'' }}">
                                    <div class="help-block with-errors" id="question_error"></div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="answer">Answer*</label>
                                    <textarea class="form-control tinyeditor required" id="answer"
                                              name="answer" placeholder="Answer"
                                    >{{ isset($faq)?$faq->answer:'' }}</textarea>
                                    <div class="help-block with-errors" id="answer_error"></div>
                                </div>

                                <div class="form-group col-md-12">
    <label for="type">Type*</label>
    <div>
        <label class="radio-inline">
            <input type="radio" name="type" value="location" 
                   {{ (isset($faq) && $faq->type === 'location') || !isset($faq) ? 'checked' : '' }}>
            Location
        </label>
        <label class="radio-inline">
            <input type="radio" name="type" value="service"
                   {{ isset($faq) && $faq->type === 'service' ? 'checked' : '' }}>
            Service
        </label>
    </div>
    <div class="help-block with-errors" id="type_error"></div>
</div>

<div class="form-group col-md-12" id="service_dropdown" style="display: none;">
    <label for="service">Service*</label>
    <select class="form-control required" id="service" name="service">
        <option value="" disabled selected>Select a service</option>
        @foreach($services as $service)
            <option value="{{ $service->id }}" 
                {{ isset($faq) && $faq->service_id == $service->id ? 'selected' : '' }}>
                {{ $service->title }}
            </option>
        @endforeach
    </select>
    <div class="help-block with-errors" id="service_error"></div>
</div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <img class="animation__shake loadingImg" src="{{asset('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

 
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize display state based on current selection
        toggleServiceDropdown();

        // Add event listeners to the radio buttons
        const typeRadios = document.querySelectorAll('input[name="type"]');
        typeRadios.forEach(radio => {
            radio.addEventListener('change', toggleServiceDropdown);
        });

        function toggleServiceDropdown() {
            const selectedType = document.querySelector('input[name="type"]:checked').value;
            const serviceDropdown = document.getElementById('service_dropdown');
            
            if (selectedType === 'service') {
                serviceDropdown.style.display = 'block';
            } else {
                serviceDropdown.style.display = 'none';
            }
        }
    });
</script>
