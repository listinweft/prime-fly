<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
   style="width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <meta name="x-apple-disable-message-reformatting">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="telephone=no" name="format-detection">
      <title>{{ config('app.name') .'- Order Placed' }}</title>
      <meta name="color-scheme" content="light dark">
      <meta name="supported-color-schemes" content="light dark">
   </head>
   <body style="width:100%;font-family:arial,'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;background-color: #f6f6f6;">
      <table style="max-width: 600px;margin: auto;background-color: #fff;">
         <tr>
            <td align="center">
               <a target="_blank" href="#" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#659C35;font-size:16px">
               <img src="https://demo.wefttechnologies.com/primefly/public/frontend/img/logo-blue.png" alt style="display:block;border:0;outline:none;text-decoration:none;margin-bottom: 15px; " width="105">
               </a>
            </td>
         </tr>
         <tr>
            <td>
               <h1 class="darkmode-color" style="margin-top:0px; font-size: 24px;color: #6e56a2;margin-bottom: 0;text-align: center;">Thank You For <br> Booking With Us.</h1>
            </td>
         </tr>
         <tr>
            <td>
               <img src="https://demo.wefttechnologies.com/primeflly-email/header-flight.png" alt style="width:90%;display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;margin: auto;" class="adapt-img" >
            </td>
         </tr>
         @php
         $personaladdress = App\Models\PersonalDetails::where('order_id', $order->id)->first();
         $personaladdressfull = App\Models\PersonalDetails::where('order_id', $order->id)->where('type','meet_and_greet')->get();
         $personaladdressfullboth = App\Models\PersonalDetails::where('order_id', $order->id)->first();
         $personaladdresnormal = App\Models\PersonalDetails::where('order_id', $order->id)->where('type','normal')->first();
         @endphp
         <tr>
            <td align="center" style="padding-bottom:20px;border-bottom:1px solid #efefef;">
               <h2 class="darkmode-color" style="Margin:0;margin-top: 15px ; line-height:1.2;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:bold;color:#636363">Your booking confirmation and receipt</h2>
               <p class="darkmode-color" style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#636363;font-size:14px;font-weight: 600;padding-top: 10px;">
                  {{ date("F d, Y", strtotime($order->created_at)) }}
               </p>
            </td>
         </tr>
         <tr>
            <td style="padding: 0 20px;">
               <table>
                  @foreach($order->orderProducts as $product)
                  @php
                  $shoppingTotal[] = $product->total;
                  @endphp
                  <tr style="border-collapse:collapse">
                     <td align="left" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:0px;padding-right:0px;background-position:center top">
                        <table cellpadding="0" cellspacing="0" align="left" style="width:100%">
                           <tr style="border-collapse:collapse">
                              <td class="es-m-p20b" align="left" style="padding:0;Margin:0;">
                                 <table cellpadding="0" cellspacing="0" width="100%" style="background-position:left top;width: 100%;" role="presentation">
                                    <tr style="border-collapse:collapse">
                                       <td align="left" style="padding:0;Margin:0;font-size:0;width: 60px; vertical-align: top;">
                                          <img src="{{ asset($product->productData->thumbnail_image) }}" alt="" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;height:60px; width:60px; background-color: #ccc;object-fit: cover;">
                                       </td>
                                       <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:0px;vertical-align: top;">
                                          <h4 style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;font-style:normal;font-weight:normal;color:#000;padding: 10px; padding-top: 0;">
                                             <strong>{{ $product->productData->title }}</strong>
                                          </h4>
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
                                          @if($product_category->title == "Meet and Greet" )
                                          @if($personaladdressfull->isNotEmpty())
                                          @foreach($personaladdressfull as $personaladdresss)
                                          <div style="padding: 0 10px;">
                                             @if(!empty($personaladdresss->name))
                                             <span>Name: {{ $personaladdresss->name }}</span><br>
                                             @endif
                                             @if(!empty($personaladdresss->age))
                                             <span>Age: {{ $personaladdresss->age }}</span><br>
                                             @endif
                                             @if(!empty($personaladdresss->passport_number))
                                             <span>Passport Number: {{ $personaladdresss->passport_number }}</span><br>
                                             @endif
                                          </div>
                                          @endforeach
                                          @endif
                                          @else
                                          <div style="padding: 0 10px;">
                                             @if(!empty($personaladdresnormal->name))
                                             <span>Name: {{ $personaladdresnormal->name }}</span><br>
                                             @endif
                                             @if(!empty($personaladdresnormal->age))
                                             <span>Age: {{ $personaladdresnormal->age }}</span><br>
                                             @endif
                                             @if(!empty($personaladdresnormal->passport_number))
                                             <span>Passport Number: {{ $personaladdresnormal->passport_number }}</span><br>
                                             @endif
                                          </div>
                                          @endif
                                          <div style="padding: 0 10px;">
                                             <span style="color:#151525;font-size:11px;">{{ ucfirst($product_category->title) }} | </span>
                                             <span style="color:#707070;font-size:11px;">Package: {{ ucfirst($package->title) }}</span> |
                                             <span style="color:#707070;font-size:11px;">Package id: {{ ucfirst($product->unique_pckageid) }}</span> |
                                             <span style="color:#707070;font-size:11px;">Travel Sector: {{ ucfirst($product->travel_sector) }}</span> |
                                             @if($product->flight_number)
                                             <span style="color: #707070; font-size: 11px;">Flight Number: {{ $product->flight_number }}</span> |
                                             @endif
                                             @if(!is_null($product->travel_type) && $product->travel_type !== '')
                                             <span style="color:#707070;font-size:11px;">Service Offered: {{ ucfirst($product->travel_type) }}</span> |
                                             @endif
                                             @if($product->travel_type == 'departure')
                                             <span style="color:#707070;font-size:11px;">Service Airport: {{ $product->origin }}</span> | 
                                             @elseif($product->travel_type == 'Transit')
                                             <span style="color:#707070;font-size:11px;">Service Airport: {{ $product->trans }}</span> | 
                                             @else
                                             <span style="color:#707070;font-size:11px;">Service Airport: {{ $product->destination }}</span> | 
                                             @endif
                                             @if($product->origin)
                                             <span style="color:#707070;font-size:11px;">Origin: {{ $product->origin }}</span> | 
                                             @endif
                                             @if($product->destination)
                                             <span style="color:#707070;font-size:11px;">Destination: {{ $product->destination }}</span> |
                                             @endif
                                             @if($product->status == 'Refunded')
                                             <span style="color:#707070;font-size:11px;">Refund Status: {{ $refundStatus->status }}</span> | 
                                             @endif
                                             @if(!is_null($product->exit_date) && $product->exit_date !== '')
                                             <h4 style="color:#707070;font-size:11px; ">Service Date:{{$product->exit_date}}</h4>
                                             @endif
                                             @if(!is_null($product->entry_time) && $product->entry_time !== '')
                                             <h4 style="color:#707070;font-size:11px; ">Service Time:{{$product->entry_time}}</h4>
                                             @endif
                                          </div>
                                          @endforeach
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                     <td align="right" style="padding:0;Margin:0;text-align:right;vertical-align: top;">
                        <p style="margin-bottom:0;font-size:14px;font-weight:600;color:#7b45f6">INR{{ number_format($product->total, 2) }}</p>
                     </td>
                  </tr>
                  @endforeach
               </table>
            </td>
         </tr>
         <tr>
            <td>
                <div style="padding:20px 10px; text-align:center;color: #333333;
    font-size: 13px;background-color: #f4f7ff;">
                   @if(!empty($personaladdressfullboth->address))
    <span>Address: {{ $personaladdressfullboth->address }}</span><br>
@endif

@if(!empty($personaladdressfullboth->passport_number))
    <span>Passport Number: {{ $personaladdressfullboth->passport_number }}</span><br>
@endif

@if(!empty($personaladdressfullboth->pnr))
    <span>PNR: {{ $personaladdressfullboth->pnr }}</span><br>
@endif

@if(!empty($personaladdressfullboth->country))
    <span>Country: {{ $personaladdressfullboth->country }}</span><br>
@endif

@if(!empty($personaladdressfullboth->state))
    <span>State: {{ $personaladdressfullboth->state }}</span><br>
@endif

@if(!empty($personaladdressfullboth->city))
    <span>City: {{ $personaladdressfullboth->city }}</span><br>
@endif

@if(!empty($personaladdressfullboth->pincode))
    <span>Pincode: {{ $personaladdressfullboth->pincode }}</span><br>
@endif

@if(!empty($personaladdressfullboth->gst_number))
    <span>GST Number: {{ $personaladdressfullboth->gst_number }}</span><br>
@endif

@if(!empty($personaladdressfullboth->phone))
    <span>Phone Number: {{ $personaladdressfullboth->phone }}</span><br>
@endif

                 </div>
            </td>
         </tr>
        
         <tr>
            <td align="center" style="Margin:0;padding-bottom:15px;padding-top:15px;padding-left:20px;padding-right:20px;border-top:2px dashed #c8c8c8;border-bottom:2px dashed #c8c8c8;">
               <h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#636363">
                  Reciept
               </h4>
            </td>
         </tr>
         <tr style="border-collapse:collapse">
            <td align="center"  style="padding:0;Margin:0;padding-bottom:0px;padding-left:20px;padding-right:20px;padding-top: 10px;">
               <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;
                  font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                  {{$order->orderCustomer->CustomerData->first_name}}
                  {{$personaladdress->address}}
               </p>
            </td>
         </tr>
         <tr>
            <td>
               <table border="0" cellspacing="1" cellpadding="1" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:420px;margin: auto;" class="cke_show_border" role="presentation">
                  <tr style="border-collapse:collapse">
                     <td style="padding:0;Margin:0">
                        <h4
                           style="Margin:0;line-height:1.2;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color: #333333;
                           font-size: 13px;
                           font-weight: 500;text-align: right;">
                           Subtotal
                           ({{count($order->orderProducts)}}
                           items): 
                        </h4>
                     </td>
                     <td style=" Margin:0;color:#333333;padding:5px 10px;">
                        <strong style="font-size: 13px; font-weight: 600;">
                        {{ $order->currency }} {{ number_format($orderTotal, 2) }}
                        </strong>
                     </td>
                  </tr>
                  <tr style="border-collapse: collapse;">
                     @php
                     // Ensure $orderGrandTotal['orderGrandTotal'] is correctly assigned and greater than 0
                     $orderTotal = $orderTotal > 0 ? $orderTotal : 0;
                     // Calculate CGST and SGST (9% each)
                     $cgst = $orderTotal * 0.09;
                     $sgst = $orderTotal * 0.09;
                     // Calculate total amount including 18% tax (9% CGST + 9% SGST)
                     $totalIncluding18Percent = $cgst + $sgst + $orderTotal;
                     @endphp
                  <tr style="border-collapse: collapse;">
                     <td style="padding: 0; Margin: 0;">
                        <h4 style="Margin: 0; line-height:1.2; mso-line-height-rule: exactly; font-family: arial, 'helvetica neue', helvetica, sans-serif; color: #333333; font-size: 13px;
                           font-weight: 500;text-align: right;">
                           CGST (9%):
                        </h4>
                     </td>
                     <td style="padding: 0; Margin: 0; color: #333333;font-size: 13px; font-weight: 600;padding:5px 10px;">
                        <strong>{{ $order->currency }} {{ number_format($cgst, 2) }}</strong>
                     </td>
                  </tr>
                  <tr style="border-collapse: collapse;">
                     <td style="padding: 0; Margin: 0;">
                        <h4 style="Margin: 0; line-height: 200%; mso-line-height-rule: exactly; font-family: arial, 'helvetica neue', helvetica, sans-serif; color: #333333;font-size: 13px;
                           font-weight: 500;text-align: right;">
                           SGST (9%):
                        </h4>
                     </td>
                     <td style="padding: 0; Margin: 0; color: #333333;font-size: 13px; font-weight: 600;padding:5px 10px;">
                        <strong>{{ $order->currency }} {{ number_format($sgst, 2) }}</strong>
                     </td>
                  </tr>
                  <tr style="border-collapse: collapse;">
                     <td style="padding: 0; Margin: 0;">
                        <h4 style="Margin: 0; line-height: 200%; mso-line-height-rule: exactly; font-family: arial, 'helvetica neue', helvetica, sans-serif; color: #333333;font-size: 13px;
                           font-weight: 500;text-align: right;">
                           Order Total:
                        </h4>
                     </td>
                     <td style="padding: 0; Margin: 0;color: #333333;font-size: 13px; font-weight: 600;padding:5px 10px;">
                        <strong>{{ $order->currency }} {{ number_format(round($totalIncluding18Percent), 0, '.', ',') }}.00</strong>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td style="background-color: #FDF8F4;">
               <table style="width: 100%;">
                  <tr style="border-collapse:collapse">
                     <td >
                        <table style="width: 100%;">
                           <tr>
                              <td align="center"
                                 style="padding:0;Margin:0;padding-top:10px;width: 20%; vertical-align: bottom;">
                                 <a href="https://primefly.in/service/meet-and-greet" style="text-decoration: none;"  target="_blank">
                                    <img style="width: 50px;" src="https://demo.wefttechnologies.com/primeflly-email/greeting.png">
                                    <p style="font-size: 12px;font-weight: 600; color: #7d7d7d; min-height:32px;margin-bottom: 0;">Meet & Greet</p>
                                 </a>
                              </td>
                              <td align="center"
                                 style="padding:0;Margin:0;padding-top:10px;width: 20%; vertical-align: bottom;">
                                 <a href="https://primefly.in/service/baggage-wrapping" style="text-decoration: none;" target="_blank">
                                    <img style="width: 50px;" src="https://demo.wefttechnologies.com/primeflly-email/travel.png">
                                    <p style="font-size: 12px;font-weight: 600;    color: #7d7d7d; min-height:32px;margin-bottom: 0;">Baggage Wrapping</p>
                                 </a>
                              </td>
                              <td align="center"
                                 style="padding:0;Margin:0;padding-top:10px;width: 20%; vertical-align: bottom;">
                                 <a href="https://primefly.in/service/car-parking" style="text-decoration: none;"  target="_blank">
                                    <img style="width: 50px;" src="https://demo.wefttechnologies.com/primeflly-email/parking.png">
                                    <p style="font-size: 12px;font-weight: 600;    color: #7d7d7d; min-height: 32px;margin-bottom: 0;">Car Parking</p>
                                 </a>
                              </td>
                              <td align="center"
                                 style="padding:0;Margin:0;padding-top:10px;width: 20%; vertical-align: bottom;">
                                 <a href="https://primefly.in/service/porter" style="text-decoration: none;" target="_blank">
                                    <img style="width: 50px;" src="https://demo.wefttechnologies.com/primeflly-email/porter.png">
                                    <p style="font-size: 12px;font-weight: 600;    color: #7d7d7d; min-height: 32px;margin-bottom: 0;">Porter</p>
                                 </a>
                              </td>
                              <td align="center"
                                 style="padding:0;Margin:0;padding-top:10px;width: 20%; vertical-align: bottom;">
                                 <a href="https://primefly.in/service/louch-booking" style="text-decoration: none;"  target="_blank">
                                    <img style="width: 50px;" src="https://demo.wefttechnologies.com/primeflly-email/lounge.png">
                                    <p style="font-size: 12px;font-weight: 600;    color: #7d7d7d; min-height: 32px;margin-bottom: 0;">Lounge Booking</p>
                                 </a>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td style="text-align: center;padding-bottom: 20px;">
                        <a href="https://primefly.in/services" target="_blank" style="padding:5px 15px; 
                           font-size: 12px;
                           border: 0;background-color: #7b45f6; display: inline-block;color:white;text-decoration: none;border-radius: 20px;">View More</a>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td style="padding-bottom:20px;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center center;background-color:#122031">
               <table width="100%" cellspacing="0" cellpadding="0"
                  role="presentation"
                  style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                  <tr style="border-collapse:collapse">
                     <td style="vertical-align: bottom;">
                        <a target="_blank" href="javascript:void(0)"
                           style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#659C35;font-size:16px"><img
                           src="https://demo.wefttechnologies.com/primefly/public/frontend/img/logo.png"
                           alt
                           style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                           width="85"></a>
                     </td>
                     <td style="vertical-align: bottom;" align="center">
                        <p style="margin-bottom: 0;margin-top: 0;"><a href="tel:+7 (411) 390-51-11" style="font-size: 12px;color: white;text-decoration: none;opacity: 0.7;">+7 (411) 390-51-11</a></p>
                        <p style="margin-top:8px; margin-bottom: 0;"><a href="mailto:info@primefly.com" style="font-size: 12px;color: white;text-decoration: none;opacity: 0.7;">info@primefly.com</a></p>
                     </td>
                     <td align="right"
                        style="padding:0;Margin:0;padding-bottom:0px;font-size:0; vertical-align: bottom;">
                        <table class="es-table-not-adapt es-social"
                           cellspacing="0" cellpadding="0"
                           role="presentation"
                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                           <tr style="border-collapse:collapse">
                              <td valign="top" align="center"
                                 style="padding:0;Margin:0;padding-right:10px">
                                 <a href="{{ $common->facebook_url }}"><img
                                    title="Facebook"
                                    src="https://pkbjxh.stripocdn.email/content/assets/img/social-icons/circle-white/facebook-circle-white.png"
                                    alt="Fb" width="24"
                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
                              </td>
                              <td valign="top" align="center"
                                 style="padding:0;Margin:0;padding-right:10px">
                                 <a href="{{ $common->twitter_url }}"><img
                                    title="Twitter"
                                    src="https://pkbjxh.stripocdn.email/content/assets/img/social-icons/circle-white/twitter-circle-white.png"
                                    alt="Tw" width="24"
                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
                              </td>
                              <td valign="top" align="center"
                                 style="padding:0;Margin:0"><a
                                 href="{{ $common->instagram_url }}"><img
                                 title="Instagram"
                                 src="https://pkbjxh.stripocdn.email/content/assets/img/social-icons/circle-white/instagram-circle-white.png"
                                 alt="Yt" width="24"
                                 style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <!-- <tr style="border-collapse:collapse">
                     <td align="center" style="padding:0;Margin:0">
                        <p
                           style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:20px;color:#ffffff;font-size:13px">
                           You are receiving this email because you have
                           visited our site or asked us about a regular
                           newsletter. Make sure our messages get to your inbox
                           (and not your bulk or junk folders).
                        </p>
                     </td>
                     </tr> -->
               </table>
            </td>
         </tr>
      </table>
   </body>
</html>