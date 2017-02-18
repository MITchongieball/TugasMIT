<!DOCTYPE html>
<html>
<head>
	<title>Daftar Menjadi Seller</title>
</head>
<body>
	<center>
		<h3>Isi form dibawah ini untuk menjadi Seller di Kraken Shop</h3>
		<form method="POST" action="daftarseller.php">
			<fieldset style="width:200px">
				<input type="text" name="usrseller" placeholder="Username"><br>
				<input type="password" name="pwseller" placeholder="Password"><br>
				<button type="submit" name ="daftar" value="daftar">Daftar</button>
			</fieldset>
		</form>
	</center>
</body>
</html>

<?php

session_start();
//session_destroy();
	// $seller[] = [
	// 	'usrseller'	=> 'tokobagus',
	// 	'pwseller'	=> 'bagus123'
	// ];
if(!empty($_SESSION['seller'])) {
	$seller = $_SESSION['seller'];
} else {
	$seller = array();
}

if (isset($_POST['daftar'])) {
	$cekusr = array_column($seller, 'usrseller');

	if (in_array($_POST['usrseller'], $cekusr)) {
		echo "<center>Maaf, Username Anda Sudah Digunakan</center>";
	} else {
		$seller[] = [
			'usrseller'	=> $_POST['usrseller'],
			'pwseller'	=> $_POST['pwseller']
		];
		echo "<center>Berhasil daftar, silahkan <a href=\"index.php\">login</a></center>";
		$_SESSION['seller'] = $seller;
	}

}
?>