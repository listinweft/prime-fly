<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
      <!--[if (mso 16)]>
      <style type="text/css">
         a {
         text-decoration: none;
         }
      </style>
      <![endif]-->
      <!--[if gte mso 9]>
      <style>sup {
         font-size: 100% !important;
         }
      </style>
      <![endif]-->
      <!--[if gte mso 9]>
      <xml>
         <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
         </o:OfficeDocumentSettings>
      </xml>
      <![endif]-->
      <style type="text/css">
         #outlook a {
         padding: 0;
         }
         .ExternalClass {
         width: 100%;
         }
         .ExternalClass,
         .ExternalClass p,
         .ExternalClass span,
         .ExternalClass font,
         .ExternalClass td,
         .ExternalClass div {
         line-height: 100%;
         }
         .es-button {
         mso-style-priority: 100 !important;
         text-decoration: none !important;
         }
         a[x-apple-data-detectors] {
         color: inherit !important;
         text-decoration: none !important;
         font-size: inherit !important;
         font-family: inherit !important;
         font-weight: inherit !important;
         line-height: inherit !important;
         }
         .es-desk-hidden {
         display: none;
         float: left;
         overflow: hidden;
         width: 0;
         max-height: 0;
         line-height: 0;
         mso-hide: all;
         }
         .es-button-border:hover a.es-button, .es-button-border:hover button.es-button {
         background: #7dbf44 !important;
         border-color: #7dbf44 !important;
         }
         .es-button-border:hover {
         background: #7dbf44 !important;
         border-color: #7dbf44 #7dbf44 #7dbf44 #7dbf44 !important;
         }
         [data-ogsb] .es-button {
         border-width: 0 !important;
         padding: 10px 20px 10px 20px !important;
         }
         td .es-button-border:hover a.es-button-1 {
         background: #7dbf44 !important;
         border-color: #7dbf44 !important;
         }
         td .es-button-border-2:hover {
         background: #7dbf44 !important;
         }
         [data-ogsb] .es-button.es-button-3 {
         padding: 10px 20px !important;
         }
         @media only screen and (max-width: 600px) {
         p, ul li, ol li, a {
         line-height: 150% !important
         }
         h1 {
         font-size: 30px !important;
         text-align: center;
         line-height: 120% !important
         }
         h2 {
         font-size: 22px !important;
         text-align: center;
         line-height: 120% !important
         }
         h3 {
         font-size: 24px !important;
         text-align: center;
         line-height: 1.2 !important
         }
         .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a {
         font-size: 30px !important
         }
         .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a {
         font-size: 22px !important
         }
         .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a {
         font-size: 20px !important
         }
         .es-menu td a {
         font-size: 16px !important
         }
         .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a {
         font-size: 15px !important
         }
         .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a {
         font-size: 15px !important
         }
         .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a {
         font-size: 14px !important
         }
         .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a {
         font-size: 12px !important
         }
         *[class="gmail-fix"] {
         display: none !important
         }
         .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 {
         text-align: center !important
         }
         .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 {
         text-align: right !important
         }
         .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 {
         text-align: left !important
         }
         .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img {
         display: inline !important
         }
         .es-button-border {
         display: block !important
         }
         a.es-button, button.es-button {
         font-size: 20px !important;
         display: block !important;
         border-left-width: 0px !important;
         border-right-width: 0px !important
         }
         .es-btn-fw {
         border-width: 10px 0px !important;
         text-align: center !important
         }
         .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right {
         width: 100% !important
         }
         .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header {
         width: 100% !important;
         max-width: 600px !important
         }
         .es-adapt-td {
         display: block !important;
         width: 100% !important
         }
         .adapt-img {
         width: 100% !important;
         height: auto !important
         }
         .es-m-p0 {
         padding: 0px !important
         }
         .es-m-p0r {
         padding-right: 0px !important
         }
         .es-m-p0l {
         padding-left: 0px !important
         }
         .es-m-p0t {
         padding-top: 0px !important
         }
         .es-m-p0b {
         padding-bottom: 0 !important
         }
         .es-m-p20b {
         padding-bottom: 20px !important
         }
         .es-mobile-hidden, .es-hidden {
         display: none !important
         }
         tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden {
         width: auto !important;
         overflow: visible !important;
         float: none !important;
         max-height: inherit !important;
         line-height: inherit !important
         }
         tr.es-desk-hidden {
         display: table-row !important
         }
         table.es-desk-hidden {
         display: table !important
         }
         td.es-desk-menu-hidden {
         display: table-cell !important
         }
         .es-menu td {
         width: 1% !important
         }
         table.es-table-not-adapt, .esd-block-html table {
         width: auto !important
         }
         table.es-social {
         display: inline-block !important
         }
         table.es-social td {
         display: inline-block !important
         }
         }
         @media (prefers-color-scheme: dark) {
            .darkmode-bg {
                background-color: #fff !important;
            }
            .darkmode-color {
                color: #ffffff !important;
            }
            }
      </style>
   </head>
   <body
      style="width:100%;font-family:arial, 'helvetica neue', helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
      <div class="es-wrapper-color" style="background-color:#F6F6F6">
         <!--[if gte mso 9]>
         <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
            <v:fill type="tile" color="#f6f6f6"></v:fill>
         </v:background>
         <![endif]-->
         <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
            <tr style="border-collapse:collapse">
               <td valign="top" style="padding:0;Margin:0">
                  <table cellpadding="0" cellspacing="0" class="es-header" align="center"  style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                     <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                           <table class="es-header-body darkmode-bg" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                              align="center"
                              style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                              <tr style="border-collapse:collapse">
                                 <td align="center"
                                    style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                                    <!--[if mso]>
                                 </td>
                                 <td style="width:173px" valign="top">
                                    <![endif]-->
                                    <table class="es-left" cellspacing="0" cellpadding="0" align="center"
                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px; ">
                                       <tr style="border-collapse:collapse">
                                          <td class="es-m-p20b" align="center"
                                             style="padding:0;Margin:0;">
                                             <table width="100%" cellspacing="0" cellpadding="0"
                                                role="presentation"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                <tr style="border-collapse:collapse">
                                                   <td align="center"
                                                      style="padding:0;Margin:0;padding-bottom:5px;font-size:0">
                                                      <a target="_blank" href="#"
                                                         style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#659C35;font-size:16px"><img
                                                         src="https://demo.wefttechnologies.com/primefly/public/frontend/img/logo-blue.png"
                                                         alt
                                                         style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                         width="105"></a>
                                                   </td>
                                                </tr>
                                             </table>
                                          </td>
                                       </tr>
                                    </table>
                                    <!--[if mso]>
                                 </td>
                                 <td style="width:20px"></td>
                                 <td style="width:173px" valign="top">
                                    <![endif]-->
                                    <!--[if mso]>
                                 </td>
                              </tr>
                           </table>
                           <![endif]-->
                        </td>
                     </tr>
                     <tr style="border-collapse:collapse">
                        <td align="left" style="Margin:0;padding-bottom:10px;padding-top:0px;padding-left:20px;padding-right:20px">
                           <!--[if mso]>
                        </td>
                        <td style="width:173px" valign="top">
                           <![endif]--> 
                           <table cellpadding="0" cellspacing="0" class="es-right" align="center"
                              style="mso-table-lspace:0pt; mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px; ">
                              <tr style="border-collapse:collapse">
                                 <td align="center" style="padding:0;Margin:0;">
                                    <h1 class="darkmode-color" style="margin-top:0px; font-size: 24px;color: #6e56a2;margin-bottom: 0;">Thank You For <br> Booking With Us.</h1>
                                 </td>
                              </tr>
                           </table>
                           <!--[if mso]>
                        </td>
                        <td style="width:20px"></td>
                        <td style="width:173px" valign="top">
                           <![endif]-->
                           <!--[if mso]>
                        </td>
                     </tr>
                  </table>
                  <![endif]-->
               </td>
            </tr>
            <tr style="border-collapse:collapse">
               <td align="left"
                  style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                  <!--[if mso]>
               </td>
               <td style="width:173px" valign="top">
                  <![endif]--> 
                  <table cellpadding="0" cellspacing="0" class="es-right" align="right"
                     style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                     <tr style="border-collapse:collapse">
                        <td align="left" style="padding:0;Margin:0;">
                           <img
                              src="https://demo.wefttechnologies.com/primeflly-email/header-flight.png"
                              alt
                              style="width:90%;display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;margin: auto;"
                              class="adapt-img" >
                        </td>
                     </tr>
                  </table>
                  <!--[if mso]>
               </td>
               <td style="width:20px"></td>
               <td style="width:173px" valign="top">
                  <![endif]-->
                  <!--[if mso]>
               </td>
            </tr>
         </table>
         <![endif]--></td>
         </tr>
         </table>
         </td>
         </tr> 
         </table>
         @php


         $personaladdress = App\Models\PersonalDetails::where('order_id', $order->id)->first();
         $personaladdressfull = App\Models\PersonalDetails::where('order_id', $order->id)->get();

         @endphp
         <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
            <tr style="border-collapse:collapse">
               <td align="center" style="padding:0;Margin:0">
                  <table bgcolor="#ffffff" class="es-content-body darkmode-bg" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                     <tr style="border-collapse:collapse">
                        <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center top">
                           <table cellpadding="0" cellspacing="0" width="100%"
                              style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                              <tr style="border-collapse:collapse">
                                 <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                    <table cellpadding="0" cellspacing="0" width="100%"role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                       <tr style="border-collapse:collapse">
                                          <td align="center" style="padding:0;Margin:0">
                                             <h2 class="darkmode-color" style="Margin:0;line-height:1.2;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:bold;color:#636363">Your booking confirmation and reciept</h2>
                                          </td>
                                       </tr>
                                       <tr style="border-collapse:collapse">
                                          <td align="center"
                                             style="padding:0;Margin:0;padding-top:10px">
                                             <p class="darkmode-color" style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#636363;font-size:14px;font-weight: 600;">
                                                {{ date("F, d Y", strtotime($order->created_at))  }}
                                             </p>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                     <tr style="border-collapse:collapse">
                        <td align="left"
                           style="Margin:0;padding-bottom:0px;padding-top:20px;padding-left:0px;padding-right:0px">
                           <table class="es-left" cellspacing="0" cellpadding="0" align="left"
                              style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%">
                              <tr style="border-collapse:collapse">
                                 <td class="es-m-p20b" align="left"
                                    style="padding:0;Margin:0;width:100%;border-top:1px solid #efefef;border-bottom:2px dashed #c8c8c8">
                                    <table class="darkmode-bg"
                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;
                                       border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#fff;background-position:center top"
                                       width="100%" cellspacing="0" cellpadding="0" bgcolor="#efefef"
                                       role="presentation">
                                       <tr style="border-collapse:collapse">
                                          <td align="left"
                                             style="padding:0;Margin:0;padding-bottom:20px;padding-left:30px;padding-right:30px;">
                                             <table
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%"
                                                class="cke_show_border" cellspacing="1"
                                                cellpadding="1" border="0" align="left"
                                                role="presentation">
                                                <tr style="border-collapse:collapse">
                                                   <td style="padding:0;Margin:0;font-size:14px;line-height:21px;vertical-align: bottom;">
                                                      <p style="margin-bottom: 0;font-weight: 600; font-size: 12px; color: #8e8e8e;">Order ID: <span style="font-size:12px;line-height:21px;color:#8e8e8e">Primefly#084</span> </p>
                                                      <strong>
                                                         <!-- <span style="font-size:14px;line-height:21px">{{'Primefly#'.$order->order_code}}</span> --> 
                                                      </strong>
                                                   </td>
                                                   <td style="padding:0;Margin:0;text-align: right;vertical-align: bottom;">
                                                   </td>
                                                </tr>

                                                @foreach($order->orderProducts as $product)
                                                @php
                                                $shoppingTotal[] = $product->total;
                                                @endphp
                                                <tr style="border-collapse:collapse">
                                                   <td align="left"
                                                      style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:0px;padding-right:0px;background-position:center top">
                                                      <table cellpadding="0" cellspacing="0" class="es-left" align="left"
                                                         style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%">
                                                         <tr style="border-collapse:collapse">
                                                            <td class="es-m-p20b" align="left"
                                                               style="padding:0;Margin:0; ">
                                                               <table cellpadding="0" cellspacing="0" width="100%"
                                                                  style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top;width: 100%;"
                                                                  role="presentation">
                                                                  <tr style="border-collapse:collapse">
                                                                     <td align="left"
                                                                        style="padding:0;Margin:0;font-size:0;width: 60px;"> <img 
                                                                        src="{{asset($product->productData->thumbnail_image)}}"
                                                                        alt
                                                                        style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;height:60px;
                                                                        width:60px;
                                                                        background-color: #ccc;object-fit: cover;" > </td>
                                                                     <td align="left" class="es-m-txt-l"
                                                                        style="padding:0;Margin:0;padding-top:10px">
                                                                        <h4
                                                                           style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:16px;font-style:normal;font-weight:normal;color:#000;padding: 10px;">
                                                                           <strong>{{$product->productData->title}}</strong>

                                                                        </h4>

                                                                        <h4
                                                                           style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:16px;font-style:normal;font-weight:normal;color:#000;padding: 10px;">

                                                                          
                                                                        </h4>
                                                                        <span>HIIIIIII</span>
                                                                         @foreach($personaladdressfull as $personaladdresss)
                                                                         <span>{{$personaladdresss->name}} </span>
                                                                         <span>{{$personaladdresss->age}} </span>
                                                                         <span>{{$personaladdresss->passport_number}} </span>
                                                                           @endforeach
                                                                     </td>
                                                                     <td align="right" class="es-m-txt-l"
                                                                        style="padding:0;Margin:0;padding-top:10px">
                                                                        <h3
                                                                           style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:19px;font-style:normal;font-weight:normal;color:#659c35">
                                                                           <strong><span style="font-size:16px;line-height:21px;color:#6e56a2;">{{$order->currency}} {{$product->cost}}</span>
                                                                           </strong>
                                                                        </h3>
                                                                     </td>
                                                                  </tr>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </table>
                                                   </td>
                                                </tr>

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
                            <td style="width: 5%; padding: 10px 0;"> <h3 style="color:#151525;font-size:11px;"></h3></td>
                            <td style="width: 60%; padding: 10px 0;">
                                <h3 style="color:#151525;font-size:11px;">{{ ucfirst($product_category->title) }}</h3>
                                <h4 style="color:#707070;font-size:11px; ">Package:{{ ucfirst($package->title) }}</h4>

                                <h4 style="color:#707070;font-size:11px; ">Travel Sector:{{ ucfirst($product->travel_sector) }}</h4>




                              

                                @if(!is_null($product->travel_type) && $product->travel_type !== '')

<h4 style="color:#707070;font-size:11px; ">Service Offered:{{ucfirst($product->travel_type)}}</h4>

@endif


@if($product->travel_type == 'departure')


<h4 style="color:#707070;font-size:11px; ">Service Airport:{{$product->origin}}</h4>

@else

<h4 style="color:#707070;font-size:11px; ">Service Airport:{{$product->destination}}</h4>

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
                            
                           
                        </tr>
                       
                    @endforeach
                                                
                                                @endforeach
                                                @php
                                                $sub_total = array_sum($shoppingTotal);
                                                $grand_total = $sub_total+$order->shipping_charge+$order->tax_amount+$order->gift_wrapper_charge;
                                                @endphp 
                                             </table>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                           </table>
                           <!--[if mso]>
                        </td>
                        <td style="width:0px"></td>
                        <td style="width:280px" valign="top">
                           <![endif]-->
                           <table  cellspacing="0" cellpadding="0" align="center"
                              style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width: 100%; text-align: center; ">
                              <tr style="border-collapse:collapse">
                                 <td align="center" style="padding:0;Margin:0;width:100%">
                                    <table class="darkmode-bg"
                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid transparent;
                                       border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#fff;background-position:center top"
                                       width="100%" cellspacing="0" cellpadding="0" bgcolor="#efefef"
                                       role="presentation">
                                       <tr style="border-collapse:collapse">
                                          <td align="center"
                                             style="Margin:0;padding-bottom:15px;padding-top:15px;padding-left:20px;padding-right:20px;border-bottom:2px dashed #c8c8c8;">
                                             <h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#636363">
                                                Reciept
                                             </h4>
                                          </td>
                                       </tr>
                                       <tr style="border-collapse:collapse">
                                          <td align="center"
                                             style="padding:0;Margin:0;padding-bottom:0px;padding-left:20px;padding-right:20px;padding-top: 10px;">
                                             <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;
                                                font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                {{$order->orderCustomer->CustomerData->first_name}}

                                                {{$personaladdress->address}}
                                             </p>
                                          </td>
                                       </tr>
                                       <tr style="border-collapse:collapse">
                                          <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                             <table cellpadding="0" cellspacing="0" width="100%"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;border-bottom:2px dashed #c8c8c8;background-position:center top"
                                                role="presentation">
                                                <tr style="border-collapse:collapse">
                                                   <td align="left"
                                                      style="padding:0;Margin:0;padding-top:10px;padding-bottom: 15px;">
                                                      <table border="0" cellspacing="1" cellpadding="1"
                                                         style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:420px;margin: auto;"
                                                         class="cke_show_border" role="presentation">
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
                                                               <strong style="font-size: 13px;
                                                                  font-weight:600;"> {{$order->currency.' '.$orderTotal}}</strong>
                                                            </td>
                                                         </tr>
                                                         <tr style="border-collapse: collapse;">
                                                            @php
                                                            // Calculate CGST and SGST based on order grand total
                                                            $cgst = ($orderGrandTotal['orderGrandTotal'] > 0 ? $orderGrandTotal['orderGrandTotal'] : 0) * 0.09;
                                                            $sgst = ($orderGrandTotal['orderGrandTotal'] > 0 ? $orderGrandTotal['orderGrandTotal'] : 0) * 0.09;
                                                            // Calculate total amount including 18%
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
                                                               <strong>{{ $order->currency }} {{ number_format($totalIncluding18Percent, 2) }}</strong>
                                                            </td>
                                                         </tr>
                                                      </table>
                                                   </td>
                                                </tr>
                                             </table>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                           </table>
                           <!--[if mso]>
                        </td>
                     </tr>
                  </table>
                  <![endif]-->
               </td>
            </tr>
         </table>
         </td>
         </tr>
         </table>
         <table bgcolor="#ffffff" class="darkmode-bg" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
            <tr style="border-collapse:collapse">
               <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center top;background-color: #FDF8F4;padding-bottom: 20px;">
                  <table cellpadding="0" cellspacing="0" width="100%"
                     style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                     <tr style="border-collapse:collapse">
                        <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                           <table cellpadding="0" cellspacing="0" width="100%"role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                              <tr style="border-collapse:collapse">
                                 <td align="center" style="padding:0;Margin:0">
                                    <h2 style="Margin:0;line-height:1.2;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:bold;color:#636363;margin-bottom: 15px;">Services</h2>
                                 </td>
                              </tr>
                              <tr style="border-collapse:collapse">
                                <td>
                                <table style="width: 100%;">
                                    <tr>
                                        <td align="center"
                                        style="padding:0;Margin:0;padding-top:10px;width: 20%; vertical-align: bottom;"> 
                                        <a href="https://demo.wefttechnologies.com/primefly/service/meet-and-greet" style="text-decoration: none;"  target="_blank">
                                            <img style="width: 50px;" src="https://demo.wefttechnologies.com/primeflly-email/greeting.png">
                                            <p style="font-size: 12px;font-weight: 600; color: #7d7d7d; min-height:32px;">Meet & Greet</p>
                                        </a>
                                       
                                     </td>
                                     <td align="center"
                                     style="padding:0;Margin:0;padding-top:10px;width: 20%; vertical-align: bottom;"> 
                                     <a href="https://demo.wefttechnologies.com/primefly/service/baggage-wrapping" style="text-decoration: none;" target="_blank">
                                        <img style="width: 50px;" src="https://demo.wefttechnologies.com/primeflly-email/travel.png">
                                        <p style="font-size: 12px;font-weight: 600;    color: #7d7d7d; min-height:32px;">Baggage Wrapping</p>
                                     </a>
                                    
                                  </td>
                                  <td align="center"
                                  style="padding:0;Margin:0;padding-top:10px;width: 20%; vertical-align: bottom;"> 
                                  <a href="https://demo.wefttechnologies.com/primefly/service/car-parking" style="text-decoration: none;"  target="_blank">
                                    <img style="width: 50px;" src="https://demo.wefttechnologies.com/primeflly-email/parking.png">
                                    <p style="font-size: 12px;font-weight: 600;    color: #7d7d7d; min-height: 32px;">Car Parking</p>   
                                  </a>
                                  
                               </td>
                                <td align="center"
                                style="padding:0;Margin:0;padding-top:10px;width: 20%; vertical-align: bottom;"> 
                                <a href="https://demo.wefttechnologies.com/primefly/service/porter" style="text-decoration: none;" target="_blank">
                                    <img style="width: 50px;" src="https://demo.wefttechnologies.com/primeflly-email/porter.png">
                                <p style="font-size: 12px;font-weight: 600;    color: #7d7d7d; min-height: 32px;">Porter</p>         
                                </a>
                               
                                </td>
                                <td align="center"
                                style="padding:0;Margin:0;padding-top:10px;width: 20%; vertical-align: bottom;"> 
                                <a href="https://demo.wefttechnologies.com/primefly/service/louch-booking" style="text-decoration: none;"  target="_blank">
                                    <img style="width: 50px;" src="https://demo.wefttechnologies.com/primeflly-email/lounge.png">
                                    <p style="font-size: 12px;font-weight: 600;    color: #7d7d7d; min-height: 32px;">Lounge Booking</p>       
                                </a>
                               
                                </td>
                                    </tr>
                                </table> 
                            </td>
                              </tr>
                              <tr>
                                <td style="text-align: center;">
                                    <a href="https://demo.wefttechnologies.com/primefly/services" target="_blank" style="padding:5px 15px;
                                    font-size: 12px;
                                    border: 0;background-color: #7b45f6; display: inline-block;color:white;text-decoration: none;border-radius: 20px;margin-top: 15px;">View More</a>
                                </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
        </table>
         <table cellpadding="0" cellspacing="0" class="es-footer" align="center"
            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
            <tr style="border-collapse:collapse">
               <td align="center" style="padding:0;Margin:0">
                  <table class="es-footer-body"
                     style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;width:600px"
                     cellspacing="0" cellpadding="0" bgcolor="#333333" align="center">
                    
                     <tr style="border-collapse:collapse">
                        <td style="Margin:0;padding-bottom:20px;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center center;background-color:#122031"
                           bgcolor="#659C35" align="left">
                           <table width="100%" cellspacing="0" cellpadding="0"
                              style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                              <tr style="border-collapse:collapse">
                                 <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
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
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         <table cellpadding="0" cellspacing="0" class="es-content" align="center"
            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
            <tr style="border-collapse:collapse">
               <td align="center" style="padding:0;Margin:0">
                  <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0"
                     cellspacing="0"
                     style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                     <tr style="border-collapse:collapse">
                        <td align="left"
                           style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px;background-position:left top">
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         </td>
         </tr>
         </table>
      </div>
   </body>
</html>