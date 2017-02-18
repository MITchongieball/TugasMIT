<?php 
namespace App\Classes;

class Connect extends \PDO
{
	private $dbh;
	private $hostName = "chongieball";
	private $dbName = "perpustakaan_tugas";
	private $username = "root";
	private $password = "poikoiloi@";

	public function __construct()
	{
		$this->dbh = parent::__construct("mysql:host=$this->hostName;dbname=$this->dbName", $this->username, $this->password);
		//set default fetch menjadi array
		$this->setAttribute(parent::ATTR_DEFAULT_FETCH_MODE, parent::FETCH_ASSOC);
	}
}