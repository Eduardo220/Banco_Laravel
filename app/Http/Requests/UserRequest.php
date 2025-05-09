<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [ // Define as regras de validação para os campos do formulário
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|string|regex:/^[0-9\-\+]{9,15}$/',
            'address' => 'required|string|max:255',
            'CPF' => 'required|string|min:11|max:11|unique:users',
            'birth_date' => 'required|date',
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
            
            'address.required' => 'O campo endereço é obrigatório.',
            'address.string' => 'O campo deve conter letras.',
            
            'CPF.required' => 'O campo CPF é obrigatório.',
            'CPF.string' => 'O campo deve conter números.',
            'CPF.min' => 'O campo deve conter 11 números.',
            'CPF.max' => 'O campo deve conter 11 números.',
            'CPF.unique' => 'O CPF já está cadastrado.',
            
            'birth_date.required' => 'O campo data de nascimento é obrigatório.',
            'birth_date.date' => 'O campo deve ser uma data válida.',

            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo deve conter letras.',
            'password.min' => 'O campo deve conter no mínimo 6 caracteres.',
        ];
    }
}
