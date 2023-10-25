<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Blog;
use App\Models\HomeHeading;
use App\Models\CustomerPost;
use App\Models\Customer;
use App\Models\User;
use App\Models\Comment;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $siteInformation = SiteInformation::first();
        return View::share(compact('siteInformation'));
    }

    public function comment()
    {
        $title = "Comments";
      
        $type = 'Commment';
        $blogList = Comment::get();
        return view('Admin.comment.list', compact('blogList', 'title', 'type'));
    }

    
    

    


public function comment_edit($id)
    {
        $key = "Update";
        $title = "Comment Update";
        $blog = Comment::find($id);
        // $user = $blog->user_id;
        // $customers = Customer::get();
        if ($blog != null) {
            return view('Admin.comment.form', compact('key', 'blog', 'title',));
        } else {
            return view('Admin.error.404');
        }
    }

    public function comment_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            
            'content' => 'required',
          
        ]);
        $blog = Comment::find($id);
       

        $blog->content = $validatedData['content'];
       

        if ($blog->save()) {
            session()->flash('success', 'Commment "' . $request->title . '" has been updated successfully');
            return redirect(Helper::sitePrefix() . 'comment/');
        } else {
            return back()->with('message', 'Error while updating blog');
        }
    }
    public function show($id)
    {
        // Logic to retrieve and display the blog item with the given ID
        $comment = Comment::findOrFail($id);
        $replies = $comment->replies;
    
        return view('Admin.comment.view', compact('comment','replies'));
       
    }
    

    public function delete_comment(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $blog = Comment::find($request->id);
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
}
