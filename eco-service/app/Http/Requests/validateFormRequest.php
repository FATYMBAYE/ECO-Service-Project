<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateFormRequest extends FormRequest
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
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champ nom est requise',
            'nom.min' => 'Le champ nom dois au moins contenir 3 caractères',
            'email.required' => 'Le champ email est requise',
            'email.email' => 'Le mail est n\'est pas correct',
        ];
}
}