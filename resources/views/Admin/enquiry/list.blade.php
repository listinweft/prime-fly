@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> Manage Enquiry</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Enquiry List</li>
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
                            <div class="box-header" style="height:50px;">
                                <div class="box-tools" style="margin-top: 8px;">
                                    <div class="col-sm-12">
                                        <div class="actions delete_btn" style="display: none;">
                                            <input type="hidden" name="ids" id="ids">
                                            <a href="javascript:void(0);" id="delete_multiple_item_btn"
                                               class="btn btn-danger"
                                               data-url="/enquiry/{{ $type == "bulk"?'bulk/':'' }}delete-multiple">
                                                <i class="fa fa-trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="recordsListView" class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th># <input type="checkbox" class="mt-2 ml-3" name="check_all" id="check_all">
                                        </th>
                                        <th>Name</th>
                                        @if($type == "bulk")
                                            <th>Product</th>
                                            <th>Type</th>
                                            <th>Frame</th>
                                            <th>Mount</th>
                                            <th>Size</th>
                                        @endif
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        {{-- <th>Subject</th> --}}
                                        <th>Message</th>
                                        <th>Reply</th>
                                        <th>Request URL</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($enquiryList as $enquiry)
                                        <tr>
                                            <td>{{ $loop->iteration }}
                                                <input type="checkbox" class="single_box mt-2 ml-3" name="single_box"
                                                       id="{{ $enquiry->id }}" value="{{ $enquiry->id }}"></td>
                                            <td>{{ $enquiry->name}}</td>
                                            @if($type == "bulk")
                                                <td>{{ $enquiry->product->title}}</td>
                                                <td>{{ $enquiry->productType->title}}</td>
                                                <td>{{ $enquiry->product->frame}}</td>
                                                <td>{{ $enquiry->product->mount}}</td>
                                                <td>{{ $enquiry->Size->title}}</td>
                                            @endif
                                            <td>{{ $enquiry->email}}</td>
                                            <td>{{ $enquiry->phone }}</td>
                                            {{-- <td>{{ $enquiry->subject }}</td> --}}
                                            <td>{{ $enquiry->message }}</td>
                                            <td>{{ $enquiry->reply }}</td>
                                            <td>{{ $enquiry->request_url }}</td>
                                            <td>{{ date("d-M-Y", strtotime($enquiry->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips"
                                                       title="Delete Enquiry" data-url="enquiry/delete"
                                                       data-id="{{$enquiry->id}}"><i class="fas fa-trash"></i></a>
                                                    <a class="mr-2 btn btn-primary"
                                                       href="{{ url(Helper::sitePrefix().'enquiry/'.($type == "bulk"?'bulk/':'').'view/'.$enquiry->id) }}"><i
                                                            class="fa fa-eye fa-lg"></i></a>
                                                    <a class="btn btn-success mr-2 reply_modal"
                                                       href="javascript:void(0)"
                                                       data-url="enquiry/{{ $type == "bulk"?'bulk/':'' }}reply"
                                                       data-toggle="modal" data-reply="{!! $enquiry->reply !!}"
                                                       data-id="{{ $enquiry->id }}"
                                                       data-enquiry="{!! $enquiry->message !!}">
                                                        <i class="fa fa-reply fa-lg"
                                                           style="color:{{ ($enquiry->reply==NULL)?'red':'white' }}"></i></a>
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
        <div class="modal fade" id="reply-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" id="formWizard" class="reply_form">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Enquiry*</label>
                                            <textarea disabled id="request_details" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Reply*</label>
                                            <textarea class="form-control" required id="reply" name="reply"
                                                      placeholder="Reply to request"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close
                                </button>
                                <input type="submit" class="btn btn-primary" id="reply_to_enquiry"
                                       value="Update Reply">
                                <input type="hidden" id="enquiry_url" name="enquiry_url"
                                       value="{{ $type == "bulk"?'bulk/':'' }}reply">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
