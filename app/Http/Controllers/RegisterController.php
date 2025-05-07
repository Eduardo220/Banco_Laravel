<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('users.register.index'); // Retorna a view de registro
    }

    public function store(Request $request)
    {
        Register::create([     // Cria um novo usuário com os dados do formulário
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'CPF' => $request->CPF,
            'birth_date' => $request->birth_date,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login.index')->with('success', 'Usuário registrado com sucesso!'); // Redireciona para a página de login com uma mensagem de sucesso
    }

    public function validar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'CPF' => 'required|string|max:14|unique:users',
            'birth_date' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }
}
