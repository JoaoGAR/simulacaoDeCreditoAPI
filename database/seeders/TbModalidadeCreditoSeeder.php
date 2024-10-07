<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TbModalidadeCreditoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instituicoes = DB::table('tb_instituicao')->pluck('id');

        foreach ($instituicoes as $instituicaoId) {
            DB::table('tb_modalidade_credito')->insert([
                [
                    'nome' => 'Crédito Pessoal',
                    'cod' => 'CP_' . Str::upper(Str::random(16)),
                    'idInstituicao' => $instituicaoId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nome' => 'Crédito Consignado',
                    'cod' => 'CC_' . Str::upper(Str::random(16)),
                    'idInstituicao' => $instituicaoId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
