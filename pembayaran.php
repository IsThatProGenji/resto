<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<!DOCTYPE html>
<html><head><title>Data Pembayaran</title></head>
<body>
<center>
<h1>Pembayaran</h1>

<a href="lihat-pesanan.php">Lihat Pesanan</a> |
<a href="pembayaran.php">Pembayaran</a> |
<a href="kasir.php">Back</a>
<hr>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT id_pembayaran,total,metode_pembayaran,tgl_pembayaran,id_pesanan
FROM data_pembayaran";
	$res=$db->query($sql);
	if($res){
		?>
		Hello, <?php echo $user_data['username']; ?>
		<br>
		<a href="pembayaran-tambah.php"><button>Add</button></a>
		<table border="1" width="1000px">
		<tr><th>Id Pembayaran</th><th>Total </th><th>Metode Pembayaran</th><th>Tanggal Pembayaran</th><th>Id Pesanan</th>
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $barisdata["id_pembayaran"];?></td>
			<td><?php echo $barisdata["total"];?></td>
			<td><?php echo $barisdata["metode_pembayaran"];?></td>
			<td><?php echo $barisdata["tgl_pembayaran"];?></td>
			<td><?php echo $barisdata["id_pesanan"];?></td>
			
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
