<?php
include('../koneksi.php');
if (isset($_POST['checkout'])){
	$id_order=$_POST['id_order'];
	$id_brg=$_POST['id_brg'];
	$img=$_POST['img'];
	$nm_brg=$_POST['nm_brg'];
	$harga=$_POST['harga'];
	$jumlah=$_POST['jumlah'];
	$total=$_POST['total'];
	$id_user=$_POST['id_user'];
	$conn=mysqli_query($conn,"INSERT INTO history VALUES
	(null,'$id_order,','$id_brg','$img', '$nm_brg', '$harga', '$jumlah', '$total', '$id_user')");
	
	if($conn){
		echo"<script>alert('DATA BERHASIL DISIMPAN!');</script>";
        header("Location:index.php?p=cart");
	}else{
		echo"<script>alert('DATA GAGAL DISIMPAN!');</script>";
	}
}
?>