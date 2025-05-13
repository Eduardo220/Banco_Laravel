<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;

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
        try {
            User::create([     // Cria um novo usuário com os dados do formulário
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'CPF' => $request->CPF,
                'birth_date' => $request->birth_date,
                'password' => bcrypt($request->password),
            ]);
        } catch (Throwable) {
            return redirect()->back()
                ->with('error', 'Erro ao registrar usuário!'); // Retorna para a página anterior com uma mensagem de erro
        }

        return redirect()->route('authentication.login')
            ->with('success', 'Usuário registrado com sucesso!'); // Redireciona para a página de login com uma mensagem de sucesso
    }

    public function update_password(Request $request, User $user)
    {
        try {
            $user->update([
                'password' => $request->password,
            ]);
            return redirect()->route('authentication.login', ['user' => $user->id])->with('success', 'Senha atualizada com sucesso!'); // Redireciona para a página de login com uma mensagem de sucesso
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Erro ao atualizar senha!'); // Retorna para a página anterior com uma mensagem de erro
        }
    }

    public function edit_password(User $user)
    {
        return view('authentication.edit_password', ['user' => $user]); // Retorna a view de edição de senha
    }
}
