<h2>Daftar Barang di Toko Iqbal</h2>

<?php
$barang = array();
$barang['indomie'] = [
	'idbrg' => '1213',
	'nmbrg' => 'Indomie Goreng',
	'stok'  => '40'
	];
$barang['sapuijuk'] = [
	'idbrg' => '1256',
	'nmbrg' => 'Sapu Ijuk',
	'stok'  => '3'
	];
$barang['pastapep'] = [
	'idbrg' => '3436',
	'nmbrg' => 'Pasta Gigi Pepsodent',
	'stok'  => '30'
	];
$barang['sunsilkbtl'] = [
	'idbrg' => '2633',
	'nmbrg' => 'Sampo Sunsilk Botol',
	'stok'  => '10'
	];
?>

<form method="POST">
	<select name="urut">
		<option value="0">Urutkan</option>
		<option value="1">ID Terendah</option>
		<option value="2">ID Tertinggi</option>
		<option value="3">Nama Barang</option>
	</select>
	<button type="submit" name="sort">Cek</button>
</form>
<?php

if (isset($_POST['sort'])) {
	$urut = $_POST['urut'];
	if ($urut == 1) {
		asort($barang);
	} elseif ($urut == 2) {
		arsort($barang);
	} elseif ($urut == 3) {
		ksort($barang);
	}
}
?>

<table border="1">
	<tr>
		<th>ID Barang</th>
		<th>Nama Barang</th>
		<th>Stok</th>
	</tr>
	<?php foreach ($barang as $data): ?>
	<tr>
		<td><?= $data['idbrg'] ?></td>
		<td><?= $data['nmbrg'] ?></td>
		<td><?= $data['stok'] ?></td>
	<?php endforeach;?>
	</tr>
</table>
