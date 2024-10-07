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
        Schema::create('tb_modalidade_credito', function (Blueprint $table) {
            $table->id('cd_modalidade_credito');
            $table->unsignedBigInteger('cd_instituicao');
            $table->string('nm_modalidade_credito', 255);
            $table->string('cd_modalidade_credito_inst', 255);
            $table->timestamps();

            $table->foreign('cd_instituicao')->references('cd_instituicao')->on('tb_instituicao')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_modalidade_credito');
    }
};
