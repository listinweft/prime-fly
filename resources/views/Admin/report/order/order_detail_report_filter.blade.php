@php
    use App\Models\Order;
    use App\Models\OrderLog;
@endphp
<div class="card-bod" id="filter--result">
@include('Admin/report/order/box_values')
<div class="records--list-report" style="overflow-x: scroll;">
    @include('Admin.report.order.detail_report_excel')
</div>
</div>
