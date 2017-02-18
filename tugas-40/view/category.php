<?php 

use App\Classes\Category;

$category = new Category;

$no = 1;

if (isset($_POST['add'])) {
	if (empty($_POST['name'])) {
		$category->message = "Category Harus Di Isi";
	} else {
		$category->add(ucwords($_POST['name']));
	}
}

if (isset($_GET['edit'])) {
	$edit = $category->showById($_GET['edit']);
}

if (isset($_GET['delete'])) {
	$category->delete($_GET['delete']);
	header("location: ?category");
}

if (isset($_POST['edit'])) {
	if (!isset($_GET['delete'])) {
		$category->message = "Pilih Kategori yang Akan Di Edit";
	} else {
		$category->edit($_POST['id'], ucwords($_POST['name']));
		header("location: ?category");
	}
}

?>

<div class="category">
	<center>
	<?= $category->message ?>
	<form action="" method="POST">
		<input type="text" name="name" placeholder="Nama Kategori">
		<button name="add" id="add">Tambah</button>
	</form>
	<form action="" method="POST"> 
		<input type="hidden" name="id" value="<?=$edit['id']?>">
		<input type="text" name="name"  placeholder="<?=$edit['name']?>">
		<button name="edit">Edit</button></td>
	</form>
	<table>
		<tr>
			<th>No.</th>
			<th>Kategori</th>
			<th>Action</th>
		</tr>
		<?php foreach ($category->showAll() as $val) : ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $val['name'] ?></td>
			<td>
				<a href="?category&edit=<?=$val['id']?>">
					<!-- <img src="" title="Edit"> -->
					Edit
				</a>
				<a href="?category&delete=<?=$val['id']?>">
					<!-- <img src="" title="Hapus"> -->
					Hapus
				</a>
			</td>
		</tr>
	<?php endforeach;?>
	</table>
	</center>
</div>