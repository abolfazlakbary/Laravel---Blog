<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;

class CommentController extends Controller
{
    
    public function store(StoreCommentRequest $request, Post $post)
    {
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->new_comment
        ]);
        
        return redirect()->back();
    }

}
