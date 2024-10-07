<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\OfertasCreditoController@listaOfertasPorCPF')->name('teste');

Route::get('/listaOfertasPorCPF', [App\Http\Controllers\OfertasCreditoController::class, 'listaOfertasPorCPF']);
//Route::get('/listaOfertasPorCPF/{cpf}', [OfertasCreditoController::class, 'listaOfertasPorCPF'])->name('listaOfertasPorCPF');