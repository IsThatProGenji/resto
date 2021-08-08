<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Menu</title></head>
<body>
<center>
<h1>Tambah Data Menu</h1>
<a href="Menu.php"><button>Lihat Data Menu</button></a>
<form method="post" name="frm" action="menu-simpan.php">
<table border="1">
<tr><td>Nama Menu</td>
	<td><input type="text" name="nama_menu" size="30" maxlength="32"></td></tr>
<tr><td>Harga</td>
	<td><input type="text" name="harga" size="50" maxlength="52"></td></tr>
<tr><td>Stok</td>
    <td><input type="text" name="stok" size="10" maxlength="12"></td></tr>

<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblSimpan" value="Save"></td></tr>
</table>
</form>
</body>
</html>