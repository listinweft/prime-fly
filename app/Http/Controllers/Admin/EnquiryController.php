<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Enquiry;
use App\Models\Newsletter;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class EnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function enquiry_list()
    {
        $title = "Enquiries List";
        $type = "contact";
        $enquiryList = Enquiry::whereNull('product_id')->where('type','contact')->latest()->get();
        return view('Admin.enquiry.list', compact('enquiryList', 'title', 'type'));
    }

    public function enquiry_view($id)
    {
        $title = "View Enquiry";
        $type = "contact";
        $enquiry = Enquiry::find($id);
        return view('Admin.enquiry.view', compact('enquiry', 'title', 'type'));
    }

    public function reply_to_enquiry(Request $request)
    {
        if (isset($request->reply) && $request->reply != null) {
            $enquiry = Enquiry::find($request->id);
            if ($enquiry) {
                DB::beginTransaction();
                $enquiry->reply = $request->reply;
                $enquiry->reply_date = now();
                if ($enquiry->save()) {
                    if (Helper::sendReply($enquiry)) {
                        DB::commit();
                        return response()->json(['status' => true, 'message' => 'Reply saved successfully']);
                    } else {
                        DB::rollBack();
                        return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                    }
                } else {
                    DB::rollBack();
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function delete_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $enquiry = Enquiry::find($request->id);
            if ($enquiry) {
                $deleted = $enquiry->delete();
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

    public function delete_multi_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $enquiryArray = explode(',', $request->id);
            $successArray = array();
            foreach ($enquiryArray as $con) {
                $enquiry = Enquiry::find($con);
                $deleted = $enquiry->delete();
                if ($deleted == true) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                return response()->json(['status' => true]);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function newsletter()
    {
        $title = "Newsletter Subscribers";
        $newsletterList = Newsletter::latest('id')->get();
        return view('Admin.newsletter.list', compact('newsletterList', 'title'));

    }

    public function delete_multi_newsletter(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $newsletterArray = explode(',', $request->id);
            $successArray = array();
            foreach ($newsletterArray as $item_id) {
                $newsletter = Newsletter::find($item_id);
                $deleted = $newsletter->delete();
                if ($deleted == true) {
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

    public function delete_newsletter(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $newsletter = Newsletter::find($request->id);
            if ($newsletter) {
                $deleted = $newsletter->delete();
                if ($deleted == true) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Some error occurred,please try after sometime'
                    ]);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    /******************************** Bulk Enquiry ************************************/
    public function bulk_list()
    {
        $title = "Bulk List";
        $type = "bulk";
        $enquiryList = Enquiry::whereNotNull('product_id')->with('product')->latest()->get();
        return view('Admin.enquiry.list', compact('enquiryList', 'title', 'type'));
    }

    public function bulk_view($id)
    {
        $title = "View Bulk";
        $type = "bulk";
        $enquiry = Enquiry::whereNotNull('product_id')->with('product')->find($id);
        return view('Admin.enquiry.view', compact('enquiry', 'title', 'type'));
    }

    public function reply_to_bulk(Request $request)
    {
        if (isset($request->reply) && $request->reply != null) {
            $bulk = Enquiry::find($request->id);
            if ($bulk) {
                DB::beginTransaction();
                $bulk->reply = $request->reply;
                $bulk->reply_date = now();
                if ($bulk->save()) {
                    if (Helper::sendReply($bulk)) {
                        DB::commit();
                        return response()->json(['status' => true, 'message' => 'Reply saved successfully']);
                    } else {
                        DB::rollBack();
                        return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                    }
                } else {
                    DB::rollBack();
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function delete_bulk(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $bulk = Enquiry::find($request->id);
            if ($bulk) {
                if (File::exists($bulk->file)) {
                    File::delete($bulk->file);
                }
                $bulk->file = '';
                $bulk->save();
                if ($bulk->delete()) {
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

    public function delete_multiple_bulk(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $bulkArray = explode(',', $request->id);
            $successArray = array();
            foreach ($bulkArray as $item_id) {
                $bulk = Enquiry::find($item_id);
                if (File::exists($bulk->file)) {
                    File::delete($bulk->file);
                }
                $bulk->file = '';
                $bulk->save();
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


    /******************************** Get Quote Enquiry ************************************/
    public function get_quote_list()
    {
        $title = "Get A Quote List";
        $type = "get-quote";
        $enquiryList = Enquiry::where('type','get_a_quote')->latest()->get();
//     dd($enquiryList);
        return view('Admin.enquiry.list', compact('enquiryList', 'title', 'type'));
    }

    public function get_quote_view($id)
    {
        $title = "View Get A Quote";
        $type = "get-quote";
        $enquiry = Enquiry::where('type','get_a_quote')->find($id);
        return view('Admin.enquiry.view', compact('enquiry', 'title', 'type'));
    }

    public function reply_to_get_quote(Request $request)
    {
        if (isset($request->reply) && $request->reply != null) {
            $bulk = Enquiry::find($request->id);
            if ($bulk) {
                DB::beginTransaction();
                $bulk->reply = $request->reply;
                $bulk->reply_date = now();
                if ($bulk->save()) {
                    if (Helper::sendReply($bulk)) {
                        DB::commit();
                        return response()->json(['status' => true, 'message' => 'Reply saved successfully']);
                    } else {
                        DB::rollBack();
                        return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                    }
                } else {
                    DB::rollBack();
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function delete_get_quote(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $bulk = Enquiry::find($request->id);
            if ($bulk) {
                if (File::exists($bulk->file)) {
                    File::delete($bulk->file);
                }
                $bulk->file = '';
                $bulk->save();
                if ($bulk->delete()) {
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

    public function delete_multiple_get_quote(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $bulkArray = explode(',', $request->id);
            $successArray = array();
            foreach ($bulkArray as $item_id) {
                $bulk = Enquiry::find($item_id);
                if (File::exists($bulk->file)) {
                    File::delete($bulk->file);
                }
                $bulk->file = '';
                $bulk->save();
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

    /******************************** prodcut Enquiry ************************************/
    public function product_list()
    {
        $title = "Product Enquiry List";
        $type = "product";
        $enquiryList = Enquiry::whereNotNull('product_id')->where('type','product')->latest()->get();

        return view('Admin.enquiry.list', compact('enquiryList', 'title', 'type'));
    }

    public function product_view($id)
    {
        $title = "View Get A Quote";
        $type = "product";
        $enquiry = Enquiry::whereNotNull('product_id')->where('type','get_a_quote')->find($id);
        return view('Admin.enquiry.view', compact('enquiry', 'title', 'type'));
    }

    public function reply_to_product(Request $request)
    {
        if (isset($request->reply) && $request->reply != null) {
            $bulk = Enquiry::find($request->id);
            if ($bulk) {
                DB::beginTransaction();
                $bulk->reply = $request->reply;
                $bulk->reply_date = now();
                if ($bulk->save()) {
                    if (Helper::sendReply($bulk)) {
                        DB::commit();
                        return response()->json(['status' => true, 'message' => 'Reply saved successfully']);
                    } else {
                        DB::rollBack();
                        return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                    }
                } else {
                    DB::rollBack();
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function delete_product(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $bulk = Enquiry::find($request->id);
            if ($bulk) {
                if (File::exists($bulk->file)) {
                    File::delete($bulk->file);
                }
                $bulk->file = '';
                $bulk->save();
                if ($bulk->delete()) {
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

    public function delete_multiple_product(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $bulkArray = explode(',', $request->id);
            $successArray = array();
            foreach ($bulkArray as $item_id) {
                $bulk = Enquiry::find($item_id);
                if (File::exists($bulk->file)) {
                    File::delete($bulk->file);
                }
                $bulk->file = '';
                $bulk->save();
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
