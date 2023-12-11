<html>
<?php 
	session_start();
	if (!empty($_SESSION['surel'])){
	$session_id_pengguna=$_SESSION['id_pengguna'];
	$session_surel=$_SESSION['surel'];
	$session_nama=$_SESSION['nama'];
	$session_telepon=$_SESSION['telepon'];
	$session_alamat=$_SESSION['alamat'];	
	$session_peran=$_SESSION['peran'];
	}
	else{
		header ("Location:route.php?p=login");
	}
?>
<html>