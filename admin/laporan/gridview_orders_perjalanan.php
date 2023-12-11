<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pesanan dalam perjalanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?p=dashboard">Home</a></li>
            <li class="breadcrumb-item active">GridView</li>
            <li class="breadcrumb-item active">Dalam Perjalanan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">GridView </h3>
            </div>

            <div class="card-body mb-5">
              <div class="box box-info">
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="printableArea" class="table-responsive">
                  <div class="d-flex justify-content-around align-items-center mb-3">
                      <img src="../assets/logolaporan.png" alt="" width="60" height="50" class="d-inline-block" style="margin-right:10%;">
                      <div class="text-center">
                        <h3>Magicomputer Sintang</h3>
                        Jln. Y.C Oevang Oeray Baning Kota Sintang, Kalbar Telp. 0857-8727-5725
                      </div>
                      <div>
                        <p class="text-right">Cetakan: <span id="tanggalwaktu"></span>
                          <?php
                          include "../../koneksi.php";
                          $totalPembayaran = 0;
                          if (isset($_POST['pencarian'])) {
                            //menangkap nilai form
                            $tanggal_awal = $_POST['dari'];
                            $tanggal_akhir = $_POST['ke'];
                            // tampilkan data yang sesuai dengan range tanggal yang dicari 
                            $data = mysqli_query($conn, "SELECT * FROM pesanan WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND status_kirim ='sedang dikemas'");
                          } else {
                            // $data = mysqli_query($conn, "select * from checkout ORDER BY order_id ASC");
                            $data = mysqli_query($conn, "SELECT * FROM pesanan WHERE status_kirim ='sedang dikemas' ORDER BY id_pesanan ASC");
                          }

                          ?>

                        <div class="text-center">
                          Laporan: <?php echo date("d/m/Y", strtotime($tanggal_awal)) ?> - <?php echo date("d/m/Y", strtotime($tanggal_akhir)) ?>
                        </div>
                        </p>
                      </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                      <form action="" method="GET">
                      <caption>
                          <div>Laporan penjualan / pesanan dalam perjalanan <p style="float:right;">Kasir: <?= $session_nama; ?></p>
                          </div>
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>No Resi</th>
                            <th>Daftar Pesanan</th>
                            <th>Pembayaran</th>
                            <th>Konsumen</th>
                            <th>Status</th>
                            <th>Ekspedisi</th>
                            <th>Tanggal</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php

                          include "../../koneksi.php";
                          if (isset($_POST['pencarian'])) {
                            //menangkap nilai form
                            $tanggal_awal = $_POST['dari'];
                            $tanggal_akhir = $_POST['ke'];
                            // tampilkan data yang sesuai dengan range tanggal yang dicari 
                            $data = mysqli_query($conn, "SELECT * FROM pesanan WHERE tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' AND status_kirim ='dalam perjalanan'");
                          } else {
                            // $data = mysqli_query($conn, "select * from checkout ORDER BY order_id ASC");
                            $data = mysqli_query($conn, "SELECT * FROM pesanan WHERE status_kirim ='dalam perjalanan' ORDER BY id_pesanan ASC");
                          }
                          $no = 1;
                          while ($d = mysqli_fetch_array($data)) {
                            $totalPembayaran += $d['pembayaran'];
                          ?>
                            <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?= $d['no_resi']; ?></td>
                              <td>
                                <p class="card-text m-1"><?= $d['daftar_pesanan'] ?></p>
                              </td>
                              <td><?= "Rp" . number_format($d['pembayaran']); ?></td>
                              <p hidden><?= $id_pengguna = $d['id_pengguna']; ?></p>
                              <?php
                              $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
                              while ($da = mysqli_fetch_array($query)) {
                              ?>
                                <td><?= $da['nama']; ?></td>
                              <?php } ?>
                              <td><?= $d['status_kirim']; ?></td>
                              <td><?= $d['ekspedisi']; ?></td>
                              <td><?php echo date("d/m/Y", strtotime($d['tanggal'])); ?></td>
                            </tr>
                          <?php
                          }
                          ?>
                          <tr>
                            <td colspan="2"><strong>Total Pembayaran</strong></td>
                            <td colspan="6" class="text-right"><strong><?= "Rp" . number_format($totalPembayaran); ?></strong></td>
                          </tr>
                        </tbody>
                    </table>
                    <script>
                      var dt = new Date();
                      document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleString();

                      function printDiv(divName) {
                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;

                        window.print();

                        document.body.innerHTML = originalContents;
                      }
                    </script>
                    </form>


                  </div>
                  <!-- /.card-body -->
                  <button onclick="printDiv('printableArea')" class="btn btn-success float-right"><i class="fa fa-print"> Print</i></button>
                </div>
                <!-- /.card -->

                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
  </section>