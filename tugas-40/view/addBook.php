<?php 
session_start();

use App\Classes\Book;
use App\Classes\Category;

$title = "Tambah Buku";

$book = new Book;
$category = new Category;

if (isset($_POST['input'])) {
	switch (true) {
		case (empty($_POST['title'])) :
			$book->message = "Judul Harus Di Isi";
			break;
		case (empty($_POST['author'])):
			$book->message = "Penulis Harus Di Isi";
			break;
		case (empty($_POST['total_page'])):
			$book->message = "Jumlah Halaman Harus Di Isi";
			break;
		default:
			$code = date('Ymd'). rand(100,999);

			//check photo
			$picFile = $_FILES['photo']['name'];
			$tmp_dir = $_FILES['photo']['tmp_name'];
			$upload_dir = 'public/cover_upload/';
			$picExt = strtolower(pathinfo($picFile, PATHINFO_EXTENSION));

			$validPhoto = ['jpeg', 'jpg', 'png', 'gif']; //check ext photo

			$coverPic = $code.".".$picExt; //rename photo

			//check valid ext photo
			if (in_array($picExt, $validPhoto)) {
				move_uploaded_file($tmp_dir, $upload_dir.$coverPic);
			} else {
				$book->message = "Ekstensi Foto Anda Tidak Bisa di Upload";
			}

			$bookInput = [
				'category'		=> $_POST['category'],
				'code'			=> $code,
				'cover_picture'	=> $coverPic,
				'title'			=> htmlspecialchars(ucwords($_POST['title'])),
				'author'		=> htmlspecialchars(ucwords($_POST['author'])),
				'publisher'		=> htmlspecialchars(ucwords($_POST['publisher'])),
				'synopsis'		=> htmlspecialchars(ucwords($_POST['synopsis'])),
				'total_page'	=> $_POST['total_page'],
				'age_limit'		=> $_POST['age_limit'],
				'stock'			=> $_POST['stock'],
				];

			 $book->add($bookInput);
			 header("location: index.php?book");

			break;
	}
}

?>
<div class="add_book">
	<center>
		<?=$book->message?>
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="text" name="title" placeholder="Judul Buku"><br/>
			<input type="file" class="file" name="photo"><br/>
			<input type="text" name="author" placeholder="Penulis"><br/>
			<input type="text" name="publisher" placeholder="Penerbit"><br/>
			<select name="category">
				<option value="0"> Kategori </option>
				<?php foreach ($category->showAll() as $val) :?>
					<option value="<?=$val['id']?>"><?=$val['name']?></option>
				<?php endforeach; ?>
			</select><br/>
			<textarea name="synopsis"  cols="30" rows="10" placeholder="Sinopsis"></textarea>
			<input type="number" name="total_page" min="1" placeholder="Total Halaman"><br/>
			<input type="number" name="age_limit" min="0" placeholder="Batas Umur"><br/>
			<input type="number" name="stock" min="1" placeholder="Stok"><br/>
			<button name="input">Tambah Buku</button>
		</form>
	</center>
</div>