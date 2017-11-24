<?php 

namespace Controller\HomeController;

use View\BaseView\BaseView;

class HomeController
{
	public function __construct(){}
	public static function home(){
		$view = new BaseView();
		$view->render('Home','index');
	}
	public static function erro(){
		$view = new BaseView();
		$view->render('Home','404');
	}
}