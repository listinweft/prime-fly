<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\About;
use App\Models\AboutFeature;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Homecollection;
use App\Models\Color;
use App\Models\Latest;
use App\Models\ContactAddress;
use App\Models\Deal;
use App\Models\Enquiry;
use App\Models\Frame;
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
use App\Models\SeoData;
use App\Models\SiteInformation;
use App\Models\Tag;
use App\Models\Shape;
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


        $homeBanners = HomeBanner::active()->oldest('sort_order')->get();
        $ourcollection = Homecollection::active()->first();
      $homeHeadings = HomeHeading::where('type','testimonial')->first();
      $themes = Category::active()->oldest('sort_order')->get();
        $testimonials = Testimonial::active()->take(10)->get();
      $catHomeHeadings = HomeHeading::where('type','category')->first();
     $products = Product::active()->where('display_to_home','Yes')->where('copy','no')->get();

    //   $ourcollection = Homecollection::active()->first();
    //   return view('web.home', compact('seo_data', 'ourcollection','testimonials','homeHeadings','homeBanners','themes'));


    //     return view('web.home', compact('seo_data', 'ourcollection'));
        return view('web.home', compact('seo_data', 'ourcollection','catHomeHeadings','testimonials','homeHeadings','homeBanners','themes','products'));
    }


    public function about()
    {
        $seo_data = $this->seo_content('About');
        $about = About::first();
        $homeHeadings = HomeHeading::get();
        $aboutFeatures = AboutFeature::active()->take(4)->oldest('sort_order')->get();
        $histories = History::active()->oldest('sort_order')->get();
        $banner = Banner::type('about')->first();
        $catHomeHeadings = HomeHeading::where('type','category')->first();
        $themes = Category::active()->oldest('sort_order')->get();

        return view('web.about', compact('seo_data', 'about', 'aboutFeatures', 'banner', 'histories', 'homeHeadings','catHomeHeadings','themes'));
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

        //dd($request->all());
        $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:60',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^([0-9\+]*)$/|min:7|max:20',
            // 'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Enquiry();


        $contact->type = $request->type;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->product_id = $request->product_id ?? NULL;
        $contact->request_url = url()->previous();


        if ($request->type == 'get_a_quote') {
            $type = " Get A Quote";
        } elseif ($request->type == 'product') {
            $type = ' Product Enquiry';
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

        $blogs = $condition->take(6)->get();
        $offset = $blogs->count() + 4;
        $loading_limit = 6;
        return view('web.blogs', compact('seo_data', 'banner', 'latestBlog', 'heading',
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
            $recentBlogs = Blog::active()->latest('posted_date')->limit(4)->where('id', '!=', $blog->id)->get();
            $previousBlog = Blog::active()->latest('posted_date')->where('id', '<', $blog->id)->first();
            $nextBlog = Blog::active()->latest('posted_date')->where('id', '>', $blog->id)->first();
            return view('web.blog', compact('blog', 'recentBlogs', 'banner', 'seo_data',
                'previousBlog', 'nextBlog','type'));
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


    public function category($short_url)
    {
        $category = Category::active()->shortUrl($short_url)->first();
        if ($category) {
            $seo_data = $category;
            $parentCategories = Category::active()->isParent()->get();
            $banner = $category;
            $subCategoryIds = implode('|', ((collect($category->id)->merge(Helper::getAllSubCategories($category->id)->pluck('id')))->toArray()));
            $condition = Product::active()->whereRaw("(FIND_IN_SET('" . $category->id . "',category_id)")->orwhereRaw('CONCAT(",", `sub_category_id`, ",") REGEXP ",(' . $subCategoryIds . '),")');
            $totalProducts = $condition->count();
            $products = $condition->where('copy','no')->latest()->take(12)->get();

            $colors = Color::active()->oldest('title')->get();
            $offset = $products->count();
            $loading_limit = 15;
            $type = "category";
            $colors = Color::active()->oldest('title')->get();
            $shapes = Shape::latest()->get();
            $tags = Tag::latest()->get();
            $shapescount = count($shapes);
            $typeValue = $short_url;
            $sort_value = 'latest';
            $title = ucfirst($category->title);
            $latestProducts = Product::active()->whereRaw("find_in_set('" . $category->id . "',category_id)")->take(5)->latest()->get();
            return view('web.products', compact('seo_data', 'products', 'totalProducts', 'offset', 'loading_limit','shapes','tags','shapescount',
                'parentCategories', 'colors', 'category', 'banner', 'type', 'typeValue', 'latestProducts',
                'title', 'sort_value'));
        } else {
            return view('web.404');
        }
    }
    public function color($short_url)
    {
        $color = Color::active()->where('id',$short_url)->first();

        if ($color) {
            $seo_data = $color;

            $allProducts = Product::active()->first();
            $banner = $allProducts;
            $subCategoryIds = implode('|', ((collect($color->id))->toArray()));
            $condition = Product::active()->whereRaw("(FIND_IN_SET('" . $color->id . "',color_id)")->orwhereRaw('CONCAT(",", `color_id`, ",") REGEXP ",(' . $subCategoryIds . '),")');
            $totalProducts = $condition->count();
            $products = $condition->where('copy','no')->latest()->take(12)->get();

            $colors = Color::active()->oldest('title')->get();
            $offset = $products->count();
            $loading_limit = 15;
            $type = "category";
            $colors = Color::active()->oldest('title')->get();
            $shapes = Shape::latest()->get();
            $tags = Tag::latest()->get();
            $shapescount = count($shapes);
            $typeValue = $short_url;
            $sort_value = 'latest';
            $title = ucfirst($color->title);
            $latestProducts = Product::active()->whereRaw("find_in_set('" . $color->id . "',color_id)")->take(5)->latest()->get();
            return view('web.products', compact('seo_data', 'products', 'totalProducts', 'offset', 'loading_limit','shapes','tags','shapescount', 'colors', 'color', 'banner', 'type', 'typeValue', 'latestProducts',
                'title', 'sort_value'));
        } else {
            return view('web.404');
        }
    }
    public function shape($short_url)
    {
        $shape = Shape::active()->where('id',$short_url)->first();

        if ($shape) {
            $seo_data = $shape;
            // $parentCategories = Category::active()->isParent()->get();
            $allProducts = Product::active()->first();
            $banner = $allProducts;
            $subCategoryIds = implode('|', ((collect($shape->id))->toArray()));
            $condition = Product::active()->whereRaw("(FIND_IN_SET('" . $shape->id . "',color_id)")->orwhereRaw('CONCAT(",", `color_id`, ",") REGEXP ",(' . $subCategoryIds . '),")');
            $totalProducts = $condition->count();
            $products = $condition->where('copy','no')->latest()->take(12)->get();

            $colors = Color::active()->oldest('title')->get();
            $offset = $products->count();
            $loading_limit = 15;
            $type = "category";
            $colors = Color::active()->oldest('title')->get();
            $shapes = Shape::latest()->get();
            $tags = Tag::latest()->get();
            $shapescount = count($shapes);
            $typeValue = $short_url;
            $sort_value = 'latest';
            $title = ucfirst($shape->title);
            $latestProducts = Product::active()->whereRaw("find_in_set('" . $shape->id . "',color_id)")->take(5)->latest()->get();
            return view('web.products', compact('seo_data', 'products', 'totalProducts', 'offset', 'loading_limit','shapes','tags','shapescount',
                'colors', 'shape', 'banner', 'type', 'typeValue', 'latestProducts',
                'title', 'sort_value'));
        } else {
            return view('web.404');
        }
    }
    public function deal($short_url)
    {
        if ($short_url) {
            $deal = Deal::active()->shortUrl($short_url)->first();
            if ($deal) {
                $seo_data = $deal;
                $banner = $deal;
                $parentCategories = Category::active()->isParent()->get();
                $condition = Product::active()->whereIn('id', explode(',', $deal->products));
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

    public function main_search(Request $request)
    {
        $searchResult = array();
        $products = Product::active()->where('title', 'LIKE', "%{$request->search_param}%")->get();
        if ($products->isNotEmpty()) {
            foreach ($products as $product) {
                if (Helper::offerPrice($product->id) != '') {
                    $offerPrice = Helper::offerPrice($product->id);
                    $price = Helper::defaultCurrency() . ' ' . Helper::defaultCurrencyRate() * $$product->productprice->id;
                } else {
                    $price = Helper::defaultCurrency() . ' ' . Helper::defaultCurrencyRate() * $product->productprice->id;
                }
                $searchResult[] = array("id" => $product->id, "title" => $product->title, 'price' => $price, 'offer_price' => $offerPrice ?? '', 'image' => ($product->thumbnail_image != NULL && File::exists(public_path($product->thumbnail_image))) ? asset($product->thumbnail_image) : asset('frontend/images/default-image.jpg'), 'link' => url('product/' . $product->short_url));
            }
        }
        return response()->json(['status' => true, 'message' => $searchResult]);
    }


    public function main_search_products($search_param)
    {
        $condition = Product::active()->where('title', 'LIKE', "%{$search_param}%");
        $totalProducts = $condition->count();
        $products = $condition->latest()->take(30)->get();
        $parentCategories = Category::active()->isParent()->get();
        $colors = Color::active()->oldest('title')->get();
        $colors = Color::active()->get();
        $offset = $products->count();
        $loading_limit = 15;
        $type = "search_result";
        $typeValue = $search_param;
        $shapes = Shape::latest()->get();
        $shapescount = count($shapes);
        $tags = Tag::latest()->get();
        $banner = Banner::type('search')->first();
        $sort_value = 'latest';
        $title = 'Search result of ' . $search_param;
        $latestProducts = Product::active()->take(5)->latest()->get();
        return view('web.products', compact('products', 'totalProducts', 'offset',
            'loading_limit', 'parentCategories', 'colors', 'colors',
            'type', 'typeValue', 'latestProducts', 'sort_value', 'title', 'banner','shapes','tags','shapescount'));
    }

    public function product_detail($short_url)
    {
        $product = Product::active()->shortUrl($short_url)->with('activeGalleries')->first();
        if ($product) {
            Helper::addRecentProduct($product);
            $products = Product::active()->where('title',$product->title)->with('activeGalleries')->get();
            $productTypeIds = $products->pluck('product_type_id')->toArray();
            $productTypes = ProductType::whereIn('id',$productTypeIds)->active()->get();

            $sizes = Size::active()->get();
            $banner = $seo_data = $product;
            $addOns = Product::active()->whereIn('id', explode(',', $product->add_on_id))->latest()->get();
            $similarProducts = Product::active()->whereIn('id', explode(',', $product->similar_product_id))
            ->where('copy','no')->latest()->get();
            $relatedProducts = Product::active()->whereIn('id', explode(',', $product->related_product_id))
            ->where('copy','no')
            ->latest()->get();
            $productTags = Tag::active()->whereIn('id', explode(',', $product->tag_id))->latest()->get();
            $productFrames = Frame::whereIn('id', explode(',', $product->frame_color))->latest()->get();
            $specifications = ProductSpecificationHead::active()->with('specifications')
                ->where('product_id', $product->id)->orderby('sort_order')->get();
            $averageRatings = Helper::averageRating($product->id);
            $totalRatings = Helper::ratingCount($product->id);
            $totalReviews = Helper::reviewCount($product->id);
            $reviews = $product->activeReviews->take(2);
            $review_offset = $reviews->count();
            $starPercent1 = $totalReviews > 0 ? round(Helper::ratingCount($product->id, 1) * 100 / $totalReviews) : 0;
            $starPercent2 = $totalReviews > 0 ? round(Helper::ratingCount($product->id, 2) * 100 / $totalReviews) : 0;
            $starPercent3 = $totalReviews > 0 ? round(Helper::ratingCount($product->id, 3) * 100 / $totalReviews) : 0;
            $starPercent4 = $totalReviews > 0 ? round(Helper::ratingCount($product->id, 4) * 100 / $totalReviews) : 0;
            $starPercent5 = $totalReviews > 0 ? round(Helper::ratingCount($product->id, 5) * 100 / $totalReviews) : 0;

            if($product->product_type_id == 1){
                return view('web.product-detail', compact('seo_data', 'product', 'addOns', 'similarProducts','productTypes','sizes','productFrames','products',
                'relatedProducts', 'productTags', 'starPercent1', 'starPercent2', 'starPercent3', 'starPercent4','totalRatings', 'reviews', 'review_offset',
                'starPercent5', 'totalReviews', 'averageRatings', 'banner', 'specifications'));
            }
            elseif($product->product_type_id == 2){
                return view('web.product-details-canvas', compact('seo_data', 'product', 'addOns', 'similarProducts','productTypes','sizes','productFrames','products',
                'relatedProducts', 'productTags', 'starPercent1', 'starPercent2', 'starPercent3', 'starPercent4','totalRatings', 'reviews', 'review_offset',
                'starPercent5', 'totalReviews', 'averageRatings', 'banner', 'specifications'));
            }
            elseif($product->product_type_id == 3){
                return view('web.product-details-stretched-canvas', compact('seo_data', 'product', 'addOns', 'similarProducts','productTypes','sizes','productFrames','products',
                'relatedProducts', 'productTags', 'starPercent1', 'starPercent2', 'starPercent3', 'starPercent4','totalRatings', 'reviews', 'review_offset',
                'starPercent5', 'totalReviews', 'averageRatings', 'banner', 'specifications'));
            }
            elseif($product->product_type_id == 4){
                return view('web.product-details-framed-canvas', compact('seo_data', 'product', 'addOns', 'similarProducts','productTypes','sizes','productFrames', 'products',
                'relatedProducts', 'productTags', 'starPercent1', 'starPercent2', 'starPercent3', 'starPercent4','totalRatings', 'reviews', 'review_offset',
                'starPercent5', 'totalReviews', 'averageRatings', 'banner', 'specifications'));
            }

        } else {
            return view('web.404');
        }


    }

    public function check_price(){
        $size = request()->id;
        $product_id = request()->product_id;

        $productOffer = Offer::where('product_id',$product_id)->where('status','Active')->first();
        if($productOffer){
            $productPrice = ProductPrice::where('product_id',$product_id)->where('size_id',$size)->first();
            $productPrice =  Helper::defaultCurrency().' '.number_format($productPrice->price * Helper::defaultCurrencyRate(), 2);
            if(Helper::offerPriceSize($product_id,$size,$productOffer->id)){
                $offerPrice =   Helper::defaultCurrency().' '.Helper::offerPriceSize($product_id,$size,$productOffer->id);
            }
            else
            {
                $offerPrice = null;
            }
        //return` offer price and product price
        return response(array('offerPrice' => $offerPrice, 'productPrice' => $productPrice));

        }
        else{
               $product_price = ProductPrice::where('product_id',request()->product_id)->where('size_id',request()->id)->first();
              $productPrice =  Helper::defaultCurrency().' '.number_format($product_price->price * Helper::defaultCurrencyRate(), 2);

              return response(array('productPrice' => $productPrice));
        }

    }
    public function filter_product(Request $request)
    {



        $condition = $this->filterCondition($request);
        $condition = $this->sortCondition($request, $condition);
        $totalProducts = $condition->count();
        $sort_value = $request->sort_value;
        if (isset($sort_value) && $sort_value == 'none') {
            $products = $condition->take(12)->get()->shuffle();
        } else {
            $products = $condition->take(12)->get();
        }
        $offset = $products->count();
        $title = 'Filtered Products';
        $type = $request->pageType;
       $typeValue = $request->typeValue;
       $shapes = Shape::latest()->get();
       $shapescount = count($shapes);

     
        return view('web.includes.product_list', compact('products', 'totalProducts', 'offset',
            'title', 'type', 'typeValue', 'sort_value','shapescount'));
    }

    public function filterCondition(Request $request)
    {

       
       

        $price_range = explode('-', str_replace('AED', '', $request->my_range));


         if (!empty($price_range)) {


         
          
            

             $condition = Product::active()->whereHas('productprices', function($query) use($price_range){
                $query->whereBetween('products_size_price.price', [$price_range[0], $price_range[1]]);
                
             })->where('products.copy','no');
         }

         else{

            $condition = Product::active()->where('copy','no');



         }




        $inputs = [];
        if ($request->input_field != NULL) {
            $inputs = explode(',', $request->input_field);
        }



        if ($request->pageType == "category" && !in_array('category_id', $inputs)) {
            $category = Category::active()->where('short_url', $request->typeValue)->first();
            if ($category) {
                $subCategoryIds = implode('|', ((collect($category->id)->merge(Helper::getAllSubCategories($category->id)->pluck('id')))->toArray()));
                $condition = $condition->whereRaw("(FIND_IN_SET('" . $category->id . "',category_id)")->orwhereRaw('CONCAT(",", `sub_category_id`, ",") REGEXP ",(' . $subCategoryIds . '),")');
            }
        } elseif ($request->pageType == "search_result") {
            $condition = $condition->Where('title', 'like', '%' . $request->typeValue . '%');
        } elseif ($request->pageType == "deal") {
            $deal = Deal::where([['short_url', $request->typeValue], ['status', 'Active']])->first();
            if ($deal) {
                $condition = $condition->whereIn('id', explode(',', $deal->products));
            }
        }

        
        //color filtering
        if ($request->input_field != NULL) {
            $condition = $condition->where(function ($query) use ($inputs, $request) {
                 {
                    foreach ($inputs as $input) {
                        if ($input == "category_id" || $input == "sub_category_id" ||  $input == "shape_id" ||  $input == "tag_id") {


                            foreach ($request->$input as $key => $reIn) {


                                $query->OrwhereRaw("find_in_set('" . $reIn . "',$input)");
                            }

                         }
                         else {
                            $query->whereIn($input, $request[$input]);
                        }
                    }
                }
            });
        }

        return $condition;
    }

    public function sortCondition(Request $request, $condition)
    {
        //Sorting
        $sort_value = $request->sort_value;
        if ($sort_value == "new") {
            $condition = $condition->oldest('new_arrival');
        } elseif ($sort_value == "featured") {
            $condition = $condition->oldest('is_featured');
        } elseif ($sort_value == "best") {
            $condition = $condition->oldest('best_seller');
        } elseif ($sort_value == "asc") {
            $condition = $condition->oldest('title');
        } elseif ($sort_value == "desc") {
            $condition = $condition->latest('title');
        }
        return $condition;
    }

    public function productLoadMore(Request $request)
    {
        $offset = $request->loading_offset;
        $loading_limit = $request->loading_limit;
        $condition = $this->filterCondition($request);
        $condition = $this->sortCondition($request, $condition);
        $totalProducts = $condition->count();
        $products = $condition->latest()->skip($offset)->take($loading_limit)->get();
        $offset += $products->count();
        $title = $request->title;
        $type = $request->pageType;
        $typeValue = $request->typeValue;
        $sort_value = $request->sort_value;
        $latestProducts = Product::active()->take(6)->latest()->get();
        return view('web.includes.product_list_inner', compact('products', 'totalProducts', 'offset',
            'title', 'type', 'typeValue', 'sort_value', 'latestProducts'));
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


    public function add_compare_product(Request $request)
    {
        $compare = Helper::addCompareProduct($request->product_id);
        if ($compare == 'added') {
            $message = 'Product Added to Compare.';
        } else {
            $message = 'Product Removed form compare.';
        }
        return response()->json(['status' => 'success', 'message' => $message]);
    }

    public function compare_products()
    {
        $banner = Banner::type('compare')->first();
        $seo_data = $this->seo_content('compare');
        $products = collect();
        if (Session::has('compare_products')) {
            $compare_products = Session::get('compare_products');
            $products = Product::whereIn('id', $compare_products)->get();

        }
        return view('web.compare-products', compact('seo_data', 'banner', 'products'));
    }

    // public function submit_review(Request $request)
    // {
    //     if (Auth::guard('customer')->check()) {
    //         $request->validate([
    //             'rating' => 'required',
    //         ]);
    //         $email = Auth::guard('customer')->user()->email;
    //         $name = Helper::loggedCustomerName();
    //     } else {
    //         $request->validate([
    //             'rating' => 'required',
    //             'email' => 'required|email',
    //             'designation' => 'required',
    //             'name' => 'required',
    //             'message' => 'required',
    //         ]);
    //         $email = $request->email;
    //         $name = $request->name;
    //     }
    //     $review = new ProductReview();
    //     $review->email = $email;
    //     $review->name = $name;
    //     $review->rating = round($request->rating);
    //     $review->review = $request->review;
    //     $review->product_id = $request->product_id;
    //     if ($review->save()) {
    //         return response()->json(['status' => 'success-reload', 'message' => 'Review successfully posted']);
    //     } else {
    //         return response()->json(['status' => 'error', 'type' => 'error', 'message' => 'Error while submit the review']);
    //     }
    // }

    public function product_review(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            $request->validate([
                'email' => 'required|email',
            ]);
            $email = Auth::guard('customer')->user()->email;
            $name = Helper::loggedCustomerName();
        } else {

            $request->validate([
                'rating' => 'required',
                'email' => 'required|email',
                'name' => 'required',
                'message' => 'required',
            ]);
            $email = $request->email;
            $name = $request->name;
        }
        $review = new ProductReview();
        $review->email = $email;
        $review->name = $name;
        $review->rating = round($request->rating);
        $review->review = $request->review;
        $review->product_id = $request->product_id;
        if ($review->save()) {
            return response()->json(['status' => 'success-reload', 'message' => 'Review successfully posted']);
        } else {
            return response()->json(['status' => 'error', 'type' => 'error', 'message' => 'Error while submit the review']);
        }
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
                'review' => 'required',
            ]);
            $email = $request->email;
            $name = $request->name;
        }
        $testimonial = new Testimonial();
        $testimonial->email = $email;
        $testimonial->name = $name;
        $testimonial->rating = round($request->rating);
        $testimonial->designation = $request->designation;
        $testimonial->message = $request->message;
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
        $banner = Banner::type('privacy-policy')->first();
        $field = 'privacy_policy';
        $title = 'Privacy Policy';
        return view('web.policy', compact('banner', 'seo_data', 'field', 'title'));
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
        return view('web.policy', compact('banner', 'seo_data', 'field'));
    }

    public function terms_and_conditions()
    {
        $seo_data = $this->seo_content('Terms and Conditions');

        $banner = Banner::type('terms-and-conditions')->first();
        $field = 'terms_and_conditions';
        $title = 'Terms and Conditions';
        return view('web.policy', compact('banner', 'seo_data', 'field', 'title'));
    }

}
