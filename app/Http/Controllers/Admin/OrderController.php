<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderCoupon;
use App\Models\Location;
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


//     public function index()
//     {
//         $admintype = Auth::guard('admin')->user()->admin;
    
//         if ($admintype->role == "Admin") {
//             // Retrieve location IDs
//             $location_ids = Auth::guard('admin')->user()->location_ids;
    
//             // Convert the location IDs to an array and filter out any empty values
//             $assignedLocationIds = array_filter(explode(',', $location_ids));
    
//             // Fetch location codes based on location IDs
//             $locationCodes = Location::whereIn('id', $assignedLocationIds)->pluck('code')->toArray();

//             $category_id = Auth::guard('admin')->user()->category_id; // Retrieve category_id

// // Ensure category_id is an array
//                     if (!is_array($category_id)) {
//                         $category_id = explode(',', $category_id);
//                     }

    
//             // Query to get orders based on location codes with max exit_date
//             $orders = Order::select('orders.id', 'orders.order_code', 'orders.created_at', DB::raw('MAX(order_products.exit_date) as exit_date'))
//                 ->join('order_products', 'orders.id', '=', 'order_products.order_id')
//                 ->when(!empty($locationCodes), function ($query) use ($locationCodes) {
//                     return $query->where(function ($query) use ($locationCodes) {
//                         $query->whereIn('order_products.origin', $locationCodes)
//                         ->orWhereIn('destination', $locationCodes)
//                         ->orWhereIn('trans', $locationCodes);
//                     });
//                 })
//                 ->when(empty($locationCodes), function ($query) {
//                     return $query->whereRaw('1=0'); // Force a condition that is never true
//                 })
//                 ->whereHas('orderProducts.productData', function ($query) use ($category_id) {
//                     $query->whereIn('category_id', $category_id); // Filter by category_id array
//                 })

//                 ->groupBy('orders.id', 'orders.order_code', 'orders.created_at')
//                 ->havingRaw('MAX(order_products.exit_date) IS NOT NULL') // Only include orders with exit_date
//                 ->orderBy('orders.created_at', 'desc') // Specify the table for created_at
//                 ->where('payment_mode', 'Success')
//                 ->get();
    
//         } else {
//             $orders = Order::select('orders.id', 'orders.order_code', 'orders.created_at', DB::raw('MAX(order_products.exit_date) as exit_date'))
//                 ->join('order_products', 'orders.id', '=', 'order_products.order_id')
//                 ->groupBy('orders.id', 'orders.order_code', 'orders.created_at')
//                 ->havingRaw('MAX(order_products.exit_date) IS NOT NULL') // Only include orders with exit_date
//                 ->orderBy('orders.created_at', 'desc') // Specify the table for created_at
//                 ->where('payment_mode', 'Success')
//                 ->get();
//         }
    
//         // Format the orders with exit_date included
//         $formattedOrders = $orders->map(function ($order) {
//             return [
//                 'id' => $order->id,
//                 'order_code' => $order->order_code,
//                 'created_at' => $order->created_at->format('c'), // Convert timestamp to ISO 8601 format
//                 'exit_date' => $order->exit_date ? (new \DateTime($order->exit_date))->format('c') : null,
//             ];
//         });
    
//         return view('Admin.calendar', compact('formattedOrders'));
//     }
    
    
    

   
//     public function getOrders()
//     {
//         $admintype = Auth::guard('admin')->user()->admin;
    
//         if ($admintype->role == "Admin") {
//             // Retrieve location IDs
//             $location_ids = Auth::guard('admin')->user()->location_ids;
    
//             // Convert the location IDs to an array and filter out any empty values
//             $assignedLocationIds = array_filter(explode(',', $location_ids));
    
//             // Fetch location codes based on location IDs
//             $locationCodes = Location::whereIn('id', $assignedLocationIds)->pluck('code')->toArray();
//             $category_id = Auth::guard('admin')->user()->category_id; // Retrieve category_id

//             // Ensure category_id is an array
//                                 if (!is_array($category_id)) {
//                                     $category_id = explode(',', $category_id);
//                                 }
    
//             // Query to get orders based on location codes
//             $orders = Order::with('orderProducts') // Eager load orderProducts to avoid N+1 query issue
//                 ->when(!empty($locationCodes), function ($query) use ($locationCodes) {
//                     return $query->where(function ($query) use ($locationCodes) {
//                         $query->whereHas('orderProducts', function ($query) use ($locationCodes) {
//                             $query->whereIn('origin', $locationCodes)
//                                   ->orWhereIn('destination', $locationCodes)
//                                   ->orWhereIn('trans', $locationCodes);
//                         });
//                     });
//                 })
//                 ->when(empty($locationCodes), function ($query) {
//                     // Handle case when locationCodes is empty
//                     return $query->whereRaw('1=0'); // Force a condition that is never true
//                 })

//                 ->whereHas('orderProducts.productData', function ($query) use ($category_id) {
//                     $query->whereIn('category_id', $category_id); // Filter by category_id array
//                 })
//                 ->where('payment_mode', 'Success')
//                 ->latest()
//                 ->get();
//         } else {
//             $orders = Order::with('orderProducts')
//     ->where('payment_mode', 'Success') // Apply the payment_mode filter
//     ->latest() // Order by the latest first
//     ->get(); // Retrieve the results


//         }
    
//         // Format the orders with the maximum exit_date included
//         $formattedOrders = $orders->map(function ($order) {
//             // Find the maximum exit_date from the order's products
//             $exitDate = $order->orderProducts->max('exit_date');
//             return [
//                 'id' => $order->id,
//                 'order_code' => $order->order_code,
//                 'created_at' => $order->created_at->format('c'), // Convert timestamp to ISO 8601 format
//                 'exit_date' => $exitDate ? (new \DateTime($exitDate))->format('c') : null,
//             ];
//         });
    
//         return response()->json(['orders' => $formattedOrders]);
//     }
    

    public function list()
    {

        $title = "Order List";

       $admintype =  Auth::guard('admin')->user()->admin;

       if($admintype->role == "Admin" )
       {


        // Retrieve location IDs
$location_ids = Auth::guard('admin')->user()->location_ids;

// Convert the location IDs to an array and filter out any empty values
$assignedLocationIds = array_filter(explode(',', $location_ids));

// Fetch location codes based on location IDs
$locationCodes = Location::whereIn('id', $assignedLocationIds)->pluck('code')->toArray();

// Query to get orders based on location codes
$orderList = Order::when(!empty($locationCodes), function ($query) use ($locationCodes) {
    // Filter orders with non-empty locationCodes
    $query->whereHas('orderProducts', function($query) use ($locationCodes) {
        $query->whereIn('origin', $locationCodes)
              ->orWhereIn('destination', $locationCodes);
    });
}, function ($query) {
    // Handle case when locationCodes is empty
    // This will ensure no orders are returned
    $query->whereRaw('1 = 0');
})
->where('payment_mode', 'Success')
->latest()
->get();


        
        



       }
       

    
       else

       {

        $orderList = Order::where('payment_mode', 'Success')->latest()->get();



       }
      
       
        $boxValues = Order::boxValues();
        return view('Admin/order/order_list', compact('orderList', 'title', 'boxValues'));
    }

    public function listdate($createdDate = null)
    {
        // Fetch all unique order_id values from order_products table based on the provided createdDate
        $orderIds = OrderProduct::whereDate('exit_date', $createdDate)
            ->distinct()
            ->pluck('order_id')
            ->toArray();
    
        $title = "Order List";
        $admintype = Auth::guard('admin')->user()->admin;
    
        if ($admintype->role == "Admin") {
            // Retrieve location IDs
            $location_ids = Auth::guard('admin')->user()->location_ids;
    
            // Convert the location IDs to an array and filter out any empty values
            $assignedLocationIds = array_filter(explode(',', $location_ids));
    
            // Fetch location codes based on location IDs
            $locationCodes = Location::whereIn('id', $assignedLocationIds)->pluck('code')->toArray();
    
            // Query to get orders based on location codes, order_ids, and optionally created_date
            $ordersQuery = Order::when(!empty($locationCodes), function ($query) use ($locationCodes) {
                    return $query->where(function ($query) use ($locationCodes) {
                        $query->whereHas('orderProducts', function($query) use ($locationCodes) {
                            $query->whereIn('origin', $locationCodes)
                                  ->orWhereIn('destination', $locationCodes);
                        });
                    });
                })
                ->when(empty($locationCodes), function ($query) {
                    // Handle case when locationCodes is empty
                    return $query->whereRaw('1=0'); // Force a condition that is never true
                })
                ->where('payment_mode', 'Success')
                ->whereIn('id', $orderIds) // Filter by the plucked order IDs
                ->latest();
    
            // // Apply created_date filter if provided
            // if ($createdDate) {
            //     $ordersQuery->whereDate('created_at', $createdDate);
            // }
    
            // Fetch orders
            $orderList = $ordersQuery->get();
        } else {
            // For non-admin users
            $ordersQuery = Order::where('payment_mode', 'Success')
                ->whereIn('id', $orderIds) // Filter by the plucked order IDs
                ->latest();
    
            // Apply created_date filter if provided
            // if ($createdDate) {
            //     $ordersQuery->whereDate('created_at', $createdDate);
            // }
    
            $orderList = $ordersQuery->get();
        }
    
        $boxValues = Order::boxValues();
        return view('Admin/order/order_list', compact('orderList', 'title', 'boxValues'));
    }
    

    public function index()
    {
        $admintype = Auth::guard('admin')->user()->admin;
    
        if ($admintype->role == "Admin") {
            // Retrieve location IDs
            $location_ids = Auth::guard('admin')->user()->location_ids;
            $assignedLocationIds = array_filter(explode(',', $location_ids));
            $locationCodes = Location::whereIn('id', $assignedLocationIds)->pluck('code')->toArray();
            $category_id = Auth::guard('admin')->user()->category_id;
            if (!is_array($category_id)) {
                $category_id = explode(',', $category_id);
            }
    
            // Query to get the count of orders based on exit_date
            $orders = Order::select(
                    DB::raw('DATE(order_products.exit_date) as exit_date'),
                    DB::raw('COUNT(DISTINCT orders.id) as total_orders'), // Count unique orders
                    DB::raw('MIN(orders.created_at) as created_date') // Fetch the minimum created_date for grouping
                )
                ->join('order_products', 'orders.id', '=', 'order_products.order_id')
                ->when(!empty($locationCodes), function ($query) use ($locationCodes) {
                    return $query->where(function ($query) use ($locationCodes) {
                        $query->whereIn('order_products.origin', $locationCodes)
                              ->orWhereIn('order_products.destination', $locationCodes)
                              ->orWhereIn('order_products.trans', $locationCodes);
                    });
                })
                ->when(empty($locationCodes), function ($query) {
                    return $query->whereRaw('1=0'); // Force a condition that is never true
                })
                ->whereHas('orderProducts.productData', function ($query) use ($category_id) {
                    $query->whereIn('category_id', $category_id);
                })
                ->groupBy(DB::raw('DATE(order_products.exit_date)'))
                ->havingRaw('MAX(order_products.exit_date) IS NOT NULL')
                ->orderBy('exit_date', 'asc')
                ->where('payment_mode', 'Success')
                ->get();
        } else {
            // Non-admin query
            $orders = Order::select(
                    DB::raw('DATE(order_products.exit_date) as exit_date'),
                    DB::raw('COUNT(DISTINCT orders.id) as total_orders'), // Count unique orders
                    DB::raw('MIN(orders.created_at) as created_date') // Fetch the minimum created_date for grouping
                )
                ->join('order_products', 'orders.id', '=', 'order_products.order_id')
                ->groupBy(DB::raw('DATE(order_products.exit_date)'))
                ->havingRaw('MAX(order_products.exit_date) IS NOT NULL')
                ->orderBy('exit_date', 'asc')
                ->where('payment_mode', 'Success')
                ->get();

                
        }
    
        // Format the orders for calendar
        $formattedOrders = $orders->map(function ($order) {
            return [
                'exit_date' => $order->exit_date ? (new \DateTime($order->exit_date))->format('Y-m-d') : null,
                'created_date' => $order->created_date ? (new \DateTime($order->created_date))->format('Y-m-d H:i:s') : null, // Database format
                'total_orders' => $order->total_orders // Count of unique orders
            ];
        });
    
        return view('Admin.calendar', compact('formattedOrders'));
    }
    
    
    
    
    public function getOrders()
{
    $admintype = Auth::guard('admin')->user()->admin;

    if ($admintype->role == "Admin") {
        // Retrieve location IDs
        $location_ids = Auth::guard('admin')->user()->location_ids;
        $assignedLocationIds = array_filter(explode(',', $location_ids));
        $locationCodes = Location::whereIn('id', $assignedLocationIds)->pluck('code')->toArray();
        $category_id = Auth::guard('admin')->user()->category_id;

        // Ensure category_id is an array
        if (!is_array($category_id)) {
            $category_id = explode(',', $category_id);
        }

        // Query to get orders based on location codes
        $orders = Order::select(
                DB::raw('DATE(order_products.exit_date) as exit_date'),
                DB::raw('COUNT(DISTINCT orders.id) as total_orders'), // Count unique orders
                DB::raw('MIN(orders.created_at) as created_date') // Fetch the minimum created_date for grouping
            )
            ->join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->when(!empty($locationCodes), function ($query) use ($locationCodes) {
                return $query->where(function ($query) use ($locationCodes) {
                    $query->whereIn('order_products.origin', $locationCodes)
                          ->orWhereIn('order_products.destination', $locationCodes)
                          ->orWhereIn('order_products.trans', $locationCodes);
                });
            })
            ->when(empty($locationCodes), function ($query) {
                return $query->whereRaw('1=0'); // Handle case when locationCodes is empty
            })
            ->whereHas('orderProducts.productData', function ($query) use ($category_id) {
                $query->whereIn('category_id', $category_id);
            })
            ->where('payment_mode', 'Success')
            ->groupBy(DB::raw('DATE(order_products.exit_date)'))
            ->orderBy(DB::raw('DATE(order_products.exit_date)'), 'asc')
            ->get();
    } else {
        // For non-admin users, aggregate orders by exit_date
        $orders = Order::select(
                DB::raw('DATE(order_products.exit_date) as exit_date'),
                DB::raw('COUNT(DISTINCT orders.id) as total_orders'), // Count unique orders
                DB::raw('MIN(orders.created_at) as created_date') // Fetch the minimum created_date for grouping
            )
            ->join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->where('payment_mode', 'Success')
            ->groupBy(DB::raw('DATE(order_products.exit_date)'))
            ->orderBy(DB::raw('DATE(order_products.exit_date)'), 'asc')
            ->get();
    }

    // Format the orders with the count of unique orders included
    $formattedOrders = $orders->map(function ($order) {
        return [
            'exit_date' => $order->exit_date ? (new \DateTime($order->exit_date))->format('c') : null,
            'created_date' => $order->created_date ? (new \DateTime($order->created_date))->format('Y-m-d') : null, // Database format
            'total_orders' => $order->total_orders,
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

        $orderProduct = OrderProduct::find($order_product_id);

        if ($order_product_id) {
           
            $orderLog = new OrderLog;
            $orderLog->order_product_id = $order_product_id;
            $orderLog->status = $request->status;

            $orderData = Order::with(['orderProducts' => function ($t) {
                $t->with('productData');
            }])->with('orderCustomer')->with('orderCoupons')->find($request->order_id);

            $produtName = $orderProduct->productData->title;

            if ($orderLog->save()) {

                $orderMail = Helper::sendOrderStatusMail($orderData, $request->status, $produtName);
                
               
              

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
        $order = Order::with(['orderProducts' => function ($t) {
            $t->with('productData')->with('colorData');
        }])->with('orderCustomer')->with('orderCoupons')->find($id);
    
        if ($order) {
            $title = "Order View - CFF#" . $order->order_code;
            $orderTotal = Order::getProductTotal($id);
            $orderGrandTotal = Order::OrderGrandTotal($id);
            
            return view('Admin.order.print_invoice', compact('order', 'title', 'orderTotal', 'orderGrandTotal'));
        } else {
            return view('Admin.error.404');
        }
    }
    
    

}
