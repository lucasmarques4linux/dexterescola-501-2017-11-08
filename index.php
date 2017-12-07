<?php 

require_once 'autoload.php';
session_start();

use Controller\FrontController\FrontController;



// var_dump($_SERVER['REQUEST_URI']);
// var_dump($_GET);
// die();


if (isset($_GET['r'])) {
	$rota = $_GET['r'];
} else {
	$rota = 'home';
}
if (isset($_GET['f'])) {
	$funcao = $_GET['f'];
} else {
	$funcao = 'home';
}


$frontController = new FrontController();
$frontController->rodar($rota,$funcao);