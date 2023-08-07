<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function displayOne (string $id) {
        $post = Post::find($id, ['id', 'title', 'content']);
    
        if (!$post) {
            abort(404, 'Post not found');
        }
    
        return view('post', ['post' => $post]);
    }

    public function show () {
        // $posts = Post::all()->map->only(['title', 'content', 'user_id', 'created_at'])->sortByDesc('created_at');
        // $posts = Post::with('user:id,name')->get()->map->sortByDesc('created_at');
        $posts = Post::with('user:id,name')->get()->map(function($post, $key) {
            return [
                'title' => $post->title,
                'content' => $post->content,
                'author' => $post->user->name,
                'date' => $post->created_at->format('d.m.Y'),
            ];
        });
        dd($posts);
        // return view('feed', ['posts' => $posts]);
    }

    public function create() {
        
    }
}
