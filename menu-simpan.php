<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Employee Data Storage</title></head>
<body>
<center>
<h1>Penyimpanan Data Menu</h1>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$nama_menu = $db->escape_string($_POST["nama_menu"]);
		$harga = $db->escape_string($_POST["harga"]);
		$stok = $db->escape_string($_POST["stok"]);
	
		
		// Susun query insert
		$sql="INSERT INTO data_menu(nama_menu, harga, stok)
			  VALUES('$nama_menu',$harga,$stok)";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				?>
				Data saved successfully.<br>
				<a href="menu.php"><button>Lihat Data Menu</button></a>
				<?php
			}
		}
		else{
			?>
			The data failed to save because the Employee Id may already exist.<br>
			<a href="javascript:history.back()"><button>Back</button></a>
			<?php
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>