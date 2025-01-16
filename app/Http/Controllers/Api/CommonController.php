<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Models\BusinessAddress;
use App\Models\Product;
use App\Models\OrderCoupon;
use App\Models\OrderCustomer;
use App\Models\OrderLog;
use App\Models\OrderProduct;
use App\Models\Location; // Import the Location model
use App\Models\Category;
use App\Models\Offer;
use App\Models\ProductPrice;
use App\Models\LocationGallery;
use App\Models\Blog;
use App\Models\PersonalDetails;
use App\Models\Order;
use App\Models\HomeBanner;
use App\Models\Faq;
use App\Models\CategoryGallery;
use App\Models\Testimonial; // Import the Testimonial model
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\SiteInformation;
use App\Services\RazorpayService;
use DateTime;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
class CommonController extends Controller
{

    protected $razorpayService;

    public function __construct(RazorpayService $razorpayService)
    {
        $this->razorpayService = $razorpayService;
    }
    /**
     * Method to retrieve active locations
     */
    public function locations()
    {
        $locations = Location::active()->get();
        return $this->sendResponse($locations, 'Locations retrieved successfully.');
    }

    public function blogs()
    {
        $blogs = Blog::active()->get();
        return $this->sendResponse($blogs, 'Blogs retrieved successfully.');
    }

    public function createOrder(Request $request)
    {
        $receipt = $request->input('receipt', 'order_rcptid_11');
        $amount = $request->input('amount', 5000);
        $currency = $request->input('currency', 'INR');
        $notes = $request->input('notes', []);

        $response = $this->razorpayService->createOrder($receipt, $amount, $currency, $notes);

        if (isset($response['error']) && $response['error']) {
            return response()->json(['message' => $response['message']], 500);
        }

        return response()->json($response);
    }

    public function fetch_bussinessaddress(Request $request)
{
    // Find the user based on the provided user_id
    $user = User::where('id', $request->user_id)->first();

    // Check if the user exists
    if (!$user) {
        return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
    }

    // Retrieve the related customer
    $customer = $user->customer;

    // Check if the customer exists
    if (!$customer) {
        return response()->json(['status' => 'error', 'message' => 'Customer not found'], 404);
    }

    // Retrieve the business address for the customer
    $businessaddress = BusinessAddress::where('customer_id', $customer->id)->first();

    // Return the response in a structured JSON format
    return response()->json([
        'status' => 'success',
        'email' => $user->email,
        'business_address' => $businessaddress,
    ]);
}

    /**
     * Method to retrieve active service categories
     */
    public function services()
    {
        $categories = Category::active()
        ->whereNull('parent_id')
        ->orderBy('sort_order', 'asc') // or 'desc' for descending order
        ->get();
    
        return $this->sendResponse($categories, 'Services retrieved successfully.');
    }

    /**
     * Standardized JSON response format
     */
    protected function sendResponse($result, $message = 'Success', $statusCode = 200)
    {
        return response()->json([
            'status' => $statusCode,
            'message' => $message,
            'data' => $result
        ], $statusCode);
    }

    public function testimonials()
{
    $testimonials = Testimonial::active()->get();
    return $this->sendResponse($testimonials, 'Testimonials retrieved successfully.');
}

public function updateProfileApi(Request $request)
{
    $user = User::where('id', $request->user_id)->first();

    // Check if the user exists
    if (!$user) {
        return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
    }

    $customer = $user->customer;

    try {
        // Handle profile image upload
        if ($request->hasFile('profileImage')) {
            // Delete the existing profile image if it exists
            if ($user->profile_image && File::exists(public_path($user->profile_image))) {
                File::delete(public_path($user->profile_image));
            }

            // Upload the new profile image
            $user->profile_image = Helper::uploadFile($request->file('profileImage'), 'uploads/customer/profile_image/', $user->email);
        }

        // Update customer information conditionally
        $customer->first_name = $request->input('first_name') ?? $customer->first_name;
        $customer->country = $request->input('country') ?? $customer->country;
        $customer->date_of_birth = $request->input('date_of_birth') ?? $customer->date_of_birth;
        $customer->updated_at = now();

        if ($customer->save()) {
            // Update user information conditionally
            $user->phone = $request->input('phone') ?? $user->phone;
            $user->updated_at = now();

            if ($user->save()) {
                return response()->json(['status' => 'success', 'message' => 'Profile has been updated successfully', 'data' => $user], 200);
            }
        }

        return response()->json(['status' => 'error', 'message' => 'Error while updating the profile, please try again later'], 500);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'An error occurred', 'error' => $e->getMessage()], 500);
    }
}

public function getProfileApi(Request $request)
{
    try {
        // Fetch the user using the user_id
        $user = User::find($request->user_id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }

        // Fetch the associated customer data
        $customer = $user->customer;

        // Check if customer data exists
        if (!$customer) {
            return response()->json(['status' => 'error', 'message' => 'Customer data not found'], 404);
        }

        // Return the customer data in the response
        return response()->json([
            'status' => 'success',
            'message' => 'Customer profile fetched successfully',
            'data' => $customer,
            'user'=> $user
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'An error occurred while fetching the profile',
            'error' => $e->getMessage()
        ], 500);
    }
}
public function getCartData(Request $request)
{
    // Validate the incoming request to ensure `user_id` is provided
    // $request->validate([
    //     'user_id' => 'required|integer|exists:users,id' // Check against the `users` table
    // ]);

    // Fetch the corresponding customer record using the provided `user_id`
    $customer = Customer::where('user_id', $request->user_id)->first();

    if (!$customer) {
        return response()->json(['error' => 'Customer not found for the given user_id'], 404);
    }

    // Use the customer's `id` as the session key
    $sessionKey = $customer->id;

    // Fetch cart items for the given session key
    $cartItems = \Cart::session($sessionKey)->getContent()->sort();

    $cartData = [];

    $totalPriceSum = 0;
   $totalDiscountedSum = 0;
   $totalIGSTSum = 0;
   $totalCGSTSum = 0;
   $totalSGSTSum = 0;

    foreach ($cartItems as $row) {
        // Assuming you can use the original product ID to generate the package ID only once
        $productIdParts = explode('_', $row->id);
        $originalProductId = $productIdParts[0];
        $product = Product::find($originalProductId);

        if ($product) {
            // We generate the package ID once, only when adding to the cart (to keep it static)
            // You can store the unique package ID as part of the product, then use the same one later
            $basePackageId = $product->id;  // Use product ID for the base part of the package ID
            $uniquePackageId = 'PKG-' . $basePackageId . '-' . substr(md5($product->id), 0, 8);

            // Now you can directly reference that `uniquePackageId` rather than regenerating it
            $category = Category::where('id', $product->category_id)->whereNull('parent_id')->first();

            if ($category) {
                $travelType = $row->attributes['travel_type'] ?? null;
                $locationId = ($travelType === 'departure' || $travelType === 'Transit') 
                    ? $row->attributes['origin'] 
                    : $row->attributes['destination'];

                $location = Location::where('code', $locationId)->first();
                $locationTitle = $location ? $location->title : $row->attributes['origin'];

                $guestCount = $row->attributes['guest'] ?? 0;
                $formattedPrice = number_format($row->price, 2);
               
                $totalPriceSum += $row->price;
                $totalDiscountedSum += ($row->price - ($row->price * 0.18));
                $totalIGSTSum += ($row->price * 0.18);
                $totalCGSTSum += ($row->price * 0.09);
                $totalSGSTSum += ($row->price * 0.09);


                $cartData[] = [
                    'product_id' => $product->id,
                    'categoryid' => $category->id,
                    'categoryimage' => $category->image_webp,
                    'id' => $row->id,  // Use the stable row ID instead of regenerating it
                    'image' => $product->thumbnail_image,
                    'webp' => $product->thumbnail_image_webp,
                    'unique_package_id' =>  $row->attributes['unique_package_id'] ?? null,  // Static package ID
                    'product_title' => $product->title,
                    'category_title' => $category->title,
                    'location_title' => $locationTitle,
                    'guest_count' => $guestCount,
                    'service_type' => $product->service_type,
                    'set_date' => $row->attributes['setdate'] ?? null,
                    'meet_guest' => $row->attributes['meet_guest'] ?? null,
                    'meet_guestn' => $row->attributes['meet_guestn'] ?? null,
                    'total_price' => $formattedPrice,
                    
                ];
            }
        }
    }

    $cartSummary = [
        'total_price_sum' => number_format($totalPriceSum, 2),
        'total_discounted_sum' => number_format($totalDiscountedSum, 2),
        'total_igst_sum' => number_format($totalIGSTSum, 2),
        'total_cgst_sum' => number_format($totalCGSTSum, 2),
        'total_sgst_sum' => number_format($totalSGSTSum, 2)
    ];

return response()->json([
    'cart_items' => $cartData,
    'cart_summary' => $cartSummary
]);

}


public function customerorders(Request $request)
{

    $customer = Customer::where('user_id', $request->user_id)->first();

    if (!$customer) {
        return response()->json(['error' => 'Customer not found for the given user_id'], 404);
    }

    
    
        
        // Fetch orders where payment is successful
        $orders = OrderCustomer::where('customer_id', $customer->id)
            ->whereHas('orderData', function($query) {
                $query->where('payment_mode', 'Success');
            })
            ->with(['orderData' => function ($q) {
                $q->where('payment_mode', 'Success')
                  ->with(['orderProducts' => function ($t) {
                      $t->with('productData')
                        ->with('colorData');
                  }]);
            }])
            ->latest()
            ->get();

        // Prepare orders data for API response
        $ordersData = $orders->map(function ($order) {
            return [
                'order_id' => 'Primefly# ' . $order->orderData->order_code,
                'date' => $order->orderData->created_at->format('d-m-Y'),
                'total' => number_format($order->orderData->orderProducts->sum('total'), 2),
                'products' => $order->orderData->orderProducts->map(function ($product) {
                    return [
                        'image' => $product->productData->product_categories->pluck('image_webp')->first() ?? null, // Return first image_webp or null
                        'category' => $product->productData->product_categories->pluck('title')->first() ?? null,  // Return first category title or null
                        'category_id' => $product->productData->product_categories->pluck('id')->first() ?? null,  // Return first category title or null
                        'package' => ucfirst($product->productData->title),
                        'package' => ucfirst($product->productData->title),
                        'travel_type' => $product->travel_type ? ucfirst($product->travel_type) : null,
                        'origin' => $product->origin,
                        'destination' => $product->destination,
                        'guest_count' => $product->guest ?? 'Not available',
                        'date' => $product->exit_date ?? 'Not available',
                        'price' => $product->total ?? 'Not available',
                    ];
                }),
                'invoice_url' => route('invoice.pdf', ['order_id' => $order->orderData->id]),
            ];
        });
        
        
        // Return the data in API response
        return response()->json([
            'status' => 'success',
            'message' => 'Account details fetched successfully.',
            // 'customer' => $customer,
            'orders' => $ordersData,
        ], 200);
    
}


public function searchBookingAPI(Request $request)
{
    // Validate request
    $validator = Validator::make($request->all(), [
        'datepicker' => 'required|date',
        'travel_type' => 'required|string',
        'travel_sector' => 'required|string',
        'origin' => 'required|string',
        'destination' => 'required|string',
        'flight_number' => 'required|string',
        'adults' => 'required|integer|min:1',
        'infants' => 'required|integer|min:0',
        'children' => 'required|integer|min:0',
        'category' => 'required|integer|exists:categories,id',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors(),
        ], 422);
    }

    $data = $request->all();

    // Calculate total amounts for matching products
    $totalAmounts = $this->calculateTotalAmounts($data);

    if (empty($totalAmounts)) {
        return response()->json([
            'status' => 'error',
            'message' => 'No packages found',
        ], 404);
    }

    return response()->json([
        'status' => 'success',
        'data' => $totalAmounts,
    ]);
}

private function calculateTotalAmounts($data)
{
    $products = Product::select('products.*', 'locations.code as location_code', 'locations.title as location_title')
        ->join('locations', function ($join) use ($data) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'))
                ->where('products.service_type', $data['travel_type'])
                ->where('products.sector', $data['travel_sector']);
        })
        ->when($data['travel_type'] == "departure", function ($query) use ($data) {
            $locationId = Location::where('code', $data['origin'])->value('id');
            return $query->where('locations.id', $locationId);
        })
        ->when($data['travel_type'] == "arrival", function ($query) use ($data) {
            $locationId = Location::where('code', $data['destination'])->value('id');
            return $query->where('locations.id', $locationId);
        })
        ->when($data['travel_type'] == "transit_type", function ($query) use ($data) {
            $locationId = Location::where('code', $data['destination'])->value('id');
            return $query->where('locations.id', $locationId);
        })
        ->where('products.category_id', $data['category'])
        ->where('products.status', 'Active')
        ->groupBy('products.id')
        ->get();

    if ($products->isEmpty()) {
        return [];
    }

    $result = [];
    $guestCount = $data['adults'] + $data['infants'] + $data['children'];

    foreach ($products as $product) {
        if (isset($data['user_id']) && DB::table('users')->where('id', $data['user_id'])->where('btype', 'b2b')->exists()) {
            $userId = $data['user_id'];
        
            $adultPrice = DB::table('product_offer_size')
                ->where('product_id', $product->id)
                ->where('size_id', 1)
                ->where('user_id', $userId)
                ->value('price') ?? $product->price;
        
            $childrenPrice = DB::table('product_offer_size')
                ->where('product_id', $product->id)
                ->where('size_id', 2)
                ->where('user_id', $userId)
                ->value('price') ?? 0;
        
            $infantPrice = DB::table('product_offer_size')
                ->where('product_id', $product->id)
                ->where('size_id', 3)
                ->where('user_id', $userId)
                ->value('price') ?? 0;
        
            $additionalPrice = DB::table('product_offer_size')
                ->where('product_id', $product->id)
                ->where('size_id', 4)
                ->where('user_id', $userId)
                ->value('price') ?? $product->additional_price;
        } 
         else {
            $adultPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 1)->value('price') ?? 0;
            $childrenPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 2)->value('price') ?? 0;
            $infantPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 3)->value('price') ?? 0;
            $additionalPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 4)->value('price') ?? 0;
        }

        $totalAmount = $data['adults'] > 1
            ? (($data['adults'] - 1) * $additionalPrice) + $adultPrice + ($data['children'] * $childrenPrice) + ($data['infants'] * $infantPrice)
            : ($data['adults'] * $adultPrice) + ($data['children'] * $childrenPrice) + ($data['infants'] * $infantPrice);

        if ($totalAmount <= 0) {
            continue;
        }

        $result[] = [
            'product' => $product,
            'location_title' => $product->location_title,
            'location_code' => $product->location_code,
            'total_amount' => $totalAmount,
            'travel_details' => [
                'setdate' => $data['datepicker'],
                'total_guest' => $guestCount,
                'origin' => $data['origin'],
                'destination' => $data['destination'],
                'flight_number' => $data['flight_number'],
                'travel_sector' => $data['travel_sector'],
                'entry_date' => $data['datepicker'],
                'travel_type' => $data['travel_type'],
                'adults' => $data['adults'],
                'infants' => $data['infants'],
                'children' => $data['children'],
                'meet_guest' => $guestCount,
            ],
        ];
    }

    return $result;
}

public function search_booking_transit_api(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'datepickert' => 'required|date',
        'travel_typet' => 'required|string',
        'travel_sectort' => 'required|string',
        'origint' => 'required|string',
        'destinationt' => 'required|string',
        'flight_numbert' => 'required|string',
        'adultst' => 'required|integer|min:1',
        'infantst' => 'required|integer|min:0',
        'childrent' => 'required|integer|min:0',
        'categoryt' => 'required|integer',
        'trans' => 'required|string',
    ]);

    $data = $request->all();

    // Calculate total amounts for all matching products
    $totalAmounts = $this->calculateTotalAmounts_transit($data);

    if (empty($totalAmounts)) {
        return response()->json([
            'status' => 'error',
            'message' => 'No packages found',
        ], 404); // Send appropriate HTTP status code
    }

    return response()->json([
        'status' => 'success',
        'message' => 'Packages found',
        'data' => $totalAmounts,
    ], 200);
}

private function calculateTotalAmounts_transit($data)
{
    $products = Product::select('products.*', 'locations.code as location_code', 'locations.title as location_title')
        ->join('locations', function ($join) use ($data) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'))
                ->where('products.service_type', 'transit')
                ->where('products.sector', $data['travel_sectort']);
        })
        ->when($data['travel_typet'] == "transit_type", function ($query) use ($data) {
            $locationId = Location::where('code', $data['trans'])->value('id');
            return $query->where('locations.id', $locationId);
        })
        ->where('products.category_id', $data['categoryt'])
        ->where('products.status', 'Active')
        ->groupBy('products.id')
        ->get();

    if ($products->isEmpty()) {
        return [];
    }

    $result = [];
    $guestCount = $data['adultst'] + $data['infantst'] + $data['childrent'];

    foreach ($products as $product) {
        if (isset($data['user_id']) && DB::table('users')->where('id', $data['user_id'])->where('btype', 'b2b')->exists()) {
            $userId = $data['user_id'];

            // Fetch prices for the specific user
            $adultPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 1)->where('user_id', $userId)->value('price') ?? $product->price;
            $childrenPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 2)->where('user_id', $userId)->value('price') ?? ProductPrice::where('product_id', $product->id)->where('size_id', 2)->value('price') ?? 0;
            $infantPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 3)->where('user_id', $userId)->value('price') ?? ProductPrice::where('product_id', $product->id)->where('size_id', 3)->value('price') ?? 0;
            $additionalPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 4)->where('user_id', $userId)->value('price') ?? $product->additional_price;
        } else {
            $adultPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 1)->value('price') ?? 0;
            $childrenPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 2)->value('price') ?? 0;
            $infantPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 3)->value('price') ?? 0;
            $additionalPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 4)->value('price') ?? 0;
        }

        $totalAmount = ($data['adultst'] > 1)
            ? (($data['adultst'] - 1) * $additionalPrice) + $adultPrice + ($data['infantst'] * $infantPrice) + ($data['childrent'] * $childrenPrice)
            : ($data['adultst'] * $adultPrice) + ($data['infantst'] * $infantPrice) + ($data['childrent'] * $childrenPrice);

        $result[] = [
            'product' => $product,
            'location_title' => $product->location_title,
            'location_code' => $product->location_code,
            
            'total_amount' => $totalAmount,
            'travel_details' => [
          
            'setdate' => $data['datepickert'],
            'total_guest' => $guestCount,
            'origin' => $data['origint'],
            'trans' => $data['trans'],
            'destination' => $data['destinationt'],
            'flight_number' => $data['flight_numbert'],
            'travel_sector' => str_replace('_', ' ', $data['travel_sectort']),
            'entry_date' => $data['datepickert'],
            'travel_type' => "Transit",
            'adults' => $data['adultst'],
            'infants' => $data['infantst'],
            'children' => $data['childrent'],
            'pnr' => $data['pnr'] ?? '',
            'meet_guest' => $guestCount,
            ],
        ];
    }

    return $result;
}

public function search_booking_lounch_api(Request $request)
{
    // Validate request
    $request->validate([
        'terminal' => 'required|string',
        'origin' => 'required',
        'destination' => 'required',
        'flight_number' => 'required|string',
        'adults' => 'required|integer',
        'category' => 'required|integer'
    ]);

    // Collect data
    $data = $request->all();

    // Fetch the location ID based on origin code
    $location = Location::where('code', $data['origin'])->first();
    $locationId = $location ? $location->id : null;

    // Fetch products based on category and location
    $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
        })
        ->where('products.category_id', $data['category']) // Add category filter
        ->where('locations.id', $locationId)
        ->where('products.status', 'Active')
        ->groupBy('products.id')
        ->get();

    // Check if products are found
    if ($products->isEmpty()) {
        return response()->json(['status' => 'error', 'message' => 'No packages found'], 404);
    }

    // Initialize result array
    $result = [];

    // Fetch category title
    $category = Category::find($data['category']);
    $categoryTitle = $category ? $category->title : '';

    // Prepare product details with pricing logic
    foreach ($products as $product) {
        $totalAmount = 0;

        if (isset($data['user_id']) && DB::table('users')->where('id', $data['user_id'])->where('btype', 'b2b')->exists()) {
            $offer = Offer::where('product_id', $product->id)
                ->where('user_id', $data['user_id'])
                ->first();

            if ($offer) {
                $totalAmount = $data['adults'] * $offer->price;
            } else {
                return response()->json(['status' => 'error', 'message' => 'No packages found'], 404);
            }
        } else {
            // Use default pricing for non-B2B users
            $totalAmount = $data['adults'] * $product->price;
        }

        // Add product details to the result array
        $result[] = [
            'product' => $product,
            'total_amount' => $totalAmount,
            'location_title' => $product->location_title,
            'travel_details' => [
               
                'entry_date' => $data['entry_date'] ?? '',
                'total_guest' => $data['adults'],
                'origin' => $data['origin'],
                'destination' => $data['destination'],
                'flight_number' => $data['flight_number'],
                'travel_type' => 'departure',
                'meet_guestn' => 1,
            ],

        ];
    }

    // Return API response
    return response()->json([
        'status' => 'success',
        'category_title' => $categoryTitle,
        'data' => $result
    ]);
}
public function searchBookingBaggageApi(Request $request)
{
    // Validate request
    $request->validate([
        'terminal' => 'required|string',
        'origin' => 'required|string',
        'destination' => 'required|string',
        'flight_number' => 'required|string',
        'adults' => 'required|integer',
        'category' => 'required|integer',
        'datepicker' => 'required|date',
        'user_id' => 'nullable|integer' // Optional for B2B users
    ]);

    // Collect data
    $data = $request->all();

    // Fetch location ID based on origin
    $location = Location::where('code', $data['origin'])->first();
    $locationId = $location ? $location->id : null;

    // Fetch products based on filters
    $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
        })
        ->where('products.category_id', $data['category'])
        ->where('locations.id', $locationId)
        ->where('products.status', 'Active')
        ->groupBy('products.id')
        ->get();

    if ($products->isEmpty()) {
        return response()->json(['status' => 'error', 'message' => 'No packages found']);
    }

    $result = [];
    $category = Category::where('id', $data['category'])->first();
    $guest = $data['adults'];
    $setdate = $data['datepicker'];

    foreach ($products as $product) {
        $totalAmount = $guest * $product->price; // Default price

        // Handle B2B users
        if (!empty($data['user_id'])) {
            $user = DB::table('users')->where('id', $data['user_id'])->where('btype', 'b2b')->first();

            if ($user) {
                $offer = Offer::where('product_id', $product->id)
                    ->where('user_id', $user->id)
                    ->first();

                if ($offer) {
                    $totalAmount = $guest * $offer->price; // Use B2B offer price
                } else {
                    return response()->json(['status' => 'error', 'message' => 'No packages found']);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Invalid user or not eligible for B2B pricing']);
            }
        }

        $result[] = [
            'product' => $product,
            'location_title' => $product->location_title,

            'total_amount' => $totalAmount,
            'travel_details' => [
           
            'setdate' => $setdate,
            'total_guest' => $guest,
            'origin' => $data['origin'],
            'destination' => $data['destination'],
            'flight_number' => $data['flight_number'],
            'terminal' => $data['terminal'],
            'meet_guestn' => 1,

            ],
        ];
    }

    // Return the result as JSON for mobile API
    return response()->json([
        'success' => true,
        'data' => $result,
        'category' => $category->title
    ]);
}
public function search_booking_entry_ticket_api(Request $request)
{
    // Validate request
    $request->validate([
        'terminal' => 'required|string',
        'origin' => 'required|string',
        'count' => 'required|integer',
        'category' => 'required|integer',
        'entry_date' => 'required|date',
        'entry_time' => 'required|string',
        'user_id' => 'nullable|integer' // Optional for B2B users
    ]);

    // Collect data
    $data = $request->all();

    // Fetch products based on origin and category
    $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
        })
        ->where('products.category_id', $data['category'])
        ->where('products.status', 'Active')
        ->where('locations.code', $data['origin'])
        ->groupBy('products.id')
        ->get();

    if ($products->isEmpty()) {
        return response()->json(['status' => 'error', 'message' => 'No packages found']);
    }

    $result = [];
    $category = Category::where('id', $data['category'])->first();
    $guest = $data['count'];
    $entryDate = $data['entry_date'];

    foreach ($products as $product) {
        $ticketPrice = $product->price; // Default price

        // Handle B2B user pricing
        if (!empty($data['user_id'])) {
            $user = DB::table('users')->where('id', $data['user_id'])->where('btype', 'b2b')->first();

            if ($user) {
                $offer = Offer::where('product_id', $product->id)
                    ->where('user_id', $user->id)
                    ->first();

                if ($offer) {
                    $ticketPrice = $offer->price; // Use B2B pricing
                } else {
                    return response()->json(['status' => 'error', 'message' => 'No packages found']);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Invalid user or not eligible for B2B pricing']);
            }
        }

        // Calculate total amount
        $totalAmount = $guest * $ticketPrice;

        $result[] = [
            'product' => $product,
            'total_amount' => $totalAmount,
            'location_title' => $product->location_title,
            'travel_details' => [
           
           
            'setdate' => $entryDate,
            'total_guest' => $guest,
            'origin' => $data['origin'],
            'terminal' => $data['terminal'],
            'entry_date' => $entryDate,
            'entry_time' => $data['entry_time'],
            'meet_guestn' => 1
            ],
        ];
    }

    // Return the result as JSON for mobile API
    return response()->json([
        'success' => true,
        'data' => $result,
        'category' => $category->title
    ]);
}
public function search_booking_carparking(Request $request)
{
    // Validate the request parameters
    $request->validate([
        'terminal' => 'required|string',
        'origin' => 'required|string',
        'count' => 'required|integer', // Number of bags
        'entry_date' => 'required|date',
        'exit_date' => 'required|date',
        'entry_time' => 'required|string',
        'exit_time' => 'required|string',
        'category' => 'required|integer', // Category ID
        'user_id' => 'nullable|integer', // Optional user_id for B2B users
    ]);

    // Collect the input data from the request
    $data = $request->all();

    // Calculate the booking duration in hours
    $entryDateTime = new DateTime($data['entry_date'] . ' ' . $data['entry_time']);
    $exitDateTime = new DateTime($data['exit_date'] . ' ' . $data['exit_time']);
    $interval = $entryDateTime->diff($exitDateTime);
    $hours = $interval->days * 24 + $interval->h + ($interval->i > 0 ? 1 : 0); // Round up if minutes > 0

    // Fetch available products based on the category and location
    $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
        })
        ->where('products.category_id', $data['category']) // Filter by category
        ->where('locations.code', $data['origin']) // Filter by origin location
        ->where('products.status', 'Active')
        ->groupBy('products.id')
        ->get();

    // If no products are found, return an error response
    if ($products->isEmpty()) {
        return response()->json(['status' => 'error', 'message' => 'No packages found'], 404);
    }

    // Prepare the result array
    $result = [];
    $category = Category::where('id', $data['category'])->first();

    // Loop through products to calculate prices
    foreach ($products as $product) {
        // Retrieve the base pricing and additional pricing details from the product
        $basePrice = $product->price;
        $additionalHourPrice = $product->additional_hourly_price ?? 0;
        $additionalBagPrice = $product->additional_price ?? 0;

        // Check if the user_id is provided and if the user is a B2B user
        if (!empty($data['user_id'])) {
            $user = DB::table('users')->where('id', $data['user_id'])->where('btype', 'b2b')->first();

            if ($user) {
                // If the user is a B2B user, check for any offers for the product
                $offer = Offer::where('product_id', $product->id)
                    ->where('user_id', $user->id)
                    ->first();

                // Use the B2B offer price if available
                if ($offer) {
                    $totalAmount = $offer->price;
                    $additionalHourPrice = $offer->additional_hourly_price ?? $additionalHourPrice;
                    $additionalBagPrice = $offer->additional_price ?? $additionalBagPrice;
                } else {
                    return response()->json(['status' => 'error', 'message' => 'No offer found for this user'], 404);
                }
            } else {
                // User is not a valid B2B user
                return response()->json(['status' => 'error', 'message' => 'User not found or not a B2B user'], 404);
            }
        } else {
            // If no user_id is provided, use the base price for non-authenticated or non-B2B users
            $totalAmount = $basePrice;
        }

        // Apply additional charges based on booking duration and number of bags
        if ($hours > 4) {
            $totalAmount += ($hours - 4) * $additionalHourPrice;
        }
        if ($data['count'] > 2) {
            $totalAmount += ($data['count'] - 2) * $additionalBagPrice;
        }

        // Store the result for each product
        $result[] = [

            'product' => $product,
            'product_id' => $product->id,
            'total_amount' => $totalAmount,
            'location_title' => $product->location_title,

            'travel_details' => [
           
           // Total amount after applying pricing rules
            'entry_date' => $data['entry_date'],
            'setdate' => $data['entry_date'],
            'exit_date' => $data['exit_date'],
            'entry_time' => $data['entry_time'],
            'exit_time' => $data['exit_time'],
            'origin' => $data['origin'],
            'terminal' => $data['terminal'],
            'total_guest' => $data['count'],
            'meet_guestn' => 1
            ],
        ];
    }

    // Return the data in a JSON response (no session involved)
    return response()->json([
        'success' => true,
        'message' => 'Packages found successfully.',
        'data' => $result,
        'category' => $category->title ?? null
    ]);
}


public function searchBookingPorter(Request $request)
{
    // Validate request
    $request->validate([
        'travel_type' => 'required|string',
        'travel_sector' => 'required|string',
        'origin' => 'required|string',
        'destination' => 'required|string',
        'flight_number' => 'required|string',
        'count' => 'required|integer',
        'category' => 'required|integer',
        'user_id' => 'nullable|integer' // Optional for mobile API
    ]);

    // Collect data
    $data = $request->all();

    // Fetch products based on travel type and locations
    $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) use ($data) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
        })
        ->when($data['travel_type'] === "departure", function ($query) use ($data, &$locationId) {
            $locationId = Location::where('code', $data['origin'])->value('id');
        })
        ->when(in_array($data['travel_type'], ["arrival", "transit_type"]), function ($query) use ($data, &$locationId) {
            $locationId = Location::where('code', $data['destination'])->value('id');
        })
        ->where(function ($query) use (&$locationId) {
            if ($locationId) {
                $query->where('locations.id', $locationId);
            }
        })
        ->where('products.category_id', $data['category'])
        ->where('products.status', 'Active')
        ->groupBy('products.id')
        ->get();

    // Check if products are found
    if ($products->isEmpty()) {
        return response()->json(['status' => 'error', 'message' => 'No packages found'], 404);
    }

    $category = Category::find($data['category']);
    $result = [];

    foreach ($products as $product) {
        // Fetch B2B pricing details if `user_id` is provided
        if (!empty($data['user_id'])) {
            $user = User::where('id', $data['user_id'])->where('btype', 'b2b')->first();

            if ($user) {
                $offer = Offer::where('product_id', $product->id)
                    ->where('user_id', $user->id)
                    ->first();

                if ($offer) {
                    $totalAmount = $offer->price; // Use offer price if available
                } else {
                    return response()->json(['status' => 'error', 'message' => 'No packages found'], 404);
                }
            } else {
                $totalAmount = $data['count'] * $product->price;
            }
        } else {
            // Use default pricing for non-B2B users
            $totalAmount = $data['count'] * $product->price;
        }

        // Prepare result array
        $result[] = [
            'product' => $product,
            'total_amount' => $totalAmount,
            'location_title' => $product->location_title,
            'travel_details' => [
            
           
            'setdate' => $data['entry_date'] ?? null,
            'total_guest' => $data['count'],
            'origin' => $data['origin'],
            'destination' => $data['destination'],
            'flight_number' => $data['flight_number'],
            'travel_sector' => $data['travel_sector'],
            'entry_date' => $data['entry_date'] ?? null,
            'travel_type' => $data['travel_type'],
            'porter_count' => $data['count'],
            'meet_guestn' => 1
            ],
        ];
    }

    // Return JSON response
    return response()->json([
        'status' => 'success',
        'message' => 'Packages found',
        'data' => $result,
        'category' => $category->title ?? null
    ], 200);
}



public function getInternationalAirports(Request $request)
{
    $perPage = $request->input('per_page', 50);

    // Generate cache key using pagination
    $cacheKey = 'international_airports_page_' . $request->input('page', 1) . '_per_page_' . $perPage;

    $locationsFromDb = Cache::remember($cacheKey, now()->addMinutes(20), function () use ($perPage) {
        return DB::table('international_airport')
            ->select('faa', 'name')
            ->whereRaw("faa NOT REGEXP '[0-9]'")
            ->paginate($perPage)
            ->through(function ($location) {
                return [
                    'fs' => $location->faa,
                    'city' => $location->name,
                ];
            });
    });

    return response()->json([
        'status' => 'success',
        'locations' => $locationsFromDb
    ]);
}
public function international_search(Request $request)
{
    // Retrieve the search query from the request
    $searchQuery = $request->input('search', '');

    $locationsFromDb = DB::table('international_airport')
    ->select('faa', 'name')
    ->when($searchQuery, function ($query) use ($searchQuery) {
        $query->where('faa', 'LIKE', "%{$searchQuery}%")
              ->orWhere('name', 'LIKE', "%{$searchQuery}%");
    })
    // Exclude entries where FAA contains any digit
    ->whereRaw("faa NOT REGEXP '[0-9]'")
    ->get()
    ->map(function ($location) {
        return [
            'fs' => $location->faa,  // FAA code
            'city' => $location->name // City name
        ];
    });
    // Return the data as a JSON response
    return response()->json([
        'status' => 'success',
        'locations' => $locationsFromDb
    ]);
}




public function search_booking_cloakroom_api(Request $request)
{
    // Validate request
    $request->validate([
        'terminal' => 'required|string',
        'origin' => 'required',
        'count' => 'required|integer', // Number of bags
        'entry_date' => 'required',
        'exit_date' => 'required',
        'entry_time' => 'required',
        'exit_time' => 'required',
        'category' => 'required|integer'
    ]);

    // Collect data
    $data = $request->all();

    // Calculate the duration in hours
    $entryDateTime = new DateTime($data['entry_date'] . ' ' . $data['entry_time']);
    $exitDateTime = new DateTime($data['exit_date'] . ' ' . $data['exit_time']);
    $interval = $entryDateTime->diff($exitDateTime);
    $hours = $interval->days * 24 + $interval->h + ($interval->i > 0 ? 1 : 0); // Round up if there are any minutes

    // Fetch products based on travel type and locations
    $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
        })
        ->where('products.category_id', $data['category']) // Add category filter
        ->where('locations.code', $data['origin'])
        ->where('products.status', 'Active')
        ->groupBy('products.id')
        ->get();

    if ($products->isEmpty()) {
        return response()->json(['status' => 'error', 'message' => 'No packages found'], 404);
    }

    $result = [];
    $category = Category::where('id', $data['category'])->first();

    foreach ($products as $product) {
        // Fetch default pricing details from product
        $basePrice = $product->price; // Assuming the column name is price
        $additionalHourPrice = $product->additional_hourly_price ?? 0; // Assuming the column name is additional_hourly_price
        $additionalBagPrice = $product->additional_price ?? 0; // Assuming the column name is additional_price

        // Check if the user is authenticated and B2B
        if (!empty($data['user_id'])) {
            $user = User::where('id', $data['user_id'])->where('btype', 'b2b')->first();
            $offer = Offer::where('product_id', $product->id)
                ->where('user_id', $user->id)
                ->first();

            if ($offer) {
                $totalAmount = $data['count'] * $offer->price; // Use offer price if available
                $additionalHourPrice = $offer->additional_hourly_price ?? $additionalHourPrice;
                $additionalBagPrice = $offer->additional_price ?? $additionalBagPrice;
            } else {
                // If no offer found, return an error
                return response()->json(['status' => 'error', 'message' => 'No offer found for the package'], 404);
            }
        } else {
            // Use default pricing for non-authenticated or non-B2B users
            $totalAmount = $basePrice;
        }

        // Apply additional pricing rules
        if ($hours > 4) {
            $totalAmount += ($hours - 4) * $additionalHourPrice;
        }
        if ($data['count'] > 2) {
            $totalAmount += ($data['count'] - 2) * $additionalBagPrice;
        }

        // Prepare result array
        $result[] = [
            'product' => $product,
            'total_amount' => $totalAmount,
            'location_title' => $product->location_title,
            'travel_details' => [
            
           // Use the calculated total amount
            'setdate' => $data['entry_date'],
            'total_guest' => $data['count'],
            'origin' => $data['origin'],
            'terminal' => $data['terminal'],
            'entry_date' => $data['entry_date'],
            'exit_date' => $data['exit_date'],
            'entry_time' => $data['entry_time'],
            'exit_time' => $data['exit_time'],
            'bag_count' => $data['count'],
            'meet_guestn' => 1
            ],
        ];
    }



    // Return the results in JSON format
    return response()->json([
        'success' => true,
        'data' => $result,
      
    ]);
}


public function serviceDetailApi(Request $request)
{
    try {
        // Fetch the category based on the short URL
        $category = Category::active()->where('id',$request->id)->first();

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found.'
            ], 404);
        }

        // Fetch all products under the category
        $products = Product::where('category_id', $category->id)->get();

        // Collect all unique location IDs
        $allLocationIds = [];
        foreach ($products as $product) {
            $locationIds = explode(',', $product->location_id);
            $allLocationIds = array_merge($allLocationIds, $locationIds);
        }
        $uniqueLocationIds = array_unique($allLocationIds);

        // Fetch active locations
        $locations = Location::active()->whereIn('id', $uniqueLocationIds)->get();
        

        // Fetch other related data
      
       
        $subcategories = Category::where('parent_id', $category->id)->active()->get();
        $subcategoriesWithGallery = $subcategories->map(function ($sub) {
            $sub->galleryItems = CategoryGallery::where('category_id', $sub->id)->get();
            return $sub;
        });

        // Return data as JSON response
        return response()->json([
            'success' => true,
            'data' => [
                'category' => $category,
               
                'locations' => $locations,
               
                
                'Howitworks' => $subcategoriesWithGallery,
            ],
        ], 200);
    } catch (\Exception $e) {
        // Handle unexpected errors
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while fetching service details.',
            'error' => $e->getMessage(),
        ], 500);
    }
}

public function locationDetailApi(Request $request)
{
    try {
        // Fetch the location based on the title (short URL)
        $location = Location::where('id', $request->id)->first();

        if (!$location) {
            return response()->json([
                'success' => false,
                'message' => 'Location not found.'
            ], 404);
        }

        // Fetch related data
        $type = $location->title;
        $categories = $location->categories(); // Assuming categories is a relationship
       
        $gallery = LocationGallery::where('location_id', $location->id)->get();

        // Return the response as JSON
        return response()->json([
            'success' => true,
            'data' => [
                'location' => $location,
                'type' => $type,
                'categories' => $categories,
              
                'galleryimages' => $gallery,
            ],
        ], 200);
    } catch (\Exception $e) {
        // Handle unexpected errors
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while fetching location details.',
            'error' => $e->getMessage(),
        ], 500);
    }
}


public function getCartCategories(Request $request)
{
    // Retrieve session key from the request
    $customer = Customer::where('user_id', $request->user_id)->first();



    
    // Check if customer exists
    if (!$customer) {
        return response()->json([
            'status' => 'error',
            'message' => 'Customer not found.',
        ], 404);
    }
    $customerId = $customer->id;
    // Set session key based on the customer ID
    $newSessionKey = $customerId;
    session(['session_key' => $newSessionKey]);

    if (!empty($newSessionKey)) {
        // Get cart items
        $cartItems = Cart::session($newSessionKey)->getContent();

        $locationCodes = [];
        $categoryIds = [];

        // Extract location codes from cart items
        $cartItems->each(function ($item) use (&$locationCodes) {
            $travelType = $item->attributes['travel_type'] ?? null;

           
            $locationCode = ($travelType === 'departure' || $travelType === 'Transit' || empty($travelType))
                ? $item->attributes['origin']
                : $item->attributes['destination'];

          

            if ($locationCode) {
                $locationCodes[] = $locationCode;
            }
        });

        // Normalize and remove duplicates
        $locationCodes = array_map(function ($code) {
            return strtoupper(trim($code));
        }, array_unique($locationCodes));

      
        // Fetch location IDs
        $locationIds = Location::whereIn('code', $locationCodes)
            ->pluck('id')
            ->toArray();

      

        // Fetch products and filter by location IDs
        $products = Product::where('status', 'Active')->get()->filter(function ($product) use ($locationIds) {
            $productLocationIds = explode(',', $product->location_id);
            return !empty(array_intersect($productLocationIds, $locationIds));
        });

        // Extract unique category IDs
        $categoryIds = $products->pluck('category_id')->unique();

        // Fetch categories
        $categories = Category::whereIn('id', $categoryIds)
            ->where('status', 'Active')
            ->whereNull('parent_id')
            ->get();

        

        // Return response
        return response()->json([
            'success' => true,
            'categories' => $categories,
        ], 200);
    } else {
        // If no session key, fetch all active parent categories
        $categories = Category::whereNull('parent_id')->where('status', 'Active')->get();

        return response()->json([
            'success' => true,
            'categories' => $categories,
        ], 200);
    }
}


public function faq_api()
{
    // Fetch active FAQs
    $faqs = Faq::active()->latest()->take(10)->get();

    // Return response in JSON format
    return response()->json([
        'success' => true,
        'data' => [
            'faqs' => $faqs,
        ],
    ], 200);
}


public function main_search_api(Request $request)
{
    // $searchResult = array();
    // $products = Product::active()->where('title', 'LIKE', "%{$request->search_param}%")->get();


    $searchResult = array();

           
            $blogs = category::active()->Where('title', 'LIKE', "%{$request->search_param}%")->whereNull('parent_id')->get();
            
    if ($blogs->isNotEmpty()) {
        foreach ($blogs as $blog) {
            
            $searchResult[] = array("id" => $blog->id, "title" => $blog->title,   'link' => url('service/' . $blog->short_url));
        }
    }
    return response()->json(['status' => true, 'message' => $searchResult]);
}

public function get_banner(Request $request)
{
    try {
        // Fetch the type from the request
        $type = $request->input('type');

        // Validate the type input
        if (!in_array($type, ['offer', 'banner'])) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid type specified. Allowed values: offer, banner.',
            ], 400); // Bad Request
        }

        // Fetch banners based on the type
        $banners = HomeBanner::where('mode', $type)->get();

        // Check if banners exist
        if ($banners->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No banners available for the specified type.',
                'data' => []
            ], 404); // Not Found
        }

        // Return banners with a success message
        return response()->json([
            'status' => true,
            'message' => 'Banners fetched successfully.',
            'data' => $banners
        ], 200); // OK
    } catch (\Exception $e) {
        // Handle exceptions
        return response()->json([
            'status' => false,
            'message' => 'An error occurred while fetching banners.',
            'error' => $e->getMessage()
        ], 500); // Internal Server Error
    }
}






public function cartAddItems_api(Request $request)
{
    // Retrieve customer from the database using user_id from the request
    $customer = Customer::where('user_id', $request->user_id)->first();

    if (!$customer) {
        return response()->json(['status' => false, 'message' => 'Customer not found']);
    }

    // Use the customer's id as the session key
    $sessionKey = $customer->id;

    // Load the cart session for the user
    Cart::session($sessionKey);

    // Default or fallback values in case parameters are missing
    $origin = $request->origin ?? '';
    $trans = $request->trans ?? '';
    $destination = $request->destination ?? '';
    $travel_sector = $request->travel_sector ?? '';
    $flight_number = $request->flight_number ?? '';
    $entry_date = $request->entry_date ?? '';
    $travel_type = $request->travel_type ?? '';
    $bag_count = $request->bag_count ?? '';
    $adults = $request->adults ?? '';
    $infants = $request->infants ?? '';
    $children = $request->children ?? '';
    $entry_time = $request->entry_time ?? '';
    $pnr = $request->pnr ?? '';
    $exit_time = $request->exit_time ?? '';
    $meet_guest = $request->meet_guest ?? '';
    $meet_guestn = $request->meet_guestn ?? '';
    $setdate = $request->setdate;

    // Validate input parameters
    $validator = Validator::make($request->all(), [
        'qty' => 'required|integer|min:1',
        'user_id' => 'required|integer|min:1',
        'attributeList' => 'nullable|array', // Attribute list if provided
        'totalprice' => 'required|numeric|min:0',
        'totalguest' => 'required|integer|min:1',
        'entry_date' => 'nullable|date',
        'meet_guest' => 'nullable|max:255',
        'meet_guestn' => 'nullable|max:255',
    ]);

    // If validation fails, return the validation error message
    if ($validator->fails()) {
        return response()->json(['status' => false, 'message' => $validator->errors()->first()]);
    }

    // Fetch product using the product_id
    $product = Product::find($request->product_id);
    if (!$product) {
        return response()->json(['status' => false, 'message' => 'Product not found']);
    }

    // Prepare necessary variables
    $qty = $request->qty;
    $product_price = $request->totalprice;

    // Generate unique identifiers for the cart item
    $uniqueId = $product->id . '_' . time() . '_' . Str::random(8);
    $basePackageId = explode('_', $product->id)[0] ?? $product->id;
    $uniquePackageId = 'PKG-' . $basePackageId . '-' . substr(md5($uniqueId), 0, 8);

    try {
        // Add product to the cart
        Cart::session($sessionKey)->add([
            'id' => $uniqueId,
            'name' => $product->title,
            'price' => $product_price,
            'quantity' => $qty,
            'guest' => $request->totalguest,
            'attributes' => [
                'guest' => $request->totalguest,
                'entry_date' => $entry_date,
                'travel_type' => $travel_type,
                'setdate' => $setdate,
                'origin' => $origin,
                'trans' => $trans,
                'destination' => $destination,
                'travel_sector' => $travel_sector,
                'flight_number' => $flight_number,
                'entry_time' => $entry_time,
                'exit_time' => $exit_time,
                'bag_count' => $bag_count,
                'adults' => $adults,
                'infants' => $infants,
                'children' => $children,
                'pnr' => $pnr,
                'meet_guest' => $meet_guest,
                'meet_guestn' => $meet_guestn,
                'unique_package_id' => $uniquePackageId,
            ],
            'conditions' => [],
        ]);

        // Remove from wishlist if needed
        $wish_list = app('wishlist');
        if ($wish_list->get($product->id)) {
            $wish_list->remove($product->id);
        }

        return response()->json(['status' => true, 'message' => 'Product added to cart']);
    } catch (Exception $e) {
        return response()->json(['status' => false, 'message' => $e->getMessage()]);
    }
}


public function removeCartItemApi(Request $request)
{
    // Check if both user_id and product_id are provided
    if ($request->has('user_id') && $request->has('product_id')) {
        
        $userId = $request->user_id;
        $cartId = $request->product_id; // product_id will be the uniqueId used to add the item to the cart

        // Retrieve the customer and their session
        $customer = Customer::where('user_id', $userId)->first();

        if (!$customer) {
            return response()->json(['status' => false, 'message' => 'Customer not found']);
        }

        $sessionKey = $customer->id;

        // Check if the item exists in the cart and then remove it
        $cartItem = Cart::session($sessionKey)->get($cartId);

        if ($cartItem) {
            // Remove the item using the same cartId (uniqueId)
            Cart::session($sessionKey)->remove($cartId);

            // Prepare success response
            $message = "Item removed from cart successfully";
            $status = true;
        } else {
            // Item not found in the cart
            $message = "Item not found in the cart.";
            $status = false;
        }

        // Return the response with the status and message
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }

    // If user_id or product_id is missing in the request
    return response()->json([
        'status' => false,
        'message' => 'User ID and Product ID are required',
    ], 400); // Bad Request error
}

public function submit_order_api(Request $request)

{


     $data = $request->json()->all(); 

    $customer = Customer::where('user_id', $data['user_id'])->first();

    if (!$customer) {
        return response()->json(['status' => false, 'message' => 'Customer not found']);
    }

    // Use the customer's id as the session key
    $sessionKey = $customer->id;

    // Load the cart session for the user
    Cart::session($sessionKey);

        if (!Cart::session($sessionKey)->isEmpty()) {
            $calculation_box = Helper::calculationBox();
            $siteInformation = SiteInformation::first();

            


            // $userorigin = $row->attributes['origin'] ?? '';
            // $userorigin    = $detail->trans = $row->attributes['trans'] ?? '';
            // $userorigin = $row->attributes['destination'] ?? '';

            $orderCode = Order::order_code();
            $order = new Order();
            $order->order_code = $orderCode;
            $order->payment_method = $data['selected_kerala_location'];
            $order->cod_extra_charge = 0;
            $order->remarks = "good";
            $order->tax = $siteInformation->tax;
         
            $order->tax_type = $data['selected_kerala_location'] ?? "Inside";

            $order->tax_amount = 10;
            $order->shipping_charge = 10;
            $order->currency = "INR";
            $order->currency_charge = 25;
            $order->cod_extra_charge = $data['final_amount']; 
           

            if ($order->save()) {
                if (!empty($request->Package)) {
                    $personalDetailsData = [];
                    foreach ($request->Package as $package) {
                        $uniquePackageId = $package['unique_package_id'] ?? '';
                    
                        // Loop through the guest details within each package
                        foreach ($package['guest_details'] as $guest) {
                            $personalDetailsData[] = [
                                'order_id' => $order->id,
                                'name' => $guest['name'] ?? '',
                                'unique_pckageid' => $uniquePackageId,
                                'type' => $request->type ?? '', // Assuming `type` is not nested within guest details
                                'age' => $guest['age'] ?? '',
                                'address' => $request->address ?? '',
                                'passport_number' => $guest['passport_number'] ?? '', // If provided in the guest details
                                'pnr' => $guest['pnrNo'] ?? '',
                                'country' => $request->country ?? '',
                                'state' => $request->state ?? '',
                                'city' => $request->city ?? '',
                                'gender' => $guest['gender'] ?? '',
                                'pincode' => $request->pinCode ?? '',
                                'gst_number' => $request->gst_number ?? '',
                                'phone' => $request->phone ?? ''
                            ];
                        }
                    }
                    PersonalDetails::insert($personalDetailsData);
                }
                
                 
                

                $order_customer = new OrderCustomer();
                $order_customer->order_id = $order->id;
                if ($data['user_id']) {
                    $order_customer->user_type = 'User';
                    $order_customer->customer_id = $customer->id;
                    $order_customer->billing_address = "demo";
                    $order_customer->shipping_address = "demo";
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Please login',
                        'data' => '/'
                    ], 200);
                }

                if ($order_customer->save()) {
                    $saved = $notSaved = $alreadyExist = $orderSaved = $orderNotSaved = [];
                    foreach (Cart::session($sessionKey)->getContent() as $row) {
                        $detail = new OrderProduct();
                        $detail->order_id = $order->id;
                        $detail->product_id = $row->id;
                        $detail->qty = $row->quantity ?? 0;
                        $detail->cost = $row->price ?? 0;
                        $detail->total = $row->price ?? 0;
                        $detail->offer_id = 0;
                        $detail->offer_amount = 0;
                        $detail->coupon_value = 0;
                        $detail->coupon_after_price = 0;
                        $detail->entry_date = $row->attributes['entry_date'] ?? '';

                        $detail->entry_time = $row->attributes['entry_time'] ?? '';

                        $dateString = $row->attributes['setdate'] ?? ''; // Fetch the date string

                        $entryTime = $row->attributes['entry_time'] ?? ''; // Fetch the entry time if available


                        $travelType = $row->attributes['travel_type'];

            if($travelType == 'departure')

            {

             $userorigin = $row->attributes['origin'] ?? '';



            }
            elseif($travelType == 'arrival')

            {

                $userorigin = $row->attributes['destination'] ?? '';





            }

            elseif($travelType == 'Transit')

            {

                $userorigin = $row->attributes['trans'] ?? '';





            }
            else
            {


                $userorigin = $row->attributes['origin'] ?? '';



            }

            $location = Location::active()->where('code', $userorigin)->first();

            $users = User::active()
       ->whereRaw("FIND_IN_SET(?, location_ids)", [$location->id])
        ->pluck('email'); // Fetch only the email field

// Implode the emails into a comma-separated string
          $emails = $users->implode(',');


          Order::where('id', $order->id)->update(['emails_b' => $emails]);





                        
                        $formattedTimestamp = '';
                        
                        if ($dateString) {
                            // Define possible date formats (including 'd-m-Y')
                            $possibleDateFormats = ['m/d/Y', 'd-m-Y', 'Y-m-d', 'd/m/Y'];
                            $possibleDateTimeFormats = [
                                'm/d/Y H:i:s', 'd-m-Y H:i:s', 'Y-m-d H:i:s', 'd/m/Y H:i:s',
                                'm/d/Y g:ia', 'd-m-Y g:ia', 'Y-m-d g:ia', 'd/m/Y g:ia'
                            ];
                        
                            // Try parsing the date string with each format
                            $dateTime = false;
                            foreach ($possibleDateFormats as $format) {
                                $dateTime = DateTime::createFromFormat($format, $dateString);
                                if ($dateTime !== false) {
                                    break;
                                }
                            }
                        
                            if ($dateTime) {
                                // Format the date to 'Y-m-d'
                                $formattedDate = $dateTime->format('Y-m-d');
                        
                                // If entryTime is present, combine it with the date
                                if ($entryTime) {
                                    $combinedDateTimeString = $dateString . ' ' . $entryTime;
                                    foreach ($possibleDateTimeFormats as $format) {
                                        $dateTime = DateTime::createFromFormat($format, $combinedDateTimeString);
                                        if ($dateTime !== false) {
                                            break;
                                        }
                                    }
                                }
                        
                                // If only the date part is valid, set the time to '00:00:00'
                                if ($dateTime) {
                                    $formattedTimestamp = $dateTime->format('Y-m-d H:i:s');
                                } else {
                                    $formattedTimestamp = $formattedDate . ' 00:00:00';
                                }
                            } else {
                                echo "Invalid date format.";
                            }
                        }
                        
                   
                        
                   
                        // Assign the combined date and time to exit_date
                        $detail->exit_date = $formattedTimestamp;
                        $detail->travel_sector = $row->attributes['travel_sector'] ?? '';
                        $detail->flight_number = $row->attributes['flight_number'] ?? '';
                        $detail->travel_type = $row->attributes['travel_type'] ?? '';
                        $detail->origin = $row->attributes['origin'] ?? '';
                        $detail->trans = $row->attributes['trans'] ?? '';
                        $detail->destination = $row->attributes['destination'] ?? '';
                        $detail->guest = $row->attributes['guest'] ?? 0;
                        $detail->terminal = $row->attributes['terminal'] ?? '';
                        $detail->bag_count = $row->attributes['bag_count'] ?? 0;
                        $detail->unique_pckageid = $row->attributes['unique_package_id'] ?? 0;
                       
                        $detail->exit_time = $row->attributes['exit_time'] ?? '';
                        $detail->adults = $row->attributes['adults'] ?? '';
                        $detail->infants = $row->attributes['infants'] ?? '';
                        $detail->children = $row->attributes['children'] ?? '';
                        $detail->porter_count = $row->attributes['guest'] ?? '';
                        $detail->pnr = $row->attributes['pnr'] ?? '';

                        if ($detail->save()) {
                            $order_log = new OrderLog();
                            $order_log->order_product_id = $detail->id;
                            $order_log->status = 'Pending';
                            if ($order_log->save()) {
                                $orderSaved[] = 1;
                            } else {
                                $orderNotSaved[] = 1;
                                $notSaved[] = 1;
                            }
                        } else {
                            $notSaved[] = 1;
                        }
                    }

                    if (empty($notSaved) && empty($orderNotSaved)) {
                        // Clear the cart session after the order is successfully processed
                        
                        if ($request->payment_method == 'cod') {
                            $response = $this->order_success_api($order->id,$customer->id);
                            return response()->json([
                                'status' => $response['status'],
                                'message' => $response['message'],
                                'data' => $response['data']
                            ], 200);
                        } 

                   else {

                    $receipt = $data['receipt'] ?? 'order_rcptid_11'; // Default to 'order_rcptid_11' if receipt is not provided
                    $amount = $data['final_amount'] ?? 5;         // Default to 5000 if amount is not provided
                    $currency = $data['currency'] ?? 'INR';          // Default to 'INR' if currency is not provided
                    $notes = $data['notes'] ?? [];                   // Default to an empty array if notes are not provided
                    

           $response = $this->razorpayService->createOrder($receipt, $amount, $currency, $notes);

           if (isset($response['error']) && $response['error']) {
            return response()->json(['message' => $response['message']], 500);
                 }

               return response()->json($response);




                    
                            // $response = $this->order_success($order->id,$customer->id);
                            // return response()->json([
                            //     'status' => $response['status'],
                            //     'message' => $response['message'],
                            //     'data' => $response['data']
                            // ], 200);



                        } 



                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => 'Error while placing the order, Please try after some time'
                        ], 200);
                    }
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Error while placing the order'
                ], 200);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Cart is empty'
            ], 200);
        }
    
}


public function order_success_api($order_id,$customerid)
{
    // Retrieve the order and mark payment as 'Success'
    $order = Order::find($order_id);
    if (!$order) {
        return array(
            'status' => false,
            'message' => 'Order not found.',
        );
    }

    $order->payment_mode = 'Success';
    $order->save();

    // Process each order product and update its logs
    $order_products = OrderProduct::where('order_id', $order_id)->get();
    $orderSaved = [];
    $orderNotSaved = [];

    foreach ($order_products as $order_product) {
        $order_log = OrderLog::where('order_product_id', $order_product->id)->first();
        if ($order_log) {
            $order_log->status = 'Processing';
            if ($order_log->save()) {
                $orderSaved[] = $order_product->id;
            } else {
                $orderNotSaved[] = $order_product->id;
            }
        }

        $product = Product::find($order_product->product_id); // Product-related operations can be added if needed.
    }

    // Clear cart and related sessions
    $this->clear_order_cart_sessions_api($customerid);

    // Send order placement email
    if (Helper::sendOrderPlacedMail($order->id, '1')) {
        // Return successful response
        return array(
            'status' => true,
            'message' => 'Order "Primefly#' . $order->order_code . '" has been placed successfully',
            'data' => '/thank-you',
        );
    } else {
        // Email sending failed; notify user
        return array(
            'status' => true,
            'message' => 'Order "Primefly#' . $order->order_code . '" has been placed successfully, error while sending the email',
            'data' => '/response/' . $order->id,
        );
    }
}


public function clear_order_cart_sessions_api($customerid)

{
    $sessionKey = $customerid;

// Clear all items in the cart session
Cart::session($sessionKey)->clear();

    session()->forget('session_key');
    session()->forget('selected_billing_address');
    session()->forget('selected_shipping_address');
    session()->forget('selected_customer_address');
    session()->forget('order_remarks');
    session()->forget('shipping_charge');
    session()->forget('coupons');
    session()->forget('coupon_value');
    session()->forget('credit_point');
    /*** Guest session ****/
    foreach (['billing', 'shipping'] as $addressType) {
        session()->forget($addressType . '_first_name');
        session()->forget($addressType . '_last_name');
        session()->forget($addressType . '_phone');
        session()->forget($addressType . '_email');
        session()->forget($addressType . '_address');
        session()->forget($addressType . '_zipcode');
        session()->forget($addressType . '_country_name');
        session()->forget($addressType . '_state_name');
        session()->forget($addressType . '_country');
        session()->forget($addressType . '_state');
    }
} 


}
