<table class="table table-bordered table-hover dataTable">
    <thead>
    <tr>
        <th>#</th>
        <th>Order Code</th>
        <th>Product</th>
        <th>Customer</th>
        <th>Cost</th>
        <th>Offer Amount</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orderList['products'] as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <a href="{{url(Helper::sitePrefix().'order/view/'.$orderList['orderData']->id)}}">{{ 'PP'.$orderList['orderData']->order_code}}</a>
            </td>
            <td>{{ ($product->productData)?$product->productData->title:'' }}</td>
            @if($orderList['orderData']->orderCustomer->user_type=="User")
                <td>{{ $orderList['orderData']->orderCustomer->CustomerData->first_name.' '.$orderList['orderData']->orderCustomer->CustomerData->last_name }}</td>
            @else
                <td>{{ $orderList['orderData']->orderCustomer->billingAddress->first_name.' '.$orderList['orderData']->orderCustomer->billingAddress->last_name}}</td>
            @endif
            <td>{{ $product->productData->price }}</td>
            <td>{{ $product->offer_amount }}</td>
            <td>{{ $product->qty }}</td>
            <td>{{ $product->total }}</td>
            <td>{{ date("d-M-Y", strtotime($product->created_at))  }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
