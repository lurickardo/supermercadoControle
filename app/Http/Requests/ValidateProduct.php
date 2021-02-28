<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Captcha;
class ValidateProduct extends FormRequest
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
            'idSubcategory' => 'required|integer',
            'vlProduct' => 'required',
            'dsProduct' => 'required',
            'g-recaptcha-response' => new Captcha()
        ];
    }

    public function messages()
    {
        return [
            'nmTitle.required' => 'Título é obrigatório.',
            'nmTitle.max' => 'Título deve conter no máximo 50 caracteres.',

            'idCategory.required' => 'Selecione uma categoria.',
            'idCategory.integer' => 'Código da categoria deve ser informado.',

            'idSubcategory.required' => 'Selecione uma subcategoria.',
            'idSubcategory.integer' => 'Código da subcategoria deve ser informado.',

            'vlProduct.required' => 'Valor do produto deve ser inserido.',

            'dsProduct.required' => 'Descrição do produto é obrigatória.',
        ];
    }
}
