<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/simulacao/credito', [App\Http\Controllers\api\V1\InstituicaoController::class, 'simulacaoDeCredito']);
    Route::post('/simulacao/oferta', [App\Http\Controllers\api\V1\OfertaCreditoController::class, 'simulacaoDeOferta']);
});