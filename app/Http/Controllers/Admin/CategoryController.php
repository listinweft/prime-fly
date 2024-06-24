<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Category;
use App\Models\CategoryGallery;
use App\Models\HomeHeading;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }


    // In your CategoryController
public function getCategoryDetails(Request $request)
{
    $categoryId = $request->query('category_id');
    $category = Category::find($categoryId);

    if ($category) {
        return response()->json([
            'age_range' => $category->age_range,
        ]);
    } else {
        return response()->json(['message' => 'Category not found'], 404);
    }
}

    public function category_list()
    {
        $title = "Category List";
        $categoryList = Category::whereNull('parent_id')->get();
        $home_heading = HomeHeading::type('category')->first();
        $type = 'Category';
        $urlType = 'category';
        return view('Admin.product.category.list', compact('categoryList', 'title', 'type', 'urlType', 'home_heading'));
    }

    public function category_create()
    {
        $key = "Create";
        $title = "Create Category";
        $type = 'Category';
        $urlType = 'category';
        $typeFlag = 'category';
        return view('Admin.product.category.form', compact('key', 'title', 'type', 'urlType', 'typeFlag'));
    }

    public function category_store(Request $request)
    {

        // return $request->all();


        // $validatedData = $request->validate([
           
        //     'short_url' => 'required|unique:categories,short_url,NULL,id,NULL',
            
        // ]);
        $category = new Category;

        if ($request->hasFile('image')) {
            $category->image_webp = Helper::uploadWebpImage($request->image, 'uploads/category/image/webp/', $request->short_url);
            $category->image = Helper::uploadFile($request->image, 'uploads/category/image/', $request->short_url);
        }
        if ($request->hasFile('icon')) {
            $category->icon = Helper::uploadWebpImage($request->image, 'uploads/category/image/webp/', $request->short_url);
            $category->icon_webp = Helper::uploadFile($request->image, 'uploads/category/image/', $request->short_url);
        }
        if ($request->hasFile('desktop_banner')) {
            if (File::exists(public_path($category->desktop_banner))) {
                File::delete(public_path($category->desktop_banner));
            }
            if (File::exists(public_path($category->desktop_banner_webp))) {
                File::delete(public_path($category->desktop_banner_webp));
            }
            $category->desktop_banner_webp = Helper::uploadWebpImage($request->desktop_banner, 'uploads/category/desktop_banner/webp/', $request->short_url);
            $category->desktop_banner = Helper::uploadFile($request->desktop_banner, 'uploads/category/desktop_banner/', $request->short_url);
        }
       
        $category->title = $request->title ?? '';
        $category->short_url = $request->short_url ?? '';
        $category->parent_id = null;
        $category->image_attribute = $request->image_attribute ?? '';
        $category->banner_attribute = $request->banner_attribute ?? '';
        $category->banner_title = $request->banner_title ?? '';
        $category->banner_sub_title = $request->banner_sub_title ?? '';
        $meta_title =  $category->meta_title = $request->meta_title ?? '';
        $meta_description = $category->meta_description = $request->meta_description ?? '';
        $meta_keyword=  $category->meta_keyword = $request->meta_keyword ?? '';
        $other_meta_tag = $category->other_meta_tag = $request->other_meta_tag ?? '';
        if($meta_title==''){
            $category->meta_title = strtoupper($request->title) ;
         }
         else{
            $category->meta_title = $request->meta_title ?? '';
         }
         if($meta_description==''){
            $category->meta_description = strtoupper($request->title) ;
         }
         else{
            $category->meta_description = $request->meta_description ?? '';
         }
         if($meta_keyword==''){
            $category->meta_keyword = strtoupper($request->title) ;
         }
         else{
            $category->meta_keyword = $request->meta_keyword ?? '';
         }
         if($other_meta_tag==''){
            $category->other_meta_tag = strtoupper($request->title) ;
         }
         else{
            $category->other_meta_tag = $request->other_meta_tag ?? '';
         }



        if ($category->save()) {
            session()->flash('message', "Category '" . $category->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'product/category');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function category_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update category";
        $category = Category::find($id);
        $type = 'Category';
        $urlType = 'category';
        $typeFlag = 'category';
        if ($category) {
            return view('Admin.product.category.form', compact('key', 'category', 'title', 'type', 'urlType', 'typeFlag'));
        } else {
            return view('backend.error.404');
        }
    }

    public function category_update(Request $request, $id)
    {
        $category = Category::find($id);
        // $validatedData = $request->validate([
        //     'title' => 'required|min:2|max:255',
        //     'short_url' => 'required',
            
        // ]);
        if ($request->hasFile('image')) {
            $category->image_webp = Helper::uploadWebpImage($request->image, 'uploads/category/image/webp/', $request->short_url);
            $category->image = Helper::uploadFile($request->image, 'uploads/category/image/', $request->short_url);
        }
        if ($request->hasFile('icon')) {
            $category->icon = Helper::uploadWebpImage($request->icon, 'uploads/category/image/webp/', $request->short_url);
            $category->icon_webp = Helper::uploadFile($request->icon, 'uploads/category/image/', $request->short_url);
        }
        if ($request->hasFile('desktop_banner')) {
            if (File::exists(public_path($category->desktop_banner))) {
                File::delete(public_path($category->desktop_banner));
            }
            if (File::exists(public_path($category->desktop_banner_webp))) {
                File::delete(public_path($category->desktop_banner_webp));
            }
            $category->desktop_banner_webp = Helper::uploadWebpImage($request->desktop_banner, 'uploads/category/desktop_banner/webp/', $request->short_url);
            $category->desktop_banner = Helper::uploadFile($request->desktop_banner, 'uploads/category/desktop_banner/', $request->short_url);
        }
        $category->title = $request->title ?? '';
        $category->short_url = $request->short_url ?? '';
        $category->parent_id = null;
        $category->image_attribute = $request->image_attribute ?? '';
        $category->banner_attribute = $request->banner_attribute ?? '';
        $category->banner_title = $request->banner_title ?? '';
        $category->banner_sub_title = $request->banner_sub_title ?? '';
        $meta_title =  $category->meta_title = $request->meta_title ?? '';
        $meta_description =  $category->meta_description = $request->meta_description ?? '';
        $meta_keyword = $category->meta_keyword = $request->meta_keyword ?? '';
        $other_meta_tag = $category->other_meta_tag = $request->other_meta_tag ?? '';
        $category->updated_at = now();

        if($meta_title==''){
            $category->meta_title =  strtoupper($request->title) ;
         }
         else{
            $category->meta_title = $request->meta_title ?? '';
         }
         if($meta_description==''){
            $category->meta_description =  strtoupper($request->title) ;
         }
         else{
            $category->meta_description = $request->meta_description ?? '';
         }
         if($meta_keyword==''){
            $category->meta_keyword = strtoupper($request->title) ;
         }
         else{
            $category->meta_keyword = $request->meta_keyword ?? '';
         }
         if($other_meta_tag==''){
            $category->other_meta_tag =  strtoupper($request->title) ;
         }
         else{
            $category->other_meta_tag = $request->other_meta_tag ?? '';
         }

        if ($category->save()) {
            session()->flash('message', "Category '" . $category->title . "' has been updated successfully");
            return redirect(Helper::sitePrefix() . 'product/category');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_category(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $category = Category::find($request->id);
            if ($category) {
                $childCategory = Category::where('parent_id', $request->id)->count();
                if ($childCategory > 0) {
                    return response()->json(['status' => false, 'message' => 'Error : Category "' . $category->title . '" has child entries']);
                } else {
                    if (File::exists(public_path($category->image))) {
                        File::delete(public_path($category->image));
                    }
                    if (File::exists(public_path($category->image_webp))) {
                        File::delete(public_path($category->image_webp));
                    }
                    if (File::exists(public_path($category->desktop_banner))) {
                        File::delete(public_path($category->desktop_banner));
                    }
                    if (File::exists(public_path($category->desktop_banner_webp))) {
                        File::delete(public_path($category->desktop_banner_webp));
                    }
                    if (File::exists(public_path($category->mobile_banner))) {
                        File::delete(public_path($category->mobile_banner));
                    }
                    if (File::exists(public_path($category->mobile_banner_webp))) {
                        File::delete(public_path($category->mobile_banner_webp));
                    }
                    if ($category->Delete()) {
                        return response()->json(['status' => true]);
                    } else {
                        return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                    }
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    /********************** Sub-category ********************************/

    public function sub_category_list()
    {
        $title = "Sub Category List";
        $type = 'Sub Category';
        $urlType = 'sub-category';
        $heading = HomeHeading::first();
        $categoryList = Category::whereNotNull('parent_id')->get();
        return view('Admin.product.category.list', compact('categoryList', 'title', 'type', 'urlType', 'heading'));
    }

    public function sub_category_create()
    {
        $key = "Create";
        $title = "Create sub category";
        $type = "Sub Category";
        $urlType = 'sub-category';
        $typeFlag = 'sub_category';
        $parentCategories = Category::active()->whereNull('parent_id')->get();
        return view('Admin.product.category.form', compact('key', 'title', 'type', 'parentCategories', 'urlType', 'typeFlag'));
    }

    public function sub_category_store(Request $request)
    {

    
        // $validatedData = $request->validate([
        //     'title' => 'required|min:2|max:255',
        //     'parent_id' => 'required',
            
        // ]);
        $sub_category = new Category;
       
        $sub_category->title = $request->title ?? '';
        $sub_category->parent_id =  $request->parent_id;
        $sub_category->short_url =  $request->short_url ?? '';
        $sub_category->image_attribute = $request->image_attribute ?? '';
        $sub_category->banner_attribute = $request->banner_attribute ?? '';
        $sub_category->banner_title = $request->banner_title ?? '';
        $sub_category->banner_sub_title = $request->banner_sub_title ?? '';
        $meta_title = $sub_category->meta_title = ($request->meta_title) ? $request->meta_title : '';
        $meta_description =  $sub_category->meta_description = ($request->meta_description) ? $request->meta_description : '';
        $meta_keyword = $sub_category->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
        $other_meta_tag =  $sub_category->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';

        if($meta_title==''){
            $sub_category->meta_title = strtoupper( $request->title) ;
         }
         else{
            $sub_category->meta_title = $request->meta_title ?? '';
         }
         if($meta_description==''){
            $sub_category->meta_description = strtoupper( $request->title) ;
         }
         else{
            $sub_category->meta_description = $request->meta_description ?? '';
         }
         if($meta_keyword==''){
            $sub_category->meta_keyword = strtoupper( $request->title) ;
         }
         else{
            $sub_category->meta_keyword = $request->meta_keyword ?? '';
         }
         if($other_meta_tag==''){
            $sub_category->other_meta_tag = strtoupper( $request->title) ;
         }
         else{
            $sub_category->other_meta_tag = $request->other_meta_tag ?? '';
         }
        if ($sub_category->save()) {
            session()->flash('message', "Sub-category '" . $sub_category->title . "' has been added successfully");
            return redirect(Helper::sitePrefix() . 'product/sub-category/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function sub_category_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Sub-category";
        $type = 'Sub Category';
        $urlType = 'sub-category';
        $typeFlag = 'sub_category';
        $category = Category::find($id);
        if ($category) {
            $parentCategories = Category::active()->whereNull('parent_id')->get();
            return view('Admin.product.category.form', compact('key', 'parentCategories', 'title', 'type', 'category', 'urlType', 'typeFlag'));
        } else {
            return view('backend.error.404');
        }
    }

    public function sub_category_update(Request $request, $id)
    {
        $sub_category = Category::find($id);
        $validatedData = $request->validate([
            'parent_id' => 'required',
            'title' => 'required|min:2|max:255',
           
        ]);
       
        $sub_category->title = $request->title ?? '';
        $sub_category->parent_id =  $request->parent_id;
        $sub_category->short_url =  $request->short_url ?? '';
        $sub_category->image_attribute = $request->image_attribute ?? '';
        $sub_category->banner_attribute = $request->banner_attribute ?? '';
        $sub_category->banner_title = $request->banner_title ?? '';
        $sub_category->banner_sub_title = $request->banner_sub_title ?? '';
        $meta_title =  $sub_category->meta_title = ($request->meta_title) ? $request->meta_title : '';
        $meta_description = $sub_category->meta_description = ($request->meta_description) ? $request->meta_description : '';
        $meta_keyword =  $sub_category->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
        $other_meta_tag = $sub_category->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
        $sub_category->updated_at = now();

        if($meta_title==''){
            $sub_category->meta_title = strtoupper( $request->title) ;
         }
         else{
            $sub_category->meta_title = $request->meta_title ?? '';
         }
         if($meta_description==''){
            $sub_category->meta_description = strtoupper( $request->title) ;
         }
         else{
            $sub_category->meta_description = $request->meta_description ?? '';
         }
         if($meta_keyword==''){
            $sub_category->meta_keyword = strtoupper( $request->title) ;
         }
         else{
            $sub_category->meta_keyword = $request->meta_keyword ?? '';
         }
         if($other_meta_tag==''){
            $sub_category->other_meta_tag = strtoupper( $request->title) ;
         }
         else{
            $sub_category->other_meta_tag = $request->other_meta_tag ?? '';
         }
        if ($sub_category->save()) {
            session()->flash('message', "Sub-category '" . $sub_category->title . "' has been updated successfully");
            return redirect(Helper::sitePrefix() . 'product/sub-category');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_sub_category(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $sub_category = Category::find($request->id);
            if ($sub_category) {
                if (File::exists(public_path($sub_category->image))) {
                    File::delete(public_path($sub_category->image));
                }
                if (File::exists(public_path($sub_category->image_webp))) {
                    File::delete(public_path($sub_category->image_webp));
                }
                if (File::exists(public_path($sub_category->desktop_banner))) {
                    File::delete(public_path($sub_category->desktop_banner));
                }
                if (File::exists(public_path($sub_category->desktop_banner_webp))) {
                    File::delete(public_path($sub_category->desktop_banner_webp));
                }
                if (File::exists(public_path($sub_category->mobile_banner))) {
                    File::delete(public_path($sub_category->mobile_banner));
                }
                if (File::exists(public_path($sub_category->mobile_banner_webp))) {
                    File::delete(public_path($sub_category->mobile_banner_webp));
                }
                if ($sub_category->forceDelete()) {
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



    public function location_gallery_list($product_id)
    {
        $product = $category = Category::where('id', $product_id)
        ->whereNotNull('parent_id')
        ->first();

        $title = " Gallery List - " . $product->title;
        $productGalleryList = CategoryGallery::where('category_id', '=', $product_id)->get();
        return view('Admin.subcategory.gallery.list', compact('productGalleryList', 'title', 'product_id'));
    }


    public function location_gallery_create($product_id)
    {
        $product = $category = Category::where('id', $product_id)
                     ->whereNotNull('parent_id')
                     ->first();
        $key = "Create";
        $title = "Create Product Gallery  - " . $product->title;
        return view('Admin.subcategory.gallery.form', compact('key', 'title', 'product_id'));
    }
    
    public function location_gallery_store(Request $request)
    {

         $request->product_id;
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'image_attribute' => 'required',
        ]);

        $product = $category = Category::where('id', $request->product_id)
        ->whereNotNull('parent_id')
        ->first();
        $sort_order = $product->activeGalleries->sortByDesc('sort_order')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }

        $added_images = $not_added_images = 0;
        if ($request->media_type == "Image") {
            foreach ($request->image as $gallery_image) {
                $product_gallery = new CategoryGallery;
                $product_gallery = $this->location_gallery_store_items($request, $gallery_image, $product_gallery, $product, $sort_number);
                $product_gallery->sort_order = $sort_number;
                if ($product_gallery->save()) {
                    $added_images++;
                } else {
                    $not_added_images++;
                }
                $sort_number++;
            }
        } else {
            $product_gallery = new CategoryGallery;
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
            return redirect(Helper::sitePrefix() . 'product/sub-category/gallery/' . $request->product_id);
        } else {
            return back()->with('message', 'Error while creating the product gallery');
        }
    }

    public function location_gallery_store_items(Request $request, $gallery_image, $product_gallery, $product, $sort_number)
    {
        $product_gallery->image_webp = Helper::uploadWebpImage($gallery_image, 'uploads/product/gallery/image/webp/', $product->short_url);
        $product_gallery->image = Helper::uploadFile($gallery_image, 'uploads/product/gallery/image/', $product->short_url,);
        $product_gallery->media_type = $request->media_type;
        if ($request->media_type == "Video") {
            $product_gallery->video_url = $request->video_url;
        }
        $product_gallery->title = $request->title;
        $product_gallery->description = $request->description;
        $product_gallery->category_id = $product->id;
        $product_gallery->image_attribute = $request->image_attribute;

        return $product_gallery;
    }

    public function location_gallery_edit($id)
    {
        $key = "Update";
        $product_gallery = CategoryGallery::find($id);
         $title = "Update  Gallery  - " . $product_gallery->gallerydata->title;
        
        if ($product_gallery) {
            $product_id = $product_gallery->category_id;
            return view('Admin.subcategory.gallery.form', compact('key', 'product_gallery', 'title', 'product_id'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function location_gallery_update(Request $request, $id)
    {
        $product_gallery = CategoryGallery::find($id);
        $product = $category = Category::where('id', $product_gallery->category_id)
        ->whereNotNull('parent_id')
        ->first();
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
        $product_gallery->title = $request->title;
        $product_gallery->description = $request->description;
        $product_gallery->category_id = $request->product_id;
        $product_gallery->image_attribute = $request->image_attribute;
        $product_gallery->updated_at = now();
        if ($product_gallery->save()) {
            session()->flash('message', " gallery has been updated successfully");
            return redirect(Helper::sitePrefix() . 'product/sub-category/gallery/' . $product->id);
        } else {
            return back()->with('message', 'Error while updating the gallery');
        }
    }

    public function location_delete_gallery(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $product_gallery = CategoryGallery::find($request->id);
            if ($product_gallery) {
                if (File::exists(public_path($product_gallery->image))) {
                    File::delete(public_path($product_gallery->image));
                }
                if (File::exists(public_path($product_gallery->image_webp))) {
                    File::delete(public_path($product_gallery->image_webp));
                }
                if ($product_gallery->forceDelete()) {
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
}
