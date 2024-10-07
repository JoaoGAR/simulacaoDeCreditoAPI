<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertasCredito extends Model
{
    use HasFactory;
    protected $table = 'tb_oferta_credito';

    public function listaOfertasPorCPF($cpf)
    {
        $ofertasCredito = new OfertasCredito();
        $dados = $ofertasCredito->where('cpf', $cpf)->get();

        return $dados;
    }
}
