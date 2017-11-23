<?php 

namespace Controller\FrontController;

use Controller\HomeController\HomeController;

class FrontController
{
	public function rodar($rota){
		switch ($rota) {
			case 'home':
				HomeController::home();
				break;
			
			default:
				# code...
				break;
		}
	}
}