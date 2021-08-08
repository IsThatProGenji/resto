<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Menu</title></head>
<body>
<center>
<h1>Update Data Menu</h1>
<?php
		if (isset($_POST["TblUpdate"])) { $db = dbConnect();
		if ($db->connect_errno == 0) {
	// Bersihkan data
		$id_menu = $db->escape_string($_POST["id_menu"]);
		$nama_menu = $db->escape_string($_POST["nama_menu"]);
		$harga = $db->escape_string($_POST["harga"]);
		$stok = $db->escape_string($_POST["stok"]);
	// Susun query update
		$sql = "UPDATE data_menu SET
				id_menu='$id_menu',
				nama_menu='$nama_menu',harga=$harga,stok=$stok
				WHERE id_menu='$id_menu'";
	// Eksekusi query update
		$res = $db->query($sql);
		if ($res) {
		if ($db->affected_rows > 0) { // jika ada update data
?>
Data updated successfully.<br>
	<a href="Menu.php"><button>View Employee Data</button></a>
<?php
	} else { // Jika sql sukses tapi tidak ada data yang berubah
?>
The data was successfully updated but without any data changes.<br>
	<br>
	<a href="javascript:history.back()"><button>Edit</button></a> 
	<a href="Menu.php"><button>Lihat Data Menu</button></a>
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