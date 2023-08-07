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

    public function create() {
        
    }
}
