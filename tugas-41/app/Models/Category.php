<?php 

namespace App\Models;

class Category extends BaseModel
{
	public function add($category)
	{
		$check = $this->checkDuplicate($category);

		if ($check === false) {
			$stmt = $this->db->prepare("INSERT INTO category (name) VALUES (:name)");
			$stmt->bindparam(":name", $category);
			$stmt->execute();

			$this->message = "Kategori Berhasil Ditambahkan";

			return $stmt;
		}
	}

	private function checkDuplicate($category)
	{
		$stmt = $this->db->prepare("SELECT name FROM category WHERE name = :name");
		$stmt->bindparam(":name", $category);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$this->message = "Kategori Sudah Ada";
			return true;
		} else {
			return false;
		}
	}

	public function getCategoryId($categoryName)
	{
		$stmt = $this->db->prepare("SELECT id FROM category WHERE name = :name");
		$stmt->bindparam(":name", $categoryName);
		$stmt->execute();
		$row = $stmt->fetch();

		return $row['id'];
	}

	public function showAll()
	{
		$stmt = $this->db->prepare("SELECT id, name FROM category WHERE is_delete = 0");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function showById($id)
	{
		$stmt = $this->db->prepare("SELECT id, name FROM category WHERE id = :id");
		$stmt->bindparam(":id", $id);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function edit($id, $name)
	{
		$stmt = $this->db->prepare("UPDATE category SET name = :name WHERE id = :id");
		$stmt->bindparam(":name", $name);
		$stmt->bindparam(":id", $id);
		$stmt->execute();

		$this->message = "Kategori Telah Di Edit";

		return $stmt;
	}

	public function delete($id)
	{
		$stmt = $this->db->prepare("UPDATE category SET is_delete = 1 WHERE id = :id");
		$stmt->bindparam(":id", $id);
		$stmt->execute();

		$this->message = "Kategori Telah Di Hapus";

		return $stmt;
	}


}