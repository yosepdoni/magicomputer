<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?p=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Detail Order</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Pesanan Dalam Perjalanan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="box box-info">
            <!-- /.box-header -->

           <div class="box-body">                    
       <!-- <?php
                  
                  include "../../koneksi.php";
                  $d =$_GET['id_pesanan'];
                  $data = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan='$d'");
                  while($da = mysqli_fetch_array($data)){
                ?> -->
        <form class="form-horizontal" method="POST" action="order/updateinfo.php">
            <div class="box-body">  
                <?php 
                    include ('../../koneksi.php');
                    $conn=mysqli_query($conn," SELECT * FROM pengguna WHERE id_pengguna='$da[id_pengguna]'");
                    while($h=mysqli_fetch_array($conn)){
                   ?> 
                    <input type="hidden" name="id_pesanan" value="<?=$da['id_pengguna']; ?>">
                   <table class="table">
                  <tbody>
                  <tr>
                      <th scope="row">No. Resi</th>
                      <td>:</td>
                      <td> <?=$da['no_resi']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Daftar Pesanan</th>
                      <td>:</td>
                      <td> <?=$da['daftar_pesanan']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Total</th>
                      <td>:</td>
                      <td> <?="Rpx".number_format($da['pembayaran']); ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Ekspedisi</th>
                      <td>:</td>
                      <td> <?=$da['ekspedisi']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Nama</th>
                      <td>:</td>
                      <td> <?=$h['nama']; ?></td>                      
                    </tr>
                    <tr>
                      <th scope="row">Email</th>
                      <td>:</td>
                      <td> <?=$h['surel']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Telepon</th>
                      <td>:</td>
                      <td> <?=$h['telepon']; ?></td>
                    <tr>
                      <th scope="row">Alamat</th>
                      <td>:</td>
                      <td> <?=$h['alamat']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Status Pengiriman</th>
                      <td>:</td>
                      <td> <?=$da['status_kirim']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Tanggal</th>
                      <td>:</td>
                      <td><?php echo date("d/m/Y", strtotime($da['tanggal'])); ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Bukti Pembayaran</th>
                      <td>:</td>
                      <td> <img src="../assets/image/<?=$da['bukti_bayar'];?>" alt="gambar" width="70" height="70"> </td>                      
                    </tr>
                  </tbody>
                </table>
                 
            <!-- /.box-body -->
            
   
            <!-- /.box-footer -->
        </form>
        <?php 
        }}
        ?>
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
    <!-- /.content -->
  </div>
