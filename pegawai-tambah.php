<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Pegawai</title></head>
<body>
<center>
<h1>Tambah Data Pegawai</h1>
<a href="pegawai.php"><button>Lihat Data Pegawai</button></a>
<form method="post" name="frm" action="pegawai-simpan.php">
<table border="1">
<tr><td>Jabatan</td>
	<td><input type="text" name="jabatan" size="30" maxlength="32"></td></tr>
<tr><td>Nama Pegawai</td>
	<td><input type="text" name="nama_pegawai" size="50" maxlength="52"></td></tr>
<tr><td>Username</td>
    <td><input type="text" name="username" size="10" maxlength="12"></td></tr>
<tr><td>Password</td>
	<td><input type="text" name="password" size="10" maxlength="12"></td></tr>	
<tr><td>Jenis Kelamin</td>
	<td><input type="text" name="jenis_kelamin" size="20" maxlength="22"></td></tr>
<tr><td>Tanggal Lahir</td>
	<td><input type="date" name="tgl_lahir" size="13" maxlength="13"></td></tr>
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblSimpan" value="Save"></td></tr>
</table>
</form>
</body>
</html>