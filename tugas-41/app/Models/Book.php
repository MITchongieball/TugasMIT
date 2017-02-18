<?php 
namespace App\Models;

class Book extends BaseModel
{
	public function add($book)
	{
		$stmt = $this->db->prepare("INSERT INTO book (category_id, librarian_id, code, cover_picture, title, author, publisher, synopsis, total_page, age_limit, stock) VALUES (:category_id, :librarian_id, :code, :cover_picture, :title, :author, :publisher, :synopsis, :total_page, :age_limit, :stock)");
		$stmt->bindparam(":category_id", $book['category']);
		$stmt->bindparam(":librarian_id", rand(1, 3));
		$stmt->bindparam(":code", $book['code']);
		$stmt->bindparam(":cover_picture", $book['cover_picture']);
		$stmt->bindparam(":title", $book['title']);
		$stmt->bindparam(":author", $book['author']);
		$stmt->bindparam(":publisher", $book['publisher']);
		$stmt->bindparam(":synopsis", $book['synopsis']);
		$stmt->bindparam(":total_page", $book['total_page']);
		$stmt->bindparam(":age_limit", $book['age_limit']);
		$stmt->bindparam(":stock", $book['stock']);
		$stmt->execute();

		$this->message = "Sukses Menambahkan Buku";

		return $stmt;
	}

	public function showAll()
	{
		$stmt = $this->db->prepare("SELECT book.id, book.code, book.cover_picture, book.title, book.author, book.publisher, category.name, book.synopsis, book.total_page, book.age_limit, book.stock FROM book LEFT JOIN category ON book.category_id = category.id WHERE book.is_delete = 0");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function showById($id)
	{
		$stmt = $this->db->prepare("SELECT id, code, cover_picture, title, author, publisher, synopsis, total_page, age_limit, stock FROM book WHERE id = :id");
		$stmt->bindparam(":id", $id);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function edit($book)
	{
		$stmt = $this->db->prepare("UPDATE book SET category_id = COALESCE(:category_id, category_id), librarian_id = :librarian_id, cover_picture = COALESCE(:cover_picture, cover_picture), title = :title, author = :author, publisher = :publisher, synopsis = :synopsis, total_page = :total_page, age_limit = :age_limit, stock = :stock, update_at = NOW() WHERE id = :id");
		$stmt->bindparam(":id", $book['id']);
		$stmt->bindparam(":category_id", $book['category']);
		$stmt->bindparam(":librarian_id", $_SESSION['lib']['id']);
		$stmt->bindparam(":cover_picture", $book['cover_picture']);
		$stmt->bindparam(":title", $book['title']);
		$stmt->bindparam(":author", $book['author']);
		$stmt->bindparam(":publisher", $book['publisher']);
		$stmt->bindparam(":synopsis", $book['synopsis']);
		$stmt->bindparam(":total_page", $book['total_page']);
		$stmt->bindparam(":age_limit", $book['age_limit']);
		$stmt->bindparam(":stock", $book['stock']);
		$stmt->execute();

		$this->message = "Buku Telah Diedit";

		return $stmt;
	}
	
	public function delete($id)
	{
		$stmt = $this->db->prepare("UPDATE book SET is_delete = 1 WHERE id = :id");
		$stmt->bindparam(":id", $id);
		$stmt->execute();

		$this->message = "Buku Telah Di Hapus";

		return $stmt; 
	}
}