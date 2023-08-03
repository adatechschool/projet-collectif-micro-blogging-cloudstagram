<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show () {
        $users = User::all()->map->only(['id', 'name', 'email']);
        return view('users', ['users' => $users]);
    }
}