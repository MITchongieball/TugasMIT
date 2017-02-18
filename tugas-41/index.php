<?php 
session_start();
//session_destroy();
require 'vendor/autoload.php';

use App\Lib\Route;

$controller = new Route($_GET);
$controller = $controller->createController();
$controller->executeAction($_GET['action']);
$controller->executeView($_GET['action']);