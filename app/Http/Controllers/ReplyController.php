<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Comment;
use App\Http\Requests\StoreReplyRequest;

class ReplyController extends Controller
{
    public function store(StoreReplyRequest $request, Comment $comment)
    {
        $comment->replies()->create(
            [
                'user_id' => auth()->id(),
                'body' => $request->body
            ]
        );

        return redirect()->back();
    }
}
