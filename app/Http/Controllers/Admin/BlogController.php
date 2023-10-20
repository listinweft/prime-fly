<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Blog;
use App\Models\HomeHeading;
use App\Models\CustomerPost;
use App\Models\Customer;
use App\Models\User;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function blog()
    {
        $title = "Blog List";
        $home_heading = HomeHeading::type('blog')->first();
        $type = 'Blog';
        $blogList = Blog::get();
        return view('Admin.blog.list', compact('blogList', 'title', 'type', 'home_heading'));
    }

    public function show($id)
    {
        // Logic to retrieve and display the blog item with the given ID
        $customerPost = CustomerPost::findOrFail($id);
    
        // Extract the file path and generate the file name
        $filePath = public_path($customerPost->pdf_data);
        $fileName = 'pdf_' . $customerPost->type . '_' . $id . '.pdf';
    
        // Check if the file exists
        if (file_exists($filePath)) {
            // Set the headers for file download
            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            ];
    
            // Serve the file for download
            return response()->file($filePath, $headers);
        } else {
            // Handle the case where the file doesn't exist
            return response()->json(['error' => 'File not found'], 404);
        }
    }
    

    public function custome_blog()
    {
        $title = "Members Blog List";
        // $home_heading = HomeHeading::type('blog')->first();
        $type = 'Blog';
        $blogList = CustomerPost::get();

      

        return view('Admin.blog.list_customer', compact('blogList', 'title', 'type',));
    }

    public function blog_create()
    {
        $key = "Create";
        $title = "Create Blog";
        $user = null;
         $customers = Customer::get();

    // Extract first names from the associated users
  
        return view('Admin.blog.form', compact('key', 'title','customers','user'));
    }

    public function blog_store(Request $request)
    {
      
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:230',
            'short_url'=>'required|unique:blogs,short_url,NULL,id,deleted_at,NULL|min:2|max:255',
            'description' => 'required',
            'posted_date' => 'required',
            'author' => 'required',
            'user_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:7990',
        ]);
        $blog = new Blog;
        if ($request->hasFile('image')) {
            $blog->image_webp = Helper::uploadWebpImage($request->image, 'uploads/blog/webp_image/', $request->title);
            $blog->image = Helper::uploadFile($request->image, 'uploads/blog/image/', $request->title);
        }

        if ($request->hasFile('author_image')) {
            $blog->author_image_webp = Helper::uploadWebpImage($request->author_image, 'uploads/blog/author_webp_image/', $request->title);
            $blog->author_image = Helper::uploadFile($request->author_image, 'uploads/blog/author_image/', $request->title);
        }

        if ($request->hasFile('video_thumbnail')) {
            $blog->video_thumbnail_image_webp = Helper::uploadWebpImage($request->video_thumbnail, 'uploads/blog/video_thumbnail_webp_image/', $request->short_url);
            $blog->video_thumbnail_image = Helper::uploadFile($request->video_thumbnail, 'uploads/blog/video_thumbnail_image/', $request->short_url);
        }

        if ($request->hasFile('desktop_banner')) {
            $blog->desktop_banner_webp = Helper::uploadWebpImage($request->desktop_banner, 'uploads/blog/desktop_webp_banner/', $request->title);
            $blog->desktop_banner = Helper::uploadFile($request->desktop_banner, 'uploads/blog/desktop_banner/', $request->title);
        }

        if ($request->hasFile('mobile_banner')) {
            $blog->mobile_banner_webp = Helper::uploadWebpImage($request->mobile_banner, 'uploads/blog/mobile_webp_banner/', $request->title);
            $blog->mobile_banner = Helper::uploadFile($request->mobile_banner, 'uploads/blog/mobile_banner/', $request->title);
        }

        $blog->title = $validatedData['title'];
        $blog->user_id = $validatedData['user_id'];
        $blog->short_url = $validatedData['short_url'];
        $blog->description = $validatedData['description'];
        $blog->author = $validatedData['author'];
        $blog->posted_date = $validatedData['posted_date'];
        $blog->sub_title = $request->sub_title ?? '';
        $blog->alternate_description = $request->alternate_description ?? '';
        $blog->video_url = $request->video_url ?? '';
        $blog->image_attribute = $request->image_attribute ?? '';
        $blog->video_thumbnail_image_attribute = $request->video_thumbnail_attribute ?? '';
//        $blog->banner_title = $request->banner_title ?? '';
//        $blog->banner_sub_title = $request->banner_sub_title ?? '';
     $blog->banner_attribute = $request->banner_attribute ?? '';
       $meta_title =    $blog->meta_title = ($request->meta_title) ? $request->meta_title : '';
       $meta_description =   $blog->meta_description = ($request->meta_description) ? $request->meta_description : '';
       $meta_keyword =   $blog->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
       $other_meta_tag =   $blog->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';

        if($meta_title==''){
            $blog->meta_title = strtoupper($validatedData['title']) ;
         }
         else{
            $blog->meta_title = $request->meta_title ?? '';
         }
         if($meta_description==''){
            $blog->meta_description = strtoupper($validatedData['title']) ;
         }
         else{
            $blog->meta_description = $request->meta_description ?? '';
         }
         if($meta_keyword==''){
            $blog->meta_keyword = strtoupper($validatedData['title']) ;
         }
         else{
            $blog->meta_keyword = $request->meta_keyword ?? '';
         }
         if($other_meta_tag==''){
            $blog->other_meta_tag = strtoupper($validatedData['title']) ;
         }
         else{
            $blog->other_meta_tag = $request->other_meta_tag ?? '';
         }


        if ($blog->save()) {
            session()->flash('success', 'Blog "' . $request->title . '" has been added successfully');
            return redirect(Helper::sitePrefix() . 'blog/');
        } else {
            return back()->with('message', 'Error while creating blog');
        }
    }

    public function blog_edit($id)
    {
        $key = "Update";
        $title = "Blog Update";
        $blog = Blog::find($id);
        $user = $blog->user_id;
        $customers = Customer::get();
        if ($blog != null) {
            return view('Admin.blog.form', compact('key', 'blog', 'title','user','customers'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function blog_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:230',
            'short_url'=>'required|unique:blogs,short_url,' . $id . ',id,deleted_at,NULL|min:2|max:255',
            'description' => 'required',
            'posted_date' => 'required',
            'author' => 'required',
            'user_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:7990',
        ]);
        $blog = Blog::find($id);
        if ($request->hasFile('image')) {
            Helper::deleteFile($blog, 'image');
            Helper::deleteFile($blog, 'image_webp');

            $blog->image_webp = Helper::uploadWebpImage($request->image, 'uploads/blog/webp_image/', $request->title);
            $blog->image = Helper::uploadFile($request->image, 'uploads/blog/image/', $request->title);
        }

        if ($request->hasFile('author_image')) {
            Helper::deleteFile($blog, 'author_image');
            Helper::deleteFile($blog, 'author_image_webp');

            $blog->author_image_webp = Helper::uploadWebpImage($request->author_image, 'uploads/blog/author_image/', $request->title);
            $blog->author_image = Helper::uploadFile($request->author_image, 'uploads/blog/author_image/', $request->title);
        }

        if ($request->hasFile('video_thumbnail')) {
            Helper::deleteFile($blog, 'video_thumbnail_image');
            Helper::deleteFile($blog, 'video_thumbnail_image_webp');

            $blog->video_thumbnail_image_webp = Helper::uploadWebpImage($request->video_thumbnail, 'uploads/blog/video_thumbnail_webp_image/', $request->short_url);
            $blog->video_thumbnail_image = Helper::uploadFile($request->video_thumbnail, 'uploads/blog/video_thumbnail_image/', $request->short_url);
        }

        if ($request->hasFile('desktop_banner')) {
            Helper::deleteFile($blog, 'desktop_banner');
            Helper::deleteFile($blog, 'desktop_banner_webp');

            $blog->desktop_banner_webp = Helper::uploadWebpImage($request->desktop_banner, 'uploads/blog/desktop_webp_banner/', $request->title);
            $blog->desktop_banner = Helper::uploadFile($request->desktop_banner, 'uploads/blog/desktop_banner/', $request->title);
        }

        if ($request->hasFile('mobile_banner')) {
            Helper::deleteFile($blog, 'mobile_banner');
            Helper::deleteFile($blog, 'mobile_banner_webp');

            $blog->mobile_banner_webp = Helper::uploadWebpImage($request->mobile_banner, 'uploads/blog/mobile_webp_banner/', $request->title);
            $blog->mobile_banner = Helper::uploadFile($request->mobile_banner, 'uploads/blog/mobile_banner/', $request->title);
        }

        $blog->title = $validatedData['title'];
        $blog->user_id = $validatedData['user_id'];
        $blog->short_url = $validatedData['short_url'];
        $blog->description = $validatedData['description'];
        $blog->author = $validatedData['author'];
        $blog->posted_date = $validatedData['posted_date'];
        $blog->sub_title = $request->sub_title ?? '';
        $blog->alternate_description = $request->alternate_description ?? '';
        $blog->video_url = $request->video_url ?? '';
        $blog->image_attribute = $request->image_attribute ?? '';
        $blog->video_thumbnail_image_attribute = $request->video_thumbnail_attribute ?? '';
//        $blog->banner_title = $request->banner_title ?? '';
//        $blog->banner_sub_title = $request->banner_sub_title ?? '';
        $blog->banner_attribute = $request->banner_attribute ?? '';
        $meta_title =  $blog->meta_title = ($request->meta_title) ? $request->meta_title : '';
        $meta_description = $blog->meta_description = ($request->meta_description) ? $request->meta_description : '';
        $meta_keyword = $blog->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
        $other_meta_tag = $blog->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
        $blog->updated_at = now();
        if($meta_title==''){
            $blog->meta_title = strtoupper($validatedData['title']) ;
         }
         else{
            $blog->meta_title = $request->meta_title ?? '';
         }
         if($meta_description==''){
            $blog->meta_description = strtoupper($validatedData['title']) ;
         }
         else{
            $blog->meta_description = $request->meta_description ?? '';
         }
         if($meta_keyword==''){
            $blog->meta_keyword = strtoupper($validatedData['title']) ;
         }
         else{
            $blog->meta_keyword = $request->meta_keyword ?? '';
         }
         if($other_meta_tag==''){
            $blog->other_meta_tag = strtoupper($validatedData['title']) ;
         }
         else{
            $blog->other_meta_tag = $request->other_meta_tag ?? '';
         }

        if ($blog->save()) {
            session()->flash('success', 'Blog "' . $request->title . '" has been updated successfully');
            return redirect(Helper::sitePrefix() . 'blog/');
        } else {
            return back()->with('message', 'Error while updating blog');
        }
    }

    public function delete_blog(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $blog = Blog::find($request->id);
            if ($blog) {
                if (File::exists(public_path($blog->image))) {
                    File::delete(public_path($blog->image));
                }
                if (File::exists(public_path($blog->image_webp))) {
                    File::delete(public_path($blog->image_webp));
                }
                if (File::exists(public_path($blog->video_thumbnail_image))) {
                    File::delete(public_path($blog->video_thumbnail_image));
                }
                if (File::exists(public_path($blog->video_thumbnail_image_webp))) {
                    File::delete(public_path($blog->video_thumbnail_image_webp));
                }
                if (File::exists(public_path($blog->desktop_banner))) {
                    File::delete(public_path($blog->desktop_banner));
                }
                if (File::exists(public_path($blog->desktop_banner_webp))) {
                    File::delete(public_path($blog->desktop_banner_webp));
                }
                if (File::exists(public_path($blog->mobile_banner))) {
                    File::delete(public_path($blog->mobile_banner));
                }
                if (File::exists(public_path($blog->mobile_banner_webp))) {
                    File::delete(public_path($blog->mobile_banner_webp));
                }
                if ($blog->delete()) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        }
    }
}
