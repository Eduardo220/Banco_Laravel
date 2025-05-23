<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Recupera o usuário autenticado
        return view('profile.index', compact('user'));
    }
}
