  <?php 
// koneksi database
include '../../koneksi.php';

// menangkap data yang di kirim dari form
$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

// update data ke database
mysqli_query($conn,"UPDATE produk SET nama_produk='$nama_produk', stok='$stok', kategori='$kategori', deskripsi='$deskripsi', harga='$harga' WHERE id_produk='$id_produk'");
echo "<script>window.location.href='../index.php?p=products'</script>";

?>