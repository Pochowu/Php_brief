<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ ligne correcte
use App\Models\User;

class MainController extends Controller
{
    public function home() {
        return view('home');
    }

    public function login() {
        return view('auth.login');
    }

    public function registration() {
        return view('auth.registration');
    }

   public function profile()
{
    $user = Auth::user();
    $products = $user->products;
    $categories = $user->categories;

    return view('profiles.profile', compact('user', 'products', 'categories'));
}
}
