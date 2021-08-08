<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Pegawai</title></head>
<body>
<center>
<h1>Hapus Data Pegawai</h1>
<?php
if(isset($_GET["id_pegawai"])){
	$db=dbConnect();
	$id_pegawai=$db->escape_string($_GET["id_pegawai"]);
	if($datapegawai=getDatapegawai($id_pegawai)){// cari data produk, kalau ada simpan di $data
		?>
<a href="pegawai.php"><button>Lihat Data Pegawai</button></a>
<form method="post" name="frm" action="pegawai-hapus.php">
<input type="hidden" name="id_pegawai" value="<?php echo $datapegawai["id_pegawai"];?>">
<table border="1">
<tr><td>Id Pegawai</td><td><?php echo $datapegawai["id_pegawai"];?></td></tr>
<tr><td>Nama Pegawai</td><td><?php echo $datapegawai["nama_pegawai"];?></td></tr>
<tr><td>Username</td><td><?php echo $datapegawai["username"];?></td></tr>
<tr><td>Password</td><td><?php echo $datapegawai["password"];?></td></tr>
<tr><td>Jenis Kelamin</td><td><?php echo $datapegawai["jenis_kelamin"];?></td></tr>
<tr><td>Tanggal Lahir</td><td><?php echo $datapegawai["tgl_lahir"];?></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="TblHapus" value="Delete"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Employee with  Id : $Id_Pegawai not available. delete failed";
?>
<?php
}
else
	echo "Employee Id is not available. delete canceled.";
?>
</body>
</html>