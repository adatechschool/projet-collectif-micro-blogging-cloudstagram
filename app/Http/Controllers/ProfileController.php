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
        $posts = $user->posts()->latest()->take(10)->get();

        return view('profile', ['posts' => $posts,'user'=>$user]);
    }

    public function showUser($id) : View 
    {
        $user = User::find($id);
        $posts = $user->posts()->latest()->take(10)->get();

        return view('profile', ['posts' => $posts,'user'=>$user]);
    }
}
