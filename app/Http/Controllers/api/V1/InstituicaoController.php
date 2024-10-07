<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Instituicoes;

class InstituicaoController extends Controller
{
    protected $instituicoesDAO;

    public function __construct(Instituicoes $instituicoesDAO)
    {
        $this->instituicoesDAO = $instituicoesDAO;
    }

    public function simulacaoDeCredito(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cpf' => 'required|string|max:15'
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
        $ofertas = $this->instituicoesDAO->getInstituicoes($cpf);

        return response()->json([
            'instituicoes' => $ofertas
        ], 200);
    }
}