<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Http\Services\OfertaCreditoService;
use App\Models\OfertasCredito;

class OfertaCreditoController extends Controller
{
    protected $ofertasCreditoDAO;
    protected $ofertasCreditoService;

    public function __construct(OfertasCredito $ofertasCreditoDAO, OfertaCreditoService $ofertasCreditoService)
    {
        $this->ofertasCreditoDAO = $ofertasCreditoDAO;
        $this->ofertasCreditoService = $ofertasCreditoService;
    }

    public function simulacaoDeOferta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cpf' => 'required|string|max:15',
            'instituicao_id' => 'required|int|max:5',
            'codModalidade' => 'required|string|max:200'
        ],
        [
            'cpf.required' => 'É necessário informar um CPF.',
            'instituicao_id.required' => 'É necessário informar o ID de alguma instituição.',
            'codModalidade.required' => 'É necessário informar o código da modalidade.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação.',
                'errors' => $validator->errors()
            ], 422);
        }

        $cpf = $request->input('cpf');
        $cpf = limpaCPF($cpf);
        $idInstituicao = $request->input('instituicao_id');
        $codModalidade = $request->input('codModalidade');

        $ofertasCredito = $this->ofertasCreditoDAO->listaOfertasPorCPF($cpf, $idInstituicao, $codModalidade);

        return response()->json($ofertasCredito, 200);
    }

    public function melhoresOfertas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cpf' => 'required|string|max:15'
        ],
        [
            'cpf.required' => 'É necessário informar um CPF.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação.',
                'errors' => $validator->errors()
            ], 422);
        }

        $cpf = $request->input('cpf');
        $cpf = limpaCPF($cpf);
        
        $ofertasCredito = $this->ofertasCreditoDAO->listaOfertasPorCPF($cpf);
        $ofertasCredito = $this->ofertasCreditoService->calculaTresMelhoresOfertas($ofertasCredito);

        return response()->json($ofertasCredito, 200);
    }
}
