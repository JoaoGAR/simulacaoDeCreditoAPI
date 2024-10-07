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
            $table->id('id');
            $table->unsignedBigInteger('idModalidadeCredito');
            $table->bigInteger('cpf')->length(11);
            $table->integer('qtdParcelasMin');
            $table->integer('qtdParcelasMax');
            $table->float('valorMin');
            $table->float('valorMax');
            $table->float('jurosMes');
            $table->timestamps();

            $table->foreign('idModalidadeCredito')->references('id')->on('tb_modalidade_credito')->onDelete('cascade');
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
