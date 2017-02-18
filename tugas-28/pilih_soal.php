<?php
session_start();
// session_destroy();
include 'function.php';
include 'daftar_soal.php';

if (empty($_SESSION['soal'])) {
	$_SESSION['soal'] = array();
}

if (isset($_POST['coba'])) {
	cobaLagi();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kerjakan Soal</title>
		<link rel="stylesheet" type="text/css" href="kstyle.css">
  		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet"> 
	</head>
	<body>
		<section class="pilih_soal">
				<div class="member">
					<p>Pilih Soal</p>
				</div>
				<div class="select">
					<a href="pilih_soal.php?soal=matematika" title="Matematika">
						<img src="http://www.iconsfind.com/wp-content/uploads/2016/04/20160407_5705cb55925bf.png"/>
					</a>
					<a href="pilih_soal.php?soal=analogi" title="Analogi">
						<img src="http://cdn.countryflags.com/thumbs/indonesia/flag-round-250.png"/>
					</a>
				</div>
					<?php 
					if (isset($_GET['soal'])) {
						if ($_GET['soal'] == 'matematika') {
							cobaLagi();
							pilihSoal('matematika');
						} else {
							cobaLagi();
							pilihSoal('analogi');
						}
					}

					?>
				<?php if (!empty($_SESSION['soal'])) : ?>
				<div class="soal">
					<form method="POST" action="result.php">
					<?php $no = 1; ?>
					<?php foreach (acakSoal($_SESSION['soal']) as $val) : ?>
						<p>
							<?= $no++ ?>. <?= $_SESSION['soal'][$val]['soal'] ?>
						</p>
						<?php foreach ($_SESSION['soal'][$val]['key'] as $value) : ?>
						<p>
							<input type="radio" name="jawab[<?= $val ?>]" value="<?= $value ?>">
							<?= $value ?>
						</p>
						<?php endforeach; ?>
					<?php endforeach; ?>
						<button name="end">
							<i class="large material-icons">done</i>
						</button>
					</form>
				</div>
				</section>
			<?php endif; ?>
	</body>
</html>