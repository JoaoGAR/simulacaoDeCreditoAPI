<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SimularCreditoRequest;

use App\Models\Instituicoes;

class InstituicoesController extends Controller
{
    protected $instituicoesDAO;

    public function __construct(Instituicoes $instituicoesDAO)
    {
        $this->instituicoesDAO = $instituicoesDAO;
    }

    public function simularCrédito(SimularCreditoRequest $request)
    {
        $cpf = limpaCPF($request->input('cpf'));
        $ofertas = $this->instituicoesDAO->listarInstituicoes($cpf);

        return response()->json([
            'instituicoes' => $ofertas
        ], 200);
    }
}