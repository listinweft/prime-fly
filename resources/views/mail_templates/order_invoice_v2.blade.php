<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        * { font-family: "Montserrat", sans-serif; font-weight: 500; }
        body { font-optical-sizing: auto; }
        h4, h5, p, th, td { line-height: 1.6; margin: 0; }
        h4 { font-size: 13px; font-weight: 600; }
        p { font-size: 15px; }
        img { max-width: 100%; }
        table { width: 100%; border-spacing: 0; }
        table tr td, th { font-size: 13px; vertical-align: top; }
        ul li { margin: 0; }
        ul li table { width: auto !important; margin-left: 5px; }
        a, .ii a[href] { color: #222 !important; text-decoration: none !important; }
        .annexure_table, .annexure_table td, .annexure_table th { border: 1px solid #ccc; }
        .annexure_table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .annexure_table td { font-size: 11px; padding: 5px; }
        .annexure_table th { font-size: 12px; padding: 5px; font-weight: 600; }
        .social_icon ul { padding-left: 0; }
        .social_icon li { list-style: none; display: inline-block; margin-right: 10px; }
        .social_icon img { width: 15px; }
    </style>
</head>
<body>

@php
    $personaladdress = App\Models\PersonalDetails::where('order_id', $order->id)->first();
    $personaladdressfull = App\Models\PersonalDetails::where('order_id', $order->id)->get();
    $personaladdresnormal = App\Models\PersonalDetails::where('order_id', $order->id)->where('type', 'normal')->first();
@endphp

<table style="max-width: 500px; margin: auto;">
    <tr>
        <td style="padding: 30px 0;">
            <img src="https://primefly.in/public/frontend/images/email-banner.png" alt="Logo">
        </td>
    </tr>

    <tr>
        <td>
            <p style="font-size: 18px;">Your booking confirmation and receipt</p>
            <h4 style="font-size: 18px;">{{ date("F d, Y", strtotime($order->created_at)) }}</h4>
            <h5 style="font-size: 18px;">Booking ID: #primefly {{ $order->order_code }}</h5>
        </td>
    </tr>

    @foreach($order->orderProducts as $product)
        @php

        $count = $loop->iteration; // or use $index + 1
            $orderStatus = App\Models\OrderLog::where('order_product_id', $product->id)->latest()->first();
            $package = App\Models\Product::find($product->product_id);
            $orderStatusPrevious = App\Models\OrderLog::where('order_product_id', $product->id)->latest()->skip(1)->first();

            $filteredAddresses = $personaladdressfull->where('unique_pckageid', $product->unique_pckageid);
            $normalAddress = $personaladdresnormal && $personaladdresnormal->unique_pckageid == $product->unique_pckageid
                ? $personaladdresnormal
                : null;
            $hasGuestDetails = $filteredAddresses->isNotEmpty() || !empty($normalAddress?->name);
        @endphp

        @foreach($product->productData->product_categories ?? [] as $product_category)
            <tr>
                <td>
                    <h3 style="font-size: 20px; font-weight: 600;">{{ $product_category->title }}</h3>
                </td>
            </tr>

            <tr>
                <td style="padding: 20px 0;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td style="width: 50%;">
                                <p>{{ ucfirst($package->title) }}</p>
                                @if(!empty($product->exit_date))
                                    <p>Service Date</p>
                                @endif
                            </td>
                            <td style="width: 50%; border-left: 1px solid #ccc; padding-left: 60px;">
                                @if($product->travel_type == 'departure')
                                    <p><strong>{{ $product->origin }}</strong></p>
                                @elseif($product->travel_type == 'Transit')
                                    <p><strong>{{ $product->trans }}</strong></p>
                                @else
                                    <p><strong>{{ $product->destination }}</strong></p>
                                @endif

                                @if(!empty($product->exit_date))
                                    <p><strong style="font-weight: 600;">{{ $product->exit_date }}</strong></p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <h3 style="color: #5828BF; font-size: 24px; font-weight: 700;">Guest Details</h3>
                </td>
            </tr>

            <tr>
                <td style="padding: 15px 0;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td style="width: 50%;">
                                @foreach($filteredAddresses as $personaladdresss)
                                    @if(!empty($personaladdresss->name))
                                        <p style="line-height: 1.8;">{{ $personaladdresss->name }}</p>
                                        @if(!empty($personaladdresss->age))
                                            @php
                                                $ageLabel = match(true) {
                                                    $personaladdresss->age >= 12 => 'Adult',
                                                    $personaladdresss->age >= 2 => 'Child',
                                                    default => 'Infant',
                                                };
                                            @endphp
                                            <p>{{ $ageLabel }}</p>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                            <td style="width: 50%; text-align: right;">
                                <span style="border-radius: 20px; background-color: #f3f3f3; color: #44B258; display:inline-block; padding: 5px 10px; text-transform: uppercase; font-weight: 600;">
                                    Confirmed
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        @endforeach {{-- Closes product category loop --}}
    @endforeach {{-- Closes orderProducts loop --}}

    <tr>
        <td>
            <p style="margin-bottom:10px;font-size: 16px;">ORDER SUMMARY</p>
        </td>
    </tr>

    <tr>
        <td>
            <p style="margin-bottom: 10px; font-size: 12px; text-transform: uppercase;">TICKET AMOUNT</p>
        </td>
    </tr>
<tr>

<td>
    @php
        $orderTotal = $orderTotal > 0 ? $orderTotal : 0;
        $cgst = $orderTotal * 0.09;
        $sgst = $orderTotal * 0.09;
        $igst = $orderTotal * 0.18;
        $finalTotal = $order->tax_type == 'Outside' ? ($orderTotal + $igst) : ($orderTotal + $cgst + $sgst);



       
                     $totalIncluding18Percent = $cgst + $sgst + $orderTotal;
    @endphp

    <table style="width: 100%;">
        <tr>
            <td style="width: 40%;">
                <table style="width: 100%;">
                    <tr>
                    <td style="width: 33%; padding: 3px 0;">
    <p>Subtotal ({{ $count }} items) :</p>
</td>
                        <td style="width: 33%;"></td>
                        <td style="width: 33%; text-align: right;"><p><strong>{{ $order->currency }} {{ number_format($orderTotal - ($order->tax_type == 'Outside' ? $igst : $cgst + $sgst), 2) }}</strong></p></td>
                    </tr>
                    @if($order->tax_type == 'Outside')
                        <tr>
                            <td style="width: 33%;"><p>IGST (18%) :</p></td><td style="width: 33%;"></td>
                            <td style="text-align: right;width: 33%;"><p><strong>{{ $order->currency }} {{ number_format($igst, 2) }}</strong></p></td>
                        </tr>
                    @else
                        <tr>
                            <td style="width: 33%;"><p> CGST (9%) :</p></td><td style="width: 33%;"></td>
                            <td style="text-align: right;width: 33%;"><p><strong>{{ $order->currency }} {{ number_format($cgst, 2) }}</strong></p></td>
                        </tr>
                        <tr>
                            <td style="width: 33%;"><p>SGST (9%) :</p></td><td style="width: 33%;"></td>
                            <td style="text-align: right;width: 33%;"><p><strong>{{ $order->currency }} {{ number_format($sgst, 2) }}</strong></p></td>
                        </tr>
                    @endif
                    <tr style="font-weight: 600;">
                    <td style="width: 33%;padding:3px 0;">
                                        <p style="color:#3a3a3a;font-weight: 500;margin-bottom: 10px;">AMOUNT PAID </p>
                                    </td>
                        <td style="width: 33%;padding-left:20px"><p> Order Total:</p></td><td></td>
                        <td style="text-align: right;width: 33%;">
    <p><strong>{{ $order->currency }} {{ number_format(round($orderTotal), 0, '.', ',') }}.00</strong></p>
</td>

                    </tr>
                </table>
            </td>
        </tr>


    </table>
</td>
    </tr>
        <tr>
            <td>
                <img style="width:100%;margin-top:30px;" src="https://primefly.in/public/frontend/images/curve-border.png" alt="QR Code" style="width: 100px; height: auto;">
            </td>
        </tr>
        <tr>
            <td style="padding:15px 0;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 33%;">
                            <p style="line-height: 1.8;font-size: 10px;">Booking Date </p>
                            <p style="margin-bottom: 0px;line-height: 1.8;font-size: 12px;font-weight: 600;"> 
                            {{ \Carbon\Carbon::parse($order->created_at)->format('D, j M, Y') }}
                            </p>
                        </td> 
                        <td style="width: 33%;border-left: 1px solid #ccc;text-align: center; border-right: 1px solid #ccc;">
                            <p style="line-height: 1.8;font-size: 10px;">Payment Type</p>
                            <p style="margin-bottom: 0px;line-height: 1.8;font-size: 12px;font-weight: 600;"> 
                                UPI</p>
                        </td> 
                        <td style="width: 33%; padding-left:60px;">
                            <p style="line-height: 1.8;font-size: 10px;">Confirmation#</p>
                            <p style="margin-bottom: 0px;line-height: 1.8;font-size: 12px;font-weight: 600;"> 
                                483211</p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr> 
        <tr>
            <td style="padding-bottom: 15px;">
                <p style="color: #595959;line-height: 1.8;font-size: 12px;">IMPORTANT INSTRUCTIONS</p>
                <p style="color: #595959;line-height: 1.8;font-size: 12px;">This transaction can be cancelled only as per the cancellation policy.</p>
                <p style="color: #595959;line-height: 1.8;font-size: 12px;">PAN Based GSTN.320YLPS5894B1ZQ.</p>
            </td>
        </tr> 
        <tr>
            <td style="padding-top:15px;border-top:1px solid #ccc">
                <p style="font-size: 12px;margin-bottom: 5px;">Download Mobile App</p>
                <table style="width: 100%;">
                    <td style="width: 50%;"> 
                        <a href=""><img src="https://primefly.in/public/frontend/images/google-play.png" alt="Google Play" style="width:46%; height: auto;"></a>
                        <a href=""><img src="https://primefly.in/public/frontend/images/app-store.png" alt="App Store" style="width: 46%; height: auto;"></a>
                    </td>
                    <td style="width: 50%; padding-left: 60px;" class="social_icon">
                        <h4 style="margin-bottom: 3px;font-size: 14px;">Follow Us On</h4>
                        <ul style="margin: 0;">
                            <li>
                                <a href="">
                                    <img src="https://primefly.in/public/frontend/images/facebook-app-symbol.png" alt="Facebook" style="width: 15px; height: auto;">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="https://primefly.in/public/frontend/images/twitter.png" alt="Facebook" style="width: 15px; height: auto;">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="https://primefly.in/public/frontend/images/youtube.png" alt="Facebook" style="width: 15px; height: auto;">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="https://primefly.in/public/frontend/images/instagram.png" alt="Facebook" style="width: 15px; height: auto;">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="https://primefly.in/public/frontend/images/linkedin.png" alt="Facebook" style="width: 15px; height: auto;">
                                    
                                </a>
                            </li>
                        </ul>
                    </td>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <p style=" line-height: 1.8;font-size: 12px;margin-bottom: 20px;">For Further Assistance: <a href="">Help centre</a> </p>
            </td>
        </tr>
</table>
</body>
</html>
