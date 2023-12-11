<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Pesanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?p=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Detail Pesanan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mb-5">
            <div class="card-header">
              <h3 class="card-title">Detail Pesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="box box-info">
                <!-- /.box-header -->

                <div class="box-body">


                  <?php
                  include "../../koneksi.php";
                  $d = $_GET['id_pesanan'];
                  $data = mysqli_query($conn, "SELECT * FROM pesanan where id_pesanan='$d'");
                  while ($da = mysqli_fetch_array($data)) {
                  ?>



                    <form class="form-horizontal" method="POST" action="order/update_status_konfirmasi.php">
                      <div class="box-body">
                        <?php
                        include('../../koneksi.php');
                        $conn = mysqli_query($conn, " SELECT * FROM pengguna WhERE id_pengguna='$da[id_pengguna]'");
                        while ($h = mysqli_fetch_array($conn)) {
                        ?>
                          <input type="hidden" name="id_pesanan" value="<?= $da['id_pesanan']; ?>">
                          <div id="printableArea">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th scope="row">Daftar Pesanan</th>
                                  <td>:</td>
                                  <td> <?= $da['daftar_pesanan']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Total</th>
                                  <td>:</td>
                                  <td> <?= "Rp " . number_format($da['pembayaran']); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Ekspedisi</th>
                                  <td>:</td>
                                  <td> <?= $da['ekspedisi']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Nama</th>
                                  <td>:</td>
                                  <td> <?= $h['nama']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Email</th>
                                  <td>:</td>
                                  <td> <?= $h['surel']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Telepon</th>
                                  <td>:</td>
                                  <td> <?= $h['telepon']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Alamat</th>
                                  <td>:</td>
                                  <td> <?= $da['alamat']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Bukti Pembayaran</th>
                                  <td>:</td>
                                  <td> <a href="#gambar-1"> <img src="../assets/image/<?= $da['bukti_bayar']; ?>" alt="gambar" width="70" height="70"> </a> </td>
                                </tr>
                                <!-- view image -->
                                <div class="overlay" id="gambar-1">
                                  <a href="#" class="close">
                                    <svg style="width:47px;height:47px" viewBox="0 0 20 30">
                                      <path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" />
                                    </svg>
                                  </a>
                                  <img src="../assets/image/<?= $da['bukti_bayar']; ?>" alt="gambar" width="300" height="600">
                                </div>
                                <!-- end view image -->
                                <tr>
                                  <th scope="row">Tanggal</th>
                                  <td>:</td>
                                  <td><?php echo date("d/m/Y", strtotime($da['tanggal'])); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Status Pengiriman</th>
                                  <td>:</td>
                                  <td>
                                    <select name="status_kirim">
                                      <option value="Sedang dikemas">Sedang Dikemas</option>
                                      <option value="Dibatalkan">Batalkan</option>
                                    </select>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <script>
                            function printDiv(divName) {
                              var printContents = document.getElementById(divName).innerHTML;
                              var originalContents = document.body.innerHTML;

                              document.body.innerHTML = printContents;

                              window.print();

                              document.body.innerHTML = originalContents;
                            }
                          </script>
                          <div class="box-footer">
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"> Selesai </i></button>
                          </div>
                          <!-- /.box-body -->

                    </form>
                <?php
                        }
                      }
                ?>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<style>
  .mainwrapper {
    background: #fefefe;
    display: flex;
    width: 100%;
    height: 650px;
    justify-content: center;
    align-items: center;
  }


  /* overlay by webprogramminunpas and modified by nelayankode.com*/
  .overlay {
    width: 0;
    height: 0;
    overflow: hidden;
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0);
    z-index: 9999;
    transition: .8s;
    text-align: center;
    padding: 150px 0;
  }

  .overlay:target {
    width: auto;
    height: auto;
    bottom: 0;
    right: 0;
    background: rgba(0, 0, 0, .7);
  }

  .overlay img {
    max-height: 100%;
    box-shadow: 2px 2px 7px rgba(0, 0, 0, .5);
  }

  .overlay:target img {
    animation: zoomDanFade 1s;
  }

  .overlay .close {
    position: absolute;
    top: 10%;
    right: 2%;
    margin-left: -20px;
    color: white;
    text-decoration: none;
    line-height: 14px;
    padding: 5px;
    opacity: 0;
  }

  .overlay:target .close {
    animation: slideDownFade .5s .5s forwards;
  }

  /* animasi */
  @keyframes zoomDanFade {
    0% {
      transform: scale(0);
      opacity: 0;
    }

    100% {
      transform: scale(1);
      opacity: 1;
    }
  }

  @keyframes slideDownFade {
    0% {
      opacity: 0;
      margin-top: -20px;
    }

    100% {
      opacity: 1;
      margin-top: 0;
    }
  }
</style>