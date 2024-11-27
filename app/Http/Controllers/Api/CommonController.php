<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Location; // Import the Location model
use App\Models\Category;
use App\Models\OrderCustomer;
use App\Models\Offer;
use App\Models\ProductPrice;
use App\Models\LocationGallery;
use App\Models\Blog;
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
use DateTime;
class CommonController extends Controller
{
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

    /**
     * Method to retrieve active service categories
     */
    public function services()
    {
        $categories = Category::active()->whereNull('parent_id')->get();
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
        //   DB::beginTransaction();

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

            // Update customer information
            $customer->first_name = $request->input('first_name');
            $customer->country = $request->input('country');
            $customer->date_of_birth = $request->input('date_of_birth');
            $customer->updated_at = now();

            if ($customer->save()) {
                // Update user information
                $user->phone = $request->input('phone');
                $user->updated_at = now();

                if ($user->save()) {
                    // DB::commit();
                    return response()->json(['status' => 'success', 'message' => 'Profile has been updated successfully', 'data' => $user], 200);
                }
            }

            // DB::rollBack();
            return response()->json(['status' => 'error', 'message' => 'Error while updating the profile, please try again later'], 500);
        } catch (\Exception $e) {
            // DB::rollBack();
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
            'data' => $customer
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

    foreach ($cartItems as $row) {
        $productIdParts = explode('_', $row->id);
        $originalProductId = $productIdParts[0];
        $product = Product::find($originalProductId);

        if ($product) {
            $category = Category::where('id', $product->category_id)
                ->whereNull('parent_id')
                ->first();

            if ($category) {
                $travelType = $row->attributes['travel_type'] ?? null;
                $locationId = ($travelType === 'departure' || $travelType === 'Transit') 
                    ? $row->attributes['origin'] 
                    : $row->attributes['destination'];

                $location = Location::where('code', $locationId)->first();
                $locationTitle = $location ? $location->title : $row->attributes['origin'];

                $guestCount = $row->attributes['guest'] ?? 0;
                $formattedPrice = number_format($row->price, 2);

                $cartData[] = [
                    'product_title' => $product->title,
                    'category_title' => $category->title,
                    'location_title' => $locationTitle,
                    'guest_count' => $guestCount,
                    'service_type' => $product->service_type,
                    'set_date' => $row->attributes['setdate'] ?? null,
                    'total_price' => $formattedPrice,
                ];
            }
        }
    }

    return response()->json(['cart_items' => $cartData]);
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
                        'category' => $product->productData->product_categories->pluck('title'),
                        'package' => ucfirst($product->productData->title),
                        'travel_type' => $product->travel_type ? ucfirst($product->travel_type) : null,
                        'origin' => $product->origin,
                        'destination' => $product->destination,
                        'guest_count' => $product->guest ?? 'Not available',
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
                'totalguest' => $guestCount,
                'origin' => $data['origin'],
                'destination' => $data['destination'],
                'flight_number' => $data['flight_number'],
                'travel_sector' => $data['travel_sector'],
                'entry_date' => $data['datepicker'],
                'travel_type' => $data['travel_type'],
                'adults' => $data['adults'],
                'infants' => $data['infants'],
                'children' => $data['children'],
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
            'set_date' => $data['datepickert'],
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
            'location_title' => $product->location_title,
            'total_amount' => $totalAmount,
            'entry_date' => $data['entry_date'] ?? '',
            'total_guest' => $data['adults'],
            'origin' => $data['origin'],
            'destination' => $data['destination'],
            'flight_number' => $data['flight_number'],
            'travel_type' => 'departure',
            'meet_guest' => 1,
        ];
    }

    // Return API response
    return response()->json([
        'status' => 'success',
        'category_title' => $categoryTitle,
        'total_amounts' => $result
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
            'setdate' => $setdate,
            'total_guest' => $guest,
            'origin' => $data['origin'],
            'destination' => $data['destination'],
            'flight_number' => $data['flight_number'],
            'terminal' => $data['terminal'],
            'meet_guestn' => 1
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
            'location_title' => $product->location_title,
            'total_amount' => $totalAmount,
            'setdate' => $entryDate,
            'total_guest' => $guest,
            'origin' => $data['origin'],
            'terminal' => $data['terminal'],
            'entry_date' => $entryDate,
            'entry_time' => $data['entry_time'],
            'meet_guestn' => 1
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
            'product_id' => $product->id,
            'location_title' => $product->location_title,
            'total_amount' => $totalAmount, // Total amount after applying pricing rules
            'entry_date' => $data['entry_date'],
            'exit_date' => $data['exit_date'],
            'entry_time' => $data['entry_time'],
            'exit_time' => $data['exit_time'],
            'origin' => $data['origin'],
            'terminal' => $data['terminal'],
            'totalguest' => $data['count'],
            'meet_guestn' => 1
        ];
    }

    // Return the data in a JSON response (no session involved)
    return response()->json([
        'success' => true,
        'message' => 'Packages found successfully.',
        'data' => $result,
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
            'location_title' => $product->location_title,
            'total_amount' => $totalAmount,
            'setdate' => $data['entry_date'] ?? null,
            'totalguest' => $data['count'],
            'origin' => $data['origin'],
            'destination' => $data['destination'],
            'flight_number' => $data['flight_number'],
            'travel_sector' => $data['travel_sector'],
            'entry_date' => $data['entry_date'] ?? null,
            'travel_type' => $data['travel_type'],
            'porter_count' => $data['count'],
            'meet_guestn' => 1
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
    // Fetch locations from the database
    $locationsFromDb = DB::table('international_airport')
        ->select('faa', 'name')
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
            'location_title' => $product->location_title,
            'total_amount' => $totalAmount, // Use the calculated total amount
            'setdate' => $data['entry_date'],
            'totalguest' => $data['count'],
            'origin' => $data['origin'],
            'terminal' => $data['terminal'],
            'entry_date' => $data['entry_date'],
            'exit_date' => $data['exit_date'],
            'entry_time' => $data['entry_time'],
            'exit_time' => $data['exit_time'],
            'bag_count' => $data['count'],
            'meet_guestn' => 1
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

        // Return data as JSON response
        return response()->json([
            'success' => true,
            'data' => [
                'category' => $category,
               
                'locations' => $locations,
               
                
                'Howitworks' => $subcategories,
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



}
