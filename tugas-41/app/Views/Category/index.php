<?php 

$title = 'Daftar Category';
$no = 1;

?>

<div class="category">
	<center>
	<?= $this->message ?>
	<table>
	<?php if (empty($this->index())) : ?>
		<tr>
			<td colspan="11">Data Kategori Kosong</td>
		</tr>
	<?php else : ?>
		<tr>
			<th>No.</th>
			<th>Kategori</th>
		</tr>
		<?php foreach ($this->index() as $val) : ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $val['name'] ?></td>
		</tr>
		<?php endforeach;?>
	<?php endif; ?>
	</table>
	</center>
</div>