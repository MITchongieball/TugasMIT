<?php 
session_start();

require 'vendor/autoload.php';

use App\Classes\Librarian;

$title = "Panel Pustakawan";

if (empty($_SESSION['lib'])) {
	header("location: login.php");
}

$librarian = new Librarian;

if (isset($_GET['logout'])) {
	$librarian->logout();
	header("location: login.php");
}


include 'view/header.php';
include 'view/nav.php';

switch (true) {
	case (isset($_GET['librarian'])):
		include 'view/librarian.php';
		break;
	case (isset($_GET['book'])):
		include 'view/databook.php';
		break;
	case (isset($_GET['category'])):
		include 'view/category.php';
		break;
	case (isset($_GET['addbook'])):
		include 'view/addBook.php';
		break;
	case (isset($_GET['editbook'])):
		include 'view/editBook.php';
		break;
}

?>