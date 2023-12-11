<?php
session_start();
include 'koneksi.php';
$surel = $_POST['surel'];
$sandi = md5($_POST['sandi']);
$login = mysqli_query($conn, "select * from pengguna where surel='$surel' and sandi='$sandi'");
$cek = mysqli_num_rows($login);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    if ($data['peran'] == "user") {
        $_SESSION['id_pengguna'] = $data['id_pengguna'];
        $_SESSION['surel'] = $surel;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['telepon'] = $data['telepon'];
        $_SESSION['alamat'] = $data['alamat'];
        $_SESSION['peran'] = "user";
        echo "<script>window.location.href='user/index.php?p=produk'</script>";
    } else if ($data['peran'] == "admin") {
        $_SESSION['id_pengguna'] = $data['id_pengguna'];
        $_SESSION['surel'] = $surel;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['telepon'] = $data['telepon'];
        $_SESSION['alamat'] = $data['alamat'];
        $_SESSION['peran'] = "admin";
        echo "<script>window.location.href='admin/index.php?p=dashboard'</script>";
    } else {
        echo "<script>alert('Maaf surel tidak terdaftar');window.location.href='http://localhost/magicomputer/login';</script>";
    }
} else {
    echo "<script>alert('Maaf email atau sandi salah');window.location.href='http://localhost/magicomputer/login';</script>";
}
?>
