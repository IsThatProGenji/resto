<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Employee Data Storage</title></head>
<body>
<center>
<h1>Penyimpanan Data Pegawai</h1>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$jabatan = $db->escape_string($_POST["jabatan"]);
		$nama_pegawai = $db->escape_string($_POST["nama_pegawai"]);
		$username = $db->escape_string($_POST["username"]);
		$password = $db->escape_string($_POST["password"]);
		$jenis_kelamin = $db->escape_string($_POST["jenis_kelamin"]);
		$tgl_lahir = $db->escape_string($_POST["tgl_lahir"]);
		
		// Susun query insert
		$sql="INSERT INTO data_pegawai(jabatan, nama_pegawai, username, password, jenis_kelamin, tgl_lahir)
			  VALUES('$jabatan','$nama_pegawai','$username','$password','$jenis_kelamin','$tgl_lahir')";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				?>
				Data saved successfully.<br>
				<a href="pegawai.php"><button>Lihat Data Pegawai</button></a>
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