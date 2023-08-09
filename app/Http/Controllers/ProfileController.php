<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
//     public function show(): View
//     {
//         $user = Auth::user();
//         // dd($user);
//         return view('profile', ['user' => $user]);
//     }

//     return redirect()->route('profile.show');

    
    public function show(): View
    {

        $user = Auth::user(); 
        return view('profile', ['user' => $user]);

    }
}
