<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class PostCreationController extends Controller
{

    public function create(): View
    {
        return view('postCreation');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:3000'],
        ]);

        $imageName = $request->imageUrl;

        if (isset($request->imageFile)) {
            $request->validate([
                'imageFile' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048'
            ]);
            $path = $request->file('imageFile')->store('public/img');
            $imageName = $request->file('imageFile')->hashName();
        }

        $user = Auth::user();

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user->id,
            'imageUrl' => $imageName,
        ]);

        return redirect('feed');
    }

}
