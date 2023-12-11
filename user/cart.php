<!-- <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<br>
<br>
<style>
    #footer {
        /* padding: 50px 0 50px; */
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>

<?php
require '../koneksi.php';
$ongkir = 35000;
// $grand_total = 0;
$allItems = '';
$items = [];

$sql = "SELECT CONCAT( nama_produk, ' (',kategori,'), ',jumlah,'x',' Rp' ,format(harga,0)) AS ItemQty, total FROM keranjang WhERE id_pengguna='$_SESSION[id_pengguna]'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $grand_total += $row['total'];
    $ongkir += $row['total'];
    $items[] = $row['ItemQty'];
}
$allItems = implode('.<br> ', $items);
?>

<!-- form untuk mengirim ke history -->
<form method="POST" action="" enctype="multipart/form-data">
    <!-- <h1><?= $allItems ?></h1> -->
    <!-- <h1><?= $grand_total ?></h1>
                <h1><?= $ongkir ?></h1> -->
    <input type="hidden" name="daftar_pesanan" value="<?= $allItems ?>" />
    <input type="hidden" name="pembayaran" value="<?= $ongkir ?>" /> <br>
    <input type="hidden" name="id_pengguna" value="<?= $session_id_pengguna; ?>" />

    <?php
    include '../koneksi.php';
    $conn = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pengguna='$_SESSION[id_pengguna]' and id_keranjang");
    $no = 1;
    if (mysqli_num_rows($conn) == 0) {
        echo "<br><center><h4>Keranjang Kosong!</h4></center>";
    } else {

    ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <h3 class="mb-1 text-center">Keranjang Belanja</h3>
                <p class="mb-2 text-center">
                    <i class="text-info font-weight-bold">Daftar produk dikeranjang anda</i>
                </p>
                <table class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th style="width:5%">No.</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th style="width:20%">Harga</th>
                            <th style="width:20%">Total</th>
                            <th style="width:10%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($h = mysqli_fetch_array($conn)) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <input type="hidden" name="id_produk" value="<?= $h['id_produk']; ?>" />
                                <td><img src="../assets/image/<?= $h['gambar']; ?>" alt="img" width="50" height="50"></td>
                                <td>
                                    <h><?= $h['nama_produk']; ?></h>
                                </td>
                                <td>

                                    <!-- <form action="" method="POST"> -->
                                        <!-- <button type="submit" name="kurang_qty" class="fa fa-minus"></button> -->
                                        <?= $h['jumlah']; ?>
                                        <!-- <button type="submit" name="tambah_qty" class="fa fa-plus"></button> -->
                                <!-- <input type="hidden" name="id_produk" value="<?= $h['id_produk']; ?>" /> -->

                                    <!-- </form> -->


                                </td>
                                <td><?= "Rp" . number_format($h['harga']); ?></td>
                                <td><?= "Rp" . number_format($h['total']); ?></td>
                                <td>
                                    <a onclick="return confirm('apakah anda yakin? ');" href="index.php?p=dlcrt&id_cart=<?php echo $h['id_keranjang'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <img src="https://cdn3.iconfinder.com/data/icons/banks-in-indonesia-logo-badge/100/BCA-512.png" width="70px" height="70px" alt="" srcset="">
                            </div>

                            <div class="col-md-6" style="margin-top: 10px;">
                                <small>Magicomputer</small>
                                <p id="text" onclick="copyElementText(this.id)">3901085753613718 <br>
                                    <i class="fa fa-info-circle text-danger" aria-hidden="true" style="font-size: 0.8rem;"> Double click number to copy</i>
                                </p>
                            </div>
                        </div>
                        <p><?= $allItems ?></p>
                        <label for="file-img">Upload bukti pembayaran</label>
                        <input type="file" id="file-img" name="gambar" class="form-control" required>
                        <?php
                        include '../koneksi.php';
                        $conn = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna = '$session_id_pengguna'");
                        while ($h = mysqli_fetch_array($conn)) {
                        ?>
                            <br>
                            <label for="ekspedisi">Pilih ekspedisi pengiriman</label>
                            <select id="ekspedisi" class="form-select" name="ekspedisi" required>
                                <option value="J&T Express">J&T Express</option>
                                <option value="JNE">JNE</option>
                                <option value="Ninja Express">Ninja Express</option>
                                <option value="SiCepat Ekspres">SiCepat Ekspres</option>
                            </select>
                            <div class="col-md-12"><textarea name="alamat" type="text" class="form-control" readonly><?= $h['alamat']; ?></textarea></div>
                        <?php } ?>
                        <i class="fa fa-info-circle text-danger" aria-hidden="true" style="font-size: 0.8rem;"> Pastikan alamat pengiriman sudah benar</i>
                        <h6>Total : <?= "Rp" . number_format($grand_total); ?> </h6>
                        <h6>Ongkir : Rp35,000</h6>
                        <h6>Subtotal: <?= "Rp" . number_format($ongkir); ?> </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button name="checkout" class="btn btn-info"><i class="fas fa-money-check-alt mr-2"></i> Buat Pesanan</button>

                    </div>
                </div>
            </div>
        </div>
</form>


<div class="container">
    <div class="row">
        <div class="col-md-2 offset-md-11">
            <div class="float-right text-right">
                <h4>
                    <?= "Rp" . number_format($grand_total); ?>
                </h4>
                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-money-check-alt mr-2"></i> Beli Sekarang</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<br>
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    });
</script>
<script>
    function copyElementText(id) {
        var text = document.getElementById(id).innerText;
        var elem = document.createElement("textarea");
        document.body.appendChild(elem);
        elem.value = text;
        elem.select();
        document.execCommand("copy");
        document.body.removeChild(elem);
    }
</script>
<?php
include '../koneksi.php';
ini_set('date.timezone', 'Asia/Jakarta');
if (isset($_POST['checkout'])) {
    $fileName = $_FILES['gambar']['name'];
    $id_order = $_POST['order_id'];
    $product_id = $_POST['id_produk'];
    $products = $_POST['daftar_pesanan'];
    $grand_total = $_POST['pembayaran'];
    $status = 'Menunggu Konfirmasi';
    $session_id_pengguna = $_POST['id_pengguna'];
    $tgl =  date('Y-m-d H:i:s');
    $no_resi = 0;
    $ekspedisi = $_POST['ekspedisi'];
    $alamat = $_POST['alamat'];

    // Insert the order into the orders table
    $order_insert_query = "INSERT INTO pesanan VALUES (null, '$session_id_pengguna', '$product_id', '$no_resi', '$products', '$grand_total', '$fileName', '$tgl', '$ekspedisi', '$alamat', '$status')";
    mysqli_query($conn, $order_insert_query);
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/image/" . $_FILES['gambar']['name']);

    // Fetch cart items for the user
    $cart_query = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_pengguna='$session_id_pengguna'");

    // Loop through each cart item and update stock
    while ($cart_item = mysqli_fetch_array($cart_query)) {
        $id = $cart_item['id_produk'];
        $qty = $cart_item['jumlah'];

        // Fetch product details
        $product_query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id'");
        $product_data = mysqli_fetch_array($product_query);

        if ($product_data) {
            $stok = $product_data['stok'];
            $sisa = $stok - $qty;

            // Update product stock
            mysqli_query($conn, "UPDATE produk SET stok='$sisa' WHERE id_produk='$id'");

            // Update the 'terjual' (sold) column
            mysqli_query($conn, "UPDATE produk SET terjual=terjual+'$qty' WHERE id_produk='$id'");
        }
    }

    // Clear the cart after successful checkout
    $delete_cart_query = "DELETE FROM keranjang WHERE id_pengguna='$session_id_pengguna'";

    if (mysqli_query($conn, $delete_cart_query)) {
        echo "<script>alert('Transaksi Berhasil!');</script>";
        echo "<script>window.location.href='index.php?p=cart'</script>";
    } else {
        echo "<script>alert('Transaksi Gagal!');</script>";
    }
}
?>