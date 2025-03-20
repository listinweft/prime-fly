<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\SiteInformation;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;


class SiteInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function siteinformation()
    {
        $key = "Update";
        $title = "Site Information";
        $siteInformation = SiteInformation::first();
        return view('Admin.site_information.form', compact('key', 'title', 'siteInformation'));
    }

    public function siteInformationStore(Request $request)
    {
        if ($request->id == 0) {
            $siteInformation = new SiteInformation;
        } else {
            $siteInformation = SiteInformation::find($request->id);
            $siteInformation->updated_at = now();
        }
        if ($request->hasFile('logo')) {
            if (File::exists(public_path($siteInformation->logo))) {
                File::delete(public_path($siteInformation->logo));
            }
            if (File::exists($siteInformation->logo_webp)) {
                File::delete($siteInformation->logo_webp);
            }
            $siteInformation->logo_webp = Helper::uploadWebpImage($request->logo, 'uploads/site/webp/', 'logo');
            $siteInformation->logo = Helper::uploadFile($request->logo, 'uploads/site/', 'logo');
        }
        $siteInformation->brand_name = $request->brand_name ?? '';
        $siteInformation->logo_attribute = $request->logo_attribute ?? '';
        $siteInformation->copyright = $request->copyright ?? '';
        $siteInformation->privacy_policy = $request->privacy_policy ?? '';
        $siteInformation->terms_and_conditions = $request->terms_and_conditions ?? '';
        $siteInformation->return_policy = $request->return_policy ?? '';
        $siteInformation->contact = $request->contact ?? '';
        $siteInformation->faq = $request->faq ?? '';
        $siteInformation->shipping_policy = $request->shipping_policy ?? '';
        $siteInformation->payment_policy = $request->payment_policy ?? '';
        $siteInformation->disclaimer = $request->disclaimer ?? '';
        $siteInformation->default_shipping_charge = $request->default_shipping_charge;
        $siteInformation->cod_extra_charge = $request->cod_extra_charge;
        $siteInformation->return_days = $request->return_days;
        $siteInformation->tax_type = $request->tax_type;
        $siteInformation->tax = $request->tax;
        if ($siteInformation->save()) {
            session()->flash('success', 'Site Information has been updated successfully');
            return redirect(Helper::sitePrefix() . 'site-information');
        } else {
            return back()->with('error', 'Error while updating the site information');
        }
    }


    public function banner()
    {
        $key = "Update";
        $title = "banners";
        $siteInformation = BannerImage::first();
        return view('Admin.common_banner.form', compact('key', 'title', 'siteInformation'));
    }

    public function bannerstore(Request $request)
    {

        // return $request->all();
     
    $blog = BannerImage::first();
    
    if (!$blog) {
        $blog = new BannerImage; // If no record, create a new one
    }
        if ($request->hasFile('image')) {
            Helper::deleteFile($blog, 'image');
            Helper::deleteFile($blog, 'image_webp');

            $blog->image_webp = Helper::uploadWebpImage($request->image, 'uploads/blog/webp_image/', $request->title);
            $blog->image = Helper::uploadFile($request->image, 'uploads/blog/image/', $request->title);
        }
        if ($request->hasFile('blog_image')) {
            Helper::deleteFile($blog, 'blog_image');
            Helper::deleteFile($blog, 'blog_image_webp');

            $blog->blog_image = Helper::uploadWebpImage($request->blog_image, 'uploads/blog/blog_image/', $request->title);
            $blog->blog_image_webp = Helper::uploadFile($request->blog_image, 'uploads/blog/blog_image_webp/', $request->title);
        }

        if ($request->hasFile('faq_image')) {
            Helper::deleteFile($blog, 'faq_image');
            Helper::deleteFile($blog, 'faq_image_webp');

            $blog->faq_image = Helper::uploadWebpImage($request->faq_image, 'uploads/blog/faq_image/', $request->title);
            $blog->faq_image_webp = Helper::uploadFile($request->faq_image, 'uploads/blog/faq_image_webp/', $request->title);
        }

        $blog->location = $request->location ?? '';
        $blog->phone = $request->phone ?? '';
        $blog->email = $request->email ?? '';
        
        if ($blog->save()) {
            session()->flash('success', 'Banner has been updated successfully');
            return redirect(Helper::sitePrefix() . 'common-banners');
        } else {
            return back()->with('error', 'Error while updating the site information');
        }
    }
}
