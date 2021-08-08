<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<html><head><title>Data Kasir</title></head>
<body>
<center>
<h1>Kasir</h1>
<a href="lihat-pesanan.php">Lihat Pesanan</a> |
<a href="pembayaran.php">Pembayaran</a>
<hr>
Hello, <?php echo $user_data['username']; ?>
		<br>
		<br>
<a href="logout.php">Logout</a>