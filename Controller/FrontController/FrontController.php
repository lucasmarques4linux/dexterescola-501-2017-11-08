<?php 

namespace Controller\FrontController;

use Controller\HomeController\HomeController;
use Controller\PeriodoController\PeriodoController;

class FrontController
{
	public function rodar($rota,$funcao){
		switch ($rota) {
			case 'home':
				switch ($funcao) {
					case 'index':
						HomeController::home();
						break;
				}				
				break;
			case 'periodos':
				switch ($funcao) {
					case 'index':
						PeriodoController::home();
						break;
					case 'new':
						PeriodoController::new();
						break;
					case 'edit':
						if (isset($_GET['id'])) {
							PeriodoController::edit($_GET['id']);
						}
						break;
					case 'save':
						$data = $_POST;
						PeriodoController::save($data);
						break;
					case 'delete':
						$data = $_POST;
						PeriodoController::delete($data);
						break;
				}				
				break;
			
			default:
				HomeController::erro();;
				break;
		}
	}
}