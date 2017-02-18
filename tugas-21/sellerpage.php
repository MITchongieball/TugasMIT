<!DOCTYPE html>
<html>
<head>
	<title>Seller Page</title>
</head>
<body>
	<center>
		<h3>Daftar Barang yang Ingin Anda Jual</h3>
		<form method="POST" action="sellerpage.php">
			<fieldset style="width:200px">
				<input type="text" name="namabrg" placeholder="Nama Barang" required><br>
				<input type="number" name="hargabrg" placeholder="Harga Barang" required><br>
				<input type="number" name="stok" placeholder="Stok Barang" required><br>
				<button type="submit" name ="daftarbrg" value="daftarbrg">Daftar Barang</button>
			</fieldset>
		</form>
	</center>
</body>
</html>

<?php

session_start();
//session_destroy();
if (!isset($_SESSION['brgseller'])) {
	$_SESSION['brgseller'] = array();
} else {
	$barangseller = $_SESSION['brgseller'];
}

if (isset($_POST['daftarbrg'])) {
	$barangseller[] = [
		'namabrg'	=> $_POST['namabrg'],
		'hargabrg'	=> $_POST['hargabrg'],
		'stok'		=> $_POST['stok']
		];
	$_SESSION['brgseller'] = $barangseller;
}

if (isset($_GET['del'])) {
	unset($_SESSION['brgseller'][$_GET['del']]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Barang Seller</title>
</head>
<body>
	<center>
		<h3>Info Barang Seller</h3>
		<table border="1px">
			<tr>
				<th>Nama Barang</th>
				<th>Harga</th>
				<th>Stok</th>
				<th colspan="2">Action</th>
			</tr>
			<?php foreach ($_SESSION['brgseller'] as $key => $value) :?>
			<tr>
				<td><?= $key ?></td>
				<td><?= $value['namabrg'] ?></td>
				<td>Rp <?= $value['hargabrg'] ?></td>
				<td><?= $value['stok'] ?></td>
				<td><button><a href="update_brg.php?edit=<?=$key?>">Update</a></button></td>
				<td><button><a href="sellerpage.php?del=<?=$key?>">Delete</a></button></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</center>
</body>
</html>

