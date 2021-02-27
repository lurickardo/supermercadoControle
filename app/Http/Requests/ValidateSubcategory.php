<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSubcategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nmTitle' => 'required|max:50',
            'idCategory' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'nmTitle.required' => 'Título é obrigatório.',
            'nmTitle.max' => 'Título deve conter no máximo 50 caracteres.',

            'idCategory.required' => 'Selecione uma categoria.',
            'idCategory.integer' => 'Código da categoria deve ser informado.',
        ];
    }
}
