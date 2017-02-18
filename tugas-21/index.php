<!DOCTYPE html>
<html>
<head>
	<title>Kraken Shop-Login Page</title>
</head>
<body style="margin:0px">
	<header style="background:#000000;width:100%;margin:0px;">
		<h1 style="color:#CCCCCC;background-color:#000000;margin:0px;width:100%;float:left">Kraken Shop</h1>
	</header>
	<center>
		<form method="POST" action="index.php">
			<fieldset style="width:200px">
				<p><input type="text" name="usr" placeholder="Username"><br></p>
				<p><input type="password" name="pw" placeholder="Password"><br></p>
				<p>
					<button type="submit" name="login" value="1">Login</button>
					<button type="submit" name="daftar" value="2">Daftar</button>
				</p>
		</form>
	</center>
</body>
</html>

<?php

session_start();
//session_destroy();

if (empty($_SESSION['seller'])) {
	echo "<script>alert('Halo,Anda adalah seller pertama kami. Silahkan klik daftar');</script> ";
}
if (!empty($_POST['login'])) {
	foreach ($_SESSION['seller'] as $insell) {
		if ($insell['usrseller'] == $_POST['usr'] && $insell['pwseller'] == $_POST['pw']) {
			$_SESSION['insell'] = $insell;
		}
	}

	if (empty($_SESSION['insell'])) {
		echo "<center>Anda belum terdaftar menjadi seller kami.";
		echo "&nbsp;Ingin mendaftar? <a href= \"daftarseller.php\">Daftar</a></center>";
	} else {
		echo "<script> window.location = 'sellerpage.php'; </script> ";
	}
}

if(isset($_POST['daftar'])) {
	header("Location: daftarseller.php");
}
?>