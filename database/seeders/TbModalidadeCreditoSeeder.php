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
        $instituicoes = DB::table('tb_instituicao')->pluck('cd_instituicao');

        foreach ($instituicoes as $instituicaoId) {
            DB::table('tb_modalidade_credito')->insert([
                [
                    'nm_modalidade_credito' => 'Crédito Pessoal',
                    'cd_modalidade_credito_inst' => 'CP_' . Str::upper(Str::random(16)),
                    'cd_instituicao' => $instituicaoId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nm_modalidade_credito' => 'Crédito Consignado',
                    'cd_modalidade_credito_inst' => 'CC_' . Str::upper(Str::random(16)),
                    'cd_instituicao' => $instituicaoId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
