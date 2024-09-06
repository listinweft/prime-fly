<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\About;
use App\Models\AboutFeature;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Currency;
use App\Models\Category;
use App\Models\Homecollection;
use App\Models\Color;
use App\Models\Latest;
use App\Models\ContactAddress;
use App\Models\Deal;
use App\Models\Enquiry;
use App\Models\Location;
use App\Models\CurrencyRate;
use App\Models\History;
use App\Models\HomeAdvertisement;
use App\Models\HomeBanner;
use App\Models\HomeGetQuote;
use App\Models\HomeHeading;
use App\Models\HotDeal;
use App\Models\LocationGallery;
use App\Models\KeyFeature;
use App\Models\Newsletter;
use App\Models\Offer;
use App\Models\OfferStrip;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\ProductReview;
use App\Models\ProductSpecificationHead;
use App\Models\ProductType;
use App\Models\Size;
use App\Models\Comment;
use App\Models\SeoData;
use App\Models\SiteInformation;
use App\Models\Tag;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Event;
use App\Models\Journal;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\CustomerAddress;
use App\Models\OrderCustomer;
use DateTime;
use PDF;


class WebController extends Controller
{
    public function __construct()
    {
        return $site = Helper::commonData();
        
    }

    public function seo_content($page)
    {
        $seo_data = SeoData::page($page)->first();
        return $seo_data;
    }

    



   

    public function home()
    {
      

        $seo_data = $this->seo_content('Home');
        $locations = Location::active()->get();
        $blogs = Blog::active()->latest()->take(3)->get();

        $categorys = Category::whereNull('parent_id')->orderBy('sort_order')->get();
        
        $testimonials = Testimonial::active()->get();
        $locationsall = Location::active()->get();
       
        return view('web.home', compact('seo_data', 'blogs','locations','categorys','testimonials','locationsall'));
    }

    public function proxy(Request $request)
    {
        $url = $request->input('url'); // Access 'url' parameter from the request data
        $response = Http::get($url);

        return $response->json();
    }
  

    public function showInvoice($order_id)
    {


        $user = Auth::guard('customer')->user();
                  $customer = $user->customer;


       
        PDF::setOptions([
            'dpi' => 150,
            'defaultFont' => 'sans-serif', // Replace with your custom font if used
        ]);
        $order = Order::where('id', $order_id)
        ->where('payment_mode', 'Success')
        ->with(['orderProducts' => function ($query) {
            $query->with('productData')
                ->with('colorData');
        }])
        ->firstOrFail();
    
                        $pdf = PDF::loadView('web.invoices', compact('order', 'customer','user')); // Assuming 'invoice.blade.php' is your PDF view

        return $pdf->download('invoice_'.$order->order_code.'.pdf');

    }



    public function locations()
    {
        $locations = Location::active()->get();

        return view('web.locations',compact('locations'));
    }

    public function services()
    {
        $categorys = Category::whereNull('parent_id')->get();

        return view('web.services',compact('categorys'));
    }


//     public function getLocations_meet(Request $request)
//     {

       
//         $travelSector = $request->input('travel_type');

//         $sector = $request->input('sector');
//         $category = $request->input('category');
    
//         $products = Product::where('category_id', $category)->where('service_type',$travelSector)->get();
    
//         $allLocationIds = [];
//         foreach ($products as $product) {
//             $locationIds = explode(',', $product->location_id);
//             $allLocationIds = array_merge($allLocationIds, $locationIds);
//         }
//         $uniqueLocationIds = array_unique($allLocationIds);
//         $locationsspecific = Location::active()->whereIn('id', $uniqueLocationIds)->get();

//         $mappedLocations = $locationsspecific->map(function ($location) {
//             return [
//                 'fs' => $location->code, // Assuming 'code' in DB corresponds to 'faa'
//                 'city' => $location->title // Assuming 'title' in DB corresponds to 'name'
//             ];
//         });
    
//         $origins = [];
//         $destinations = [];

// if ($sector =="international" )

// {


//     $apiUrl = 'https://api.flightstats.com/flex/airports/rest/v1/json/active?appId=6afbf6ac&appKey=+6d35112e08773c372901b6ba27a58a25';
    


// }

// else

// {


//     $apiUrl = 'https://api.flightstats.com/flex/airports/rest/v1/json/countryCode/IN?appId=6afbf6ac&appKey=+6d35112e08773c372901b6ba27a58a25';


//     $responsedata = Http::get($apiUrl);

//         $data = $responsedata->json();

//         // Handle the data from API response
//         $locationsFromApi = $data['airports'] ?? [];
    


// }
       
       

        
//         if ($travelSector == 'departure') {
//             $origins = $mappedLocations;
//             $destinations = $locationsFromApi;
//         } elseif ($travelSector == 'arrival') {
//             $origins = $locationsFromApi;
//             $destinations = $mappedLocations;
//         }


    
//         return response()->json(['origins' => $origins, 'destinations' => $destinations,'type'=>$travelSector]);
//     }

public function getLocationsMeetTransit(Request $request)
{
    $sector = $request->input('sector');
    $origins = [];
    $destinations = [];

    // API URL
    $apiUrl = 'https://api.flightstats.com/flex/airports/rest/v1/json/countryCode/IN?appId=6afbf6ac&appKey=6d35112e08773c372901b6ba27a58a25';

    // Fetch data from API
    $responsedata = Http::get($apiUrl);
    
    // Check if the request was successful
    if ($responsedata->successful()) {
        $data = $responsedata->json();
        $locationsFromApi = $data['airports'] ?? [];
        
        // Map the API response data
        $domesticlocations = array_map(function ($location) {
            return [
                'fs' => $location['fs'],  // FAA code
                'city' => $location['city'] // City name
            ];
        }, $locationsFromApi);
    } else {
        // Handle the API request failure
        $domesticlocations = [];
    }

    // Fetch locations from the international_airports table
    $locationsFromDb = DB::table('international_airport')
        ->select('faa', 'name')
        ->get()
        ->map(function ($location) {
            return [
                'fs' => $location->faa,  // FAA code
                'city' => $location->name // Name
            ];
        });

    // Determine origins and destinations based on the sector
    if ($sector == "domestic_to_domestic") {
        $origins = $domesticlocations;
        $destinations = $domesticlocations;
    } elseif ($sector == "domestic_to_international") {
        $origins = $domesticlocations;
        $destinations = $locationsFromDb;
    } elseif ($sector == "international_to_domestic") {
        $origins = $locationsFromDb;
        $destinations = $domesticlocations;
    } else {
        $origins = $locationsFromDb;
        $destinations = $locationsFromDb;
    }

    return response()->json([
        'origins' => $origins,
        'destinations' => $destinations,
        'type' => $sector
    ]);
}


public function getLocations_meet(Request $request)
{
    $travelSector = $request->input('travel_type');
    $sector = $request->input('sector');
    $category = $request->input('category');
    
    $products = Product::where('category_id', $category)->where('service_type', $travelSector)->get();
    
    $allLocationIds = [];
    foreach ($products as $product) {
        $locationIds = explode(',', $product->location_id);
        $allLocationIds = array_merge($allLocationIds, $locationIds);
    }
    $uniqueLocationIds = array_unique($allLocationIds);
    $locationsspecific = Location::active()->whereIn('id', $uniqueLocationIds)->get();

    $mappedLocations = $locationsspecific->map(function ($location) {
        return [
            'fs' => $location->code, // Assuming 'code' in DB corresponds to 'faa'
            'city' => $location->title // Assuming 'title' in DB corresponds to 'name'
        ];
    });

    $origins = [];
    $destinations = [];

    if ($sector == "international") {
        // Fetch locations from the international_airports table
        $locationsFromDb = DB::table('international_airport')
            ->select('faa', 'name')
            ->get()
            ->map(function ($location) {
                return [
                    'fs' => $location->faa,  // FAA code
                    'city' => $location->name // Name
                ];
            });

        // For international sector, use locationsFromDb directly
        if ($travelSector == 'departure') {
            $origins = $mappedLocations;
            $destinations = $locationsFromDb;
        } elseif ($travelSector == 'arrival') {
            $origins = $locationsFromDb;
            $destinations = $mappedLocations;
        }
    } else {
        // Fetch data from API for non-international sector
        $apiUrl = 'https://api.flightstats.com/flex/airports/rest/v1/json/countryCode/IN?appId=6afbf6ac&appKey=6d35112e08773c372901b6ba27a58a25';
        $responsedata = Http::get($apiUrl);
        $data = $responsedata->json();

        // Handle the data from API response
        $locationsFromApi = $data['airports'] ?? [];

       
        if ($travelSector == 'departure') {
            $origins = $mappedLocations;
            $destinations = $locationsFromApi;
        } elseif ($travelSector == 'arrival') {
            $origins = $locationsFromApi;
            $destinations = $mappedLocations;
        }
    }

    return response()->json(['origins' => $origins, 'destinations' => $destinations, 'type' => $travelSector]);
}


        public function getLocations(Request $request)
    {

       
        $travelSector = $request->input('travel_type');

        $sector = $request->input('sector');
        $category = $request->input('category');
    
        $products = Product::where('category_id', $category)->where('service_type',$travelSector)->get();
    
        $allLocationIds = [];
        foreach ($products as $product) {
            $locationIds = explode(',', $product->location_id);
            $allLocationIds = array_merge($allLocationIds, $locationIds);
        }
        $uniqueLocationIds = array_unique($allLocationIds);
        $locationsspecific = Location::active()->whereIn('id', $uniqueLocationIds)->get();

        $mappedLocations = $locationsspecific->map(function ($location) {
            return [
                'fs' => $location->code, // Assuming 'code' in DB corresponds to 'faa'
                'city' => $location->title // Assuming 'title' in DB corresponds to 'name'
            ];
        });
    
        $origins = [];
        $destinations = [];
        $locationsFromDb = DB::table('international_airport')
        ->select('faa', 'name')
        ->get()
        ->map(function ($location) {
            return [
                'fs' => $location->faa,  // FAA code
                'city' => $location->name // Name
            ];
        });


    // if ($travelSector == 'departure')
    //  {
        $origins = $mappedLocations;
        $destinations = $locationsFromDb;
    // } elseif ($travelSector == 'arrival') {
    //     $origins = $locationsFromDb;
    //     $destinations = $mappedLocations;
    // }
    
        return response()->json(['origins' => $origins, 'destinations' => $destinations]);
    }
    public function getLocations_porter(Request $request)
    {
        $travelSector = $request->input('travel_type');

        $sector = $request->input('sector');
        $category = $request->input('category');
    
        $products = Product::where('category_id', $category)->get();
    
        $allLocationIds = [];
        foreach ($products as $product) {
            $locationIds = explode(',', $product->location_id);
            $allLocationIds = array_merge($allLocationIds, $locationIds);
        }
        $uniqueLocationIds = array_unique($allLocationIds);
        $locationsspecific = Location::active()->whereIn('id', $uniqueLocationIds)->get();

        $mappedLocations = $locationsspecific->map(function ($location) {
            return [
                'fs' => $location->code, // Assuming 'code' in DB corresponds to 'faa'
                'city' => $location->title // Assuming 'title' in DB corresponds to 'name'
            ];
        });
    
        $origins = [];
        $destinations = [];

        if ($sector == "international") {
            // Fetch locations from the international_airports table
            $locationsFromDb = DB::table('international_airport')
                ->select('faa', 'name')
                ->get()
                ->map(function ($location) {
                    return [
                        'fs' => $location->faa,  // FAA code
                        'city' => $location->name // Name
                    ];
                });
    
            // For international sector, use locationsFromDb directly
            if ($travelSector == 'departure') {
                $origins = $mappedLocations;
                $destinations = $locationsFromDb;
            } elseif ($travelSector == 'arrival') {
                $origins = $locationsFromDb;
                $destinations = $mappedLocations;
            }
        } else {
            // Fetch data from API for non-international sector
            $apiUrl = 'https://api.flightstats.com/flex/airports/rest/v1/json/countryCode/IN?appId=6afbf6ac&appKey=6d35112e08773c372901b6ba27a58a25';
            $responsedata = Http::get($apiUrl);
            $data = $responsedata->json();
    
            // Handle the data from API response
            $locationsFromApi = $data['airports'] ?? [];
    
            if ($travelSector == 'departure') {
                $origins = $mappedLocations->prepend(['fs' => '', 'city' => 'Select Origin']);
                $destinations = $locationsFromApi;
            } elseif ($travelSector == 'arrival') {
                $origins = $locationsFromApi;
                $destinations = $mappedLocations->prepend(['fs' => '', 'city' => 'Select Destination']);
            }
        }
    
        return response()->json(['origins' => $origins, 'destinations' => $destinations,'type'=>$travelSector]);
    }

     
    public function search_booking_transit(Request $request)
    {
        // Validate request
        $request->validate([
            'datepickert' => 'required',
            'travel_typet' => 'required',
            'travel_sectort' => 'required|string',
            'origint' => 'required',
            'destinationt' => 'required',
            'flight_numbert' => 'required|string',
            'adultst' => 'required|integer|min:1',
            'infantst' => 'required|integer|min:0',
            'childrent' => 'required|integer|min:0',
            'categoryt' => 'required|integer',
             'trans' => 'required'
        ]);
    
        // Collect data
        $data = $request->all();
    
        // Calculate total amounts for all matching products 
        $totalAmounts = $this->calculateTotalAmounts_transit($data);
    
        // Check if totalAmounts is empty
        if (empty($totalAmounts)) {
            return response()->json(['status' => 'error', 'message' => 'No packages found']);
        }
    
        // Pass total amounts to the view
        $category = Category::where('id', $data['categoryt'])->first();
    
        Session::forget('category');
        Session::put('total_amounts', $totalAmounts);
        Session::put('category', $category->title);
    
        return response()->json(['success' => true, 'redirect_url' => route('package')]);
    }
    
    private function calculateTotalAmounts_transit($data)
    {
        // Fetch all products that match the location_id and service_type
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
            ->groupBy('products.id')
            ->get();
    
        // Check if products is empty
        if ($products->isEmpty()) {
            return []; // Return empty array
        }
    
        $result = [];
        $guestCount = $data['adultst'] + $data['infantst'] + $data['childrent'];
      
    
        foreach ($products as $product) {
            if (Auth::guard('customer')->check() && Auth::guard('customer')->user()->btype == 'b2b'){
                $user = Auth::guard('customer')->user();
                $userId = $user->id;
                $adultPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 1)->where('user_id', $userId)->value('price') ?? $product->price;
                $childrenPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 2)->where('user_id', $userId)->value('price') ?? ProductPrice::where('product_id', $product->id)->where('size_id', 2)->value('price') ?? 0;
                $infantPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 3)->where('user_id', $userId)->value('price') ?? ProductPrice::where('product_id', $product->id)->where('size_id', 3)->value('price') ?? 0;
                $additionalPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 4)->where('user_id', $userId)->value('price') ?? $product->additional_price;

                //  if (is_null($adultPrice) ) {
                //     return []; // No packages found
                // }
            } else {
                $adultPrice =  ProductPrice::where('product_id', $product->id)->where('size_id', 1)->value('price') ?? 0;
                $childrenPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 2)->value('price') ?? 0;
                $infantPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 3)->value('price') ?? 0;
                $additionalPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 4)->value('price') ?? 0;
            }
    
            if ($data['adultst'] == 1) {
                // Calculate the total amount based on guest count
                $totalAmount = ($data['adultst'] * $adultPrice) + ($data['infantst'] * $infantPrice) + ($data['childrent'] * $childrenPrice);
            } else {
                $additionalAdults = $data['adultst'] - 1;
                $totalAmount = ($additionalAdults * $additionalPrice) + ($data['infantst'] * $infantPrice) + ($data['childrent'] * $childrenPrice + $adultPrice);
            }

            if (isset($data['travel_sectort'])) {
                // Replace underscores with spaces
                $data['travel_sectort'] = str_replace('_', ' ', $data['travel_sectort']);
            }
    
            $result[] = [
                'product' => $product,
                'location_title' => $product->location_title,
                'location_code' => $product->location_code, // Include location code here
                'total_amount' => $totalAmount,
                'setdate' => $data['datepickert'],
                'totalguest' => $guestCount,
                'origin' => $data['origint'],
                'trans' => $data['trans'],
                'destination' => $data['destinationt'],
                'flight_number' => $data['flight_numbert'],
                'travel_sector' => $data['travel_sectort'],
                'entry_date' => $data['datepickert'],
                'travel_type' => "Transit",
                'adults' => $data['adultst'],
                'infants' => $data['infantst'],
                'children' => $data['childrent'],
                'pnr' => isset($data['pnr']) ? $data['pnr'] : '',
                'meet_guest' => $guestCount
            ];
        }
    
        return $result; // Return an array of results
    }
    
    public function search_booking(Request $request)
    {
        // Validate request
        $request->validate([
            'datepicker' => 'required',
            'travel_type' => 'required',
            'travel_sector' => 'required|string',
            'origin' => 'required',
            'destination' => 'required',
            'flight_number' => 'required|string',
            'adults' => 'required|integer|min:1',
            'infants' => 'required|integer|min:0',
            'children' => 'required|integer|min:0',
            'category' => 'required|integer'
        ]);
    
        // Collect data
        $data = $request->all();
    
        // Calculate total amounts for all matching products 
         $totalAmounts = $this->calculateTotalAmounts($data);
    
        // Check if totalAmounts is empty
        if (empty($totalAmounts)) {
            return response()->json(['status' => 'error', 'message' => 'No packages found']);
        }
    
        // Pass total amounts to the view
        $category = Category::where('id', $data['category'])->first();
    
        Session::forget('category');
        Session::put('total_amounts', $totalAmounts);
        Session::put('category', $category->title);
    
        return response()->json(['success' => true, 'redirect_url' => route('package')]);
    }
    
    private function calculateTotalAmounts($data)
    {
        // Fetch all products that match the location_id and service_type
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
            ->groupBy('products.id')
            ->get();
    
        // Check if products is empty
        // if ($products->isEmpty()) {
        //     return []; // Return empty array
        // }
    
        $result = [];
        $guestCount = $data['adults'] + $data['infants'] + $data['children'];

        
    
        
        foreach ($products as $product) {

        if (Auth::guard('customer')->check() && Auth::guard('customer')->user()->btype == 'b2b'){
            $user = Auth::guard('customer')->user();
                $userId = $user->id;
                $adultPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 1)->where('user_id', $userId)->value('price') ?? $product->price;
                $childrenPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 2)->where('user_id', $userId)->value('price') ?? ProductPrice::where('product_id', $product->id)->where('size_id', 2)->value('price') ?? 0;
                $infantPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 3)->where('user_id', $userId)->value('price') ?? ProductPrice::where('product_id', $product->id)->where('size_id', 3)->value('price') ?? 0;
                $additionalPrice = DB::table('product_offer_size')->where('product_id', $product->id)->where('size_id', 4)->where('user_id', $userId)->value('price') ?? $product->additional_price;

                if (is_null($adultPrice) ) {
                    return []; // No packages found
                }
            } else {
                $adultPrice =  ProductPrice::where('product_id', $product->id)->where('size_id', 1)->value('price') ?? 0;
                $childrenPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 2)->value('price') ?? 0;
                $infantPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 3)->value('price') ?? 0;
                $additionalPrice = ProductPrice::where('product_id', $product->id)->where('size_id', 4)->value('price') ?? 0;
            }
    
            if ($data['adults'] == 1) {
                // Calculate the total amount based on guest count
                $totalAmount = ($data['adults'] * $adultPrice) + ($data['infants'] * $infantPrice) + ($data['children'] * $childrenPrice);
            } else {
                $additionalAdults = $data['adults'] - 1;
                $totalAmount = ($additionalAdults * $additionalPrice) + ($data['infants'] * $infantPrice) + ($data['children'] * $childrenPrice + $adultPrice);
            }
    


            if ($totalAmount <= 0) {
                continue;
            }

            
            $result[] = [
                'product' => $product,
                'location_title' => $product->location_title,
                'location_code' => $product->location_code, // Include location code here
                'total_amount' => $totalAmount,
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
                'pnr' => isset($data['pnr']) ? $data['pnr'] : '',
                'meet_guest' => $guestCount
            ];
        }
    
        return $result; // Return an array of results
    }
    
    
    
    


    public function search_booking_baggage(Request $request)
{
    // Validate request
    $request->validate([
        'terminal' => 'required',
        'origin' => 'required',
        'destination' => 'required',
        'flight_number' => 'required|string',
        'adults' => 'required|integer',
        'category' => 'required|integer'
    ]);

    // Collect data
    $data = $request->all();

    // Fetch products based on travel type and locations

    $location = Location::where('code', $data['origin'])->first();
    $locationId = $location ? $location->id : null;


    $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
        })
        ->where('products.category_id', $data['category']) // Add category filter
        // ->where('products.service_type', 'departure') // Ensure this checks the correct service type
        ->where('locations.id', $locationId)
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

            
        if (Auth::guard('customer')->check() && Auth::guard('customer')->user()->btype == 'b2b'){
            $user = Auth::guard('customer')->user();

            $offer = Offer::where('product_id', $product->id)
                ->where('user_id', $user->id)
                ->first();

            if ($offer) {
                $totalAmount = $data['adults'] * $offer->price;
                
            } else {
                // Use default pricing if no offer found
                return response()->json(['status' => 'error', 'message' => 'No packages found']);
               
            }
        } else {
            // Use default pricing for non-authenticated or non-B2B users
            $totalAmount = $data['adults'] * $product->price;
           
        }

        $result[] = [
            'product' => $product,
            'location_title' => $product->location_title,
            'total_amount' => $totalAmount, // Add total amount to the result array
            'setdate' => $setdate,
            'totalguest' => $guest,
            'origin' => $data['origin'],
            'destination' => $data['destination'],
            'flight_number' => $data['flight_number'],
            'terminal' => $data['terminal'],
            'meet_guestn' => 1
           
            
        ];
    }

    
    Session::forget('category');
     Session::put('total_amounts', $result);
     Session::put('category', $category->title);


    

    return response()->json(['success' => true, 'redirect_url' => route('package')]);
}


public function search_booking_lounch(Request $request)
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

     $location = Location::where('code', $data['origin'])->first();
      $locationId = $location ? $location->id : null;

    // Fetch products based on travel type and locations
    $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
        })
        ->where('products.category_id', $data['category']) // Add category filter
        // ->where('products.service_type', 'departure') // Ensure this checks the correct service type
        ->where('locations.id', $locationId)
        ->groupBy('products.id')
        ->get();

    // Check if products are found
    if ($products->isEmpty()) {
        return response()->json(['status' => 'error', 'message' => 'No packages found']);
    }

    // Initialize result array
    $result = [];

    // Fetch category title
    $category = Category::where('id', $data['category'])->first();

    foreach ($products as $product) {
       
        if (Auth::guard('customer')->check() && Auth::guard('customer')->user()->btype == 'b2b'){
            $user = Auth::guard('customer')->user();


            $offer = Offer::where('product_id', $product->id)
                ->where('user_id', $user->id)
                ->first();

            if ($offer) {
                $totalAmount = $data['adults'] * $offer->price;
            } else {
                // Use default pricing if no offer found
                return response()->json(['status' => 'error', 'message' => 'No packages found']);
            }
        } else {
            // Use default pricing for non-authenticated or non-B2B users
            $totalAmount = $data['adults'] * $product->price;
        }

        // Prepare result array for each product
        $result[] = [
            'product' => $product,
            'location_title' => $product->location_title,
            'total_amount' => $totalAmount,
            'setdate' => $data['entry_date'],
                'totalguest' => $data['adults'],
                'origin' => $data['origin'],
                'destination' => $data['destination'],
                'flight_number' => $data['flight_number'],
               
                'entry_date' => $data['entry_date'],
                'travel_type' => 'departure',
                'meet_guestn' => 1
        ];
    }
    Session::forget('category');
    // Return JSON response with success flag, total amounts, and category title
    Session::put('total_amounts', $result);
     Session::put('category', $category->title);


    

    return response()->json(['success' => true, 'redirect_url' => route('package')]);
}


    public function search_booking_porter(Request $request)
    {

       
        // Validate request
        $request->validate([
            'travel_type' => 'required',
            'travel_sector' => 'required|string',
            'origin' => 'required',
            'destination' => 'required',
            'flight_number' => 'required|string',
            'count' => 'required|integer',
            'category' => 'required|integer'
        ]);
    
        // Collect data
       $data = $request->all();
    
        // Fetch products based on travel type and locations
        $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) use ($data) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
        })
        ->when($data['travel_type'] == "departure", function ($query) use ($data, &$locationId) {
            $locationId = Location::where('code', $data['origin'])->value('id');
        })
        ->when(in_array($data['travel_type'], ["arrival", "transit_type"]), function ($query) use ($data, &$locationId) {
            $locationId = Location::where('code', $data['destination'])->value('id');
        })
        ->where(function($query) use (&$locationId) {
            if ($locationId) {
                $query->where('locations.id', $locationId);
            }
        })
        ->where('products.category_id', $data['category'])
        ->groupBy('products.id')
        ->get();
    
    
        // Check if products are found
        if ($products->isEmpty()) {
            return response()->json(['status' => 'error', 'message' => 'No packages found']);
        }
    
        $category = Category::where('id', $data['category'])->first();
    
        // Initialize result array
        $result = [];
    
        foreach ($products as $product) {
            // Fetch B2B pricing details if user is authenticated and B2B type
         
            
        if (Auth::guard('customer')->check() && Auth::guard('customer')->user()->btype == 'b2b'){
            $user = Auth::guard('customer')->user();

                $offer = Offer::where('product_id', $product->id)
                    ->where('user_id', $user->id)
                    ->first();
    
                if ($offer) {
                    $totalAmount = $data['count'] * $offer->price;
                } else {
                    // Use default pricing if no offer found
                    // $totalAmount = $data['count'] * $product->price;
                    return response()->json(['status' => 'error', 'message' => 'No packages found']);
                }
            } else {
                // Use default pricing for non-authenticated or non-B2B users
                $totalAmount = $data['count'] * $product->price;
            }
    
            // Prepare result array for each product
            $result[] = [
                'product' => $product,
                'location_title' => $product->location_title,
                'total_amount' => $totalAmount,
                'setdate' => $data['entry_date'],
                'totalguest' => $data['count'],
                'origin' => $data['origin'],
                'destination' => $data['destination'],
                'flight_number' => $data['flight_number'],
                'travel_sector' => $data['travel_sector'],
                'entry_date' => $data['entry_date'],
                'travel_type' => $data['travel_type'],
                'porter_count' => $data['count'],
                'meet_guestn' => 1
                
            ];
        }
        Session::forget('category');
        // Return JSON response with success flag, total amounts, and category title
        Session::put('total_amounts', $result);
        Session::put('category', $category->title);
   
   
       
   
       return response()->json(['success' => true, 'redirect_url' => route('package')]);
    }
    



    public function search_booking_entry_ticket(Request $request)
    {
        // Validate request

      
        $request->validate([
            'terminal' => 'required|string',
            'origin' => 'required',
            'count' => 'required|integer',
            'category' => 'required|integer',
            // 'entry_time' => 'required',
            // 'exit_time' => 'required'
        ]);
    
        // Collect data
        $data = $request->all();
    
        // Fetch products based on travel type and locations
        $products = Product::select('products.*', 'locations.title as location_title')
            ->join('locations', function ($join) {
                $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
            })
            ->where('products.category_id', $data['category']) // Add category filter
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
            // Default pricing for non-B2B users
            $ticketPrice = $product->price;
    
            // Check if the user is authenticated and is a B2B type
                
        if (Auth::guard('customer')->check() && Auth::guard('customer')->user()->btype == 'b2b'){
            $user = Auth::guard('customer')->user();

                $offer = Offer::where('product_id', $product->id)
                    ->where('user_id', $user->id)
                    ->first();
    
                // Use B2B pricing if available
                if ($offer) {
                    $ticketPrice = $offer->price;
                }
                else {
                    // If no offer is available for B2B user, return error
                    return response()->json(['status' => 'error', 'message' => 'No packages found']);
                }
            }
    
            // Calculate total amount based on count and adjusted price
            $totalAmount = $data['count'] * $ticketPrice;
    
            $result[] = [
                'product' => $product,
                'location_title' => $product->location_title,
                'total_amount' => $totalAmount, // Add total amount to the result array
                'setdate' => $entryDate,
                'totalguest' => $guest,
                'origin' => $data['origin'],
                'terminal' => $data['terminal'],
                'entry_date' => $entryDate,
                // 'exit_date' => $data['exit_date'],
                'entry_time' => $data['entry_time'],
                // 'exit_time' => $data['exit_time'],
                'meet_guestn' => 1
            ];
        }
        Session::forget('category');
        Session::put('total_amounts', $result);
     Session::put('category', $category->title);


    

    return response()->json(['success' => true, 'redirect_url' => route('package')]);
    }
    
    

    public function search_booking_cloakroom(Request $request)
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
            ->groupBy('products.id')
            ->get();
    
        if ($products->isEmpty()) {
            return response()->json(['status' => 'error', 'message' => 'No packages found']);
        }
    
        $result = [];
        $category = Category::where('id', $data['category'])->first();
    
        foreach ($products as $product) {
            // Fetch default pricing details from product
            $basePrice = $product->price; // Assuming the column name is price
            $additionalHourPrice = $product->additional_hourly_price ?? 0; // Assuming the column name is additional_hourly_price
            $additionalBagPrice = $product->additional_price ?? 0; // Assuming the column name is additional_price
    
            // Check if the user is authenticated and B2B
                
        if (Auth::guard('customer')->check() && Auth::guard('customer')->user()->btype == 'b2b'){
            $user = Auth::guard('customer')->user();
                $offer = Offer::where('product_id', $product->id)
                    ->where('user_id', $user->id)
                    ->first();
    
                if ($offer) {
                    $totalAmount = $data['count'] * $offer->price; // Use offer price if available
                    $additionalHourPrice = $offer->additional_hourly_price ?? $additionalHourPrice;
                    $additionalBagPrice = $offer->additional_price ?? $additionalBagPrice;
                } else {
                    // $totalAmount = $basePrice; // Use default base price if no offer found

                    return response()->json(['status' => 'error', 'message' => 'No packages found']);
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
    
        Session::put('total_amounts', $result);
     Session::put('category', $category->title);


    

    return response()->json(['success' => true, 'redirect_url' => route('package')]);
    }

    public function search_booking_carparking(Request $request)
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
            ->groupBy('products.id')
            ->get();
    
        if ($products->isEmpty()) {
            return response()->json(['status' => 'error', 'message' => 'No packages found']);
        }
    
        $result = [];
        $category = Category::where('id', $data['category'])->first();
    
        foreach ($products as $product) {
            // Fetch default pricing details from product
            $basePrice = $product->price; // Assuming the column name is price
            $additionalHourPrice = $product->additional_hourly_price ?? 0; // Assuming the column name is additional_hourly_price
            $additionalBagPrice = $product->additional_price ?? 0; // Assuming the column name is additional_price
    
            // Check if the user is authenticated and B2B
               
        if (Auth::guard('customer')->check() && Auth::guard('customer')->user()->btype == 'b2b'){
            $user = Auth::guard('customer')->user();
                $offer = Offer::where('product_id', $product->id)
                    ->where('user_id', $user->id)
                    ->first();
    
                if ($offer) {
                    // $totalAmount = $data['count'] * $offer->price; // Use offer price if available
                    $totalAmount =  $offer->price; // Use offer price if available
                    $additionalHourPrice = $offer->additional_hourly_price ?? $additionalHourPrice;
                    $additionalBagPrice = $offer->additional_price ?? $additionalBagPrice;
                } else {
                    return response()->json(['status' => 'error', 'message' => 'No packages found']);
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
                'meet_guestn' => 1
               
            ];
        }
    
        Session::put('total_amounts', $result);
     Session::put('category', $category->title);


    

    return response()->json(['success' => true, 'redirect_url' => route('package')]);
    }
    
    public function package()
    {

       
        // Retrieve data from session
        $totalAmounts = Session::get('total_amounts', null);
        $categorys = Session::get('category', null);
    
        // Handle if the total amounts data is not available
        if (is_null($totalAmounts)) {
            return redirect()->back()->with('error', 'Invalid or missing total amounts data.');
        }
    
        // Pass the total amounts to the view
        return view('web.package', compact('totalAmounts', 'categorys'));
    }
    
    
    

    public function service_detail($short_url)
    {
        
        $category = Category::active()->shortUrl($short_url)->first();

        if ($category) {


       
            $products = Product::where('category_id', $category->id)->get();

            // Fetch unique location ids from products
            $allLocationIds = [];

            // Loop through each product to handle multiple locations
            foreach ($products as $product) {
                // Split location IDs if there are multiple ones
                $locationIds = explode(',', $product->location_id);
    
                // Merge with existing IDs (ensures all are unique)
                $allLocationIds = array_merge($allLocationIds, $locationIds);
            }
    
            // Filter to unique values maintaining keys
             $uniqueLocationIds = array_unique($allLocationIds);
    
            // Fetch locations associated with these location ids
            $locations = Location::active()->whereIn('id', $uniqueLocationIds)->get();
            $locationsall = Location::active()->get();
           $blogs = Blog::active()->get();
           $testimonials = Testimonial::active()->get();
           $subcategories = Category::where('parent_id',$category->id)->active()->get();
       
        return view('web.service_detail', compact('blogs','locations','testimonials','category','subcategories','locationsall'));

        }
    }
    
    
  
    public function main_search(Request $request)
    {
        // $searchResult = array();
        // $products = Product::active()->where('title', 'LIKE', "%{$request->search_param}%")->get();


        $searchResult = array();
    
               
                $blogs = Blog::active()->Where('title', 'LIKE', "%{$request->search_param}%")->get();
        if ($blogs->isNotEmpty()) {
            foreach ($blogs as $blog) {
                
                $searchResult[] = array("id" => $blog->id, "title" => $blog->title,  'image' => ($blog->thumbnail_image != NULL && File::exists(public_path($blog->thumbnail_image))) ? asset($blog->thumbnail_image) : asset('frontend/images/default-image.jpg'), 'link' => url('blog/' . $blog->short_url));
            }
        }
        return response()->json(['status' => true, 'message' => $searchResult]);
    }
    public function main_search_journal(Request $request)
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
    public function main_search_event(Request $request)
    {
        // $searchResult = array();
        // $products = Product::active()->where('title', 'LIKE', "%{$request->search_param}%")->get();


        $searchResult = array();
    
               
                $blogs = Event::active()->Where('title', 'LIKE', "%{$request->search_param}%")->get();
        if ($blogs->isNotEmpty()) {
            foreach ($blogs as $blog) {
                
                $searchResult[] = array("id" => $blog->id, "title" => $blog->title,  'image' => ($blog->thumbnail_image != NULL && File::exists(public_path($blog->thumbnail_image))) ? asset($blog->thumbnail_image) : asset('frontend/images/default-image.jpg'), 'link' => url('event/' . $blog->short_url));
            }
        }
        return response()->json(['status' => true, 'message' => $searchResult]);
    }


    public function about()
    {


        
  
   

        return view('web.about');
    }


    public function contact()
    {
        $seo_data = $this->seo_content('Contact');
        $contact = SiteInformation::first();
          $contactAddresses = ContactAddress::active()->get();
        $banner = Banner::type('contact')->first();
        return view('web.contact', compact('seo_data', 'contact', 'banner', 'contactAddresses'));
    }

             


    public function support()
    {
       

        $categorys = Category::whereNull('parent_id')->get();
        return view('web.support',compact('categorys'));
    }

    //enquiry and bulk enquiry storing
    public function enquiry_store(Request $request)
    {

       
        $request->validate([
            'firstname' => 'required|regex:/^[\pL\s]+$/u|min:2|max:60',
            'email' => 'required|email|max:255',
             'phone' => 'required|regex:/^([0-9\+]*)$/|min:7|max:20',
           
        ]);

        $contact = new Enquiry();


        $contact->type = $request->type;
        $contact->name = $request->firstname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
       
        $contact->message = $request->message ?? NULL;
        $contact->product_type_id = $request->product_type_id ?? NULL;
        $contact->size_id = $request->size_id ?? NULL;
        $contact->frame_id = $request->frame_id ?? NULL;
        $contact->mount = $request->mount ?? NULL;
      
        $contact->request_url = url()->previous();


       
            $type = ' Contact request';
    
        if ($contact->save()) {

            $sendContactMail = Helper::sendContactMail($contact, $type);
            if ($sendContactMail) {

                return response()->json(['status' => 'success',
                    'message' => "Contact request has been submitted successfully,Can't sent the mail right now"]);

                
            } 
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error : Error while submitting the request']);
        }
    }


    public function blogs()
    {
        $banner = Banner::type('blogs')->first();
         $heading = HomeHeading::type('blog')->first();
        $seo_data = $this->seo_content('Blogs');
        $latestBlog = Blog::active()->latest('posted_date')->first();

        $latestThreeBlogs = Blog::active()->take(3)->latest('posted_date')->get();

        $totalBlog = Blog::active()->count();

        $condition = Blog::active()->latest('posted_date');

        $blogs = $condition->take(3)->get();
        $offset = $blogs->count() + 0;
        $loading_limit = 3;
        return view('web.blogs', compact('seo_data', 'banner', 'latestBlog', 'heading',
            'blogs', 'totalBlog', 'offset', 'loading_limit','latestThreeBlogs'));
    }


  
    public function blogLoadMore(Request $request)
    {
        $offset = $request->offset;
        $loading_limit = $request->loading_limit;
        $condition = Blog::active()->latest('posted_date');
        $totalBlog = $condition->count();
        $blogs = $condition->latest('posted_date')->skip($offset)->take($loading_limit)->get();
        $offset += $blogs->count();

        return view('web._blog_list', compact('blogs', 'loading_limit', 'totalBlog', 'offset', 'blogs'));
    }

    public function blog_detail($short_url)
    {
         $blog = Blog::active()->shortUrl($short_url)->first();
       
         
        if ($blog) {
            $banner = $seo_data = $blog;
            $type = $short_url;
            $recentBlogs = Blog::active()->latest('posted_date')->limit(3)->where('id', '!=', $blog->id)->get();
            $latestBlogs = Blog::active()->latest('posted_date')->limit(4)->where('id', '!=', $blog->id)->get();
         

            


           

            return view('web.blog', compact('blog', 'recentBlogs', 'banner', 'seo_data',
                'latestBlogs','type'));
        
         

    }

    }
 

    public function location_detail($short_url)
    {
          $blog = Location::where('title',$short_url)->first();
       
         
        if ($blog) {
           
            $type = $blog->title;

            
            $categorys = $blog->categories();
            $faqs = Faq::active()->latest()->take(5)->get();

             $gallery = LocationGallery::where('location_id',$blog->id)->get();

           
            return view('web.location', compact('blog', 'type','categorys','faqs','gallery'));
        
         

    }
    
    }
  


    public function products()
    {



        $banner = Banner::type('product')->first();
        $seo_data = $this->seo_content('Products');
       $parentCategories = Category::active()->isParent()->with('activeChildren')->get();
        $condition = Product::active()->where('copy','no');

         $totalProducts = $condition->count();
        $products = $condition->latest()->take(12)->get();
        $colors = Color::active()->oldest('title')->get();
        $shapes = Shape::latest()->get();
        $tags = Tag::latest()->get();
        $shapescount = count($shapes);
        $offset = $products->count();
        $loading_limit = 15;
        $type = "product";
        $typeValue = 'all';
        $sort_value = 'latest';
        $title = 'Products';
        $latestProducts = Product::active()->take(5)->latest()->get();
        return view('web.products', compact('seo_data', 'products', 'totalProducts', 'offset', 'loading_limit',
            'parentCategories', 'colors', 'banner', 'type', 'typeValue', 'latestProducts',
            'title', 'sort_value','shapes','tags','shapescount'));
    }


   
   
    public function deal($short_url)
    {
        if ($short_url) {
            $deal = Deal::active()->shortUrl($short_url)->first();
            if ($deal) {
                $seo_data = $deal;
                $banner = $deal;
                $parentCategories = Category::active()->isParent()->get();
                $condition = Product::active()->whereIn('id', explode(',', $deal->products))->where('copy','no');
                $totalProducts = $condition->count();
                $products = $condition->latest()->take(12)->get();
                $colors = Color::active()->get();
                $offset = $products->count();
                $loading_limit = 15;
                $type = "deal";
                $typeId = $deal->id;
                $typeValue = $short_url;
                $sort_value = 'latest';
                $title = ucfirst($deal->title);
                $latestProducts = Product::active()->whereIn('id', explode(',', $deal->products))->take(5)->latest()->get();
                return view('web.products', compact('products', 'totalProducts', 'offset',
                    'loading_limit', 'parentCategories', 'colors', 'seo_data', 'banner',
                    'type', 'typeValue', 'latestProducts', 'sort_value', 'title'));
            } else {
                return view('web.404');
            }
        } else {
            return view('web.404');
        }
    }

   


  
    public function reviewLoadMore(Request $request)
    {
        $product = Product::active()->where('id', $request->product_id)->first();
        $review_offset = $request->review_offset;
        $reviews = $product->activeReviews;
        $totalRatings = $reviews->count();
        $reviews = $reviews->skip($review_offset)->take(3);
        $review_offset += $reviews->count();

        return view('web.includes._review_inner', compact('reviews', 'totalRatings', 'review_offset'));
    }

    public function submit_review(Request $request)
    {
        // dd($request->all());
        if (Auth::guard('customer')->check()) {
            $request->validate([
                'rating' => 'required',
            ]);
            $email = Auth::guard('customer')->user()->email;
            $name = Helper::loggedCustomerName();
        } else {
            $request->validate([
                'rating' => 'required',
                'email' => 'required|email',
                // 'designation' => 'required',
                'name' => 'required',
                'message' => 'required',
            ]);
            $email = $request->email;
            $name = $request->name;
        }
        $testimonial = new Testimonial();
        $testimonial->email = $email;
        $testimonial->name = $name;
        $testimonial->rating = round($request->rating);
        $testimonial->designation = $request->designation;
        $testimonial->message = '<p>'.$request->message.'</p>';
        $testimonial->user_type = "Customer";
        $testimonial->status = "Inactive";
        //$testimonial->review = $request->review;
        // $testimonial->product_id = $request->product_id;
        if ($testimonial->save()) {
            return response()->json(['status' => 'true', 'message' => 'Review successfully posted']);
        } else {
            return response()->json(['status' => 'error', 'type' => 'error', 'message' => 'Error while submit the review']);
        }
    }

    public function newsletter(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);
        $existEntry = Newsletter::where('email', $validatedData['email'])->count();
        if ($existEntry == 0) {
            $contact = new Newsletter;
            $contact->email = $validatedData['email'];
            if ($contact->save()) {
                return response()->json(['status' => 'success', 'message' => 'Newsletter subscribed successfully']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Error while submit the request']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => '"' . $request->email . '" already subscribed']);
        }
    }

    public function disclaimer()
    {
        $seo_data = $this->seo_content('Disclaimer');
        $banner = Banner::type('disclaimer')->first();
        $field = 'disclaimer';
        return view('web.policy', compact('banner', 'seo_data', 'field'));
    }

    public function privacy_policy()
    {
        $seo_data = $this->seo_content('Privacy Policy');
        $policydata= SiteInformation::first();
        $field = 'privacy_policy';
        $title = 'Privacy Policy';
        return view('web.policy', compact('policydata', 'seo_data', 'field', 'title'));
    }

    public function return_policy()
    {
        $seo_data = $this->seo_content('Return Policy');
        $banner = Banner::type('return-policy')->first();
        $field = 'return_policy';
        $title = 'return policy';
        return view('web.policy', compact('banner', 'seo_data', 'field','title'));
    }

    public function shipping_policy()
    {
        $seo_data = $this->seo_content('Shipping Policy');
        $banner = Banner::type('shipping-policy')->first();
        $field = 'shipping_policy';
        $title = 'shipping policy';
        return view('web.policy', compact('banner', 'seo_data', 'field','title'));
    }
    public function payment_policy()
    {
        $seo_data = $this->seo_content('payment Policy');
        $banner = Banner::type('payment-policy')->first();
        $field = 'payment_policy';
        $title = 'Payment Policy';
        return view('web.policy', compact('banner', 'seo_data', 'field','title'));
    }
    public function terms_and_conditions()
    {
        $seo_data = $this->seo_content('Terms and Conditions');

        $policydata= SiteInformation::first();
        $field = 'terms_and_conditions';
        $title = 'Terms and Conditions';
        return view('web.terms', compact('policydata', 'seo_data', 'field', 'title'));
    }

    public function faq()
    {
        $seo_data = $this->seo_content('faq');  
        $faqs = Faq::active()->latest()->take(10)->get();

        
        $field = 'faq';
        $title = 'faq';
        
        return view('web.faq', compact( 'seo_data','faqs', 'field', 'title'));
    }
     
    
    
    
    public function thankYouPage()
    {
        return view('web.thank_you'); 
    }
    

    

}
