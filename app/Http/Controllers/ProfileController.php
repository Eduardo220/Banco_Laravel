<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Recupera o usuário autenticado
        // Salva a log
        Log::info('Acessou o perfil', ['user_id' => $user->id]);
        return view('profile.index', compact('user'));
    }

    public function edit(User $user)
    {
        $user = Auth::user(); // Recupera o usuário autenticado
        // Salva a log
        Log::info('Acessou o editar perfil', ['user_id' => $user->id]);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Recupera o usuário autenticado
        $user->update($request->all());
        // Salva a log
        Log::info('Editou o perfil', ['user_id' => $user->id]);
        return redirect()->route('profile.index')->with('success', 'Perfil atualizado com sucesso!');
    }
}