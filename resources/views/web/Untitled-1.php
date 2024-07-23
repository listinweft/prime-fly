<table>
   <tr>
         <td>
            <h1 style="font-size:30px;color:#B2B7C2;">INVOICE</h1>
            <h4 style="color:#707070; font-size: 14px; text-transform: uppercase;">#AB2324-01</h4>
         </td>
         <td class="text-end">
            <img style="width:90px" src="{{ asset('frontend/img/logo-blue.png')}}"/>
         </td>
      </tr>
    <table class="invoice_table">
        <tr>
            <td>
                <h4 style="color:#1A1C21;font-size:12px;font-weight:600">Issued</h4>
                <h5 style="color:#5E6470;font-size:12px">01 Aug, 2024</h5>
            </td>
            <td>
                <h4 style="color:#1A1C21;font-size:12px;font-weight:600">Billed to</h4>
                <h5 style="color:#5E6470;font-size:12px;font-weight:500;">Company Name / Person</h5>
                <p style="color:#5E6470;font-size:11px">Company address<br>City, Country - 00000 <br> +0 (000) 123-4567</p>
            </td>
            <td>
                <h4 style="color:#1A1C21;font-size:12px;font-weight:600">From</h4>
                <h5 style="color:#5E6470;font-size:12px;font-weight:500;">Primefly</h5>
                <p style="color:#5E6470;font-size:11px">Business address<br>City, State, IN - 000 000 <br>TAX ID 00XXXXX1234X0XX</p>
            </td>
        </tr>
    </table>

    <div class="invoice">
        <div class="order_header">
            <div class="b2b_smmry_header">
                <p class="mb-0"><b>Order ID : Primefly# {{ $order->order_code }}</b></p>
                <p class="mb-0"><b>Date: {{ date('d-m-Y', strtotime($order->created_at)) }}</b></p>
            </div>
            
            @php
                $totalAmount = 0;
                $cgst = 0;
                $sgst = 0;
            @endphp

            <table class="invoice_table">
                @foreach ($order->orderProducts as $index => $product)
                    @php
                        $orderStatus = App\Models\OrderLog::where('order_product_id', $product->id)->latest()->first();
                        $orderStatusPrevious = App\Models\OrderLog::where('order_product_id', $product->id)->latest()->skip(1)->take(1)->first();
                        if ($orderStatus && $orderStatus->status == 'Refunded') {
                            $refundStatus = $orderStatus;
                            $refundStatusPrevious = $orderStatusPrevious;
                        }
                    @endphp

                    @foreach($product->productData->product_categories as $product_category)
                        <tr>
                            <td style="width: 5%; padding: 10px;">{{ $index + 1 }}</td>
                            <td style="width: 60%; padding: 10px;">
                                <h3 style="color:#151525;font-size:11px;">{{ $product_category->title }}</h3>
                            </td>
                            <td style="width: 35%; padding: 10px;">
                                <h5 style="color:#707070;font-size:11px;text-align:right;">INR {{ number_format($product->total, 2) }}</h5>
                            </td>
                        </tr>
                        @php
                            $totalAmount += $product->total;
                        @endphp
                    @endforeach
                @endforeach
            </table>

            <div class="invoice_totals">
                <div class="row">
                    <div class="col-lg-8">
                        <p><b>Total:</b> </p>
                    </div>
                    <div class="col-lg-4 text-end">
                        <p><b>Subtotal:</b> &#8377; {{ number_format($totalAmount, 2) }}</p>
                        @php
                            $cgst = ($totalAmount * 0.09);
                            $sgst = ($totalAmount * 0.09);
                            $finalamount = $totalAmount + $cgst + $sgst;
                        @endphp
                        <p><b>CGST (9%):</b> &#8377; {{ number_format($cgst, 2) }}</p>
                        <p><b>SGST (9%):</b> &#8377; {{ number_format($sgst, 2) }}</p>
                        <p><b>Total To Pay:</b> &#8377; {{ number_format($finalamount, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <table>
            <tr>
            <!-- <td class="text-end">
    <img style="width: 90px;" src="http://127.0.0.1:8000/frontend/img/logo-blue.png" alt="Logo">
</td> -->

                <td>
                    <p style="margin-bottom: 0; color: #707070; font-size: 10px;">Payment Mode</p>
                    <b style="color: #707070; font-size: 11px; font-weight: 500;">Debit/Credit Card</b>
                </td>
                <td>
                    <p style="margin-bottom: 0; color: #707070; font-size: 10px;">Coupons</p>
                    <b style="color: #707070; font-size: 11px; font-weight: 500;">Nill</b>
                </td>
                <td>
                    <p style="margin-bottom: 0; color: #707070; font-size: 10px;">Contact</p>
                    <b style="color: #707070; font-size: 11px; font-weight: 500;">info@primefly.com +91 8301 960 000</b>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <h4 style="color: #151525; font-size: 14px; font-weight: 700; margin-top: 10px; margin-bottom: 0;">
                        Thank you 
                        <svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.83094 1.58987C5.22324 0.654065 6.11945 0.000195638 7.16184 0.000195638C8.56602 0.000195638 9.57731 1.20913 9.70445 2.64991C9.70445 2.64991 9.77307 3.00757 9.62202 3.65146C9.41634 4.52837 8.93286 5.30746 8.28102 5.90204L4.83094 9L1.43898 5.90185C0.787142 5.30746 0.303659 4.52817 0.09798 3.65126C-0.0530718 3.00737 0.0155527 2.64972 0.0155527 2.64972C0.142693 1.20893 1.15398 0 2.55816 0C3.60075 0 4.43863 0.654065 4.83094 1.58987Z" fill="#7B45F6"/>
                        </svg>
                    </h4>
                </td>
            </tr>
        </table>