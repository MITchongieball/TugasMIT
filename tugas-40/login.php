<?php 
session_start();

require 'vendor/autoload.php';

use App\Classes\Librarian;

$librarian = new Librarian();

if (isset($_POST['login'])) {
	if (empty($_POST['usr'])) {
		$librarian->message = "Isi Username";
	} elseif (empty($_POST['pass'])) {
		$librarian->message = "Isi Password";
	} else {
		$librarian->login($_POST['usr'], $_POST['pass']);
	}
}

if (!empty($_SESSION['lib'])) {
	header("location: index.php");

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan Kota Kota-Login Pustakawan</title>
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
</head>
<body>
	<div class="form_login">
		<?= $librarian->message ?>
		<form action="" method="POST">
			<center>
				<input type="text" name="usr" placeholder="Username"><br/>
				<input type="password" name="pass" placeholder="Password"><br/>
				<button name="login">Login</button>
			</center>
		</form>
	</div>
</body>
</html>

