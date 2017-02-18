<?php 

if (isset($_POST['add'])) {
	switch (true) {
		case (empty($_POST['name'])):
			$librarian->message = "Nama Harus Di Isi";
			break;
		case (empty($_POST['usr'])):
			$librarian->message = "Username Harus Di Isi";
			break;
		case (empty($_POST['pass'])):
			$librarian->message = "Password Harus Di Isi";
			break;
		case ($_POST['pass'] !== $_POST['confPass']):
			$librarian->message = "Password dan Konfirmasi Password Tidak Sama";
			break;
		default:
			$data = [
				'name'	=> htmlspecialchars(ucwords($_POST['name'])),
				'usr'	=> htmlspecialchars(strtolower($_POST['usr'])),
				'pass'	=> password_hash($_POST['pass'], PASSWORD_BCRYPT),
				];
			$librarian->add($data);
			break;
	}
}

?>
<section class="librarian">
	<div class="form_add">
		<?= $librarian->message ?>
		<form action="" method="POST">
			<input type="text" name="name" placeholder="Nama"><br/>
			<input type="username" name="usr" placeholder="Username"><br/>
			<input type="password" name="pass" placeholder="Password"><br/>
			<input type="password" name="confPass" placeholder="Konfirmasi Password"><br/>
			<center><button name="add">Tambah</button></center>
		</form>
	</div>
	<div class="data">
		<table>
			<tr>
				<th>Nama</th>
				<th>Username</th>
			</tr>
			<?php foreach ($librarian->showAll() as $val) : ?>
				<tr>
					<td><?=$val['name']?></td>
					<td><?=$val['username']?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</section>