<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Htpp\Models\Post;

class CommentController extends Controller
{
    
    public function store(StoreCommentRequest $request, Post $post)
    {
        $validated = $request->validate();

        $post->comments()->create(
            [
                'user_id' => auth()->id(),
                'body' => $validated->body
            ]
        );
        
        return redirect()->back();
    }

}
