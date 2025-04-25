<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"> -->
      
    <title>Invoice</title>
    <style>
        * {
            font-family: "lato", sans-serif; 
        }

        body {
            font-optical-sizing: auto;
        }

        h4 {
            margin: 0;
            line-height: 1.6;
            font-size: 9pt; 
        }

        p {
            margin: 0;
            font-size: 9pt;
            line-height: 1.6;
        }

        img {
            max-width: 100%;
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        table tr td {
            vertical-align: top;
            font-size: 9pt;
            line-height: 1.6;
        }

        th {
            font-size: 9pt;
            line-height: 1.6;
        }

        ul li {
            margin: 0;
        }

        ul li table {
            width: auto !important;
            table-layout: fixed;
            margin-left: 5px;
        }

        a {
            color: #222 !important;
            text-decoration: none !important;
        }

        .ii a[href] {
            color: #222 !important;
            text-decoration: none !important;
        }

        .annexure_table,
        .annexure_table td,
        .annexure_table th {
            border: 1px solid #ccc;
             border-collapse: collapse;
        }

        table.annexure_table {
            width: 100%; 
            margin-bottom: 20px; 
        }

        table.annexure_table td {
            font-size: 9pt;
            padding: 5px; 
        }

        table.annexure_table th {
            padding: 5px; 
            font-size: 9pt;
        }
        

        /*@page {*/
        /*    size: A4;*/
        /*    margin: 2cm;*/

        /*    @top-center {*/
        /*        content: element(header);*/
        /*    }*/

        /*    @bottom-center {*/
        /*        content: element(footer);*/
        /*    }*/
        /*}*/
        @page {
            size: A4;
            margin:160px 0px 100px 0px; /* top, right, bottom, left */
             padding-top:180px;
             padding-bottom:100px
        }
         header {
            position: fixed;
            top: -180px;
            left: 0px;
            right: 0px;
            /*height: 100px;*/
            text-align: center;
            line-height: 25px;
        }

        footer {
            position: fixed;
            bottom: -100px;
            left: 0px;
            right: 0px;
            /*height: 50px;*/
            text-align: center;
            font-size: 8pt;
            line-height: 20px;
        }
        /*header {*/
        /*    position: running(header);*/
        /*}*/

        /*footer {*/
        /*    position: running(footer);*/
        /*}*/
    </style>
</head>

<body>
@php
          $personaladdress = App\Models\PersonalDetails::where('order_id', $ordernew->id)->first();
          $personaladdressfull = App\Models\PersonalDetails::where('order_id', $ordernew->id)->get();
          @endphp
    <header id="header">
        <table style="width: 100%;background-color:#05233d;max-width:100%;margin:auto;padding: 30px;">
            <tr>
                <td style="width: 30%;vertical-align: middle;">
                <img src="{{ $base64 }}" alt="Logo" style="width: 150px;">

                </td>
                <td style="width: 25%;"></td>
                <td style="color: #fff;width: 45%;vertical-align: middle;">
                @if($ordernew->payment_method == "COD")
                    <h4 style="font-size: 8pt;margin-bottom: 5px;"> PROFORMA INVOICE</h4>
                    @else
                    <h4 style="font-size: 8pt;margin-bottom: 5px;">TAX INVOICE</h4>
                    @endif
                   
                    <p style="font-size: 8pt;font-weight: 400;">PRIMEFLY</p>
                    <p style="font-size: 8pt;font-weight: 400;">TC 86/2018, AIRPORT ROAD, CHACKAI,<br>
                        Thiruvananthapuram, Kerala - 695024, India<br>
                        GSTIN: 32OYLPS5894B1ZQ</p>
                </td>
            </tr>
        </table>
    </header>

    <footer id="footer">
        <table
            style="text-align: center; width: 100%;background-color:#05233d;max-width:100%;margin:auto;padding:15px 30px;color: #fff;">
            <tr>
                <td>
                    <p style="font-size: 8pt;">Registered Address: Primely, TC 86/2018, Airport Road, Chackai ,
                        Thiruvananthapuram, Kerala -695024, India</p>
                    <p style="font-size: 8pt;">Terms and Conditions of services as provided on www.primefly.in shall
                        apply.
                    </p>
                    <p style="font-size: 8pt;">For all booking queries, please feel free to write to us at
                        bookings@primefly.in.</p>
                </td>
            </tr>
        </table>
         
    </footer> 
<script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script(function ($pageNumber, $pageCount, $pdf) {
            $pdf->text(500, 820, "Page $pageNumber of $pageCount", null, 10);
        });
    }
</script>
   
    <table style=" width: 100%; background-color: #fff;max-width:720px;margin:auto;">

        <tr>
            <td style=" padding:30px 50px ;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 33%;">
                            <h4 style="text-transform: uppercase;">Billed To:{{$personaladdress->name}}</h4>
                            <p style="margin-bottom: 20px;">{{ $personaladdress->address }}</p>
                        </td>
                        <td style="width: 33%;"></td>
                        <td style="width: 33%;text-align:right">
                            <p><strong style="text-align:right">Invoice No:</strong> #primefly {{ $ordernew->order_code }}</p>
                            <p><strong style="text-align:right">Invoice Date:</strong> {{ date('d-m-Y', strtotime($ordernew->created_at)) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 33%;">
                            <!-- <p>State Code: 32</p> -->

                            @if($ordernew->tax_type == "Inside")

                            <p><strong>Place Of Supply:</strong> Kerala (IN)

                            @else

                            <p><strong>Place Of Supply:</strong> Kerala (OUT)

                            @endif



                            
@if(!empty($personaladdress->gst_number))
GSTIN:  {{ $personaladdress->gst_number }}</p>
   
@endif

                            
                           
                        </td>
                        <td style="width: 33%;"></td>
                        <td style="width: 33%;text-align:right">
                            <p>Whether the tax is payable on Reverse Charge Basis?: NO</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
        @php
       
                $totalAmount = 0;
                $cgst = 0;
                $sgst = 0;
            @endphp
@endph

<table style="width:100%; padding:0 50px;">
    <thead>
        <tr>
            <th style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding: 5px 0; text-align: left;">Package ID</th>
            <th style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding: 5px 0;text-align: left;">Description</th>
            <th style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding: 5px 0;text-align: left;">HSN/SAC</th>
            <th style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding: 5px 0;text-align: left;">Quantity</th>
            <th style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding: 5px 0;text-align: left;">Unit Price + Taxes</th>
            <th style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding: 5px 0; text-align: right;">Amount</th>
        </tr>
    </thead>
    <tbody>
        @php $totalAmount = 0; @endphp
        @foreach ($ordernew->orderProducts as $product)
            @php
                $package = App\Models\Product::find($product->product_id);
                $quantity = 1; // Default quantity
                $unitPrice = $product->total;
                $taxableAmount = $unitPrice / 1.18;
                $igst = $taxableAmount * 0.18;
                $cgst = $igst / 2;
                $sgst = $igst / 2;
                $totalAmount += $unitPrice;

                $displayQuantity = $product->productData->category_id == 35 ? $product->guest : $quantity;
            @endphp
            <tr>
                <td style="padding: 8px 0;">{{ ucfirst($product->unique_pckageid) }}</td>
                <td style="padding: 8px 0;">{{ ucfirst($package->title ?? 'N/A') }}</td>
                <td style="padding: 8px 0;">996763</td>
                <td style="padding: 8px 0;">{{ number_format($displayQuantity, 2) }} UNIT</td>
                <td style="padding: 8px 0;">
                    INR {{ number_format($unitPrice - ($unitPrice * 0.09) - ($unitPrice * 0.09), 2) }} + GST 18%
                </td>
                <td style="padding: 8px 0; text-align: right;">
                    INR {{ number_format($unitPrice, 2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@php
    $taxableAmount = $totalAmount; // Assuming taxableAmount is same as totalAmount
    $cgst = ($totalAmount * 0.09);
    $sgst = ($totalAmount * 0.09);
    $igst = ($totalAmount * 0.18);
    $finalamount = $totalAmount + ($ordernew->tax_type == "Outside" ? $igst : ($cgst + $sgst));
@endphp

<table style="width: 100%; margin-top: 10px;  padding:0 50px ;">
    <tr>
        <td style="width: 30%;"></td>
        <td style="width: 30%;"></td>
        <td style="width: 40%; border-top:1px solid #000">
            <table>
                <tr>
                    <td style="width: 50%; padding:3px 0;">
                        <p style="color:#6f6f60">Taxable Amount</p>
                    </td>
                    <td style="width: 50%; text-align: right; padding:3px 0;">
                        <p>INR {{ number_format($taxableAmount - ($taxableAmount * 0.09) - ($taxableAmount * 0.09), 2) }}</p>
                    </td>
                </tr>
                @if($ordernew->tax_type == "Outside")
                    <tr>
                        <td style="width: 50%; padding:3px 0;">
                            <p style="color:#6f6f60">IGST (18%)</p>
                        </td>
                        <td style="width: 50%; text-align: right; padding:3px 0;">
                            <p>INR {{ number_format($igst, 2) }}</p>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td style="width: 50%; padding:3px 0;">
                            <p style="color:#6f6f60">CGST (9%)</p>
                        </td>
                        <td style="width: 50%; text-align: right; padding:3px 0;">
                            <p>INR {{ number_format($cgst, 2) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%; padding:3px 0;">
                            <p style="color:#6f6f60">SGST (9%)</p>
                        </td>
                        <td style="width: 50%; text-align: right; padding:3px 0;">
                            <p>INR {{ number_format($sgst, 2) }}</p>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td style="width: 50%; border-top:1px solid #000; padding:3px 0;">
                        <p style="color:#6f6f60">Total</p>
                    </td>
                    <td style="width: 50%; text-align: right; border-top:1px solid #000; padding:3px 0;">
                        <p>INR {{ number_format($taxableAmount, 2) }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>


       
      
        <tr style="width: 100%;">
            <td style="width: 50%;padding:0 50px;">
                <h4>Total (In Words): <p>{!! \App\Http\Helpers\Helper::numberToWords(@$taxableAmount) !!} Rupees</p>
              
              
                </h4>
                <p style="margin-top: 20px;"><strong style="">Terms & Conditions</strong></p>
                <ol>
                    <li style="font-size: 8pt;">
                     Payment under this Invoice Should be made through Electronic Fund
                    Transfer (NEFT/RTGS):- UPI
                        <!-- Transfer (NEFT/RTGS):- Account No.: 265505001066 IFSC: ICIC0002655. -->
                    </li>
                    <li style="font-size: 8pt;">
                        For All Payments Effected, kindly forward the following details to: accounts@primefly.in
                        a) Invoice No. b) TDS Deduction c) Any Other Deduction (with reasons) d) Net Amount Paid
                    </li>
                </ol>
            </td>
        </tr>
        <tr>
            <td style="padding:30px 50px 0;">
            <table class="annexure_table" style="border: 1px solid #ccc;text-align: center;">
    <tr>
        <td style="font-size: 9pt;padding: 8px 0; ">Annexure 1: Service Details</td>
    </tr>
    <tr>
        <td style="padding: 0;">
            <table>
                <thead>
                    <tr>
                        <th style="text-align: left;">Package ID</th>
                        <th style="text-align: left;">Service Name</th>
                        <th style="text-align: left;">Service Date</th>
                        <th style="text-align: left;">Booking Date</th>
                        <th style="text-align: left;">Service Airport</th>
                        <th style="text-align: left;">Sector of Travel</th>
                        <th style="text-align: left;">From Airport</th>
                        <th style="text-align: left;">To Airport</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalAmount = 0;
                    @endphp
                    @foreach ($ordernew->orderProducts as $product)
                        @php
                            $package = App\Models\Product::where('id', $product->product_id)->first();
                        @endphp
                        @foreach($product->productData->product_categories ?? [] as $product_category)
                            <tr>
                                <td>{{ ucfirst($product->unique_pckageid)  }}</td>
                                <td>{{ ucfirst($product_category->title) }}</td>
                                <td>{{ !is_null($product->exit_date) ? date('D, d-M-Y', strtotime($product->exit_date)) : 'N/A' }}</td>
                                <td>{{ !is_null($product->created_at) ? date('D, d-M-Y', strtotime($product->created_at)) : 'N/A' }}</td>
                                <td>
                                    @if($product->travel_type == 'departure')
                                        {{ $product->origin }}
                                    @elseif($product->travel_type == 'Transit')
                                        {{ $product->trans }}
                                    @else
                                        {{ $product->destination }}
                                    @endif
                                </td>
                                <td>{{ ucfirst($product->travel_sector) }}</td>
                                <td>{{ $product->origin ?? 'N/A' }}</td>
                                <td>{{ $product->destination ?? 'N/A' }}</td>
                            </tr>
                            @php
                                $totalAmount += $product->total;
                            @endphp
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
</table>

                <table class="annexure_table" style="border: 1px solid #ccc;text-align: center;">
                    <tr>
                        <td style="font-size: 9pt;padding: 8px 0; ">Annexure 2: Flight Details </td>
                    </tr>
                    <tr>
                        <td style="padding: 0;">
                        <table>
    <thead>
        <tr>
            <th style="text-align: left;">Package ID</th>
            <th style="text-align: left;">Flight Number</th>
            @if($ordernew->orderProducts->contains(fn($product) => !empty($product->flight_number)))
                <th style="text-align: left;">Flight Date</th>
            @endif
            <th style="text-align: left;">Payment Method</th>
            <th style="text-align: left;">Payment Info</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ordernew->orderProducts as $product)
            <tr>
                <td>{{ $product->unique_pckageid }}</td>
                <td>{{ $product->flight_number ?? 'N/A' }}</td>
                @if($ordernew->orderProducts->contains(fn($item) => !empty($item->flight_number)))
                    <td>{{ $product->flight_number ? ($product->exit_date ?? 'N/A') : '' }}</td>
                @endif
                @if($ordernew->payment_method == "COD")
                <td>

                Pay Later

                </td>

                @else
                <td>
                   Online Payment 
                </td>
                @endif
                @if($ordernew->payment_method == "COD")
                <td>Credit Bill</td>
                @else

                <td>Success</td>
                
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

                        </td>
                    </tr>
                </table>
                <table class="annexure_table" style="border: 1px solid #ccc; text-align: center;">
    <tr>
        <td style="font-size: 9pt; padding: 8px 0; ">Annexure 3: Guest Details</td>
    </tr>
    <tr>
        <td style="padding: 0;">
        <table>
                <thead>
                    <tr>
                        <th style="text-align: left;">Package ID</th>
                        <th style="text-align: left;">Sr No</th>
                        <th style="text-align: left;">Guest Name</th>
                        <th style="text-align: left;">Age</th>
                        <th style="text-align: left;">Pnr Number</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $personalDetails = App\Models\PersonalDetails::where('order_id', $ordernew->id)->get();
                        $groupedPersonalDetails = $personalDetails->groupBy('package_id');
                    @endphp

                    @foreach($groupedPersonalDetails as $packageId => $passengers)
                        @foreach($passengers as $index => $passenger)
                            <tr>
                                <td>{{ $passenger->unique_pckageid }}</td>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $passenger->name }}</td>
                                <td>{{ $passenger->age }} (yrs)</td>
                                <td>{{ $passenger->pnr }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
</table>

            </td>
        </tr>
    </table>
    
</body>

</html>