@php
    use App\Models\Order;
    use App\Models\OrderLog;
@endphp
<table id="recordsReport" class="table table-bordered table-hover">
    <tbody>
        <tr>
            <td rowspan="2">#</td>
            <td rowspan="2">Code</td>
            <td rowspan="2">Customer</td>
            <td colspan="4" style="text-align: center;">Services</td>
           
            <td rowspan="2">Status</td>
        </tr>
        <tr>
            <td>#</td>
            <td>Service</td>
            <td>Package</td>
            <td>Service Date</td>
            <!-- <td>Sub Total</td> -->
            <!-- <td style="border-right: 1px solid #f4f4f4;">Created Date</td> -->
        </tr>
        @php $i = 1 @endphp 
        @foreach($orderList as $order)
            @if($order->orderProducts->isNotEmpty())
                @php
                    $products = $order->orderProducts;
                    $orderTotal = Order::getOrderTotal($order->id);
                    $orderStatus = OrderLog::where('order_product_id', $products[0]->id)->latest()->first();
                @endphp
                <tr>
                    <td rowspan="{{ count($products) }}">{{ $i }}</td>
                    <td rowspan="{{ count($products) }}">{{ 'Primefly' . $order->order_code }}</td>
                    @if($order->orderCustomer->user_type == "User")
                        <td rowspan="{{ count($products) }}">{{ @$order->orderCustomer->CustomerData->first_name . ' ' . @$order->orderCustomer->CustomerData->last_name }}</td>
                    @else
                        <td rowspan="{{ count($products) }}">{{ $order->orderCustomer->billingAddress->first_name . ' ' . $order->orderCustomer->billingAddress->last_name }}</td>
                    @endif
                    <td>1</td>
                    <td>
                        @if(isset($products[0]->productData) && $products[0]->productData->product_categories)
                            @foreach($products[0]->productData->product_categories as $category)
                                {{ $category->title }}@if (!$loop->last), @endif
                            @endforeach
                        @endif
                    </td>
                    <td>{{ ($products[0]->productData) ? $products[0]->productData->title : '' }}</td>
                    <td>{{  $products[0]->exit_date  }}</td>
                    <!-- <td>{{ $order->currency . ' ' . $products[0]->total }}</td> -->
                   
                  
                    <!-- <td rowspan="{{ count($products) }}">{{ date("d-M-Y", strtotime($order->created_at)) }}</td> -->
                    <td>{!! Order::getStatus($orderStatus->status) !!}</td>
                </tr>
                @for($j = 1; $j < count($products); $j++)
                    @php
                        $orderStatus = OrderLog::where('order_product_id', $products[$j]->id)->latest()->first();
                    @endphp
                    <tr>
                        <td>{{ $j + 1 }}</td>
                        <td>
                            @if(isset($products[$j]->productData) && $products[$j]->productData->product_categories)
                                @foreach($products[$j]->productData->product_categories as $category)
                                    {{ $category->title }}@if (!$loop->last), @endif
                                @endforeach
                            @endif
                        </td>
                        <td>{{ ($products[$j]->productData) ? $products[$j]->productData->title : '' }}</td>
                        <!-- <td>{{ $order->currency . ' ' . $products[$j]->total }}</td> -->
                        <td>{{ $products[$j]->exit_date }}</td>
                        <td style="border-right: 1px solid #f4f4f4;">{!! Order::getStatus($orderStatus->status) !!}</td>
                    </tr>
                @endfor
                @php $i++ @endphp
            @endif
        @endforeach
    </tbody>
</table>
