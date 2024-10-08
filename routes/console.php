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
    $cpf = '11111111111';
    $ofertaCredito = new OfertaCreditoService();
    $ofertasCreditoDAO = new OfertasCredito();

    $ofertas = $ofertasCreditoDAO->listaOfertasPorCPF($cpf);
    $melhoresOfertas = $ofertaCredito->calculaTresMelhoresOfertas($ofertas);

    foreach ($melhoresOfertas as $key => $melhorOferta) {
        $melhorOfertaDAO = new MelhoresOfertas();
        $melhorOfertaDAO->cpf = $cpf;
        $melhorOfertaDAO->qtdParcelasMin = $melhorOferta->qtdParcelasMin;
        $melhorOfertaDAO->qtdParcelasMax = $melhorOferta->qtdParcelasMax;
        $melhorOfertaDAO->valorMin = $melhorOferta->valorMin;
        $melhorOfertaDAO->valorMax = $melhorOferta->valorMax;
        $melhorOfertaDAO->jurosMes = $melhorOferta->jurosMes;
        $melhorOfertaDAO->valorFinalMin = $melhorOferta->valorFinalMin;
        $melhorOfertaDAO->valorFinalMax = $melhorOferta->valorFinalMax;
        $melhorOfertaDAO->save();
    }
})->purpose('Salvar as 3 melhores ofertas de um CPF no banco')->everyFiveMinutes();