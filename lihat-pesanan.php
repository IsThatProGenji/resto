<?php include_once("functions.php");
session_start();

	include("connection.php");
	

	$user_data = check_login($con);?>
<!DOCTYPE html>
<html><head><title>kasir</title></head>
<body>
<center>
<h1>Data Pesanan</h1>
<a href="lihat-pesanan.php">Lihat Pesanan</a> |
<a href="pembayaran.php">Pembayaran</a> |
<a href="kasir.php">Back</a>
<hr>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT a.id_pesanan , sum(harga*jumlah) as total,status_pesanan FROM detail_pesanan a, data_menu b ,data_pesanan c
where a.id_menu = b.id_menu and a.id_pesanan=c.id_pesanan and status_pesanan='Selesai'
group by a.id_pesanan;";
	$res=$db->query($sql);
	if($res){
		?>
		Hello, <?php echo $user_data['username']; ?>
		<table border="1" width="1000px">
		<tr><th>Id Pesanan</th><th>Total</th><th>Status Pesanan</th>
		<th width="110px">Action</th>
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $barisdata["id_pesanan"];?></td>
			<td><?php echo'Rp.' .$barisdata["total"];?></td>
			<td><?php echo $barisdata["status_pesanan"];?></td>
		
		
			<td>
			<a href="pesanan-cek.php?id_pesanan=<?php echo $barisdata["id_pesanan"];?>"><button>Cek</button></a> 
			
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
