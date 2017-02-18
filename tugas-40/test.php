<?php 

require 'vendor/autoload.php';

use App\Classes\Category;

$category = new Category;

var_dump($category->showById(2));