<?php

session_start();
//session_destroy();
if (!isset($_SESSION['brgseller'])) {
	$_SESSION['brgseller'] = array();
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
		<h3>Info Barang Seller <?= $_POST['namatoko'] ?></h3>
		<table border="1px">
			<tr>
				<th>Nama Barang</th>
				<th>Harga</th>
				<th>Stok</th>
				<th colspan="2">Action</th>
			</tr>
			<?php foreach ($_SESSION['brgseller'] as $key => $value) :?>
			<tr>
				<!-- <td style="visibility:hidden"><?= $key ?></td> -->
				<td><?= $value['namabrg'] ?></td>
				<td>Rp <?= $value['hargabrg'] ?></td>
				<td><?= $value['stok'] ?></td>
				<td><button><a href="update_brg.php?del=<?=$key?>">Update</a></button></td>
				<td><button><a href="barangseller.php?del=<?=$key?>">Delete</a></button></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</center>
</body>
</html>