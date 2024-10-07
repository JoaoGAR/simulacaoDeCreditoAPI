<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/simulacaoDeCredito', [App\Http\Controllers\OfertasCreditoController::class, 'simulacaoDeCredito']);
