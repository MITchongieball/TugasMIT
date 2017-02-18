<?php 
require 'vendor/autoload.php';

use App\Classes\Librarian;

$chief = new Librarian();
if (isset($_POST['add'])) {
	$data = [
		'name'	=> htmlspecialchars($_POST['name']),
		'usr'	=> htmlspecialchars($_POST['usr']),
		'pass'	=> password_hash($_POST['pass'], PASSWORD_BCRYPT),
		];
	$chief->addChief($data);
}

?>

<?= $chief->message ?>
<form action="" method="POST">
	<input type="text" name="name" placeholder="Nama">
	<input type="text" name="usr" placeholder="Username">
	<input type="password" name="pass" placeholder="Password">
	<button name="add">Tambah</button>
</form>