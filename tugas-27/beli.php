<?php
session_start();
//session_destroy();
require 'function.php';
include 'barang.php';

if (empty($_SESSION['beli'])) {
     $_SESSION['beli'] = [];
}
if (isset($_GET['buy'])) {
     cekDuplikat($_GET['buy']);
}

if (isset($_GET['kurang'])) {
	kurang($_GET['kurang']);
	// $_SESSION['produk'][$_GET['id']]['stock'] ++;
}

if (isset($_GET['tambah'])) {
	tambah($_GET['tambah']);
	// $_SESSION['produk'][$_GET['id']]['stock'] --;
}

if (isset($_GET['hapus'])) {
	hapus($_GET['hapus']);
}

?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title>Daftar Belanja</title>
		<link rel="stylesheet" type="text/css" href="beli.css">
	</head>
	<body>
		<?php include 'headernav.php'; ?>
		<section>
		<?php if (empty($_SESSION['beli'])) : ?>
			<div class="kosong">
				<center>
				<img class="empty_cart" src="http://royalchains.com/public/assets/frontend_assets/glammy/images/icon_empty_cart.png"/>
				<h2>Kamu Belum Belanja
				 <img class="sad" src="http://simpleicon.com/wp-content/uploads/sad.png"/>
				</h2>
				<a href="produk.php"><button>Belanja dulu yuk!</button></a>
				</center>
			</div>
		<?php else : ?>
			<div class="berisi">
				<div class="h3">
				<h3>Daftar Belanja</h3>
				</div>
				<div class="cart_detail">
				<table>
					<?php foreach ($_SESSION['beli'] as $key => $val) : ?>
					<tr>
						<td class="img"><img src="<?= $val['img'] ?>"/></td>
						<td class="nama"><?= $val['nama'] ?></td>
						<td class="jumlah">
							<a href="beli.php?kurang=<?=$key?>&id=<?=$val['id']?>">
							<button>-</button>
							</a>
							<?php if ($_SESSION['produk'][$val['id']]['stock'] >= 1): ?>
							<?= $val['jumlah'] ?>
							<a href="beli.php?tambah=<?=$key?>&id=<?=$val['id']?>">
							<button>+</button>
							</a>
							<?php else : ?>
							<?= $val['jumlah'] ?>
							<?php endif; ?>
						</td>
						<td class="harga">
							<?= rupiah(subHarga($val['jumlah'], $val['harga'])); ?>
						</td>
						<td class="hapus">
							<a href="beli.php?hapus=<?=$key?>&id=<?=$val['id']?>">
								<button class="hapus">x</button>
							</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
				</div>
				<div class="detail_cart">
					<table>
						<tr>
							<td colspan="2">
								<center><h3>Keterangan Belanja</h3></center><hr/>
							</td>
						</tr>
						<tr>
							<td>Barang yang dibeli</td>
							<td><?= count($_SESSION['beli']) ?> Produk</td>
						</tr>
						<tr>
							<td>Jumlah Barang</td>
							<?php $jml = array_column($_SESSION['beli'], 'jumlah'); ?>
							<td><?= array_sum($jml) ?> Barang</td>
						</tr>
						<tr>
							<td>Total Harga Belanja</td>
							<td><?= rupiah(subTotal()) ?></td>
						</tr>
					</table>
					<hr/>
					<a href="produk.php">
						<button>Masih Ingin Belanja? </button>
					</a>
					<a href="payment.php">
						<button>Lanjutkan Pembayaran</button>
					</a>
				</div>
			</div>
		<?php endif; ?>
		</section>
	</body>
</html>
<?php //print_r($_SESSION['produk']);