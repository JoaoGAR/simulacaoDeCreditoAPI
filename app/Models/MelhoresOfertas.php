<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MelhoresOfertas extends Model
{
    use HasFactory;
    protected $table = 'tb_melhores_ofertas_credito';
    protected $fillable = [
        'cpf',
        'qtdParcelasMin',
        'qtdParcelasMax',
        'valorMin',
        'valorMax',
        'jurosMes',
        'valorFinalMin',
        'valorFinalMax'
    ];
}
