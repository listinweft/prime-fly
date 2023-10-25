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
                            <li class="breadcrumb-item active">Comment View</li>
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
                            
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                         aria-labelledby="custom-tabs-one-home-tab">
                                        <div class="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <strong><i class="fas fa-user mr-1"></i> Comment</strong>
                                            <p class="text-muted">
                                                {{$comment->content}}
                                            </p>
                                            <div class="card-body">
                                <table id="recordsListView" class="table table-bordered table-hover dataTable">
    <thead>
        <tr>
            <th>Reply</th>
            <th>Content</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($replies as $reply)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $reply->content }}</td>
                
                <!-- Add more reply details here -->
            </tr>
        @endforeach
    </tbody>
</table>

</div>

                                            
                                    
                                           
                                            
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
