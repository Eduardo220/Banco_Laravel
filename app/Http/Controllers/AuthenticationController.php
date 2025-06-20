<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
            $user = User::create([     // Cria um novo usuário com os dados do formulário
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address_street' => $request->address_street,
                'address_number' => $request->address_number,
                'address_neighborhood' => $request->address_neighborhood,
                'address_complement' => $request->address_complement,
                'address_city' => $request->address_city,
                'address_state' => $request->address_state,
                'address_zip' => $request->address_zip,
                'CPF' => $request->CPF,
                'birth_date' => $request->birth_date,
                'password' => bcrypt($request->password),
            ]);
            // Salva a log
            Log::info('Usuário registrado com sucesso!', ['user_name' => $user->name]);

            return redirect()->route('authentication.login')
            ->with('success', 'Usuário registrado com sucesso!'); // Redireciona para a página de login com uma mensagem de sucesso

        } catch (Exception $e) { 
            // Salva o erro no log
            Log::notice('Erro ao registrar usuário!', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Erro ao registrar usuário!');
        }
    }

    public function login_post(Request $request)
    {
        $credentials = $request->only('email', 'password'); // Obtém as credenciais do formulário

        if (Auth::attempt($credentials)) 
        { // Tenta autenticar o usuário 
            Log::info('Usuário logado com sucesso!', ['user_email' => $request->email]); // Loga o evento de login
            $request->session()->regenerate(); // Regenera a sessão para evitar ataques de fixação de sessão
            return redirect()->intended(route('home.index'))
                ->with('success', 'Login realizado com sucesso!'); // Mensagem de sucesso
        } 
        else 
            {
                Log::notice('Erro ao fazer login!', ['user_email' => $request->email]);
                return back()->withErrors(['email' => 'Credenciais inválidas.',])->onlyInput('email');
            }
    }

    public function update_password(Request $request, User $user)
    {
        try {
            $user->update([
                'password' => bcrypt($request->password),
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
