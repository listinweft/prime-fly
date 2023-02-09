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
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'product/')}}">Product</a>
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
                            <h3 class="card-title">Overview</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(isset($productOverview) && $productOverview->isNotEmpty())
                                @foreach($productOverview as $overview)
                                    <div class="form-row" id="append_result_{{$loop->iteration}}">
                                        <div class="form-group col-md-10">
                                            <label for="inputPassword4">Title</label>
                                            <input type="text" maxlength="180" class="form-control" name="extra_key[]"
                                                   id="extra_key_{{$loop->iteration}}" placeholder="Key"
                                                   value="{{ $overview->title }}">
                                            @error('extra_key')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-2" style="margin-top: 10px">
                                            <a href="javascript:void(0);"
                                               class="btn btn-success mt-4 add_overview_row btn-sm add_{{$loop->iteration}}"
                                               id="{{$loop->iteration}}"
                                               style="display: {{($loop->last)?'inline-block':'none'}};">
                                                <i class="fa fa-plus fa-lg"></i></a>
                                            <a href="javascript:void(0);"
                                               class="btn btn-danger mt-4 remove_overview_row btn-sm"
                                               id="{{$loop->iteration}}"
                                               ref="{{ $overview->id }}"><i class="fa fa-times fa-lg"></i></a>
                                            <input type="hidden" name="detail_id[]" id="detail_id_{{$loop->iteration}}"
                                                   value="{{ $overview->id }}">
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-row" id="append_result_1">
                                    <div class="form-group col-md-10">
                                        <label for="inputPassword4">Title</label>
                                        <input type="text" class="form-control" name="extra_key[]" id="extra_key_1"
                                               placeholder="Title" maxlength="180">
                                        @error('extra_key')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-2" style="margin-top: 10px">
                                        <a href="javascript:void(0);"
                                           class="btn btn-success mt-4 add_overview_row btn-sm add_1" id="1"><i
                                                class="fa fa-plus fa-lg"></i></a>
                                        <input type="hidden" name="detail_id[]" id="detail_id_1" value="0">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <input type="hidden" name="product_id" id="product_id" value="{{$id}}">
                            <img class="animation__shake loadingImg" src="{{url('backend/dist/img/loading.gif')}}"
                                 style="display:none;">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
