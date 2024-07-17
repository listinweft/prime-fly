<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderCoupon;
use App\Models\OrderCustomer;
use App\Models\OrderLog;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ShippingCharge;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function list()
    {

        $title = "Order List";

       $admintype =  Auth::guard('admin')->user()->admin;

       if($admintype->role == "Admin" )
       {


        $location_ids = Auth::guard('admin')->user()->location_ids;
        $assignedLocations = array_filter(explode(',', $location_ids)); // Remove empty values from array
        
        $orderList = Order::when(!empty($assignedLocations), function ($query) use ($assignedLocations) {
                            return $query->where(function ($query) use ($assignedLocations) {
                                $query->whereHas('orderProducts', function($query) use ($assignedLocations) {
                                    $query->whereIn('origin', $assignedLocations)
                                          ->orWhereIn('destination', $assignedLocations);
                                });
                            });
                        })
                        ->when(empty($assignedLocations), function ($query) {
                            // Handle case when assignedLocations is empty or contains only empty values
                            return $query->whereRaw('1=0'); // Force a condition that is never true
                        })
                        ->latest()
                        ->get();
        
        



       }
       

    
       else

       {

        $orderList = Order::latest()->get();


       }
      
       
        $boxValues = Order::boxValues();
        return view('Admin/order/order_list', compact('orderList', 'title', 'boxValues'));
    }
   
    public function index()
    {
        $admintype =  Auth::guard('admin')->user()->admin;

       if($admintype->role == "Admin" )
       {


        $location_ids = Auth::guard('admin')->user()->location_ids;
$assignedLocations = array_filter(explode(',', $location_ids)); // Remove empty values from array

$orders = Order::when(!empty($assignedLocations), function ($query) use ($assignedLocations) {
                    return $query->where(function ($query) use ($assignedLocations) {
                        $query->whereHas('orderProducts', function($query) use ($assignedLocations) {
                            $query->whereIn('origin', $assignedLocations)
                                  ->orWhereIn('destination', $assignedLocations);
                        });
                    });
                })
                ->when(empty($assignedLocations), function ($query) {
                    // Handle case when assignedLocations is empty or contains only empty values
                    return $query->whereRaw('1=0'); // Force a condition that is never true
                })
                ->latest()
                ->get();



       }
       

    
       else

       {

        $orders= Order::latest()->get();


       }
        return view('Admin.calendar', compact('orders'));
    }

    public function getOrders()
    {
        $admintype =  Auth::guard('admin')->user()->admin;

       if($admintype->role == "Admin" )
       {


        $location_ids = Auth::guard('admin')->user()->location_ids;
        $assignedLocations = array_filter(explode(',', $location_ids)); // Remove empty values from array
        
        $orders = Order::when(!empty($assignedLocations), function ($query) use ($assignedLocations) {
                            return $query->where(function ($query) use ($assignedLocations) {
                                $query->whereHas('orderProducts', function($query) use ($assignedLocations) {
                                    $query->whereIn('origin', $assignedLocations)
                                          ->orWhereIn('destination', $assignedLocations);
                                });
                            });
                        })
                        ->when(empty($assignedLocations), function ($query) {
                            // Handle case when assignedLocations is empty or contains only empty values
                            return $query->whereRaw('1=0'); // Force a condition that is never true
                        })
                        ->latest()
                        ->get();


       }
       

    
       else

       {

        $orders= Order::latest()->get();


       }

        // Format timestamps as strings for FullCalendar
        $formattedOrders = $orders->map(function ($order) {
            return [
                'id'=> $order->id,
                'title' => $order->order_code,
                'start' => $order->created_at->toIso8601String(), // Convert timestamp to ISO 8601 format
                'end' => $order->created_at->toIso8601String(),
            ];
        });

        return response()->json(['orders' => $formattedOrders]);
    }
    public function order_filter(Request $request)
    {
        if ($request->date_range) {
            $dateExploded = explode('-', $request->date_range);
            $startDate = date("Y-m-d", strtotime($dateExploded[0]));
            $endDate = date("Y-m-d", strtotime($dateExploded[1]));
            $start = $startDate . ' 00:00:00';
            $end = $endDate . ' 23:59:59';
            $orderList = Order::whereBetween('created_at', [$start, $end])->get();
            $boxValues = Order::boxValues($start, $end);
            return view('Admin.order.filter_order', compact('orderList', 'boxValues'));
        } else {
            echo "0";
        }
    }


    public function order_view($id)
    {
        $orderDetails = OrderCustomer::where('order_id', $id)->first();
        if ($orderDetails) {
            $title = "Order View";
            $orderTotal = Order::getProductTotal($id);
            $orderGrandTotal = Order::OrderGrandTotal($id);
            if ($orderDetails->user_type == "User") {
                $order = Order::with(['orderProducts' => function ($t) use ($orderDetails) {
                    $t->with('productData');
                    $t->with('colorData');
                }])->with(['orderCustomer' => function ($c) {
                    $c->with('customerData');
                    $c->with('billingAddress');
                }])->with('orderCoupons')->find($id);
            } else {
                $order = Order::with(['orderProducts' => function ($t) {
                    $t->with('productData');
                    $t->with('colorData');
                }])->with(['orderCustomer' => function ($c) {
                    $c->with('billingAddress');
                }])->with('orderCoupons')->find($id);
            }
            return view('Admin/order/order_view', compact('orderDetails', 'title', 'orderTotal', 'orderGrandTotal', 'order'));
        } else {
            return view('Admin.error.404');
        }
    }


    public function track_order_products(Request $request)
    {
        if ($request->order_id) {
            $order = Order::find($request->order_id);
            $orderproducts = $order->orderProducts;
            return view('Admin/order/track_order_product_modal', compact('orderproducts', 'order'));
        } else {
            return 0;
        }
    }

    public function order_status(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $order_product_id = $request->product_id;
        if ($order_product_id) {
           
            $orderLog = new OrderLog;
            $orderLog->order_product_id = $order_product_id;
            $orderLog->status = $request->status;
            if ($orderLog->save()) {
                
               
              

                return response()->json(['status' => 'true', 'message' => 'Order status has been changed successfully']);
              
                
            } else {
               
                return response()->json(['status' => 'false', 'message' => 'Error while changing the status']);
            }
        } else {
            return response()->json(['status' => 'false', 'message' => 'Order not found']);
        }
    }

    public function cancel_all(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $order = Order::find($request->order_id);
        foreach ($order->orderProducts as $orderProduct) {
            if ($orderProduct->id != $request->product_id) {
                $orderLog = new OrderLog;
                $orderLog->order_product_id = $orderProduct->id;
                $orderLog->status = 'Cancelled';
                $orderLog->save();
            } else {
                $orderLog = new OrderLog;
                $orderLog->order_product_id = $orderProduct->id;
                $orderLog->status = $request->status;
                $orderLog->save();
            }
        }
        return response()->json(['status' => 'true', 'message' => 'All products in this order cancelled.']);
    }

    public function invoice_resend(Request $request)
    {
        $order = Order::find($request->order_id);
        if ($order != NULL) {
            if ($order->orderCustomer->user_type == "User") {
                $orderData = Order::with(['orderProducts' => function ($t) {
                    $t->with('productData');
                }])->with(['orderCustomer' => function ($c) use ($order) {
                    $c->with('customerData');
                    $c->with('billingAddress');
                    $c->where('customer_id', $order->orderCustomer->customer_id);
                }])->with('orderCoupons')->find($request->order_id);
            } else {
                $orderData = Order::with(['orderProducts' => function ($t) {
                    $t->with('productData');
                }])->with('orderCustomer')->with('orderCoupons')->find($request->order_id);
            }
//            if ($order->orderCustomer->billingAddress != NULL) {
            if (Helper::SendOrderPlacedMail($orderData, '0')) {
                return response()->json(['status' => true, 'message' => 'Order invoice has been sent successfully']);
            } else {
                return response()->json(['status' => false, 'message' => 'Error while sending the order invoice']);
            }
//            } else {
//                return response()->json(['status' => false, 'message' => 'Address not found']);
//            }
        } else {
            return response()->json(['status' => false, 'message' => 'Order not found']);
        }
    }

    public function cancelled_splitup(Request $request)
    {
        if ($request->order_id) {
            $order = Order::find($request->order_id);
            $cancelledTotal = Order::getCancelledProductTotal($request->order_id);
            return view('Admin/order/cancelled_product_modal', compact('cancelledTotal', 'order'));
        } else {
            return 0;
        }
    }


    public function print_invoice($id)
    {
        $orderDetails = OrderCustomer::where('order_id', $id)->first();
        if ($orderDetails) {
            $orderTotal = Order::getProductTotal($id);
            $orderGrandTotal = Order::OrderGrandTotal($id);
            if ($orderDetails->user_type == "User") {
                $order = Order::with(['orderProducts' => function ($t) use ($orderDetails) {
                    $t->with('productData');
                    $t->with('colorData');
                }])->with(['orderCustomer' => function ($c) use ($orderDetails) {
                    $c->with('customerData');
                    $c->with('shippingAddress');
                    $c->where('customer_id', $orderDetails->customer_id);
                }])->with('orderCoupons')->find($id);
            } else {
                $order = Order::with(['orderProducts' => function ($t) {
                    $t->with('productData');
                    $t->with('colorData');
                }])->with('orderCustomer')->with('orderCoupons')->find($id);
            }
            $title = "Order View - CFF#" . $order->order_code;
            return view('Admin.order.print_invoice', compact('orderDetails', 'title', 'orderTotal', 'orderGrandTotal', 'order'));
        } else {
            return view('Admin.error.404');
        }
    }
}
