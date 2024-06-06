<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    
    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validate();

        $post = Post::create(
            [
                'user_id' => auth()->id(),
                'title' => $validated->title,
                'body' => $validated->body
            ]
        );

        return redirect($post->path());
    }

    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validate();

        $post->update(
            [
                'title' => $validated->title,
                'body' => $validated->body
            ]
        );

        return redirect($post->path());
    }

    public function destroy(Post $post)
    {
        //
    }
}
