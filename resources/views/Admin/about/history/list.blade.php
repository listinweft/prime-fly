@extends('Admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas faer-shield"></i> Manage History</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">History List</li>
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
		                	<a href="{{url(Helper::sitePrefix().'about/history/create')}}" class="btn btn-success pull-right">Add History <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
		              	</div>
              			<div class="card-body">
                            <table id="recordsListView" class="table table-bordered table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Year</th>
                                        <th>Sort Order</th>
                                        <th>Status </th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1@endphp
                                    @foreach($histories as $history)
                                        <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $history->year }}</td>
                                        <td>
                                            <input type="text" name="slider_order"
                                                   id="slider_order_{{$loop->iteration}}"
                                                   data-table="History" data-id="{{ $history->id }}"
                                                   class="common_sort_order" style="width:25%"
                                                   value="{{$history->sort_order}}">
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" class="status_check"
                                                       data-url="/status-change" data-table="History"
                                                       data-field="status" data-pk="{{ $history->id}}"
                                                       data-limit="4"
                                                    {{($history->status=="Active")?'checked':''}}>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                        <td>{{ date("d-M-Y", strtotime($history->created_at))  }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(Helper::sitePrefix().'about/history/edit/'.$history->id)}}" class="btn btn-success mr-2 tooltips" title="Edit History"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete History" data-url="about/history/delete" data-id="{{$history->id}}"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                        </tr>
                                    @php $i++@endphp
                                    @endforeach
                                </tbody>
                            </table>
              	</div>
            </div>
        </div>
    </section>
</div>
@endsection
