    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Magicomputer</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!-- <script src="https://releases.jquery.com/git/jquery-3.x-git.min.js"></script> -->
    <script src="../css/jquery/qty.js"></script>
    <link href="../css/selector.css" rel="stylesheet">
    <script src="../css/selector.js"></script>
    <?php
    if (isset($_GET['product_id'])) {
      $id = $_GET['product_id'];
    } else {
      die("Error. No ID Selected!");
    }
    include "../koneksi.php";
    include "../seslog.php";
    include "header.php";

    // Menampilkan product
    $query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id'");
    $result = mysqli_fetch_array($query);

    // Menampilkan semua rating untuk produk ini
    $ratings_query = mysqli_query($conn, "SELECT * FROM penilaian WHERE id_produk='$id'");
    ?>

    <br>
    <br>
    <br>

    <div class="card">
      <div class="row g-0">
        <div class="col-md-3">
          <img src="../assets/image/<?= $result['gambar'] ?>" class="img-fluid rounded-start" onclick="viewimg()" alt="img" style="width: 300px;height:280px; display: block; margin-left: auto; margin-right: auto; margin-top: 1rem; margin-bottom:3rem;">
        </div>

        <div class="col-md-9 mt-3">
          <div class="container">
            <form name="form" method="POST" action="">
              <input type="hidden" name="id_produk" value="<?= $result['id_produk'] ?>"></input>
              <input type="hidden" name="gambar" value="<?= $result['gambar'] ?>"></input>
              <input type="hidden" name="nama_produk" value="<?= $result['nama_produk'] ?>"></input>
              <input type="hidden" name="kategori" value="<?= $result['kategori'] ?>"></input>
              <input type="hidden" name="harga" value="<?= $result['harga'] ?>"></input>
              <input type="hidden" name="id_pengguna" value="<?= $session_id_pengguna; ?> "></input>
              <div class="d-flex justify-content-between ">
                <h5 class="card-title"> <?= $result['nama_produk'] ?></h5>
                <h5> <?= "Rp" . number_format($result['harga']); ?></h5>
              </div>

              <div class="scrollspy-example" data-bs-smooth-scroll="true">
                <div class="card-body">
                  Kategori: <b> <?= $result['kategori'] ?> </b><br>
                  Stok: <?= $result['stok'] == 0 ? 'Habis' : $result['stok'] ?><br>
                  <?= $result['terjual'] == 0 ? 'Belum terjual' : 'Terjual ' . $result['terjual'] ?><br>
                  <p class="card-text"> Deskripsi : <br> <?= $result['deskripsi'] ?></p>
                </div>
              </div>

              <br>
              <div class="d-flex justify-content-between">
                <div class="spin-input nowrap fx-row fx-fill ">
                  <div class="icon reactive">
                    <span class="ci ci-minus">-</span>
                  </div>
                  <div class="icon">
                    <span>0</span>
                    <input type="text" class="hidden" value="0" name="jumlah">
                  </div>
                  <div class="icon reactive">
                    <span class="ci ci-plus">+</span>
                  </div>
                </div>
                <input name="total" hidden></input>
                <button onclick="kali()" name="add" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Tambah ke Keranjang</button>
              </div>
            </form>
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <br>

<?php
include('../koneksi.php');

if (isset($_POST['add'])) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];
    $gambar = $_POST['gambar'];
    $id_pengguna = $_POST['id_pengguna'];

    // Check if the combination of id_user and id_produk already exists in the database
    $check_query = "SELECT COUNT(*) AS count FROM keranjang WHERE id_pengguna='$id_pengguna' AND id_produk='$id_produk'";
    $check_result = mysqli_query($conn, $check_query);
    $check_row = mysqli_fetch_assoc($check_result);

    if ($check_row['count'] > 0) {
        // Jika sudah ada, update jumlah dan harga
        $update_query = "UPDATE keranjang SET jumlah = jumlah + $jumlah, total = total + $total WHERE id_pengguna='$id_pengguna' AND id_produk='$id_produk'";
        $conn_update = mysqli_query($conn, $update_query);
        if ($conn_update) {
            echo "<script>
            alert('Berhasil menambahkan jumlah dan harga produk di keranjang!');
            window.location.href = 'index.php?p=cart';
            </script>";
        } else {
            echo "<script>
            alert('Gagal mengupdate jumlah dan harga produk di keranjang!');
            </script>";
        }
    } else {
        // Jika belum ada, insert data baru
        $insert_query = "INSERT INTO keranjang VALUES (null, '$id_pengguna', '$id_produk', '$nama_produk', '$kategori', '$jumlah', '$harga', '$total', '$gambar')";
        $conn_insert = mysqli_query($conn, $insert_query);
        if ($conn_insert) {
            echo "<script>
            alert('Berhasil menambahkan produk ke keranjang!');
            window.location.href = 'index.php?p=cart';
            </script>";
        } else {
            echo "<script>
            alert('Gagal menambahkan produk ke keranjang!');
            </script>";
        }
    }
}
include "../footer.php";
?>


    <style>
      /* .scrollspy-example{
    down:100px;
  } */
    </style>




    <script>
      function viewimg() {
        Swal.fire({
          imageUrl: '../assets/image/<?= $result['gambar'] ?>',
          // imageHeight: 350,
          imageWidth: 350,
          imageAlt: 'img'
        })
      };

      function kali() {
        a = eval(form.harga.value);
        b = eval(form.jumlah.value);
        c = a * b
        form.total.value = c;
      }
    </script>

    <script>
      // Mendapatkan nilai stok dari elemen HTML
      var stok = <?= $result['stok'] ?>;

      // Mendapatkan elemen tombol "Add Cart"
      var addButton = document.querySelector('button[name="add"]');

      // Fungsi untuk mengaktifkan atau menonaktifkan tombol "Add Cart" berdasarkan stok
      function updateAddButton() {
        if (stok === 0) {
          addButton.disabled = true;
        } else {
          addButton.disabled = false;
        }
      }

      // Panggil fungsi saat halaman dimuat
      updateAddButton();
    </script>