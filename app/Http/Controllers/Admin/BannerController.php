<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Banner;
use App\Models\HomeBanner;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function banner()
    {
        $type = "home";
        $key = "List";
        $title = "Banners List";
        $banners  = HomeBanner::get();
      
        return view('Admin.banner.list', compact('key', 'title', 'banners', 'type'));
    }

    public function banner_create()
    {
        $key = "Create";
        $title = "Create Banner";
        $type = "home";
      

    // Extract first names from the associated users
  
        return view('Admin.banner.form', compact('key', 'title','type'));
    }

    public function banner_store(Request $request)
    {


   
         

                 $banner = new Banner;
                $validatedData = $request->validate([
//                    'banner_title' => 'required',
                    
                    'desktop_banner' => 'required|image|mimes:jpeg,png,jpg|max:512',
                    // 'mobile_banner' => 'required|image|mimes:jpeg,png,jpg|max:512',
                    // 'banner_attribute' => 'required|min:2'
                ]);

                $banner = new HomeBanner;

                
            $banner->title = "";
            $banner->subtitle = "";
            $banner->description = "";
            $banner->button_text = "";
            $banner->url = "";
            $banner->sort_order = 1;
            $banner->status = "Active";
           
             
        

            if ($request->hasFile('desktop_banner')) {

                if (File::exists(public_path($banner->desktop_image))) {
                    File::delete(public_path($banner->desktop_image));
                }
                if (File::exists(public_path($banner->desktop_image_webp))) {
                    File::delete(public_path($banner->desktop_image_webp));
                }
                $banner->desktop_image_webp = Helper::uploadWebpImage($request->desktop_banner, 'uploads/banner/desktop_banner/webp/', $request->banner_title);
                $banner->desktop_image = Helper::uploadFile($request->desktop_banner, 'uploads/banner/desktop_banner/', $request->banner_title);
            }
            

            

            if ($banner->save()) {
              
                session()->flash('success', 'Banner  has been added successfully');
                  return redirect(Helper::sitePrefix() . 'banner/list');
            } else {
                return back()->with('error', 'Error while updating the ' . $request->type);
            }
       
    }

    public function banner_edit($id)
    {
        $key = "Update";
        $title = "Banner Update";
        $banner = HomeBanner::find($id);
        // $user = $blog->user_id;
        // $customers = Customer::get();
        $type = "home";
        if ($banner != null) {
            return view('Admin.banner.form', compact('key', 'banner', 'title','type'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function banner_update(Request $request, $id)
    {
        // $validatedData = $request->validate([
        //     'desktop_banner' => 'required|image|mimes:jpeg,png,jpg|max:512',
        // ]);
       
        $banner = HomeBanner::find($id);
        if ($request->hasFile('desktop_banner')) {

            if (File::exists(public_path($banner->desktop_image))) {
                File::delete(public_path($banner->desktop_image));
            }
            if (File::exists(public_path($banner->desktop_image_webp))) {
                File::delete(public_path($banner->desktop_image_webp));
            }
            $banner->desktop_image_webp = Helper::uploadWebpImage($request->desktop_banner, 'uploads/banner/desktop_banner/webp/', $request->banner_title);
            $banner->desktop_image = Helper::uploadFile($request->desktop_banner, 'uploads/banner/desktop_banner/', $request->banner_title);
        }
        
        
            $banner->title = "";
            $banner->subtitle = "";
            $banner->description = "";
            $banner->button_text = "";
            $banner->url = "";
            $banner->sort_order = 1;
            $banner->status = "Active";
       
       

        if ($banner->save()) {
            session()->flash('success', 'Banner  has been added successfully');
            return redirect(Helper::sitePrefix() . 'banner/list');
        } else {
            return back()->with('message', 'Error while updating blog');
        }
    }

    public function delete_banner(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
             $banner = HomeBanner::find($request->id);
            if ($banner) {
                if (File::exists(public_path($banner->desktop_image))) {
                    File::delete(public_path($banner->desktop_image));
                }
                if ($banner->forceDelete()) {
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
