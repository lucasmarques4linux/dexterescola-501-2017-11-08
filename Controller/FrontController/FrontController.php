<?php 

namespace Controller\FrontController;

use Controller\HomeController\HomeController;
use Controller\PeriodoController\PeriodoController;

class FrontController
{
	public function rodar($rota){
		switch ($rota) {
			case 'home':
				HomeController::home();
				break;
			case 'periodos':
				PeriodoController::home();
				break;
			
			default:
				HomeController::erro();;
				break;
		}
	}
}