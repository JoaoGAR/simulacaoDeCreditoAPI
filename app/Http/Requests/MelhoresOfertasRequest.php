<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MelhoresOfertasRequest extends FormRequest
{
    public function rules()
    {
        return [
            'cpf' => 'required|string|max:15',
        ];
    }

    public function messages()
    {
        return [
            'cpf.required' => 'É necessário informar um CPF.',
        ];
    }
}
