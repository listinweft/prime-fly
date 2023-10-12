<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; // Assuming you have a Comment model
use Auth;



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
    $user = Auth::user();
    $comment = Comment::findOrFail($commentId);

    // Check if the user hasn't already liked the comment
    if (!$user->hasLikedComment($comment)) {
        $comment->likes += 1;
        $comment->save();
        $user->likedComments()->attach($commentId);
    }

    return redirect()->back()->with('success', 'Comment liked!');
}

public function unlikeComment($commentId)
{
    $user = Auth::user();
    $comment = Comment::findOrFail($commentId);

    // Check if the user has liked the comment
    if ($user->hasLikedComment($comment)) {
        $comment->likes -= 1;
        $comment->save();
        $user->likedComments()->detach($commentId);
    }

    return redirect()->back()->with('success', 'Comment unliked!');
}


}
