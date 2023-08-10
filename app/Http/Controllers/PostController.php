<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function displayOne (string $id) {
        $post = Post::find($id);
    
        if (!$post) {
            abort(404, 'Post not found');
        }
    
        return view('post', ['post' => $post]);
    }

    public function show () {
        $posts = Post::with('user:id,name')->get()->sortByDesc('created_at');

        return view('feed', ['posts' => $posts]);
    }
}
