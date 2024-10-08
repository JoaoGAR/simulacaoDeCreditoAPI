<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\Http\Services\OfertaCreditoService;
use App\Models\OfertasCredito;
use App\Models\MelhoresOfertas;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('salvaTresMelhoresOfertasCredito', function () {
    $ofertaCredito = new OfertaCreditoService();
    $ofertasCreditoDAO = new OfertasCredito();
    $melhoresOfertasDAO = new MelhoresOfertas();

    $ofertas = $ofertasCreditoDAO->listaOfertasPorCPF('111.111.111-11');
    $melhoresOfertas = $ofertaCredito->calculaTresMelhoresOfertas($ofertas);

    foreach ($melhoresOfertas as $key => $melhorOferta) {
        $melhorOfertaDAO = $melhoresOfertasDAO::firstOrCreate($melhorOferta);
        $melhorOfertaDAO->save();
    }
})->purpose('Salvar as 3 melhores ofertas de um CPF no banco')->everyFiveMinutes();
