<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function displayOne (string $id) {
        $post = Post::find($id, ['id', 'title', 'content', 'user_id', 'created_at']);
    
        if (!$post) {
            abort(404, 'Post not found');
        }
    
        return view('post', ['post' => $post]);
    }

    public function show () {
        $data = Post::with('user:id,name')->get()->sortByDesc('created_at');
        $posts = $data->map(function($post, $key) {
            return [
                'title' => $post->title,
                'content' => $post->content,
                'author' => $post->user->name,
                'date' => $post->created_at->format("d M Y \\a\\t H:m:s"),
                'author_id' => $post->user_id
            ];
        });
        return view('feed', ['posts' => $posts]);
    }
}
