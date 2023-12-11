<center>
<div class="row">
    <?php 
        include ('../koneksi.php'); 
        $conn=mysqli_query($conn,"SELECT * FROM product WHERE nm_product LIKE '%$_GET[nm_product]%'");
        while($h=mysqli_fetch_array($conn)){
        ?>
<div class="col-6 col-md-2">
<a href="produk_detail.php?id_product=<?=$h['id_product'];?>" class="btn btn-light">
          <img src="../assets/image/<?=$h['img']; ?>" class="card-img-top" alt="img" style="width: 180px;height:180px;">
          <div class="card-body">
          <p class="card-text m-1" style="white-space: pre-wrap;"><?=substr($h['nm_product'], 0,17,); ?> ...</p>
          <p><b> <?="Rp".number_format($h['price']); ?> </b> </p>
          <p style="color:orange" class="m-1">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          </p>
          <p class="card-text" hidden><?=$h['category']; ?></p>
          </div>
          </a>
        </div>
        
<?php
              }      
?>
</div>
</div>
</center>