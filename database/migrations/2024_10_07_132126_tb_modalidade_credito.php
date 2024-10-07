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
            $table->id('id');
            $table->unsignedBigInteger('idInstituicao');
            $table->string('nome', 255);
            $table->string('cod', 255);
            $table->timestamps();

            $table->foreign('idInstituicao')->references('id')->on('tb_instituicao')->onDelete('cascade');
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
