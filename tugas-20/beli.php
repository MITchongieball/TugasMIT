<?php
session_start();
$harga = $_SESSION['harga'];

if (isset($_POST['pesan'])):
	$jumlah = $_POST['jml'];
 	$kota = $_POST['kota'];
 	$kode = rand(1, 100); 
 	//	harga dan status member
 	$member = $_POST['member']; 
 	if ($member == 'y') {
 		$status = "Member";
 		$diskon = $harga * 5 / 100;
 		$harga1 = $harga - $diskon;
 	} else {
 		$status = "Non member";
 		$diskon = 0;
 		$harga1 = $harga - $diskon;
 	}
$subhrg = $jumlah * $harga1;

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
 	$totharga = $subhrg + $ongkir + $kode;

?>

<p>
	Hai <b><?= $_POST['nm'] ?></b>.Berikut merupakan data belanja anda<br>
	<b>Status: <?= $status ?></b>
</p>

<table style="border-collapse:collapse;">
	<tr style="background:#7B8D8E;color:white;">
		<td colspan="2"></td>
		<td>Harga Produk<td>
		<td><center>Jumlah Pembelian</center><td>
	</tr>
	<tr style="background:#44B3C2;color:white;">
		<?php 
		switch ($harga) {
			case ($harga == 150000): 
				echo "<td><img width=\"100px\" src=\"kemeja2.jpg\"></td>";
				echo "<td>Kemeja Flanel Vans</td>";
				echo "<td><del>Rp $harga</del><br>Rp $harga1 <td>";
				break;
			case ($harga == 200000):
				echo "<td><img width=\"100px\" src=\"kemeja1.jpg\"></td>";
				echo "<td>Kemeja Flanel Kickers</td>";
				echo "<td><del>Rp $harga</del><br>Rp $harga1 <td>";
				break;
			case ($harga == 120000):
				echo "<td><img width=\"100px\" src=\"parka1.jpg\"></td>";
				echo "<td>Jaket Parka Vans</td>";
				echo "<td><del>Rp $harga</del><br>Rp $harga1 <td>";
				break;
			case ($harga == 130000):
				echo "<td><img width=\"100px\" src=\"parka2.jpg\"></td>";
				echo "<td>Jaket Parka DC</td>";
				echo "<td><del>Rp $harga</del><br>Rp $harga1 <td>";
				break;
		}
		?>
		<td><center><?= $jumlah ?></center></td>
</table>
<br><br>
<table>
	<tr>
		<td>Keterangan Pemesanan<hr></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><?= $_POST['alamat'] ?></td>
	</tr>
	<tr>
		<td>Subtotal</td>
		<td>Rp&nbsp;<?= $subhrg ?></td>
	</tr>
	<tr>
		<td>Ongkos Kirim</td>
		<td>Rp&nbsp;<?= $ongkir ?></td>
	</tr>
	<tr>
		<td>Kode Unik</td>
		<td>Rp&nbsp;<?= $kode ?></td>
	</tr>
	<tr>
		<td><b>Total</b></td>
		<td><b>Rp&nbsp;<?= $totharga ?> </td>
	</tr>
</table>

<p>Silahkan transfer ke BRI Norek :<b>125748295910245</b> a/n <b>Muhammad Iqbal</b><br>
Terima kasih sudah berbelanja di Kraken Shop</p> 
<?php endif; ?>
