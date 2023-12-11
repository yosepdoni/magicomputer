<?php
if (isset($_GET['id_produk'])) {
    $id = $_GET['id_produk'];
} else {
    die("Error. No ID Selected!");
}
include "koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id'");
$result = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<title>Magicomputer</title>

<head>
    <!-- ... Your meta tags, title, and CSS links ... -->
    <style>
        .product-image {
            width: 300px;
            height: 300px;
            object-fit: cover;
        }

        .description-toggle {
            display: none;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/magicomputer/assets/image/<?= $result['gambar'] ?>" class="img-fluid rounded-start product-image" alt="Product Image">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title"> <?= $result['nama_produk'] ?></h5>
                        Kategori: <b> <?= $result['kategori'] ?> </b><br>
                        Stok: <?= $result['stok'] == 0 ? 'Habis' : $result['stok'] ?><br>
                        <?= $result['terjual'] == 0 ? 'Belum terjual' : 'Terjual ' . $result['terjual'] ?><br>
                        <p class="card-text">
                            <span class="description-short">
                                <?= substr($result['deskripsi'], 0, 200) . '...' ?>
                            </span>
                            <span class="description-full description-toggle">
                                <?= $result['deskripsi'] ?>
                            </span>
                            <br>
                            <a href="#" class="read-more">Baca Semua</a>
                        </p>
                        <b> <?= "Rp" . number_format($result['harga']); ?></b> <br>
                        <p style="color:orange" class="m-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </p>
                        <a href="/magicomputer/login" class="btn btn-primary">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <style>
            /* Gaya CSS untuk bintang kuning */
            .rating {
                color: orange;
                font-size: 24px;
            }

            .ratingnull {
                color: black;
                font-size: 24px;
            }
        </style>
        <?php
        $ratings_query = mysqli_query($conn, "SELECT * FROM penilaian WHERE id_produk='$id'");
        while ($rating = mysqli_fetch_array($ratings_query)) {
            // Mengambil data pengguna yang memberikan rating
            $id_pengguna = $rating['id_pengguna'];
            $user_query = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
            $user_data = mysqli_fetch_array($user_query);

            // Ambil nilai rating dari $rating
            $rating_value = $rating['penilaian'];
            $user_name = $user_data['nama'];
            // $qty = $rating['qty'];
            $rating_description = $rating['keterangan'];
        ?>
            <div class="col-md-3">
                <!-- Gambar pengguna atau informasi lain yang ingin Anda tampilkan -->
            </div>

            <div class="col-md-9 mt-3">
                <div class="container">
                    <!-- Informasi  pengguna yang memberikan rating -->
                    <?= $user_name ?>
                    <!-- <div class='card-text'><?= $qty ?></div> -->

                    <!-- Tampilkan rating dalam bentuk bintang kuning -->
                    <div class='card-text'>
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating_value) {
                                echo "<span class='rating'>&#9733;</span>"; // Menampilkan bintang kuning (★)
                            } else {
                                echo "<span class='ratingnull'>&#9734;</span>"; // Menampilkan bintang kosong (☆)
                            }
                        }
                        ?>
                    </div>

                    <!-- Tampilkan deskripsi -->
                    <div class='card-text'><?= $rating_description ?></div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <br>


    <script>
        const readMoreLink = document.querySelector('.read-more');
        const descriptionShort = document.querySelector('.description-short');
        const descriptionFull = document.querySelector('.description-full');

        readMoreLink.addEventListener('click', function(event) {
            event.preventDefault();
            descriptionShort.classList.toggle('description-toggle');
            descriptionFull.classList.toggle('description-toggle');

            if (readMoreLink.textContent === 'Baca Semua') {
                readMoreLink.textContent = 'Baca Sedikit';
            } else {
                readMoreLink.textContent = 'Baca Semua';
            }
        });
    </script>
    <?php
    include "template/navbar.php";
    include "template/footer.php";
    ?>
</body>

</html>