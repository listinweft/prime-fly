@extends('Admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Contact View</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <!-- <div class="card-header p-4">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                           href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                           aria-selected="true">Basic Information</a>
                                    </li>
                                </ul>
                                <h1><i class="nav-icon fas fa-bell"></i> View Contact - {{$enquiry->name}}</h1>
                                <h3 class="card-title"><i class="nav-icon fas fa-bell"></i> Contact Enquiry - {{$enquiry->name}}</h3>
                            </div> -->
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                         aria-labelledby="custom-tabs-one-home-tab">
                                        <div class="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <strong><i class="fas fa-user mr-1"></i> Name</strong>
                                            <p class="text-muted">
                                                {{$enquiry->name}}
                                            </p>
                                            <hr>
                                                </div>
                                                <div class="col-md-6">
                                                <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
                                            <p class="text-muted">{{$enquiry->email}}</p>
                                            <hr>       
                                                </div>
                                                <div class="col-md-6">
                                                <strong><i class="fas fa-phone-alt mr-1"></i> Phone Number</strong>
                                            <p class="text-muted">{{$enquiry->phone}}</p>
                                            <hr>
                                                </div>
                                                <div class="col-md-6">
                                                <!-- <strong><i class="fas fa-link mr-1"></i> Request URL</strong>
                                            <p class="text-muted">{!! $enquiry->request_url!!}</p>
                                            <hr> -->
                                            <strong><i class="fa fa-address-book mr-1"></i>created_at</strong>
                                            <p class="text-muted"> {{date("d-M-Y", strtotime($enquiry->created_at))}}</p>
                                            <hr>
                                                </div>
                                                <div class="col-md-12">
                                                <strong><i class="fas fa-envelope"></i> Message</strong>
                                            <p class="text-muted">{!! $enquiry->message!!}</p>
                                            <hr>
                                                </div>
                                            </div>
                                            
                                            
                                            @if($enquiry->product_id)
                                            <strong><i class="fas fa-info mr-1"></i> Product</strong>
                                            <p class="text-muted">{{@$enquiry->product->title}}</p>
                                            <hr>
                                            @endif
                                            
                                            
                                            
                                            <strong><i class="fas fa-reply mr-1"></i> Reply</strong>
                                            <p class="text-muted">{{$enquiry->reply}}</p>
                                            <hr>
                                            <strong><i class="fas fa-reply mr-1"></i> Reply Date</strong>
                                            <p class="text-muted"> {{$enquiry->reply_date}}</p>
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
