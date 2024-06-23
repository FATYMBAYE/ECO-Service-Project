<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom'=> 'required|min: 3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champ nom est requis',
            'nom.min' => 'Le champ nom dois au moins contenir 3 caractères',
            'email.required' => 'Le champ email est requis',
            'email.unique' => 'Le email est déjà lié à un compte',
            'password.min' => 'Le mot de passe doit dépasser 5 caractères',
            'password.required' => 'Le mot de passe est requis',
        ];
}
}
