<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Data Pegawai</title></head>
<body>
<center>
<h1>Edit Data Pegawai</h1>
<?php
if(isset($_GET["id_pegawai"])){
	$db=dbConnect();
	$id_pegawai=$db->escape_string($_GET["id_pegawai"]);
	if($datapegawai=getDatapegawai($id_pegawai)){// cari data produk, kalau ada simpan di $data
		?>
<a href="pegawai.php"><button>Lihat Data Pegawai</button></a>
<form method="post" name="frm" action="pegawai-update.php">
<table border="1">
<tr><td>Id Pegawai</td>
    <td><input type="text" name="id_pegawai" size="11" maxlength="13"
	     value="<?php echo $datapegawai["id_pegawai"];?>" readonly></td></tr>
<tr><td>Nama Pegawai</td>
	<td><input type="text" name="nama_pegawai" size="30" maxlength="32"
		  value="<?php echo $datapegawai["nama_pegawai"];?>"></td></tr>
		 <tr><td><label for="Jabatan">Jabatan</label></td>
		<td>
		<select name="jabatan" 	>
			<option ><?php echo $datapegawai["jabatan"];?></option>
		<?php
			$datanamabarang=getlistpegawai();
			foreach($datanamabarang as $data){
				echo "<option value=\"".$data["jabatan"]."\"";
				if($data["jabatan"]==$datanamabarang)
					echo " selected"; // default sesuai kategori sebelumnya
				echo ">".$data["jabatan"]."</option>";

			}
		?>
	
		</select>
	</td></tr>
    </td>
</tr>
<tr><td>Username</td>
    <td><input type="text" name="username" size="10" maxlength="12"
		 value="<?php echo $datapegawai["username"];?>" ></td></tr>
<tr><td>Password</td>
	<td><input type="text" name="password" size="10" maxlength="12"
		 value="<?php echo $datapegawai["password"];?>"></td></tr>		 
<tr><td>Jenis Kelamin</td>
	<td><input type="text" name="jenis_kelamin" size="10" maxlength="12"
		 value="<?php echo $datapegawai["jenis_kelamin"];?>"></td></tr>	
<tr><td>Tanggal Lahir</td>
	<td><input type="date" name="tgl_lahir" size="10" maxlength="12"
		 value="<?php echo $datapegawai["tgl_lahir"];?>"></td></tr>			 
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