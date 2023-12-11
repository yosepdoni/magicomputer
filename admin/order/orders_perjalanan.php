<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pesananan dalam perjalanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?p=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Pesanan</li>
              <li class="breadcrumb-item active">Dalam perjalanan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<link rel="stylesheet" href="../../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
                <form action="index.php?p=gridview_perjalanan" method="POST" >
                <div class="row g-3 align-items-left">
                    <div class="">
                        <label class="col-form-label">Periode</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    
                    <div class="col-sm-2">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                   
                        <button type="submit" name="pencarian" class="btn btn-primary float-right"><i class="fa fa-search"> Cari</i></button>      
                </div>
            </form>
              </div>
           
              <div class="card-body">
                <div class="box box-info">
            <!-- /.box-header -->
       
           <div class="box-body">
              <div id="printableArea" class="table-responsive">
              <p>Tanggal & Waktu: <span id="tanggalwaktu"></span></p>
              <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                 <form action="" method="GET">
                 <caption>Pesanan yang dalam perjalanan</caption>
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
                    <th>Aksi</th>                    
                  </tr>
                  </thead>
        
                  <tbody>
                  <?php
                  $data = mysqli_query($conn, "SELECT * FROM pesanan WHERE status_kirim ='dalam perjalanan' ORDER BY id_pesanan ASC limit 50");
                  $no =1;
                  while($d = mysqli_fetch_array($data)){
                ?>
                  <tr> 
                    <td><?php echo $no++;?></td>
                    <td><?= $d['no_resi'];?></td>
                    <td><p class="card-text m-1"><?=$d['daftar_pesanan']; ?></p></td>
                    <td><?= "Rp".number_format($d['pembayaran']); ?></td>
                    <p hidden><?=$id_pengguna = $d['id_pengguna']; ?></p>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
                            while ($da = mysqli_fetch_array($query)) {
                            ?>
                            <td><?= $da['nama']; ?></td>
                            <?php } ?>
                    <td><?= $d['status_kirim']; ?></td>
                    <td><?= $d['ekspedisi']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($d['tanggal'])); ?></td>                    
                    <td>
                      <a href="index.php?p=detailorder_perjalanan&id_pesanan=<?=$d['id_pesanan'];?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                    
                  <?php
                  
                    }
                  ?>
                  </tbody>
                </table>
                  </body>
                <script>
                    $(document).ready(function() {
                        var table = $('#example').DataTable( {
                            responsive: true
                        } );
                    
                        new $.fn.dataTable.FixedHeader( table );
                    } );
                </script>
                <script>
                  var dt = new Date();
                  document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleString();
                </script>
                </form>
               

                </div>
              <!-- /.card-body -->
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
  
       