<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; // Assuming you have a Comment model
use Auth;
use App\Models\User;



class CommentController extends Controller
{
    
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'comment_content' => 'required|string|max:255', // Updated to 'comment_content'
        ]);

        // Create a new comment
        $comment = Comment::create([
            'content' => $validatedData['comment_content'], // Updated to 'comment_content'
           

            'likes' => 0,
            'user_id' => Auth::guard('customer')->user()->id, // Save the authenticated user's ID
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Comment added successfully!');
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
