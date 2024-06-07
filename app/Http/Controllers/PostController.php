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

        $post = Post::create(
            [
                'user_id' => auth()->id(),
                'title' => $request->title,
                'body' => $request->body
            ]
        );

        return redirect($post->path());
    }

    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update(
            [
                'title' => $request->title,
                'body' => $request->body
            ]
        );

        return redirect($post->path());
    }

    public function destroy(Post $post)
    {
        //
    }
}
