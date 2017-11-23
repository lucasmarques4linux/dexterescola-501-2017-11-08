<?php 

namespace Controller\HomeController;

use View\BaseView\BaseView;

class HomeController
{

	public static function home(){
		$view = new BaseView();
		$view->render('Home','index');
	}
}