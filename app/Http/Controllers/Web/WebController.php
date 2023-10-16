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
use App\Models\Frame;
use App\Models\CurrencyRate;
use App\Models\Shape;
use App\Models\Reply;
use App\Models\WhoWeAre;


use App\Models\History;
use App\Models\HomeAdvertisement;
use App\Models\HomeBanner;
use App\Models\HomeGetQuote;
use App\Models\HomeHeading;
use App\Models\HotDeal;
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

        $totalBlog = Blog::active()->count();

        $condition = Blog::active()->latest('posted_date');

        $blogs = $condition->take(3)->get();

        $totalevent = Event::active()->count();

        $condition = Event::active()->latest('posted_date');

        $events = $condition->take(3)->get();

        $totaljournal = Journal::active()->count();

        $condition = Journal::active()->latest('posted_date');

        $journals = $condition->take(10)->get();


       

    
        $faqs = Faq::active()->latest()->take(5)->get();

        
             
      

   

    
        return view('web.home', compact('seo_data', 'blogs','events','journals','faqs'));
    }

    public function store_comment(Request $request)
    {
        $user = Auth::guard('customer')->user();  // Get the authenticated user
    
        // Validate the request data
        $validatedData = $request->validate([
            'comment_content' => 'required|string|max:255',
        ]);
    
        // Create a new comment with the correct user_id
        $comment = Comment::create([
            'content' => $validatedData['comment_content'],
            'likes' => 0,
            'user_id' => $user->id, 
            'blog_id' => $request->blog_id ?? null,
            'journal_id' => $request->journal_id ?? null,


        ]);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    

    public function reply(Request $request, $commentId)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'reply_content' => 'required|string|max:255', // Updated to 'reply_content'
        ]);

        $user = Auth::guard('customer')->user();

        // Find the parent comment
        $parentComment = Comment::findOrFail($commentId);

        // Create a new reply associated with the parent comment
        $reply = Reply::create([
            'content' => $validatedData['reply_content'], // Updated to 'reply_content'
            // 'likes' => 0,
            'user_id' => $user->id,
            'comment_id' => $parentComment->id,
            // other reply attributes you might have
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Reply added successfully!');
    }
    public function likeComment($commentId)
{
    $user = Auth::user();
    $comment = Comment::findOrFail($commentId);

    // Check if the user hasn't already liked the comment
    if (!$user->hasLikedComment($comment)) {
        $comment->likes += 1;
        $comment->save();
        $user->likedComments()->attach($commentId);
    }

    return redirect()->back()->with('success', 'Comment liked!');
}

public function unlikeComment($commentId)
{
    $user = Auth::user();
    $comment = Comment::findOrFail($commentId);

    // Check if the user has liked the comment
    if ($user->hasLikedComment($comment)) {
        $comment->likes -= 1;
        $comment->save();
        $user->likedComments()->detach($commentId);
    }

    return redirect()->back()->with('success', 'Comment unliked!');
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
                
                $searchResult[] = array("id" => $blog->id, "title" => $blog->title,  'image' => ($blog->thumbnail_image != NULL && File::exists(public_path($blog->thumbnail_image))) ? asset($blog->thumbnail_image) : asset('frontend/images/default-image.jpg'), 'link' => url('blog/' . $blog->short_url));
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
                
                $searchResult[] = array("id" => $blog->id, "title" => $blog->title,  'image' => ($blog->thumbnail_image != NULL && File::exists(public_path($blog->thumbnail_image))) ? asset($blog->thumbnail_image) : asset('frontend/images/default-image.jpg'), 'link' => url('blog/' . $blog->short_url));
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
       
        $contact->message = $request->message ?? "nothing send";
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
                    'message' => $type . ' has been submitted successfully']);
            } else {
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

        // $latestThreeBlogs = Blog::active()->skip(1)->take(3)->latest('posted_date')->get();

        $totalBlog = Blog::active()->count();

        $condition = Blog::active()->latest('posted_date');

        $blogs = $condition->take(3)->get();
        $offset = $blogs->count() + 1;
        $loading_limit = 3;
        return view('web.blogs', compact('seo_data', 'banner', 'latestBlog', 'heading',
            'blogs', 'totalBlog', 'offset', 'loading_limit'));
    }
    public function journals()
    {
         $banner = Banner::type('journals')->first();
         $heading = HomeHeading::type('journal')->first();
        $seo_data = $this->seo_content('Blogs');
        $latestBlog = Journal::active()->latest('posted_date')->first();

        // $latestThreeBlogs = Blog::active()->skip(1)->take(3)->latest('posted_date')->get();

        $totalBlog = Journal::active()->count();

        $condition = Journal::active()->latest('posted_date');

        $blogs = $condition->take(3)->get();
        $offset = $blogs->count() + 1;
        $loading_limit = 3;
        return view('web.journals', compact('seo_data', 'banner', 'latestBlog', 'heading',
            'blogs', 'totalBlog', 'offset', 'loading_limit'));
    }
    public function journalLoadMore(Request $request)
    {
        $offset = $request->offset;
        $loading_limit = $request->loading_limit;
        $condition = Journal::active()->latest('posted_date');
        $totalBlog = $condition->count();
        $blogs = $condition->latest('posted_date')->skip($offset)->take($loading_limit)->get();
        $offset += $blogs->count();

        return view('web._journal_list', compact('blogs', 'loading_limit', 'totalBlog', 'offset', 'blogs'));
    }
    public function eventLoadMore(Request $request)
    {
        $offset = $request->offset;
        $loading_limit = $request->loading_limit;
        $condition = Event::active()->latest('posted_date');
        $totalBlog = $condition->count();
        $blogs = $condition->latest('posted_date')->skip($offset)->take($loading_limit)->get();
        $offset += $blogs->count();

        return view('web._event_list', compact('blogs', 'loading_limit', 'totalBlog', 'offset', 'blogs'));
    }
    public function events()
    {
        
        $banner = Banner::type('journals')->first();
        $heading = HomeHeading::type('journal')->first();
       $seo_data = $this->seo_content('Blogs');
       $latestBlog = Event::active()->latest('posted_date')->first();

       // $latestThreeBlogs = Blog::active()->skip(1)->take(3)->latest('posted_date')->get();

       $totalBlog = Event::active()->count();

       $condition = Event::active()->latest('posted_date');

       $blogs = $condition->take(3)->get();
       $offset = $blogs->count() + 1;
       $loading_limit = 3;
       return view('web.events', compact('seo_data', 'banner', 'latestBlog', 'heading',
       'blogs', 'totalBlog', 'offset', 'loading_limit'));
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

        
            return view('web.blog', compact('blog', 'recentBlogs', 'banner', 'seo_data',
                'previousBlog', 'nextBlog','type','comments'));
        } else {
            return view('web.404');
        }
    }
    public function journal_detail($short_url)
    {
         $blog = Journal::active()->shortUrl($short_url)->first();
        if ($blog) {
            $banner = $seo_data = $blog;
            $type = $short_url;
            $comments = Comment::where('journal_id', $blog->id)->get();
           
            return view('web.journal', compact('blog',  'banner', 'seo_data',
                'type','comments'));
        } else {
            return view('web.404');
        }
    }
    public function event_detail($short_url)
    {
         $blog = Event::active()->shortUrl($short_url)->first();
        if ($blog) {
            $banner = $seo_data = $blog;
            $type = $short_url;
           
            return view('web.event_detail', compact('blog',  'banner', 'seo_data',
                'type'));
        } else {
            return view('web.404');
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
   

}
