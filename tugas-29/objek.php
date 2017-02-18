<?php 
/*Objek dalam tugas 29 */

//matematika dasar
class Matematika
{
	//property
	public $angka1;
	public $angka2;

	//set angka 
	function setAngka($angka1, $angka2)
	{
		$this->angka1 = $angka1;
		$this->angka2 = $angka2;
	}

	//penambahan
	function tambah()
	{
		echo $this->angka1." ditambah ".$this->angka2." sama dengan ";
		echo $this->angka1 + $this->angka2;
	}

	//pengurangan
	function kurang()
	{
		echo $this->angka1." dikurang ".$this->angka2." sama dengan ";
		echo $this->angka1 - $this->angka2;
	}

	//perkalian
	function kali()
	{
		echo $this->angka1." dikali ".$this->angka2." sama dengan ";
		echo $this->angka1 * $this->angka2;
	}

	//pembagian
	function bagi()
	{
		echo $this->angka1." dibagi ".$this->angka2." sama dengan ";
		echo $this->angka1 / $this->angka2;
	}
}

//jenis jenis hewan
class Hewan
{
	private $makanan;
	private $berkembangBiak;

	//menentukan jenis hewan berdasarkan makanannya
	function jenisHewanByMakanan($makanan)
	{
		$this->makanan = $makanan;
		switch ($this->makanan) {
			case ($makanan == 'tumbuhan'):
				echo $_POST['hewan']. " adalah hewan Herbivora";
				break;
			case ($makanan == 'daging'):
				echo $_POST['hewan']. " adalah hewan Karnivora";
				break;
			default:
				echo $_POST['hewan']. " adalah hewan Omnivora";		
				break;
		}
	}

	//menentukan jenis hewan berdasarkan berkembang biak
	function jenisHewanByKembangBiak($biak)
	{
		$this->berkembangBiak = $biak;
		switch ($this->berkembangBiak) {
			case ($biak == 'melahirkan'):
				echo $_POST['hewan']. " adalah hewan Vivipar";
				break;
			case ($biak == 'bertelur'):
				echo $_POST['hewan']. " adalah hewan Ovipar";
				break;
			default:
				echo $_POST['hewan']. " adalah hewan Ovovivipar";
				break;
		}
	}
}

//mahasiswa
class Mahasiswa
{
	public $nim;
	public $namaMahasiswa;
	private $email;
	public $fakultas;
	public $prodi;

	//set
	public function __construct($nim, $nama, $fakultas, $prodi)
	{
		$this->nim = $nim;
		$this->namaMahasiswa = $nama;
		$this->fakultas = $fakultas;
		$this->prodi = $prodi;
	}

	//register mahasiswa
	function regisMahasiswa($email)
	{
		$this->email = $email;
		$data = [
			'nim'		=> $this->nim,
			'nama'		=> $this->namaMahasiswa,
			'email'		=> $email,
			'fakultas'	=> $this->fakultas,
			'prodi'		=> $this->prodi,
			];
		$_SESSION['mahasiswa'][] = $data;
	}
}

//dosen
class Dosen
{
	private $idDosen;
	public $namaDosen = "Neli Hartati";
	public $matkul = "Matematika";
	public $nilai;

	//set nama dan matkul
	public function detDosen()
	{
		$this->namaDosen;
		$this->matkul;
	}
	//input nilai
	public function inputNilai($nilai)
	{
		$this->nilai = $nilai;
		$mahasiswa = array_column($_SESSION['mahasiswa'], 'nama');
			$daftarNilai = [
			'nama'	=> $mahasiswa,
			'nilai'	=> $nilai,
			];
		return $daftarNilai;
	}
}

//surat
class Surat
{
	private $pengirim;
	private $penerima;
	private $subjek;
	private $isi;

	//set
	public function __construct($pengirim)
	{
		$this->pengirim = $pengirim;
	}

	//tambah penerima
	public function tambahPenerima($penerima)
	{
		$this->penerima = array();
		array_push($this->penerima, $penerima);
	}

	public function setSubjek($subjek)
	{
		$this->subjek = $subjek;
	}

	public function setIsi($isi)
	{
		$this->isi = $isi;
	}

	public function kirimSurat()
	{
		foreach ($this->penerima as $value) {
			echo "Kepada: $value <br/>";
			echo "Subjek: {$this->subjek} <br/>";
			echo $this->isi."<br/>";
			echo "Dari: {$this->pengirim} <br/>";
		}
	}
}

//toko
class Toko
{
	public $namaToko;
	protected $namaBarang;
	protected $hargaBarang;
	protected $stock;
	protected $typeBarang;

	public function __construct($namaToko)
	{
		$this->namaToko = $namaToko;
		echo "Selamat datang di $namaToko Shop";
	}

	public function inventory($namaBarang, $typeBarang, $hargaBarang, $stock)
	{
		$this->namaBarang = $namaBarang;
		$this->typeBarang = $typeBarang;
		$this->hargaBarang = $hargaBarang;
		$this->stock = $stock;
		$invent = array();
		$invent = [
			'nama'	=> $namaBarang,
			'type'	=> $typeBarang,
			'harga'	=> $hargaBarang,
			'stock'	=> $stock,
			];
		$_SESSION['inven'][] = $invent;
	}
}

//turunan class Toko
class TokoCabang1 extends Toko
{
	public function gitar($typeBarang)
	{
		foreach ($_SESSION['inven'] as $barang) {
			if ($barang['type'] == $typeBarang) {
				$gitar = $barang;
			} else {
				echo "error";
			}
		}
	}
}
