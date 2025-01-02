<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\HomeHeading;
use App\Models\Faq;
use App\Models\Category;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function faqs()
    {
        $title = "Faq List";
       
        $type = 'faq';
        $faqList = Faq::get();
        return view('Admin.faq.list', compact('faqList', 'title', 'type'));
    }

    public function faqs_create()
    {
        $key = "Create";
        $title = "Create Faq";
        $services = Category::whereNull('parent_id')->get();

        return view('Admin.faq.form', compact('key', 'title','services'));
    }

    public function faqs_store(Request $request)
    {
      
        $validatedData = $request->validate([
            'question' => 'required|min:2',
            'answer'=>'required|min:2',
            'type'=>'required',
            
        ]);
        $blog = new Faq;
       

        $blog->question = $validatedData['question'];
        $blog->answer = $validatedData['answer'];
        $blog->type = $validatedData['type'];

        if ($validatedData['type'] == "location") {

            $blog->service_id = "";
        }
        
        else {
            
            $blog->service_id = $request->service ?? "";// or any other logic
        }
       

        if ($blog->save()) {
            session()->flash('success', 'Faq"' . $request->title . '" has been added successfully');
            return redirect(Helper::sitePrefix() . 'faq/');
        } else {
            return back()->with('message', 'Error while creating faq');
        }
    }

    public function faqs_edit($id)
    {
        $key = "Update";
        $title = "Faq Update";
        $faq = Faq::find($id);
        if ($faq != null) {
            $services = Category::whereNull('parent_id')->get();
            return view('Admin.faq.form', compact('key', 'faq', 'title','services'));
        } else {
            return view('Admin.error.404');
        }
    }

    public function faqs_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required|min:2',
            'answer'=>'required|min:2',
            'type'=>'required',
            
        ]);
        $faq = Faq::find($id);
        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];
        $faq->type = $validatedData['type'];

        if ($validatedData['type'] == "location") {
            $faq->service_id = "";
        }

        else {
            // Your alternative logic goes here
            // For example:
            $faq->service_id = $request->service ?? "";// or any other logic
        }

        if ($faq->save()) {
            session()->flash('success', 'Faq "' . $request->title . '" has been updated successfully');
            return redirect(Helper::sitePrefix() . 'faq/');
        } else {
            return back()->with('message', 'Error while updating faq');
        }
    }

    public function delete_faqs(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $blog = Faq::find($request->id);
            if ($blog) {
                
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

    public function delete_multiple_faqs(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $bulkArray = explode(',', $request->id);
            $successArray = array();
            foreach ($bulkArray as $item_id) {
                $bulk = Faq::find($item_id);
               
                if ($bulk->delete()) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                return response()->json(['status' => true]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Some error occurred while deleting elements.,please try after sometime'
                ]);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }


    
}
