<body background="kraken.jpg" style="background-position:center;margin:0px;color:#7B8D8E">
<header style="background:black;opacity:10">
	<h1>KRAKEN &trade; <h1>
</header>
<p style="color:#7B8D8E">Daftar Menjadi Anggota Kami</p>
<form method="POST" action="" style="margin-left:50px">
	<fieldset style="width:150px;">
	<input type="text" name="nama" placeholder="Nama" required/><br>
	<input type="password" name="pw" placeholder="Password" maxlength="13" required/><br>
	<input type="email" name="email" placeholder="E-mail"required/><br>
	<input type="text" name="tel" placeholder="Nomor Telepon"/><br>
	<button type="submit" name="daftar">Daftar</button>
	<input type="reset"></input>
	</fieldset>
</form>

<?php 

if (isset($_POST['daftar'])):
	echo "Hai,".$_POST['nama'].".Anda Telah Menjadi Anggota Kami".".&nbsp;Berikut merupakan data anda";
?>

<table style="margin:0px;border:1px solid white;">
	<tr style="background:#44B3C2;color:white">
		<th>Nama</th>
		<th>E-mail</th>
		<th>Nomor Telepon</th>
	</tr>
	<tr style="background:#7B8D8E;color:white">
		<td><?= $_POST['nama']  ?></td>
		<td><?= $_POST['email']  ?></td>
		<td><?= $_POST['tel'] ?></td>
	</tr>
</table>
</body>
<?php endif; ?>