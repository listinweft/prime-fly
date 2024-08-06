@extends('Admin.layouts.main')
@section('content')
<style> 
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
      </style>
    <div class="content-wrapper" >
        <section class="content-header" style="padding-top:20px">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="nav-icon fas fa-user-shield"></i> View Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url(Helper::sitePrefix().'dashboard')}}">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url(Helper::sitePrefix().'order')}}">Orders</a></li>
                            <li class="breadcrumb-item active">Order View - {{'PP'.$order->order_code}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <table class="invoice_table" style=" width: 100%; background-color: #fff;max-width:auto;margin:auto;font-family: sans-serif; margin-bottom:60px">
      <tr>
         <td style="padding:20px 35px">
            <table style="width:100%">
      <tr>
         <table>
            <tr>
               <td style="vertical-align:bottom;">
                  <h1 style="font-size:30px;color:#B2B7C2;">INVOICE</h1>
                  <h4 style="color:#707070; font-size: 17px; font-weight:700; text-transform: uppercase;margin-bottom:10px">Invoice {{ $order->order_code }}</h4>
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
                           <td style="width:33%;border:1px solid #D7DAE0;border-left:0;padding:20px;padding-left:0;border-right:0;">
                              <h4 style="color:#1A1C21;font-size:14px;font-weight:700;margin-bottom:10px">Issued</h4>
                              <h5 style="color:#5E6470;font-size:13px">{{ date("F, d Y", strtotime($order->created_at))  }}</h5>
                           </td>
                           <td style="width:33%;border:1px solid #D7DAE0;border-left:0;border-right:0;padding:20px;">
                              <p style="color:#5E6470;font-size:13px;line-height:1.4"> 
                                 @if($orderDetails)
                                 {{@$orderDetails->shippingAddress->first_name .' '.@$orderDetails->shippingAddress->last_name}}
                                 @endif
                              </p>
                           </td>
                           <td style="width:33%;border:1px solid #D7DAE0;border-right:0;border-left:0;padding:20px;padding-right:0">
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
                              <h4 style="color:#707070;font-size:14px;font-weight:700; ">SUBTOTAL</h4>
                           </td>
                        </tr>
                     </table>
                  </td>
               </tr>
               <tr>
                  <td style="border-bottom:1px solid #D7DAE0;">
                     <table>
                        @php
                        $shoppingTotal = [];
                        $refundStatus = $refundStatusPrevious = null;
                        @endphp
                        @foreach($order->orderProducts as $product)
                        @php
                        $package = App\Models\Product::where('id', $product->product_id)->first();
                        $category = App\Models\Category::where('id', $package->category_id)->first();
                        $product_category = $category->title;
                        $shoppingTotal[] = $product->total;
                        $orderStatus = App\Models\OrderLog::where('order_product_id', '=', $product->id)->orderBy('created_at', 'DESC')->first();
                        $orderStatusPrevious = App\Models\OrderLog::where('order_product_id', $product->id)->orderBy('id', 'DESC')->skip(1)->take(1)->first();
                        if ($orderStatus->status == 'Refunded') {
                        $refundStatus = $orderStatus;
                        $refundStatusPrevious = $orderStatusPrevious;
                        }
                        @endphp
                        <tr>
                           <td style="width: 5%; padding: 10px 0;">
                              <h3 style="color:#151525;font-size:14px;">{{ $loop->iteration }}</h3>
                           </td>
                           <td style="width: 40%; padding: 10px 0;">
                              <h3 style="color:#151525;font-size:14px; font-weight:700;margin-bottom:5px;">{{ $category->title }}</h3>
                              <h4 style="color:#707070;font-size:12px; ">Package:{{ $product->productData->title }}</h4>
                              <h4 style="color:#707070;font-size:12px; ">{{ ucfirst($product->travel_sector) }}</h4>
                              @if(!is_null($product->travel_type) && $product->travel_type !== '')
                              <h4 style="color:#707070;font-size:12px; ">Service Offered:{{ucfirst($product->travel_type)}}</h4>
                              @endif
                              @if($product->travel_type == 'departure')
                              <h4 style="color:#707070;font-size:12px; ">Service Airport:{{$product->origin}}</h4>
                              @else
                              <h4 style="color:#707070;font-size:12px; ">Service Airport:{{$product->destination}}</h4>
                              @endif
                              @if($product->origin)
                              <h4 style="color:#707070;font-size:12px; ">Origin:{{$product->origin}}</h4>
                              @endif
                              @if($product->destination)
                              <h4 style="color:#707070;font-size:12px; ">Destination:{{$product->destination}}</h4>
                              @endif
                              @if ($product->porter_count > 0 && $product_category == 'Porter')
                              <h4 style="color:#707070;font-size:12px;">Porter Count: {{ $product->porter_count }}</h4>
                              @else
                              <h4 style="color:#707070;font-size:12px;"> </h4>
                              @endif
                              @if ($product->guest > 0 && in_array($product_category, ['Meet and Greet', 'Airport Entry', 'Lounge Booking']))
                              <h4 style="color:#707070;font-size:12px;">Guest: {{$product->guest}}</h4>
                              @else
                              <h4 style="color:#707070;font-size:12px;"> </h4>
                              @endif 
                              @if ($product->bag_count > 0 && in_array($product_category, ['Car Parking', 'Cloak Room', 'Baggage Wrapping']))
                              <h4 style="color:#707070;font-size:12px;">Bag: {{$product->guest}}</h4>
                              @else
                              <h4 style="color:#707070;font-size:12px;"> </h4>
                              @endif 
                              @if($product->adults)
                              <h4 style="color:#707070;font-size:12px; ">Adults:{{$product->adults}}</h4>
                              <h4 style="color:#707070;font-size:12px; ">Infants:{{$product->infants}}</h4>
                              <h4 style="color:#707070;font-size:12px; ">Children:{{$product->children}}</h4>
                              @endif
                              @if(!is_null($product->pnr) && $product->pnr !== '')
                              <h4 style="color:#707070;font-size:12px; ">Pnr:{{$product->pnr}}</h4>
                              @endif
                              @if(!is_null($product->flight_number) && $product->flight_number !== '')
                              <h4 style="color:#707070;font-size:12px; ">Flight Number:{{ $product->productData->title }}</h4>
                              @endif
                              @if(!is_null($product->bag_count) && $product->bag_count !== '')
                              <h4 style="color:#707070;font-size:12px; ">Bag Count:{{$product->bag_count}}</h4>
                              @endif
                           </td>
                           <td style="width: 20%; padding: 10px 0;    vertical-align: middle;">
                           <h4 style="color:#707070;font-size:14px; font-weight:700 ">{{$orderStatus->status}}</h4>
                           </td>
                           <td style="width: 35%; padding: 10px 0;    vertical-align: middle;">
                              <h5 style="color:#707070;font-size:14px;text-align:right;font-weight:700">
                                 {{ $order->currency }}
                                 @if (count($order->orderProducts) == 1)
                                 @if ($order->orderCoupons != null)
                                 {{ $product->total - $order->orderCoupons->sum('coupon_value') }}
                                 @else
                                 {{ $product->total }}
                                 @endif
                                 @else
                                 {{ $product->total }}
                                 @endif
                              </h5>
                           </td>
                        </tr>
                        @endforeach
                     </table>
                  </td>
               </tr>
               <tr>
                  <td style="">
                     <table>
                        <tr>
                           <td style="padding:10px 0;border-bottom:1px solid #D7DAE0;">
                              <h4 style="color:#151525;font-size:13px;font-weight:700">Total</h4>
                           </td>
                           <td style="text-align:right;padding:10px 0;border-bottom:1px solid #D7DAE0;">
                              <h1 style="color:#7B45F6;font-size:15px;font-weight:700;margin-bottom:8px">INR {{ $order->currency }} {{ number_format($orderGrandTotal['orderGrandTotal'] > 0 ? $orderGrandTotal['orderGrandTotal'] : 0, 2) }}</h1>
                              @php
                              $subtotal = $orderGrandTotal['orderGrandTotal'];
                              $sgst = $subtotal * 0.09;
                              $cgst = $subtotal * 0.09;
                              $totalWithTax = $subtotal + $sgst + $cgst;
                              @endphp
                              <p style="color:#707070;font-size:12px;margin-bottom:8px">CGST 9% {{ $order->currency }} {{ number_format($cgst, 2) }}</p>
                              <p style="color:#707070;font-size:12px;margin-bottom:0">SGST 9% {{ $order->currency }} {{ number_format($sgst, 2) }}</p>
                           </td>
                        </tr>
                        <tr>
                           <td style="padding:10px 0">
                              <h4 style="color:#151525;font-size:13px;font-weight:700">Total To Pay</h4>
                           </td>
                           <td style="text-align:right;padding:10px 0">
                              <h1 style="color:#7B45F6;font-size:16px;font-weight:700">{{ $order->currency }} {{ number_format($totalWithTax, 2) }}</h1>
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
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
            $('.invoice-page-btn').on('click', function () {
                window.print();
            });
        });  
    </script>
@endsection
