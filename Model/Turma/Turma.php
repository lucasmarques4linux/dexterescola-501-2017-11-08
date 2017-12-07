<?php 

namespace Model\Turma;

use DAO\TurmaDAO\TurmaDAO;

class Turma
{

	private $periodoId;

	public function getPeriodoId(){
		return $this->periodoId;
	}

	/*
	 * Retorna um objeto de Periodo
	 */
	public function getPeriodo(){
		$periodo = Periodo::find($this->getPeriodoId());
		return $periodo;
	}
}