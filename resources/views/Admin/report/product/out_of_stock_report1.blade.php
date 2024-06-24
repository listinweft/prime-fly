@extends('backend.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> Manage Out Of Stock</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().'dashboard')}}">Home</a></li>
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
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>SKU</th>
                                        <th>Status</th>
                                        <th>Color</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
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
@section('scripts')
    <!-- Ekko Lightbox -->
    <script src="{{ asset('backend/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            var table = $('#recordsReport').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                // stateSave: true,
                paging: true,
                bDestroy: true,
                // dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 '
                //     + 'col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i>' +
                //     '<"col-sm-12 col-md-6"p>>',
                ajax: "{{ url('admin/product/out-of-stock') }}",
                columns: [
                    {data: 'DT_RowIndex', searchable: false, orderable: false},
                    {data: 'title_en', name: 'title_en'},
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'sku', name: 'sku'},
                    {data: 'stock', name: 'stock'},
                    {data: 'price', name: 'price'},
                    {data: 'offer_price', name: 'offer_price', orderable: false, searchable: false},
                    {data: 'addon', name: 'addon', orderable: false, searchable: false},
                    {data: 'specification', name: 'specification', orderable: false, searchable: false},
                    {data: 'specification_gallery', name: 'specification_gallery', orderable: false, searchable: false},
                    {data: 'overview', name: 'overview', orderable: false, searchable: false},
                    {data: 'gallery', name: 'gallery', orderable: false, searchable: false},
                    {data: 'offer', name: 'offer', orderable: false, searchable: false},
                    {data: 'attribute_tagging', name: 'attribute_tagging', orderable: false, searchable: false},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'featured', name: 'featured', orderable: false, searchable: false},
                    {data: 'new_arrival', name: 'new_arrival', orderable: false, searchable: false},
                    {data: 'best_seller', name: 'best_seller', orderable: false, searchable: false},
                    {data: 'created_date', name: 'created_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            }).page.len(25).draw();
        });
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    </script>
    
    <script>
    window.alert = function() {};
</script>
@endsection
