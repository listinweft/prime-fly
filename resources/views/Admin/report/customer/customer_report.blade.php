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
                            <li class="breadcrumb-item active">{{$title}} </li>
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
                                <table class="table table-bordered table-hover dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        {{--<th>Username</th>--}}
                                        <th>Status</th>
                                        <th>Signed Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1 @endphp @foreach($customerList as $customer)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $customer->first_name.' '.$customer->last_name}}</td>
                                            <td>{{ $customer->user->phone }}</td>
                                            <td>
                                                @foreach($customer->customerAddress as $address)
                                                    {!! $address->first_name .' '.$address->last_name !!}<br/>
                                                    {!! $address->address !!}<br/>
                                                    {{ $address->state->country->title }}<br/>
                                                    {{ $address->state->title }}<br/>
                                                    @if(!$loop->last)
                                                        ------------------------------<br/>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $customer->user->email }}</td>
                                            {{--<td>{{ $customer->user->username }}</td>--}}
                                            <td><span
                                                    style="color:{{ ($customer->status=='Active')?'green':'red' }}">{{ $customer->user->status }}</span>
                                            </td>
                                            <td>{{ date("d-M-Y", strtotime($customer->created_at))  }}</td>
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
