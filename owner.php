<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<html><head><title>Owner</title></head>
<body>
<center>
<h1>Owner</h1>
<a href="pegawai.php">Lihat Pegawai</a> |
<a href="owner-hari.php">Pembayaran Per Hari</a> |
<a href="owner-bulan.php">Pembayaran Per Bulan</a> |
<a href="owner-tahun.php">Pembayaran Per Tahun</a> |
<hr>
Hello, <?php echo $user_data['username']; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<a href="logout.php">Logout</a>