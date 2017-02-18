<?php 
namespace App\Classes;

use App\Classes\Connect;

class Librarian
{
	private $db;
	public $message;

	public function __construct()
	{
		$this->db = new Connect();
	}

	//add librarian
	public function add($librarian)
	{
		$check = $this->checkDuplicate($librarian);
		
		if ($check === false) {
			$stmt = $this->db->prepare("INSERT INTO librarian (name, username, password) VALUES (:name, :username, :password)");
			$stmt->bindparam(":name", $librarian['name']);
			$stmt->bindparam(":username", $librarian['usr']);
			$stmt->bindparam(":password", $librarian['pass']);
			$stmt->execute();

			$this->message = "Sukses Menginput Data";

			return $stmt;
		}
	}

	private function checkDuplicate($librarian)
	{
		$stmt = $this->db->prepare("SELECT username FROM librarian WHERE username = :username");
		$stmt->bindparam(":username", $librarian['usr']);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$this->message = "Username Telah Digunakan";
			return $this->message;
		} else {
			return false;
		}
	}

	//add librarian chief
	public function addChief($librarian)
	{
		$stmt = $this->db->prepare("INSERT INTO librarian (name, username, password, is_chief) VALUES (:name, :username, :password, 1)");
		$stmt->bindparam(":name", $librarian['name']);
		$stmt->bindparam(":username", $librarian['usr']);
		$stmt->bindparam(":password", $librarian['pass']);
		$stmt->execute();

		$this->message = "Sukses Menginput Data";

		return $stmt;
	}

	public function login($username, $password)
	{
		$stmt = $this->db->prepare("SELECT * FROM librarian WHERE username = :username LIMIT 1");
		$stmt->bindparam(":username", $username);
		$stmt->execute();
		$row = $stmt->fetch();

		if ($stmt->rowCount() > 0) {
			if (password_verify($password, $row['password'])) {
				$this->message = "Login Sukses";

				$stmt1 = $this->db->prepare("INSERT INTO log_librarian (librarian_id) VALUES (:id)");
				$stmt1->bindparam(":id", $row['id']);
				$stmt1->execute();

				$_SESSION['lib'] = [
					'id'		=> $row['id'],
					'name'		=> $row['name'],
					'is_chief'	=> $row['is_chief'],
					];
			} else {
				$this->message = "Password Anda Salah";
			} 
		} else {
			$this->message = "Username Anda Salah";
		}
	}

	public function logout()
	{
		$stmt = $this->db->prepare("UPDATE log_librarian SET logout_at = NOW() WHERE logout_at = '1000-01-01 00:00:01'");
		$stmt->execute();

		$this->message = "Anda Telah Logout";
		unset($_SESSION['lib']);

		return $stmt;
	}

	public function showAll()
	{
		$stmt = $this->db->prepare("SELECT name, username FROM librarian");
		$stmt->execute();

		return $stmt->fetchAll($this->db::FETCH_ASSOC);
	}

}
