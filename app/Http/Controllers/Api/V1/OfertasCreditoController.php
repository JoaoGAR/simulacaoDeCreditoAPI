<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SimulacaoDeOfertaRequest;
use App\Http\Requests\MelhoresOfertasRequest;

use App\Http\Services\OfertaCreditoService;
use App\Models\OfertasCredito;

class OfertasCreditoController extends Controller
{
    protected $ofertasCreditoDAO;
    protected $ofertasCreditoService;

    public function __construct(OfertasCredito $ofertasCreditoDAO, OfertaCreditoService $ofertasCreditoService)
    {
        $this->ofertasCreditoDAO = $ofertasCreditoDAO;
        $this->ofertasCreditoService = $ofertasCreditoService;
    }

    public function simularOferta(SimulacaoDeOfertaRequest $request)
    {
        $cpf = limpaCPF($request->cpf);
        $idInstituicao = $request->instituicao_id;
        $codModalidade = $request->codModalidade;

        $ofertasCredito = $this->ofertasCreditoDAO->listaOfertasPorCPF($cpf, $idInstituicao, $codModalidade);

        return response()->json($ofertasCredito, 200);
    }

    public function melhoresOfertas(MelhoresOfertasRequest $request)
    {
        $cpf = limpaCPF($request->cpf);

        $ofertasCredito = $this->ofertasCreditoDAO->listaOfertasPorCPF($cpf);
        $melhoresOfertas = $this->ofertasCreditoService->calculaTresMelhoresOfertas($ofertasCredito);

        return response()->json($melhoresOfertas, 200);
    }
}
