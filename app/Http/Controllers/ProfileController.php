<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{    
    public function show(): View
    {
        $user = Auth::user(); 
        $data = $user->posts()->latest()->take(10)->get();
        $posts = $data->map(function($post, $key) {
            return [
                'title' => $post->title,
                'content' => $post->content,
                'author' => $post->user->name,
                'date' => $post->created_at->format("d M Y \\a\\t H:i"),
                'author_id' => $post->user->id
            ];
        });

        return view('profile', ['posts' => $posts,'user'=>$user]);
    }

    public function showUser($id) : View 
    {
        $user = User::find($id);
        $data = $user->posts()->latest()->take(10)->get();
        $posts = $data->map(function($post, $key) {
            return [
                'title' => $post->title,
                'content' => $post->content,
                'author' => $post->user->name,
                'date' => $post->created_at->format("d M Y \\a\\t H:i"),
                'author_id' => $post->user->id,
                'imageUrl' => $post->imageUrl,
            ];
        });

        return view('profile', ['posts' => $posts,'user'=>$user]);
    }
}
