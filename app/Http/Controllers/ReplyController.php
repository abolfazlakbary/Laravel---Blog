<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\StoreReplyRequest;

class ReplyController extends Controller
{
    public function store(StoreReplyRequest $request, Comment $comment)
    {
        $comment->replies()->create(
            [
                'user_id' => auth()->id(),
                'body' => $request->new_reply
            ]
        );

        return redirect()->back();
    }
}
