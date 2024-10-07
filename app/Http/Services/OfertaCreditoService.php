<?php
namespace App\Http\Services;
use Illuminate\Database\Eloquent\Collection;
use App\Models\OfertasCredito;

class OfertaCreditoService
{
	private function valorFinal($valorEmprestimo, $jurosMes, $qtdParcelas)
	{
		$jurosMes = $jurosMes / 100;
		$valorFinal = $valorEmprestimo * (1 + $jurosMes) ** $qtdParcelas;
		return round($valorFinal, 2);
	}

	public function calculaTresMelhoresOfertas(Collection $ofertasCredito)
	{
		$valorEmprestimo = 10000;
		$ofertasCredito = $ofertasCredito->sortBy('jurosMes')->take(3);

		foreach ($ofertasCredito as $key => $ofertaCredito) {
			$valorFinalMin = $this->valorFinal($valorEmprestimo, $ofertaCredito->jurosMes, $ofertaCredito->qtdParcelasMin);
			$valorFinalMax = $this->valorFinal($valorEmprestimo, $ofertaCredito->jurosMes, $ofertaCredito->qtdParcelasMax);

			$ofertaCredito->valorFinalMin = $valorFinalMin;
			$ofertaCredito->valorFinalMax = $valorFinalMax;
		}

		$ofertasCredito = $ofertasCredito->sortBy([
		    ['valorFinalMin', 'asc'],
		    ['valorFinalMax', 'asc'],
		]);
		return $ofertasCredito;
	}
}