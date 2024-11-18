<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/simulacao/credito', [App\Http\Controllers\Api\V1\InstituicoesController::class, 'simularCrédito']);
    Route::post('/simulacao/oferta', [App\Http\Controllers\Api\V1\OfertasCreditoController::class, 'simularOferta']);
    Route::post('/simulacao/oferta/melhorOpcao', [App\Http\Controllers\Api\V1\OfertasCreditoController::class, 'melhoresOfertas']);
});