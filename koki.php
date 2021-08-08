<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<html><head><title>koki</title></head>
<body>
<center>
<h1>Koki</h1>
<a href="pesanan-koki.php">Pesanan</a>
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