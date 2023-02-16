@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Featured Products</h1>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card card-success card-outline">
                            <div class="card-body">
                                <table id="recordsReport" class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>SKU</th>
                                        <th>Status</th>
                                        {{--<th>Color</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1 @endphp @foreach($productList as $product)
                                        @php
                                            $colorData = App\Models\Color::find($product->id);
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $product->title }}</a></td>
                                            <td>{{ $product->sku }}</td>
                                            <td><span
                                                    style="color:{{ ($product->status=='Active')?'green':'red' }}">{{ $product->status }}</span>
                                            </td>
                                            {{--<td>{{ ($colorData)?$colorData->title:'' }}</td>--}}
                                        </tr>
                                        @php $i++;@endphp
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
