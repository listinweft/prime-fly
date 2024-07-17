@php
    use App\Models\Order;
    use App\Models\OrderLog;
@endphp
<div class="card-body" id="filter--result">
@include('Admin/report/order/box_values_subadmin')
<div class="records--list-report" style="overflow-x: scroll;">
    @include('Admin.report.order.detail_report_excel_subadmin')
</div>
</div>
