<?php
include 'function.php';
$barang = [];
$barang[] = [
	'type'	=> 'kemeja',
	'id'	=> 'kemeja1',
	'img'	=> 'img/kemeja1.jpg',
	'merk'	=> 'Moonar Men',
	'nama'	=> 'Kemeja Lengan Panjang Casual Biru Gelap',
	'harga'	=> '120000',
	'stock'	=> 2,
	];
$barang[] = [
	'type'	=> 'kemeja',
	'id'	=> 'kemeja2',
	'img'	=> 'img/kemeja2.jpg',
	'merk'	=> 'Vrichell Collection',
	'nama'	=> 'Kemeja Pria Hitam',
	'harga'	=> '110000',
	'stock'	=> 3,
	];
$barang[] = [
	'type'	=> 'kaos',
	'id'	=> 'kaos1',
	'img'	=> 'img/kaos1.jpg',
	'merk'	=> 'Hequ Short',
	'nama'	=> 'Kaos Lengan Pendek Starry Pour Milk',
	'harga'	=> '80000',
	'stock'	=> 42,
	];
$barang[] = [
	'type'	=> 'kaos',
	'id'	=> 'kaos2',
	'img'	=> 'img/kaos2.jpg',
	'merk'	=> 'Quincy Label',
	'nama'	=> 'Kaos Lengan Panjang V Neck Biru Dongker',
	'harga'	=> '60000',
	'stock'	=> 45,
	];
//print_r($_SESSION['produk']);
// $harga = array_column($barang, 'harga');
// $stock = array_column($barang, 'stock');
// print_r($harga);
// print_r($stock);
$jumla = 0;
// foreach ($barang as $key => $value) {
// 	$jumlah =  $jumla += $value['harga'];
// 	var_dump($jumlah);
// }

// echo $jumlah;

foreach ($barang as $key => $value) {
	$jumlah = totalHarga($value['stock'], $value['harga']);
	$jumlah1 = $jumla += $jumlah;
}

echo $jumlah1;