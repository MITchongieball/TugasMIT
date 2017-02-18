<?php

session_start();
if (isset($_POST['update'])) {
	$_SESSION['brgseller'][$_POST['id']] = [
		'namabrg'	=> $_POST['namabrg'],
		'hargabrg'	=> $_POST['hargabrg'],
		'stok'		=> $_POST['stok'],
		];
	echo "<script> window.location = 'sellerpage.php';</script>";
}

$barangseller = $_SESSION['brgseller'][$_GET['edit']];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Barang</title>
</head>
<body>
	<form action="update_brg.php?edit=<?=$_GET['edit']?>" method="POST">
		<fieldset style="width:20%">
			<input type="text" name="id" value="<?=$_GET['edit']?>">
			<input type="text" name="namabrg" value="<?=$barangseller['namabrg']?>"/><br>
			<input type="number" name="hargabrg" value="<?=$barangseller['hargabrg']?>"/><br>
			<input type="number" name="stok" value="<?=$barangseller['stok']?>"/><br>
			<button type="submit" name="update" value="update">Update</button>
	</form>
</body>
</html>