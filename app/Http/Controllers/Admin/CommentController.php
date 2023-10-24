<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Comment;
use App\Models\HomeHeading;
use App\Models\CustomerPost;
use App\Models\Customer;
use App\Models\User;
use App\Models\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class CommentController extends Controller
{
    
    public function commments()
    {
        $title = "Comment List";
      
        $type = 'Comments';
        $blogList = Comment::get();
        return view('Admin.comment.list', compact('blogList', 'title', 'type'));
    }


    public function reply(Request $request, $commentId)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'reply_content' => 'required|string|max:255', // Updated to 'reply_content'
        ]);

        // Find the parent comment
        $parentComment = Comment::findOrFail($commentId);

        // Create a new reply associated with the parent comment
        $reply = Comment::create([
            'content' => $validatedData['reply_content'], // Updated to 'reply_content'
            'likes' => 0,
            'user_id' => Auth::id(),
            'parent_id' => $parentComment->id,
            // other reply attributes you might have
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Reply added successfully!');
    }
    public function likeComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->likes = 1;  // Set likes to 1 when liking a comment
        $comment->save();
    
        return response()->json(['success' => true, 'action' => 'like']);
    }
    
    public function unlikeComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->likes = 0;  // Set likes to 0 when unliking a comment
        $comment->save();
    
        return response()->json(['success' => true, 'action' => 'unlike']);
    }
    


}
