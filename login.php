<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">

		
		<form method="post">
			<p>Jabatan :</p>
	<input type="radio" name="jabatan"
	<?php if (isset($jabatan) && $jabatan=="pelayan") echo "checked";?>
	value="pelayan">Pelayan
	<input type="radio" name="jabatan"
	<?php if (isset($jabatan) && $jabatan=="kasir") echo "checked";?>
	value="kasir">Kasir
	<input type="radio" name="jabatan"
	<?php if (isset($jabatan) && $jabatan=="koki") echo "checked";?>
	value="koki">Koki
	<input type="radio" name="jabatan"
	<?php if (isset($jabatan) && $jabatan=="owner") echo "checked";?>
	value="owner">Owner
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="username"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

		</form>
	</div>
</body>
</html>
<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];
		$jabatan = $_POST['jabatan'];
		$owner= 'owner';
		$pelayan= 'pelayan';
		$koki= 'koki';
		$kasir= 'kasir';
		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "select * from data_pegawai where username = '$username' limit 1";
			$result = mysqli_query($con, $query);
			

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					 
					if(($user_data['password'] === $password)&&($jabatan  === $owner))
					{

						$_SESSION['id_pegawai'] = $user_data['id_pegawai'];
						header("Location: owner.php");
						die;
					}
					if(($user_data['password'] === $password)&&($jabatan === $pelayan))
					{

						$_SESSION['id_pegawai'] = $user_data['id_pegawai'];
						header("Location: pelayan.php");
						die;
					}
					if(($user_data['password'] === $password)&&($jabatan === $koki))
					{

						$_SESSION['id_pegawai'] = $user_data['id_pegawai'];
						header("Location: pesanan-koki.php");
						die;
					}
					if(($user_data['password'] === $password)&&($jabatan === $kasir))
					{

						$_SESSION['id_pegawai'] = $user_data['id_pegawai'];
						header("Location: kasir.php");
						die;
					}
						 
				}
			}
			
			echo "<p align=center>(Salah username dan password untuk  $jabatan)</p>";
		}else
		{
			echo "<p align=center>(Salah username dan password untuk  $jabatan)</p>";
		}
	}

?>


