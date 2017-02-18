<?php 
session_start();
include 'function.php';
include 'daftar_soal.php';

if (isset($_POST['end'])) {
	// $hasil = result($_POST['jawab']);
	$hasil = lulus($_POST['jawab']);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hasil</title>
		<link rel="stylesheet" type="text/css" href="kstyle.css">
	</head>
	<body>
		<section class="result">
			<div class="lulus">
			<?php if (!empty($hasil)) : ?>
			<?php foreach ($hasil as $val) : ?>
				<img src="<?= $val['img'] ?>" title="<?= $val['text'] ?>"/><br/>
				<div class="detail">
					<table>
						<tr>
							<td>Skor</td>
							<td><b><?= $val['nilai'] ?></b></td>
						</tr>
						<tr>
							<td>Jumlah Benar</td>
							<td><b><?= $val['benar'] ?></b></td>
						</tr>
					</table>
				</div>
				<form method="POST" action="pilih_soal.php">
					<button name="coba">Coba Lagi?</button>
				</form>
				<form method="POST" action="klearning.php">
					<button name="out">Keluar</button>
				</form>
			</div>
			<?php endforeach; ?>
			<?php endif; ?>
		</section>
	</body>
</html>