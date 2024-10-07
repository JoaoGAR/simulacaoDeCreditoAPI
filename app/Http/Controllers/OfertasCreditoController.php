<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\OfertasCredito;

class OfertasCreditoController extends Controller
{
    protected $ofertaCreditoDAO;

    public function __construct(OfertasCredito $ofertaCreditoDAO)
    {
        $this->ofertaCreditoDAO = $ofertaCreditoDAO;
    }

    public function listaOfertasPorCPF(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cpf' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erro de validação.',
                'errors' => $validator->errors()
            ], 422);
        }

        $cpf = limpaCPF($cpf);
        $ofertas = $this->ofertaCreditoDAO->listaOfertasPorCPF($cpf);

        return response()->json([
            'status' => true,
            'message' => "Ofertas listadas com sucesso!",
            'ofertas' => $ofertas
        ], 200);
    }
}