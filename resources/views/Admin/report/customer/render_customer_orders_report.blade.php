<table class="table table-bordered table-hover dataTable">
    <thead>
    <tr>
        <th>#</th>
        <th>Order Code</th>
        <th>No of Items</th>
        <th>Payment Method</th>
        <th>Remarks</th>
        <th>Total</th>
        <th>Coupons</th>
        <th>Coupon Charge</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orderList as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ 'PP#'.$order['order']->order_code}}</td>
            <td>{{ $order['OrderProducts'] }}</td>
            <td>{{ $order['order']->payment_method }}</td>
            <td>{{ $order['order']->remarks }}</td>
            <td>{{ $order['order']->currency.' '.$order['total_price'] }}</td>
            <td>
                @if($order['order']->orderCoupons)
                    @foreach($order['order']->orderCoupons as $orderCoupon)
                        {{ $orderCoupon->coupon->code }}
                        {{ !$loop->last ? ',':'' }}
                    @endforeach
                @endif
            </td>
            <td>
                @if($order['order']->orderCoupons)
                    @foreach($order['order']->orderCoupons as $orderCoupon)
                        {{ $orderCoupon->coupon_value }}
                        {{ !$loop->last ? ',':'' }}
                    @endforeach
                @else
                    0.00
                @endif
            </td>
            <td>{{ date("d-M-Y", strtotime($order['order']->created_at))  }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
