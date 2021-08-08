<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Pegawai</title></head>
<body>
<center>
<h1>Update Data Pegawai</h1>
<?php
		if (isset($_POST["TblUpdate"])) { $db = dbConnect();
		if ($db->connect_errno == 0) {
	// Bersihkan data
		$id_pegawai = $db->escape_string($_POST["id_pegawai"]);
		$nama_pegawai = $db->escape_string($_POST["nama_pegawai"]);
		$username = $db->escape_string($_POST["username"]);
		$password = $db->escape_string($_POST["password"]);
		$jenis_kelamin = $db->escape_string($_POST["jenis_kelamin"]);
		$tgl_lahir = $db->escape_string($_POST["tgl_lahir"]);
		$jabatan = $db->escape_string($_POST["jabatan"]);
	// Susun query update
		$sql = "UPDATE data_pegawai SET
				id_pegawai='$id_pegawai',
				nama_pegawai='$nama_pegawai',username='$username',password='$password',jenis_kelamin='$jenis_kelamin',jabatan='$jabatan'
				WHERE id_pegawai='$id_pegawai'";
	// Eksekusi query update
		$res = $db->query($sql);
		if ($res) {
		if ($db->affected_rows > 0) { // jika ada update data
?>
Data updated successfully.<br>
	<a href="pegawai.php"><button>View Employee Data</button></a>
<?php
	} else { // Jika sql sukses tapi tidak ada data yang berubah
?>
The data was successfully updated but without any data changes.<br>
	<br>
	<a href="javascript:history.back()"><button>Edit</button></a> 
	<a href="pegawai.php"><button>Lihat Data Pegawai</button></a>
<?php
} } else { // gagal query
?>
Data failed to update.
<br>
	<a href="javascript:history.back()"><button>Edit</button></a>
<?php
} } else
	echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>"; }
?>
</body>
</html>