<?php
include '../koneksi.php';

if (isset($_POST['ganpas'])) {
    // Menangkap data yang dikirim dari form
    $id_pengguna = $_POST['id_pengguna'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi dan perbarui password jika sesuai
    $query = "SELECT sandi FROM pengguna WHERE id_pengguna=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_pengguna);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $hashed_password);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if (md5($old_password) === $hashed_password) {
        // Validasi panjang karakter password baru
        if (strlen($new_password) >= 8) {
            // Jika password baru diisi dan konfirmasi sesuai, perbarui password
            if (!empty($new_password) && $new_password === $confirm_password) {
                $query = "UPDATE pengguna SET sandi=? WHERE id_pengguna=?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "si", md5($new_password), $id_pengguna);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "<script>alert('Password berhasil diperbaharui');</script>";
            } else {
                echo "<script>alert('Password baru dan konfirmasi password harus sesuai');</script>";
            }
        } else {
            echo "<script>alert('Password baru minimal harus 8 karakter');</script>";
        }
    } else {
        echo "<script>alert('Password lama tidak sesuai.');</script>";
    }

    echo "<script>window.location.href='index.php?p=profil'</script>";
}
?>
