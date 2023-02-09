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
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'/dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'/product/product_list')}}">Product</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{url(Helper::sitePrefix().'product/offer/'.$product->id)}}">{{$product->title}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{$title}}</li>
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
                            <h3 class="card-title">Offer Form</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> Title*</label>
                                    <input type="text" name="title" id="title" placeholder="Title"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($offer)?$offer->title:'' }}">
                                    <div class="help-block with-errors" id="title_error"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Price*</label>
                                    <input type="number" name="price" id="price" placeholder="Price"
                                           class="form-control required" step=".01" min="0" max="{{$product->price}}"
                                           value="{{ isset($offer)?$offer->price:'' }}">
                                    <div class="help-block with-errors" id="price_error"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label> Sale Condition</label>
                                    <textarea name="sale_condition" id="sale_condition" placeholder="Sale Condition"
                                              class="form-control"
                                              autocomplete="off">{{ isset($offer)?$offer->sale_condition:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Start Date*</label>
                                    <input type="date" max="2999-12-31" name="start_date" id="start_date"
                                           placeholder="Start Date"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($offer)?$offer->start_date:'' }}">
                                    <div class="help-block with-errors" id="start_date_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> End Date*</label>
                                    <input type="date" max="2999-12-31" name="end_date" id="end_date"
                                           placeholder="Start Date"
                                           class="form-control required" autocomplete="off"
                                           value="{{ isset($offer)?$offer->end_date:'' }}">
                                    <div class="help-block with-errors" id="end_date_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="btn_save" value="Submit"
                                   class="btn btn-primary pull-left submitBtn">
                            <input type="hidden" name="id" id="id" value="{{ isset($offer)?$offer->id:'0' }}">
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
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
