
<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data id yang di kirim dari url
$h = $_GET['id_cart'];

// menghapus data dari database
mysqli_query($conn,"delete from keranjang where id_keranjang='$h'");

echo "<script>window.location.href='index.php?p=cart'</script>";
 
?>
