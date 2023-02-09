@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Latest Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Product List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
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
                        <div class="card card-success card-outline">
                            <div class="card-header">

                         

                                <a href="{{url(Helper::sitePrefix().'home-ecommerce/latest/create')}}"
                                   class="btn btn-success pull-right">Manage Latest Products <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>


                                                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productList as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>
                                                @foreach($product->product_categories as $product_category)
                                                    {{ $product_category->title }}
                                                    {{ !$loop->last ? ',': ''}}
                                                @endforeach
                                            </td>
                                           
                                            
                                           
                                            
                                        
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
