@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Permission</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Administration</li>
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
                                <!-- <a href="{{url(Helper::sitePrefix().'administration/assign-locations')}}"
                                   class="btn btn-success pull-right">Add permission <i
                                        class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a> -->
                            </div>
                            <div class="card-body">
                                <table class="dataTable table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <!-- <th>Status</th> -->
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adminList as $admin)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->role}}</td>
                                            <td>{{$admin->user->email}}</td>
                                            <!-- <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status_check"
                                                           {{($admin->user->status=="Active")?'checked':''}} data-table="User"
                                                           data-url="/status-change" data-field="status"
                                                           data-pk="{{ $admin->user->id}}">
                                                    <span class="slider"></span>
                                                </label>
                                            </td> -->
                                            <td>{{ date("d-M-Y", strtotime($admin->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                @if($admin->id!=Auth::id())
                                                    <a href="{{url(Helper::sitePrefix().'administration/edit-assign/'.$admin->user->id)}}"
                                                       class="btn btn-success mr-2 tooltips"
                                                       title="Assign {{$admin->role}}"><i class="fas fa-edit"></i></a>
                                                       @endif
                                                    @if($admin->id!=Auth::id())
                                                        <a href="#" class="btn btn-warning mr-2 reset_entry tooltips reset_entry"
                                                           data-url="administration/delete-assign"
                                                           data-id="{{$admin->user->id}}" title="Reset {{$admin->role}}"><i
                                                                class="fas fa-undo"></i></a>
                                                    @endif
                                                   
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
