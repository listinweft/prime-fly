@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Comments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Comment</li>
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
                        @include('Admin.includes._heading_form',['type'=>'blog'])
                        <div class="card card-success card-outline">
                            <!-- <div class="card-header">
                                <a href="{{url(Helper::sitePrefix().'blog/create')}}"
                                   class="btn btn-success pull-right">Add Blog <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                            </div> -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Comment</th>
                                      
                                       
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogList as $blog)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $blog->content }}</td>
                                          
                                            
                                         
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url(Helper::sitePrefix().'comment/edit/'.$blog->id)}}"
                                                       class="btn btn-success mr-2 tooltips" title="Edit Comment"><i
                                                            class="fas fa-edit"></i></a>
                                                            <a href="{{url(Helper::sitePrefix().'comment/show/'.$blog->id)}}"
                                                       class="fa fa-eye fa-lg" title="show Comment"><i
                                                            ></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       title="Delete Comment" data-url="comment/delete"
                                                       data-id="{{$blog->id}}"><i class="fas fa-trash"></i></a>
                                                </div>
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
