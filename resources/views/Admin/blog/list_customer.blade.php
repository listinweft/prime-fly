@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Customer Posts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Customer posts</li>
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
                            
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Member</th>
                                        <th>type</th>
                                     
                                          <th>Pdf</th>
                                          <th>status</th>
                                        <th>action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogList as $blog)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>

                                            <td>{{$blog->user->customer->first_name ?? 'Customer Not Found'}}
</td>
                                          <td>  {{ $blog->type }}</td>
                                       
                                      
                                      
                                          
                                         
                                           <td>  <a href="{{ route('pdf.show', ['id' => $blog->id]) }}" download>Download PDF</a></td>
                                           <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           data-url="/status-change" data-table="CustomerPost"
                                                           data-field="status" data-pk="{{ $blog->id}}"
                                                        {{($blog->status=="Active")?'checked':''}}>
                                                    <span class="slider"></span>
                                                </label>
                                            </td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                   
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       title="Delete Blog" data-url="blog/deletes"
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
