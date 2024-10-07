<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertasCredito extends Model
{
    use HasFactory;
    protected $table = 'tb_oferta_credito';

    public function modalidadeCredito(): HasOne
    {
        return $this->hasOne(ModalidadeCredito::class, 'id', 'idModalidadeCredito');
    }

    public function listaOfertasPorCPF($cpf, $idInstituicao = null, $codModalidade = null)
    {
        $dados = OfertasCredito::select(
            'tb_oferta_credito.qtdParcelasMin', 
            'tb_oferta_credito.qtdParcelasMax', 
            'tb_oferta_credito.valorMin', 
            'tb_oferta_credito.valorMax', 
            'tb_oferta_credito.jurosMes'
        )
        ->join('tb_modalidade_credito', 'tb_modalidade_credito.id', 'tb_oferta_credito.idModalidadeCredito')
        ->where('tb_oferta_credito.cpf', $cpf);

        if($codModalidade){
            $dados = $dados->where('tb_modalidade_credito.cod', $codModalidade);
        }

        $dados = $dados->get();

        return $dados;
    }
}
