<?php 


$title = "Daftar Buku";
$no = 1;

?>

<div class="book">
	<center>
	<?= $this->message ?>
	<table>
	<?php if (empty($this->index())) : ?>
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
		</tr>
		<?php foreach ($this->index() as $val) : ?>
			<tr>
				<td><?=$no++?></td>
				<td><?=$val['code']?></td>
				<td><img src="public/upload/<?=$val['cover_picture']?>" width="100px" height="100px"></td>
				<td><?=$val['title']?></td>
				<td><?=$val['author']?></td>
				<td><?=$val['publisher']?></td>
				<td><?=$val['name']?></td>
				<td><?=$val['synopsis']?></td>
				<td><?=$val['total_page']?></td>
				<td><?=$val['age_limit']?></td>
				<td><?=$val['stock']?></td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</table>
	</center>
</div>