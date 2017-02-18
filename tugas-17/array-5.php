<h2> Cari Data Anggota MIT </h2>
<form method="POST">
	<input type="text" name="nama" placeholder="Nama"/> 
	<button type="submit" name="cari">Cari</button>
</form>

<?php
$anggota = [
	0 => [
		'nama' => 'Afri Dermawan',
		'umur' => '19 Tahun',
		'asal' => 'Binjai',
		'status' => 'PHP Dev'
		],
	1 => [
		'nama' => 'Muhammad Iqbal',
		'umur' => '18 Tahun',
		'asal' => 'Bengkulu',
		'status' => 'PHP Dev'
		],
	2 => [
		'nama' => 'Febi Adrian',
		'umur' => '23 Tahun',
		'asal' => 'Baturaja',
		'status' => 'PHP Dev'
		],
	3 => [
		'nama' => 'Farhan Mustaqiem',
		'umur' => '15 Tahun',
		'asal' => 'Bekasi',
		'status' => 'PHP Dev'
		],
	4 => [
		'nama' => 'Labib Muhajir',
		'umur' => '24 Tahun',
		'asal' => 'Jombang',
		'status' => 'PHP Dev'
		],
	5 => [
		'nama' => 'Muhammad Ilham Arrouf',
		'umur' => '19 Tahun',
		'asal' => 'Lubuk Linggau',
		'status' => 'PHP Dev'
		],
	6 => [
		'nama' => 'Muhammad Cucu Irsad',
		'umur' => '25 Tahun',
		'asal' => 'Tasikmalaya',
		'status' => 'PHP Dev'
		],
	7 => [
		'nama' => 'Muhammad Imam Syafii',
		'umur' => '23 Tahun',
		'asal' => 'Bojonegoro',
		'status' => 'PHP Dev'
		]
	];

if (isset($_POST['cari'])) {
	$nama = $_POST['nama'];
		switch ($nama) {
		case ($nama == "afri" || $nama == "Afri" || $nama == "Afri Dermawan"):
			$display = implode("<br>", $anggota[0]);
   				echo "$display";
			break;
		case ($nama == "iqbal" || $nama == "Iqbal" || $nama == "Muhammad Iqbal"):
			$display = implode("<br>", $anggota[1]);
     			echo "$display";
			break;
		case ($nama == "febi" || $nama == "Febi" || $nama == "Febi Adrian"):
			$display = implode("<br>", $anggota[2]);
     			echo "$display";
			break;
		case ($nama == "farhan" || $nama == "Farhan" || $nama == "Farhan Mustaqiem"):
			$display = implode("<br>", $anggota[3]);
     			echo "$display";
			break;
		case ($nama == "labib" || $nama == "Labib" || $nama == "Labib Muhajir"):
			$display = implode("<br>", $anggota[4]);
   				echo "$display";
			break;
		case ($nama == "ilham" || $nama == "Ilham" || $nama == "Muhammad Ilham Arrouf"):
			$display = implode("<br>", $anggota[5]);
     			echo "$display";
			break;
		case ($nama == "cucu" || $nama == "irsad" || $nama == "Muhammad Cucu Irsad"):
			$display = implode("<br>", $anggota[6]);
     			echo "$display";
			break;
		case ($nama == "syafi'i" || $nama == "Syafi'i" || $nama == "Muhammad Imam Syafi'i"):
			$display = implode("<br>", $anggota[7]);
     			echo "$display";
			break;
		default:
			echo "Maaf, Data Tidak Ada";
			break;
	}
}



	