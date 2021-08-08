<?php

function dbConnect(){
	$db=new mysqli("localhost","root","","resto");// Sesuaikan dengan konfigurasi server anda.
	return $db;
}
function check_login($con)
{

	if(isset($_SESSION['id_pegawai']))
	{

		$id = $_SESSION['id_pegawai'];
		$query = "select * from data_pegawai where id_pegawai = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}
function getDataPegawai($id_pegawai){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT id_pegawai,jabatan,nama_pegawai,username,password,jenis_kelamin,tgl_lahir
						 FROM data_pegawai
						 WHERE id_pegawai='$id_pegawai'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getDataMenu($id_menu){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT *
						 FROM data_menu
						 WHERE id_menu='$id_menu'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getDataPesanan($id_pesanan){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT a.id_pesanan,nama_menu,jumlah,status_pesanan FROM data_pesanan a, detail_pesanan b, data_menu c
where a.id_pesanan = b.id_pesanan and c.id_menu=b.id_menu and a.id_pesanan=$id_pesanan; ");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getDataCek($id_pesanan){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT id_pesanan, nama_menu,jumlah FROM detail_pesanan a, data_menu b 
where a.id_menu = b.id_menu and a.id_pesanan= $id_pesanan; ");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getlistmenu(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT *
						 FROM data_menu
					");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getlistpegawai(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT distinct jabatan as 'jabatan' 
						 FROM data_pegawai 	
					");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getidpesanan(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT max(id_pesanan) as id_pesanan FROM data_pesanan
;
					");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function navigator(){
	?>
<div id="navigator">

| <a href="barang-admin.php">Barang</a> 
| <a href="pegawai.php">Pegawai</a>
| <a href="transaksi.php">Transaksi</a> 
| <a href="logout.php">Logout</a>
|
</div>
	<?php
}