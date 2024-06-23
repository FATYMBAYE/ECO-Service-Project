<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'nom'=>'required|min: 3',
            'description' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champ titre est requis',
            'nom.min' => 'Le champ titre doit au moins contenir 3 caractères',
            'description.required' => 'Le champ description est requis',
            'description.min' => 'Le champ description doit dépaser 5 caractères'
        ];
    }
}
