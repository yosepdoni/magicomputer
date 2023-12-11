<?php
include('../koneksi.php');

if (isset($_POST['add'])) {
    $id_product = $_POST['id_product'];
    $nm_product = $_POST['nm_product'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $_POST['total'];
    $img = $_POST['img'];
    $id_user = $_POST['id_user'];

    // Check if the combination of id_user and id_product already exists in the database
    $check_query = "SELECT COUNT(*) AS count FROM cart WHERE id_user='$id_user' AND id_product='$id_product'";
    $check_result = mysqli_query($conn, $check_query);
    $check_row = mysqli_fetch_assoc($check_result);

    if ($check_row['count'] > 0) {
		echo "<script>
		alert('DATA GAGAL DISIMPAN! ID User dan ID Product sudah ada dalam keranjang!');
		window.location.href = 'index.php?p=cart';
	  </script>";
    } else {
        $insert_query = "INSERT INTO cart VALUES (null, '$id_user', '$id_product', '$nm_product', '$category', '$qty', '$price', '$total', '$img')";
        $conn_insert = mysqli_query($conn, $insert_query);
        if ($conn_insert) {
            echo "<script>alert('DATA BERHASIL DISIMPAN!');</script>";
            header("Location:index.php?p=cart");
        } else {
            echo "<script>alert('DATA GAGAL DISIMPAN!');</script>";
        }
    }
}
?>
