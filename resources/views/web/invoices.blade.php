<!DOCTYPE html>
<html>
<head>
    <style>
        /* Define your styles for the PDF here */
        *{
         font-family:sans-serif;
         font-family: 'your-custom-font', sans-serif;
        }
        table{
         border-spacing:0;
         width:100%;
         border:0;
        }
        td{ 
         border:0;
         vertical-align: top;
        }
        tr{
         border:0
        }
        p,h4,h5,h3,h2,h1{
         margin-bottom:0;
         margin-top:0
        }
        /* .invoice_table {
            width: 100%;
        }
        .invoice_table td {
            vertical-align: top;
            border: 1px solid #D7DAE0;
            padding: 20px;
        }
        .invoice_table td:first-child {
            border-left: 0;
        }
        .invoice_table td:last-child {
            border-right: 0;
        }
        .footer {
            background-color: #FAFAFA;
            max-width: 600px;
            margin: auto;
            width: 100%;
            padding: 30px;
        }
        .footer table {
            width: 100%;
        }
        .footer td {
            width: 33.33%;
            vertical-align: top;
            color: #707070;
            font-size: 10px;
        }
        .footer b {
            color: #707070;
            font-size: 11px;
            display: block;
            font-weight: 500;
            margin-top: 5px;
        }
        .footer h4 {
            color: #151525;
            font-size: 14px;
            font-weight: 700;
            margin-top: 10px;
            margin-bottom: 0;
        } */
    </style>
</head>
<body>
<table class="invoice_table" style=" width: 100%; background-color: #fff;max-width:600px;margin:auto;font-family: sans-serif; ">
<tr>
   <td style="padding:20px">
      <table style="width:100%">
<tr>
   <table>
      <tr>
         <td style="vertical-align:bottom;">
            <h1 style="font-size:30px;color:#B2B7C2;">INVOICE</h1>
            <h4 style="color:#707070; font-size: 14px; text-transform: uppercase;margin-bottom:10px">#primefly {{ $order->order_code }}</h4>
            
         </td>
         <td  style="text-align:right;vertical-align:bottom;">
            <img style="width:110px;margin-bottom:10px" src="https://demo.wefttechnologies.com/primefly/public/frontend/img/logo-blue.png"/>
         </td>
      </tr>
      <table>
         </tr> 
         <tr>
            <td>
               <table>
                  <tr>
                     <td style="width:33%;border:1px solid #D7DAE0;border-left:0;padding:20px;padding-left:0">
                        <h4 style="color:#1A1C21;font-size:12px;font-weight:700;margin-bottom:10px">Issued</h4>
                        <h5 style="color:#5E6470;font-size:12px">{{ date('d-m-Y', strtotime($order->created_at)) }}</h5>
                     </td>
                     <td style="width:33%;border:1px solid #D7DAE0;border-left:0;border-right:0;padding:20px;">
                        <h4 style="color:#1A1C21;font-size:12px;font-weight:700;margin-bottom:10px">Billed to</h4>
                        <h5 style="color:#5E6470;font-size:12px;font-weight:700;margin-bottom:5px">Company Name / Person</h5>
                        <p style="color:#5E6470;font-size:11px;line-height:1.4">{{$customer->first_name}}
                           <br> +91 {{$user->phone}}
                        </p>
                     </td>
                     <td style="width:33%;border:1px solid #D7DAE0;border-right:0;padding:20px;padding-right:0">
                        <h4 style="color:#1A1C21;font-size:12px;font-weight:700;margin-bottom:10px">From</h4>
                        <h5 style="color:#5E6470;font-size:12px;font-weight:700;margin-bottom:5px">Primefly</h5>
                        <p style="color:#5E6470;font-size:11px;line-height:1.4">Business address
                           City, State, IN - 000 000 <br>TAX ID 00XXXXX1234X0XX
                        </p>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td style="padding:10px 0;border-bottom:1px solid #D7DAE0;">
               <table>
                  <tr>
                     <td style="width:50%">
                        <h2 style="color:#1A1C21;font-size:14px;font-weight:700; ">Bookings</h2>
                     </td>
                     <td  style="width:50%;text-align:right">
                        <h4 style="color:#707070;font-size:10px;font-weight:700; ">SUBTOTAL</h4>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td style="border-bottom:1px solid #D7DAE0;">
            @php
                $totalAmount = 0;
                $cgst = 0;
                $sgst = 0;
            @endphp
               <table>
               @foreach ($order->orderProducts as $index => $product)
                    @php
                        $orderStatus = App\Models\OrderLog::where('order_product_id', $product->id)->latest()->first();
                        $package = App\Models\Product::where('id', $product->product_id)->first();
                        $orderStatusPrevious = App\Models\OrderLog::where('order_product_id', $product->id)->latest()->skip(1)->take(1)->first();
                        if ($orderStatus && $orderStatus->status == 'Refunded') {
                            $refundStatus = $orderStatus;
                            $refundStatusPrevious = $orderStatusPrevious;
                        }
                    @endphp


                
                    @foreach($product->productData->product_categories ?? [] as $product_category)
                    <tr>
                            <td style="width: 5%; padding: 10px 0;"> <h3 style="color:#151525;font-size:11px;">{{ $index + 1 }}</h3></td>
                            <td style="width: 60%; padding: 10px 0;">
                                <h3 style="color:#151525;font-size:11px;">{{ ucfirst($product_category->title) }}</h3>
                                <h4 style="color:#707070;font-size:11px; ">Package:{{ ucfirst($package->title) }}</h4>




                              

                                @if(!is_null($product->travel_type) && $product->travel_type !== '')

<h4 style="color:#707070;font-size:11px; ">Travel Type:{{ucfirst($product->travel_type)}}</h4>

@endif


                                                @if($product->origin)

                  <h4 style="color:#707070;font-size:11px; ">Origin:{{$product->origin}}</h4>


                  @endif

                  @if($product->destination)

<h4 style="color:#707070;font-size:11px; ">Destination:{{$product->destination}}</h4>


@endif

@if($product_category->title == "Porter")
    @if(isset($product->guest) && $product->guest > 0)
        <h4 style="color:#707070;font-size:11px;">Porter Count: {{$product->guest}}</h4>
    @else
        <h4 style="color:#707070;font-size:11px;">Porter information not available</h4>
    @endif
@elseif(in_array($product_category->title, ['Meet and Greet', 'Airport Entry']))
    @if(isset($product->guest) && $product->guest > 0)
        <h4 style="color:#707070;font-size:11px;">Guest: {{$product->guest}}</h4>
    @else
        <h4 style="color:#707070;font-size:11px;">Guest information not available</h4>
    @endif
@elseif(in_array($product_category->title, ['Car Parking', 'Cloak Room', 'Baggage Wrapping']))
    @if(isset($product->guest) && $product->guest > 0)
        <h4 style="color:#707070;font-size:11px;">Bag: {{$product->guest}}</h4>
    @else
        <h4 style="color:#707070;font-size:11px;">Bag count information not available</h4>
    @endif
@else
    @if(isset($product->guest) && $product->guest > 0)
        <h4 style="color:#707070;font-size:11px;">Guest: {{$product->guest}}</h4>
    @else
        <h4 style="color:#707070;font-size:11px;">Guest information not available</h4>
    @endif
@endif


                                @if($product->adults)
                                <h4 style="color:#707070;font-size:11px; ">Adults:{{$product->adults}}</h4>
                                
                                <h4 style="color:#707070;font-size:11px; ">Infants:{{$product->infants}}</h4>
                                <h4 style="color:#707070;font-size:11px; ">Children:{{$product->children}}</h4>
                               


                                @endif

                                @if(!is_null($product->pnr) && $product->pnr !== '')

                                <h4 style="color:#707070;font-size:11px; ">Pnr:{{$product->pnr}}</h4>

                                @endif

                                @if(!is_null($product->flight_number) && $product->flight_number !== '')

                                <h4 style="color:#707070;font-size:11px; ">Flight Number:{{$product->flight_number}}</h4>

                                @endif

                                @if(!is_null($product->bag_count) && $product->bag_count !== '')

                                <h4 style="color:#707070;font-size:11px; ">Bag Count:{{$product->bag_count}}</h4>

                                @endif

                            </td>
                            
                            <td style="width: 35%; padding: 10px 0;">
                                <h5 style="color:#707070;font-size:11px;text-align:right;">INR {{ number_format($product->total, 2) }}</h5>
                            </td>
                        </tr>
                        @php
                            $totalAmount += $product->total;
                        @endphp
                    @endforeach
                @endforeach
               </table>
            </td>
         </tr>
         <tr>
            <td style="">
               <table>
                  <tr>
                     <td style="padding:10px 0;border-bottom:1px solid #D7DAE0;">
                        <h4 style="color:#151525;font-size:11px;font-weight:700">Total</h4>
                     </td>
                     <td style="text-align:right;padding:10px 0;border-bottom:1px solid #D7DAE0;">
                        <h1 style="color:#7B45F6;font-size:15px;font-weight:700;margin-bottom:8px">INR {{ number_format($totalAmount, 2) }}</h1>
                        @php
                            $cgst = ($totalAmount * 0.09);
                            $sgst = ($totalAmount * 0.09);
                            $finalamount = $totalAmount + $cgst + $sgst;
                        @endphp
                        <p style="color:#707070;font-size:10px;margin-bottom:8px">CGST 9% INR {{ number_format($cgst, 2) }}</p>
                        <p style="color:#707070;font-size:10px;margin-bottom:0">SGST 9% INR {{ number_format($sgst, 2) }}</p>
                     </td>
                  </tr>
                  <tr>
                     <td style="padding:10px 0">
                        <h4 style="color:#151525;font-size:11px;font-weight:700">Total To Pay</h4>
                     </td>
                     <td style="text-align:right;padding:10px 0">
                        <h1 style="color:#7B45F6;font-size:15px;font-weight:700">INR {{ number_format($finalamount, 2) }}</h1>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
      </td>
      </tr> 
   </table>
   <table style="background-color:#f5f5f5;max-width:600px;margin:auto;width:100%">
      <tr>
         <td style="padding:30px;width:100%">
            <table style="width:100%">
               <tr>
                  <td style="width:30%">
                     <p style="color:#707070;font-size:10px;margin-bottom:0">Payment Mode</p>
                     <b style="color:#707070;font-size:11px;display:block;font-weight:700">Debit/Credit Card</b>
                  </td>
                  <td style="width:30%">
                     <p  style="color:#707070;font-size:10px;margin-bottom:0">Coupons <br></p>
                     <b style="color:#707070;font-size:11px;display:block;font-weight:700">Nill</b>
                  </td>
                  <td style="width:40%">
                     <p  style="color:#707070;font-size:10px;margin-bottom:0">Contact</p>
                     <b style="color:#707070;font-size:11px;display:block;font-weight:700">info@primefly.com +91 8301 960 000</b>
                  </td> 
               </tr>
               <tr>
                  <td>
                     <h4 style="color:#151525;font-size:14px;font-weight:700;margin-top:10px;margin-bottom:0">
                        Thank you 
                        <svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M4.83094 1.58987C5.22324 0.654065 6.11945 0.000195638 7.16184 0.000195638C8.56602 0.000195638 9.57731 1.20913 9.70445 2.64991C9.70445 2.64991 9.77307 3.00757 9.62202 3.65146C9.41634 4.52837 8.93286 5.30746 8.28102 5.90204L4.83094 9L1.43898 5.90185C0.787142 5.30746 0.303659 4.52817 0.09798 3.65126C-0.0530718 3.00737 0.0155527 2.64972 0.0155527 2.64972C0.142693 1.20893 1.15398 0 2.55816 0C3.60075 0 4.43863 0.654065 4.83094 1.58987Z" fill="#7B45F6"/>
                        </svg>
                     </h4>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
   </table> 
     
</body>
</html>
