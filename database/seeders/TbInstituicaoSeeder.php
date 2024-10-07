<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbInstituicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_instituicao')->insert([
            [
                'nome' => 'Banco do Brasil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Caixa Econômica Federal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Itaú Unibanco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Bradesco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Santander',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
