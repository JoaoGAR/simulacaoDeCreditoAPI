<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/v1/simulacaoDeCredito', [App\Http\Controllers\api\V1\InstituicaoController::class, 'simulacaoDeCredito']);
