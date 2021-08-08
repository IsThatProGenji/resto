<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Menu</title></head>
<body>
<center>
<h1>Hapus Data Menu</h1>
<?php
if(isset($_GET["id_menu"])){
	$db=dbConnect();
	$id_menu=$db->escape_string($_GET["id_menu"]);
	if($datapegawai=getDataMenu($id_menu)){// cari data produk, kalau ada simpan di $data
		?>
<a href="Menu.php"><button>Lihat Data Menu</button></a>
<form method="post" name="frm" action="menu-hapus.php">
<input type="hidden" name="id_menu" value="<?php echo $datapegawai["id_menu"];?>">
<table border="1">
<tr><td>Id Menu</td><td><?php echo $datapegawai["id_menu"];?></td></tr>
<tr><td>Nama Menu</td><td><?php echo $datapegawai["nama_menu"];?></td></tr>
<tr><td>Harga</td><td><?php echo $datapegawai["harga"];?></td></tr>
<tr><td>Stok</td><td><?php echo $datapegawai["stok"];?></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="TblHapus" value="Delete"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Employee with  Id : $Id_Menu not available. delete failed";
?>
<?php
}
else
	echo "Employee Id is not available. delete canceled.";
?>
</body>
</html>