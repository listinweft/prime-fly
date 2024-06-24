<?php

namespace App\Http\Controllers\Web;

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
use DateTime;


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

        $categorys = Category::whereNull('parent_id')->get();
        $testimonials = Testimonial::active()->get();
       
        return view('web.home', compact('seo_data', 'blogs','locations','categorys','testimonials'));
    }

    public function getLocations(Request $request)
    {
        $travelSector = $request->input('travel_sector');
         $locations = Location::where('travel_sector', $travelSector)->get();
        
        return response()->json($locations);
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

        // $category = $request->category;

        // Calculate total amounts for all matching products 
        $totalAmounts = $this->calculateTotalAmounts($data);

        // Pass total amounts to the view
     $category = Category::where('id',$data['category'])->first();


        return response()->json([
            'success' => true,
            'total_amounts' => $totalAmounts,
            'category' => $category->title, 
        ]);
    }

    private function calculateTotalAmounts($data)
    {
        // Fetch all products that match the location_id and service_type


        $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) use ($data) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'))
                 ->where('products.service_type', $data['travel_type']);
        })
        ->when($data['travel_type'] == "departure", function ($query) use ($data) {
            return $query->where('locations.id', $data['origin']);
        })
        ->when($data['travel_type'] == "arrival", function ($query) use ($data) {
            return $query->where('locations.id', $data['destination']);
        })
        ->when($data['travel_type'] == "transit_type", function ($query) use ($data) {
            return $query->where('locations.id', $data['destination']);
        })

        ->where('products.category_id', $data['category'])
        ->groupBy('products.id')
        ->get();

        if ($products->isEmpty()) {
            return []; // or handle the case where no product is found
        }
    
        $result = [];

        $guest = $data['adults'] + $data['infants']+$data['children'];

        $setdate =  $data['datepicker'];

        foreach ($products as $product) {
            $adultPrice = $product->price;
    
            // Fetch prices from the product_size_price table
            $infantPrice = ProductPrice::where('product_id', $product->id)
                                       ->where('size_id', 1) // Assuming size_id 1 is for infants
                                       ->value('price');
    
            $childrenPrice = ProductPrice::where('product_id', $product->id)
                                         ->where('size_id', 2) // Assuming size_id 2 is for children
                                         ->value('price');
    
            // Calculate the total amount
            if ($data['adults'] > 1) {
                $exceptadult = $data['adults'] - 1;
                $totalAmount = (1 * $adultPrice) + ($data['infants'] * $infantPrice) + ($data['children'] * $childrenPrice) + ($exceptadult * $product->additional_price);
            } else {
                $totalAmount = ($data['adults'] * $adultPrice) + ($data['infants'] * $infantPrice) + ($data['children'] * $childrenPrice);
            }
    
            $result[] = [
                'product' => $product,
                'location_title' => $product->location_title, // Add location title to the result array
                'total_amount' => $totalAmount,
                'setdate' => $setdate,
                'totalguest'=> $guest,
                'origin'=> $data['origin'],
                'destination' => $data['destination'],
                'flight_number'=>$data['flight_number'],
                'travel_sector'=>$data['travel_sector'],
                'entry_date'=>$setdate,
                'travel_type'=>$data['travel_type']
                

            ];
        }
    
        return $result;
    }
    
    public function search_booking_baggage(Request $request)
    {

    //  return    $request->all();
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
        $products = Product::select('products.*', 'locations.title as location_title')
            ->join('locations', function ($join) {
                $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
            })
            ->where('products.category_id', $data['category']) // Add category filter
            ->where('products.service_type', 'departure') // Ensure this checks the correct service type
            ->where('locations.id', $data['origin'])
            ->groupBy('products.id')
            ->get();
    
        if ($products->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No products found']);
        }
    
        $result = [];

        $category = Category::where('id',$data['category'])->first();

        $guest = $data['adults'];

        $setdate =  $data['datepicker'];
    
        foreach ($products as $product) {
            $totalAmount = $data['adults'] * $product->price;
            $result[] = [
                'product' => $product,
                'location_title' => $product->location_title,
                'total_amount' => $totalAmount, // Add total amount to the result array
                'setdate' => $setdate,
                'totalguest'=> $guest,
                'origin'=> $data['origin'],
                'destination'=>$data['destination'],
                'flight_number'=>$data['flight_number'],
                'terminal' =>$data['terminal'],

               
            ];
        }
    
        return response()->json(['success' => true, 'total_amounts' => $result,'category' => $category->title]);
    }
    

    public function search_booking_lounch(Request $request)
    {

    //  return    $request->all();
        // Validate request
        $request->validate([
            'terminal' => 'required|string',
            'origin' => 'required|integer',
            'destination' => 'required|integer',
            'flight_number' => 'required|string',
            'adults' => 'required|integer',
            'category' => 'required|integer'
        ]);
    
        // Collect data
        $data = $request->all();
    
        // Fetch products based on travel type and locations
        $products = Product::select('products.*', 'locations.title as location_title')
            ->join('locations', function ($join) {
                $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
            })
            ->where('products.category_id', $data['category']) // Add category filter
            ->where('products.service_type', 'departure') // Ensure this checks the correct service type
            ->where('locations.id', $data['origin'])
            ->groupBy('products.id')
            ->get();
    
        if ($products->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No products found']);
        }
    

        $guest = $data['adults'];

        $setdate =  $data['entry_date'];

        $result = [];

        $category = Category::where('id',$data['category'])->first();
    
        foreach ($products as $product) {
            $totalAmount = $data['adults'] * $product->price;
            $result[] = [
                'product' => $product,
                'location_title' => $product->location_title,
                'total_amount' => $totalAmount, // Add total amount to the result array
                'setdate'=> $setdate,
                'totalguest'=>$guest
               
            ];
        }
    
        return response()->json(['success' => true, 'total_amounts' => $result,'category' => $category->title]);
    }

    public function search_booking_porter(Request $request)
    {

    //  return    $request->all();
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
    
        $products = Product::select('products.*', 'locations.title as location_title')
        ->join('locations', function ($join) use ($data) {
            $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'))
                 ->where('products.service_type', $data['travel_type']);
        })
        ->when($data['travel_type'] == "departure", function ($query) use ($data) {
            return $query->where('locations.id', $data['origin']);
        })
        ->when($data['travel_type'] == "arrival", function ($query) use ($data) {
            return $query->where('locations.id', $data['destination']);
        })
        ->when($data['travel_type'] == "transit_type", function ($query) use ($data) {
            return $query->where('locations.id', $data['destination']);
        })

        ->where('products.category_id', $data['category'])
        ->groupBy('products.id')
        ->get();
        
        $category = Category::where('id',$data['category'])->first();

        if ($products->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No products found']);
        }
    

        $guest = $data['count'];

        $setdate =  $data['entry_date'];


        $result = [];


    
        foreach ($products as $product) {
            $totalAmount = $data['count'] * $product->price;
            $result[] = [
                'product' => $product,
                'location_title' => $product->location_title,
                'total_amount' => $totalAmount, // Add total amount to the result array
                'setdate'=> $setdate,
                'totalguest'=>$guest,
                'origin'=> $data['origin'],
                'destination'=>$data['destination'],
                'flight_number'=>$data['flight_number'],
                'travel_sector'=>$data['travel_sector'],
                'entry_date'=>$setdate,
                'travel_type'=>$data['travel_type']
                
                
            ];
        }
    
        return response()->json(['success' => true, 'total_amounts' => $result,'category' => $category->title]);
    }



    public function search_booking_entry_ticket(Request $request)
    {

    //  return    $request->all();
        // Validate request
        $request->validate([
            'terminal' => 'required|string',
            'origin' => 'required|integer',
            'count' => 'required|integer',
            'category' => 'required|integer',
            'exit_time' => 'required',
            'entry_time' => 'required'

        ]);
    
        // Collect data
        $data = $request->all();
    
        // Fetch products based on travel type and locations
        $products = Product::select('products.*', 'locations.title as location_title')
            ->join('locations', function ($join) {
                $join->on(DB::raw("FIND_IN_SET(locations.id, products.location_id)"), '>', DB::raw('0'));
            })
            ->where('products.category_id', $data['category']) // Add category filter
          
            ->where('locations.id', $data['origin'])
            ->groupBy('products.id')
            ->get();
    
        if ($products->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No products found']);
        }
    
        $result = [];

        $category = Category::where('id',$data['category'])->first();

        

        
        $guest = $data['count'];

        $setdate =  $data['entry_date'];
    
        foreach ($products as $product) {
            $totalAmount = $data['count'] * $product->price;
            $result[] = [
                'product' => $product,
                'location_title' => $product->location_title,
                'total_amount' => $totalAmount, // Add total amount to the result array
                'setdate' => $setdate,
                'totalguest' => $guest,
                'origin' => $data['origin'],
                'terminal' => $data['terminal'],
                'entry_date' => $data['entry_date'],
                'exit_date' => $data['exit_date'],
                'entry_time' => $data['entry_time'],
                'exit_time' => $data['exit_time'],
               
            ];
        }
    
        return response()->json(['success' => true, 'total_amounts' => $result,'category' => $category->title]);
    }
    

    public function search_booking_cloakroom(Request $request)
{
    // Validate request
    $request->validate([
        'terminal' => 'required|string',
        'origin' => 'required|integer',
         'count' => 'required|integer', // Number of bags
        'origin' => 'required',
        'terminal' => 'required',
        'entry_date' => 'required',
        'exit_date' => 'required',
        'entry_time' =>'required',
        'exit_time' => 'required',
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
        ->where('locations.id', $data['origin'])
        ->groupBy('products.id')
        ->get();

    if ($products->isEmpty()) {
        return response()->json(['success' => false, 'message' => 'No products found']);
    }

    $result = [];

    $category = Category::where('id', $data['category'])->first();

    foreach ($products as $product) {
        // Fetch pricing details from product
        $basePrice = $product->price; // Assuming the column name is base_price
        $additionalHourPrice = $product->additional_hourly_price; // Assuming the column name is additional_hour_price
        $additionalBagPrice = $product->additional_price; // Assuming the column name is additional_bag_price

        // Calculate total amount
        $totalAmount = $basePrice;
        if ($hours > 4) {
            $totalAmount += ($hours - 4) * $additionalHourPrice;
        }
        if ($data['count'] > 2) {


        
            $totalAmount += ($data['count'] - 2) * $additionalBagPrice;
        }

        $guest = $data['count'] ;

        $setdate =  $data['exit_date'];

        $result[] = [
            'product' => $product,
            'location_title' => $product->location_title,
            'total_amount' => $totalAmount, // Use the calculated total amount
            'setdate' => $setdate,
            'totalguest' => $guest,
            'origin' => $data['origin'],
             'terminal' => $data['terminal'],
             'entry_date' => $data['entry_date'],
             'exit_date' => $data['exit_date'],
             'entry_time' => $data['entry_time'],
             'exit_time' => $data['exit_time'],
             'bag_count' => $data['count']
        ];
    }

    return response()->json(['success' => true, 'total_amounts' => $result, 'category' => $category->title]);
}

    
    
    

    public function service_detail($short_url)
    {
        
        $category = Category::active()->shortUrl($short_url)->first();

        if ($category) {
       
        $locations = Location::active()->get();
        $blogs = Blog::active()->get();
        $testimonials = Testimonial::active()->get();
         $subcategories = Category::where('parent_id',$category->id)->active()->get();
       
        return view('web.service_detail', compact('blogs','locations','testimonials','category','subcategories'));

        }
    }
    public function package(Request $request, $total_amount = null, $categorys = null)
    {
        // Retrieve and decode the total amounts parameter
      $totalAmounts = $request->total_amount ? json_decode(base64_decode($request->total_amount), true) : null;

        // Handle if the total amounts data is not available
        if (is_null($totalAmounts)) {
            return redirect()->back()->with('error', 'Invalid or missing total amounts data.');
        }

    
        // Pass the total amounts to the view
        return view('web.package', compact('totalAmounts', 'categorys'));
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
    
               
                $blogs = Journal::active()->Where('title', 'LIKE', "%{$request->search_param}%")->get();
        if ($blogs->isNotEmpty()) {
            foreach ($blogs as $blog) {
                
                $searchResult[] = array("id" => $blog->id, "title" => $blog->title,  'image' => ($blog->thumbnail_image != NULL && File::exists(public_path($blog->thumbnail_image))) ? asset($blog->thumbnail_image) : asset('frontend/images/default-image.jpg'), 'link' => url('journal/' . $blog->short_url));
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


        $seo_data = $this->seo_content('About');
        
        $about = About::first();
        $who = WhoWeAre::first();
         $aboutFeatures = AboutFeature::get();
        $homeHeadings = HomeHeading::get();
        $categoriesCount = Category::active()->whereNull('parent_id')->get();
        // $aboutFeatures = AboutFeature::active()->take(4)->oldest('sort_order')->get();
        $histories = History::active()->oldest('sort_order')->get();
        $banner = Banner::type('about')->first();
        $catHomeHeadings = HomeHeading::where('type','category')->first();

        $prdts = Category::active()->oldest('sort_order')->where('display_to_home','Yes')->get();

        $catIds = $prdts->pluck('id')->toArray();
       $prs =  Product::whereIn('category_id',$catIds)->where('copy','no')->get();
       $catIdss = $prs->pluck('category_id')->toArray();
  
       $themes =  Category::whereIn('id',$catIdss)->get();
  
   

        return view('web.about', compact('seo_data', 'about','who','categoriesCount', 'aboutFeatures', 'banner', 'histories', 'homeHeadings','catHomeHeadings','themes'));
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

        // dd($request->all());
        $request->validate([
            'firstname' => 'required|regex:/^[\pL\s]+$/u|min:2|max:60',
            'email' => 'required|email|max:255',
             'phone' => 'required|regex:/^([0-9\+]*)$/|min:7|max:20',
            // 'subject' => 'required',
            // 'message' => 'required',
        ]);

        $contact = new Enquiry();


        $contact->type = $request->type;
        $contact->name = $request->firstname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
       
        $contact->message = $request->message;
        $contact->product_id = $request->product_id ?? NULL;
        $contact->product_type_id = $request->product_type_id ?? NULL;
        $contact->size_id = $request->size_id ?? NULL;
        $contact->frame_id = $request->frame_id ?? NULL;
        $contact->mount = $request->mount ?? NULL;
      
        $contact->request_url = url()->previous();


        if ($request->type == 'get_a_quote') {
            $type = " Get A Quote";
        } elseif ($request->type == 'product') {
            $type = ' Product Enquiry';
        }
        elseif ($request->type == 'bulk') {
            $type = ' Bulk  Enquiry';
        }
         else {
            $type = ' Contact request';
        }
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
            $previousBlog = Blog::active()->latest('posted_date')->where('id', '<', $blog->id)->first();
            $nextBlog = Blog::active()->latest('posted_date')->where('id', '>', $blog->id)->first();

            $comments = Comment::where('blog_id', $blog->id)->get();

            $totalLikes = Like::where('blog_id', $blog->id)->count();


            $user = Auth::guard('customer')->user();
           $like = null;
        if ($user) {
             $like = Like::where('blog_id', $blog->id)
                ->where('user_id', $user->id)
                ->first();
                return view('web.blog', compact('blog', 'recentBlogs', 'banner', 'seo_data',
                'previousBlog', 'nextBlog','type','comments','like','totalLikes'));
        }

        else{
            return view('web.blog', compact('blog', 'recentBlogs', 'banner', 'seo_data',
                'previousBlog', 'nextBlog','type','comments','totalLikes','like'));
        }
         

    }

    }
 

    public function location_detail($short_url)
    {
          $blog = Location::where('title',$short_url)->first();
       
         
        if ($blog) {
           
            $type = $blog->title;
            $categorys = Category::whereNull('parent_id')->get();

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
