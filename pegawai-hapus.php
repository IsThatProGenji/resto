<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Pegawai</title></head>
<body>
<center>
<h1>Hapus Data Pegawai</h1>
<?php
if(isset($_POST["TblHapus"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		$id_pegawai  =$db->escape_string($_POST["id_pegawai"]);
		// Susun query delete
		$sql="DELETE FROM data_pegawai WHERE id_pegawai='$id_pegawai'";
		// Eksekusi query delete
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0) // jika ada data terhapus
				echo "Data deleted successfully.<br>";
			else // Jika sql sukses tapi tidak ada data yang dihapus
				echo "Deletion failed because the deleted data does not exist.<br>";
		}
		else{ // gagal query
			echo "Data failed to delete. <br>";
		}
		?>
		<a href="pegawai.php"><button>Lihat Data Pegawai</button></a>
		<?php
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>