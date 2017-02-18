<?php 
session_start();
session_destroy();
/*Tugas 29-Membuat 20 class */
include 'objek.php';

echo "<h1>Class 1-Operasi Matematika Dasar</h1>";
$angkaRandom = rand(1, 10);
$operator = new Matematika();
$operator->setAngka($angkaRandom, $angkaRandom);
$operator->tambah();
echo "<br/>";
$operator->kurang();
echo "<br/>";
$operator->kali();
echo "<br/>";
$operator->bagi();
echo "<br/>";
echo "<hr/>";

?>

<h1>Class 2-Jenis Hewan</h1>
<form method="POST" action="">
	<fieldset style="border:1px solid black;width:50%">
		<input type="text" name="hewan" placeholder="Nama Hewan"/>
		<select name="makanan">
			<option value="tumbuhan">Tumbuhan</option>
			<option value="daging">Daging</option>
			<option value="segala">Semua</option>
		</select>
		<select name="biak">
			<option value="melahirkan">Melahirkan</option>
			<option value="bertelur">Bertelur</option>
			<option value="telurlahir">Bertelur dan Melahirkan</option>
		</select>
		<button name="cek">Cek</button>
	</fieldset>
</form>
<hr/>
<?php if (isset($_POST['cek'])) {
	$jenisHewan = new Hewan();
	$jenisHewan->jenisHewanByMakanan($_POST['makanan']);
	echo ". ";
	$jenisHewan->jenisHewanByKembangBiak($_POST['biak']);
}

?>

<h1>Class 3-Mahasiswa</h1>
<form action="" method="POST">
	<fieldset>
		Masukkan Data Anda<br/>
		<input type="text" name="nim" placeholder="NIM"/><br/>
		<input type="text" name="nama" placeholder="Nama"/><br/>
		<input type="email" name="email" placeholder="E-mail"><br/>
		<input type="text" name="fakultas" placeholder="Fakultas"><br/>
		<input type="text" name="prodi" placeholder="Program Studi"><br/>
		<button name="daftar">Daftar</button>
	</fieldset>
</form>
<?php if (isset($_POST['daftar'])): ?>
<?php $regMahasiswa = new Mahasiswa($_POST['nim'], $_POST['nama'], $_POST['fakultas'], $_POST['prodi']); ?>
<?php $regMahasiswa->regisMahasiswa($_POST['email']); ?>
Berikut merupakan data anda
<table border="1">
	<tr>
		<th>NIM</th>
		<th>Nama</th>
		<th>E-mail</th>
		<th>Fakultas</th>
		<th>Program Studi</th>
	</tr>
	<?php foreach ($_SESSION['mahasiswa'] as $key => $val): ?>
	<tr>
		<td><?= $val['nim'] ?></td>
		<td><?= $val['nama'] ?></td>
		<td><?= $val['email'] ?></td>
		<td><?= $val['fakultas'] ?></td>
		<td><?= $val['prodi'] ?></td>
	</tr>
	<?php endforeach; ?>
 </table>
<?php endif; ?>
<hr/>

<h1>Class4-Dosen</h1>
<?php
if (empty($_SESSION['mahasiswa'])) {
	$_SESSION['mahasiswa'] = array();
}

?>
<?php $dosen = new Dosen(); ?>
Dosen <?= $dosen->namaDosen ?>, silahkan input nilai
<form method="POST" action="">
	<table>
	<?php foreach ($_SESSION['mahasiswa'] as $data) :?>
		<tr>
			<td><?= $data['nama'] ?>: </td>
			<td><input type="text" name="nilai" placeholder="Nilai"></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<button name="daftarnilai">Input nilai</button>
</form>
<?php if(isset($_POST['daftarnilai'])) : ?>
	<?php $nilai = $dosen->inputNilai($_POST['nilai']); ?>
<?php endif; ?>
<table border="1">
	<tr>
	<th colspan="3">
		<center>
			Daftar nilai Mata Kuliah <?= $dosen->matkul ?>
		</center>
	</th>
	</tr>
	<?php foreach($nilai as $val) : ?>
		<tr>
			<td><?= $val[0] ?></td>
			<td><?= $val[1] ?></td>
			<td><?= $val[2] ?></td>
		</tr>
	<?php endforeach; ?>
</table>
<hr/>

<h1>Class5-Surat</h1>
Silahkan isi detail Surat dibawah ini
<form action="" method="POST">
	<fieldset style="border:1px solid black;width:30%;background:#ccc;">
		<input type="text" name="pengirim" placeholder="Pengirim"/><br/>
		<input type="text" name="penerima" placeholder="Penerima"/><br/>
		<input type="text" name="subjek" placeholder="Subjek"/><br/>
		<textarea name="isi" cols="30" rows="10" placeholder="Isi Surat"></textarea><br/>
		<button name="kirim">Kirim</button>
	</fieldset>
</form>
<?php if (isset($_POST['kirim'])) {
	$surat = new Surat($_POST['pengirim']);
	$surat->tambahPenerima($_POST['penerima']);
	$surat->setSubjek($_POST['subjek']);
	$surat->setIsi($_POST['isi']);
	print_r($surat->kirimSurat());
}

?>
<hr/>

<h1>Class6-Toko</h1>
<?php
$toko = new Toko("Kraken");
echo "<br/>";
$toko->inventory("Wew", "Gitar", 10000, 5);
$toko->inventory("Wew", "Baju", 10000, 5);
$toko->inventory("Wew", "Gitar", 10000, 5);
$toko->inventory("Wew", "Baju", 10000, 5);
$toko->inventory("Wew", "Gitar", 10000, 5);
var_dump($_SESSION['inven']);
?>
Daftar Barang di <?= $toko->namaToko; ?>
<table border="1">
	<tr>
		<th>Nama Barang</th>
		<th>Kategori Barang</th>
		<th>Harga</th>
		<th>Stok</th>
	</tr>
	<?php foreach ($_SESSION['inven'] as $daftar) : ?>
	<tr>
		<td><?= $daftar['nama'] ?></td>
		<td><?= $daftar['type'] ?></td>
		<td><?= $daftar['harga'] ?></td>
		<td><?= $daftar['stock'] ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<hr/>
