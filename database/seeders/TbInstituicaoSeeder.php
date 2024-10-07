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
                'nm_instituicao' => 'Banco do Brasil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nm_instituicao' => 'Caixa Econômica Federal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nm_instituicao' => 'Itaú Unibanco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nm_instituicao' => 'Bradesco',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nm_instituicao' => 'Santander',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
