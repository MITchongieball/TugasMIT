<?php 

require 'vendor/autoload.php';
require 'app/Views/home.php';

use App\Lib\Route;

$controller = new Route($_GET);
$controller = $controller->createController();
$controller->executeAction($_GET['action']);
$controller->executeView($_GET['action']);