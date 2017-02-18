<?php 

use App\Classes\Book;

$book = new Book;
$bookData = $book->showAll();
$no = 1;

if ($_GET['delete']) {
	$book->delete($_GET['delete']);
	header("location: index.php?book");

}

?>

<div class="book">
	<center>
	<?= $book->message ?>
	<a href="index.php?addbook">
		<button>Tambah Buku</button>
	</a>
	<table>
	<?php if (empty($bookData)) : ?>
		<tr>
			<td colspan="11">Data Buku Kosong</td>
		</tr>
	<?php else: ?>
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Cover</th>
			<th>Judul</th>
			<th>Penulis</th>
			<th>Penerbit</th>
			<th>Kategori</th>
			<th>Sinopsis</th>
			<th>Jumlah Halaman</th>
			<th>Batas Umur</th>
			<th>Stok</th>
			<th>Action</th>
		</tr>
		<?php foreach ($bookData as $val) : ?>
			<tr>
				<td><?=$no++?></td>
				<td><?=$val['code']?></td>
				<td><img src="public/cover_upload/<?=$val['cover_picture']?>" width="100px" height="100px"></td>
				<td><?=$val['title']?></td>
				<td><?=$val['author']?></td>
				<td><?=$val['publisher']?></td>
				<td><?=$val['name']?></td>
				<td><?=$val['synopsis']?></td>
				<td><?=$val['total_page']?></td>
				<td><?=$val['age_limit']?></td>
				<td><?=$val['stock']?></td>
				<td>
					<a href="?editbook=<?=$val['id']?>">Edit</a>
					<a href="?book&delete=<?=$val['id']?>">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</table>
	</center>
</div>