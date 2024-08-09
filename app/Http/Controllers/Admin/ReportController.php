<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use DataTables;
use App\Exports\BulkExport;
use App\Exports\ProductList;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Category;

use App\Models\Order;
use App\Models\Location;
use App\Models\Product;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function out_of_stock()
    {
        $title = "Out Of Stock";
        $productList = Product::with('color')->where('availability', 'Out of Stock')->get();
        return view('Admin/report/product/out_of_stock_report', compact('productList', 'title'));
    }

    public function featured_products()
    {
        $title = "Featured Products";
        $productList = Product::where('is_featured', 'Yes')->get();
        return view('Admin/report/product/featured_report', compact('productList', 'title'));
    }

    public function new_products()
    {
        $title = "New Products";
        $productList = Product::where('new_arrival', 'Yes')->get();
        return view('Admin/report/product/new_product_report', compact('productList', 'title'));
    }



    public function getLocationsByCategory_sub(Request $request)
    {
        // Fetch the active category by the provided category_id
        $category = Category::active()->find($request->category_id);
    
        // Initialize an empty array to hold locations
        $locations = [];
    
        if ($category) {
            // Fetch all products that belong to the category
            $products = Product::where('category_id', $category->id)->get();
    
            // Initialize an array to hold all location IDs associated with the products
            $allLocationIds = [];
    
            // Loop through each product to extract location IDs
            foreach ($products as $product) {
                // Split location IDs if there are multiple, and merge them into the allLocationIds array
                $locationIds = explode(',', $product->location_id);
                $allLocationIds = array_merge($allLocationIds, $locationIds);
            }
    
            // Filter to get unique location IDs
            $uniqueLocationIds = array_unique($allLocationIds);
    
            // Get the assigned location IDs for the authenticated admin user
            $location_ids = Auth::guard('admin')->user()->location_ids;
    
            // Convert location IDs to an array and filter out any empty values
            $assignedLocationIds = array_filter(explode(',', $location_ids));
    
            // Filter the uniqueLocationIds array to include only the locations assigned to the user
            $filteredLocationIds = array_intersect($uniqueLocationIds, $assignedLocationIds);
    
            // Fetch the active locations that match the filtered location IDs
            $locations = Location::active()->whereIn('id', $filteredLocationIds)->get();
        }
    
        // Return the fetched locations as a JSON response
        return response()->json(['locations' => $locations]);
    }
    

public function getLocationsByCategory(Request $request)
{
    // Fetch the active category by the provided category_id
    $category = Category::active()->find($request->category_id);

    // Initialize an empty array to hold locations
    $locations = [];

    if ($category) {
        // Fetch all products that belong to the category
        $products = Product::where('category_id', $category->id)->get();

        // Initialize an array to hold all location IDs associated with the products
        $allLocationIds = [];

        // Loop through each product to extract location IDs
        foreach ($products as $product) {
            // Split location IDs if there are multiple, and merge them into the allLocationIds array
            $locationIds = explode(',', $product->location_id);
            $allLocationIds = array_merge($allLocationIds, $locationIds);
        }

        // Filter to get unique location IDs
        $uniqueLocationIds = array_unique($allLocationIds);

        // Get the assigned location IDs for the authenticated admin user
        $location_ids = Auth::guard('admin')->user()->location_ids;

        // Convert location IDs to an array and filter out any empty values
        $assignedLocationIds = array_filter(explode(',', $location_ids));

        // Filter the uniqueLocationIds array to include only the locations assigned to the user
        $filteredLocationIds = array_intersect($uniqueLocationIds, $assignedLocationIds);

        // Fetch the active locations that match the filtered location IDs
        $locations = Location::active()->whereIn('id', $filteredLocationIds)->get();
    }

    // Return the fetched locations as a JSON response
    return response()->json(['locations' => $locations]);
}


public function getProductsByLocation(Request $request)
{
    $locationId = $request->location_id;

    // Fetch products where the location_id matches the selected location
    $products = Product::whereRaw("FIND_IN_SET(?, location_id)", [$locationId])->get();

    return response()->json(['products' => $products]);
}
 


    public function detail_report()
    {
        $title = "Detailed Order Report";
        $orderList = Order::paginate(50);
        $boxValues = Order::boxValues();
        $customerList = Customer::oldest('first_name', 'last_name')->get();
        $categoryList = Category::where('status', 'Active')->whereNull('parent_id')->oldest('title')->get();
        $productList = Product::where('status', 'Active')->oldest('title')->get();
        $locationList = Location::where('status', 'Active')->oldest('title')->get();
        $couponList = Coupon::where('status', 'Active')->get();
    
        return view('Admin/report/order/order_detail_report', compact('orderList', 'title', 'boxValues', 'customerList', 'productList', 'couponList', 'locationList', 'categoryList'));
    }
    




    public function export()
    {
        return Excel::download(new BulkExport, 'order-report.xlsx');
    }

    public function product_export()
    {
        

        return Excel::download(new ProductList, 'product-list.xlsx');
    }

    public function order_detail_filter(Request $request)
    {
        $date_range = $request->date_range;
        $status = $request->order_report_status;
        $customer = $request->order_report_customer;
        $product = $request->order_report_product;
        // $coupon = $request->order_report_coupon;
       $orderList = Order::getDetailedOrders($date_range, $status, $customer, $product);
        $boxValues = Order::getDetailedOrdersBoxValues($date_range, $status, $customer, $product);
        session(['date_range' => $date_range]);
        session(['status' => $status]);
        session(['customer' => $customer]);
        session(['product' => $product]);
        // session(['coupon' => $coupon]);
        return view('Admin.report.order.order_detail_report_filter', compact('orderList', 'boxValues'));
    }

    public function detail_report_subadmin()
{
    $title = "Detailed Order Report";

    // Get the location IDs for the authenticated admin
    $location_ids = Auth::guard('admin')->user()->location_ids;
    
    // Convert location IDs to an array and remove empty values
    $assignedLocationIds = array_filter(explode(',', $location_ids));
    
    // Fetch location codes based on location IDs
    $locationCodes = Location::whereIn('id', $assignedLocationIds)->pluck('code')->toArray();

    // Initialize query with pagination
    $orderList = Order::when(!empty($locationCodes), function ($query) use ($locationCodes) {
            return $query->where(function ($query) use ($locationCodes) {
                $query->whereHas('orderProducts', function ($query) use ($locationCodes) {
                    $query->whereIn('origin', $locationCodes)
                          ->orWhereIn('destination', $locationCodes);
                });
            });
        })
        ->when(empty($locationCodes), function ($query) {
            // Handle case when locationCodes is empty or contains only empty values
            return $query->whereRaw('1=0'); // Force a condition that is never true
        })
        ->latest() // Order by latest
        ->paginate(50); // Paginate results, 50 items per page

    // Fetch box values using location codes
    $boxValues = Order::boxValues_subadmin($locationCodes);
    
    // Fetch customer list, product list, and coupon list
    $customerList = Customer::oldest('first_name', 'last_name')->get();
    $productList = Product::where('status', 'Active')->oldest('title')->get();
    $couponList = Coupon::where('status', 'Active')->get();
    $categoryList = Category::where('status', 'Active')->whereNull('parent_id')->oldest('title')->get();
    // Return the view with the data
    return view('Admin.report.order.order_detail_report_subadmin', compact('orderList', 'title', 'boxValues', 'customerList', 'productList', 'couponList', 'assignedLocationIds','categoryList'));
}
    public function order_detail_filter_subadmin(Request $request)
    {
        $date_range = $request->date_range;
        $status = $request->order_report_status;
        $customer = $request->order_report_customer;
        $product = $request->order_report_product;
        
        // Get the admin's assigned locations from the comma-separated string
        $location_ids = Auth::guard('admin')->user()->location_ids;
      $assignedLocations = array_filter(explode(',', $location_ids));
      
      $locationCodes = Location::whereIn('id', $assignedLocations)->pluck('code')->toArray();
    
        $orderList = Order::getDetailedOrders_subadmin($date_range, $status, $customer, $product, $locationCodes);
        $boxValues = Order::getDetailedOrdersBoxValues_subadmin($date_range, $status, $customer, $product, $locationCodes);
        
        session(['date_range' => $date_range, 'status' => $status, 'customer' => $customer, 'product' => $product]);
        
        return view('Admin.report.order.order_detail_report_filter_subadmin', compact('orderList', 'boxValues'));
    }
    

    /********************* Order Report ****************************/

    public function orders($status)
    {
        $title = Str:: Title($status) . " orders";
        $orderList = Order::getOrderByStatus(Str::Title($status));
        $boxValues = Order::boxValuesForgetOrderByStatus(Str::Title($status));
        return view('Admin/report/order/orders_report', compact('orderList', 'title', 'boxValues', 'status'));
    }

    public function method($method)
    {
        $title = strtoupper($method) . " orders";
        $orderList = Order::getOrderByPaymentMethod(strtoupper($method));
        $boxValues = Order::boxValuesForgetOrderByPaymentMethod(strtoupper($method));
        return view('Admin/report/order/orders_report', compact('orderList', 'title', 'boxValues', 'method'));
    }

    public function offer_orders()
    {
        $title = "Offer Applied Orders";
        $orderList = Order::getOrderByOffers();
        return view('Admin/report/order/offer_orders_report', compact('orderList', 'title'));
    }

    public function render_offer_orders(Request $request)
    {
        $order_id = $request->order_id;
        $orderList = Order::getOrderByOffers($order_id);
        return view('Admin/report/order/render_offer_orders_report', compact('orderList'));
    }

    /********************** Customer order report *********************************/

    public function customer_info()
    {
        $title = "Customers";
        $customerList = Customer::with(['user', 'customerAddress' => function ($q) {
            $q->with('state');
        }])->get();
        return view('Admin/report/customer/customer_report', compact('customerList', 'title'));
    }

    public function customer_order()
    {
        $title = "Customer Report";
        $customerList = Customer::get();
        return view('Admin/report/customer/customer_orders_report', compact('customerList', 'title'));
    }

    public function render_customer_order(Request $request)
    {
        $customer_id = $request->customer;
        $order_status = $request->status;
        $orderList = Order::getCustomerOrder($customer_id, $order_status);
        return view('Admin/report/customer/render_customer_orders_report', compact('orderList'));
    }
}
