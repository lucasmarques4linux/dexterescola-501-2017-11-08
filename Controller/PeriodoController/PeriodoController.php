<?php 

namespace Controller\PeriodoController;

use View\BaseView\BaseView;
use Model\Periodo\Periodo;

class PeriodoController
{
	public function __construct(){}
	public static function home(){
		$periodos = Periodo::all();
		$data = ['periodos' => $periodos];
		$view = new BaseView();
		$view->render('Periodo','index',$data);
	}
	public static function new(){
		$view = new BaseView();
		$view->render('Periodo','new');
	}
	public static function edit($id){
		$periodo = Periodo::find($id);
		$data = ['periodo' => $periodo];
		$view = new BaseView();
		$view->render('Periodo','edit', $data);
	}
	public static function save($data){
		if ($data['id']) {
			$periodo = Periodo::find($data['id']);
		} else {
			$periodo = new Periodo();
		}
		$periodo->setDescricao($data['descricao']);
		$periodo->save();

		header("location:?r=periodos");
	}
	public static function delete($data){
		$periodo = Periodo::find($data['id']);
		$periodo->remove();
		header("location:?r=periodos");
	}
}