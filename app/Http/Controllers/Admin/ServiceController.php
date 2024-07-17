<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;

use App\Models\Category;
use App\Models\Service;
use App\Models\SiteInformation;
use App\Models\Product;
use App\Models\Location;
use App\Models\ProductPrice;

use App\Models\Size;

use App\Models\ProductKeyFeature;
use App\Models\ProductSpecificationHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function service()
    {
        $title = "Service List";
        $productList = Product::latest()->get();
        return view('Admin.product.list', compact('productList', 'title'));
    }

    public function service_create()
    {
        $key = "Create";
        $title = "Create service";
        $selectedServiceTypes = [];
        $selectedSector = 'international';
        $categories = Category::active()->whereNull('parent_id')->get();
        $locations = Location::active()->get();
        $products = Product::active()->get();
        $sizes = Size::active()->get();
        return view('Admin.product.form', compact('key', 'title', 'categories', 'products','locations','sizes','selectedServiceTypes','selectedSector'));
    }

   
    public function service_store(Request $request)
    {

    //   return  $request->all();
        DB::beginTransaction();
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url' => 'required|unique:products,short_url,NULL,id,deleted_at,NULL|min:2|max:255',        
            // 'category' => 'required',
            'location' => 'required',
            'service_type' => 'required',
           'description' => 'required',
        //    'price' => 'required',
       
       
        ]);
        // if ($request->filled('category')) {
            
        //     // Additional validation rules for when a category is selected
        //     $rules['price.0'] = 'required'; // First index required, others optional
        // }
        // if (!$request->has('category') || $request->input('category') === '') {
        //     return 1;
        //     // Additional validation rules when category has not been selected
        //     $rules['pricenormal'] = 'required'; // Making pricenormal required
        // }
        
        
        $product = new Product;
        if ($request->hasFile('thumbnail_image')) {
            $product->thumbnail_image_webp = Helper::uploadWebpImage($request->thumbnail_image, 'uploads/product/image/webp/', $request->short_url);
            $product->thumbnail_image = Helper::uploadFile($request->thumbnail_image, 'uploads/product/image/', $request->short_url);
        }
        if ($request->hasFile('desktop_banner')) {
            $product->desktop_banner_webp = Helper::uploadWebpImage($request->desktop_banner, 'uploads/product/desktop_banner/webp/', $request->short_url);
            $product->desktop_banner = Helper::uploadFile($request->desktop_banner, 'uploads/product/desktop_banner/', $request->short_url);
        }
        if ($request->hasFile('mobile_banner')) {
            $product->mobile_banner_webp = Helper::uploadWebpImage($request->mobile_banner, 'uploads/product/mobile_banner/webp/', $request->short_url);
            $product->mobile_banner = Helper::uploadFile($request->mobile_banner, 'uploads/product/mobile_banner/', $request->short_url);
        }
       
       

        $product->title = $validatedData['title'];
        $product->short_url = $validatedData['short_url'];

        $product->price = $request->pricenormal ?? '';
        $product->additional_price = $request->additional_price ?? '';
          $product->category_id = $request->category ?? '';
          $product->sub_category_id = ($request->sub_category) ? implode(',', $request->sub_category) : '';
          $product->additional_hourly_price = $request->additional_hourly_price ?? '';
          $product->hourly_price = $request->hourly_price ?? '';
        $product->location_id = ($request->location) ? implode(',', $request->location) : '';
    
        $product->service_type =  ($request->service_type) ? implode(',', $request->service_type) : '';
         $product->sector = $request->sector ?? '';
    
        $product->description = $validatedData['description'];  
        $product->thumbnail_image_attribute = $request->image_meta_tag ?? '';
      
        $product->meta_title = $request->meta_title ?? '';
        $product->meta_description = $request->meta_description ?? '';
        $product->meta_keyword = $request->meta_keyword ?? '';
        $product->other_meta_tag = $request->other_meta_tag ?? '';

        $product->bags = $request->bags ?? '';
        $product->hours = $request->hours ?? '';
        


        $priceWithSize = $request->price;
            
       
        if ($product->save()) {

            if (isset($priceWithSize) && !empty($priceWithSize)) {
                // First, delete existing entries for the given product and sizes
                DB::table('products_size_price')
                    ->where('product_id', $product->id)
                    ->whereIn('size_id', $request->size)
                    ->delete();
                
                // Now, insert entries, setting value to 0 if it is null or 0
                foreach ($priceWithSize as $key => $value) {
                    $value = !is_null($value) ? $value : 0;
                    DB::table('products_size_price')->insert([
                        'product_id' => $product->id,
                        'size_id' => $key,
                        'price' => $value,
                    ]);
                }
            }
            

            $productPrice = DB::table('products_size_price')->where('product_id', $product->id)->first();

            if ($request->pricenormal !== "") {
              
                Product::where('id', $product->id)->update(['price' =>  $request->pricenormal]);
            }
            else{
                Product::where('id', $product->id)->update(['price' =>  $productPrice]);

            }
        
    
           
            if (empty($errorArray)) {
                session()->flash('success', "service '" . $product->title . "' has been added successfully");
                DB::commit();
            } else {
                session()->flash('error', "Error while added the service '" . $product->title . "'");
                DB::rollBack();
            }
            return redirect(Helper::sitePrefix() . 'service/');
        } else {
            DB::rollBack();
            return back()->withInput($request->input())->withErrors("Error while updating the product");
        }
    }

    public function service_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update service";
        $product = Product::find($id);
        $locations = Location::active()->get();
        $selectedSector = $product->sector;
        if ($product) {
            $selectedServiceTypes = explode(',', $product->service_type);
            $categories = Category::active()->whereNull('parent_id')->get();
            $sizes = Size::active()->get();
            $subCategories = Category::whereIn('parent_id', explode(',', $product->category_id))->active()->where('id', '!=', $id)->get();
            $products = Product::active()->get();
            $productWithPrice = DB::table('products_size_price')->where('product_id',$id)->get();
            return view('Admin.product.form', compact('key', 'title', 'products', 'product','locations','categories','sizes','productWithPrice','selectedServiceTypes','subCategories','selectedSector'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function service_update(Request $request, $id)
    {

    // return  $request->all();
        DB::beginTransaction();
      $productShortExist = Product::where([['short_url', '=', $request->short_url], ['id', '!=', $id]])->count();
    //    if ($productShortExist != 0) {
    //         return back()->withInput($request->input())->withErrors("Short url '" . $request->short_url . "' already exist");
    //     } 

 
            $product = Product::find($id);
          
            $validatedData = $request->validate([
                'title' => 'required|min:2|max:255',
                'short_url' => 'required|:products,short_url,NULL,id,deleted_at,NULL|min:2|max:255',        
                // 'category' => 'required',
                'service_type' => 'required',
               'description' => 'required',
              
             
            ]);


           
            
            $product = Product::find($id);
            if ($request->hasFile('thumbnail_image')) {
                $product->thumbnail_image_webp = Helper::uploadWebpImage($request->thumbnail_image, 'uploads/product/image/webp/', $request->short_url);
                $product->thumbnail_image = Helper::uploadFile($request->thumbnail_image, 'uploads/product/image/', $request->short_url);
            }
            if ($request->hasFile('desktop_banner')) {
                $product->desktop_banner_webp = Helper::uploadWebpImage($request->desktop_banner, 'uploads/product/desktop_banner/webp/', $request->short_url);
                $product->desktop_banner = Helper::uploadFile($request->desktop_banner, 'uploads/product/desktop_banner/', $request->short_url);
            }
            if ($request->hasFile('mobile_banner')) {
                $product->mobile_banner_webp = Helper::uploadWebpImage($request->mobile_banner, 'uploads/product/mobile_banner/webp/', $request->short_url);
                $product->mobile_banner = Helper::uploadFile($request->mobile_banner, 'uploads/product/mobile_banner/', $request->short_url);
            }
           
           
    
            $product->title = $validatedData['title'];
            $product->short_url = $validatedData['short_url'];
            
          
            $product->location_id = ($request->location) ? implode(',', $request->location) : '';
        
            $product->service_type =  ($request->service_type) ? implode(',', $request->service_type) : '';
            $product->sector = $request->sector ?? '';
            
        
            $product->description = $validatedData['description'];
    
            $product->bags = $request->bags ?? '';
            $product->hours = $request->hours ?? '';
            
    
    
           $product->price = $request->pricenormal ?? '';
            $product->additional_price = $request->additional_price ?? '';
             $product->category_id = $request->category ?? '';
            $product->additional_hourly_price = $request->additional_hourly_price ?? '';
            $product->hourly_price = $request->hourly_price ?? '';
          
           
           
          
    
    
            
            $product->thumbnail_image_attribute = $request->image_meta_tag ?? '';
           
            $product->sub_category_id = ($request->sub_category) ? implode(',', $request->sub_category) : '';
    
    
            $product->meta_title = $request->meta_title ?? '';
            $product->meta_description = $request->meta_description ?? '';
            $product->meta_keyword = $request->meta_keyword ?? '';
            $product->other_meta_tag = $request->other_meta_tag ?? '';
    
            $product->updated_at = now();

            if ($product->save()) {

                $priceWithSize = $request->price;
            
                if (isset($priceWithSize) && !empty($priceWithSize)) {
                    // First, delete existing entries for the given product and sizes
                    DB::table('products_size_price')
                        ->where('product_id', $product->id)
                        ->whereIn('size_id', $request->size)
                        ->delete();
                    
                    // Now, insert entries, setting value to 0 if it is null or 0
                    foreach ($priceWithSize as $key => $value) {
                        $value = !is_null($value) ? $value : 0;
                        DB::table('products_size_price')->insert([
                            'product_id' => $product->id,
                            'size_id' => $key,
                            'price' => $value,
                        ]);
                    }
                }
                
                
                //  $priceWithSizep[] = $request->price;

              


                $productPrice = DB::table('products_size_price')->where('product_id', $product->id)->first();

                if ($request->pricenormal !== "") {
                  
                    Product::where('id', $product->id)->update(['price' =>  $request->pricenormal]);
                }
                else{
                    Product::where('id', $product->id)->update(['price' =>  $productPrice]);

                }


                if (empty($errorArray)) {
                    session()->flash('success', "service '" . $product->title . "' has been updated successfully");
                    DB::commit();
                } else {
                    session()->flash('error', "Error while updating the product '" . $product->title . "'");
                    DB::rollBack();
                }
                return redirect(Helper::sitePrefix() . 'service/');
            } else {
                DB::rollBack();
                return back()->withInput($request->input())->withErrors("Error while updating the product");
            }
        
    }

    public function delete_service(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $product = Product::find($request->id);
            if ($product) {
                if (File::exists(public_path($product->thumbnail_image))) {
                    File::delete(public_path($product->thumbnail_image));
                }
                if (File::exists(public_path($product->thumbnail_image_webp))) {
                    File::delete(public_path($product->thumbnail_image_webp));
                }
                if (File::exists(public_path($product->desktop_banner))) {
                    File::delete(public_path($product->desktop_banner));
                }
                if (File::exists(public_path($product->desktop_banner_webp))) {
                    File::delete(public_path($product->desktop_banner_webp));
                }
                if (File::exists(public_path($product->mobile_banner))) {
                    File::delete(public_path($product->mobile_banner));
                }
                if (File::exists(public_path($product->mobile_banner_webp))) {
                    File::delete(public_path($product->mobile_banner_webp));
                }
                if (File::exists(public_path($product->product_manual))) {
                    File::delete(public_path($product->product_manual));
                }
                if ($product->delete()) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }


    public function combinationArrays($chars, $size, $combinations = array())
    {
        if (empty($combinations)) {
            $combinations = $chars;
        }
        if ($size == 1) {
            return $combinations;
        }
        $new_combinations = array();
        foreach ($combinations as $combination) {
            foreach ($chars as $char) {
                if ($combination != $char) {
                    $new_combinations[$combination][] = $char;
                }
            }
        }
        return $this->combinationArrays($chars, $size - 1, $new_combinations);
    }


    public function gallery($product_id)
    {
        $product = Product::find($product_id);
        $title = " Gallery List - " . $product->title;
        $productGalleryList = ProductGallery::where('product_id', '=', $product_id)->get();
        return view('Admin.product.gallery.list', compact('productGalleryList', 'title', 'product_id'));
    }

    public function gallery_create($product_id)
    {
        $product = Product::find($product_id);
        $key = "Create";
        $title = "Create Product Gallery  - " . $product->title;
        return view('Admin.product.gallery.form', compact('key', 'title', 'product_id'));
    }

    public function gallery_store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'image_attribute' => 'required',
        ]);

        $product = Product::find($request->product_id);
        $sort_order = $product->activeGalleries->sortByDesc('sort_order')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $added_images = $not_added_images = 0;
        if ($request->media_type == "Image") {
            foreach ($request->image as $gallery_image) {
                $product_gallery = new ProductGallery;
                $product_gallery = $this->gallery_store_items($request, $gallery_image, $product_gallery, $product, $sort_number);
                $product_gallery->sort_order = $sort_number;
                if ($product_gallery->save()) {
                    $added_images++;
                } else {
                    $not_added_images++;
                }
                $sort_number++;
            }
        } else {
            $product_gallery = new ProductGallery;
            $gallery_image = $request->image;
            $product_gallery = $this->gallery_store_items($request, $gallery_image, $product_gallery, $product, $sort_number);
            $product_gallery->sort_order = $sort_number;
            if ($product_gallery->save()) {
                $added_images++;
            } else {
                $not_added_images++;
            }
        }

        if ($not_added_images == 0) {
            session()->flash('message', $added_images . " gallery images of Product '" . $product->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'product/gallery/' . $request->product_id);
        } else {
            return back()->with('message', 'Error while creating the product gallery');
        }
    }

    public function gallery_store_items(Request $request, $gallery_image, $product_gallery, $product, $sort_number)
    {
        $product_gallery->image_webp = Helper::uploadWebpImage($gallery_image, 'uploads/product/gallery/image/webp/', $product->short_url);
        $product_gallery->image = Helper::uploadFile($gallery_image, 'uploads/product/gallery/image/', $product->short_url,);
        $product_gallery->media_type = $request->media_type;
        if ($request->media_type == "Video") {
            $product_gallery->video_url = $request->video_url;
        }
        $product_gallery->product_id = $product->id;
        $product_gallery->image_attribute = $request->image_attribute;

        return $product_gallery;
    }

    public function gallery_edit($id)
    {
        $key = "Update";
        $product_gallery = ProductGallery::find($id);
        $title = "Update Product Gallery  - " . $product_gallery->product->title;
        if ($product_gallery) {
            $product_id = $product_gallery->product_id;
            return view('Admin.product.gallery.form', compact('key', 'product_gallery', 'title', 'product_id'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function gallery_update(Request $request, $id)
    {
        $product_gallery = ProductGallery::find($id);
        $product = Product::find($request->product_id);
        if ($request->hasFile('image')) {
            if (File::exists(public_path($product_gallery->image))) {
                File::delete(public_path($product_gallery->image));
            }
            if (File::exists(public_path($product_gallery->image_webp))) {
                File::delete(public_path($product_gallery->image_webp));
            }
            $product_gallery->image_webp = Helper::uploadWebpImage($request->image, 'uploads/product/gallery/image/webp/', $product->short_url);
            $product_gallery->image = Helper::uploadFile($request->image, 'uploads/product/gallery/image/', $product->short_url);
        }
        $product_gallery->media_type = $request->media_type;
        if ($request->media_type == "Video") {
            $product_gallery->video_url = $request->video_url;
        }
        $product_gallery->product_id = $request->product_id;
        $product_gallery->image_attribute = $request->image_attribute;
        $product_gallery->updated_at = now();
        if ($product_gallery->save()) {
            session()->flash('message', "Product gallery has been updated successfully");
            return redirect(Helper::sitePrefix() . 'product/gallery/' . $product->id);
        } else {
            return back()->with('message', 'Error while updating the gallery');
        }
    }

    public function delete_gallery(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $product_gallery = ProductGallery::find($request->id);
            if ($product_gallery) {
                if (File::exists(public_path($product_gallery->image))) {
                    File::delete(public_path($product_gallery->image));
                }
                if (File::exists(public_path($product_gallery->image_webp))) {
                    File::delete(public_path($product_gallery->image_webp));
                }
                if ($product_gallery->delete()) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    /****************** Overview section starts here ******************************/

    public function overview(Request $request, $id)
    {
        $key = "Create";
        $title = "Create Product Overview";
        $productOverview = ProductOverview::where('product_id', $id)->get();
        return view('Admin.product.overview.form', compact('key', 'title', 'id', 'productOverview'));

    }

    public function overview_store(Request $request, $id)
    {
        if (isset($request->extra_key[0]) && $request->extra_key[0] != NULL) {
            $detailId = $request->detail_id;
            $detailKey = $request->extra_key;
            $saved = [];
            $notSaved = [];
            for ($i = 0; $i < count($detailId); $i++) {
                if ($detailId[$i] == 0) {
                    $overview = new ProductOverview;
                    $overview->product_id = $request->product_id;
                    $overview->title = $detailKey[$i];
                    if ($overview->save()) {
                        $saved[] = 1;
                    } else {
                        $notSaved[] = 1;
                    }
                } else {
                    $overview = ProductOverview::find($detailId[$i]);
                    $overview->title = $detailKey[$i];
                    if ($overview->save()) {
                        $saved[] = 1;
                    } else {
                        $notSaved[] = 1;
                    }
                }
            }
            if (!empty($saved)) {
                session()->flash('success', "Overview has been updated successfully");
            } else {
                session()->flash('error', "Error while updating the Overview");
            }
        }
        return redirect(Helper::sitePrefix() . 'product/overview/' . $id);
    }

    public function overview_add_row(Request $request)
    {
        $primary_key = $request->unique_id + 1;
        return view('Admin.product.overview.extra_row', compact('primary_key'));
    }

    public function overview_remove_row(Request $request)
    {
        $productExtra = ProductOverview::find($request->id);
        if ($productExtra) {
            $deleted = $productExtra->delete();
            if ($deleted == true) {
                return response()->json(['status' => true]);
            } else {
                return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Not found']);
        }
    }


    /****************** Specification section starts here ******************************/

    public function specificationInformationStore(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'title' => 'required|min:2|max:30',
            'description' => 'required'
        ]);

        $product = Product::find($request->product_id);
        if($product)
        {
            if ($request->hasFile('image')) {
                Helper::deleteFile($product, 'specification_image');
                Helper::deleteFile($product, 'specification_image_webp');

                $product->specification_image_webp = Helper::uploadWebpImage($request->image, 'uploads/product/specification_info/webp/', $request->title);
                $product->specification_image = Helper::uploadFile($request->image, 'uploads/product/specification_info/', $request->title);
            }
            $product->specification_title = $request->title;
            $product->specification_image_attribute = $request->image_attribute;
            $product->specification_description = $request->description;
            if($product->save())
            {
                session()->flash('success', 'Product specification details has been updated successfully');
                return back();
            }
            else {
                return back()->with('error', 'Error while updating the Product specification details');
            }
        }
        else {
            return back()->with('error', 'Error while updating the Product specification details');
        }
    }

    public function specification($product_id)
    {
        $key = "Create";
        $title = "Create Product Specification";
        $product = Product::find($product_id);
        $productSpecificationHeads = ProductSpecificationHead::where('product_id', $product_id)->get();
        return view('Admin.product.specification.list', compact('key', 'title', 'product_id', 'productSpecificationHeads', 'product'));
    }

    public function specification_create($product_id)
    {
        $title = "Product Specification List";
        return view('Admin.product.specification.product_specification', compact('title', 'product_id'));
    }

    public function specification_store(Request $request)
    {
        if (isset($request->extra_title[0]) && $request->extra_value[0] != NULL) {
            if ($request->id == 0) {
                $head = new ProductSpecificationHead;
            } else {
                $head = ProductSpecificationHead::find($request->id);
                $head->updated_at = date('Y-m-d:h-i-s');
            }
            $head->product_id = $request->product_id;
            $head->title = $request->title;
            $sort_order = ProductSpecificationHead::where('product_id', $request->product_id)->latest('sort_order')->first();
            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }
            $head->sort_order = $sort_number;
            if ($head->save()) {

                $saved = $this->store_specifications($request, $head);
                if (!empty($saved)) {
                    session()->flash('success', "Specification has been updated successfully");
                } else {
                    session()->flash('error', "Error while updating the specification");
                }
            }
            return redirect(Helper::sitePrefix() . 'product/specification/' . $request->product_id);
        }
    }


    public function store_specifications(Request $request, $head)
    {
        $detailId = $request->detail_id;
        $detailTitle = $request->extra_title;
        $detialValue = $request->extra_value;
        $detailSortOrder = $request->sort_order;
        $saved = [];
        $notSaved = [];
        for ($i = 0; $i < count($detailId); $i++) {
            if ($detailId[$i] == 0) {
                $detail = new ProductSpecification;
                $detail->head_id = $head->id;
            } else {
                $detail = ProductSpecification::find($detailId[$i]);
            }
            $detail->title = $detailTitle[$i];
            $detail->value = $detialValue[$i];
            $detail->sort_order = $detailSortOrder[$i];
            if ($detail->save()) {
                $saved[] = 1;
            } else {
                $notSaved[] = 1;
            }
        }
        return $saved;
    }

    public function specification_row(Request $request)
    {
        $primary_key = $request->unique_id + 1;
        return view('Admin.product.specification.product_extra_content', compact('primary_key'));
    }


    public function remove_specification_row(Request $request)
    {
        $productExtra = ProductSpecification::find($request->id);
        if ($productExtra) {
            $deleted = $productExtra->delete();
            if ($deleted == true) {
                echo(json_encode(array('status' => true)));
            } else {
                echo(json_encode(array('status' => false, 'message' => 'Some error occurred,please try after sometime')));
            }
        } else {
            echo(json_encode(array('status' => false, 'message' => 'Not found')));
        }
    }


    public function specification_edit($id)
    {
        $title = "Product Specification List";
        $specificationHead = ProductSpecificationHead::find($id);
        $product_id = $specificationHead->product_id;
        $productSpecification = ProductSpecification::where([['status', 'Active'], ['head_id', $id]])->get();
        // dd($productSpecification);
        return view('Admin.product.specification.product_specification', compact('specificationHead', 'title', 'product_id', 'productSpecification'));
    }

    public function specification_update(Request $request, $id)
    {
        if (isset($request->extra_title[0]) && $request->extra_value[0] != NULL) {
            if ($id == 0) {
                $head = new ProductSpecificationHead;
            } else {
                $head = ProductSpecificationHead::find($id);
                $head->updated_at = now();
            }
            $head->product_id = $request->product_id;
            $head->title = $request->title;
            if ($head->save()) {
                $saved = $this->store_specifications($request, $head);
                if (!empty($saved)) {
                    session()->flash('success', "Specification has been updated successfully");
                } else {
                    session()->flash('error', "Error while updating the specification");
                }
            }
            return redirect(Helper::sitePrefix() . 'product/specification/' . $request->product_id);
        }
    }


    public function delete_specification(Request $request)
    {

        if (isset($request->id) && $request->id != null) {
            $speciicationhead = ProductSpecificationHead::find($request->id);
            if ($speciicationhead) {
                $speciications = ProductSpecification::where('head_id', $request->id)->count();
                if ($speciications > 0) {
                    $speciications = ProductSpecification::where('head_id', $request->id)->delete();
                }
                $deleted = $speciicationhead->delete();
                if ($deleted == true) {
                    echo(json_encode(array('status' => true)));
                } else {
                    echo(json_encode(array('status' => false, 'message' => 'Some error occurred,please try after sometime')));
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo(json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }


    public function offer($product_id)
    {
        $product = Product::find($product_id);
        if ($product) {
            $title = "Offer List - " . $product->title;
            $offerList = Offer::where('product_id', $product_id)->get();
            return view('Admin.product.offer.list', compact('offerList', 'title', 'product_id', 'product'));
        } else {
            abort(404, 'Product variant not found');
        }
    }

    public function offer_create($product_id)
    {
        $product = Product::find($product_id);
        if ($product) {
            $key = "Create";
            $title = "Create Offer";
            return view('Admin.product.offer.form', compact('key', 'title', 'product'));
        } else {
            abort(404, 'Product variant not found');
        }
    }

    public function offer_store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $offer = new Offer;
        $offer->title = $validatedData['title'];
        $offer->product_id = $validatedData['product_id'];
        $offer->price = $validatedData['price'];
        $offer->start_date = $validatedData['start_date'];
        $offer->end_date = $validatedData['end_date'];
        $offer->sale_condition = ($request->sale_condition) ? $request->sale_condition : '';

        $activeOffer = Offer::active()->where('product_id', $validatedData['product_id'])->first();
        if ($activeOffer) {
            $activeOffer->status = 'Inactive';
            $activeOffer->save();
        }

        if ($offer->save()) {
            session()->flash('message', "Offer '" . $offer->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'product/offer/' . $request->product_id);
        } else {
            return back()->with('message', 'Error while creating the offer');
        }
    }

    public function offer_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Offer";
        $offer = Offer::find($id);
        if ($offer) {
            $product = Product::find($offer->product_id);
            return view('Admin.product.offer.form', compact('key', 'offer', 'title', 'product'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function offer_update(Request $request, $id)
    {
        $offer = Offer::find($id);
        $validatedData = $request->validate([
            'product_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            // 'sale_condition' => 'required',
        ]);
        $offer->title = $validatedData['title'];
        $offer->product_id = $validatedData['product_id'];
        $offer->price = $validatedData['price'];
        $offer->start_date = $validatedData['start_date'];
        $offer->end_date = $validatedData['end_date'];
        $offer->sale_condition = ($request->sale_condition) ? $request->sale_condition : '';
        $offer->updated_at = date('Y-m-d h:i:s');

        if ($offer->save()) {
            session()->flash('message', "Offer '" . $offer->title . "' has been updated successfully");
            return redirect(Helper::sitePrefix() . 'product/offer/' . $request->product_id);
        } else {
            return back()->with('message', 'Error while updating the offer');
        }
    }

    public function delete_offer(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $offer = Offer::find($request->id);
            if ($offer) {
                if ($offer->delete()) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occured,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }


    public function review_list()
    {
        $title = "Review List";
        $reviewList = ProductReview::latest()->get();
        return view('Admin.product.review.list', compact('reviewList', 'title'));

    }

    public function review_view($id)
    {

        $title = "View Review";
        $review = ProductReview::find($id);
        if ($review != null) {
            return view('Admin.product.review.view', compact('review', 'title'));
        } else {
            return view('backend.error.404');
        }
    }

    public function delete_review(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $review = ProductReview::find($request->id);
            if ($review) {
                $deleted = $review->delete();
                if ($deleted == true) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }


    public function key_feature($product_id)
    {
        $product = Product::find($product_id);
        $title = " Key Feature List - " . $product->title;
        $productKeyFeatureList = ProductKeyFeature::where('product_id', '=', $product_id)->get();
        return view('Admin.product.key_feature.list', compact('productKeyFeatureList', 'title', 'product_id'));
    }

    public function key_feature_create($product_id)
    {
        $product = Product::find($product_id);
        $key = "Create";
        $title = "Create Product Key Feature  - " . $product->title;
        return view('Admin.product.key_feature.form', compact('key', 'title', 'product_id'));
    }

    public function key_feature_store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:230',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:512',
            'image_attribute' => 'required',
        ]);
        $product = Product::find($request->product_id);
        $feature = new ProductKeyFeature();
        if ($request->hasFile('image')) {
            $feature->image_webp = Helper::uploadWebpImage($request->image, 'uploads/product/key_fature/webp/', $request->title);
            $feature->image = Helper::uploadFile($request->image, 'uploads/product/key_feature/image/', $request->title);
        }
        $feature->title = $request->title;
        $feature->description = $request->description;
        $feature->video_url = $request->video_url;
        $feature->product_id = $request->product_id;
        $feature->image_attribute = $request->image_attribute;
        $sort_order = $product->activeKeyfeatures->sortByDesc('sort_order')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $feature->sort_order = $sort_number;
        if ($feature->save()) {
            session()->flash('success', "Key Feature has been added successfully");
            return redirect(Helper::sitePrefix() . 'product/key-feature/' . $request->product_id);
        } else {
            return back()->with('success', 'Error while creating the Key Feature');
        }

    }

    public function key_feature_edit(Request $request, $id)
    {
        $key = "Update";
        $feature = ProductKeyFeature::find($id);
        $title = "Update Key Feature";
        if ($feature) {
            $product_id = $feature->product_id;
            $product = Product::find($product_id);
            return view('Admin.product.key_feature.form', compact('key', 'product', 'title', 'product_id', 'feature'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function key_feature_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:230',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:512',
            'image_attribute' => 'required',
        ]);
        $feature = ProductKeyFeature::find($id);
        $feature->title = $request->title;
        $feature->description = $request->description;
        $feature->video_url = $request->video_url;
        $feature->product_id = $request->product_id;
        $feature->image_attribute = $request->image_attribute;
        $feature->updated_at = date('Y-m-d h:i:s');
        if ($request->hasFile('image')) {
            if (File::exists(public_path($feature->image))) {
                File::delete(public_path($feature->image));
            }
          
            $feature->image_webp = Helper::uploadWebpImage($request->image, 'uploads/product/key_fature/webp/', $request->title);
            $feature->image = Helper::uploadFile($request->image, 'uploads/product/key_feature/image/', $request->title);
        }
        if ($feature->save()) {
            session()->flash('success', "Key Feature has been updated successfully");
            return redirect(Helper::sitePrefix() . 'product/key-feature/' . $request->product_id);
        } else {
            return back()->with('success', 'Error while creating the Key Feature');
        }
    }


    public function delete_key_feature(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $feature = ProductKeyFeature::find($request->id);
            if ($feature) {
                Helper::deleteFile($feature, 'image');
                Helper::deleteFile($feature, 'image_webp');
                $deleted = $feature->delete();
                if ($deleted == true) {
                    echo(json_encode(array('status' => true)));
                } else {
                    echo(json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo(json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo(json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }


}
