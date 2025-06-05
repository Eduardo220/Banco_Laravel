<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
        $user = User::find(Auth::id()); // Recupera o usuário autenticado como Eloquent Model
        
        $user->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address_street' => $request->address_street,
            'address_number' => $request->address_number,
            'address_neighborhood' => $request->address_neighborhood,
            'address_complement' => $request->address_complement,
            'address_city' => $request->address_city,
            'address_state' => $request->address_state,
            'address_zip' => $request->address_zip,
        ]);
        // Salva a log
        Log::info('Editou o perfil', ['user_id' => $user->id]);
        return redirect()->route('profile.index')->with('success', 'Perfil atualizado com sucesso!');
    }
}