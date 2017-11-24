<?php 

namespace Controller\FrontController;

use Controller\HomeController\HomeController;
use Controller\PeriodoController\PeriodoController;

class FrontController
{
	public function rodar($rota,$funcao){
		switch ($rota) {
			case 'home':
				HomeController::$funcao();		
				break;
			case 'periodos':
				PeriodoController::$funcao();
				break;
			
			default:
				HomeController::erro();;
				break;
		}
	}
}