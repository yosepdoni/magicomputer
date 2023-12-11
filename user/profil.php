<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link href="../css/profil.css" rel="stylesheet">
<link rel="stylesheet" href="../css/status.css">


<body className='snippet-body'>
    <div class="container bg-light mt-4 mb-1">
        <div class="row">
            <!-- <div class="col-md-3 border-right">
                
            </div> -->
            <div class="col-md-4">
                <form action="upd_prof.php" method="POST">
                    <div class="p-3 py-5">

                        <div class="d-flex flex-column align-items-center text-center p-3 py-5 bg-info" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);  border: 0px solid #3498db;">
                            <img class="rounded-circle" width="100px" src="https://img.icons8.com/windows/2x/user.png">
                            <span class="font-weight-bold fs-6"><?php echo $session_surel; ?></span>
                            <span class="text-dark fs-5" style="text-transform: uppercase;"><?php echo $session_nama; ?></span>
                            <span></span>
                        </div>
                        <div class="d-flex justify-content-around align-items-center experience mt-3">
                            <span><button id="toggle-button" class="btn btn-dark"><i class="fas fa-eye"></i> Profil</button> </span>
                            <span><button id="toggle-button-a" class="btn btn-danger"><i class="fas fa-lock"></i> Password</button> </span>
                            <a class="btn btn-success" onclick="logout()"><span class="fa fa-sign-out-alt"> Logout</span></a>
                        </div><br>
                        <!-- <div class="col-md-12"><label class="labels">Kode POS</label><input type="text" class="form-control" placeholder="Kode POST" value="<?php echo $session_kode_pos; ?>"></div> <br> -->
                        <!-- <div class="col-md-12"><label class="labels">Kota</label><input type="text" class="form-control" placeholder="additional details" value=""></div> -->
                        <div class="hidden-section-a">
                            <div class="col-md-12">
                                <input type="hidden" name="id_pengguna" value="<?= $session_id_pengguna ?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Password lama</label>
                                <div class="input-group">
                                    <input id="old_password_input" name="old_password" type="password" class="form-control" placeholder="Password lama" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggle_old_password"><i class="fas fa-eye" id="toggle_old_password_icon"></i></button>
                                </div>
                                <p id="password_mismatch" style="color: red; display: none;">Password lama tidak sesuai.</p>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Password baru</label>
                                <div class="input-group">
                                    <input id="new_password_input" name="new_password" type="password" class="form-control" placeholder="Password Baru" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggle_new_password"><i class="fas fa-eye" id="toggle_new_password_icon"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Konfirmasi password</label>
                                <div class="input-group">
                                    <input id="confirm_password_input" name="confirm_password" type="password" class="form-control" placeholder="Konfirmasi Password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggle_confirm_password"><i class="fas fa-eye" id="toggle_confirm_password_icon"></i></button>
                                </div>
                                <p id="confirm_password_message" style="color: red; display: none;">Konfirmasi password tidak sesuai.</p>
                                <p id="confirm_password_length_message" style="color: red; display: none;">Konfirmasi password minimal harus 8 karakter.</p>
                                <p id="confirm_password_match_message" style="color: green; display: none;">Konfirmasi password sesuai.</p>
                                <p id="confirm_password_mismatch_message" style="color: red; display: none;">Konfirmasi password tidak sesuai.</p>
                            </div>
                            <div class="mt-3"><button type="submit" name="ganpas" class="btn btn-danger"><i class="fa fa-save"> Update Password</i></button></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 fs-6 border-right mt-5 bg-light" style="background-color: #f2f2f2; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                <div class="p-3 py-5">
                    <form action="" method="POST">
                        <div class="hidden-section">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right text-dark">Pengaturan Profil</h4>
                                <?php
                                include '../koneksi.php';
                                $conn = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna = '$session_id_pengguna'");
                                while ($h = mysqli_fetch_array($conn)) {
                                ?>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><input name="id_pengguna" type="hidden" class="form-control" value="<?= $h['id_pengguna']; ?>"></div>
                                <div class="col-md-12"><label class="labels">Nama</label><input name="nama" type="text" class="form-control" placeholder="first name" value="<?= $h['nama']; ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Telepon</label><input name="telepon" type="text area" class="form-control" placeholder="enter phone number" value="<?= $h['telepon']; ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Alamat</label><textarea name="alamat" type="text" class="form-control" placeholder="masukan alamat"><?= $h['alamat']; ?></textarea></div>
                            </div>
                            <div class="mt-3 mb-4"><button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"> Update Profil</i></button></div>
                        <?php } ?>
                        </div>
                    </form>
                    <!-- <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const toggleButtons = document.querySelectorAll('.fa-angle-down');
                            toggleButtons.forEach(function(toggleButton) {
                                toggleButton.addEventListener('click', function() {
                                    const alamat = toggleButton.parentElement.nextElementSibling;
                                    alamat.style.display = (alamat.style.display === 'none' || alamat.style.display === '') ? 'block' : 'none';
                                });
                            });
                        });
                    </script> -->
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const toggleButtons = document.querySelectorAll('.fa-angle-down');
                            toggleButtons.forEach(function(toggleButton) {
                                toggleButton.addEventListener('click', function() {
                                    const alamat = toggleButton.parentElement.nextElementSibling;
                                    if (alamat.style.display === 'none' || alamat.style.display === '') {
                                        alamat.style.display = 'block';
                                        toggleButton.className = 'fa fa-angle-up';
                                    } else {
                                        alamat.style.display = 'none';
                                        toggleButton.className = 'fa fa-angle-down';
                                    }
                                });
                            });
                        });
                    </script>






                    <div class="d-flex justify-content-between align-items-center  mb-3">
                        <h4 class="text-right">Pesanan</h4>
                    </div>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $conn = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pengguna = '$session_id_pengguna' AND status_kirim ='menunggu konfirmasi' ORDER BY id_pesanan DESC");
                    while ($h = mysqli_fetch_array($conn)) {
                    ?>
                        <div class="list-item">
                            <div class="status-line"></div>
                            <div class="status-dot-mkonfirmasi"></div>
                            <div>
                                <p>Status: <?= $h['status_kirim']; ?></p>
                                <p class="card-title mb-2"><?= $h['daftar_pesanan']; ?></p>
                                <p><b><?= "Rp" . number_format($h['pembayaran']); ?></b></p>
                                <p>Ekspedisi: <?= $h['ekspedisi']; ?></p>
                            </div>
                            <div class="div" class="toggle-button">Alamat Pengiriman <i class="fa fa-angle-down"></i></div>
                            <p style="display:none;"><?= $h['alamat'] ?></p>
                            <div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $conn = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pengguna = '$session_id_pengguna' AND status_kirim ='sedang dikemas' ORDER BY id_pesanan DESC");
                    while ($h = mysqli_fetch_array($conn)) {
                    ?>
                        <div class="list-item">
                            <div class="status-line"></div>
                            <div class="status-dot-dikemas"></div>
                            <div>
                                <p>Status: <?= $h['status_kirim']; ?></p>
                                <p class="card-title mb-2"><?= $h['daftar_pesanan']; ?></p>
                                <p><b><?= "Rp" . number_format($h['pembayaran']); ?></b></p>
                                <p>Ekspedisi: <?= $h['ekspedisi']; ?></p>

                            </div>
                            <div class="div" class="toggle-button">Alamat Pengiriman <i class="fa fa-angle-down"></i></div>
                            <p style="display:none;"><?= $h['alamat'] ?></p>
                            <div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    include '../koneksi.php';
                    $conn = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pengguna = '$session_id_pengguna' and status_kirim='dikirim'");
                    while ($h = mysqli_fetch_array($conn)) {
                    ?>
                        <div class="list-item">
                            <div class="status-line"></div>
                            <div class="status-dot-dikirim"></div>
                            <div>
                                <p>Status: <?= $h['status_kirim']; ?></p>
                                <p class="card-title mb-2"><?= $h['daftar_pesanan']; ?></p>
                                <p><b><?= "Rp" . number_format($h['pembayaran']); ?></b></p>
                                <p>Ekspedisi: <?= $h['ekspedisi']; ?></p>
                            </div>
                            <div class="div" class="toggle-button">Alamat Pengiriman <i class="fa fa-angle-down"></i></div>
                            <p style="display:none;"><?= $h['alamat'] ?></p>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    include '../koneksi.php';
                    $conn = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pengguna = '$session_id_pengguna' and status_kirim='dalam perjalanan'");
                    while ($h = mysqli_fetch_array($conn)) {
                    ?>
                        <hr>

                        <div class="list-item">
                            <div class="status-line"></div>
                            <div class="status-dot-jalan"></div>
                            <div>
                                No. Resi: <?= $h['no_resi']; ?>
                                <p>Status: <?= $h['status_kirim']; ?></p>
                                <p class="card-title mb-2"><?= $h['daftar_pesanan']; ?></p>
                                <b><?= "Rp" . number_format($h['pembayaran']); ?></b>
                                <p>Ekspedisi: <?= $h['ekspedisi']; ?></p>
                            </div>
                            <div class="div" class="toggle-button">Alamat Pengiriman <i class="fa fa-angle-down"></i></div>
                            <p style="display:none;"><?= $h['alamat'] ?></p>
                        </div>
                        <form action="" method="POST">
                            <input name="id_pengguna" type="hidden" class="form-control" value="<?= $session_id_pengguna ?>">
                            <input name="id_pesanan" type="hidden" class="form-control" value="<?= $h['id_pesanan']; ?>">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <p class="text-muted">Konfirmasi barang sudah diterima <button class="btn" name="terima"><i class="	fa fa-chevron-circle-down text-primary"></i> Ya</button></p>
                            </div>
                        </form>
                    <?php
                    }
                    ?>
                    <?php
                    include '../koneksi.php';

                    // Query untuk mengambil data checkout yang sudah diterima
                    $query_checkout = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pengguna = '$session_id_pengguna' AND status_kirim='diterima' ORDER BY id_pesanan DESC");

                    // Variabel flag untuk melacak apakah penilaian sudah diberikan pada produk pertama
                    $firstProductRated = false;

                    while ($checkout = mysqli_fetch_array($query_checkout)) {
                        $productId = $checkout['id_produk'];
                        // echo $productId;

                        $userId = $session_id_pengguna;

                        // Periksa apakah pengguna sudah memberikan penilaian untuk produk ini
                        $query_rating = mysqli_query($conn, "SELECT * FROM penilaian WHERE id_pengguna = '$userId' AND id_produk = '$productId'");
                        $ratingExist = mysqli_num_rows($query_rating) > 0;

                        if ($ratingExist) {
                            // Jika pengguna sudah memberikan penilaian pada produk ini, tampilkan pesan
                    ?>
                            <div class="list-item">
                                <!-- Tampilan produk -->
                                <div class="status-line"></div>
                                <div class="status-dot-diterima"></div>
                                <div>
                                    No. Resi: <?= $checkout['no_resi']; ?>
                                    <p>Status: <?= $checkout['status_kirim']; ?></p>
                                    <p class="card-title mb-2"><?= $checkout['daftar_pesanan']; ?></p>
                                    <p><b><?= "Rp" . number_format($checkout['pembayaran']); ?></b></p>
                                    <p>Ekspedisi: <?= $checkout['ekspedisi']; ?></p>
                                </div>
                                <div class="div" class="toggle-button">Alamat Pengiriman <i class="fa fa-angle-down"></i></div>
                                <p style="display:none;"><?= $checkout['alamat'] ?></p>
                                <p>Anda sudah memberikan penilaian pada produk ini.</p>
                            </div>
                        <?php
                        } elseif (!$firstProductRated) {
                            // Jika produk pertama dan belum diberi penilaian, tampilkan form penilaian
                        ?>
                            <div class="list-item">
                                <!-- Tampilan produk -->
                                <div class="status-line"></div>
                                <div class="status-dot-diterima"></div>
                                <div>
                                    No. Resi: <?= $checkout['no_resi']; ?>
                                    <p>Status: <?= $checkout['status_kirim']; ?></p>
                                    <p class="card-title mb-2"><?= $checkout['daftar_pesanan']; ?></p>
                                    <p><b><?= "Rp" . number_format($checkout['pembayaran']); ?></b></p>
                                    <p>Ekspedisi: <?= $checkout['ekspedisi']; ?></p>
                                </div>
                                <div class="div" class="toggle-button">Alamat Pengiriman <i class="fa fa-angle-down"></i></div>
                                <p style="display:none;"><?= $checkout['alamat'] ?></p> <br>
                                <!-- Tombol untuk menampilkan modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_<?= $checkout['id_produk'] ?>">
                                    Beri Penilaian
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal_<?= $checkout['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Form Penilaian</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Isi form penilaian di sini -->
                                                <form action="" method="POST">
                                                    <p>Berikan Penilaian</p>
                                                    <input type="hidden" value="<?= $checkout['id_produk'] ?>" name="id_produk">
                                                    <input type="hidden" value="<?= $session_id_pengguna ?>" name="id_pengguna">
                                                    <input type="hidden" id="rating_<?= $checkout['id_produk'] ?>" name="penilaian" value="0">
                                                    <div class="rating">
                                                        <label for="star1_<?= $checkout['id_produk'] ?>" class="star" onclick="setRating(1, <?= $checkout['id_produk'] ?>)">&#9733;</label>
                                                        <label for="star2_<?= $checkout['id_produk'] ?>" class="star" onclick="setRating(2, <?= $checkout['id_produk'] ?>)">&#9733;</label>
                                                        <label for="star3_<?= $checkout['id_produk'] ?>" class="star" onclick="setRating(3, <?= $checkout['id_produk'] ?>)">&#9733;</label>
                                                        <label for="star4_<?= $checkout['id_produk'] ?>" class="star" onclick="setRating(4, <?= $checkout['id_produk'] ?>)">&#9733;</label>
                                                        <label for="star5_<?= $checkout['id_produk'] ?>" class="star" onclick="setRating(5, <?= $checkout['id_produk'] ?>)">&#9733;</label>
                                                    </div>
                                                    <textarea name="keterangan" placeholder="Komentar Anda"></textarea>
                                                    <input type="submit" value="Kirim" name="nilai">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    // Fungsi untuk mengatur jumlah bintang kuning sesuai yang diklik
                                    function setRating(rating, productId) {
                                        const stars = document.querySelectorAll('.star');
                                        for (let i = 0; i < stars.length; i++) {
                                            if (i < rating) {
                                                stars[i].classList.add('active'); // Tambahkan class 'active' untuk warna kuning
                                            } else {
                                                stars[i].classList.remove('active'); // Hapus class 'active' untuk bintang yang tidak terpilih
                                            }
                                        }
                                        document.getElementById('rating_' + productId).value = rating; // Simpan nilai rating pada input hidden
                                    }
                                </script>
                            </div>
                        <?php
                            $firstProductRated = true; // Set flag ke true setelah produk pertama ditampilkan
                        } else {
                            // Jika produk pertama sudah diberi penilaian, tampilkan pesan bahwa produk belum diberi penilaian
                        ?>
                            <div class="list-item">
                                <!-- Tampilan produk -->
                                <div class="status-line"></div>
                                <div class="status-dot-diterima"></div>
                                <div>
                                    <p>Status: <?= $checkout['status_kirim']; ?></p>
                                    <p class="card-title mb-2"><?= $checkout['daftar_pesanan']; ?></p>
                                    <p><b><?= "Rp" . number_format($checkout['pembayaran']); ?></b></p>
                                </div>

                                <p>Produk belum diberi penilaian.</p>
                            </div>
                    <?php
                        }
                    }
                    ?>





                    <style>
                        .rating {
                            display: flex;
                        }

                        .star {
                            font-size: 24px;
                            /* Atur ukuran bintang sesuai keinginan */
                            color: black;
                            /* Warna bintang sebelum diklik */
                            cursor: pointer;
                        }

                        /* Warna kuning untuk bintang yang sudah diklik */
                        .star.active {
                            color: orange;
                        }
                    </style>

                </div>
            </div>

        </div>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='../css/profil.js'></script>
    <script type='text/javascript'>
        var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function(e) {
            e.preventDefault();
        });
    </script>
</body>

<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    // Menangkap data yang dikirim dari form
    $id_pengguna = $_POST['id_pengguna'];
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // Menghindari SQL Injection dengan menggunakan prepared statement
    $query = "UPDATE pengguna SET nama=?, telepon=?, alamat=? WHERE id_pengguna=?";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $telepon, $alamat, $id_pengguna);

    // Eksekusi prepared statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Profil Berhasil! diperbaharui');</script>";
        echo "<script>window.location.href='index.php?p=profil'</script>";
    } else {
        echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
    }

    // Tutup prepared statement
    mysqli_stmt_close($stmt);
}
?>
<?php
include '../koneksi.php';

if (isset($_POST['terima'])) {
    // Menangkap data yang dikirim dari form
    $user_id = $_POST['id_pengguna'];
    $order_id = $_POST['id_pesanan'];
    $status = 'diterima';

    // Menghindari SQL Injection dengan menggunakan prepared statement
    $query = "UPDATE pesanan SET status_kirim=? WHERE id_pengguna=? AND id_pesanan=?";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "sii", $status, $user_id, $order_id);

    // Eksekusi prepared statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Terima kasih telah mengkonfirmasi penerimaan produk');</script>";
        echo "<script>window.location.href='index.php?p=profil'</script>";
    } else {
        echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($conn);
    }

    // Tutup prepared statement
    mysqli_stmt_close($stmt);
}
?>

<?php
include '../koneksi.php';

// if (isset($_POST['nilai'])) {
//     // Menangkap data yang dikirim dari form
//     $product_id = $_POST['product_id'];
//     $user_id = $_POST['user_id'];
//     $rating = $_POST['rating'];
//     $description = $_POST['description'];

//     // Menghindari SQL Injection dengan menggunakan prepared statement
//     $query = "INSERT INTO rating (product_id, user_id, rating, description) VALUES (?, ?, ?, ?)";
//     $stmt = mysqli_prepare($conn, $query);

//     // Bind parameter ke prepared statement
//     mysqli_stmt_bind_param($stmt, "iiis", $product_id, $user_id, $rating, $description);

//     // Eksekusi prepared statement
//     $result = mysqli_stmt_execute($stmt);

//     if ($result) {
//         echo "<script>alert('Terima kasih telah memberikan penilaian produk');</script>";
//         echo "<script>window.location.href='index.php?p=profil'</script>";
//     } else {
//         echo "Terjadi kesalahan saat menambahkan penilaian: " . mysqli_error($conn);
//     }

//     // Tutup prepared statement
//     mysqli_stmt_close($stmt);
// }
// 
?>

<?php
$host = 'localhost';
$db = 'db_magicomputer_sintang';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$product_id = $_POST['id_produk'];
$user_id = $_POST['id_pengguna'];

// Periksa apakah sudah ada penilaian sebelumnya
$stmt = $pdo->prepare("SELECT * FROM penilaian WHERE id_produk = ? AND id_pengguna = ?");
$stmt->execute([$product_id, $user_id]);
$existingRating = $stmt->fetch();

if ($existingRating) {
    // Jika sudah ada penilaian, tampilkan pesan
    echo "<script>alert('Anda sudah memberi penilaian sebelumnya');</script>";
} else {
    // Jika belum ada penilaian, simpan penilaian baru ke dalam tabel rating
    $rating = $_POST['penilaian'];
    $description = $_POST['keterangan'];

    $insertStmt = $pdo->prepare("INSERT INTO penilaian (id_pengguna, id_produk, penilaian, keterangan) VALUES (?, ?, ?, ?)");
    $insertStmt->execute([$user_id, $product_id, $rating, $description]);

    // Tampilkan pesan berhasil atau alihkan ke halaman lain, sesuai kebutuhan Anda.
    echo "<script>alert('Terima kasih telah memberikan penilaian produk');</script>";
    echo "<script>window.location.href='index.php?p=profil'</script>";
}
?>