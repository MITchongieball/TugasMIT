<?php
/* Kumpulan Fungsi Soal Online */
//pilih soal
function pilihSoal($type)
{
	global $soal;
	foreach ($soal as $key => $val) {
		if ($type == $val['jenis']) {
			$_SESSION['soal'][] = $val;
		}	
	}
}

//acak soal 
function acakSoal($a)
{
	$acak = array_rand($a, 5);
	return $acak;
}

//menentukan nilai
function result($jawab)
{
	$_SESSION['pilih'] = $jawab;
	$nilai = 0;
	$_SESSION['try']['benar'] = '';
	foreach ($_SESSION['pilih'] as $key => $value) {
		if ($value == $_SESSION['soal'][$key]['answer']) {
			$nilai += 20;
			$_SESSION['try']['benar'] += 1;
		} //elseif ($value == '') {
			//$nilai -= 5;
		else {
			$nilai -= 10;
			$_SESSION['try']['benar'] += 0;
		}
	}

	if ($nilai <= 0) {
		$nilai = 0;
	}
	return $nilai;
}

//menentukan lulus tdk lulus
function lulus($counter)
{
	if (result($counter) < 70) {
		$lulus[] = [
			'img'	=> 'http://www.newdesignfile.com/postpic/2013/08/logo-red-circle-with-x_368970.png',
			'text'	=> 'Gagal',
			'nilai'	=> result($counter),
			'benar'	=> $_SESSION['try']['benar'],
			];
		// $_SESSION['member']['gagal'] += 1;
	} else {
		$lulus[] = [
			'img'	=> 'http://www.procliparts.com/resize/900w/cliparts/pele/tqgczgcr9-check-circle.png',
			'text'	=> 'Lulus',
			'nilai'	=> result($counter),
			'benar'	=> $_SESSION['try']['benar'],
			];
		// $_SESSION['member']['gagal'] += 0;
	}
	return $lulus;
}

//coba lagi
function cobaLagi()
{
	unset($_SESSION['soal']);
	unset($_SESSION['pilih']);
	$_SESSION['try']['benar'] = '';
}