<?php 
// koneksi database
include '../../config.php';
 
// menangkap data id yang di kirim dari url
$d =$_GET['id_produk'];

// menghapus data dari database
mysqli_query($conn,"DELETE FROM produk WHERE id_produk='$d'");

//pengalihan halaman ini harus ditambah admin
echo "<script>window.location.href='../admin/index.php?p=products'</script>";
 
?>