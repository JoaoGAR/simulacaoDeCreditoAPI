<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbOfertaCreditoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instituicoes = DB::table('tb_instituicao')->pluck('id');
        $min = 2.00;
        $max = 4.00;

        foreach ($instituicoes as $instituicaoId) {

            $modalidadesCredito = DB::table('tb_modalidade_credito')->where('idInstituicao', $instituicaoId)->get();

            foreach($modalidadesCredito as $modalidadeCredito){
                DB::table('tb_oferta_credito')->insert([
                            [
                                'cpf' => '11111111111',
                                'idModalidadeCredito' => $modalidadeCredito->id,
                                'qtdparcelasmin' => mt_rand(1, 12),
                                'qtdparcelasmax' => mt_rand(13, 50),
                                'valorMin' => mt_rand(1000, 5000),
                                'valorMax' => mt_rand(5100, 50000),
                                'jurosMes' => round(($min + ($max - $min) * (mt_rand() / mt_getrandmax())), 2),
                                'created_at' => now(),
                                'updated_at' => now(),
                            ],
                            [
                                'cpf' => '12312312312',
                                'idModalidadeCredito' => $modalidadeCredito->id,
                                'qtdparcelasmin' => mt_rand(1, 12),
                                'qtdparcelasmax' => mt_rand(13, 50),
                                'valorMin' => mt_rand(1000, 5000),
                                'valorMax' => mt_rand(5100, 50000),
                                'jurosMes' => round(($min + ($max - $min) * (mt_rand() / mt_getrandmax())), 2),
                                'created_at' => now(),
                                'updated_at' => now(),
                            ],
                            [
                                'cpf' => '22222222222',
                                'idModalidadeCredito' => $modalidadeCredito->id,
                                'qtdparcelasmin' => mt_rand(1, 12),
                                'qtdparcelasmax' => mt_rand(13, 50),
                                'valorMin' => mt_rand(1000, 5000),
                                'valorMax' => mt_rand(5100, 50000),
                                'jurosMes' => round(($min + ($max - $min) * (mt_rand() / mt_getrandmax())), 2),
                                'created_at' => now(),
                                'updated_at' => now(),
                            ],
                        ]);
            }
        }
    }
}
