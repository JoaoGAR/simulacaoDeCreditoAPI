<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instituicoes extends Model
{
    use HasFactory;
    protected $table = 'tb_instituicao';

    public function modalidadesCredito(): HasMany
    {
        return $this->hasMany(ModalidadeCredito::class, 'idInstituicao', 'id');
    }

    public function listaInstituicoes($cpf)
    {
        $dados = Instituicoes::with('modalidadesCredito')->get();

        return $dados;
    }
}
