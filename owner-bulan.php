<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<!DOCTYPE html>
<html><head><title>Data Pelayan</title></head>
<body>
<center>
<h1>Data Pelayan</h1>
<a href="pegawai.php">Lihat Pegawai</a> |
<a href="owner-hari.php">Pembayaran Per Hari</a> |
<a href="owner-bulan.php">Pembayaran Per Bulan</a> |
<a href="owner-tahun.php">Pembayaran Per Tahun</a> |
<a href="owner.php">Back</a>
<hr>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT month(tgl_pembayaran) as bulan,sum(total) as total FROM resto.data_pembayaran
group by bulan";
	$res=$db->query($sql);
	if($res){
		?>
		Hello, <?php echo $user_data['username']; ?>
		<br>
		
		<table border="1" width="1000px">
		<th>Bulan</th>
		<th>Total</th>
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
		
			<td><?php echo $barisdata["bulan"];?></td>
			<td><?php echo 'Rp. '. $barisdata["total"];?></td>
		
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
