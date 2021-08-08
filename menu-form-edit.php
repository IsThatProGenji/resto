<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Menu</title></head>
<body>
<center>
<h1>Edit Data Menu</h1>
<?php
if(isset($_GET["id_menu"])){
	$db=dbConnect();
	$id_menu=$db->escape_string($_GET["id_menu"]);
	if($datapegawai=getDataMenu($id_menu)){// cari data produk, kalau ada simpan di $data
		?>
<a href="menu.php"><button>Lihat Data Menu</button></a>
<form method="post" name="frm" action="menu-update.php">
<table border="1">
<tr><td>Id Menu</td>
    <td><input type="text" name="id_menu" size="11" maxlength="13"
	     value="<?php echo $datapegawai["id_menu"];?>" readonly></td></tr>
<tr><td>Nama Menu</td>
	<td><input type="text" name="nama_menu" size="30" maxlength="32"
		  value="<?php echo $datapegawai["nama_menu"];?>"></td></tr>
<tr><td>Harga</td>
    <td><input type="text" name="harga" size="10" maxlength="12"
		 value="<?php echo $datapegawai["harga"];?>" ></td></tr>
<tr><td>stok</td>
	<td><input type="text" name="stok" size="10" maxlength="12"
		 value="<?php echo $datapegawai["stok"];?>"></td></tr>		  
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblUpdate" value="Update">
	    <input type="reset"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Employee with id : $id_pegawai nothing. Edit cancelled";
?>
<?php
}
else
	echo "Employe id nothing. Edit Cancelled.";
?>
</body>
</html>