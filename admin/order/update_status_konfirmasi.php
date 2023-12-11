<?php 
// koneksi database
include '../../koneksi.php';

// // menangkap data yang di kirim dari form
// $order_id = $_POST['order_id'];
// $status_pengiriman = $_POST['status_pengiriman'];

// // update data ke database
// mysqli_query($conn,"UPDATE checkout SET status_pengiriman='$status_pengiriman' WHERE order_id='$order_id'");
// echo "<script>window.location.href='../index.php?p=orders'</script>";
            
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_pesanan"])) {
    $IdPesanan = $_POST["id_pesanan"];
    $StatusKirim = $_POST["status_kirim"];
    // Perform the update in the database
    $updateQuery = "UPDATE pesanan SET status_kirim = '$StatusKirim' WHERE id_pesanan = '$IdPesanan'";
    mysqli_query($conn, $updateQuery);

    // Send a response back to the client (you can customize the response if needed)
    echo "<script>alert('status berhasil diubah');window.location.href='../index.php?p=neworders'</script>";
}

?>