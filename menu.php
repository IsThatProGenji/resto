<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<!DOCTYPE html>
<html><head><title>Data Menu </title></head>
<body>
<center>
<h1>Data Menu </h1>

<hr>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="Select *
FROM data_menu";
	$res=$db->query($sql);
	if($res){
		?>
		Hello, <?php echo $user_data['username']; ?>
		<br>
		<a href="menu-tambah.php"><button>Add</button></a>
		<table border="1" width="1000px">
		<tr><th>Id Menu</th><th>Nama Menu</th><th>Harga</th><th>Stok</th>
		<th width="110px">Action</th>
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $barisdata["id_menu"];?></td>
			<td><?php echo $barisdata["nama_menu"];?></td>
			<td><?php echo $barisdata["harga"];?></td>
			<td><?php echo $barisdata["stok"];?></td>
			
			<td><a href="menu-form-edit.php?id_menu=<?php echo $barisdata["id_menu"];?>"><button>Edit</button></a> | 
			<a href="menu-konfimasi-hapus.php?id_menu=<?php echo $barisdata["id_menu"];?>"><button>Delete</button></a></td>
			</tr>
			<?php
		}
		?>
		</table>
		<a href="logout.php">Logout</a>
		<?php
		$res->free();
	}else
		echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
}
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
</body>
</html>
