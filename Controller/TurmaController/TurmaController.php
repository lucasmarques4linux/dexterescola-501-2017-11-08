<?php 

namespace Controller\TurmaController;

use View\BaseView\BaseView;
use Model\Turma\Turma;
use Model\Periodo\Periodo;
use Model\Curso\Curso;

class AlunoController
{
	public static function home(){
		$turmas = Turma::all();
		$view = new BaseView();
		$view->render('Turma','index',[
			'turmas' => $turmas
		]);
	}
}