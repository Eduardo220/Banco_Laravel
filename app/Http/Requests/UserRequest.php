<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [ // Define as regras de validação para os campos do formulário
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|string|min:9|max:15|regex:/^[0-9\-\+]{9,15}$/',
            'address_street' => 'nullable|string|max:255',
            'address_number' => 'nullable|string|max:20',
            'address_neighborhood' => 'nullable|string|max:255',
            'address_complement' => 'nullable|string|max:255',
            'address_city' => 'nullable|string|max:255',
            'address_state' => 'nullable|string|max:255',
            'address_zip' => 'nullable|string|max:9',
            'CPF' => 'required|string|min:11|max:11|unique:users',
            'birth_date' => ['required', 'date', 'before_or_equal:today', 'before:' . now()->subYears(18)->format('Y-m-d')],
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [ // Define as mensagens de erro personalizadas para cada regra de validação
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo deve conter letras.',

            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Insira um e-mail válido.',
            'email.unique' => 'O e-mail já está cadastrado.',

            'phone.required' => 'O campo telefone é obrigatório.',
            'phone.string' => 'O campo deve conter números.',
            'phone.regex' => 'O campo telefone deve conter entre 9 e 15 números.',
            
            'CPF.required' => 'O campo CPF é obrigatório.',
            'CPF.string' => 'O campo deve conter números.',
            'CPF.min' => 'O campo deve conter 11 números.',
            'CPF.max' => 'O campo deve conter 11 números.',
            'CPF.unique' => 'O CPF já está cadastrado.',
            
            'birth_date.required' => 'O campo data de nascimento é obrigatório.',
            'birth_date.date' => 'O campo deve ser uma data válida.',
            'birth_date.before' => 'Você precisa ter pelo menos 18 anos para se cadastrar.',
            'birth_date.before_or_equal' => 'A data de nascimento não pode ser no futuro.',

            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo deve conter letras.',
            'password.min' => 'O campo deve conter no mínimo 6 caracteres.',
        ];
    }
}
