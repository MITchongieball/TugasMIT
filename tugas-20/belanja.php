<?php

session_start();

// Beli Barang
if (isset($_POST['kmj1'])){
	$_SESSION['harga'] = 150000;
	echo "<p>Silahkan isi form pemesanan dibawah ini</p>";
} elseif (isset($_POST['kmj2'])) {
	$_SESSION['harga'] = 200000;
	echo "<p>Silahkan isi form pemesanan dibawah ini</p>";
} elseif (isset($_POST['park1'])) {
	$_SESSION['harga'] = 120000;
	echo "<p>Silahkan isi form pemesanan dibawah ini</p>";
} elseif (isset($_POST['park2'])) {
	$_SESSION['harga'] = 130000;
	echo "<p>Silahkan isi form pemesanan dibawah ini</p>";
}
?>

<form method="POST" action="beli.php">
	<fieldset style="width:250px">
		<p><input style="width:100%" type="text" name="nm" placeholder="Nama"/></p>
		<p><input style="width:100%" type="number" name="jml" min="1" placeholder="Jumlah"></p>
		<p><textarea style="width:100%" name="alamat" placeholder="Alamat"></textarea></p>
		<p>Apakah anda member?
		<select name="member">
			<option value="y">Ya</option>
			<option value="n">Tidak</option>
		</select><br></p>
		<p>Kota pengiriman<br>
		<select style="width:100%" name="kota">
			<option value="1">Jakarta</option>
			<option value="2">Bandung</option>
			<option value="3">Surabaya</option>
		</select><br></p>
		<button type="submit" name="pesan">Pesan</button>
		<button><a href="idx2.php" style="text-decoration:none;color:black">Batal Pesan</a></button>
	</fieldset>
</form>

<?php
$harga = $_SESSION['harga'];
if (isset($_POST['pesan'])):
	$jumlah = $_POST['jml'];
 	$tothrg = $jumlah * $harga;
 	$kota = $_POST['kota'];
 	//	harga dan status member
 	$member = $_POST['member']; 
 	if ($member == 'y') {
 		$status = "Member";
 		$diskon = $harga * 5 / 100;
 		$harga1 = $harga - $diskon;
 	} else {
 		$status = "Non member";
 		$diskon = 0;
 		$harga1 = $harga + $diskon;
 	}

 	//ongkir
 	switch ($kota) {
 		case ($kota == 1):
 			$ongkir = 10000;
 			break;
 		case ($kota == 2):
 			$ongkir = 9000;
 			break;
 		case ($kota == 3):
 			$ongkir = 8000;
 			break;
 		default:
 			# code...
 			break;
 	}

?>

<p>
	Hai <?= $_POST['nm'] ?>.Berikut merupakan data pemesanan anda<br>
	<b>Status: <?= $status ?></b>
</p>

<table style="border-collapse:collapse;">
	<tr style="background:#7B8D8E;color:white;">
		<td width="250px"> </td>
		<td>Harga Produk<td>
		<td>Jumlah Pembelian<td>
	</tr>
</table>
<table style="background:#44B3C2;color:white;">
	<tr>
		<?php 
		switch ($harga) {
			case ($harga == 150000): 
				echo "<td><img width=\"100px\" src=\"kemeja2.jpg\"></td>";
				echo "<td>Kemeja Flanel Vans</td>";
				echo "<td width=\"76px\"><del>Rp $harga</del><br>Rp $harga1 <td>";
				break;
			case ($harga == 200000):
				echo "<td><img width=\"100px\" src=\"kemeja1.jpg\"></td>";
				echo "<td>Kemeja Flanel Kickers</td>";
				echo "<td width=\"76px\"><del>Rp $harga</del><br>Rp $harga1 <td>";
				break;
			case ($harga == 120000):
				echo "<td><img width=\"100px\" src=\"parka1.jpg\"></td>";
				echo "<td>Jaket Parka Vans</td>";
				echo "<td width=\"76px\"><del>Rp $harga</del><br>Rp $harga1 <td>";
				break;
			case ($harga == 130000):
				echo "<td><img width=\"100px\" src=\"parka2.jpg\"></td>";
				echo "<td>Jaket Parka DC</td>";
				echo "<td width=\"76px\"><del>Rp $harga</del><br>Rp $harga1 <td>";
				break;
		}
		?>
		<td align="center" width="122"><?= $jumlah ?></td>
</table>
<?php endif; ?>
