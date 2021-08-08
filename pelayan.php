<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<html><head><title>Pelayan</title></head>
<body>
<center>
<h1>Pelayan</h1>

<a href="pesanan-tambah.php">Tambah Pesanan</a>
<a href="menu.php">Menu</a>
<hr>
Hello, <?php echo $user_data['username']; ?>
<br>



<br>
<a href="logout.php">Logout</a>
