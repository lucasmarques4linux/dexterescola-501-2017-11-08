<?php 

require_once 'autoload.php';

use Controller\FrontController\FrontController;

$frontController = new FrontController();
$frontController->rodar('home');