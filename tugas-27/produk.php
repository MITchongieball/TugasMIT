<?php
session_start();
// session_destroy();
require 'barang.php';
include 'function.php';

if (!isset($_SESSION['produk'])) {
	$_SESSION['produk'] = $barang;
}

if (isset($_POST['checkout'])) {
	unset($_SESSION['beli']);
	echo "<script>alert('Terima Kasih Sudah Belanja di Kraken Shop'); </script>";
}

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
		<title>Daftar Produk</title>
		<link rel="stylesheet" type="text/css" href="produk.css">
	</head>
	<body>
		<?php include 'headernav.php'; ?>
		<div class="cover">
			<?php foreach ($_SESSION['produk'] as $key => $val) : ?>
				<div class="isi">
					<div class="detail">
						<center>
						<img src="<?= $val['img'] ?>" width="150px" height="150px"/>
						<p><?= $val['merk'] ?></p>
						<p><?= $val['nama'] ?></p>
						<p><?= rupiah($val['harga']) ?></p>
						<?php if ($val['stock'] < 7 && $val['stock'] >= 1) : ?>
						<a href="beli.php?buy=<?=$key?>">
							<button><img src="img/beli1.png"> Stok <?= $val['stock'] ?> lagi!</img></button>
						</a>
						<?php elseif ($val['stock'] < 1) : ?>
						<button class="sad" disabled>
							<img class="sad" src="http://www.iconsplace.com/icons/preview/orange/sad-256.png">Stok habis</img>
						</button>
						<?php else : ?>
						<a href="beli.php?buy=<?=$key?>" disabled>
							<button><img src="img/beli1.png"/></button>
						</a>
						</center>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</body>
</html>
<!-- <?php print_r($_SESSION['produk']); ?> -->