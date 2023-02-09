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
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Menu Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" user_type="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger" user_type="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Menu Type*</label>
                                    <select name="menu_type" id="menu_type" class="form-control required"
                                            placeholder="Menu Type">
                                        <option value="static" {{ (@$menu->menu_type=="static")?'selected':'' }}>
                                            Static
                                        </option>
                                        <option value="category" {{ (@$menu->menu_type=="category")?'selected':'' }}>
                                            Category
                                        </option>
                                    </select>
                                    <div class="help-block with-errors" id="menu_type_error"></div>
                                </div>
                                {{-- <div class="form-group col-md-6 static"
                                     style="display: {{ (@$menu->menu_type=='category')?'none':'block' }}">
                                    <label> Static Links*</label>
                                    <select name="static_link" id="static_link" class="form-control"
                                            placeholder="Static Links">
                                        <option value="custom" {{ (@$menu->static_link=="custom")?'selected':'' }}>
                                            Custom Link
                                        </option>
                                    </select>
                                    <div class="help-block with-errors" id="static_link_error"></div>
                                </div> --}}
                                <div class="form-group col-md-6 category"
                                     style="display: {{ (@$menu->menu_type=='category')?'block':'none' }}">
                                    <label> Categories*</label>
                                    <select class="form-control menu_category_id" id="menu_category_id"
                                            name="menu_category_id">
                                        <option value="">Select Option</option>
                                        @foreach($categories as $category)
                                            <option data-url="{{$category->short_url}}"
                                                    value="{{ $category->id }}" {{ (@$menu->category_id==$category->id)?'selected':'' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="menu_category_id_error"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control for_canonical_url required" autocomplete="off"
                                           value="{{ @$menu->title }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> URL*</label>
                                    <input type="text" name="url" id="url" placeholder="URL"
                                           class="form-control required menu_url" autocomplete="off"
                                           value="{{ @$menu->url }}">
                                    <div class="help-block with-errors" id="url_error"></div>
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
@endsection
