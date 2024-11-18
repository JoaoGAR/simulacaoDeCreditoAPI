<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimulacaoDeOfertaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'cpf' => 'required|string|max:15',
            'instituicao_id' => 'required|integer|max:5',
            'codModalidade' => 'required|string|max:200',
        ];
    }

    public function messages()
    {
        return [
            'cpf.required' => 'É necessário informar um CPF.',
            'instituicao_id.required' => 'É necessário informar o ID de alguma instituição.',
            'codModalidade.required' => 'É necessário informar o código da modalidade.',
        ];
    }
}
