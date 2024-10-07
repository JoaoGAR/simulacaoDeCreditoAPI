<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_oferta_credito', function (Blueprint $table) {
            $table->id('cd_oferta_credito');
            $table->unsignedBigInteger('cd_modalidade_credito');
            $table->bigInteger('nu_cpf')->length(11);
            $table->integer('nu_parcelas_min');
            $table->integer('nu_parcelas_max');
            $table->float('nu_valor_min');
            $table->float('nu_valor_max');
            $table->float('nu_juros_ao_mes');
            $table->timestamps();

            $table->foreign('cd_modalidade_credito')->references('cd_modalidade_credito')->on('tb_modalidade_credito')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_oferta_credito');
    }
};
