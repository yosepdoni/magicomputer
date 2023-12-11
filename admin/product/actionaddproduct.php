<?php 
include '../../koneksi.php';

  if (isset($_POST['simpan'])){
	$fileName = $_FILES['image']['name'];

	 $sql = "INSERT INTO produk (nama_produk, stok, terjual, kategori, deskripsi, harga, gambar) VALUES (
		'".$_POST['nama_produk']."', 
		'".$_POST['stok']."', 
		'".$_POST['terjual']."', 
		'".$_POST['kategori']."', 
		'".$_POST['deskripsi']."', 
		'".$_POST['harga']."', 
		'$fileName')";
	 mysqli_query($conn, $sql);
	 // Simpan di Folder image
	 move_uploaded_file($_FILES['image']['tmp_name'], "../../assets/image/".$_FILES['image']['name']);
	 echo "<script>alert('Data berhasil disimpan');window.location.href='../index.php?p=addproduct'</script>";
	} 
   ?>