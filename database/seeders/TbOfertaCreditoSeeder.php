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
        $instituicoes = DB::table('tb_instituicao')->pluck('cd_instituicao');
        $min = 0.02;
        $max = 3.00;

        foreach ($instituicoes as $instituicaoId) {

            $modalidadesCredito = DB::table('tb_modalidade_credito')->where('cd_instituicao', $instituicaoId)->get();

            foreach($modalidadesCredito as $modalidadeCredito){
                DB::table('tb_oferta_credito')->insert([
                            [
                                'nu_cpf' => '11111111111',
                                'cd_modalidade_credito' => $modalidadeCredito->cd_modalidade_credito,
                                'nu_parcelas_min' => mt_rand(1, 12),
                                'nu_parcelas_max' => mt_rand(13, 50),
                                'nu_valor_min' => mt_rand(200, 1000),
                                'nu_valor_max' => mt_rand(1500, 5000),
                                'nu_juros_ao_mes' => ($min + ($max - $min) * (mt_rand() / mt_getrandmax())),
                                'created_at' => now(),
                                'updated_at' => now(),
                            ],
                            [
                                'nu_cpf' => '12312312312',
                                'cd_modalidade_credito' => $modalidadeCredito->cd_modalidade_credito,
                                'nu_parcelas_min' => mt_rand(1, 12),
                                'nu_parcelas_max' => mt_rand(13, 50),
                                'nu_valor_min' => mt_rand(200, 1000),
                                'nu_valor_max' => mt_rand(1500, 5000),
                                'nu_juros_ao_mes' => ($min + ($max - $min) * (mt_rand() / mt_getrandmax())),
                                'created_at' => now(),
                                'updated_at' => now(),
                            ],
                            [
                                'nu_cpf' => '22222222222',
                                'cd_modalidade_credito' => $modalidadeCredito->cd_modalidade_credito,
                                'nu_parcelas_min' => mt_rand(1, 12),
                                'nu_parcelas_max' => mt_rand(13, 50),
                                'nu_valor_min' => mt_rand(200, 1000),
                                'nu_valor_max' => mt_rand(1500, 5000),
                                'nu_juros_ao_mes' => ($min + ($max - $min) * (mt_rand() / mt_getrandmax())),
                                'created_at' => now(),
                                'updated_at' => now(),
                            ],
                        ]);
            }
        }
    }
}
