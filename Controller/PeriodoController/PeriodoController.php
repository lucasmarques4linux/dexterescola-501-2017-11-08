<?php 

namespace Controller\PeriodoController;

use View\BaseView\BaseView;
use Model\Periodo\Periodo;

class PeriodoController
{
	public static function home(){
		$periodos = Periodo::all();
		$dados = [
			'periodos' => $periodos
		];
		$view = new BaseView();
		$view->render('Periodo','index',$dados);
	}
}