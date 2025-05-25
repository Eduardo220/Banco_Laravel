<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Recupera o usuário autenticado
        return view('profile.index', compact('user'));
    }

    public function edit(User $user)
    {
        $user = Auth::user(); // Recupera o usuário autenticado
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Recupera o usuário autenticado
        $user->update($request->all());
        return redirect()->route('profile.index')->with('success', 'Perfil atualizado com sucesso!');
    }
}