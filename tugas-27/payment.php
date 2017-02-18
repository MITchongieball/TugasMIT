<?php 
session_start();
require 'function.php';

if (isset($_POST['checkout'])) {
	unset($_SESSION['beli']);
}

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Pembayaran</title>
		<link rel="stylesheet" type="text/css" href="payment.css">
	</head>
	<body>
		<?php include 'headernav.php';?>
		<section>
			<div class="table_payment">
				<table>
					<tr>
						<th colspan="2">No. Invoice: <?= invoice() ?></th>
					</tr>
					<tr>
						<td>Sub Total</td>
						<td><?= rupiah(subTotal()) ?></td>
					</tr>
					<tr>
						<td>PPN</td>
						<td><?= rupiah(ppn()) ?></td>
					</tr>
					<tr>
						<td>Ongkir</td>
						<td><?= rupiah(0) ?></td>
					</tr>
					<tr>
						<td>Kode Unik</td>
						<td><?= rupiah(kodeUnik()) ?> </td>
					</tr>
					<tr>
						<td class="total"><b>Total Harga</b></td>
						<td class="harga"><b><?= rupiah(totalHarga()) ?></b></th>
					</tr>
				</table>
			</div>
			<div class="payment">
				Silahkan transfer ke BRI norek : <b>125748295910245</b> a/n Muhammad Iqbal. Terimakasih sudah belanja di <b>Kraken Shop</b><br/>
				<form method="POST" action="produk.php">
					<center><button name="checkout">Bayar Sekarang</button></center>
				</form>
			</div>
		</section>
	</body>
</html>