<?php 

require_once 'autoload.php';

use Controller\FrontController\FrontController;


if (isset($_GET['r'])) {
	$rota = $_GET['r'];
} else {
	$rota = 'home';
}

$frontController = new FrontController();
$frontController->rodar($rota);