<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::latest()->paginate(10);
        return response()->json($post, 200);
    }

    public function store(Request $request)
    {
        $request->validate([ 'name' => 'required', ]);
        $post = Post::create($request->all());
        return response()->json($post, 200);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([ 'name' => 'required', ]);
        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json("Post deleted.");
    }
}
