<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<!DOCTYPE html>
<html><head><title>Data Pegawai</title></head>
<body>
<center>
<h1>Data Pegawai</h1>
<a href="pegawai.php">Lihat Pegawai</a> |
<a href="owner-hari.php">Pembayaran Per Hari</a> |
<a href="owner-bulan.php">Pembayaran Per Bulan</a> |
<a href="owner-tahun.php">Pembayaran Per Tahun</a> |
<a href="owner.php">Back</a> 
<hr>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT id_pegawai,jabatan,nama_pegawai,username,password,jenis_kelamin,tgl_lahir
FROM data_pegawai";
	$res=$db->query($sql);
	if($res){
		?>
		Hello, <?php echo $user_data['username']; ?>
		<br>
		<a href="pegawai-tambah.php"><button>Add</button></a>
		<table border="1" width="1000px">
		<tr><th>Id Pegawai</th><th>Jabatan</th><th>Nama Pegawai</th><th>Username</th>
		<th>Password</th><th>Jenis Kelamin</th><th>Tanggal Lahir</th><th width="110px">Action</th>
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $barisdata["id_pegawai"];?></td>
			<td><?php echo $barisdata["jabatan"];?></td>
			<td><?php echo $barisdata["nama_pegawai"];?></td>
			<td><?php echo $barisdata["username"];?></td>
			<td><?php echo $barisdata["password"];?></td>
			<td><?php echo $barisdata["jenis_kelamin"];?></td>
			<td><?php echo $barisdata["tgl_lahir"];?></td>
			
			<td><a href="pegawai-form-edit.php?id_pegawai=<?php echo $barisdata["id_pegawai"];?>"><button>Edit</button></a> | 
			<a href="pegawai-konfirmasi-hapus.php?id_pegawai=<?php echo $barisdata["id_pegawai"];?>"><button>Delete</button></a></td>
			</tr>
			<?php
		}
		?>
		</table>
		<a href="logout.php">Logout</a>
		<?php
		$res->free();
	}else
		echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
}
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
</body>
</html>
