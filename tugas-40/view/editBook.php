<?php 

use App\Classes\Book;
use App\Classes\Category;

$book = new Book;
$category = new Category;

if (isset($_GET['editbook'])) {
	$edit = $book->showById($_GET['editbook']);
}

if (isset($_POST['edit'])) {
	if ($_FILES['editphoto']['name'] !== "") {
		//check photo
		$picFile = $_FILES['editphoto']['name'];
		$tmp_dir = $_FILES['editphoto']['tmp_name'];
		$upload_dir = 'public/cover_upload/';
		$picExt = strtolower(pathinfo($picFile, PATHINFO_EXTENSION));

		$validPhoto = ['jpeg', 'jpg', 'png', 'gif']; //check ext photo

		$coverPic = $edit['code'].".". $picExt; //rename photo
		//check valid ext photo
		if (in_array($picExt, $validPhoto)) {
			// unlink($upload_dir.$edit['cover_picture']);
			// move_uploaded_file($tmp_dir, $upload_dir.$coverPic);
		} else {
			$book->message = "Ekstensi Foto Anda Tidak Bisa di Upload";
		}
	}

	if ($_POST['category'] == 0) {
		$_POST['category'] = NULL;
	}

	$bookEdit = [
		'id'		=> $_POST['id'],
		'category'	=> $_POST['category'],
		'code'		=> $_POST['code'],
		'photo'		=> $coverPic,
		'title'		=> $_POST['title'],
		'author'	=> $_POST['author'],
		'publisher'	=> $_POST['publisher'],
		'synopsis'	=> $_POST['synopsis'],
		'total_page'=> $_POST['total_page'],
		'age_limit'	=> $_POST['age_limit'],
		'stock'		=> $_POST['stock'],
		];

	// $book->edit($bookEdit);
	// header("location: index.php?book");
}

?>

<div class="edit_book">
	<center>
		<?= var_dump($_FILES['editphoto'])?>
		<?= var_dump($bookEdit); ?>
		<?=$book->message ?>
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$edit['id']?>">
			<input type="hidden" name="code" value="<?=$edit['code']?>">
			<input type="file" name="editphoto"><br/>
			<input type="text" name="title" value="<?=$edit['title']?>" placeholder="Judul"><br/>
			<input type="text" name="author" value="<?=$edit['author']?>" placeholder="Penulis"><br/>
			<input type="text" name="publisher" value="<?=$edit['publisher']?>" placeholder="Penerbit"><br/>
			<select name="category" style="width: 200px">
				<option value="">Kategori</option>
				<?php foreach ($category->showAll() as $val) : ?>
					<option value="<?=$val['id']?>"><?=$val['name']?></option>
				<?php endforeach; ?>
			</select><br/>
			<textarea name="synopsis" cols="30" rows="10"><?=$edit['synopsis']?></textarea><br/>
			<input type="text" name="total_page" value="<?=$edit['total_page']?>"><br/>
			<input type="text" name="age_limit" value="<?=$edit['age_limit']?>"><br/>
			<input type="text" name="stock" value="<?=$edit['stock']?>"><br/>
			<button name="edit">Edit</button>
		</form>
	</center>