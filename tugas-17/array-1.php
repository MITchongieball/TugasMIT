Input Nilai :
<form method="POST">
	<input type="text" name="nama" placeholder="Nama" /><br>
	<input type="text" name="id" placeholder="ID"/><br>
	<input type="text" name="nilai" placeholder="Nilai"><br>
	<button type="submit" name="cek">Input</button><br>
</form>
<?php
//  $nama = $_POST['nama'];
// $id = $_POST['id'];
// $nilai = $_POST['nilai'];

if (isset($_POST['cek'])):
	$input = [
		"nama" => $_POST['nama'],
		"id" => $_POST['id'],
		"nilai" => $_POST['nilai']
		];

?>
	<table>
		<tr>
			<th>Nama</th>
			<th>ID</th>
			<th>Nilai</th>
			<th>Keterangan</th>
		</tr>
		<tr>
			<td><?= $input['nama']; ?></td>
			<td><?= $input['id']; ?></td>
			<td><?= $input['nilai']?></td>
			<td><?php 
				    if ($input['nilai'] >= 80) {
						$o = "Lulus";
						echo $o;
					} else {
						$x = "Tidak Lulus";
						echo $x;
					}
	endif;	
				?></td>
	</table>