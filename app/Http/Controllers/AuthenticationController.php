<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function auth_login() 
    {
        return view('authentication.login'); // Retorna a view de login
    }

    public function auth_register()
    {
        return view('authentication.register'); // Retorna a view de registro
    }

    public function store(UserRequest $request)
    {   
        User::create([     // Cria um novo usuário com os dados do formulário
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'CPF' => $request->CPF,
            'birth_date' => $request->birth_date,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('authentication.login')->with('success', 'Usuário registrado com sucesso!'); // Redireciona para a página de login com uma mensagem de sucesso
    }
}
