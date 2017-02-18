<?php 
/* Kumpulan Fungsi Kraken Shop */
//tambah ke keranjang
function addCart($key)
{	
	$cart = [
		'id'		=> $key,
		'idproduk'	=> $_SESSION['produk'][$key]['id'],
		'img'		=> $_SESSION['produk'][$key]['img'],
		'nama'		=> $_SESSION['produk'][$key]['nama'],
		'harga'		=> $_SESSION['produk'][$key]['harga'],
		'jumlah'	=> 1,
	];
	return $cart;
}

//tambah quality jika membeli barang yang sama
function cekDuplikat($id)
{
	if (!in_array($id, array_column($_SESSION['beli'], 'id'))) {
		$_SESSION['beli'][] = addCart($id);
		$tambah = $_SESSION['beli'];
		$_SESSION['produk'][$_GET['buy']]['stock'] --;
	} else {
		$cari = array_search($id, array_column($_SESSION['beli'], 'id'));
		$tambah = $_SESSION['beli'][$cari]['jumlah'] ++;
		$_SESSION['produk'][$_GET['buy']]['stock'] --;
	}
	return $tambah;
}

//fungsi rupiah
function rupiah($harga)
{
	$rupiah = "Rp ". number_format($harga, 0, ',', '.');
	return $rupiah;
}

//fungsi sub harga cart
function subHarga($jumlah, $hrg)
{
	$subHarga = $jumlah * $hrg;
	return $subHarga;
}

//tambah quantity cart
function tambah($add)
{
	$tambahBrg = $_SESSION['beli'][$add]['jumlah'] ++;
	$_SESSION['produk'][$_GET['id']]['stock'] --;
	return $tambahBrg;
}

//kurang quantity cart
function kurang($notadd)
{
	$kurangBrg = $_SESSION['beli'][$notadd]['jumlah'] --;
	$_SESSION['produk'][$_GET['id']]['stock'] ++;
	if ($_SESSION['beli'][$notadd]['jumlah'] < 1) {
		unset($_SESSION['beli'][$notadd]);
	}
	return $kurangBrg;
}

//menghapus cart
function hapus($delete)
{
	$_SESSION['produk'][$_GET['id']]['stock'] += $_SESSION['beli'][$delete]['jumlah'];
	unset($_SESSION['beli'][$delete]);
}

//menghitung total harga cart
function subTotal()
{
	$a = 0;
	foreach($_SESSION['beli'] as $val) {
		$sub = subHarga($val['jumlah'], $val['harga']);
		$subtotal = $a += $sub;
	}
	return $subtotal;
}

//nomor invoice
function invoice()
{
	$invoice = date("sd"). rand(1000, 9000);
	return $invoice;
}

//PPN
function ppn()
{
	$ppn = 2/100 * subTotal();
	return $ppn;
}

function kodeUnik()
{
	$kode = substr(invoice(), 0, 2);
	return $kode;
}

function totalHarga()
{
	$total = subTotal() + ppn() + kodeUnik();
	return $total;
}
// if (isset($_GET['buy'])) {
// 	// $duplikat = array_column($_SESSION['beli'], 'id');
// 	if (in_array($_GET['id'], array_column($_SESSION['beli'], 'id'))) {
// 		$key = array_search($_GET['id'], array_column($_SESSION['beli'], 'id'));
// 		$_SESSION['beli'][$key]['jumlah'] += 1;
// 	} else {
// 	$_SESSION['beli'][] = addCart($_GET['buy']);
// 	}
// }